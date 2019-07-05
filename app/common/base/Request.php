<?php

namespace Common\base;

class Request
{
    /**
     * @return array
     */
    public function getPostParams(): array
    {
        return $_POST;
    }

    /**
     * @param string $paramName
     * @param null $defaultValue
     *
     * @return mixed|null
     */
    public function getPostParam(string $paramName, $defaultValue = null)
    {
        return $_POST[$paramName] ?? $defaultValue;
    }

    /**
     * @return array
     */
    public function getGetParams(): array
    {
        return $_GET;
    }

    /**
     * @param string $paramName
     * @param null $defaultValue
     *
     * @return mixed|null
     */
    public function getGetParam(string $paramName, $defaultValue = null)
    {
        return $_GET[$paramName] ?? $defaultValue;
    }

    /**
     * @return string|null
     */
    public function getPathInfo(): ?string
    {
        $requestUri= '/';
        if (isset($_SERVER['REQUEST_URI'])) {
            $requestUri = $_SERVER['REQUEST_URI'];
            if ($requestUri !== '' && $requestUri[0] !== '/') {
                $requestUri = preg_replace('/^(http|https):\/\/[^\/]+/i', '', $requestUri);
            }
        }

        if (($pos = strpos($requestUri, '?')) !== false) {
            $requestUri = substr($requestUri, 0, $pos);
        }

        $requestUri = urldecode($requestUri);


        return $requestUri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string $paramName
     *
     * @return bool
     */
    public function isGetParam(string $paramName): bool
    {
        return $_GET[$paramName] ?? false;
    }

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return 'GET' === $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return 'POST' === $_SERVER['REQUEST_METHOD'];
    }
}