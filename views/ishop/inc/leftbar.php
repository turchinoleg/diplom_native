<?php defined('ISHOP') or die('Access denied'); ?>
<div id="left-bar">
			<div class="left-bar-cont">
				<h2>Каталог</h2>
                <!-- Меню категорий -->
				<h4>Заготовки и сувениры</h4>
				<ul class="nav-catalog" id="accordion">
                    <?php foreach($cat as $key => $item): $i++;?>
                        <?php if(count($item) > 1): // если это родительская категория ?>
                        <h3 id="categoru-menu-<?=$i?>" ><li id="categoru-menu-<?=$i?>" ><a id="categoru-menu-<?=$i?>" href="#"><?=$item[0]?></a></li></h3>
                            <ul>
                                <li>- <a href="<?=PATH?>category/<?=$key?>">Все модели</a></li>
                                <?php foreach($item['sub'] as $key => $sub): ?>
                                <li>- <a href="<?=PATH?>category/<?=$key?>"><?=$sub?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif($item[0]): // если самостоятельная категория ?>
                            <li><a href="<?=PATH?>category/<?=$key?>"><?=$item[0]?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
				</ul>
                <!-- Меню категорий -->
				<div class="bar-contact">
					<h3>Контакты:</h3>
					<p><strong>Телефон:</strong><br />
					<span>+7 (347) 243-26-54</span><br />
					<?/*<span>+7 (986) 703-31-03</span></p>*/?>
                    <p><strong>email:</strong><br />
					<span><a href="mailto:aversstyle@yandex.ru">aversstyle@yandex.ru</a></span></p>
                    <p><strong>WhatsApp:</strong><br />
					<span>+7 (999) 622-53-79</span></p>
					
					<p><strong>Режим работы:</strong><br />
					Будние дни: <br />
					с 9:00 до 18:00<br />
					Суббота, Воскресенье:<br />
					выходные</p>
				</div>
			</div>		
		</div>