<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	
<h2>Добавление категории</h2>
<?php
if(isset($_SESSION['add_brand']['res'])){
    echo $_SESSION['add_brand']['res'];
    unset($_SESSION['add_brand']);
}
?>


<form action="" method="post">
				
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название категории:</td>
		<td><input class="head-text" type="text" name="brand_name" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Позиция категории:</td>
		<td><input class="head-text" type="text" name="brand_position" /></td>
	  </tr>
      <tr>
		<td>Анонс категории:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor1" class="full-text" name="anons"></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
	  </tr>
      <tr>
		<td>Родительская категория:</td>
		<td><select class="select-inf" name="parent_id">
        	<option value="0">Самостоятельная категория</option>
            <?php foreach($cat as $key => $value): ?>
            <option value="<?=$key?>"><?=$value[0]?></option>
            <?php endforeach; ?>
        </select></td>
        </tr>
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 

</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>