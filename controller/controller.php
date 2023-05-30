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

// получение массива информеров
$informers = informer();

// получени массива страниц
$pages = pages();

// получение названия новостей
$news = get_title_news();

// регистрация
if($_POST['reg']){
	registration();
	redirect();
}

// авторизация
if($_POST['auth']){
	authorization();
	/*if($_SESSION['auth']['user']){
		// если пользователь авторизовался
		echo "<p>Добро пожаловать, {$_SESSION['auth']['user']}</p>";
		exit;
	}else{
		// если авторизация неудачна
		echo $_SESSION['auth']['error'];
		unset($_SESSION['auth']);
		exit;
	}*/
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
	case('hits'):
		// лидеры продаж
		$eyestoppers = eyestopper('hits');
		$meta['title'] = TITLE;
		$meta['description'] = TITLE;
		$meta['keywords'] = TITLE . ", продажа";
	break;
	
	case('new'):
		// новинки
		$eyestoppers = eyestopper('new');
		$meta['title'] = "Новинки | " .TITLE;
		$meta['description'] = "Новинки | " .TITLE;
	break;
	
	case('sale'):
		// распродажа
		$eyestoppers = eyestopper('sale');
		$meta['title'] = "Распродажа | " .TITLE;
		$meta['description'] = "Новинки | " .TITLE;
	break;
	
	case('page'):
		// отдельная страница
		$page_id = abs((int)$_GET['page_id']);
		$get_page = get_page($page_id);
		$meta['title'] = "{$get_page['title']} | " .TITLE;
		$meta['description'] = "{$get_page['description']} | " .TITLE;
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
	
	case('news'):
		// отдельная новость
		$news_id = abs((int)$_GET['news_id']);
		$news_text = get_news_text($news_id);
	break;
	
	case('archive'):
		// все новости (архив новостей)
		// параметры для навигации
		$perpage = 2; // кол-во товаров на страницу
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1) $page = 1;
		}else{
			$page = 1;
		}
		$count_rows = count_news(); // общее кол-во новостей
		$pages_count = ceil($count_rows / $perpage); // кол-во страниц
		if(!$pages_count) $pages_count = 1; // минимум 1 страница
		if($page > $pages_count) $page = $pages_count; // если запрошенная страница больше максимума
		$start_pos = ($page - 1) * $perpage; // начальная позиция для запроса
		
		$all_news = get_all_news($start_pos, $perpage);
	break;
	
	case('informer'):
		// текст информера
		$informer_id = abs((int)$_GET['informer_id']);
		$text_informer = get_text_informer($informer_id);
	break;
	
	case('cat'):
		// товары категории
		$category = abs((int)$_GET['category']);
		
		/* =====Сортировка===== */
		// массив параметров сортировки
		// ключи - то, что передаем GET-параметром
		// значения - то, что показываем пользователю и часть SQL-запроса, который передаем в модель
		$order_p = array(
						'pricea' => array('от дешевых к дорогим', 'price ASC'),
						'priced' => array('от дорогих к дешевым', 'price DESC'),
						'datea' => array('по дате добавления - к последним', 'date ASC'),
						'dated' => array('по дате добавления - с последних', 'date DESC'),
						'namea' => array('от А до Я', 'name ASC'),
						'named' => array('от Я до А', 'name DESC')
						);
		if ($_GET['order']) {
            $order_get = clear($_GET['order']);
        } // получаем возможный параметр сортировки
		if(array_key_exists($order_get, $order_p)){
			$order = $order_p[$order_get][0];
			$order_db = $order_p[$order_get][1];
		}else{
			// по умолчанию сортировка по первому элементу массива order_p
			$order = $order_p['dated'][0];
			$order_db = $order_p['dated'][1];
		}
		/* =====Сортировка===== */
		
		
		// параметры для навигации
		$perpage = 9; // кол-во товаров на страницу
		if(isset($_GET['page'])){
			$page = (int)$_GET['page'];
			if($page < 1) $page = 1;
		}else{
			$page = 1;
		}
		$count_rows = count_rows($category); // общее кол-во товаров
		$pages_count = ceil($count_rows / $perpage); // кол-во страниц
		if(!$pages_count) $pages_count = 1; // минимум 1 страница
		if($page > $pages_count) $page = $pages_count; // если запрошенная страница больше максимума
		$start_pos = ($page - 1) * $perpage; // начальная позиция для запроса
		
		$brand_name = brand_name($category); // хлебные крохи
		$products = products($category, $order_db, $start_pos, $perpage); // получаем массив из модели
		$meta['title'] = $brand_name[0]['brand_name'];
		if($brand_name[1]) $meta['title'] .= " - {$brand_name[1]['brand_name']}";
		$meta['title'] .= " | " .TITLE;
		$meta['description'] = "{$brand_name[0]['brand_name']}, {$brand_name[1]['brand_name']}";
		$favorites = favorites();
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

