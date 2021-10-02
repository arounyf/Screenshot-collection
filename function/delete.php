<?php 
require "../config/main.php"; 
require "../config/db.php";
require "session.php"; 

function backup(){
    require "../config/main.php"; 
    require "../config/db.php";
    //备份数据库到txt
    $sql = "select * from $dbtable where file = '1';";
    $result = $db -> query($sql);
    if(!file_exists("../备份.txt")){
        $txt=fopen("../备份.txt","a+");
        while($row=$result->fetch_object()){
            $text = "update $dbtable set file = '1',fname= '$row->fname', time = '$row->time' where name = '$row->name';\n";
            $str=fwrite($txt,$text);
        }
        fclose($txt);
    }else{
        unlink("../备份.txt");
    }
    //备份压缩包
    copy("../$zipname","../备份.zip"); 
}


//重置系统函数
function delete(){
    require "../config/db.php";
    require "../config/main.php";
    
    $sql = "select fname from $dbtable where file = '1'";
    $result = $db -> query($sql);
    
    //删除图片
    while($row=$result->fetch_object()){
        $pic = "../upload/".$row->fname;
        if(!file_exists($pic)){
            echo '<div class="alert alert-dark" role="alert">';
            echo "$row->fname  ";
        	echo "该文件不存在";
        	echo "</div>";
        }else{
        	echo '<div class="alert alert-dark" role="alert">';
        	echo $row->fname;
        	echo "</div>";
        	unlink($pic);
        }
}

echo '<div class="alert alert-dark" role="alert">';
echo "图片清理成功";
echo "</div>";


unlink("../$zipname");
echo '<div class="alert alert-dark" role="alert">';
echo "压缩包清理成功";
echo "</div>";

$sql = "update $dbtable set file = 0,fname = null,time = null";
$result = $db -> query($sql);
echo '<div class="alert alert-dark" role="alert">';
echo "数据库清理成功";
echo "</div>";
}

if(!file_exists("../$zipname"))
{
    echo '<div class="alert alert-dark" role="alert">';
	echo "当前没有下载文件，无法重置系统";
	echo "</div>";
}else{
    backup();
	delete();
}







