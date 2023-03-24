<?php defined('ISHOP') or die('Access denied'); ?>
<?#if ($get_page['title']=='Новости') header('Location: /archive');?>

<div class="kroshka">
	<a href="<?=PATH?>">Заготовки и сувениры</a> / <span><?=$get_page['title']?></span>
</div>
<script type="text/javascript">
    $(function(){
        $('.dummies-section').click(function(){
            $(this).addClass('opened');
            $(this).find('.dummies-text').each(function(){
                $(this).slideToggle("slow");
            });
        });
    }); 
</script>
<div class="content-txt">
    <?php if($get_page): ?>
        <h1><?=$get_page['title']?></h1>
        <?=$get_page['text']?>
        <?
        if ($get_page['title']=='Услуги'){
        	$services = services();
        	//print_arr($services);
        	?><ul class="services_list_general"><?
        	foreach ($services as $service):?>
        	<li><a href="<?=PATH?>service/<?=$service['service_id']?>"><?=$service['title']?></a></li>
        	<?endforeach;?>
        	</ul>

        <?}elseif($get_page['title']=="Словарь для \"чайников\""){
            $dictionaries = dictionaries();
            //print_arr($dictionaries);
            ?><ul class="dictionaries_list_general"><?
            foreach ($dictionaries as $dictionary):?>
            <li><a href="<?=PATH?>dictionary/<?=$dictionary['dictionary_id']?>"><?=$dictionary['name']?></a></li>
            <?endforeach;?>
            </ul>
        <?}?>

    <?php else: ?>
        <p>Такой страницы нет!</p>
    <?php endif; ?>
</div> <!-- .content-txt -->