//		// товары категории
//		$category = abs((int)$_GET['category']);
//
//		/* =====Сортировка===== */
//		// массив параметров сортировки
//		// ключи - то, что передаем GET-параметром
//		// значения - то, что показываем пользователю и часть SQL-запроса, который передаем в модель
//		$order_p = array(
//						'pricea' => array('от дешевых к дорогим', 'price ASC'),
//						'priced' => array('от дорогих к дешевым', 'price DESC'),
//						'datea' => array('по дате добавления - к последним', 'date ASC'),
//						'dated' => array('по дате добавления - с последних', 'date DESC'),
//						'namea' => array('от А до Я', 'name ASC'),
//						'named' => array('от Я до А', 'name DESC')
//						);
//		$order_get = clear($_GET['order']); // получаем возможный параметр сортировки
//		if(array_key_exists($order_get, $order_p)){
//			$order = $order_p[$order_get][0];
//			$order_db = $order_p[$order_get][1];
//		}else{
//			// по умолчанию сортировка по первому элементу массива order_p
//			$order = $order_p['dated'][0];
//			$order_db = $order_p['dated'][1];
//		}
//		/* =====Сортировка===== */

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
	
//	case('search'):
//		// поиск
//		$result_search = search($order_db);
//		print_arr($order_db);
//		/* =====Сортировка===== */
//		// массив параметров сортировки
//		// ключи - то, что передаем GET-параметром
//		// значения - то, что показываем пользователю и часть SQL-запроса, который передаем в модель
//		$order_p = array(
//						'pricea' => array('от дешевых к дорогим', 'price ASC'),
//						'priced' => array('от дорогих к дешевым', 'price DESC'),
//						'datea' => array('по дате добавления - к последним', 'date ASC'),
//						'dated' => array('по дате добавления - с последних', 'date DESC'),
//						'namea' => array('от А до Я', 'name ASC'),
//						'named' => array('от Я до А', 'name DESC')
//						);
//		$order_get = clear($_GET['order']); // получаем возможный параметр сортировки
//		if(array_key_exists($order_get, $order_p)){
//			$order = $order_p[$order_get][0];
//			$order_db = $order_p[$order_get][1];
//		}else{
//			// по умолчанию сортировка по первому элементу массива order_p
//			$order = $order_p['namea'][0];
//			$order_db = $order_p['namea'][1];
//		}
//		/* =====Сортировка===== */
//
//		// параметры для навигации
//		$perpage = 9; // кол-во товаров на страницу
//		if(isset($_GET['page'])){
//			$page = (int)$_GET['page'];
//			if($page < 1) $page = 1;
//		}else{
//			$page = 1;
//		}
//		$count_rows = count($result_search); // общее кол-во товаров
//		$pages_count = ceil($count_rows / $perpage); // кол-во страниц
//		if(!$pages_count) $pages_count = 1; // минимум 1 страница
//		if($page > $pages_count) $page = $pages_count; // если запрошенная страница больше максимума
//		$start_pos = ($page - 1) * $perpage; // начальная позиция для запроса
//		$endpos = $start_pos + $perpage; // до какого товара будет вывод на странице
//		if($endpos > $count_rows) $endpos = $count_rows;
//	break;
//
//	case('filter'):
//		// выбор по параметрам
//		$startprice = (int)$_GET['startprice'];
//		$endprice = (int)$_GET['endprice'];
//		if($_GET['material_1']){
//			$material_1 = $_GET['material_1'];
//		}
//		if($_GET['material_2']){
//			$material_2 = $_GET['material_2'];
//		}
//		if($_GET['material_3']){
//			$material_3 = $_GET['material_3'];
//		}
//		if($_GET['material_4']){
//			$material_4 = $_GET['material_4'];
//		}
//		if($_GET['material_5']){
//			$material_5 = $_GET['material_5'];
//		}
//		if($_GET['material_6']){
//			$material_6 = $_GET['material_6'];
//		}
//		if($_GET['material_7']){
//			$material_7 = $_GET['material_7'];
//		}if($_GET['material_8']){
//			$material_8 = $_GET['material_8'];
//
//		}if($_GET['izgotovlenie_1']){
//			$izgotovlenie_1 = $_GET['izgotovlenie_1'];
//
//		}if($_GET['izgotovlenie_1']){
//			$izgotovlenie_1 = $_GET['izgotovlenie_1'];
//
//		}if($_GET['izgotovlenie_2']){
//			$izgotovlenie_2 = $_GET['izgotovlenie_2'];
//
//		}if($_GET['izgotovlenie_3']){
//			$izgotovlenie_3 = $_GET['izgotovlenie_3'];
//
//		}if($_GET['izgotovlenie_4']){
//			$izgotovlenie_4 = $_GET['izgotovlenie_4'];
//
//		}if($_GET['izgotovlenie_5']){
//			$izgotovlenie_5 = $_GET['izgotovlenie_5'];
//
//		}if($_GET['izgotovlenie_6']){
//			$izgotovlenie_6 = $_GET['izgotovlenie_6'];
//
//		}if($_GET['izgotovlenie_7']){
//			$izgotovlenie_7 = $_GET['izgotovlenie_7'];
//
//		}
//
//
//
//		$products = filter($material_1, $material_2, $material_3, $material_4, $material_5,$material_6,$material_7,$material_8,   $izgotovlenie_1, $izgotovlenie_2, $izgotovlenie_3, $izgotovlenie_4, $izgotovlenie_5, $izgotovlenie_6, $izgotovlenie_7, $startprice, $endprice);
//	break;
	
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