<?php defined('ISHOP') or die('Access denied'); ?>
<div class="content">
	<h2>Редактирование товара</h2>
<?php
if(isset($_SESSION['edit_product']['res'])){
    echo $_SESSION['edit_product']['res'];
    unset($_SESSION['edit_product']);
}
?>
<pre><?print_r($baseimg)?></pre>
<div id="goods_id" style="display: none;"><?=$get_product['goods_id']?></div>
<form action="" method="post" enctype="multipart/form-data">
				
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название товара:</td>
		<td><input class="head-text" type="text" name="name" value="<?=htmlspecialchars($get_product['name'])?>" /></td>
	  </tr>
          <tr>
		<td class="add-edit-txt">Артикул:</td>
		<td><input class="head-text" type="text" name="articul" value="<?=htmlspecialchars($get_product['articul'])?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена:</td>
		<td><input class="head-text" type="text" name="price" value="<?=$get_product['price']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(10 - 49):</td>
		<td><input class="head-text" type="text" name="price_1" value="<?=$get_product['price_1']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(50 - 99):</td>
		<td><input class="head-text" type="text" name="price_2" value="<?=$get_product['price_2']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(100 - 249):</td>
		<td><input class="head-text" type="text" name="price_3" value="<?=$get_product['price_3']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(250 - 499):</td>
		<td><input class="head-text" type="text" name="price_4" value="<?=$get_product['price_4']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(500 - 999):</td>
		<td><input class="head-text" type="text" name="price_5" value="<?=$get_product['price_5']?>" /></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Цена(более 1000):</td>
		<td><input class="head-text" type="text" name="price_6" value="<?=$get_product['price_6']?>" /></td>
	  </tr>
       <tr>
		<td class="add-edit-txt">Ключевые слова</td>
		<td><input class="head-text" type="text" name="keywords" value="<?=htmlspecialchars($get_product['keywords'])?>" /></td>
	  </tr>
       <tr>
		<td class="add-edit-txt">Описание:</td>
		<td><input class="head-text" type="text" name="description" value="<?=htmlspecialchars($get_product['description'])?>" /></td>
	  </tr>
      <tr>
		<td>Родительская категория:</td>
		<td>
        <select class="select-inf" name="category" multiple="" size="10" style="height: auto;">
        	<?php foreach($cat as $key_parent => $item): ?>
                <?php if(count($item) > 1): // если это родительская категория ?>
                <option disabled=""><?=$item[0]?></option>
                <?php $i = 0; ?>
                <?php foreach($item['sub'] as $key => $sub): // цикл дочерних категорий ?>
                <option <?php if($key == $brand_id OR $key_parent == $brand_id AND $i == 0) {echo "selected"; $i = 1;} ?> value="<?=$key?>">&nbsp;&nbsp;- <?=$sub?></option>
                <?php endforeach; // конец цикла дочерних категорий ?>
                <?php elseif($item[0]): // если самостоятельная категория ?>
                <option <?php if($key_parent == $brand_id) echo "selected" ?> value="<?=$key_parent?>"><?=$item[0]?></option>
                <?php endif; // конец условия родительская категория ?>
            <?php endforeach; ?>
        </select>
        </td>
	  </tr>
       <tr>
		<td>Картинка товара: <br />
        <span class="small">Для удаления картинки кликните по ней</span></td>
		<td class="baseimg"><?=$baseimg?></td>
	  </tr>
      <tr>
		<td>Краткое описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor1" class="anons-text" name="anons"><?=htmlspecialchars($get_product['anons'])?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
</script>
		</td>
	  </tr>
      <tr>
		<td>Подробное описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea id="editor2" class="anons-text" name="content"><?=htmlspecialchars($get_product['content'])?></textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
</script>
		</td>
	  </tr>
