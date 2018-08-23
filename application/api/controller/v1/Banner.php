<?php

namespace app\api\controller\v1;

use think\Controller;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;
use app\api\model\Banner as BannerModel;

class Banner extends Controller{
    // protected $batchValidate = true;


    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id
     */
    public function getBanner($id){
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::getBannerById($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}
