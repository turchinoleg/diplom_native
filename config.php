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
define('HOST', 'localhost');

// пользователь
define('USER', 'root');

// пароль
define('PASS', '');

// БД
define('DB', 'Avers');

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

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

global $con;
$con=mysqli_connect(HOST, USER, PASS) or die('No connect to Server');
mysqli_select_db($con,DB) or die('No connect to DB');
mysqli_query($con,"SET NAMES 'UTF8'") or die('Cant set charset');