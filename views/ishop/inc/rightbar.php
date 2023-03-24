<?php defined('ISHOP') or die('Access denied'); ?>
<?$services = services();?>
<div style="display:none;">
    <?print_arr($izgotovlenie);?>
</div>
<div id="right-bar">
    <div class="right-bar-cont">
        <?/*
        <div class="enter">
            <h2>Авторизация</h2>
            <div class="authform">
                <?php if(!$_SESSION['auth']['user']): ?>
                <form method="post" action="#">
                    <label for="login">Логин: </label><br />
                    <input type="text" name="login" id="login" /><br />
                    <label for="pass">Пароль: </label><br />
                    <input type="password" name="pass" id="pass" /><br /><br />
                    <input type="submit" name="auth" id="auth" value="Войти" />
                    <p class="link"><a href="<?=PATH?>reg">Регистрация</a></p>
                </form>
                <?php
                    if(isset($_SESSION['auth']['error'])){
                        echo '<div class="error">' .$_SESSION['auth']['error']. '</div>';
                        unset($_SESSION['auth']);
                    }
                ?>
                <?php else: ?>
                    <p>Добро пожаловать, <?=htmlspecialchars($_SESSION['auth']['user'])?></p>
                    <a href="<?=PATH?>?do=logout">Выход</a>
                <?php endif; ?>
            </div> <!-- .authform -->   
        </div> <!-- .enter -->
        <div class="basket">
            <h2>Корзина</h2>
            <div>
                <p>
                <?php if($_SESSION['total_quantity']): ?>
                    Товаров в корзине:<br />
                    <span><?=$_SESSION['total_quantity']?></span> на сумму <span><?=$_SESSION['total_sum']?></span> руб.
                    <a href="<?=PATH?>cart"><img src="<?=TEMPLATE?>images/oformit.jpg" alt="" /></a>
                    <?php else: ?>
                        Корзина пуста                           
                <?php endif; ?>
                </p>
            </div>
        </div> <!-- .basket -->
        */?>
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
		<div class="share-search">
			<h2>Выбор по параметрам</h2>
			<div>
				<form method="get" action="<?=PATH?>">
                <input type="hidden" name="view" value="filter" />
				<p>Стоимость:</p>
				от <input class="podbor-price" type="text" name="startprice"  />
				до <input class="podbor-price" type="text" name="endprice"  />
				 руб.
				 <br /><br />
				<p>Материалы:</p>
                   <?php foreach($material as $key): ?>
                  
                     <input type="checkbox" name="material_<?=$key['material_id']?>" value="1" id="mat<?=$key['material_id']?>" />
                     <label for="<?=$key['material_id']?>"><?=$key['material_name']?></label><br />
                   <?php endforeach; ?>
                   <br /><br />
                 <p>Способ изготовления:</p>   
                    <?php foreach($izgotovlenie as $key): ?>
                     <input type="checkbox" name="izgotovlenie_<?=$key['izgotovlenie_id']?>" value="1" id="izg<?=$key['izgotovlenie_id']?>" /> 
                     <label for="<?=$key?>"><?=$key['izgotovlenie']?></label><br />
                    <?php endforeach; ?>
               
				
				<input class="podbor" type="image" src="<?=TEMPLATE?>images/podbor.jpg" />						
				</form>
			</div>
		</div>	
	</div>
</div>