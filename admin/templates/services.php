<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	<h2>Список услуг</h2>
<?php
if(isset($_SESSION['answer'])){
    echo $_SESSION['answer'];
    unset($_SESSION['answer']);
}
?>
<?php
if(isset($_SESSION['services_vars']['res'])){
    echo $_SESSION['services_vars']['res'];
    unset($_SESSION['services_vars']['res']);
}
?>
	<a href="?view=add_service"><img class="add_some" src="<?=ADMIN_TEMPLATE?>images/add_service.jpg" alt="добавить страницу" /></a>
	<table id="sort" class="tabl sort" cellspacing="1">
	  <tr class="no_sort">
		<th class="number">№</th>
		<th class="str_name">Название страницы</th>
		<th class="str_sort">Сортировка</th>
		<th class="str_action">Действие</th>
	  </tr>
<?php $i = 1; ?>
<?php foreach($services as $item): ?>
<tr id="<?=$item['service_id'];?>">
	<td class="position" style="width:25px"><?=$i?></td>
	<td style="width:360px" class="name_service"><?=$item['title']?></td>
	<td class="position" style="width:80px"><?=$item['position']?></td>
	<td style="width:160px"><a href="?view=edit_service&amp;service_id=<?=$item['service_id']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_service&amp;service_id=<?=$item['service_id']?>" class="del">удалить</a></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>      
	</table>
	<a href="?view=add_service"><img class="add_some" src="<?=ADMIN_TEMPLATE?>images/add_service.jpg" alt="добавить страницу" /></a>
	<br>
	<h2>Список переменных</h2>
	<form method="POST" action="">
	<table id="sort_vars" class="tabl sort" cellspacing="1">
	  <tr class="no_sort">
		<th class="number">№</th>
		<th class="str_name">Название переменной</th>
		<th class="str_name">Код переменной</th>
		<th class="str_sort">Значение</th>
	  </tr>
	  <?
	  #print_arr($services_vars);
	  $servard = array('Печать А3', "Сетка-шелкуха", 'Тампон ручки', 'Тампон кружки', 'Сублимация A4', 'Тиснение', 'Ширик', 'Постпечать', 'Интерьерка', 'Термо', 'Спот', 'Шелкуха (прокат)', 'Закатка', 'Заливка', 'Флаги', 'Гравировка', 'Доделка 1', 'Доделка 2','Стенды', 'Оракал', 'Винил', 'Пакеты шелкуха', 'Штендеры', 'Дисконтки', 'Браслеты','Шелкография сетка'
	  );
	  $j = 1;
	  foreach($services_vars[0] as $key => $value):?>
	  <tr>
	  	<td class="position" style="width:25px"><?=$j++;?></td>
	  	<td class="name_service" style="width:520px"><?=$servard[$j-2];?></td>
	  	<td class="name_service" style="width:520px"><?=$key;?></td>
	  	<td class="name_service" style="width:80px">
	  		<input type="text" name="<?=$key;?>" class="services_vars_value" value="<?=$value;?>">
	  	</td>
	  </tr>
	  <?endforeach;?>	  
	</table>
	<button class="services_vars_submit" type="submit">Изменить значения</button>
	</form>

	</div> <!-- .content -->
<div class="load"></div> <!-- .load -->
<div class="res"></div> <!-- .res -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>