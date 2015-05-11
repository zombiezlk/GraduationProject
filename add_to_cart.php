<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$table_name = $_COOKIE['user_id'];
$query_string = $_SERVER['QUERY_STRING'];

$query1 = "CREATE TABLE IF NOT EXISTS cart". $table_name.
	"(cart_id INT NOT NULL AUTO_INCREMENT,
	  goods_id  INT NOT NULL,
	  quantity  INT(4),
 	  PRIMARY KEY(cart_id))"; 

mysqli_query($dbc,$query1);

$query2 = "INSERT INTO cart".$table_name."(cart_id,goods_id,quantity)VALUES(0,".$_GET['goods_id'].",".$_GET['quantity'].")";

mysqli_query($dbc,$query2);
mysqli_close($dbc);
header("location:goods.php?".$query_string);
?>
