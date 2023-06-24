<?php

global $con;

/* ====Каталог - получение массива=== */
function catalog(){
    global $con;
    $query = "SELECT * FROM brands ORDER BY parent_id, position";
    $res = mysqli_query($con, $query) or die(mysqli_query());
    
    //массив категорий
    $cat = array();
    while($row = mysqli_fetch_assoc($res)){
        if(!$row['parent_id']){
            $cat[$row['brand_id']][] = $row['brand_name'];
        }else{
            $cat[$row['parent_id']]['sub'][$row['brand_id']] = $row['brand_name'];
        }
    }
    return $cat;
}
/* ====Каталог - получение массива=== */

/* ===material=== */
function material(){
	$query = "SELECT * FROM material";
	global $con;
	$res = mysqli_query($con, $query) ;

	$material = array();
	while($row = mysqli_fetch_assoc($res)){
		$material[] = $row;
	}
	return $material;
}
/* ===material=== */

/* ===izgotovlenie=== */
function izgotovlenie(){
	$query = "SELECT * FROM izgotovlenie";
	global $con;
	$res = mysqli_query($con, $query) ;

	$izgotovlenie = array();
	while($row = mysqli_fetch_assoc($res)){
		$izgotovlenie[] = $row;
	}
	return $izgotovlenie;
}
/* ===material=== */

/* ===Айстопперы - новинки, лидеры продаж, распродажа=== */
function eyestopper($eyestopper){
	$query = "SELECT * FROM goods
                WHERE visible='1' AND $eyestopper='1' ORDER BY date_modified DESC, date DESC";
	global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());

	$eyestoppers = array();
	while($row = mysqli_fetch_assoc($res)){
		$eyestoppers[] = $row;
	}

	return $eyestoppers;
}
/* ===Айстопперы - новинки, лидеры продаж, распродажа=== */

/* ===Услуги=== */
function services(){
    $query = "SELECT service_id, title FROM services ORDER BY position";
    global $con;
	$res = mysqli_query($con, $query) ;
    
    $services = array();
    while($row = mysqli_fetch_assoc($res)){
        $services[] = $row;
    }
    return $services;
}
/* ===Услуги=== */

/* ===Главная страница=== */

    $query = "SELECT title, keywords, description, text FROM pages WHERE page_id = 1";
    $res = mysqli_query($con, $query);
    
    $boss_page = array();
    $boss_page = mysqli_fetch_assoc($res);
    return $boss_page;

/* ===Главная страница=== */

/* ===Отдельная услуга=== */
function get_service($service_id){
    $query = "SELECT * FROM services WHERE service_id = $service_id";
    global $con;
	$res = mysqli_query($con, $query) ;
    
    $service = array();
    $service = mysqli_fetch_assoc($res);
    
    return $service;
}
/* ===Отдельная услуга=== */

/* ===Получение кол-ва товаров для навигации=== */
function count_rows($category){
    $query = "(SELECT COUNT(goods_id) as count_rows
                 FROM goods
                     WHERE goods_brandid = $category AND visible='1')
               UNION      
               (SELECT COUNT(goods_id) as count_rows
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                ) AND visible='1')";
    global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
    
    while($row = mysqli_fetch_assoc($res)){
        if($row['count_rows']) $count_rows = $row['count_rows'];
    }
    return $count_rows;
}
/* ===Получение кол-ва товаров для навигации=== */

/* ===Получение массива товаров по категории=== */
function products($category, $order_db, $start_pos, $perpage){
    $query = "(SELECT *
                 FROM goods
                     WHERE goods_brandid = $category AND visible='1')
               UNION      
               (SELECT *
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                ) AND visible='1') ORDER BY $order_db LIMIT $start_pos, $perpage";
    global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
    
    $products = array();
    while($row = mysqli_fetch_assoc($res)){
        $products[] = $row;
    }
    
    return $products;
}
/* ===Получение массива товаров по категории=== */

