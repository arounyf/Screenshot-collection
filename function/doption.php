
<?php
require "../config/db.php";
require "../config/main.php";
require "session.php"; 

//接收数据
$stu_name = $_POST["xm"];



//取出姓名数据
$sql2 = "select fname from $dbtable where name = '$stu_name'";
$result = $db -> query($sql2);

$fname = "";
while($row=$result->fetch_object()){
	$fname = $row->fname;
}


//删除图片
$jpgf = "../upload/".$fname;
if ($jpgf == "../upload/"){
    echo '<div class="alert alert-dark" role="alert">';
    echo "删除失败";
    echo "</div>";
}else{
    if(!file_exists($jpgf)){
        echo '<div class="alert alert-dark" role="alert">';
    	echo "文件不存在";
    	echo "</div>";
    }else{
    	unlink($jpgf);
        echo '<div class="alert alert-dark" role="alert">';
        echo "删除成功";
        echo "</div>";
    }
	//更新数据库
    $sql = "update $dbtable set file = '0' , fname= 'null' where name = '$stu_name'";
    $result = $db -> query($sql);
}





