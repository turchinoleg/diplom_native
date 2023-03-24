<?php defined('ISHOP') or die('Access denied'); ?>
<div id="content-zakaz">
	<h2>Оформление заказа</h2>
 <?php
 if(isset($_SESSION['order']['res'])){
    echo $_SESSION['order']['res'];
 }
 ?>
 <?php if($_SESSION['cart']): // проверка корзины, если в корзине есть товары ?>
	<table class="zakaz-maiin-table" border="0" cellspacing="0" cellpadding="0">
	<form method="post" action="">
	  <tr>
		<td class="z_top">&nbsp;&nbsp;&nbsp;&nbsp;наименование</td>
		<td class="z_top" align="center">количество</td>
		<td class="z_top" align="center">стоимость</td>
		<td class="z_top" align="center">&nbsp;</td>
	  </tr>
<?php foreach($_SESSION['cart'] as $key => $item): ?>
<?php   if($item['qty']<10){
			$item['price'];
		}elseif($item['qty']>9 AND $item['qty']<50) {
			if($item['price_1']>0) {
				$item['price'] = $item['price_1'];
			}else{
				$row['price'];
			}
		}elseif($item['qty']>49 AND $item['qty']<100) {
			if($item['price_2']>0) {
				$item['price'] = $item['price_2'];
			}else{
				$item['price'];
			}
		}elseif($item['qty']>99 AND $item['qty']<250) {
			if($item['price_3']>0){
				 $item['price'] = $item['price_3'];
			}else{
				$item['price'];
			}
		}elseif($item['qty']>249 AND $item['qty']<500) {
			if($item['price_4']>0) {
				$item['price'] = $item['price_4'];
			}else{
				$item['price'];
			}
		}elseif($item['qty']>499 AND $item['qty']<1000) {
			if($item['price_5']>0){
				 $item['price'] = $item['price_5'];
			}else{
				$item['price'];
			}
		}elseif($item['qty']>999) {
			if($item['price_6']>0){
				 $item['price'] = $item['price_6'];
			}else{
				$item['price'];
			}
		} ?>
	  <tr>
		<td class="z_name">
			<a href="<?=PATH?>product/<?=$key?>"><img src="<?=PRODUCTIMG?><?=$item['img']?>" width="32" title="" /></a> 
			<a href="<?=PATH?>product/<?=$key?>"><?=$item['name']?></a>, артикул: <?=$item['articul']?>
		</td>
		<td class="z_kol"><input id="id<?=$key?>" class="kolvo" type="text" value="<?=$item['qty']?>" name="qty" /></td>
		<td class="z_price"><?=$item['price']?> руб.</td>
		<td class="z_del"><a href="<?=PATH?>?view=cart&amp;delete=<?=$key?>"><img src="<?=TEMPLATE?>images/delete.jpg" title="удалить товар из заказа" /></a></td>
	  </tr>
<?php endforeach; ?>
	  <tr>
		<td class="z_bot">&nbsp;&nbsp;&nbsp;&nbsp;Итого:</td>
		<td class="z_bot" colspan="3" align="right"><?=$_SESSION['total_quantity']?> шт &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$_SESSION['total_sum']?> руб.</td>
	  </tr>
	  
	</table>
    <img class="pereshetl" src="<?=TEMPLATE?>images/perechetl.jpg" />
	
	<div class="sposob-dostavki">
		<h4>Способы доставки:</h4>
        <?php foreach($dostavka as $item): ?>
        <p><input type="radio" name="dostavka" value="<?=$item['dostavka_id']?>" /><?=$item['name']?> <span id="coment"><?=$item['anons']?></span></p>
        <?php endforeach; ?>
	</div>		
	
	
	<h3>Информация для доставки:</h3>
<?php if(!$_SESSION['auth']['user']): // проверка авторизации ?>	
	<table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
	  <tr class="notauth">
		<td class="zakaz-txt">*ФИО</td>
		<td class="zakaz-inpt"><input type="text" name="name" value="<?=htmlspecialchars($_SESSION['order']['name'])?>" /></td>
		<td class="zakaz-prim">Пример: Иванов Сергей Александрович</td>
	  </tr>
	  <tr class="notauth">
		<td class="zakaz-txt">*Е-маил</td>
		<td class="zakaz-inpt"><input type="text" name="email" value="<?=htmlspecialchars($_SESSION['order']['email'])?>" /></td>
		<td class="zakaz-prim">Пример: test@mail.ru</td>
	  </tr>
	  <tr class="notauth">
		<td class="zakaz-txt">*Телефон</td>
		<td class="zakaz-inpt"><input type="text" name="phone" value="<?=htmlspecialchars($_SESSION['order']['phone'])?>" /></td>
		<td class="zakaz-prim">Пример: 8 937 999 99 99</td>
	  </tr>
	  <tr class="notauth">
		<td class="zakaz-txt">*Адрес доставки</td>
		<td class="zakaz-inpt"><input type="text" name="address" value="<?=htmlspecialchars($_SESSION['order']['addres'])?>" /></td>
		<td class="zakaz-prim">Пример: г. Москва, пр. Мира, ул. Петра Великого д.19, кв 51.</td>
	  </tr>
	  <tr>
		<td class="zakaz-txt" style="vertical-align:top;">Комментарии к заказу </td>
		<td class="zakaz-txtarea"><textarea name="prim"><?=htmlspecialchars($_SESSION['order']['prim'])?></textarea></td>
		<td class="zakaz-prim" style="vertical-align:top;">Пример: Магнит марка - прозрачный, значок на цанге - 21 мм, перед доставкой обязательно позвонить за 1 час </td>
	  </tr>
	  <tr>
		<td colspan="3">Согласен с <a href="/policy.pdf" target="_blank">политикой конфиденциальности</a></td>
	  </tr>
	</table>
    <?php else: // если пользователь авторизован ?>
    <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
        <tr>
    		<td class="zakaz-txt" style="vertical-align:top;">Комментарии к заказу </td>
    		<td class="zakaz-txtarea"><textarea name="prim"></textarea></td>
    		<td class="zakaz-prim" style="vertical-align:top;">Пример: Магнит марка - прозрачный, значок на цанге - 21 мм, перед доставкой обязательно позвонить за 1 час </td>
        </tr>
	</table>
<?php endif; // конец условия проверки авторизации ?>		
		<input type="image" name="order" src="<?=TEMPLATE?>images/zakazat.jpg" /> 
		
		<br /><br /><br /><br />	
	
	</form>
    <?php else: // если товаров нет ?>
        Корзина пуста
    <?php endif; // конец условия проверки корзины ?>
<?php
unset($_SESSION['order']);
?>    
</div> <!-- .content-zakaz -->