<?php
if(isset($_COOKIE['user_id'])){
	setcookie('user_id','',time()-3600);
	setcookie('username','',time()-3600);
}
	$home_url = 'localhost://'.$_SERVER['HTTP_POST'].dirname($_SERVER['PHP_SELF']).'index.php';
	header("location:index.php");
?>
