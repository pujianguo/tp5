<?php

validate
独立验证
public function getBanner($id){

    $data = [
        'name' => 'vendor',
        'email' => 'vendor@qq.com'
    ];

    // 定义验证规则
    $validate = new Validate([
        'name' => 'require|max:10',
        'email' => 'email'
    ]);
    // err只输出第一个错误信息
    $result = $validate->check($data);
    $err = $validate->getError();
    echo $err;

    // err是一个数组，包含所有输出信息
    $result = $validate->batch()->check($data);
    $err = $validate->getError();
    var_dump($err);
}
验证器
public function getBanner($id){

    $data = [
        'name' => 'vendor',
        'email' => 'vendor@qq.com'
    ];
    $validate = new TestValidate();
    $result = $validate->batch()->check($data);
    var_dump($validate->getError());
}

// application/api/validate/TestValidate.php
<?php
namespace app\api\validate;
use think\Validate;

class TestValidate extends Validate{

    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ]
}

自定义验证规则

public function getBanner($id){

    $data = [
        'id' => $id;
    ];

    $validate = new IDMustBePositiveInt();
    $result = $validate->batch()->check($data);
    if ($result) {
        echo 'id合法';
    } else {
        var_dump($validate->getError());
    }
}

// application/api/validate/IDMustBePositiveInt.php
<?php

namespace app\api\validate;
use think\Validate;

class IDMustBePositiveInt extends Validate{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '') {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return $field.'必须是正整数';
        }
    }
}

构建接口参数校验层



