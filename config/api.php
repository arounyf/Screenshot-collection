<?php
//通知配置


function sct_send($desp,$key='key'){
    $postdata = http_build_query( array( 'content' => $desp, 'key' => $key ));
    $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata));
    $context  = stream_context_create($opts);
    $result = file_get_contents('https://api.liang23.cn/wx.php', true, $context);
    return $result;
}




//高速下载配置

$cosdown = "/www/cosfs/liang23/$zipname";  //文件存放位置
$cosurl = "/$zipname";  //下载请求地址
$cos = "https://liang23-1252891785.cos.ap-chengdu.myqcloud.com"; 

//高速下载api
function get_downurl($cosurl,$cos,$time='120',$coskey='key'){
    $postdata = http_build_query( array( 'time' => $time, 'url' => $cosurl , 'key' => $coskey , 'cos' => $cos ));
    $opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata));
    $context  = stream_context_create($opts);
  $result = file_get_contents( 'https://api.liang23.cn/cos.php' , true, $context);
  return $result;
}