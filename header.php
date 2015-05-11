<?php
require_once('connectvars.php');
require_once('appvars.php');
$error_msg = ""; 
if(!isset($_COOKIE['username'])){
	if(isset($_POST['submit'])){
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));


		if(!empty($user_username) && !empty($user_password)){
			$query = "SELECT user_id,username FROM user WHERE username = '$user_username' AND password = sha1('$user_password')";
			$data = mysqli_query($dbc,$query);
			
			if(mysqli_num_rows($data) == 1){
				$row = mysqli_fetch_array($data);
				setcookie('user_id',$row['user_id']);
				setcookie('username',$row['username']);
				header("location:index.php");
			}
			else{
				$error_msg = "Sorry, you must enter a valid username and password to log in.";
			}
		}
		else{
			$error_msg = "Please enter your username and password to log in.";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/global.css" type="text/css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<title>Shoes Shop</title>
</head>
<body>
	<div class="container">
		<div>	
			<?php if(isset($_COOKIE['username'])){
				echo 	'<span><a href="cart.php">购物车</a></span>'.
					'<span><a href="order.php">我的订单</a></span>'.
					'<span><a href="logout.php">注销('.$_COOKIE['username'].')</a></span>';
				}
				else{
					echo 	'<span><a data-toggle="modal" href="#login">购物车</a></span>'.
						'<span><a data-toggle="modal" href="#login">我的订单</a></span>'.
						'<span><a data-toggle="modal" href="#login">登录</a></span>';
				} 
			?>
			
			<div id="login" class="modal hide fade" aria-hidden="true">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<label for="username">用户名</label>
					<input name="username" type="text">
					<label for="password">密码</label>
					<input name="password" type="password">
					<button name="submit" class="btn" type="submit">登录</button>
					<div><a href="register.php">注册</a></div>
				</form>
			</div>
		</div>
		<div class="navbar">
			<div class="navbar-inner">
			<a class="brand" href="index.php">Shoes Shop</a>
				<ul class="nav">
					<li><a href="index.php">首页</a></li>
					<li><a href="classify.php?goods_type=casual">休闲鞋</a></li>
					<li><a href="classify.php?goods_type=canvas">帆布鞋</a></li>
					<li><a href="classify.php?goods_type=sport">运动鞋</a></li>
					<li><a href="classify.php?goods_type=leather">皮鞋</a></li>
				</ul>
			</div>
		</div>	

