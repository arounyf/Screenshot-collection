<?php

//消息配置
$gg = "欢迎使用 有任何问题请联系我 —— liang23"; //公告
$message = "截图收集成功";  //收集完成后发送通知

//文件上传配置
$fsize = 10;
$allowedExts = array("gif", "jpeg", "jpg", "png");
$fnameon = "off";  //是否启用表单文件名

//主题配置
$stycls = "success";
$navcls = "navbar navbar-expand-lg navbar-light bg-$stycls navbar-dark  mb-2";
$buttoncls = "btn btn-$stycls";
$progresscls = "progress-bar progress-bar-striped progress-bar-animated bg-$stycls";
$licls = "list-group-item active bg-$stycls";
$spancls = "badge badge-$stycls badge-pill";
$textcls = "text-$stycls";
// .bg-primary
// .bg-secondary
// .bg-success
// .bg-danger
// .bg-warning
// .bg-info
// .bg-light
// .bg-dark


//后台账号 
$username = "admin";
$password = "3d0d0c00b6472f838c76aa94de3173d9";
// md5加密 

//文件打包路径配置
$backname = "网络19329";
$textname = "$backname.txt";
$zipname = "$backname.zip";
$filename = "../$zipname"; //打包文件名
$backupname ="../备份-$zipname";  //重置系统时备份文件名
$backuptxtname = "../备份-$textname";

//网站名配置
$title = "学习截图";
$indexna = "$title-截图收集";
$navna = "截图收集";
$wtjna = "$title-提交状态";
$setna = "$title-系统设置";
$loginna = "$title-后台登陆";

//通知配置
$sendkey="key";
$sendapi="https://api.liang23.cn/wx.php";

//高速下载配置
$cosapi="https://api.liang23.cn/cos.php"; //配置接口
$coskey="key";
$time = "120"; //下载超时设置 单位秒
$cosdown = "/www/cosfs/liang23/$zipname";  //系统挂载路径
$cosurl = "/$zipname";  //高速下载路径文件名配置
$cos = "https://liang23-1252891785.cos.ap-chengdu.myqcloud.com"; 
