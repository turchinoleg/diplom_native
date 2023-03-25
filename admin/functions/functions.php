<?php defined('ISHOP') or die('Access denied');

/* ===Фильтрация входящих данных из админки=== */
function clear_admin($var){
    $var = mysql_real_escape_string($var);
    return $var;
}
/* ===Фильтрация входящих данных из админки=== */

/* ===Подсвечивание активного пункта меню=== */
function active_url($str = 'view=pages'){
    $uri = $_SERVER['QUERY_STRING']; // получаем параметры
    if(!$uri) $uri = "view=pages"; // параметр по умолчанию
    $uri = explode("&", $uri); // разбиваем строку по разделителю
    if(preg_match("#page=#", end($uri))) array_pop($uri); // если есть параметр пагинации (page) - удаляем его
    if(in_array($str, $uri)){
        // если в массиве параметров есть строка - это активный пункт меню
        return "class='nav-activ'";
    }
}
/* ===Подсвечивание активного пункта меню=== */

/* ===Ресайз картинок=== */
function resize($target, $dest, $wmax, $hmax, $ext){
    /*
    $target - путь к оригинальному файлу
    $dest - путь сохранения обработанного файла
    $wmax - максимальная ширина
    $hmax - максимальная высота
    $ext - расширение файла
    */
    list($w_orig, $h_orig) = getimagesize($target);
    $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

    if(($wmax / $hmax) > $ratio){
        $wmax = $hmax * $ratio;
    }else{
        $hmax = $wmax / $ratio;
    }
    
    $img = "";
    // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
    switch($ext){
        case("gif"):
            $img = imagecreatefromgif($target);
            break;
        case("png"):
            $img = imagecreatefrompng($target);
            break;
        default:
            $img = imagecreatefromjpeg($target);    
    }
    $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
    
    if($ext == "png"){
        imagesavealpha($newImg, true); // сохранение альфа канала
        $transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
        imagefill($newImg, 0, 0, $transPng); // заливка  
    }
    
    imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
    switch($ext){
        case("gif"):
            imagegif($newImg, $dest);
            break;
        case("png"):
            imagepng($newImg, $dest);
            break;
        default:
            imagejpeg($newImg, $dest);    
    }
    imagedestroy($newImg);
}
/* ===Ресайз картинок=== */

/* ====Каталог - получение массива=== */
function catalog(){
    $query = "SELECT * FROM brands ORDER BY parent_id, position";
    $res = mysql_query($query);
    
    //массив категорий
    $cat = array();
    while($row = mysql_fetch_assoc($res)){
        if(!$row['parent_id']){
			$cat[$row['brand_id']][] = $row['brand_name'];
			$cat[$row['brand_id']][1] = $row['position'];
			$cat[$row['brand_id']][2] = $row['anons'];
        }else{
            $cat[$row['parent_id']]['sub'][$row['brand_id']] = $row['brand_name'];
        }
    }
    return $cat;
}
/* ====Каталог - получение массива=== */

/* ===Материалы=== */
function material(){
    $query = "SELECT * FROM material";
    $res = mysql_query($query);
    
    $material = array();
    while($row = mysql_fetch_assoc($res)){
        $material[] = $row;
    }
    return $material;
}
/* ===Материалы=== */

/* ===Изготовление=== */
function izgotovlenie(){
    $query = "SELECT * FROM izgotovlenie";
    $res = mysql_query($query);
    
    $izgotovlenie = array();
    while($row = mysql_fetch_assoc($res)){
        $izgotovlenie[] = $row;
    }
    return $izgotovlenie;
}
/* ===Изготовление=== */

/* ===Страницы=== */
function pages(){
    $query = "SELECT page_id, title, position FROM pages ORDER BY position";
    $res = mysql_query($query);
    
    $pages = array();
    while($row = mysql_fetch_assoc($res)){
        $pages[] = $row;
    }
    return $pages;
}
/* ===Страницы=== */

/* ===Словарь для чайников=== */
function dictionaries(){
    $query = "SELECT * FROM dictionaries ORDER BY date_modified";
    $res = mysql_query($query);
    
    $dictionaries = array();
    while($row = mysql_fetch_assoc($res)){
        $dictionaries[] = $row;
    }
    return $dictionaries;
}
/* ===Словарь для чайников=== */

/* ===Услуги=== */
function services(){
    $query = "SELECT service_id, title, position, price, img_path FROM services ORDER BY position";
    $res = mysql_query($query);
    
    $services = array();
    while($row = mysql_fetch_assoc($res)){
        $services[] = $row;
    }
    return $services;
}
/* ===Услуги=== */

/* ===Услуги, переменные=== */
function services_vars(){
	$query = "SELECT price, silknet_price_1, promo_price_1, promo_price_2, promo_price_3, promo_price_5, wideprint_price_1, wideprint_price_2, wideprint_price_3, textileprint_price_1, textileprint_price_2, textileprint_price_4, sign_price_1, sign_price_2, flags_price_1, badge_price_1, dodelka_price_1, dodelka_price_2, stand_price_1, oracal_price_1, magnitvinil_price_1, pockets, present_price_1, discount_price_1, bracers_price_1 FROM services";
	$res = mysql_query($query);

	$services_vars = array();
	while ($row = mysql_fetch_assoc($res)){
		$services_vars[] = $row;
	}
	return $services_vars;
}
/* ===Услуги, переменные=== */


/* ===Отдельная страница=== */
function get_page($page_id){
    $query = "SELECT * FROM pages WHERE page_id = $page_id";
    $res = mysql_query($query);
    
    $page = array();
    $page = mysql_fetch_assoc($res);
    
    return $page;
}
/* ===Отдельная страница=== */

/* ===Отдельная услуга=== */
function get_service($service_id){
    $query = "SELECT * FROM services WHERE service_id = $service_id";
    $res = mysql_query($query);
    
    $service = array();
    $service = mysql_fetch_assoc($res);
    
    return $service;
}
/* ===Отдельная услуга=== */

/* ===Отдельная страница словаря=== */
function get_dictionary($dictionary_id){
    $query = "SELECT * FROM dictionaries WHERE dictionary_id = $dictionary_id";
    $res = mysql_query($query);
    
    $dictionary = array();
    $dictionary = mysql_fetch_assoc($res);
    
    return $dictionary;
}
/* ===Отдельная страница словаря=== */

