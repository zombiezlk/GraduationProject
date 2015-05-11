<?php
require_once('header.php');
$dbc1 = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$goods_type = $_GET['goods_type'];
$query1 = "SELECT * FROM goods WHERE goods_type='".$goods_type."'";
$data1 = mysqli_query($dbc1,$query1);
if (!$data1) {
				printf("Error: %s\n", mysqli_error($dbc1));
 						exit();
					}
$count = 0;

echo '<div id="content">';
while($row1 = mysqli_fetch_array($data1)){
	$count++;
	if($count%3 ==1){
		echo '<div class="row">';
	}
	echo '<div class="span4"><div><a href="goods.php'.
		'?goods_id=' .$row1['goods_id'] . 
		'&amp;goods_name=' . $row1['goods_name'] . 
		'&amp;goods_type=' . $row1['goods_type'] .
		'&amp;goods_price=' . $row1['goods_price'] .
		'&amp;goods_num=' . $row1['goods_num'] .
		'&amp;screenshot=' . $row1['screenshot'] .
		'"><img src="' . GW_UPLOADPATH . $row1['screenshot'] . 
		'"></a><div>' .  $row1['goods_name'] . '</div></div></div>';
	if($count%3 == 0 || $count == count($row1)){
		echo '</div>';
	}
}
echo '</div>'
?>

<?php
require_once('footer.php');
?>
