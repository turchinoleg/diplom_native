<?php defined('ISHOP') or die('Access denied');

/* ===Фильтрация входящих данных из админки=== */
function clear_admin($var){
    global $con;
    $var = mysqli_real_escape_string($con, $var);
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

/* ====Каталог - получение массива=== */
function catalog(){
    global $con;
    $query = "SELECT * FROM brands ORDER BY parent_id, position";
    $res = mysqli_query($con, $query);
    
    //массив категорий
    $cat = array();
    while($row = mysqli_fetch_assoc($res)){
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

/* ===Получение кол-ва товаров для навигации=== */
function count_rows($category){
    global $con;
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
    $res = mysqli_query($con, $query) or die(mysqli_error());
    
    while($row = mysqli_fetch_assoc($res)){
        if($row['count_rows']) $count_rows = $row['count_rows'];
    }
    return $count_rows;
}
/* ===Получение кол-ва товаров для навигации=== */

/* ===Получение названий для хлебных крох=== */
function brand_name($category){
    global $con;
    $query = "(SELECT brand_id, brand_name FROM brands
                WHERE brand_id = 
                    (SELECT parent_id FROM brands WHERE brand_id = $category)
                )
                UNION
                    (SELECT brand_id, brand_name FROM brands WHERE brand_id = $category)";
    $res = mysqli_query($con,$query);
    $brand_name = array();
    while($row = mysqli_fetch_assoc($res)){
        $brand_name[] = $row;
    }
    return $brand_name;
}
/* ===Получение названий для хлебных крох=== */

/* ===Получение массива товаров по категории=== */
function products($category, $start_pos, $perpage){
    global $con;

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
    $res = mysqli_query($con, $query) or die(mysqli_error());
    
    $products = array();
    while($row = mysqli_fetch_assoc($res)){
        $products[] = $row;
    }
    
    return $products;
}
/* ===Получение массива товаров по категории=== */

/* ===Редактирование товара=== */
function edit_product($id){
    global $con;
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
					articul = '$articul'
					
                        WHERE goods_id = $id";
        $res = mysqli_query($con, $query) or die(mysqli_error());
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
                global $con;
                if(@move_uploaded_file($baseimgTmpName, "../userfiles/product_img/tmp/$baseimgName")){
                    resize("../userfiles/product_img/tmp/$baseimgName", "../userfiles/product_img/baseimg/$baseimgName", 120, 185, $baseimgExt);
                    unlink("../userfiles/product_img/tmp/$baseimgName");
                    mysqli_query($con,"UPDATE goods SET img = '$baseimgName' WHERE goods_id = $id");
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
    global $con;
    $query = "DELETE FROM goods WHERE goods_id = $goods_id";
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
        $_SESSION['answer'] = "<div class='success'>Товар удален!</div>";
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка!</div>";
    } 
}
/* ===Удаление товара=== */


/* ===Добавление товара=== */
function add_product(){
    global $con;
    $name = trim($_POST['name']);
    $price = round(floatval(preg_replace("#,#", ".", $_POST['price'])),2);
	$price_1 = round(floatval(preg_replace("#,#", ".", $_POST['price_1'])),2);
	$price_2 = round(floatval(preg_replace("#,#", ".", $_POST['price_2'])),2);
	$price_3 = round(floatval(preg_replace("#,#", ".", $_POST['price_3'])),2);
	$price_4 = round(floatval(preg_replace("#,#", ".", $_POST['price_4'])),2);
	$price_5 = round(floatval(preg_replace("#,#", ".", $_POST['price_5'])),2);
	$price_6 = round(floatval(preg_replace("#,#", ".", $_POST['price_6'])),2);
    $description = trim($_POST['description']);
    $goods_brandid = (int)$_POST['category'];
    $anons = trim($_POST['anons']);
    $content = trim($_POST['content']);
    $new = (int)$_POST['new'];
    $hits = (int)$_POST['hits'];
    $sale = (int)$_POST['sale'];
    $visible = (int)$_POST['visible'];
    $date = date("Y-m-d");
	$articul = trim($_POST['articul']);
    
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

        return false;
    }else{
        $name = clear_admin($name);
        $description = clear_admin($description);
        $anons = clear_admin($anons);
        $content = clear_admin($content);
		$articul = clear_admin($articul);
        $material_1 = '1';
        $material_2 = '0';
        $material_3 = '0';
        $material_4 = '0';
        $material_5 = '0';
        $material_6 = '0';
        $material_7 = '0';
        $material_8 = '0';
        $izgotovlenie_1 ='0';
        $izgotovlenie_2 ='0';
        $izgotovlenie_3 ='0';
        $izgotovlenie_4 ='0';
        $izgotovlenie_5 ='0';
        $izgotovlenie_6 ='0';
        $izgotovlenie_7 ='0';
        $zakaz =0;
        $visible=1;
        $query = "INSERT INTO goods (name, keywords, description, goods_brandid, anons, content, hits, new, sale, price, price_1, price_2, price_3, price_4, price_5, price_6, date, visible, material_1, material_2, material_3, material_4, material_5, material_6, material_7, material_8, izgotovlenie_1,izgotovlenie_2, izgotovlenie_3, izgotovlenie_4, izgotovlenie_5, izgotovlenie_6, izgotovlenie_7,  zakaz, articul)
                    VALUES ('$name', '$keywords', '$description', $goods_brandid, '$anons', '$content', '$hits', '$new', '$sale', $price, $price_1, $price_2, $price_3, $price_4, $price_5, $price_6, '$date', '$visible','$material_1', '$material_2', '$material_3', '$material_4', '$material_5', '$material_6', '$material_7', '$material_8', '$izgotovlenie_1', '$izgotovlenie_2', '$izgotovlenie_3', '$izgotovlenie_4', '$izgotovlenie_5', '$izgotovlenie_6', '$izgotovlenie_7','$zakaz','$articul')";
        $res = mysqli_query($con, $query) or die(mysqli_error());
        
        if(mysqli_affected_rows($con) > 0){
            global $con;
            $id = mysqli_insert_id($con); // ID сохраненного товара
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
                        mysqli_query($con, "UPDATE goods SET img = '$baseimgName' WHERE goods_id = $id");
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
                    global $con;
                    mysqli_query($con,"UPDATE goods SET img_slide = '$galleryfiles' WHERE goods_id = $id");
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
    global $con;
    $query = "SELECT * FROM goods WHERE goods_id = $goods_id";


    $res = mysqli_query($con, $query);
    
    $product = array();
    $product = mysqli_fetch_assoc($res);
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
    global $con;
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
    $res = mysqli_query($con,  $query);
    $row = mysqli_fetch_assoc($con, $res);
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
        mysqli_query($con,"UPDATE goods SET img_slide = '$images' WHERE goods_id = $id");
        $res = array("answer" => "OK", "file" => $newimg);
        exit(json_encode($res));
    }
}
/* ===AjaxUpload - загрузка картинок галереи=== */

/* ===Удаление картинок=== */
function del_img(){
    global $con;
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
        mysqli_query($con, $query);
        if(mysqli_affected_rows($con) > 0){
            return '<input type="file" name="baseimg" />';
        }else{
            return false;
        }
    }else{
        // если удаляется картинка галереи
        $query = "SELECT img_slide FROM goods WHERE goods_id = $goods_id";
        $res = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($con,$res);
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
        mysqli_query($con,"UPDATE goods SET img_slide = '$galleryfiles' WHERE goods_id = $goods_id");
        if(mysqli_affected_rows($con) > 0){
            return true;
        }else{
            return false;
        }
    }
}
/* ===Удаление картинок=== */

/* ===Получение количества необработанных заказов=== */
function count_new_orders(){
    global $con;
    $query = "SELECT COUNT(*) AS count FROM orders WHERE status = '0'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc( $res);
    return $row['count'];
}
/* ===Получение количества необработанных заказов=== */
/* ===Получение количества подтвержденных заказов=== */
function count_view_orders(){
    global $con;
    $query = "SELECT COUNT(*) AS count FROM orders WHERE status = '1'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc( $res);
    return $row['count'];
}
/* ===Получение количества подтвержденных заказов=== */
/* ===Получение количества рассматриваемых заказов=== */
function count_conf_orders(){
    global $con;
    $query = "SELECT COUNT(*) AS count FROM orders WHERE status = '2'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc( $res);
    return $row['count'];
}
/* ===Получение количества рассматриваемых заказов=== */
/* ===Получение количества отмененных заказов=== */
function count_cancel_orders(){
    global $con;
    $query = "SELECT COUNT(*) AS count FROM orders WHERE status = '3'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc( $res);
    return $row['count'];
}
/* ===Получение количества отмененных заказов=== */

/* ===Получение заказов=== */
function orders($status, $start_pos, $perpage){
    global $con;
    $query = "SELECT orders.order_id, orders.date, orders.status, customers.name
                FROM orders
                LEFT JOIN customers
                    ON customers.customer_id = orders.customer_id".$status." 
                LIMIT $start_pos, $perpage";
    $res = mysqli_query($con,$query);
    $orders = array();
    while($row = mysqli_fetch_assoc($res)){
        $orders[] = $row;
    }
    return $orders;
}
/* ===Получение заказов=== */

/* ===Количество заказов=== */
function count_orders($status){
    global $con;
    $query = "SELECT COUNT(order_id) FROM orders".$status;
    $res = mysqli_query($con,$query);
    
    $count_orders = mysqli_fetch_row($res);
    return $count_orders[0];
}
/* ===Количество заказов=== */

/* ===Просмотр заказа=== */
function show_order($order_id){
    global $con;
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
    $res = mysqli_query($con, $query);
    $show_order = array();
    while($row = mysqli_fetch_assoc($res)){
        $show_order[] = $row;
    }
    return $show_order;
}
/* ===Просмотр заказа=== */

/* ===Подтверждение заказа=== */
function confirm_order($order_id){
    global $con;
    $query = "UPDATE orders SET status = '1' WHERE order_id = $order_id";
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
        return true;
    }else{
        return false;
    }
}

