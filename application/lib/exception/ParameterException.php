<?php

namespace app\lib\exception;

/**
 * Class ParameterException
 * 通用参数异常类
 */
class ParameterException extends BaseException{
    public $code = 400;
    public $msg = 'invalid parameters';
    public $errorCode = 10000;
}