/* ===Получение названий для хлебных крох=== */
function brand_name($category){
    $query = "(SELECT brand_id, brand_name FROM brands
                WHERE brand_id = 
                    (SELECT parent_id FROM brands WHERE brand_id = $category)
                )
                UNION
                    (SELECT brand_id, brand_name FROM brands WHERE brand_id = $category)";
    global $con;
	$res = mysqli_query($con, $query) ;
    $brand_name = array();
    while($row = mysqli_fetch_assoc($res)){
        $brand_name[] = $row;
    }
    return $brand_name;
}
/* ===Получение названий для хлебных крох=== */

/* ===Сумма заказа в корзине + атрибуты товара===*/
function total_sum($goods){
    $total_sum = 0;
    
    $str_goods = implode(',',array_keys($goods));
    
    $query = "SELECT goods_id, name, price, price_1, price_2, price_3, price_4, price_5, price_6, img, articul
                FROM goods
                    WHERE goods_id IN ($str_goods)";
    global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
    
    while($row = mysqli_fetch_assoc($res)){
		$_SESSION['cart'][$row['goods_id']]['articul'] = $row['articul'];
        $_SESSION['cart'][$row['goods_id']]['name'] = $row['name'];
        $_SESSION['cart'][$row['goods_id']]['price'] = $row['price'];
		$_SESSION['cart'][$row['goods_id']]['price_1'] = $row['price_1'];
		$_SESSION['cart'][$row['goods_id']]['price_2'] = $row['price_2'];
		$_SESSION['cart'][$row['goods_id']]['price_3'] = $row['price_3'];
		$_SESSION['cart'][$row['goods_id']]['price_4'] = $row['price_4'];
		$_SESSION['cart'][$row['goods_id']]['price_5'] = $row['price_5'];
		$_SESSION['cart'][$row['goods_id']]['price_6'] = $row['price_6'];
        $_SESSION['cart'][$row['goods_id']]['img'] = $row['img'];
		$_SESSION['cart'][$row['goods_id']]['id_goods'] = $row['goods_id'];
		
	    if($_SESSION['cart'][$row['goods_id']]['qty']<10){
			$row['price'];
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>9 AND $_SESSION['cart'][$row['goods_id']]['qty']<50) {
			if($row['price_1']>0) {
				$row['price'] = $row['price_1'];
			}else{
				$row['price'];
			}
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>49 AND $_SESSION['cart'][$row['goods_id']]['qty']<100) {
			if($row['price_2']>0) {
				$row['price'] = $row['price_2'];
			}else{
				$row['price'];
			}
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>99 AND $_SESSION['cart'][$row['goods_id']]['qty']<250) {
			if($row['price_3']>0){
				 $row['price'] = $row['price_3'];
			}else{
				$row['price'];
			}
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>249 AND $_SESSION['cart'][$row['goods_id']]['qty']<500) {
			if($row['price_4']>0) {
				$row['price'] = $row['price_4'];
			}else{
				$row['price'];
			}
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>499 AND $_SESSION['cart'][$row['goods_id']]['qty']<1000) {
			if($row['price_5']>0){
				 $row['price'] = $row['price_5'];
			}else{
				$row['price'];
			}
		}elseif($_SESSION['cart'][$row['goods_id']]['qty']>999) {
			if($row['price_6']>0){
				 $row['price'] = $row['price_6'];
			}else{
				$row['price'];
			}
		} 
        $total_sum += $_SESSION['cart'][$row['goods_id']]['qty'] * $row['price'];
    }
    return $total_sum;
}
/* ===Сумма заказа в корзине + атрибуты товара===*/

