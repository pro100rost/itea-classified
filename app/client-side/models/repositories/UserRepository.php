<?php

namespace ClientModels\repositories;

use ClientModels\models\User;
use ClientModels\services\ErrorRecord;
use Common\exceptions\NotFoundHttpException;
use Common\repositories\Repository;

class UserRepository extends Repository
{
    /**
     * @param int $id
     *
     * @return User
     *
     * @throws NotFoundHttpException
     */
    public function findUserById(int $id): User
    {
        $sqlRequest = 'SELECT * FROM "users" WHERE id = :id';
        $pdoStatement = $this->getPdo()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\User');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof User) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return User
     *
     * @throws NotFoundHttpException
     */
    public function findUserByEmailAndPassword(string $email, string $password): User
    {
        $sqlRequest = 'SELECT * FROM "users" WHERE email = :email AND password = :password';
        $pdoStatement = $this->getPDO()->prepare($sqlRequest);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\User');
        $pdoStatement->execute(['email' => $email, 'password' => $password]);
        if (!($model = $pdoStatement->fetch()) instanceof User) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }


    /**
     * @param User $user
     *
     * @throws NotFoundHttpException
     */
    public function insertUser(User $user)
    {
        $sqlRequest = 'INSERT INTO "users" ( "created_time", "email", "first_name", "last_name", "mobile", "password") 
                       VALUES ( EXTRACT(epoch FROM now()), \'' . $user->email . '\', \'' . $user->first_name . '\', \'' .
                               $user->last_name . '\', ' . $user->mobile. ', \'' . $user->password . '\' )';

        if (0 === $this->getPdo()->exec($sqlRequest)) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        };
    }
}