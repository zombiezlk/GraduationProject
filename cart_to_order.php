<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$user_id = $_COOKIE['user_id'];

$query1 = "INSERT INTO bill(bill_id,user_id,tatol,bill_date) VALUES (0," .$user_id. ",null,NOW())";
mysqli_query($dbc,$query1);

$query2 = "SELECT bill_id FROM bill WHERE user_id=".$user_id;
$data = mysqli_query($dbc,$query2);
while($row = mysqli_fetch_array($data)){
	$bill_id = $row['bill_id']; 
}

$table_name = $_COOKIE['user_id'];
$query2 = "delete from cart".$table_name." where cart_id=".$_GET['cart_id'];
mysqli_query($dbc,$query2);


mysqli_close($dbc);

header("location:cart.php");
?>
