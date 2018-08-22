<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Router;

/*
Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('blog/:id','\app\index\service\Blog@read');

return [

];*/

Route::get('/', function(){
  echo 'hello world';
});

// test
Route::get('phpinfo', 'api/v1.Test/phpinfo');
Route::get('test/db', 'api/v1.Test/db');
// 验证码
Route::get('verify','api/v1.Test/verify');

// banner
Route::get('banner/:id', 'api/v1.Banner/getBanner');