/* ===Регистрация=== */
function registration(){
    $error = ''; // флаг проверки пустых полей
    
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    
    if(empty($login)) $error .= '<li>Не указан логин</li>';
    if(empty($pass)) $error .= '<li>Не указан пароль</li>';
    if(empty($name)) $error .= '<li>Не указано ФИО</li>';
    if(empty($email)) $error .= '<li>Не указан Email</li>';
    if(empty($phone)) $error .= '<li>Не указан телефон</li>';
    if(empty($address)) $error .= '<li>Не указан адрес</li>';
    
    if(empty($error)){
        // если все поля заполнены
        // проверяем нет ли такого юзера в БД
        $query = "SELECT customer_id FROM customers WHERE login = '" .clear($login). "' LIMIT 1";
        global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
        $row = mysqli_num_rows($res); // 1 - такой юзер есть, 0 - нет
        if($row){
            // если такой логин уже есть
            $_SESSION['reg']['res'] = "<div class='error'>Пользователь с таким логином уже зарегистрирован на сайте. Введите другой логин.</div>";
            $_SESSION['reg']['name'] = $name;
            $_SESSION['reg']['email'] = $email;
            $_SESSION['reg']['phone'] = $phone;
            $_SESSION['reg']['addres'] = $address;
        }else{
            // если все ок - регистрируем
            $login = clear($login);
            $name = clear($name);
            $email = clear($email);
            $phone = clear($phone);
            $address = clear($address);
            $pass = md5($pass);
            $query = "INSERT INTO customers (name, email, phone, address, login, password)
                        VALUES ('$name', '$email', '$phone', '$address', '$login', '$pass')";
            global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
            if(mysqli_affected_rows($con) > 0){
                global $con;
                // если запись добавлена
                $_SESSION['reg']['res'] = "<div class='success'>Регистрация прошла успешно.</div>";
                $_SESSION['auth']['user'] = $_POST['name'];
                $_SESSION['auth']['customer_id'] = mysqli_insert_id($con);
                $_SESSION['auth']['email'] = $email;
                $_SESSION['auth']['login'] = $login;
                $_SESSION['auth']['address'] = $address;
                $_SESSION['auth']['name'] = $name;
            }else{
                $_SESSION['reg']['res'] = "<div class='error'>Ошибка!</div>";
                $_SESSION['reg']['login'] = $login;
                $_SESSION['reg']['name'] = $name;
                $_SESSION['reg']['email'] = $email;
                $_SESSION['reg']['phone'] = $phone;
                $_SESSION['reg']['addres'] = $address;
            }
        }
    }else{
        // если не заполнены обязательные поля
        $_SESSION['reg']['res'] = "<div class='error'>Не заполнены обязательные поля: <ul> $error </ul></div>";
        $_SESSION['reg']['login'] = $login;
        $_SESSION['reg']['name'] = $name;
        $_SESSION['reg']['email'] = $email;
        $_SESSION['reg']['phone'] = $phone;
        $_SESSION['reg']['addres'] = $address;
    }
}
/* ===Регистрация=== */