/* ===Подтверждение заказа=== */
/* ===Заказ на рассмотрениии=== */
function ozidanie_order($order_id){
    global $con;
    $query = "UPDATE orders SET status = '2' WHERE order_id = $order_id";
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
        return true;
    }else{
        return false;
    }
}
/* ===Заказ на рассмотрениии=== */
/* ===Заказ отменен=== */
function otkaz_order($order_id){
    global $con;
    $query = "UPDATE orders SET status = '3' WHERE order_id = $order_id";
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
        return true;
    }else{
        return false;
    }
}
/* ===Заказ на рассмотрениии=== */


/* ===Удаление заказа=== */
function del_order($order_id){
    global $con;
    mysqli_query($con,"DELETE FROM orders WHERE order_id = $order_id");
    mysqli_query($con,"DELETE FROM zakaz_tovar WHERE orders_id = $order_id");
    if(mysqli_affected_rows($con) > 0){
        return true;
    }else{
        return false;
    }
}
/* ===Удаление заказа=== */


/* ===Получение данных пользователя=== */
function get_user($user_id){
    global $con;
    $query = "SELECT name, email, phone, address, login, id_role FROM customers WHERE customer_id = $user_id";
    $res = mysqli_query($con, $query);
    $user = array();
    $user = mysqli_fetch_assoc($res);
    return $user;
}
/* ===Получение данных пользователя=== */

/* ===Редактирование пользователя=== */
function edit_user($user_id){
    global $con;
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
    $res = mysqli_query($con, $query);
    if(mysqli_affected_rows($con) > 0){
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

?>