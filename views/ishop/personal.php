<?php defined('ISHOP') or die('Access denied'); ?>
<?#print_arr($_SESSION);?>
<?#print_arr($_POST);?>
<link rel="stylesheet" href="<?=TEMPLATE?>js/slick/slick.css">
<link rel="stylesheet" href="<?=TEMPLATE?>js/slick/slick-theme.css">
<div class="content-txt personal">
    <div class="personal-headings">
        <h1>Личный кабинет</h1>
        <h2><a href="/?do=logout&personal=yes">Выход</a></h2>
    </div>
    <div class="personal-container">
        <div class="personal-head">
            <a href="javascript:void(0);" data-slide="0" class="personal-link active">Избранные товары</a>
            <a href="javascript:void(0);" data-slide="1" class="personal-link">Мои заказы</a>
            <a href="javascript:void(0);" data-slide="2" class="personal-link">Мои данные</a>
        </div>
        <div class="personal-body">
            <div class="tabs personal-slider">
                <div class="personal-slide active">
                    <div class="catalog-index">
                        <?#print_arr($favorites)?>
                        <div id="anons"><?php if(isset($brand['anons'])) echo $brand['anons']; ?></div>
                        <?php if($favorites_list): // если получены товары категории ?>
                            <?php foreach($favorites_list as $product): ?>
                                <?
                                $is_favorite = false;
                                if (in_array($product['goods_id'], $favorites)){
                                    $is_favorite = true;
                                }
                                ?>
                            <?php 
                            if($product['zakaz']==0){
                                   $product['zakaz'] = '<div class="nalich">В наличии</div>';  
                                }elseif($product['zakaz']==1){
                                   $product['zakaz'] = '<div class="zakaz">под заказ, 1-2 дня</div>';
                                }elseif($product['zakaz']==2){
                                   $product['zakaz'] = '<div class="zakaz">под заказ, 7-10 днeй</div>';
                                }
                            ?>            
                            <div class="product-table" id="<?=$product['goods_id']?>">
                                <h2><a href="<?=PATH?>product/<?=$product['goods_id']?>"><?=$product['name']?></a></h2>
                                <p>артикул: <?=$product['articul']?></p>
                                <div class="product-table-img-main">
                                    <div class="product-table-img">
                                        <a href="<?=PATH?>product/<?=$product['goods_id']?>"><img src="<?=PRODUCTIMG?><?=$product['img']?>" alt="" /></a>
                                        <div> <!-- Иконки -->

                                            <div class="product-favorite<?=$is_favorite ? ' active' : ''?>"<?
                                                if ($_SESSION['auth']['customer_id']){
                                                    echo "data-customer-id='".$_SESSION['auth']['customer_id']."'";
                                                }?>>
                                            </div>
                                            <?php if($product['hits']) echo '<img src="' .TEMPLATE. 'images/ico-cat-lider.png" alt="лидеры продаж" />'; ?>
                                            <?php if($product['new']) echo '<img src="' .TEMPLATE. 'images/ico-cat-new.png" alt="новинка" />'; ?>
                                            <?php if($product['sale']) echo '<img src="' .TEMPLATE. 'images/ico-cat-sale.png" alt="распродажа" />'; ?>                          
                                        </div> <!-- Иконки -->
                                    </div> <!-- .product-table-img -->
                                </div> <!-- .product-table-img-main -->
                                <p class="cat-table-more"><a href="<?=PATH?>product/<?=$product['goods_id']?>">подробнее...</a></p>
                                <?=$product['zakaz']?>
                                <p>Цена : <span><?php if($product['price_6']>0) {echo($product['price_6']); echo(' -');}?></span> <span><?=$product['price']?></span> руб.</p>
                                <form action="<?=PATH?>addtocart/<?=$product['goods_id']?>" method="post" >
                                <input name="goods_id" value="<?=$product['goods_id']?>" type="hidden"  />
                                Кол-во: <input class="count-text" type="text" name="count" value="1" /> <br/>
                                <input type="image" src="<?=TEMPLATE?>images/addcard-table.jpg" alt="Добавить в корзину"  />
                                </form>
                            </div> <!-- .product-table -->
                            <?php endforeach; ?>
                            <div class="clr"></div>
                            <?php if($pages_count > 1) pagination($page, $pages_count); ?>
                        <?php else: ?>
                            <p>Здесь товаров пока нет!</p>
                        <?php endif; ?> 
                        <a name="nav"></a>          
                    </div> <!-- .catalog-index -->
                </div>
                <div class="personal-slide">
                    <?if (isset($orders) && $orders != ''):?>
                        <table class="orders-table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Номер заказа</th>
                                    <th rowspan="2">Дата</th>
                                    <th colspan="4">Товары</th>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>Количество</td>
                                    <td>Цена</td>
                                    <td>Артикул</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?foreach($orders as $order):?>
                                    <tr>
                                        <td><?=$order['order_id']?></td>
                                        <td><?=$order['date']?></td>
                                        <td colspan="4">
                                            <table class="inner-table">
                                                <?foreach ($order['goods'] as $good):?>
                                                    <tr>
                                                        <td><?=$good['name']?></td>
                                                        <td><?=$good['quantity']?></td>
                                                        <td><?=$good['price']?></td>
                                                        <td><?=$good['articul']?></td>
                                                    </tr>
                                                <?endforeach;?>
                                            </table>
                                        </td>
                                    </tr>
                                <?endforeach;?>
                            </tbody>
                        </table>
                        <?#print_arr($orders)?>
                    <?else:?>
                    <p>У Вас пока нет заказов.</p>
                    <?endif;?>
                </div>
                <div class="personal-slide">
                    <?#print_arr($_SESSION)?>
                    <div class="personal-edit">
                        <form action="" method="POST" class="personal-edit-form">
                            <div class="field">
                                <label for="login">Логин:</label>
                                <input type="text" name="login" id="login" placeholder="<?=htmlspecialchars($_SESSION['auth']['login'])?>" value="<?=htmlspecialchars($_SESSION['auth']['login'])?>" disabled="disabled">                                
                            </div>
                            <div class="field">
                                <label for="pwd">Пароль:</label>
                                <input type="password" name="pass" id="pwd" placeholder="*********" value="<?=htmlspecialchars($_SESSION['auth']['pass'])?>">
                            </div>
                            <div class="field">
                                <label for="pwd_copy">Ещё раз пароль:</label>
                                <input type="password" name="password_again" id="pwd_copy" placeholder="*********" value="<?=htmlspecialchars($_SESSION['auth']['pass'])?>">
                            </div>
                            <div class="field">
                                <label for="phone">Телефон:</label>
                                <input type="text" name="phone" id="phone" value="<?=htmlspecialchars($_SESSION['auth']['phone'])?>">                                
                            </div>
                            <div class="field">
                                <label for="address">Адрес доставки:</label>
                                <input type="text" name="address" id="address" value="<?=htmlspecialchars($_SESSION['auth']['address'])?>">                                
                            </div>
                            <div class="field">
                                <label for="email">E-mail:</label>
                                <input type="text" name="email" id="email" value="<?=htmlspecialchars($_SESSION['auth']['email'])?>">                                
                            </div>
                            <div class="field">
                                <label for="name">Как к Вам обращаться:</label>
                                <input type="text" name="name" id="name" value="<?=htmlspecialchars($_SESSION['auth']['user'])?>">                                
                            </div>
                            <hr>
                            <div class="field">
                                <div></div>
                                <button type="submit" name="auth_edit" value="1" class="edit-button">Изменить</button>
                            </div>
                            <?/*foreach ($_SESSION['auth'] as $key => $value):?>
                            	<p><?=$key.' = '.$value;?></p>
                            <?endforeach;*/?>
                        </form>
                        <?if(isset($_SESSION['auth_edit']['res'])){
                            echo $_SESSION['auth_edit']['res'];
                            unset ($_SESSION['auth_edit']['res']);
                            unset($_POST);
                        }?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="<?=TEMPLATE?>js/slick/slick.min.js"></script>
<script src="<?=TEMPLATE?>js/personal.js"></script>