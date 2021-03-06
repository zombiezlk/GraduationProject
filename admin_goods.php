﻿<?php
require_once('connectvars.php');
require_once('appvars.php');
//Connect to database
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(isset($_POST['submit'])){
	$goods_name = mysqli_real_escape_string($dbc,trim($_POST['goods_name']));
	$goods_type = mysqli_real_escape_string($dbc,trim($_POST['goods_type']));
	$goods_price = mysqli_real_escape_string($dbc,trim($_POST['goods_price']));
	$goods_num = mysqli_real_escape_string($dbc,trim($_POST['goods_num']));
	$screenshot = $_FILES['screenshot']['name'];

	if(!empty($goods_name)&&!empty($goods_type)&&!empty($goods_price)&&!empty($goods_num)&&!empty($screenshot)){
		$target = GW_UPLOADPATH.$screenshot;
		if(move_uploaded_file($_FILES['screenshot']['tmp_name'],$target)){
			$query = "INSERT INTO goods VALUES (0,'$goods_name','$goods_type','$goods_price','$goods_num','$screenshot')";
			mysqli_query($dbc,$query); 
			echo '成功添加该商品';
		
			mysqli_close($dbc);
		}
	}
	else{
		echo '请输入完整信息';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/global.css" type="text/css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<form id="addgoods" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>添加商品</legend>
	<label for="goods_name">商品名</label>
	<input id="goods_name" type="text" name="goods_name">
	<label for="goods_type">商品类型</label>
	<select id="goods_type" name="goods_type">
		<option value="casual">休闲鞋</option>
		<option value="canvas">帆布鞋</option>
		<option value="sport">运动鞋</option>
		<option value="leather">皮鞋</option>
	</select>
	<label for="goods_price">商品价格</label>
	<input id="goods_price" name="goods_price" type="text">
	<label for="goods_num">商品数量</label>
	<input id="goods_num" name="goods_num" type="text">
	<label for="screenshot">商品图片</label>
	<input id="screenshot" name="screenshot" type="file">
</fieldset>
<input class="btn" type="submit" value="添加" name="submit"/>
</form>
</body>
</html>

