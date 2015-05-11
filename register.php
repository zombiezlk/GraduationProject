<?php
require_once('connectvars.php');
//Connect to database
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));

	if(!empty($username)&&!empty($password1)&&!empty($password2)&&$password1 == $password2){
		$query = "select * from user where username = '$username'";
		$data = mysqli_query($dbc,$query);
		if($data == false||mysqli_num_rows($data) == 0){
			$query = "INSERT INTO user(username,password)VALUES('$username',sha1('$password1'))";
			mysqli_query($dbc,$query);
			mysqli_close($dbc);
			echo '注册成功';
			header("location:index.php");
			exit();	
		}
		else{
			echo '用户名已存在';
			$username = "";
		}
	}
	else{
		echo '输入错误';
	}
}
mysqli_close($dbc);
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
<form id="register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset>
	<legend>注册</legend>
	<label for="username">用户名</label>
	<input id="username" type="text" name="username" value="<?php if(!empty($username))echo $username; ?>">
	<label for="password1">密码</label>
	<input id="password1" name="password1" type="password">
	<label for="password2">确认密码</label>
	<input id="password2" name="password2" type="password">
</fieldset>
<input class="btn" type="submit" value="提交" name="submit"/>
</form>
</body>
</html>

