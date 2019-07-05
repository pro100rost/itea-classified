<?php

namespace Common\exceptions;

class NotFoundHttpException extends \Exception
{
    /**
     * Constructor.
     *
     * @param string $message error message
     * @param int $code error code
     * @param \Exception $previous The previous exception used for the exception chaining.
     */
    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, 404, $previous);
    }
}