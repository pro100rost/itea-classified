<?php

namespace ClientModels\models;

/**
 * @property int $chat_id
 * @property int $created_time
 * @property int $id
 * @property string $message
 * @property int $user_from
 * @property int $user_to
 */
class Message
{
    public $chat_id;
    public $created_time;
    public $id;
    public $message;
    public $user_from;
    public $user_to;
}