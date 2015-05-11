<?php
require_once('header.php');
?>
<div class="order">
	<div class="row">
		<div class="span3">商品信息</div>
		<div class="span2"></div>
		<div class="span2">单价（元)</div>
		<div class="span1">数量</div>
		<div class="span2">实付款(元)</div>
		<div class="span1">操作</div>
	</div>

	<?php 
		if(isset($_COOKIE['user_id'])){
			$dbc1 = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			$user_id = $_COOKIE['user_id'];
			$username = $_COOKIE['username'];
			$query1 = "SELECT bill_id FROM bill WHERE user_id=".$user_id;
			$data1 = mysqli_query($dbc1,$query1);
			while($row1 = mysqli_fetch_array($data1)){
				$bill_id = $row1['bill_id'];
				$table_name = $username.$bill_id;
				$query2 = "SELECT * FROM ".$table_name;
				$data2 =  mysqli_query($dbc1,$query2);
				//if (!$data2) {
				//	 printf("Error: %s\n", mysqli_error($dbc1));
 				//		exit();
				//	}
				if($data2){
				while($row2 =  mysqli_fetch_array($data2)){
					$query3 = "SELECT * FROM goods WHERE goods_id=".$row2['goods_id'];
					$data3 = mysqli_query($dbc1,$query3);
					$row3 = mysqli_fetch_array($data3);
					echo'	<div class="row">
						<div class="span3">'.$row3['goods_name'].'</div>'.
						'<div class="span2">'.$row3['goods_type'].'</div>'.
						'<div class="span2">'.$row3['goods_price'].'</div>'.
						'<div class="span1">'.$row2['quantity'].'</div>'.
						'<div class="span2">'.$row3['goods_price']*$row2['quantity'].'</div>'.	
						'<div class="span1"> <a href="#">删除</a></div>
						</div>';
				}
				}
				else{continue;}
			}
		}
echo '</div>';
?>

<?php require_once('footer.php');?>

