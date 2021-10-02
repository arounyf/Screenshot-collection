<?php  

require "../config/db.php";
require "../config/main.php";

$fname = $_FILES["userfile"]["name"];
$tsize = round($_FILES["userfile"]["size"] / 1048576,2);
$temp = explode(".",$fname);
$extension = end($temp);     // 获取文件扩展名
$allow = in_array($extension, $allowedExts);

//取出姓名数据
$stu_name = $_POST["userinput"];


if($fnameon == "on"){
	$fname = $stu_name.".".$extension;
}


$check = "select name,file from $dbtable where name = '$stu_name'";
$result = $db -> query($check);
$check = false;
$file = 1;
while($row=$result->fetch_object()){
	$check = $row->name;
	$file =$row->file;
}


//多重验证正确性
if ($check){
	if ($file == '1'){
		echo '<li class="list-group-item">你已经提交，无需重复提交</li>';
	}else{
		if ($allow){
			if($tsize < $fsize){
				upfile($stu_name,$fname,$tsize);
			}else{
				echo '<li class="list-group-item">'."文件过大 目前只支持".$fsize.'MB以内的文件</li>';
			}
			
		}else{
			echo '<li class="list-group-item">'."暂不支持".$extension.'文件</li>';
		}
	}
}else{
	echo '<li class="list-group-item">上传失败</li>';
}


function upfile($stu_name,$fname,$tsize){
	require "../config/db.php";
	require "../config/main.php";
	require "../config/api.php";
 	if ($_FILES['userfile']['error'] > 0) { 
    	echo "错误：: " . $_FILES["userfile"]["error"] . "<br>";
	}else{
		echo '<ul class="list-group">';
		echo '<li class="list-group-item">'."上传文件名: " . $fname . "<br>"."</li>";
		echo '<li class="list-group-item">'."文件类型: " . $_FILES["userfile"]["type"] . "<br>"."</li>";
		echo '<li class="list-group-item">'."文件大小: " . $tsize . " MB<br>"."</li>";
		echo "</li>";
		if (file_exists("../upload/" . $fname))
		{
			echo '<li class="list-group-item">'. " 出现相同文件名，提交失败。 "."</li>";
		}else{
			move_uploaded_file($_FILES["userfile"]["tmp_name"], "../upload/" . $fname);
			echo '<li class="list-group-item">'. "文件提交成功"."</li>";
			//添加标识表示已经提交
			$uf = "update $dbtable set file = '1',fname= '$fname', time = now() where name = '$stu_name'";
			$result = $db -> query($uf);
			
			//收集完成时发送通知
			$sql = "select count(*) from $dbtable where file = '0'";
            $result = $db -> query($sql);
            $data = $result -> fetch_row();
            $send = $data[0];
            if ($send == 0){
            	
                $desp = $message;
                sct_send($desp);
                // 发送消息

            }
			
		}
		//查看图片
		// echo '<li class="list-group-item">'.'<img width="100"  src='.'upload/'.$fname.'>'.'</li>';
	}
}




