<?php
/**
 * Created by Raul.
 * User: Rual
 * Date: 2018/8/20
 * Time: 15:30
 */

namespace app\lib\exception;

/**
 * 404时抛出此异常
 */
class MissException extends BaseException{
    public $code = 404;
    public $msg = 'global:your required resource are not found';
    public $errorCode = 10001;
}
