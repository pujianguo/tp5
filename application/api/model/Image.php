<?php

namespace app\api\model;

/**
 *
 */
class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'update_time', 'delete_time'];

    // 读取器
    public function getUrlAttr($value, $data) {
        return $this->prefixImgUrl($value, $data);
    }
}
