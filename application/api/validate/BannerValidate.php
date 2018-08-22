<?php

namespace app\api\validate;
use think\Validate;

class BannerValidate extends Validate{

    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];

    // message 定义错误提示信息，可以不写，会使用默认提示。
    protected $message = [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过10个字符',
        'age.number'   => '年龄必须是数字',
        'age.between'  => '年龄只能在1-120之间',
        'email'        => '邮箱格式错误'
    ];

    // 自定义验证规则
    protected function checkName($value,$rule,$data=[]) {
        return $rule == $value ? true : '名称错误';
    }

    // 验证场景
    protected $scene = [
        'edit'  =>  ['name'],
    ];
}
