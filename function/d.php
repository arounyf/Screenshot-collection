<?php 


require "db.php";
require "config.php";
require "session.php"; 

$sql = "select fname from $dbtable where file = '1'";
$result = $db -> query($sql);
// 变成数组
$arr= array();
while($row=$result->fetch_object()){
	 array_push($arr,"../upload/".$row->fname);
}

if(file_exists($filename)){ 
  unlink($filename); 
} 
//重新生成文件 
$zip=new ZipArchive(); 
if($zip->open($filename,ZIPARCHIVE::CREATE)!==TRUE){ 
  exit('无法打开文件，或者文件创建失败'); 
} 
$datalist=$arr; 

foreach($datalist as $val){ 
  if(file_exists($val)){ 
    $zip->addFile($val,basename($val)); 
  } 
} 
$zip->close();//关闭 
if(!file_exists($filename)){ 
    echo('<script>alert("当前无人提交");top.location="../admin.php";</script>'); //即使创建，仍有可能失败 
}else{
    Header("HTTP/1.1 303 See Other"); 
    Header("Location: $filename");
}



 ?>