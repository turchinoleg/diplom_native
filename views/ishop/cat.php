<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
	<?#print_arr($favorites)?>
    <div class="kroshka">
<?php if(count($brand_name) > 1): // если подкатегория (слайдер, моноблок...) ?>
    <a href="<?=PATH?>"><?=SITE_NAME?></a> / <a href="<?=PATH?>category/<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <span><?=$brand_name[1]['brand_name']?></span>
    
    <?php 
	$brand_id = $brand_name[1]['brand_id'];
	$query = "SELECT * FROM brands WHERE brand_id = $brand_id";
    global $con;
	$res = mysqli_query($con, $query) ;
    $brand = array();
	$brand = mysqli_fetch_assoc($res);
	?>
    
<?php elseif(count($brand_name) == 1): // если не дочерняя категория ?>
    <a href="<?=PATH?>"><?=SITE_NAME?></a> / <span><?=$brand_name[0]['brand_name']?></span>
<?php endif; ?>
	</div> <!-- .kroshka -->
<!--  .vid-sort -->
<div id="anons"><?php if(isset($brand['anons'])) echo $brand['anons']; ?></div>
<?php if($products): // если получены товары категории ?>
<?php foreach($products as $product): ?>
	<?
	$is_favorite = false;
	if (in_array($product['goods_id'], $favorites)){
		$is_favorite = true;
	}
	?>
<?php 
if($product['zakaz']==0){
	   $product['zakaz'] = '<div class="nalich">В наличии</div>';  
    }elseif($product['zakaz']==1){
	   $product['zakaz'] = '<div class="zakaz">под заказ, 1-2 дня</div>';
	}elseif($product['zakaz']==2){
	   $product['zakaz'] = '<div class="zakaz">под заказ, 7-10 днeй</div>';
	}
?>
<?php if(!isset($_COOKIE['display']) OR $_COOKIE['display'] == 'grid'): // если вид - сетка ?>
<!-- Табличный вид продуктов -->				
<div class="product-table" id="<?=$product['goods_id']?>">
	<h2><a href="<?=PATH?>product/<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
    <p>Артикул: <?=$product['articul']?></p>
<div class="product-table-img-main">
    <div class="product-table-img">
		<a href="<?=PATH?>product/<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" /></a>
<!--		<div> <!-- Иконки -->
<!---->
<!---->
<!--            --><?php //if($product['hits']) echo '<img src="' .TEMPLATE. 'images/ico-cat-lider.png" alt="лидеры продаж" />'; ?>
<!--            --><?php //if($product['new']) echo '<img src="' .TEMPLATE. 'images/ico-cat-new.png" alt="новинка" />'; ?>
<!--            --><?php //if($product['sale']) echo '<img src="' .TEMPLATE. 'images/ico-cat-sale.png" alt="распродажа" />'; ?><!--							-->
<!--		</div> <!-- Иконки -->
	</div> <!-- .product-table-img -->
</div> <!-- .product-table-img-main -->
	<p class="cat-table-more"><a href="<?=PATH?>product/<?=$product['goods_id']?>">Подробнее...</a></p>
    <?=$product['zakaz']?>
	<p>Цена : <span><?php if($product['price_6']>0) {echo($product['price_6']); echo(' -');}?></span> <span><?=$product['price']?></span> руб.</p>
    <form action="<?=PATH?>addtocart/<?=$product['goods_id']?>" method="post" >
    <input name="goods_id" value="<?=$product['goods_id']?>" type="hidden"  />
    Кол-во: <input class="count-text" type="text" name="count" value="1" /> <br/>
    <input type="image" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину"  />
    </form>
</div> <!-- .product-table -->
<!-- Табличный вид продуктов -->
<?php else: // если линейный вид ?>
<!-- Линейный вид продуктов -->
<div class="product-line" id="<?=$product['goods_id']?>">					
	<div class="product-line-img">
		<a href="<?=PATH?>product/<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" width="48" alt="" /></a>
	</div>
	<div class="product-line-price">
    <p>Артикул: <?=$product['articul']?></p>
		<p>Цена : <span><?php if($product['price_6']>0) {echo($product['price_6']); echo(' -');}?></span> <span><?=$product['price']?></span> руб.</p>
		<form action="<?=PATH?>addtocart/<?=$product['goods_id']?>" method="post" >
    <input name="goods_id" value="<?=$product['goods_id']?>" type="hidden"  />
    Кол-во: <input class="count-text" type="text" name="count" value="1" /> <br /><br />
    <input type="image" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину"  />
    </form>
		F
		<p class="cat-line-more"><a href="<?=PATH?>product/<?=$product['goods_id']?>">Подробнее...</a></p>
	</div>	
	<div class="product-line-opis">
		<h2><a href="<?=PATH?>product/<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
		<p><?=$product['anons']?></p>
	</div>	
</div>
<!-- Линейный вид продуктов -->
<?php endif; // конец условия переключателя видов  ?>
<?php endforeach; ?>
<div class="clr"></div>
<?php if($pages_count > 1) pagination($page, $pages_count); ?>
<?php else: ?>
    <p>Здесь товаров пока нет!</p>
<?php endif; ?>	
<a name="nav"></a>			
</div> <!-- .catalog-index -->