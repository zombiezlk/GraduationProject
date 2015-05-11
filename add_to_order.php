<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$user_id = $_COOKIE['user_id'];
$username = $_COOKIE['username'];

$query1 = "INSERT INTO bill(bill_id,user_id,tatol,bill_date) VALUES (0," .$user_id. ",null,NOW())";
mysqli_query($dbc,$query1);

$query2 = "SELECT bill_id FROM bill WHERE user_id=".$user_id;
$data = mysqli_query($dbc,$query2);
while($row = mysqli_fetch_array($data)){
	$bill_id = $row['bill_id']; 
}

$table_name = $username.$bill_id;
$query3 = "CREATE TABLE ".$table_name."(
	goods_id INT,
	quantity INT
)";
mysqli_query($dbc,$query3);

$query4 = "INSERT INTO ".$table_name." (goods_id,quantity) VALUES(".$_GET['goods_id'].",".$_GET['quantity'].")";
mysqli_query($dbc,$query4);
 echo $query4;
$query5 = "SELECT goods_price FROM goods WHERE goods_id=".$_GET['goods_id'];
$data1 = mysqli_query($dbc,$query5);
$goods_price = mysqli_fetch_array($data1)['goods_price'];

$query6 = "UPDATE bill SET tatol=".$goods_price*$_GET['quantity']." WHERE bill_id=".$bill_id;
mysqli_query($dbc,$query6);

if($_GET['cart_id']){
$query7 = "delete from cart".$user_id." where cart_id=".$_GET['cart_id'];
mysqli_query($dbc,$query7);
header("location:cart.php");
}

mysqli_close($dbc);

?>
