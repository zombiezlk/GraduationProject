<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$table_name = $_COOKIE['user_id'];
$query = "delete from cart".$table_name." where cart_id=".$_GET['cart_id']; echo $query;
mysqli_query($dbc,$query);
mysqli_close($dbc);

header("location:cart.php");
?>
