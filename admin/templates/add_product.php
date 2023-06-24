<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	<h2>Добавление товара</h2>
<?php
if(isset($_SESSION['add_product']['res'])){
    echo $_SESSION['add_product']['res'];
}
?>

<form action="" method="post" enctype="multipart/form-data">
				
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название товара:</td>
		<td><input class="head-text" type="text" name="name" /></td>
	  </tr>
           <tr>
		<td class="add-edit-txt">Артикул:</td>
		<td><input class="head-text" type="text" name="articul" value="<?=$_SESSION['add_product']['articul']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(1 - 9):</td>
		<td><input class="head-text" type="text" name="price" value="<?=$_SESSION['add_product']['price']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(10 - 49):</td>
		<td><input class="head-text" type="text" name="price_1" value="<?=$_SESSION['add_product']['price_1']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(50 - 99):</td>
		<td><input class="head-text" type="text" name="price_2" value="<?=$_SESSION['add_product']['price_2']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(100 - 249):</td>
		<td><input class="head-text" type="text" name="price_3" value="<?=$_SESSION['add_product']['price_3']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(250 - 499):</td>
		<td><input class="head-text" type="text" name="price_4" value="<?=$_SESSION['add_product']['price_4']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(500 - 999):</td>
		<td><input class="head-text" type="text" name="price_5" value="<?=$_SESSION['add_product']['price_5']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(более 1000):</td>
		<td><input class="head-text" type="text" name="price_6" value="<?=$_SESSION['add_product']['price_6']?>" /></td>
	  </tr>

      <tr>
		<td class="add-edit-txt">Описание:</td>
		<td><input class="head-text" type="text" name="description" value="<?=$_SESSION['add_product']['description']?>" /></td>
        
	  </tr>
      <tr>
		<td>Родительская категория:</td>
		<td>
        <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
        	<?php foreach($cat as $key_parent => $item): ?>
                <?php if(count($item) > 1): // если это родительская категория ?>
                <option disabled=""><?=$item[0]?></option>
                <?php $i = 0; ?>
                <?php foreach($item['sub'] as $key => $sub): // цикл дочерних категорий ?>
                <option <?php if($key == $brand_id OR $key_parent == $brand_id AND $i == 0) {echo "selected"; $i = 1;} ?> value="<?=$key?>">&nbsp;&nbsp;- <?=$sub?></option>
                <?php endforeach; // конец цикла дочерних категорий ?>
                <?php elseif($item[0]): // если самостоятельная категория ?>
                <option <?php if($key_parent == $brand_id) echo "selected" ?> value="<?=$key_parent?>"><?=$item[0]?></option>
                <?php endif; // конец условия родительская категория ?>
            <?php endforeach; ?>
        </select>
        </td>
	  </tr>
       <tr>
		<td>Картинка товара:</td>
		<td><input type="file" name="baseimg" /></td>
	  </tr>
      <tr>
		<td>Краткое описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor1" class="anons-text" name="anons"><?=$_SESSION['add_product']['anons']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
	  </tr>
      <tr>
		<td>Подробное описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor2" class="anons-text" name="content"><?=$_SESSION['add_product']['content']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
</script>
		</td>
	  </tr>
<!--        <tr>-->
<!--            <td>Картинки галереи:</td>-->
<!--            <td></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td id="btnimg">-->
<!--                <div><input type="file" name="galleryimg[]" /></div>-->
<!--            </td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td>-->
<!--                <input type="button" id="add" value="Добавить поле" />-->
<!--                <input type="button" id="del" value="Удалить поле" />-->
<!--            </td>-->
<!--        </tr>-->
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 
</form>
<?php unset($_SESSION['add_product']); ?>	
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>