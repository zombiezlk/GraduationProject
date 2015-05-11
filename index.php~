<?php
require_once('header.php');
$dbc1 = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query1 = "SELECT * FROM goods";
$data1 = mysqli_query($dbc1,$query1);
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
echo '</div>';
?>

<!--<div id="content">
	<div class="row">
		<div class="span4">
			<div>
				<a href=""><img src="img\1.jpg"></a>
				<div>英伦单鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\2.jpg"></a>
				<div>时尚单鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\3.jpg"></a>
				<div>潮流板鞋</div>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="span4">
			<div>
				<a href=""><img src="img\4.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\5.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\6.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
	</div>



      	<div class="row">
		<div class="span4">
			<div>
				<a href=""><img src="img\7.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\8.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
		<div class="span4">
			<div>
				<a href=""><img src="img\9.jpg"></a>
				<div>超酷运动跑鞋</div>
			</div>
		</div>
	</div>

</div>-->

<?php
require_once('footer.php');
?>
