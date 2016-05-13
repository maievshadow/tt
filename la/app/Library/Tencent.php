<?php
namespace App\Library;
use Tencentyun\ImageV2;
use Tencentyun\Auth;
use Tencentyun\Video;
class Tencent
{
    public function add($file)
    {
        $bucket = 'waboon'; // 自定义空间名称，在http://console.qcloud.com/image/bucket创建
        $fileid = 'waboon'.time();  // 自定义文件名
        $uploadRet = ImageV2::upload($file, $bucket, $fileid);

        //var_dump('upload',$uploadRet);
        return $uploadRet;
    }
}
