
<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
				<h1><img src="<?=TEMPLATE?>images/lider-sale.jpg" alt="Лидеры продаж" /></h1>
            
<?php if($eyestoppers): ?>
    <?php foreach($eyestoppers as $eyestopper): ?>
    <?php 
if($eyestopper['zakaz']>0){
	   $eyestopper['zakaz'] = '<div class="zakaz">Только под заказ</div>';  
    }else{
	   $eyestopper['zakaz'] = '<div class="nalich">В наличии</div>';
	}
?>
    <div class="product-index">
		<h2><a href="<?=PATH?>product/<?=$eyestopper['goods_id']?>"><?=$eyestopper['name']?></a></h2>
        <p>Артикул: <?=$eyestopper['articul']?></p>
<div class="product-table-img">
        <a href="<?=PATH?>product/<?=$eyestopper['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$eyestopper['img']?>" alt="" /></a>
</div>
        <?=$eyestopper['zakaz']?>
		<p>Цена : <span><?php if($eyestopper['price_6']>0) {echo($eyestopper['price_6']); echo(' -');}?></span> <span> <?=$eyestopper['price']?></span> руб.</p>
	<form action="<?=PATH?>addtocart/<?=$eyestopper['goods_id']?>" method="post" >
    <input name="goods_id" value="<?=$eyestopper['goods_id']?>" type="hidden"  />
    Кол-во: <input class="count-text" type="text" name="count" value="1" /> <br/>
    <input type="image" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину"  />
    </form>
	</div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Здесь товаров пока нет!</p>
<?php endif; ?>	
				
			</div>		