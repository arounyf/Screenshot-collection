<?php


$host = '127.0.0.1';
$user = 'user';
$pwd = 'passwd';
$name = 'dbname';
$dbtable = 'test';

//实例化
$db =  new mysqli($host,$user,$pwd,$name);
//判断数据库是否连接

// if($db -> connect_errno){
//     die('连接错误' . $db -> connect_error);
// }else{
// 	echo "连接成功";
// }


// $sql = "select * from wl29";
// $result = $db -> query($sql);
// 判断是否执行成功
// if ($result === false){
// 	echo "执行失败";
// 	exit;
// }else{
// 	echo "执行成功";
// }


//取出数据
// while($row=$result->fetch_object()){
// 	echo $row->qs; 
// 	echo $row->name;
// }


?>