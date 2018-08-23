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
class BannerMissException extends BaseException{
    public $code = 404;
    public $msg = 'your required resource banner are not found';
    public $errorCode = 40000;
}
