<?php

namespace app\api\model;

/**
 *
 */
class Banner extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time'];
    public function items() {

        //hasMany(关联模型， 关联模型外键，当前模型主键)
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    /**
    * @param   $id int banner所在位置
    * @return  Banner
    */
    public static function getBannerById($id){
        // with指定使用的关联模型
        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;
    }
}