/* ===Восстановление пароля=== */
function recovery(){
    $email = trim($_POST['email-recovery']);
    if (!empty($email)){

        $query = "SELECT * FROM customers WHERE email = '" .clear($email)."' ORDER BY customer_id DESC";
        global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
        if(mysqli_affected_rows() > 0){
            $recovery = array();
            while($row = mysqli_fetch_assoc($res)){
                $recovery[] = $row;
            }
            foreach ($recovery as $key => $user) {
                if (is_null($user['login'])){
                    unset($recovery[$key]);
                }
            }
            $new_pass = randomPassword();
            $to = $user['email'];
            $subject = 'Восстановление пароля на сайте '.$_SERVER['HTTP_HOST'];
            $mes = "Добрый день! Вы запросили новый пароль  на сайте компании Аверс-стиль. Если это были не Вы, в целях безопасности сообщите на почту avers-style@yandex.ru\r\nВаш логин: ".$user['login']."\r\nВаш новый пароль: ".$new_pass."\r\n\r\nВнимание! Письмо было отправлено роботом. Не отвечайте на него!";
            $aversheaders = 'From: noreply@avers-style.ru' . "\r\n";
            #mail('alex@1rank.pro', 'test', 'message');
            $mail_result = mail($to, $subject, $mes, $aversheaders);
            if ($mail_result){
                $_SESSION['debug_p'] = $new_pass;
                $query = "UPDATE customers SET password = '".md5($new_pass)."' WHERE customer_id = '".$user['customer_id']."'";
                #die($query);
                global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
                if(mysqli_affected_rows() > 0){
                    // если запись добавлена
                    $_SESSION['error'] = '<div class="success">Новый пароль был сгенерирован и выслан на '.$user["email"].'</div>';
                }else{
                    $_SESSION['error'] = "<div class='error'>Ошибка!</div>";
                    $_SESSION['auth_edit']['name'] = $name;
                    $_SESSION['auth_edit']['email'] = $email;
                    $_SESSION['auth_edit']['phone'] = $phone;
                    $_SESSION['auth_edit']['address'] = $address;
                }
            }
        }else{
            $_SESSION['error'] = '<div class="error">Проверьте корректность ввода электронной почты</div>';
        }
    }else{
        $_SESSION['error'] = '<div class="error">Введите адрес электронной почты</div>';
    }
}
/* ===Восстановление пароля=== */

/* ===Авторизация=== */
function authorization(){
    global $con;
    $login = mysqli_real_escape_string($con, trim($_POST['login']));
    $pass = trim($_POST['pass']);
    
    if(empty($login) OR empty($pass)){
        // если пусты поля логин/пароль
        $_SESSION['auth']['error'] = "Поля логин/пароль должны быть заполнены!";
    }else{
        // если получены данные из полей логин/пароль
        $pass = md5($pass);
        
        $query = "SELECT * FROM customers WHERE login = '$login' AND password = '$pass' LIMIT 1";
        global $con;
	$res = mysqli_query($con, $query)  or die(mysqli_error());
        if(mysqli_num_rows($res) == 1){
            // если авторизация успешна
            $row = mysqli_fetch_row($res);
            $_SESSION['auth']['customer_id'] = $row[0];
            $_SESSION['auth']['user'] = $row[1];
            $_SESSION['auth']['email'] = $row[2];
            $_SESSION['auth']['phone'] = $row[3];
            $_SESSION['auth']['address'] = $row[4];
            $_SESSION['auth']['login'] = $row[5];
            $_SESSION['auth']['password'] = $row[6];
            setcookie("auth",$_SESSION['auth']['customer_id'],time()+60*60*24*7,"http://avers-style.ru/");
        }else{
            // если неверен логин/пароль
            $_SESSION['auth']['error'] = "Логин/пароль введены неверно!";
        }
    }
}
/* ===Авторизация=== */

