<?php

namespace ClientModels\services;

use ClientModels\models\forms\LoginUser;
use ClientModels\models\forms\RegisterUser;
use ClientModels\models\User;
use Common\exceptions\NotFoundHttpException;
use ClientModels\repositories\UserRepository;

class AuthService
{
    const SALT = 'classified';
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $user;
    private $notes;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->notes = parse_ini_file(__DIR__ . '/parse/notes.ini');
        session_start();
    }

    /**
     * @param RegisterUser $registrationForm
     *
     * @return bool
     *
     * @throws NotFoundHttpException
     */
    public function register(RegisterUser $registrationForm): bool
    {
        $this->user = new User();
        $this->user->first_name = $registrationForm->first_name;
        $this->user->last_name = $registrationForm->last_name;
        $this->user->email = hash('sha256', self::SALT . $registrationForm->email);
        $this->user->mobile = $registrationForm->mobile;

        $password = $registrationForm->password;
        $passwordConfirmation = $registrationForm->passwordConfirmation;
        if ($password === $passwordConfirmation && $password != null && $passwordConfirmation != null) {
            $this->user->password = hash('sha256', self::SALT . $password);
        }

        $this->userRepository->insertUser($this->user);

        if (null === $this->user) {
            return false;
        }

        $this->setSessionUser($this->userRepository->getPDO()->lastInsertId('users_id_seq'));

        return true;
    }

    /**
     * @param LoginUser $loginForm
     *
     * @return bool
     *
     * @throws NotFoundHttpException
     */
    public function login(LoginUser $loginForm): bool
    {
        $email = hash('sha256', self::SALT . $loginForm->email);
        $password = hash('sha256', self::SALT . $loginForm->password);
        $user = $this->userRepository->findUserByEmailAndPassword($email, $password);

        if (null === $user) {
            return false;
        }

        $this->setSessionUser($user->id);

        return true;
    }

    public function logout()
    {
        $this->removeSessionUser();
    }

    /**
     * @return int|null
     */
    public function getLoggedUserId(): ?int
    {
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * @return array
     */
    public function getSessionParams(): array
    {
        return $_SESSION;
    }

    /**
     * @param array $parameter
     * @param null $defaultValue
     *
     * @return string
     */
    public function getSessionParam(array $parameter, $defaultValue = null): string
    {
        return $_SESSION[$parameter] ?? $defaultValue;
    }

    /**
     * @param int $userId
     */
    public function setSessionUser(int $userId)
    {
        $_SESSION['is_logged'] = true;
        $_SESSION['user_id'] = $userId;
    }

    public function removeSessionUser()
    {
        $_SESSION['is_logged'] = false;
        $_SESSION['user_id'] = null;
    }

    /**
     * @return bool
     */
    public function isLogged(): bool
    {
        return isset($_SESSION['is_logged']) && true === $_SESSION['is_logged'] && 0 !== $_SESSION['user_id'];
    }
}