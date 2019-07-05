<?php

namespace ClientModels\repositories;

use ClientModels\models\Chat;
use ClientModels\services\ErrorRecord;
use Common\exceptions\NotFoundHttpException;
use Common\repositories\Repository;

class ChatRepository extends Repository
{
    /**
     * @param int $id
     *
     * @return Chat
     *
     * @throws NotFoundHttpException
     */
    public function findChatById(int $id): Chat
    {
        $pdoStatement = $this->getPdo()->prepare('SELECT * FROM "chats" WHERE id = :id');
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, 'ClientModels\models\Chat');
        $pdoStatement->execute(['id' => $id]);
        if (!($model = $pdoStatement->fetch()) instanceof Chat) {
            (new ErrorRecord())->recordError();
            throw new NotFoundHttpException();
        }

        return $model;
    }
}