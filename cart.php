<?php
require_once('header.php');
?>
<div class="cart">
	<div class="row">
		<div class="span4">商品信息</div>
		<div class="span2"></div>
		<div class="span2">单价（元）</div>
		<div class="span1">数量</div>
		<div class="span1">金额</div>
		<div class="span1">操作</div>
	</div>
	<?php 
		if(isset($_COOKIE['user_id'])){
			$dbc1 = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			$table_name = $_COOKIE['user_id'];
			$query1 = "select * from cart" .$table_name;
			$data1 = mysqli_query($dbc1,$query1);
			while($row1 = mysqli_fetch_array($data1)){
				$query2 = "select * from goods where goods_id=".$row1['goods_id'];
				$data2= mysqli_query($dbc1,$query2);
				$row2 = mysqli_fetch_array($data2);
				echo '	<div class="row">
						<div class="span4">'.$row2['goods_name'].'</div>'.
						'<div class="span2">'.$row2['goods_type'].'</div>'.
						'<div class="span2">'.$row2['goods_price'].'</div>'.
						'<div class="span1">'.$row1['quantity'].'</div>'.
						'<div class="span1">'.$row2['goods_price']*$row1['quantity'].'</div>'.	
						'<div class="span1"> <a href="delete_from_cart.php?cart_id='.$row1['cart_id'].'">删除 </a><a href="add_to_order.php?cart_id='.$row1['cart_id'].'&goods_id='.$row1['goods_id'].'&quantity='.$row1['quantity'].'">购买</a></div>
					</div>';
			}
		}
	?>
<?php require_once('footer.php');?>