/* ===Редактирование страницы=== */
function edit_page($page_id){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['edit_page']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        
        $query = "UPDATE pages SET
                    title = '$title',
                    keywords = '$keywords',
                    description = '$description',
                    position = $position,
                    text = '$text'
                        WHERE page_id = $page_id";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_page']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование страницы=== */

/* ===Редактирование переменных в услугах=== */
function edit_services_vars(){
    $price = (float)$_POST['price'];
    $promo_price_1 = (float)$_POST['promo_price_1'];
    $promo_price_2 = (float)$_POST['promo_price_2'];
    $promo_price_3 = (float)$_POST['promo_price_3'];
    $promo_price_5 = (float)$_POST['promo_price_5'];
    $wideprint_price_1 = (float)$_POST['wideprint_price_1'];
    $wideprint_price_2 = (float)$_POST['wideprint_price_2'];
    $wideprint_price_3 = (float)$_POST['wideprint_price_3'];
    $textileprint_price_1 = (float)$_POST['textileprint_price_1'];
    $textileprint_price_2 = (float)$_POST['textileprint_price_2'];
    $textileprint_price_4 = (float)$_POST['textileprint_price_4'];
    $sign_price_1 = (float)$_POST['sign_price_1'];
    $sign_price_2 = (float)$_POST['sign_price_2'];
    $flags_price_1 = (float)$_POST['flags_price_1'];
    $badge_price_1 = (float)$_POST['badge_price_1'];
    $dodelka_price_1 = (float)$_POST['dodelka_price_1'];
    $dodelka_price_2 = (float)$_POST['dodelka_price_2'];
    $stand_price_1 = (float)$_POST['stand_price_1'];
    $oracal_price_1 = (float)$_POST['oracal_price_1'];
    $magnitvinil_price_1 = (float)$_POST['magnitvinil_price_1'];
    $pockets = (float)$_POST['pockets'];
    $present_price_1 = (float)$_POST['present_price_1'];
    $discount_price_1 = (float)$_POST['discount_price_1'];
    $bracers_price_1 = (float)$_POST['bracers_price_1'];
    $silknet_price_1 = (float)$_POST['silknet_price_1'];
    
    $query = "UPDATE services SET 
    			price= '$price', 
    			promo_price_1 = '$promo_price_1',
    			promo_price_2 = '$promo_price_2',
    			promo_price_3 = '$promo_price_3',
    			promo_price_5 = '$promo_price_5',
    			wideprint_price_1 = '$wideprint_price_1',
    			wideprint_price_2 = '$wideprint_price_2',
    			wideprint_price_3 = '$wideprint_price_3',
    			textileprint_price_1 = '$textileprint_price_1',
    			textileprint_price_4 = '$textileprint_price_4',
    			textileprint_price_2 = '$textileprint_price_2',
    			sign_price_1 = '$sign_price_1',
    			sign_price_2 = '$sign_price_2',
    			flags_price_1 = '$flags_price_1',
    			badge_price_1 = '$badge_price_1',
                dodelka_price_1 = '$dodelka_price_1',
                dodelka_price_2 = '$dodelka_price_2',
                stand_price_1 = '$stand_price_1',
                oracal_price_1 = '$oracal_price_1',
                magnitvinil_price_1 = '$magnitvinil_price_1',
                pockets = '$pockets',
                present_price_1 = '$present_price_1',
                discount_price_1 = '$discount_price_1',
                silknet_price_1 = '$silknet_price_1',
                bracers_price_1 = '$bracers_price_1'";
    $res = mysql_query($query) or die(mysql_error());
    
    if(mysql_affected_rows() > 0){
        $_SESSION['services_vars']['res'] = "<div class='success'>Страница обновлена!</div>";
        return true;
    }else{
        $_SESSION['services_vars']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
        return false;
    }
}
/* ===Редактирование переменных в услугах=== */


/* ===Редактирование услуги=== */
function edit_service($service_id){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    $img_path = trim($_POST['img_path']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['edit_service']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        $img_path = clear_admin($img_path);
        
        $query = "UPDATE services SET
                    title = '$title',
                    keywords = '$keywords',
                    description = '$description',
                    position = $position,
                    text = '$text',
                    img_path = '$img_path'
                        WHERE service_id = $service_id";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_service']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование услуги=== */

/* ===Редактирование страницы словаря=== */
function edit_dictionary($dictionary_id){
    $text = trim($_POST['text']);
    $title = trim($_POST['title']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['edit_dictionary']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $text = clear_admin($text);
        
        $query = "UPDATE dictionaries SET
                    name = '$title',
                    content = '$text'
                        WHERE dictionary_id = '$dictionary_id'";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_dictionary']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование страницы словаря=== */

/* ===Добавление страницы=== */
function add_page(){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['add_page']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        $_SESSION['add_page']['keywords'] = $keywords;
        $_SESSION['add_page']['description'] = $description;
        $_SESSION['add_page']['position'] = $position;
        $_SESSION['add_page']['text'] = $text;
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        
        $query = "INSERT INTO pages (title, keywords, description, position, text)
                    VALUES ('$title', '$keywords', '$description', $position, '$text')";
        $res = mysql_query($query);
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_page']['res'] = "<div class='error'>Ошибка при добавлении страницы!</div>";
            return false;
        }
    }
}
/* ===Добавление страницы=== */

/* ===Добавление услуги=== */
function add_service(){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    $price = (float)($_POST['text']);
    $promo_price_1 = (int)($_POST['promo_price_1']);
    $promo_price_2 = (int)($_POST['promo_price_2']);
    $promo_price_3 = (int)($_POST['promo_price_3']);
    $promo_price_5 = (int)($_POST['promo_price_5']);
    $img_path = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['add_service']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        $_SESSION['add_service']['keywords'] = $keywords;
        $_SESSION['add_service']['description'] = $description;
        $_SESSION['add_service']['position'] = $position;
        $_SESSION['add_service']['text'] = $text;
        $_SESSION['add_service']['price'] = $price;
        $_SESSION['add_service']['promo_price_1'] = $promo_price_1;
        $_SESSION['add_service']['promo_price_2'] = $promo_price_2;
        $_SESSION['add_service']['promo_price_3'] = $promo_price_3;
        $_SESSION['add_service']['promo_price_5'] = $promo_price_5;
        $_SESSION['add_service']['img_path'] = $img_path;
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        $price = clear_admin($price);
        $promo_price_1 = clear_admin($promo_price_1);
        $promo_price_2 = clear_admin($promo_price_2);
        $promo_price_3 = clear_admin($promo_price_3);
        $promo_price_4 = clear_admin($promo_price_4);
        $promo_price_5 = clear_admin($promo_price_5);
        $img_path = clear_admin($img_path);
        
        $query = "INSERT INTO services (title, keywords, description, position, text, price, img_path, promo_price_1, promo_price_2, promo_price_3, promo_price_4, promo_price_5)
                    VALUES ('$title', '$keywords', '$description', $position, '$text','$price','$img_path', '$promo_price_1', '$promo_price_2','$promo_price_3','$promo_price_4','$promo_price_5')";
        $res = mysql_query($query);
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_service']['res'] = "<div class='error'>Ошибка при добавлении страницы!</div>";
            return false;
        }
    }
}
/* ===Добавление услуги=== */

/* ===Добавление страницы словаря=== */
function add_dictionary(){
    $text = trim($_POST['text']);
    $title = trim($_POST['title']);
    
    if(empty($title)){
         $_SESSION['add_dictionary']['res'] = "<div class='error'>Должно быть название страницы!</div>".print_r($_POST,true);
         return false;
    }else{
        $text = clear_admin($text);
        
        $query = "INSERT INTO dictionaries (name, content, date)
                    VALUES ('$title','$text','".time()."')";
        $res = mysql_query($query);
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_dictionary']['res'] = "<div class='error'>Ошибка при добавлении страницы!".mysql_error()."</div>";
            return false;
        }
    }    
}
/* ===Добавление страницы словаря=== */

/* ===Удаление страницы=== */
function del_page($page_id){
    $query = "DELETE FROM pages WHERE page_id = $page_id";
    $res = mysql_query($query);
    
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Страница удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления страницы!</div>";
        return false;
    }
}
/* ===Удаление страницы=== */

/* ===Удаление услуги=== */
function del_service($service_id){
    $query = "DELETE FROM services WHERE service_id = $service_id";
    $res = mysql_query($query);
    
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Страница удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления страницы!</div>";
        return false;
    }
}
/* ===Удаление услуги=== */

