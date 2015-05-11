<?php
require_once('header.php');
?>

<div>
	<div class="row">
		<div class="span4">
		<img class="goods_img" src="<?php echo GW_UPLOADPATH.$_GET['screenshot'] ?>">
		</div>
		<div id="goodsinfo" class="span6">
			<div class="row"><div class="span6"><h3><?php echo $_GET['goods_name'] ?></h3></div></div>
			<div class="row"><div class="span6">价格:<?php echo $_GET['goods_price'] ?></div></div>
			<div class="row"><div class="span6">数量:<input type="text" id="quantity" value="1" name="quantity"/><?php echo '(库存'. $_GET['goods_num'] .')' ?></div></div>
			<div class="row">
				<div class="span1">
					<?php
						if(isset($_COOKIE['username'])){
							echo '<input class="btn get_quantity" type="submit" value="购买" href="add_to_order.php"/>';}
						else{
							echo '<input class="btn" type="submit" value="购买" data-toggle="modal" href="#login">';
						}
					?>
				</div>
				<div class="span5">
					<?php 
						if(isset($_COOKIE['username'])){
							echo '<input class="btn  get_quantity" type="submit" value="加入购物车" href="add_to_cart.php"/>';}
						else{
							echo '<input class="btn" type="submit" value="加入购物车" data-toggle="modal" href="#login">';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js\get_quantity.js"></script>
<?php require_once('footer.php');?>
