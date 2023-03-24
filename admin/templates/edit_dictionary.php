<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_dictionary) ?>
	
<h2>Редактирование страницы словаря для чайников</h2>
<?php
if(isset($_SESSION['edit_dictionary']['res'])){
    echo $_SESSION['edit_dictionary']['res'];
    unset($_SESSION['edit_dictionary']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название страницы словаря для чайников:</td>
		<td><input class="head-text" type="text" name="title" value="<?=htmlspecialchars($get_dictionary['name'])?>" /></td>
	  </tr>	  
	  <tr>
		<td colspan="2">
			<textarea id="editor1" class="full-text" name="text"><?=$get_dictionary['content']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
	  </tr>
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 

</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>