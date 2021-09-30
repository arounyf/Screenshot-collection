<?php 
    require "function/config.php";
    // require "session.php";
    require "nav.php";
    //验证是否已经登录
    session_start();
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
    
    } else {
        //  验证失败，将 $_SESSION["admin"] 置为 false
        $_SESSION["admin"] = false;
        // 挑战到登陆界面
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $setna?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="function/js/admin.js"></script>
</head>
<body>
	<div class="container">
		<button type="button" class="<?php echo $buttoncls;?>" onclick="del()">重置系统</button>
		<button type="button" class="<?php echo $buttoncls;?>" onclick="down()">下载文件</button>
		<button type="button" class="<?php echo $buttoncls;?>" onclick="fastdown()">高速下载</button>
		<button type="button" class="<?php echo $buttoncls;?>" onclick="loginout()">退出登录</button>

	    <div class="form-group">
          <label for="xm">需要删除的姓名</label>
          <input type="text" class="form-control" id="xm"  name="xm">
	    </div>
	    <button type="submit" class="<?php echo $buttoncls;?>" onclick="doption()">提交</button>
	 	<br>
	    <br>
	    <div id="con"></div> 
	</div>

	
	<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

