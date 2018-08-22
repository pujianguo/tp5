<?php

namespace app\api\validate;
use think\Exception;
use think\Validate;
use app\lib\exception\parameterException;

/**
 * Class BaseValidate
 * 验证类的基类
 */
class BaseValidate extends Validate{

    /**
     * 检测所有客户端发来的参数是否符合验证类规则
     * 基类定义了很多自定义验证方法
     * 这些自定义验证方法其实，也可以直接调用
     * @throws ParameterException
     * @return true
     */
    public function goCheck() {
        //必须设置contetn-type:application/json
        // 获取http传入的参数，对这些参数做校验
        $params = input('param.');
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new parameterException([
                'msg' => $this->error,
            ]);
            throw $e;
        } else {
            return true;
        }
    }
}
