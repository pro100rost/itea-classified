<?php

namespace ClientControllers;

use ClientModels\models\forms\LoginUser;
use ClientModels\models\forms\RegisterUser;
use ClientModels\repositories\UserRepository;
use Common\base\Controller;
use Common\base\Request;
use ClientModels\services\AuthService;

class UserController extends Controller
{
    private $repository;
    private $auth;
    private $login;
    private $register;

    public function __construct(string $side, Request $request)
    {
        parent::__construct($side, 'user', $request);
        $this->repository = new UserRepository();
        $this->auth = new AuthService();
        $this->login = new LoginUser();
        $this->register = new RegisterUser();
        $this->auth->isLogged() ? $this->setLayout('logged-layout') : $this->setLayout('main-layout');
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionLogin(): string
    {
        $this->login->email = $this->request->getPostParam('loginEmail');
        $this->login->password = $this->request->getPostParam('loginPassword');

        if ($this->request->isPost() && $this->auth->login($this->login)) {
            header("refresh: 0; url=/");
        }

        if (!$this->auth->isLogged()) {
            return $this->render('login-page', [
                'register' => $this->register,
                'login' => $this->login,
            ]);
        } else {
            return $this->render('account');
        }
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionRegistration(): string
    {
        if ($this->request->isPost()) {
            $this->register->first_name = $this->request->getPostParam('registerFirstName');
            $this->register->last_name = $this->request->getPostParam('registerLastName');
            $this->register->email = $this->request->getPostParam('registerEmail');
            $this->register->mobile = $this->request->getPostParam('registerMobile');
            $this->register->password = $this->request->getPostParam('registerPassword');
            $this->register->passwordConfirmation = $this->request->getPostParam('registerPasswordConfirmation');

            if ($this->auth->register($this->register)) {
                $this->login->email = $this->register->email;
                $this->login->password = $this->register->password;
                $this->auth->login($this->login);
                header("refresh: 0; url=/");
            }
        }

        if (!$this->auth->isLogged()) {
            return $this->render('login-page', [
                'register' => $this->register,
                'login' => $this->login,
            ]);
        } else {
            return $this->render('account');
        }
    }

    /**
     * @return string
     *
     * @throws \Throwable
     */
    public function actionSettings(): string
    {
        if ($this->request->isPost()) {
            // TODO: add login logic
        }
        $this->setLayout('logged-layout');

        return $this->render('account');
    }

    public function actionLogout()
    {
        $this->auth->logout();
        header("refresh: 0; url=/");
    }
}
