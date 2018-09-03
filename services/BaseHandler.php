<?php

use SMS\SMSUserException;
use SMS\SMSSystemException;
use Thrift\Exception\TApplicationException;

class BaseHandler
{
    protected $app = null;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function rasieUserException($message, $code = null)
    {
        $code  =$code ?: TApplicationException::WRONG_METHOD_NAME;
        $error = array(
            'error_code' => $code,
            'message' => $message
        );
        throw new SMSUserException($error);
    }

    public function rasieSystemException($message, $code = null)
    {
        $code  =$code ?: TApplicationException::WRONG_METHOD_NAME;
        $error = array(
            'error_code' => $code,
            'message' => $message
        );
        throw new SMSSystemException($error);
    }
}