/* ===Удаление страницы словаря=== */
function del_dictionary($dictionary_id){
    $query = "DELETE FROM dictionaries WHERE dictionary_id = $dictionary_id";
    $res = mysql_query($query);
    
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Страница удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления страницы!</div>";
        return false;
    }
}
/* ===Удаление страницы словаря=== */

/* ===Количество новостей=== */
function count_news(){
    $query = "SELECT COUNT(news_id) FROM news";
    $res = mysql_query($query);
    
    $count_news = mysql_fetch_row($res);
    return $count_news[0];
}
/* ===Количество новостей=== */

/* ===Архив новостей=== */
function get_all_news($start_pos, $perpage){
    $query = "SELECT news_id, title, anons, date FROM news ORDER BY date DESC LIMIT $start_pos, $perpage";
    $res = mysql_query($query);
    
    $all_news = array();
    while($row = mysql_fetch_assoc($res)){
        $all_news[] = $row;
    }
    return $all_news;
}
/* ===Архив новостей=== */

/* ===Добавление новости=== */
function add_news(){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $anons = trim($_POST['anons']);
    $text = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['add_news']['res'] = "<div class='error'>Должно быть название новости!</div>";
        $_SESSION['add_news']['keywords'] = $keywords;
        $_SESSION['add_news']['description'] = $description;
        $_SESSION['add_news']['anons'] = $anons;
        $_SESSION['add_news']['text'] = $text;
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $anons = clear_admin($anons);
        $text = clear_admin($text);
        $date = date("Y-m-d");
        
        $query = "INSERT INTO news (title, keywords, description, date, anons, text)
                    VALUES ('$title', '$keywords', '$description', '$date', '$anons', '$text')";
        $res = mysql_query($query);
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Новость добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_news']['res'] = "<div class='error'>Ошибка при добавлении новости!</div>";
            return false;
        }
    }
}
/* ===Добавление новости=== */

/* ===Отдельная новость=== */
function get_news($news_id){
    $query = "SELECT * FROM news WHERE news_id = $news_id";
    $res = mysql_query($query);
    
    $news = array();
    $news = mysql_fetch_assoc($res);
    
    return $news;
}
/* ===Отдельная новость=== */

/* ===Редактирование новости=== */
function edit_news($news_id){
    $title = trim($_POST['title']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $date = trim($_POST['date']);
    $anons = trim($_POST['anons']);
    $text = trim($_POST['text']);
    echo "<script>alert('success');</script>";
    if(empty($title)){
        // если нет названия
        $_SESSION['edit_news']['res'] = "<div class='error'>Должно быть название новости!</div>";
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $date = clear_admin($date);
        $anons = clear_admin($anons);
        $text = clear_admin($text);
        
        $query = "UPDATE news SET
                    title = '$title',
                    keywords = '$keywords',
                    description = '$description',
                    date = '$date',
                    anons = '$anons',
                    text = '$text'
                        WHERE news_id = $news_id";
        $res = mysql_query($query) or die(mysql_error());

        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений

        if($_FILES['baseimg']['name']){
            $baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name'])); // расширение картинки
            $baseimgName = "{$news_id}.{$baseimgExt}"; // новое имя картинки
            $baseimgTmpName = $_FILES['baseimg']['tmp_name']; // временное имя файла
            $baseimgSize = $_FILES['baseimg']['size']; // вес файла
            $baseimgType = $_FILES['baseimg']['type']; // тип файла
            $baseimgError = $_FILES['baseimg']['error']; // 0 - OK, иначе - ошибка
            
            $error = "";
            if(!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
            if($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
            if($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
            
            if(!empty($error)) $_SESSION['answer'] = "<div class='error'>Ошибка при загрузке картинки товара! <br /> {$error}</div>";
            
            // если нет ошибок
            if(empty($error)){
                if(@move_uploaded_file($baseimgTmpName, "../userfiles/news_img/tmp/$baseimgName")){
                    resize("../userfiles/news_img/tmp/$baseimgName", "../userfiles/news_img/baseimg/$baseimgName", 120, 185, $baseimgExt);
                    @unlink("../userfiles/news_img/tmp/$baseimgName");
                    mysql_query("UPDATE news SET img = '$baseimgName' WHERE news_id = $news_id");
                }else{
                    $_SESSION['answer'] .= "<div class='error'>Не удалось переместить загруженную картинку. Проверьте права на папки в каталоге /userfiles/news_img/</div>";
                }
            }
        }
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Новость обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_news']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование новости=== */

/* ===Удаление новости=== */
function del_news($news_id){
    $query = "DELETE FROM news WHERE news_id = $news_id";
    $res = mysql_query($query);
    
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Новость удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления новости!</div>";
        return false;
    }
}
/* ===Удаление новости=== */

/* ===Информеры - получение массива=== */
function informer(){
    $query = "SELECT * FROM links
                RIGHT JOIN informers ON
                    links.parent_informer = informers.informer_id
                        ORDER BY informer_position, links_position";
    $res = mysql_query($query) or die(mysql_query());
    
    $informers = array();
    $name = ''; // флаг имени информера
    while($row = mysql_fetch_assoc($res)){
        if($row['informer_name'] != $name){ // если такого информера в массиве еще нет
            $informers[$row['informer_id']][] = $row['informer_name']; // добавляем информер в массив
            $informers[$row['informer_id']]['position'] = $row['informer_position'];
            $informers[$row['informer_id']]['informer_id'] = $row['informer_id'];
            $name = $row['informer_name'];
        }
        if($informers[$row['parent_informer']])
        $informers[$row['parent_informer']]['sub'][$row['link_id']] = $row['link_name']; // заносим страницы в информер
    }
    return $informers;
}
/* ===Информеры - получение массива=== */

/* ===Массив информеров для списка=== */
function get_informers(){
    $query = "SELECT * FROM informers";
    $res = mysql_query($query);
    
    $informers = array();
    while($row = mysql_fetch_assoc($res)){
        $informers[] = $row; 
    }
    
    return $informers;
}
/* ===Массив информеров для списка=== */

/* ===Добавление страницы информера=== */
function add_link(){
    $link_name = trim($_POST['link_name']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $parent_informer = (int)$_POST['parent_informer'];
    $links_position = (int)$_POST['links_position'];
    $text = trim($_POST['text']);
    
    if(empty($link_name)){
        // если нет названия
        $_SESSION['add_link']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        $_SESSION['add_link']['keywords'] = $keywords;
        $_SESSION['add_link']['description'] = $description;
        $_SESSION['add_link']['links_position'] = $links_position;
        $_SESSION['add_link']['text'] = $text;
        return false;
    }else{
        $link_name = clear_admin($link_name);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        
        $query = "INSERT INTO links (link_name, keywords, description, parent_informer, links_position, text)
                    VALUES ('$link_name', '$keywords', '$description', $parent_informer, $links_position, '$text')";
        $res = mysql_query($query) or die(mysql_error());
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница информера добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_link']['res'] = "<div class='error'>Ошибка при добавлении страницы!</div>";
            return false;
        }            
    }
}
/* ===Добавление страницы информера=== */

/* ===Получение данных страницы информера=== */
function get_link($link_id){
    $query = "SELECT * FROM links WHERE link_id = $link_id";
    $res = mysql_query($query);
    
    $link = array();
    $link = mysql_fetch_assoc($res);
    return $link;
}
/* ===Получение данных страницы информера=== */

/* ===Редактирование страницы информера=== */
function edit_link($link_id){
    $link_name = trim($_POST['link_name']);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $parent_informer = (int)$_POST['parent_informer'];
    $links_position = (int)$_POST['links_position'];
    $text = trim($_POST['text']);
    
    if(empty($link_name)){
        // если нет названия
        $_SESSION['edit_link']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $link_name = clear_admin($link_name);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        
        $query = "UPDATE links SET
                    link_name = '$link_name',
                    keywords = '$keywords',
                    description = '$description',
                    parent_informer = $parent_informer,
                    links_position = $links_position,
                    text = '$text'
                        WHERE link_id = $link_id";
        $res = mysql_query($query) or die(mysql_error());
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница информера обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_link']['res'] = "<div class='error'>Ошибка при редактировании страницы!</div>";
            return false;
        }
    }
}
/* ===Редактирование страницы информера=== */

/* ===Удаление страницы информера=== */
function del_link($link_id){
    $query = "DELETE FROM links WHERE link_id = $link_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Страница информера удалена!</div>";
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка!</div>";
    }
}
/* ===Удаление страницы информера=== */

/* ===Добавление информера=== */
function add_informer(){
    $informer_name = clear_admin(trim($_POST['informer_name']));
    $informer_position = (int)$_POST['informer_position'];
    
    if(empty($informer_name)){
        $_SESSION['add_informer']['res'] = "<div class='error'>У информера должно быть название</div>";
        return false;
    }else{
        $query = "INSERT INTO informers (informer_name, informer_position)
                    VALUES ('$informer_name', $informer_position)";
        $res = mysql_query($query);
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Информер добавлен!</div>";
            return true;
        }else{
            $_SESSION['add_informer']['res'] = "<div class='error'>Ошибка добавления информера!</div>";
            return false;
        }
    }
}
/* ===Добавление информера=== */

/* ===Удаление информера=== */
function del_informer($informer_id){
    // удаляем страницы информера
    mysql_query("DELETE FROM links WHERE parent_informer = $informer_id");
    
    // удаляем информер
    $query = "DELETE FROM informers WHERE informer_id = $informer_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Информер удален!</div>";
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка!</div>";
    } 
}
/* ===Удаление информера=== */

/* ===Получение данных информера=== */
function get_informer($informer_id){
    $query = "SELECT * FROM informers WHERE informer_id = $informer_id";
    $res = mysql_query($query);
    
    $informers = array();
    $informers = mysql_fetch_assoc($res);
    return $informers;
}
/* ===Получение данных информера=== */

/* ===Редактирование информера=== */
function edit_informer($informer_id){
    $informer_name = clear_admin(trim($_POST['informer_name']));
    $informer_position = (int)$_POST['informer_position'];
    
    if(empty($informer_name)){
        $_SESSION['edit_informer']['res'] = "<div class='error'>У информера должно быть название</div>";
        return false;
    }else{
        $query = "UPDATE informers SET
                    informer_name = '$informer_name',
                    informer_position = $informer_position
                        WHERE informer_id = $informer_id";
        $res = mysql_query($query);
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Информер обновлен!</div>";
            return true;
        }else{
            $_SESSION['edit_informer']['res'] = "<div class='error'>Ошибка обновления информера!</div>";
            return false;
        }
    }
}
/* ===Редактирование информера=== */

