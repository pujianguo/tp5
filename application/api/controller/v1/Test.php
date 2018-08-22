<?php

namespace app\api\controller\v1;

use think\captcha\Captcha;

class Test{
    public function phpinfo() {
        phpinfo();
    }
    public function db() {
        $db = new mysqli('127.0.0.1', 'root', 'root', 'tp5');
        if ($db->connect_errno) {
            die("连接数据库失败". $db->connect_error);
        }
        echo "连接成功";
        $db->close();
    }

    // 验证码
    public function verify () {
        $captcha = new Captcha();
        return $captcha->entry();
    }
}