/* ===Добавление заказа=== */
function add_order(){
    // получаем общие данные для всех (авторизованные и не очень)
    $dostavka_id = (int)$_POST['dostavka'];
    if(!$dostavka_id) $dostavka_id = 1;
    $prim = trim($_POST['prim']);
    if($_SESSION['auth']['user']) $customer_id = $_SESSION['auth']['customer_id'];
    
    if(!$_SESSION['auth']['user']){
        $error = ''; // флаг проверки пустых полей
    
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $address = trim($_POST['address']);
        
        if(empty($name)) $error .= '<li>Не указано ФИО</li>';
        if(empty($email)) $error .= '<li>Не указан Email</li>';
        if(empty($phone)) $error .= '<li>Не указан телефон</li>';
        if(empty($address)) $error .= '<li>Не указан адрес</li>';
        
        if(empty($error)){
            // добавляем гостя в заказчики (но без данных авторизации)
            $customer_id = add_customer($name, $email, $phone, $address);
            if(!$customer_id) return false; // прекращаем выполнение в случае возникновения ошибки добавления гостя-заказчика
        }else{
            // если не заполнены обязательные поля
            $_SESSION['order']['res'] = "<div class='error'>Не заполнены обязательные поля: <ul> $error </ul></div>";
            $_SESSION['order']['name'] = $name;
            $_SESSION['order']['email'] = $email;
            $_SESSION['order']['phone'] = $phone;
            $_SESSION['order']['addres'] = $address;
            $_SESSION['order']['prim'] = $prim;
            return false;
        }
    }
    $_SESSION['order']['email'] = $email;
    $aversmessage="\r\n Имя: $name \r\n E-mail: $email \r\n Телефон: $phone \r\n Адрес: $address \r\n Товары: \r\n";
    foreach($_SESSION['cart'] as $goods_id => $value){
        $aversmessage .= "Наименование: {$value['name']}, Артикул:{$value['articul']}, Цена: {$value['price']}, Количество: {$value['qty']} шт.\r\n";
    }
    $aversmessage .= "\r\nИтого: {$_SESSION['total_quantity']} на сумму: {$_SESSION['total_sum']}";

    $aversheaders = 'From: noreply@avers-style.ru' . "\r\n";

    mail('aversstyle@yandex.ru','Новый заказ на сайте аверс-стиль.рф', $aversmessage, $aversheaders);
    save_order($customer_id, $dostavka_id, $prim);
}
/* ===Добавление заказа=== */

/* ===Добавление заказчика-гостя=== */
function add_customer($name, $email, $phone, $address){
    global $con;
    $name = clear($_POST['name']);
    $email = clear($_POST['email']);
    $phone = clear($_POST['phone']);
    $address = clear($_POST['address']);
    $query = "INSERT INTO customers (name, email, phone, address)
                VALUES ('$name', '$email', '$phone', '$address')";
    global $con;
	$res = mysqli_query($con, $query) ;
    if(mysqli_affected_rows($con) > 0){
        // если гость добавлен в заказчики - получаем его ID
        return mysqli_insert_id($con);
    }else{
        // если произошла ошибка при добавлении
        $_SESSION['order']['res'] = "<div class='error'>Произошла ошибка при регистрации заказа</div>";
        $_SESSION['order']['name'] = $name;
        $_SESSION['order']['email'] = $email;
        $_SESSION['order']['phone'] = $phone;
        $_SESSION['order']['addres'] = $address;
        $_SESSION['order']['prim'] = $address;
        return false;
    }
}
/* ===Добавление заказчика-гостя=== */

