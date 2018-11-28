<?php

$mime = array(
    'image/png' => '.png',
    'image/jpg' => '.jpg',
    'image/jpeg' => '.jpg',
    'image/pjpeg' => '.jpg',
    'image/gif' => '.gif',
    'image/bmp' => '.bmp',
    'image/x-png' => '.png',
);

$base64 = $_POST['base64'];
$type = $_POST['type'];
$imgtype = $mime[$type];
if($imgtype){
    preg_match('/(.*)base64,(.*)/', $base64, $matches);
    $base64 = $matches['2'];
    $base64 = base64_decode($base64);
    $data = date("Y-m-d");
    $imgname = md5(time().rand(10000,99999));
    $imgurl = 'saestor://upload/'.$data.'/'.$imgname.$imgtype;
    $imgurlname = $data.'/'.$imgname.$imgtype;
    $ress = file_put_contents($imgurl,$base64);
    if($ress){
        $st = new SaeStorage();
        $res['status'] = '0';
        $res['imgurl'] = $st->geturl('upload',$imgurlname);
    }else{
        $res['status'] = '1';
        $res['msg'] = '上传图片错误，请检查文件夹权限';
    }
}else{
    $res['status'] = '1';
    $res['msg'] = '格式错误';
}
echo json_encode($res);