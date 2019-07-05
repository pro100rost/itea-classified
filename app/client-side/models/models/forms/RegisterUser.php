<?php

namespace ClientModels\models\forms;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $passwordConfirmation
 */
class RegisterUser
{
    public $first_name;
    public $last_name;
    public $email;
    public $mobile;
    public $password;
    public $passwordConfirmation;
}