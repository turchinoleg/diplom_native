<?php
session_start();
if($_SESSION['cart']){
setcookie("arr_carr","$array_carr",time()+60*60*24*7,"http://avers-style.ru/");
echo $_COOKIE['arr_carr'];
}elseif(!isset($_SESSION['cart'])){
	}

// подключение модели
require_once MODEL;

// подключение библиотеки функций
require_once 'functions/functions.php';
// Получение строки для куки 
if($_SESSION['cart']){    
		$array = $_SESSION['cart'];
		$sep= ',';
		$array_carr = multi_implode($sep, $_SESSION['cart']);	
}
// получение массива каталога
$cat = catalog(); 

$material = material();

$izgotovlenie = izgotovlenie();

// регистрация
if($_POST['reg']){
	registration();
	redirect();
}

// авторизация
if($_POST['auth']){
	authorization();
}

// изменение пароля
if($_POST['auth_edit']){
	auth_edit();
}
// изменение пароля
if($_POST['recovery']){
	$recovery = recovery();
	redirect();
}

// выход пользователя
if($_GET['do'] == 'logout'){
	logout();
	if ($_GET['personal'] == 'yes'){
		redirect('/');
	}else{
		redirect();		
	}
}

// массив метаданных
$meta = array();

// получение динамичной части шаблона #content
$view = empty($_GET['view']) ? 'aversstyle' : $_GET['view'];

switch($view){
	case('aversstyle'):
	$meta['title'] = TITLE;
	$meta['description'] = TITLE;
	break;
	 
	case('service'):
		// отдельная страница
		$service_id = abs((int)$_GET['service_id']);
		$get_service = get_service($service_id);
		$meta['title'] = "{$get_service['title']} | " .TITLE;
		$meta['description'] = "{$get_service['description']} | " .TITLE;
	break;

	case('dictionary'):
		// отдельная страница
		$dictionary_id = abs((int)$_GET['dictionary_id']);
		$get_dictionary = get_dictionary($dictionary_id);
		$meta['title'] = "{$get_dictionary['name']} | " .TITLE;
	break;


	
	case('addtocart'):
		// добавление в корзину
		$goods_id = abs((int)$_POST['goods_id']);
		$count =  abs((int)$_POST['count']);
		addtocart($goods_id, $count);
		
		$_SESSION['total_sum'] = total_sum($_SESSION['cart']);
		
		// кол-во товара в корзине + защита от ввода несуществующего ID товара
		total_quantity();
		redirect();
	break;
	
	case('cart'):
		/* корзина */
		// получение способов доставки
		$dostavka = get_dostavka();
		
		// пересчет товаров в корзине
		if(isset($_GET['id'], $_GET['qty'])){
			$goods_id = abs((int)$_GET['id']);
			$qty = abs((int)$_GET['qty']);
			
			$qty = $qty - $_SESSION['cart'][$goods_id]['qty'];
			addtocart_pereschet($goods_id, $qty);
			
			$_SESSION['total_sum'] = total_sum($_SESSION['cart']); // сумма заказа
			
			total_quantity(); // кол-во товара в корзине + защита от ввода несуществующего ID товара
			redirect();
		}
		// удаление товара из корзины
		if(isset($_GET['delete'])){
			$id = abs((int)$_GET['delete']);
			if($id){
				delete_from_cart($id);
			}
			redirect();
		}
		
		if($_POST['order_x']){
			add_order();
			redirect();
		}
	break;
	
	case('reg'):
		// регистрация
	break;

	case('recovery'):
		// регистрация
	break;

	case('personal'):

		// личный кабинет
				
		if($_GET['status'] === '0'){
			$status = " WHERE orders.status = '0'";
		}else{
			$status = null;
		}
		// параметры для навигации
		$perpage = 9; // кол-во товаров на страницу
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1) $page = 1;
		}else{
			$page = 1;
		}
		$count_rows = count_favorites($_SESSION['auth']['customer_id']); // общее кол-во заказов
		$pages_count = ceil($count_rows / $perpage); // кол-во страниц
		if(!$pages_count) $pages_count = 1; // минимум 1 страница
		if($page > $pages_count) $page = $pages_count; // если запрошенная страница больше максимума
		$start_pos = ($page - 1) * $perpage; // начальная позиция для запроса
		
		$orders = orders($status, $start_pos, $perpage, $_SESSION['auth']['customer_id']);
		$favorites = favorites();
		$favorites_list = favorites_list($start_pos, $perpage);
	break;
	
	case('product'):
		
		// отдельный товар
		$goods_id = abs( (int)$_GET['goods_id'] );
		if($goods_id){
			$goods = get_goods($goods_id);
			if($goods) {
				$brand_name = brand_name($goods['goods_brandid']); // хлебные крошки
				$meta['title'] = $goods['name'].' купить в Уфе';
				$meta['description'] = $goods['description'];
				//$meta['keywords'] = "{$brand_name[0]['brand_name']}, {$brand_name[1]['brand_name']}";
				//$meta['keywords'] = $goods['anons'];			
			}
		}
	break;

  
	default:
		// если из адресной строки получено имя несуществующего вида
		$view = 'hits';
		$eyestoppers = eyestopper('hits');
}

// подключение вида
require_once $_SERVER['DOCUMENT_ROOT'].'/views/ishop/index.php'; // http://ishop/views/ishop/index.php