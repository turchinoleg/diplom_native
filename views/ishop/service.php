<?php defined('ISHOP') or die('Access denied'); ?>
<script>
    $(document).on('submit', '.serv-section form', function(){
        return false;
    })
</script>
<div class="kroshka">
	<a href="<?=PATH?>">Заготовки и сувениры</a> / <span class="calc_label"><?=$get_service['title']?></span>
</div>
<?#print_arr($get_service);?>
<script type="text/javascript">
	$(function(){
		$('.serv-section h2').click(function(){
			$(this).addClass('opened');
			$(this).siblings().slideToggle("slow");
		});
	});
	
</script>
<div class="content-txt">
    <?php if($get_service): ?>
        <h1><?=$get_service['title']?></h1>
        <?=$get_service['text']?>
        <?
        if (file_exists(__DIR__.'/services/'.$get_service['service_id'].'.php')) {
        	include __DIR__.'/services/'.$get_service['service_id'].'.php';
        }?>        	
    <?php else: ?>
        <p>Такой страницы нет!</p>
    <?php endif; ?>
</div> <!-- .content-txt -->