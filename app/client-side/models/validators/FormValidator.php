<?php

namespace ClientModels\validators;

class FormValidator
{
    /**
     * @param mixed $param
     *
     * @return bool
     */
    public function isEmpty($param): bool
    {
        return $param ?? false;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function isNameValid(string $name): bool
    {
        return preg_match('/^[a-zA-Zа-яА-ЯёЁ\s]+$/u', $name);
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function isEmailValid(string $email): bool
    {
        return preg_match('/^[a-z\d\-._]+\S@[a-z]+\.[a-z]{2,8}$/i', $email);
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function isMobileValid(string $email): bool
    {
        return preg_match('/[0-9]{9}/', $email);
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function isPasswordValid(string $email): bool
    {
        return preg_match('/^[a-z\d\-._]+\S@[a-z]+\.[a-z]{2,8}$/i', $email);
    }
}