/* ===Сохранение заказа=== */
function save_order($customer_id, $dostavka_id, $prim){
    global $con;
    $prim = clear($prim);
    $query = "INSERT INTO orders (`customer_id`, `date`, `dostavka_id`, `prim`) VALUES ($customer_id, NOW(), $dostavka_id, '$prim')";
    mysqli_query($con, $query) or die(mysqli_error());
//    if(mysqli_affected_rows() == -1){
//        // если не получилось сохранить заказ - удаляем заказчика
//        mysqli_query("DELETE FROM customers  WHERE customer_id = $customer_id AND login = ''");
//        return false;
//    }
    $order_id = mysqli_insert_id($con); // ID сохраненного заказа
    
    foreach($_SESSION['cart'] as $goods_id => $value){
		 if($value['qty']<10){
			$value['price'];
		}elseif($value['qty']>9 AND $value['qty']<50) {
			if($value['price_1']>0) {
				$value['price'] = $value['price_1'];
			}else{
				$value['price'];
			}
		}elseif($value['qty']>49 AND $value['qty']<100) {
			if($value['price_2']>0) {
				$value['price'] = $value['price_2'];
			}else{
				$value['price'];
			}
		}elseif($value['qty']>99 AND $value['qty']<250) {
			if($value['price_3']>0){
				 $value['price'] = $value['price_3'];
			}else{
				$value['price'];
			}
		}elseif($value['qty']>249 AND $value['qty']<500) {
			if($value['price_4']>0) {
				$value['price'] = $value['price_4'];
			}else{
				$value['price'];
			}
		}elseif($value['qty']>499 AND $value['qty']<1000) {
			if($value['price_5']>0){
				 $value['price'] = $value['price_5'];
			}else{
				$value['price'];
			}
		}elseif($value['qty']>999) {
			if($value['price_6']>0){
				 $value['price'] = $value['price_6'];
			}else{
				$value['price'];
			}
		} 
        $val .= "($order_id, $goods_id, {$value['qty']}, '{$value['name']}', {$value['price']}, '{$value['articul']}'),";    
    }
    $val = substr($val, 0, -1); // удаляем последнюю запятую
    
    $query = "INSERT INTO zakaz_tovar (orders_id, goods_id, quantity, name, price, articul)
        VALUES $val";
    mysqli_query($con, $query) or die(mysqli_error());
//    if(mysqli_affected_rows() == -1){
//        // если не выгрузился заказа - удаляем заказчика (customers) и заказ (orders)
//        mysqli_query($con, "DELETE FROM orders WHERE order_id = $order_id");
//        mysqli_query($con, "DELETE FROM customers WHERE customer_id = $customer_id AND login = ''");
//        return false;
//    }
    
    if($_SESSION['auth']['email']) $email = $_SESSION['auth']['email'];
        else $email = $_SESSION['order']['email'];
    
    // если заказ выгрузился
    unset($_SESSION['cart']);
    unset($_SESSION['total_sum']);
    unset($_SESSION['total_quantity']);
    $_SESSION['order']['res'] = "<div class='success'>Спасибо за Ваш заказ. В ближайшее время с Вами свяжется менеджер для согласования заказа.</div>";
    return true;
}
/* ===Сохранение заказа=== */
/* ===Отдельный товар=== */
function get_goods($goods_id){
    $query = "SELECT * FROM goods WHERE goods_id = $goods_id";
    global $con;
	$res = mysqli_query($con, $query) ;
    
    $goods = array();
    $goods = mysqli_fetch_assoc($res);
    if($goods['img_slide']){
        $goods['img_slide'] = explode("|", $goods['img_slide']);
    }
    
    return $goods;
}
/* ===Отдельный товар=== */

/* ===Получение заказов=== */
function orders($status, $start_pos, $perpage, $current_user){
    $query = "SELECT *
                FROM orders
                LEFT JOIN customers
                    ON customers.customer_id = orders.customer_id".$status."
                WHERE customers.customer_id = ".$current_user;
    global $con;
	$res = mysqli_query($con, $query) ;
    $orders = array();
    while($row = mysqli_fetch_assoc($res)){
        $orders[] = $row;
    }
    foreach ($orders as $key => $order){
        $query = "SELECT *
                    FROM zakaz_tovar
                    LEFT JOIN goods
                    ON zakaz_tovar.goods_id =  goods.goods_id
                    WHERE zakaz_tovar.orders_id = ".$order['order_id'];
        global $con;
	$res = mysqli_query($con, $query) ;

        while($row = mysqli_fetch_assoc($res)){
            $orders[$key]['goods'][] = $row;
        }
    }
    return $orders;
}
/* ===Получение заказов=== */

/* ===Количество заказов=== */
function count_orders($status){
    $query = "SELECT COUNT(order_id) FROM orders".$status;
    global $con;
	$res = mysqli_query($con, $query) ;
    
    $count_orders = mysqli_fetch_row($res);
    return $count_orders[0];
}
/* ===Количество заказов=== */

/* ===Количество избранных товаров=== */
function count_favorites($user){
	$query = "SELECT COUNT(distinct(goods_id)) FROM favorite_products WHERE customer_id = '$user'";
	global $con;
	$res = mysqli_query($con, $query) ;

	$count_favorites = mysqli_fetch_row($res);
	return $count_favorites[0];
}
/* ===Количество избранных товаров=== */