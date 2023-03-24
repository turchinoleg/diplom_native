<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_service) ?>
	
<h2>Добавление услуги</h2>
<?php
if(isset($_SESSION['add_service']['res'])){
    echo $_SESSION['add_service']['res'];
    unset($_SESSION['add_service']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название услуги:</td>
		<td><input class="head-text" type="text" name="title" /></td>
	  </tr>
	  <tr>
		<td>Ключевые слова:</td>
		<td><input class="head-text" type="text" name="keywords" value="<?=htmlspecialchars($_SESSION['add_service']['keywords'])?>" /></td>
	  </tr>
      <tr>
		<td>Описание:</td>
		<td><input class="head-text" type="text" name="description" value="<?=htmlspecialchars($_SESSION['add_service']['description'])?>" /></td>
	  </tr>
	  <tr>
		<td>Позиция услуги:</td>
		<td><input class="num-text" type="text" name="position" value="<?=$_SESSION['add_service']['position']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент Х:</td>
		<td><input class="num-text" type="text" name="price" value="<?=$_SESSION['add_service']['price']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент ручки тампон:</td>
		<td><input class="num-text" type="text" name="promo_price_1" value="<?=$_SESSION['add_service']['promo_price_1']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент кружки тампон:</td>
		<td><input class="num-text" type="text" name="promo_price_2" value="<?=$_SESSION['add_service']['promo_price_2']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент сублимация А4:</td>
		<td><input class="num-text" type="text" name="promo_price_3" value="<?=$_SESSION['add_service']['promo_price_3']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент брелоки:</td>
		<td><input class="num-text" type="text" name="promo_price_4" value="<?=$_SESSION['add_service']['promo_price_4']?>" /></td>
	  </tr>
	  <tr>
		<td>Ценовой коэффициент ежедневники оттиск:</td>
		<td><input class="num-text" type="text" name="promo_price_5" value="<?=$_SESSION['add_service']['promo_price_5']?>" /></td>
	  </tr>
	  <tr>
		<td>Позиция услуги:</td>
		<td><input class="head-text" type="text" name="img_path" value="<?=$_SESSION['add_service']['img_path']?>" /></td>
	  </tr>
	   <tr>
		<td>Содержание услуги:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor2" class="full-text" name="text"><?=$_SESSION['add_service']['text']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
</script>
		</td>
	  </tr>
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 

</form>
<?php unset($_SESSION['add_service']); ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>