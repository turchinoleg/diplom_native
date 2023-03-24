<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	
<h2>Добавление страницы словаря для чайников</h2>
<?php
if(isset($_SESSION['add_dictionary']['res'])){
    echo $_SESSION['add_dictionary']['res'];
    unset($_SESSION['add_dictionary']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название страницы словаря для чайников:</td>
		<td><input class="head-text" type="text" name="title" /></td>
	  </tr>	 
	   <tr>
		<td>Содержание страницы словаря для чайников:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor2" class="full-text" name="text"><?=$_SESSION['add_dictionary']['text']?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
</script>
		</td>
	  </tr>
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 

</form>
<?php unset($_SESSION['add_dictionary']); ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>