<!--      <tr>-->
<!--        <td>Картинки галереи: <br />-->
<!--        <span class="small">Для удаления картинки кликните по ней</span></td>-->
<!--        <td class="slideimg">--><?//=$imgslide?><!--</td>-->
<!--      </tr> -->
<!--      <tr>-->
<!--        <td>-->
<!--            <div id="butUpload">Выбрать файл</div>-->
<!--        </td>-->
<!--        <td>-->
<!--            <div id="filesUpload"></div>-->
<!--        </td>-->
<!--      </tr>-->
<!--      <tr>-->
<!--		<td class="add-edit-txt">Материал:</td>-->
<!--        <td>-->
<!--		    -->
<!--              <input type="checkbox" name="material_1" value="1" --><?php //if(($get_product['material_1'])>0) echo 'checked=""'; ?><!-- /> Акрил <br />-->
<!--              <input type="checkbox" name="material_2" value="1" --><?php //if(($get_product['material_2'])>0) echo 'checked=""'; ?><!-- /> Дерево <br />-->
<!--              <input type="checkbox" name="material_3" value="1" --><?php //if(($get_product['material_3'])>0) echo 'checked=""'; ?><!-- /> Керамика-фарфор-стекло  <br />-->
<!--              <input type="checkbox" name="material_4" value="1" --><?php //if(($get_product['material_4'])>0) echo 'checked=""'; ?><!-- /> Металл <br />-->
<!--              <input type="checkbox" name="material_5" value="1" --><?php //if(($get_product['material_5'])>0) echo 'checked=""'; ?><!-- /> Магнитный винил <br />-->
<!--              <input type="checkbox" name="material_6" value="1" --><?php //if(($get_product['material_6'])>0) echo 'checked=""'; ?><!-- /> Текстиль <br />-->
<!--              <input type="checkbox" name="material_7" value="1" --><?php //if(($get_product['material_7'])>0) echo 'checked=""'; ?><!-- /> Пластик <br />-->
<!--              <input type="checkbox" name="material_8" value="1" --><?php //if(($get_product['material_8'])>0) echo 'checked=""'; ?><!-- /> Прочее <br />-->
<!--        </td>-->
<!--	  </tr>-->
<!--       <tr>-->
<!--		<td class="add-edit-txt">Способ изготовления:</td>-->
<!--		<td>-->
<!--        	-->
<!--              <input type="checkbox" name="izgotovlenie_1" value="1" --><?php //if($get_product['izgotovlenie_1']>0) echo 'checked=""';?><!-- /> Полиграфическая вставка <br />-->
<!--              <input type="checkbox" name="izgotovlenie_2" value="1" --><?php //if($get_product['izgotovlenie_2']>0) echo 'checked=""';?><!-- /> Заливка смолой <br />-->
<!--              <input type="checkbox" name="izgotovlenie_3" value="1" --><?php //if($get_product['izgotovlenie_3']>0) echo 'checked=""';?><!-- /> Сублимация <br />-->
<!--              <input type="checkbox" name="izgotovlenie_4" value="1" --><?php //if($get_product['izgotovlenie_4']>0) echo 'checked=""';?><!-- /> Тампопечать <br />-->
<!--              <input type="checkbox" name="izgotovlenie_5" value="1" --><?php //if($get_product['izgotovlenie_5']>0) echo 'checked=""';?><!-- /> Шелкография <br />-->
<!--              <input type="checkbox" name="izgotovlenie_6" value="1" --><?php //if($get_product['izgotovlenie_6']>0) echo 'checked=""';?><!-- /> Термоперенос <br />-->
<!--              <input type="checkbox" name="izgotovlenie_7" value="1" --><?php //if($get_product['izgotovlenie_7']>0) echo 'checked=""';?><!-- /> Гравировка <br />-->
<!--        </td>-->
<!--	  </tr>-->
<!--      <tr>-->
<!--        <td>Отметить как:</td>-->
<!--        <td><input type="checkbox" name="new" value="1" --><?php //if($get_product['new']) echo 'checked=""'; ?><!-- /> Новинка <br />-->
<!--        	<input type="checkbox" name="hits" value="1" --><?php //if($get_product['hits']) echo 'checked=""'; ?><!-- /> Лидер продаж <br />-->
<!--            <input type="checkbox" name="sale" value="1" --><?php //if($get_product['sale']) echo 'checked=""'; ?><!-- /> Распродажа <br /></td>-->
<!--      </tr>-->
<!--      </tr>-->
<!--      <tr>-->
<!--        <td>В наличии/Под заказ:</td>-->
<!--        <td><input type="radio" name="zakaz" value="0" --><?php //if($get_product['zakaz'] == 0) echo 'checked=""'; ?><!-- /> В наличии <br />-->
<!--        <input type="radio" name="zakaz" value="1"--><?php //if($get_product['zakaz']==1) echo 'checked=""'; ?><!-- /> под заказ, 1-2 дня<br />-->
<!--        <input type="radio" name="zakaz" value="2"--><?php //if($get_product['zakaz']==2) echo 'checked=""'; ?><!-- /> под заказ, 7-10 дней</td>-->
<!--      </tr>-->
<!--      <tr>-->
<!--        <td>Показывать:</td>-->
<!--        <td><input type="radio" name="visible" value="1" --><?php //if($get_product['visible']) echo 'checked=""'; ?><!-- /> Да <br />-->
<!--        <input type="radio" name="visible" value="0" --><?php //if(!$get_product['visible']) echo 'checked=""'; ?><!-- /> Нет</td>-->
<!--      </tr>  -->
	</table>
	
	<input type="image" src="<?=ADMIN_TEMPLATE?>images/save_btn.jpg" /> 
</form>	
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
<script type="text/javascript">
// загрузка картинок
var button = $("#butUpload"), interval; // кнопка загрузки + интервал ожидания
var path = '<?=GALLERYIMG?>thumbs/'; // путь к папке превью
var id = $("#goods_id").text(); // ID товара

new AjaxUpload(button, {
    action: './',
    name: 'userfile',
    data: {id: id},
    onSubmit: function(file, ext){
        if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
            alert('Запрещенный тип файла');
            // cancel upload
            return false;
        }
        button.text("Загрузка");
        this.disable();
        
        interval = window.setInterval(function(){
            var text = button.text();
            if(text.length < 11){
                button.text(text + '.');
            }else{
                button.text("Загрузка");
            }
        },300);
    },
    onComplete: function(file, response){
        button.text("Загрузить еще?");
        window.clearInterval(interval);
        this.enable();
        var res = JSON.parse(response);
        if(res.answer == "OK"){
            $("#filesUpload").append("<img src='" + path + res.file + "' />");
        }else{
            alert(res.answer);
        }
    }
});
</script>
</body>
</html>