/* ===Добавление категории=== */
function add_brand(){
    $brand_name = clear_admin(trim($_POST['brand_name']));
    $parent_id = (int)$_POST['parent_id'];
	$brand_position = clear_admin(trim($_POST['brand_position']));
	$anons = clear_admin(trim($_POST['anons']));
    
    if(empty($brand_name)){
        $_SESSION['add_brand']['res'] = "<div class='error'>Вы не указали название категории</div>";
        return false;
    }else{
        // проверяем нет ли такой категории на одном уровне
        $query = "SELECT brand_id FROM brands WHERE brand_name = '$brand_name' AND parent_id = $parent_id";
        $res = mysql_query($query);
        if(mysql_num_rows($res) > 0){
            $_SESSION['add_brand']['res'] = "<div class='error'>Категория с таким названием уже есть</div>";
            return false;
        }else{
            $query = "INSERT INTO brands (brand_name, parent_id, position, anons)
                        VALUES ('$brand_name', $parent_id , $brand_position, '$anons')";
            $res = mysql_query($query);
            if(mysql_affected_rows() > 0){
                $_SESSION['answer'] = "<div class='success'>Категория добавлена!</div>";
                return true;
            }else{
                $_SESSION['add_brand']['res'] = "<div class='error'>Ошибка при добавлении категории!</div>";
                return false;
            }                        
        }
    }
}
/* ===Добавление категории=== */

/* ===Редактирования бренда=== */
function edit_brand($brand_id){
    $brand_name = clear_admin(trim($_POST['brand_name']));
    $brand_position = clear_admin(trim($_POST['brand_position']));
    $parent_id = (int)$_POST['parent_id'];
	$anons = clear_admin(trim($_POST['anons']));
    
    if(empty($brand_name)){
        $_SESSION['edit_brand']['res'] = "<div class='error'>Вы не указали название категории</div>";
        return false;
    }else{
            $query = "UPDATE brands SET
                        brand_name = '$brand_name',
                        parent_id = $parent_id,
						position = $brand_position,
						anons = '$anons'
                            WHERE brand_id = $brand_id";
            $res = mysql_query($query);
            if(mysql_affected_rows() > 0){
                $_SESSION['answer'] = "<div class='success'>Категория обновлена!</div>";
                return true;
            }else{
                $_SESSION['edit_brand']['res'] = "<div class='error'>Ошибка при редактировании категории!</div>";
                return false;
            }
        
    }
}
/* ===Редактирования бренда=== */

/* ===Удаление категории=== */
function del_brand($brand_id){
    $query = "SELECT COUNT(*) FROM brands WHERE parent_id = $brand_id";
    $res = mysql_query($query);
    $row = mysql_fetch_row($res);
    if($row[0]){
        $_SESSION['answer'] = "<div class='error'>Категория имеет подкатегории! Удалите сначала их или переместите в другую категорию.</div>";
    }else{
        mysql_query("DELETE FROM goods WHERE goods_brandid = $brand_id");
        mysql_query("DELETE FROM brands WHERE brand_id = $brand_id");
        $_SESSION['answer'] = "<div class='error'>Категория удалена.</div>";
    }
}
/* ===Удаление категории=== */

/* ===Получение кол-ва товаров для навигации=== */
function count_rows($category){
    $query = "(SELECT COUNT(goods_id) as count_rows
                 FROM goods
                     WHERE goods_brandid = $category)
               UNION      
               (SELECT COUNT(goods_id) as count_rows
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                ))";
    $res = mysql_query($query) or die(mysql_error());
    
    while($row = mysql_fetch_assoc($res)){
        if($row['count_rows']) $count_rows = $row['count_rows'];
    }
    return $count_rows;
}
/* ===Получение кол-ва товаров для навигации=== */

/* ===Получение названий для хлебных крох=== */
function brand_name($category){
    $query = "(SELECT brand_id, brand_name FROM brands
                WHERE brand_id = 
                    (SELECT parent_id FROM brands WHERE brand_id = $category)
                )
                UNION
                    (SELECT brand_id, brand_name FROM brands WHERE brand_id = $category)";
    $res = mysql_query($query);
    $brand_name = array();
    while($row = mysql_fetch_assoc($res)){
        $brand_name[] = $row;
    }
    return $brand_name;
}
/* ===Получение названий для хлебных крох=== */

