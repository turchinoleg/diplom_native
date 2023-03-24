<?php

defined('ISHOP') or die('Access denied');

// домен
define('PATH', '/');

// модель
define('MODEL', 'model/model.php');

// контроллер
define('CONTROLLER', 'controller/controller.php');

// вид
define('VIEW', 'views/');

// папка с активным шаблоном
define('TEMPLATE', PATH.VIEW.'ishop/');

// папка с картинками контента
define('PRODUCTIMG', PATH.'userfiles/product_img/baseimg/');

// папка с картинками контента
define('NEWSIMG', PATH.'userfiles/news_img/baseimg/');

// папка с картинками галереи
define('GALLERYIMG', PATH.'userfiles/product_img/');

// максимально допустимый вес загружаемых картинок - 1 Мб
define('SIZE', 1048576);

// сервер БД
define('HOST', 'mysql88.1gb.ru');

// пользователь
define('USER', 'gb_aversstil');

// пароль
define('PASS', '312bddabeui');

// БД
define('DB', 'gb_aversstil');

// название магазина - хлебные крохи
define('SITE_NAME', 'Заготовки и сувениры');
// название магазина - title
define('TITLE', 'Заготовки и сувениры подарки Уфа купить');

// email администратора
define('ADMIN_EMAIL', 'a@аверс-стиль.рф');

// количество товаров на страницу
define('PERPAGE', 9);

// папка шаблонов административной части
define('ADMIN_TEMPLATE', 'templates/');

mysql_connect(HOST, USER, PASS) or die('No connect to Server');
mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');