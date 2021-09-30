<?php require "function/config.php";?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $wtjna?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>


	<?php include "nav.php" ?>

	<div class="container">
	<?php
	require "./function/db.php";

	// 查询人数

	$sql = "select count(*) from $dbtable where file = '0'";
	$result = $db -> query($sql);
	$data = $result -> fetch_row();
	$wtjcount = $data[0];


	$sql2 = "select count(*) from $dbtable where file = '1'";
	$result2 = $db -> query($sql2);
	$data2 = $result2 -> fetch_row();
	$ytjcount = $data2[0];

	function ewtj($wtjcount){
		require "./function/db.php";
		require "function/config.php";
		echo "<ul class='list-group'><li class='$licls' aria-current='true' style='border: none'>";
		echo "未提交".$wtjcount."人";
		echo "</li>";
		$sql_qs = "select qs from $dbtable where file = '0' group by qs";
		$result_qs = $db -> query($sql_qs);

		while($row=$result_qs->fetch_object()){
			echo '<li class="list-group-item text-danger" style="white-space:nowrap;font-size: 15px;padding: .75rem 0.5rem;">';
			echo "<span class='$spancls' style='text-indent:-5px;'>".$row->qs."</span>";
			$sql = "select name from $dbtable where file = '0' and qs = '$row->qs'";
			$result = $db -> query($sql);
			while($row=$result->fetch_object()){
				echo $row->name." ";
			}
			echo "</li>";
		}
		echo "</ul>";
		echo "<br>";
	}

	function eytj($ytjcount){
		require "./function/db.php";
		require "function/config.php";
		echo "<ul class='list-group'><li class='$licls' aria-current='true' style='border: none'>";
		echo "已提交".$ytjcount."人";
		echo "</li>";
		$sql = "select name,fname,qs,time from $dbtable where file = '1' order by time desc";
		$result = $db -> query($sql);

		while($row=$result->fetch_object()){
			echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
			echo "<a href='upload/$row->fname'> $row->qs $row->name</a>";
			echo "<span class='$spancls'>".$row->time."</span>";
			echo "</li>";
		}
		echo "</ul>";
	}

	if ($wtjcount > 0 && $ytjcount > 0){ewtj($wtjcount);}
	if ($ytjcount > 0){eytj($ytjcount);}




	?>

	</div>


	<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

