<?php defined('ISHOP') or die('Access denied'); ?>
<?#print_arr($product);?>
<?php if($goods): // если есть запрошенный товар ?>  
<div class="kroshka">
<?php if(count($brand_name) > 1): // если подкатегория (слайдер, моноблок...) ?>
    <a href="<?=PATH?>"><?=SITE_NAME?></a> / <a href="<?=PATH?>category/<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <a href="<?=PATH?>category/<?=$brand_name[1]['brand_id']?>"><?=$brand_name[1]['brand_name']?></a> / <span><?=$goods['name']?></span>
<?php elseif(count($brand_name) == 1): // если не дочерняя категория ?>
    <a href="<?=PATH?>"><?php echo $site_name; ?></a> / <a href="<?=PATH?>category/<?=$brand_name[0]['brand_id']?>"><?=$brand_name[0]['brand_name']?></a> / <span><?=$goods['name']?></span>
<?php endif; ?>
</div> <!-- .kroshka -->
<?php
/* if($goods['zakaz']>0){
	   $goods['zakaz'] = '<div class="zakaz">Только под заказ</div>';  
    }else{
	   $goods['zakaz'] = '<div class="nalich">В наличии</div>';
	}*/
  if($goods['zakaz']==0){
     $goods['zakaz'] = '<div class="nalich">В наличии</div>';  
    }elseif($goods['zakaz']==1){
     $goods['zakaz'] = '<div class="zakaz">под заказ, 1-2 дня</div>';
  }elseif($goods['zakaz']==2){
     $goods['zakaz'] = '<div class="zakaz">под заказ, 7-10 днeй</div>';
  }
?>
<div class="catalog-detail">
<h1><?=$goods['name']?></h1>
<p>Артикул:<?=$goods['articul']?></p><br/>
<img src="<?=PRODUCTIMG?><?=$goods['img']?>" style="float: left;" />
<div class="short-opais">
    <?=$goods['anons']?><br />
    <p class="price-detail"><?=$goods['zakaz']?><br /> 
    <table id="sort" class="tabl sort" cellspacing="1">
	  <tr class="no_sort">
		<th class="number">Количество</th>
		<th class="str_name">Цена</th>
	  </tr>
      <tr>
      	<td style="width:80px">1 - 9</td>
        <td style="width:80px"><?=$goods['price']?> руб.</td>
      </tr>
      <tr id="light">
      	<td style="width:80px">10 - 49</td>
        <td style="width:80px"><?=$goods['price_1']?> руб.</td>
      </tr>
      <tr>
      	<td style="width:80px">50 - 99</td>
        <td style="width:80px"><?=$goods['price_2']?> руб.</td>
      </tr>
      <tr id="light">
      	<td style="width:80px">100 - 249</td>
        <td style="width:80px"><?=$goods['price_3']?> руб.</td>
      </tr>
      <tr>
      	<td style="width:80px">250 - 499</td>
        <td style="width:80px"><?=$goods['price_4']?> руб.</td>
      </tr>
      <tr id="light">
      	<td style="width:80px">500 - 999</td>
        <td style="width:80px"><?=$goods['price_5']?> руб.</td>
      </tr>
      <tr>
      	<td style="width:80px">более 1000</td>
        <td style="width:80px"><?=$goods['price_6']?> руб.</td>
      </tr>
    </table>
    <form action="<?=PATH?>addtocart/<?=$goods['goods_id']?>" method="post" >
    <input name="goods_id" value="<?=$goods['goods_id']?>" type="hidden"  />
    Количество: <input class="count-text" type="text" name="count" value="1" /> <br/><br/>
    <input type="image" src="<?=TEMPLATE?>images/addcard-detail.jpg"  />
    </form>
    </p>
  
</div> <!-- .short-opais -->

<div class="clr"></div>

<?php if($goods['img_slide']): // если есть картинки галереи ?>
<div class="item_gallery">
   <div class="item_thumbs">
   <?php foreach($goods['img_slide'] as $item): ?>
       <a rel="gallery" title="<?=$goods['name']?>" href="<?=GALLERYIMG?>photos/<?=$item?>"><img src="<?=GALLERYIMG?>thumbs/<?=$item?>" /></a>
   <?php endforeach; ?>
   </div> <!-- .item_thumbs -->
</div> <!-- .item_gallery -->
<?php endif; ?>

<div class="long-opais">
<?=$goods['content']?>				
</div> <!-- .long-opais -->
   
</div> <!-- .catalog-detail -->

<?php else: ?>
    <div class="error">Такого товара нет</div>
<?php endif; ?>