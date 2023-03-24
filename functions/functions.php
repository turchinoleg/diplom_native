<?php

defined('ISHOP') or die('Access denied');

/* ===Распечатка массива=== */
function print_arr($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
/* ===Распечатка массива=== */

/* ===Фильтрация входящих данных=== */
function clear($var){
	$var = mysql_real_escape_string(strip_tags($var));
	return $var;
}
/* ===Фильтрация входящих данных=== */

/* ===Редирект=== */
function redirect($http = false){
	if($http) $redirect = $http;
		else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}
/* ===Редирект=== */

/* ===Выход пользователя=== */
function logout(){
	unset($_SESSION['auth']);
}
/* ===Выход пользователя=== */

/* ===Проверить, является ли товар избранным=== */
function check_favorites($goods_id,$customer_id = false){
	if (!$customer_id){
		$customer_id = $_SESSION['auth']['customer_id'];
	}
	$result = false;
	
	$query = "SELECT * FROM favorite_products WHERE goods_id = '$goods_id' AND customer_id = '$customer_id' LIMIT 1";
	
	$res = mysql_query($query) or die(mysql_error());

	//если совпадение есть, возвращаем айдишник записи
	if(mysql_num_rows($res) == 1){
		$row = mysql_fetch_assoc($res);
		$result = $row['id'];
	}else{
		$result = false;
	}

	return $result;

}
/* ===Проверить, является ли товар избранным конец=== */

/* ===Добавление товара в избранное=== */
function add_to_favorites($goods_id,$customer_id = false){
	if (!$customer_id){
		$customer_id = $_SESSION['auth']['customer_id'];
	}
	$result = false;
	
	$query = "INSERT INTO favorite_products (customer_id,goods_id) VALUES ('$customer_id','$goods_id')";
	
	$res = mysql_query($query) or die(mysql_error());
	if(mysql_affected_rows() > 0){
		$result = true;
	}else{
		$result = false;
	}

	return $result;

}
/* ===Добавление товара в избранное конец=== */

/* ===Удаление товара из избранного=== */
function remove_from_favorites($id){
	   
	$query = "DELETE FROM favorite_products WHERE id = '$id'";
	
	$res = mysql_query($query) or die(mysql_error());
	if(mysql_affected_rows() > 0){
		$result = true;
	}else{
		$result = false;
	}

	return $result;

}
/* ===Удаление товара из избранного конец=== */

/* ===Добавление в корзину=== */
function addtocart($goods_id, $count){
	$count = $_POST['count'];
	if(isset($_SESSION['cart'][$goods_id])){
		// если в массиве cart уже есть добавляемый товар
		$_SESSION['cart'][$goods_id]['qty'] += $count;
		return $_SESSION['cart'];
	}else{
		// если товар кладется в корзину впервые
		$_SESSION['cart'][$goods_id]['qty'] = $count;
		return $_SESSION['cart'];
	}
}
function addtocart_pereschet($goods_id, $qty = 1){
	if(isset($_SESSION['cart'][$goods_id])){
		// если в массиве cart уже есть добавляемый товар
		$_SESSION['cart'][$goods_id]['qty'] += $qty;
		return $_SESSION['cart'];
	}else{
		// если товар кладется в корзину впервые
		$_SESSION['cart'][$goods_id]['qty'] = $qty;
		return $_SESSION['cart'];
	}
}
/* ===Добавление в корзину=== */

/* ===Удаление из корзины=== */
function delete_from_cart($id){
	if($_SESSION['cart']){
		if(array_key_exists($id, $_SESSION['cart'])){
			 if($_SESSION['cart'][$id]['qty']<10){
			$_SESSION['cart'][$id]['price'];
		}elseif($_SESSION['cart'][$id]['qty']>9 AND $_SESSION['cart'][$id]['qty']<50) {
			if($item['price_1']>0) {
				$_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_1'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}elseif($_SESSION['cart'][$id]['qty']>49 AND $_SESSION['cart'][$id]['qty']<100) {
			if($_SESSION['cart'][$id]['price_2']>0) {
				$_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_2'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}elseif($_SESSION['cart'][$id]['qty']>99 AND $_SESSION['cart'][$id]['qty']<250) {
			if($_SESSION['cart'][$id]['price_3']>0){
				 $_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_3'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}elseif($_SESSION['cart'][$id]['qty']>249 AND $_SESSION['cart'][$id]['qty']<500) {
			if($item['price_4']>0) {
				$_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_4'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}elseif($_SESSION['cart'][$id]['qty']>499 AND $_SESSION['cart'][$id]['qty']<1000) {
			if($_SESSION['cart'][$id]['price']>0){
				 $_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_5'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}elseif($_SESSION['cart'][$id]['qty']>999) {
			if($_SESSION['cart'][$id]['price_6']>0){
				 $_SESSION['cart'][$id]['price'] = $_SESSION['cart'][$id]['price_6'];
			}else{
				$_SESSION['cart'][$id]['price'];
			}
		}
			$_SESSION['total_quantity'] -= $_SESSION['cart'][$id]['qty'];
			$_SESSION['total_sum'] -= $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
			unset($_SESSION['cart'][$id]);
		}
	}
}
/* ===Удаление из корзины=== */

/* ===кол-во товара в корзине + защита от ввода несуществующего ID товара=== */
function total_quantity(){
	$_SESSION['total_quantity'] = 0;
	foreach($_SESSION['cart'] as $key => $value){
		if(isset($value['price'])){
			// если получена цена товара из БД - суммируем кол-во
			$_SESSION['total_quantity'] += $value['qty'];
		}else{
			// иначе - удаляем такой ID из сессиии (корзины)
			unset($_SESSION['cart'][$key]);
		}
	}
}
/* ===кол-во товара в корзине + защита от ввода несуществующего ID товара=== */


/* ===Постраничная навигация=== */
function pagination($page, $pages_count, $modrew = 1){
	if($modrew == 0){
		// если функция вызывается на странице без ЧПУ
		if($_SERVER['QUERY_STRING']){ // если есть параметры в запросе
			$uri = "?";
			foreach($_GET as $key => $value){
				// формируем строку параметров без номера страницы... номер передается параметром функции
			   if($key != 'page') $uri .= "{$key}={$value}&amp;";
			}  
		}   
	}else{
		// если функция вызвана на странице с ЧПУ
		$uri = $_SERVER['REQUEST_URI'];
		$params = explode("/", $uri);;
		$uri = null;
		foreach($params as $param){
			if(!empty($param) AND !preg_match("#page=#", $param)){
				$uri .= "/$param";
			}
		}
		$uri .= "/";
	}
	
	
	// формирование ссылок
	$back = ''; // ссылка НАЗАД
	$forward = ''; // ссылка ВПЕРЕД
	$startpage = ''; // ссылка В НАЧАЛО
	$endpage = ''; // ссылка В КОНЕЦ
	$page2left = ''; // вторая страница слева
	$page1left = ''; // первая страница слева
	$page2right = ''; // вторая страница справа
	$page1right = ''; // первая страница справа
	
	if($page > 1){
		$back = "<a class='nav_link' href='{$uri}page=" .($page-1). "'>&lt;</a>";
	}
	if($page < $pages_count){
		$forward = "<a class='nav_link' href='{$uri}page=" .($page+1). "'>&gt;</a>";
	}
	if($page > 3){
		$startpage = "<a class='nav_link' href='{$uri}page=1'>&laquo;</a>";
	}
	if($page < ($pages_count - 2)){
		$endpage = "<a class='nav_link' href='{$uri}page={$pages_count}'>&raquo;</a>";
	}
	if($page - 2 > 0){
		$page2left = "<a class='nav_link' href='{$uri}page=" .($page-2). "'>" .($page-2). "</a>";
	}
	if($page - 1 > 0){
		$page1left = "<a class='nav_link' href='{$uri}page=" .($page-1). "'>" .($page-1). "</a>";
	}
	if($page + 2 <= $pages_count){
		$page2right = "<a class='nav_link' href='{$uri}page=" .($page+2). "'>" .($page+2). "</a>";
	}
	if($page + 1 <= $pages_count){
		$page1right = "<a class='nav_link' href='{$uri}page=" .($page+1). "'>" .($page+1). "</a>";
	}
	
	// формируем вывод навигации
	echo '<div class="pagination">' .$startpage.$back.$page2left.$page1left.'<a class="nav_active">'.$page.'</a>'.$page1right.$page2right.$forward.$endpage. '</div>';
}
/* ===Постраничная навигация=== */

/* перевод массива корзины в строку */

function multi_implode($sep, $array)
{
	$_array = array();
	
	foreach($array as $val)
	{
		if(is_array($val)) $_array[] = multi_implode($sep, $val);
		else $_array[] = $val;
	}
	return implode($sep, $_array);
}

/* перевод массива корзины в строку */

/* перевод кириллицы в апперкейс */

function private_strtoupper($string)
{
	$count=strlen($string);
}

/* перевод кириллицы в апперкейс */

/* Генерация случайного пароля */
function randomPassword() {
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, strlen($alphabet)-1);
		$pass[$i] = $alphabet[$n];
	}
	$pass = implode($pass);
	return $pass;
}
/* Генерация случайного пароля */