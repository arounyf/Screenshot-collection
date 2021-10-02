<?php require "config/main.php";?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
      <meta charset="UTF-8"> 
      <title><?php echo $indexna;?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
      <style type="text/css">
            #parent{height: 30px;}#son{height: 30px;}
      </style> 
</head> 
<body> 
      <?php include "nav.php"; ?>
      <?php
            require "config/db.php";
            $sql = "select count(*) from $dbtable where file = '0'";
            $result = $db -> query($sql);
            $data = $result -> fetch_row();

            $sql2 = "select count(*) from $dbtable where file = '1'";
            $result2 = $db -> query($sql2);
            $data2 = $result2 -> fetch_row();
            $sum = $data2[0]/($data2[0] + $data[0]);
            $jindu = round($sum,2) * 100;
      ?>
      <div class="container">
            <div id="time" style="height: 30px"></div>
            <marquee><span style="font-weight: bolder;font-size: 16px;" class = "<?php echo $textcls?>"><?php echo $gg?></span></marquee>
            <div class="progress">
                  <div class="<?php echo $progresscls;?>" style="width:<?php echo $jindu;?>%"></div>
            </div>
            <div class="form-group">
                    <label for="userinput">你的姓名</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="xm" id="userinput" onfocus="rwidth()">
                    <label for="file" class="mt-2">选择图片</label>
                    <input type="file" class="form-control-file" id="userfile3" name="userfile"  onfocus="rwidth()">
            </div>
            <!--    进度条 -->
            <div class="progress"  id="parent" style="margin-bottom: 15px">
                <div class="<?php echo $progresscls;?>" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"  id="son"></div>
            </div>
            <button type="submit" name="btn" class="<?php echo $buttoncls;?>" onclick="namevalue()" style="margin-bottom: 15px">提交</button>
            <div id="con"></div> 
      </div>
      <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
      <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="function/js/index.js"></script>
</body> 
</html>