/* ===Получение массива товаров по категории=== */
function products($category, $start_pos, $perpage){
    $query = "(SELECT *
                 FROM goods
                     WHERE goods_brandid = $category)
               UNION      
               (SELECT *
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                )
               ) LIMIT $start_pos, $perpage";
    $res = mysql_query($query) or die(mysql_error());
    
    $products = array();
    while($row = mysql_fetch_assoc($res)){
        $products[] = $row;
    }
    
    return $products;
}
/* ===Получение массива товаров по категории=== */

/* ===Редактирование товара=== */
function edit_product($id){
    $name = trim($_POST['name']);
	$articul = trim($_POST['articul']);
    $price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
	$price_1 = round(floatval(preg_replace("#,#", ".", $_POST['price_1'])),2);
	$price_2 = round(floatval(preg_replace("#,#", ".", $_POST['price_2'])),2);
	$price_3 = round(floatval(preg_replace("#,#", ".", $_POST['price_3'])),2);
	$price_4 = round(floatval(preg_replace("#,#", ".", $_POST['price_4'])),2);
	$price_5 = round(floatval(preg_replace("#,#", ".", $_POST['price_5'])),2);
	$price_6 = round(floatval(preg_replace("#,#", ".", $_POST['price_6'])),2);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $goods_brandid = (int)$_POST['category'];
    $anons = trim($_POST['anons']);
    $content = trim($_POST['content']);
    $new = (int)$_POST['new'];
    $hits = (int)$_POST['hits'];
    $sale = (int)$_POST['sale'];
    $visible = (int)$_POST['visible'];
	$izgotovlenie_1 = trim($_POST['izgotovlenie_1']);
	$izgotovlenie_2 = trim($_POST['izgotovlenie_2']);
    $izgotovlenie_3 = trim($_POST['izgotovlenie_3']);
    $izgotovlenie_4 = trim($_POST['izgotovlenie_4']);
	$izgotovlenie_5 = trim($_POST['izgotovlenie_5']);
    $izgotovlenie_6 = trim($_POST['izgotovlenie_6']);
    $izgotovlenie_7 = trim($_POST['izgotovlenie_7']);
	$material_1 = trim($_POST['material_1']);
	$material_2 = trim($_POST['material_2']);
	$material_3 = trim($_POST['material_3']);
	$material_4 = trim($_POST['material_4']);
	$material_5 = trim($_POST['material_5']);
	$material_6 = trim($_POST['material_6']);
	$material_7 = trim($_POST['material_7']);
	$material_8 = trim($_POST['material_8']);
	$zakaz = (int)$_POST['zakaz'];
	
    
    if(empty($name)){
        $_SESSION['edit_product']['res'] = "<div class='error'>У товара должно быть название</div>";
        return false;
    }else{
        $name = clear_admin($name);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $anons = clear_admin($anons);
        $content = clear_admin($content);
        
        $query = "UPDATE goods SET
                    name = '$name',
                    keywords = '$keywords',
                    description = '$description',
                    goods_brandid = $goods_brandid,
                    anons = '$anons',
                    content = '$content',
                    hits = '$hits',
                    new = '$new',
                    sale = '$sale',
                    price = $price,
					price_1 = $price_1,
					price_2 = $price_2,
					price_3 = $price_3,
					price_4 = $price_4,
					price_5 = $price_5,
					price_6 = $price_6,
                    visible = '$visible',
					izgotovlenie_1 = '$izgotovlenie_1',
					izgotovlenie_2 = '$izgotovlenie_2',
					izgotovlenie_3 = '$izgotovlenie_3',
					izgotovlenie_4 = '$izgotovlenie_4',
					izgotovlenie_5 = '$izgotovlenie_5',
					izgotovlenie_6 = '$izgotovlenie_6',
					izgotovlenie_7 = '$izgotovlenie_7',
					material_1 = '$material_1',
					material_2 = '$material_2',
					material_3 = '$material_3',
					material_4 = '$material_4',
					material_5 = '$material_5',
					material_6 = '$material_6',
					material_7 = '$material_7',
					material_8 = '$material_8',
					zakaz = $zakaz,
					articul = '$articul'
					
                        WHERE goods_id = $id";
        $res = mysql_query($query) or die(mysql_error());
        /* базовая картинка */
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
        if($_FILES['baseimg']['name']){
            $baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name'])); // расширение картинки
            $baseimgName = "{$id}.{$baseimgExt}"; // новое имя картинки
            $baseimgTmpName = $_FILES['baseimg']['tmp_name']; // временное имя файла
            $baseimgSize = $_FILES['baseimg']['size']; // вес файла
            $baseimgType = $_FILES['baseimg']['type']; // тип файла
            $baseimgError = $_FILES['baseimg']['error']; // 0 - OK, иначе - ошибка
            
            $error = "";
            if(!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
            if($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
            if($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
            
            if(!empty($error)) $_SESSION['answer'] = "<div class='error'>Ошибка при загрузке картинки товара! <br /> {$error}</div>";
            
            // если нет ошибок
            if(empty($error)){
                if(@move_uploaded_file($baseimgTmpName, "../userfiles/product_img/tmp/$baseimgName")){
                    resize("../userfiles/product_img/tmp/$baseimgName", "../userfiles/product_img/baseimg/$baseimgName", 120, 185, $baseimgExt);
                    @unlink("../userfiles/product_img/tmp/$baseimgName");
                    mysql_query("UPDATE goods SET img = '$baseimgName' WHERE goods_id = $id");
                }else{
                    $_SESSION['answer'] .= "<div class='error'>Не удалось переместить загруженную картинку. Проверьте права на папки в каталоге /userfiles/product_img/</div>";
                }
            }
        }
        /* базовая картинка */
        $_SESSION['answer'] .= "<div class='success'>Товар обновлен</div>";
        return true;
    }
}
/* ===Редактирование товара=== */

/* ===Удаление товара=== */
function del_product($goods_id){
 
    $query = "DELETE FROM goods WHERE goods_id = $goods_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Товар удален!</div>";
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка!</div>";
    } 
}
/* ===Удаление товара=== */


/* ===Добавление товара=== */
function add_product(){
    $name = trim($_POST['name']);
    $price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
	$price_1 = round(floatval(preg_replace("#,#", ".", $_POST['price_1'])),2);
	$price_2 = round(floatval(preg_replace("#,#", ".", $_POST['price_2'])),2);
	$price_3 = round(floatval(preg_replace("#,#", ".", $_POST['price_3'])),2);
	$price_4 = round(floatval(preg_replace("#,#", ".", $_POST['price_4'])),2);
	$price_5 = round(floatval(preg_replace("#,#", ".", $_POST['price_5'])),2);
	$price_6 = round(floatval(preg_replace("#,#", ".", $_POST['price_6'])),2);
    $keywords = trim($_POST['keywords']);
    $description = trim($_POST['description']);
    $goods_brandid = (int)$_POST['category'];
    $anons = trim($_POST['anons']);
    $content = trim($_POST['content']);
	$material_1 = trim($_POST['material_1']);
	$material_2 = trim($_POST['material_2']);
	$material_3 = trim($_POST['material_3']);
	$material_4 = trim($_POST['material_4']);
	$material_5 = trim($_POST['material_5']);
	$material_6 = trim($_POST['material_6']);
	$material_7 = trim($_POST['material_7']);
	$material_8 = trim($_POST['material_8']);
	$izgotovlenie_1 = trim($_POST['izgotovlenie_1']);
	$izgotovlenie_2 = trim($_POST['izgotovlenie_2']);
	$izgotovlenie_3 = trim($_POST['izgotovlenie_3']);
	$izgotovlenie_4 = trim($_POST['izgotovlenie_4']);
	$izgotovlenie_5 = trim($_POST['izgotovlenie_5']);
	$izgotovlenie_6 = trim($_POST['izgotovlenie_6']);
	$izgotovlenie_7 = trim($_POST['izgotovlenie_7']);
    $new = (int)$_POST['new'];
    $hits = (int)$_POST['hits'];
    $sale = (int)$_POST['sale'];
    $visible = (int)$_POST['visible'];
    $date = date("Y-m-d");
	$articul = trim($_POST['articul']);
	$zakaz = trim($_POST['zakaz']);
    
    if(empty($name)){
        $_SESSION['add_product']['res'] = "<div class='error'>У товара должно быть название</div>";
        $_SESSION['add_product']['price'] = $price;
		$_SESSION['add_product']['price_1'] = $price_1;
		$_SESSION['add_product']['price_2'] = $price_2;
		$_SESSION['add_product']['price_3'] = $price_3;
		$_SESSION['add_product']['price_4'] = $price_4;
		$_SESSION['add_product']['price_5'] = $price_5;
		$_SESSION['add_product']['price_6'] = $price_6;
        $_SESSION['add_product']['keywords'] = $keywords;
        $_SESSION['add_product']['description'] = $description;
        $_SESSION['add_product']['anons'] = $anons;
        $_SESSION['add_product']['content'] = $content;
		$_SESSION['add_product']['articul'] = $articul;
		$_SESSION['add_product']['zakaz'] = $zakaz;
        return false;
    }else{
        $name = clear_admin($name);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $anons = clear_admin($anons);
        $content = clear_admin($content);
		$material = clear_admin($material);
	    $izgotovlenie = clear_admin($izgotovlenie);
		$articul = clear_admin($articul);
        
        $query = "INSERT INTO goods (name, keywords, description, goods_brandid, anons, content, hits, new, sale, price, price_1, price_2, price_3, price_4, price_5, price_6, date, visible, material_1, material_2, material_3, material_4, material_5, material_6, material_7, material_8, izgotovlenie_1,izgotovlenie_2, izgotovlenie_3, izgotovlenie_4, izgotovlenie_5, izgotovlenie_6, izgotovlenie_7,  zakaz, articul)
                    VALUES ('$name', '$keywords', '$description', $goods_brandid, '$anons', '$content', '$hits', '$new', '$sale', $price, $price_1, $price_2, $price_3, $price_4, $price_5, $price_6, '$date', '$visible','$material_1', '$material_2', '$material_3', '$material_4', '$material_5', '$material_6', '$material_7', '$material_8', '$izgotovlenie_1', '$izgotovlenie_2', '$izgotovlenie_3', '$izgotovlenie_4', '$izgotovlenie_5', '$izgotovlenie_6', '$izgotovlenie_7','$zakaz','$articul')";        
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $id = mysql_insert_id(); // ID сохраненного товара
            $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
            /* базовая картинка */
            if($_FILES['baseimg']['name']){
                $baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name'])); // расширение картинки
                $baseimgName = "{$id}.{$baseimgExt}"; // новое имя картинки
                $baseimgTmpName = $_FILES['baseimg']['tmp_name']; // временное имя файла
                $baseimgSize = $_FILES['baseimg']['size']; // вес файла
                $baseimgType = $_FILES['baseimg']['type']; // тип файла
                $baseimgError = $_FILES['baseimg']['error']; // 0 - OK, иначе - ошибка
                $error = "";
                
                if(!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if(!empty($error)) $_SESSION['answer'] = "<div class='error'>Ошибка при загрузке картинки товара! <br /> {$error}</div>";
                
                // если нет ошибок
                if(empty($error)){
                    if(@move_uploaded_file($baseimgTmpName, "../userfiles/product_img/tmp/$baseimgName")){
                        resize("../userfiles/product_img/tmp/$baseimgName", "../userfiles/product_img/baseimg/$baseimgName", 120, 185, $baseimgExt);
                        @unlink("../userfiles/product_img/tmp/$baseimgName");
                        mysql_query("UPDATE goods SET img = '$baseimgName' WHERE goods_id = $id");
                    }else{
                        $_SESSION['answer'] .= "<div class='error'>Не удалось переместить загруженную картинку. Проверьте права на папки в каталоге /userfiles/product_img/</div>";
                    }
                }
            }
            /* базовая картинка */
            ///////////////////////// 
            /* картинки галереи */
            if($_FILES['galleryimg']['name'][0]){
                for($i = 0; $i < count($_FILES['galleryimg']['name']); $i++){
                    $error = "";
                    if($_FILES['galleryimg']['name'][$i]){
                        // если есть файл
                        $galleryimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['galleryimg']['name'][$i])); // расширение картинки
                        $galleryimgName = "{$id}_{$i}.{$galleryimgExt}"; // новое имя картинки
                        $galleryimgTmpName = $_FILES['galleryimg']['tmp_name'][$i]; // временное имя файла
                        $galleryimgSize = $_FILES['galleryimg']['size'][$i]; // вес файла
                        $galleryimgType = $_FILES['galleryimg']['type'][$i]; // тип файла
                        $galleryimgError = $_FILES['galleryimg']['error'][$i]; // 0 - OK, иначе - ошибка
                        
                        if(!in_array($galleryimgType, $types)){
                            $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                            $_SESSION['answer'] .= "<div class='error'>Ошибка при загрузке картинки {$_FILES['galleryimg']['name'][$i]} <br /> {$error}</div>";
                            continue;  
                        }
                        
                        if($galleryimgSize > SIZE){
                            $error .= "Максимальный вес файла - 1 Мб";
                            $_SESSION['answer'] .= "<div class='error'>Ошибка при загрузке картинки {$_FILES['galleryimg']['name'][$i]} <br /> {$error}</div>";
                            continue;   
                        }
                        
                        if($galleryimgError){
                            $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                            $_SESSION['answer'] .= "<div class='error'>Ошибка при загрузке картинки {$_FILES['galleryimg']['name'][$i]} <br /> {$error}</div>";
                            continue;   
                        }
                        
                        // если нет ошибок
                        if(empty($error)){
                            if(@move_uploaded_file($galleryimgTmpName, "../userfiles/product_img/photos/$galleryimgName")){
                                resize("../userfiles/product_img/photos/$galleryimgName", "../userfiles/product_img/thumbs/$galleryimgName", 45, 45, $galleryimgExt);
                                if(!isset($galleryfiles)){
                                    $galleryfiles = $galleryimgName;
                                }else{
                                    $galleryfiles .= "|{$galleryimgName}";
                                }
                            }else{
                                $_SESSION['answer'] .= "<div class='error'>Не удалось переместить загруженную картинку. Проверьте права на папки в каталоге /userfiles/product_img/</div>";
                            }
                        }
                    }
                }
                if(isset($galleryfiles)){
                    mysql_query("UPDATE goods SET img_slide = '$galleryfiles' WHERE goods_id = $id");
                }
            }
            /* картинки галереи */
            $_SESSION['answer'] .= "<div class='success'>Товар добавлен</div>";
            return true;
        }else{
            $_SESSION['add_product']['res'] = "<div class='error'>Ошибка при добавлении товара</div>";
            return false;
        }
    }
}
/* ===Добавление товара=== */

