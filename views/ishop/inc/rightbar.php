<?php defined('ISHOP') or die('Access denied'); ?>
<?$services = services();?>
<div style="display:none;">
    <?print_arr($izgotovlenie);?>
</div>
<div id="right-bar">
    <div class="right-bar-cont">
        <?if(isset($services) && is_array($services)):?>
        <div class="services">
            <h2><a style="color:inherit;" href="<?=PATH?>page/13">Услуги</a></h2>
            <ul class="nav-catalog ui-accordion ui-widget ui-helper-reset ui-accordion-icons">
                <?foreach($services as $service):?>
                    <li><a href="<?=PATH?>service/<?=$service['service_id']?>"><?=$service['title']?></a></li>
                <?endforeach;?>
            </ul>
        </div>
        <?endif;?>
	</div>
</div>