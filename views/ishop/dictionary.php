<?php defined('ISHOP') or die('Access denied'); ?>
<div class="kroshka">
	<a href="<?=PATH?>">Заготовки и сувениры</a> / <a href="<?=PATH.'page/6'?>">Словарь для "чайников"</a> / <span class="calc_label"><?=$get_dictionary['name']?></span>
</div>
<?#print_arr($get_dictionary);?>
<script type="text/javascript">
	$(function(){
		$('.serv-section h2').click(function(){
			$(this).addClass('opened');
			$(this).siblings().slideToggle("slow");
		});
	});
	
</script>
<div class="content-txt">
    <?php if($get_dictionary): ?>
        <h1><?=$get_dictionary['name']?></h1>
        <?=$get_dictionary['content']?>     	
    <?php else: ?>
        <p>Такой страницы нет!</p>
    <?php endif; ?>
</div> <!-- .content-txt -->