/* ===Получение данных товара=== */
function get_product($goods_id){
    $query = "SELECT * FROM goods WHERE goods_id = $goods_id";


    $res = mysql_query($query);
    
    $product = array();
    $product = mysql_fetch_assoc($res);
    return $product;
}
/* ===Получение данных товара=== */

/* === Выяснить путь для картинки ===*/
function get_path_for_pictures(){
    if (strpos($_GET['view'], 'news')){
        return 'news';
    }else{
        return 'product';
    }
}
/* === Выяснить путь для картинки ===*/

/* ===AjaxUpload - загрузка картинок галереи=== */
function upload_gallery_img($id){
    $path_for_pictures = get_path_for_pictures();
    $uploaddir = '../userfiles/'.$path_for_pictures.'_img/photos/';
    $file = $_FILES['userfile']['name'];
    $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file)); // расширение картинки
    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
    
    if($_FILES['userfile']['size'] > SIZE){
        $res = array("answer" => "Ошибка! Максимальный вес файла - 1 Мб!");
        exit(json_encode($res));
    }
    
    if($_FILES['userfile']['error']){
        $res = array("answer" => "Ошибка! Возможно, файл слишком большой.");
        exit(json_encode($res));
    }
    
    if(!in_array($_FILES['userfile']['type'], $types)){
        $res = array("answer" => "Допустимые расширения - .gif, .jpg, .png");
        exit(json_encode($res));
    }
    
    $query = "SELECT img_slide FROM goods WHERE goods_id = $id";
    $res = mysql_query($query);
    $row = mysql_fetch_assoc($res);
    if($row['img_slide']){
        // если есть картинки в галерее
        $images = explode("|", $row['img_slide']);
        $lastimg = end($images);
        // получаем номер последней картинки

        $lastnum = preg_replace("#\d+_(\d+)\.\w+#", "$1", $lastimg); // 1_1.ext
        $lastnum += 1;
        $newimg = "{$id}_{$lastnum}.{$ext}"; // имя новой картинки
        $images = "{$row['img_slide']}|{$newimg}"; // строка для записи в БД
    }else{
        $newimg = "{$id}_0.{$ext}"; // имя новой картинки
        $images = $newimg; // строка для записи в БД
    }
    
    $uploadfile = $uploaddir.$newimg;
    if(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
        resize($uploadfile, "../userfiles/".$path_for_pictures."_img/thumbs/$newimg", 45, 45, $ext);
        mysql_query("UPDATE goods SET img_slide = '$images' WHERE goods_id = $id");
        $res = array("answer" => "OK", "file" => $newimg);
        exit(json_encode($res));
    }
}
/* ===AjaxUpload - загрузка картинок галереи=== */

