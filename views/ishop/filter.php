<?php defined('ISHOP') or die('Access denied'); ?>
<div class="catalog-index">
    <h1>Выбор по параметрам</h1>
    <?php if($products['notfound']): // если ничего не найдено ?>
        <?php echo $products['notfound'] ?>
    <?php else: // если есть результаты поиска ?>
<?php foreach($products as $product):  
if($product['zakaz']>0){
	   $product['zakaz'] = '<div class="zakaz">Только под заказ</div>';  
    }else{
	   $product['zakaz'] = '<div class="nalich">В наличии</div>';
	}
?>
<!-- Табличный вид продуктов -->				
<div class="product-table">
	<h2><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
    <p>артикул: <?=$product['articul']?></p>
<div class="product-table-img-main">
    <div class="product-table-img">
		<a href="?view=product&amp;goods_id=<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" width="64" /></a>
		<div> <!-- Иконки -->
            <?php if($product['hits']) echo '<img src="' .TEMPLATE. 'images/ico-cat-lider.png" alt="лидеры продаж" />'; ?>
            <?php if($product['new']) echo '<img src="' .TEMPLATE. 'images/ico-cat-new.png" alt="новинка" />'; ?>
            <?php if($product['sale']) echo '<img src="' .TEMPLATE. 'images/ico-cat-sale.png" alt="распродажа" />'; ?>							
		</div> <!-- Иконки -->
	</div> <!-- .product-table-img -->
</div> <!-- .product-table-img-main -->
	<p class="cat-table-more"><a href="?view=product&amp;goods_id=<?=$product['goods_id']?>">подробнее...</a></p>
    <?=$product['zakaz']?>
	<p>Цена : <span><?php if($product['price_6']>0) {echo($product['price_6']); echo(' -');}?></span> <span> <?=$product['price']?></span> руб.</p>
    <form action="?view=addtocart&amp;goods_id=<?=$product['goods_id']?>?>" method="post" >
    <input name="goods_id" value="<?=$product['goods_id']?>" type="hidden"  />
    Кол-во: <input class="count-text" type="text" name="count" value="1" /> <br/>
    <input type="image" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину"  />
    </form>
	
</div> <!-- .product-table -->
<!-- Табличный вид продуктов -->
<?php endforeach; ?>
    <?php endif; ?>
</div> <!-- .catalog-index -->