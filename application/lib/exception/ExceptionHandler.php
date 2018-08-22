<?php

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\facade\Request;
use think\facade\Log;

/*
 * 重写Handle的render方法，实现自定义异常消息
 */
class ExceptionHandler extends Handle{

    private $code;
    private $msg;
    private $errorCode;

    public function render(Exception $e){
        if ($e instanceof BaseException) {   // 自定义的异常
            //如果是自定义异常，则控制http状态码，不需要记录日志
            //因为这些通常是因为客户端传递参数错误或者是用户请求造成的异常
            //不应当记录日志

            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            // 如果是服务器未处理的异常，将http状态码设置为500，并记录日志
            if (config('app_debug')) {
                // 调试状态下需要显示TP默认的异常页面，因为TP的默认页面很容易看出问题
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = 'sorry，we make a mistake. (^o^)Y';
            $this->errorCode = 999;
            $this->recordErrorLog($e);  // 记录日志
        }

        $requestUrl = Request::url();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $requestUrl
        ];
        return json($result, $this->code);
    }

    /*
     * 将异常写入日志
     */
    private function recordErrorLog(Exception $e) {
        Log::init([
            // 日志记录方式，内置 file socket 支持扩展
            'type'        => 'File',
            // 日志保存目录
            'path'        => LOG_PATH,
            // 日志记录级别
            'level'       => ['error'],
            // 单文件日志写入
            'single'      => false,
            // 独立日志级别
            'apart_level' => [],
            // 最大日志文件数量
            'max_files'   => 0,
            // 是否关闭日志写入
            'close'       => false
        ]);
        Log::error($e->getMessage());
    }
}