/* ===Удаление картинок=== */
function del_img(){
    $path_for_pictures = get_path_for_pictures();
    $goods_id = (int)$_POST['goods_id'];
    $img = clear_admin($_POST['img']);
    $rel = (int)$_POST['rel'];
    
    if(!$rel){
        // если удаляется базовая картинка
        if ($path_for_pictures == 'news'){
            $query = "UPDATE news SET img = 'no_image.jpg' WHERE news_id = $news_id";
        }else{
            $query = "UPDATE goods SET img = 'no_image.jpg' WHERE goods_id = $goods_id";
        }
        mysql_query($query);
        if(mysql_affected_rows() > 0){
            return '<input type="file" name="baseimg" />';
        }else{
            return false;
        }
    }else{
        // если удаляется картинка галереи
        $query = "SELECT img_slide FROM goods WHERE goods_id = $goods_id";
        $res = mysql_query($query);
        $row = mysql_fetch_assoc($res);
        // получаем картинки в массив
        $images = explode("|", $row['img_slide']);

        foreach($images as $item){
            // пропускаем удаляемую картинку
            if($item == $img) continue;
            // формируем строку с картинками
            if(!isset($galleryfiles)){
                $galleryfiles = $item;
            }else{
                $galleryfiles .= "|$item";
            }
        }
        mysql_query("UPDATE goods SET img_slide = '$galleryfiles' WHERE goods_id = $goods_id");
        if(mysql_affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
/* ===Удаление картинок=== */

/* ===Получение количества необработанных заказов=== */
function count_new_orders(){
    $query = "SELECT COUNT(*) AS count FROM orders WHERE status = '0'";
    $res = mysql_query($query);
    $row = mysql_fetch_assoc($res);
    return $row['count'];
}
/* ===Получение количества необработанных заказов=== */

/* ===Получение заказов=== */
function orders($status, $start_pos, $perpage){
    $query = "SELECT orders.order_id, orders.date, orders.status, customers.name
                FROM orders
                LEFT JOIN customers
                    ON customers.customer_id = orders.customer_id".$status." 
                LIMIT $start_pos, $perpage";
    $res = mysql_query($query);
    $orders = array();
    while($row = mysql_fetch_assoc($res)){
        $orders[] = $row;
    }
    return $orders;
}
/* ===Получение заказов=== */

/* ===Количество заказов=== */
function count_orders($status){
    $query = "SELECT COUNT(order_id) FROM orders".$status;
    $res = mysql_query($query);
    
    $count_orders = mysql_fetch_row($res);
    return $count_orders[0];
}
/* ===Количество заказов=== */

/* ===Просмотр заказа=== */
function show_order($order_id){
    // zakaz_tovar: name, articul, price, quantity
    // orders: date, prim
    // customers: name, email, phone, address
    // dostavka: name
    $query = "SELECT zakaz_tovar.name, zakaz_tovar.price, zakaz_tovar.quantity, zakaz_tovar.articul, 
                orders.date, orders.prim, orders.status,
                customers.name AS customer, customers.email, customers.phone, customers.address,
                dostavka.name AS sposob
                    FROM zakaz_tovar
            LEFT JOIN orders
                ON zakaz_tovar.orders_id = orders.order_id
            LEFT JOIN customers
                ON customers.customer_id = orders.customer_id
            LEFT JOIN dostavka
                ON dostavka.dostavka_id = orders.dostavka_id
                    WHERE zakaz_tovar.orders_id = $order_id";
    $res = mysql_query($query);
    $show_order = array();
    while($row = mysql_fetch_assoc($res)){
        $show_order[] = $row;
    }
    return $show_order;
}
/* ===Просмотр заказа=== */

/* ===Подтверждение заказа=== */
function confirm_order($order_id){
    $query = "UPDATE orders SET status = '1' WHERE order_id = $order_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}

/* ===Подтверждение заказа=== */
/* ===Заказ на рассмотрениии=== */
function ozidanie_order($order_id){
    $query = "UPDATE orders SET status = '2' WHERE order_id = $order_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
/* ===Заказ на рассмотрениии=== */


/* ===Удаление заказа=== */
function del_order($order_id){
    mysql_query("DELETE FROM orders WHERE order_id = $order_id");
    mysql_query("DELETE FROM zakaz_tovar WHERE orders_id = $order_id");
    if(mysql_affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
/* ===Удаление заказа=== */

/* ===Количество пользователей=== */
function count_users(){
    $query = "SELECT COUNT(login) FROM customers";
    $res = mysql_query($query);
    
    $count_users = mysql_fetch_row($res);
    return $count_users[0];
}
/* ===Количество пользователей=== */

/* ===Получение списка пользователей=== */
function get_users($start_pos, $perpage){
    $query = "SELECT customer_id, name, login, email, name_role
                FROM customers
                LEFT JOIN roles
                    ON customers.id_role = roles.id_role
                WHERE login IS NOT NULL LIMIT $start_pos, $perpage";
    $res = mysql_query($query);
    $users = array();
    while($row = mysql_fetch_assoc($res)){
        $users[] = $row;
    }
    return $users;
}
/* ===Получение списка пользователей=== */

/* ===Получение списка ролей пользователей=== */
function get_roles(){
    $query = "SELECT id_role, name_role FROM roles";
    $res = mysql_query($query);
    $roles = array();
    while($row = mysql_fetch_assoc($res)){
        $roles[] = $row;
    }
    return $roles;
}
/* ===Получение списка ролей пользователей=== */

/* ===Добавление пользователя=== */
function add_user(){
    $error = ''; // флаг проверки пустых полей
    
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $id_role = (int)$_POST['id_role'];
    
    if(empty($login)) $error .= '<li>Не указан логин</li>';
    if(empty($password)) $error .= '<li>Не указан пароль</li>';
    if(empty($name)) $error .= '<li>Не указано ФИО</li>';
    if(empty($email)) $error .= '<li>Не указан Email</li>';
    
    if(empty($error)){
        // если все поля заполнены
        // проверяем нет ли такого юзера в БД
        $query = "SELECT customer_id FROM customers WHERE login = '" .clear($login). "' LIMIT 1";
        $res = mysql_query($query) or die(mysql_error());
        $row = mysql_num_rows($res); // 1 - такой юзер есть, 0 - нет
        if($row){
            // если такой логин уже есть
            $_SESSION['add_user']['res'] = "<div class='error'>Пользователь с таким логином уже зарегистрирован на сайте. Введите другой логин.</div>";
            $_SESSION['add_user']['name'] = $name;
            $_SESSION['add_user']['email'] = $email;
            $_SESSION['add_user']['password'] = $password;
            return false;
        }else{
            // если все ок - регистрируем
            $login = clear($login);
            $name = clear($name);
            $email = clear($email);
            $pass = md5($password);
            
            $query = "INSERT INTO customers (name, email, login, password, id_role)
                        VALUES ('$name', '$email', '$login', '$pass', $id_role)";
            $res = mysql_query($query) or die(mysql_error());
            if(mysql_affected_rows() > 0){
                // если запись добавлена
                $_SESSION['answer'] = "<div class='success'>Пользователь добавлен.</div>";
                return true;
            }else{
                $_SESSION['add_user']['res'] = "<div class='error'>Ошибка!</div>";
                $_SESSION['add_user']['login'] = $login;
                $_SESSION['add_user']['name'] = $name;
                $_SESSION['add_user']['email'] = $email;
                $_SESSION['add_user']['password'] = $password;
                return false;
            }
        }
    }else{
        // если не заполнены обязательные поля
        $_SESSION['add_user']['res'] = "<div class='error'>Не заполнены обязательные поля: <ul> $error </ul></div>";
        $_SESSION['add_user']['login'] = $login;
        $_SESSION['add_user']['name'] = $name;
        $_SESSION['add_user']['email'] = $email;
        $_SESSION['add_user']['password'] = $password;
        return false;
    }
}
/* ===Добавление пользователя=== */

/* ===Сортировка страниц=== */
function sort_pages($post) {

	$position = 1;
	foreach($post as $item){
		$res = mysql_query("UPDATE pages SET position = $position WHERE page_id = $item");
		if(!$res ||(mysql_affected_rows() == -1)) {
			return FALSE;
		}
		$position++;
	}
	
	$result = mysql_query("SELECT page_id, position FROM pages");
	if(!$result) {
		return FALSE;
	}
	$row = array();
	for($i = 0;$i < mysql_num_rows($result);$i++) {
		$row[] = mysql_fetch_assoc($result);
	}
	
	return $row;
}
/* ===Сортировка страниц=== */

/* ===Сортировка ссылок=== */
function sort_links($post,$parent) {

	$position = 1;
	foreach($post as $item){
		$res = mysql_query("UPDATE `links` SET `links_position`='{$position}' WHERE `link_id`='{$item}' AND `parent_informer` = '{$parent}'");
		if(!$res ||(mysql_affected_rows() == -1)) {
			return FALSE;
		}
		$position++;
	}
	
	$result = mysql_query("SELECT link_id,links_position FROM links WHERE `parent_informer` = '{$parent}' ORDER BY `links_position`");
	if(!$result) {

		return FALSE;
	}
	$row = array();
	for($i = 0;$i < mysql_num_rows($result);$i++) {
		$row[] = mysql_fetch_assoc($result);
	}
	return $row;
}
/* ===Сортировка ссылок=== */
/* ===Сортировка информеров=== */
function sort_informers($post) {

	$position = 1;
	foreach($post as $item){
		$res = mysql_query("UPDATE `informers` SET `informer_position`='{$position}' WHERE `informer_id`='{$item}'");
		if(!$res ||(mysql_affected_rows() == -1)) {
			return FALSE;
		}
		$position++;
	}
	return TRUE;
}
/* ===Сортировка информеров=== */

/* ===Получение данных пользователя=== */
function get_user($user_id){
    $query = "SELECT name, email, phone, address, login, id_role FROM customers WHERE customer_id = $user_id";
    $res = mysql_query($query);
    $user = array();
    $user = mysql_fetch_assoc($res);
    return $user;
}
/* ===Получение данных пользователя=== */

/* ===Редактирование пользователя=== */
function edit_user($user_id){
    foreach($_POST as $key => $val){
        if($key == "x" OR $key == "y") continue;
        if($key == "password"){
            $val = trim($val);
            if(!empty($val)){
                $val = md5($val);
            }else{
                continue;
            }
        }else{
            $val = clear($val);
        }
        $data[$key] = $val;
    }
    
    $fields = array_keys($data);
    $values = array_values($data);
    
    for($i = 0; $i < count($fields); $i++){
        $str .= "{$fields[$i]} = '{$values[$i]}',";
    }
    $str = substr($str, 0, -1);
    $query = "UPDATE customers SET {$str} WHERE customer_id = $user_id";
    $res = mysql_query($query);
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Данные обновлены</div>";
        if($user_id == $_SESSION['auth']['user_id']){
            $_SESSION['auth']['admin'] = htmlspecialchars($_POST['name']);
        }
        return true;
    }else{
        $_SESSION['edit_user']['res'] = "<div class='error'>Ошибка</div>";
        return false;
    }
}
/* ===Редактирование пользователя=== */

/* ===Удаление пользователя=== */
function del_user($user_id){
    if($_SESSION['auth']['user_id'] == $user_id){
        $_SESSION['answer'] = "<div class='error'>Вы не можете удалить сами себя!</div>";
    }else{
        $query = "DELETE FROM customers WHERE customer_id = $user_id";
        mysql_query($query);
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Пользователь удален</div>";
        }else{
            $_SESSION['answer'] = "<div class='error'>Ошибка удаления!</div>";
        }
    }
}
/* ===Удаление пользователя=== */

?>