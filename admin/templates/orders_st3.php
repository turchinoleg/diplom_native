<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	<h2>Заказы <span class="small">(необработанные заказы подсвечены серым, на рассмотрение подсвечены зеленым, отменные подсвечены красным)</span></h2>

<?php
if(isset($_SESSION['answer'])){
    echo $_SESSION['answer'];
    unset($_SESSION['answer']);
}
?>
<?php if($orders):?>
<table class="tabl" cellspacing="1">
    <tr>
        <th class="number">№ заказа</th>
        <th class="str_name" style="width:280px;">Покупатель</th>
        <th class="str_sort">Дата</th>
        <th class="str_action">Просмотр</th>
    </tr>
<?php foreach($orders as $item): ?>
<tr <?php if($item['status'] == 0) echo "class='highlight'"; elseif($item['status'] == 2) echo "class='proceselight'";elseif($item['status'] == 3) echo "class='otkazlight'"; ?> >
    <td><?=$item['order_id']?></td>
    <td class="name_page"><?=htmlspecialchars($item['name'])?></td>
    <td><?=$item['date']?></td>
    <td><a href="?view=show_order&amp;order_id=<?=$item['order_id']?>" class="edit">Просмотреть</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php if($pages_count > 1) pagination($page, $pages_count, $modrew = 0); ?>
<?php else: ?>
<div class="error">Нет необработанных заказов</div>
<?php endif; ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>