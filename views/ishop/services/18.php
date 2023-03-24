<script type="text/javascript">
	function calc_wooden_souv_1() {
		var vars = [
			parseInt($('select[name=wooden_souv_1_type]').val()),
			parseInt($('input[name=wooden_souv_1_count]').val())
		];

		<?$get_goods = get_goods(1076);?>
		<?$get_goods1 = get_goods(183);?>
		<?$get_goods2 = get_goods(189);?>
		<?$get_goods3 = get_goods(627);?>
		<?$get_goods4 = get_goods(188);?>

		var a,b,c,d,e;
		
		if(vars[1]>499){
			
		}else if (vars[1]>299){
			d = -22;
		}else if (vars[1]>199){
			d = -17;
		}else if (vars[1]>99){
			d = -12;
		}else if (vars[1]>49){
			d = -7;
		}else if (vars[1]>9){
			d = 3;
		}else d = 13;


		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d + parseFloat('<?=$get_goods2["price"]?>') + parseFloat('<?=$get_goods3["price"]?>') + parseFloat('<?=$get_goods4["price"]?>');
				break;
			case 2:
				e = parseFloat('<?=$get_goods1["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"];?>') + d + parseFloat('<?=$get_goods2["price"]?>') + parseFloat('<?=$get_goods3["price"]?>') + parseFloat('<?=$get_goods4["price"]?>');
				break;
		}
		
		if (isNaN(e)){
			$('span#result_wooden_souv_1').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wooden_souv_1_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wooden_souv_1').text(e.toFixed(1));			
			$('span#result_wooden_souv_1_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_wooden_souv_2() {
		var vars = [
			parseInt($('select[name=wooden_souv_2_type]').val()),
			parseInt($('input[name=wooden_souv_2_count]').val())
		];

		<?$get_goods = get_goods(392);?>
		<?$get_goods1 = get_goods(934);?>
		<?$get_goods2 = get_goods(933);?>
		<?$get_goods3 = get_goods(931);?>
		<?$get_goods4 = get_goods(1267);?>

		var a,b,c,d,e;
		
		if (vars[1]>299){
			
		}else if (vars[1]>199){
			d = -30;
		}else if (vars[1]>99){
			d = -25;
		}else if (vars[1]>49){
			d = -20;
		}else if (vars[1]>9){
			d = 0;
		}else d = 15;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;	
			case 3:
				e = parseFloat('<?=$get_goods2["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;	
			case 4:
				e = parseFloat('<?=$get_goods3["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;	
			case 5:
				e = parseFloat('<?=$get_goods4["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;			
		}

		if (isNaN(e)){
			$('span#result_wooden_souv_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wooden_souv_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wooden_souv_2').text(e.toFixed(1));			
			$('span#result_wooden_souv_2_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_wooden_souv_4() {
		var vars = [
			parseInt($('select[name=wooden_souv_4_type]').val()),
			parseInt($('input[name=wooden_souv_4_count]').val())
		];

		<?$get_goods = get_goods(898);?>
		<?$get_goods1 = get_goods(390);?>
		<?$get_goods2 = get_goods(896);?>
		<?$get_goods3 = get_goods(675);?>
		<?$get_goods4 = get_goods(674);?>

		var a,b,c,d,e;
		
		if (vars[1]>199){
			
		}else if (vars[1]>99){
			d = -20;
		}else if (vars[1]>49){
			d = -10;
		}else if (vars[1]>9){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1["price"]?>') + parseFloat('<?=$get_service["dodelka_price_2"]?>') + d;
				break;	
			case 3:
				e = parseFloat('<?=$get_goods2["price"]?>') + d;
				break;	
			case 4:
				e = parseFloat('<?=$get_goods3["price"]?>') + d;
				break;	
			case 5:
				e = parseFloat('<?=$get_goods4["price"]?>') + d;
				break;			
		}

		if (isNaN(e)){
			$('span#result_wooden_souv_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wooden_souv_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wooden_souv_4').text(e.toFixed(1));			
			$('span#result_wooden_souv_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_wooden_souv_5() {
		var vars = [
			parseInt($('input[name=wooden_souv_5_count]').val())
		];

		<?$get_goods = get_goods(391);?>

		var a,b,c,d,e;
		
		if (vars[0]>299){
			
		}else if (vars[0]>199){
			d = -20;
		}else if (vars[0]>99){
			d = -15;
		}else if (vars[0]>49){
			d = -10;
		}else if (vars[0]>9){
			d = 0;
		}else d = 10;

		e = parseFloat('<?=$get_goods["price"]?>') + parseFloat('<?=$get_service["dodelka_price_1"]?>') + d;

		if (isNaN(e)){
			$('span#result_wooden_souv_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wooden_souv_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wooden_souv_5').text(e.toFixed(1));			
			$('span#result_wooden_souv_5_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_wooden_souv_10() {
		var vars = [
			parseInt($('input[name=wooden_souv_10_a]').val().replace('/,/','.')),
			parseInt($('input[name=wooden_souv_10_b]').val().replace('/,/','.')),
			parseInt($('input[name=wooden_souv_10_count]').val())
		];

		var a,b,c,d,e;
		
		e = vars[0]*vars[1]*parseFloat('<?=$get_service["stand_price_1"]?>');
/*
		if (isNaN(e)){
			$('span#result_wooden_souv_10').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wooden_souv_10_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wooden_souv_10').text(e.toFixed(1));			
			$('span#result_wooden_souv_10_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}*/
		if (isNaN(e)){
			$('#wooden_souv_10_form .calc_row:nth-last-child(2) strong').html('Обратитесь для расчета в офис');
			$('#wooden_souv_10_form .calc_row:nth-last-child(1) strong').html('');
		} else {
			$('#wooden_souv_10_form .calc_row:nth-last-child(2) strong').html('Стоимость за единицу: <span class="calc_result">'+e.toFixed(1)+'</span> руб.');
			$('#wooden_souv_10_form .calc_row:nth-last-child(1) strong').html('Полная стоимость: <span class="calc_result">'+(!isNaN(vars[2]) ? (e*vars[2]).toFixed(1) : '0')+'</span> руб.');
		}
	}
	function calc_mirrors() {
		var vars = [		
		parseInt($('input[name=mirrors_count]').val())
		];
		<?$get_goods1 = get_goods(1142);?>  //price_1
		var d,e;


		if (vars[0]>499){
			
		}else if (vars[0]>299){
			d = -20;
		}else if (vars[0]>199){
			d = -18;
		}else if (vars[0]>99){
			d = -15;
		}else if (vars[0]>29){
			d = -10;
		}else d = 0;
		
		e = parseFloat('<?=$get_goods1['price_1']?>') + d + parseFloat('<?=$get_service['dodelka_price_2'];?>');

		if (isNaN(e)){
				$('span#result_mirrors').parent().text('Обратитесь для расчета в офис');
				$('span#result_mirrors_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_mirrors').text(e.toFixed(1));
				$('span#result_mirrors_full').text((e.toFixed(1)*vars[0]).toFixed(1));
			}
	}

	function reset_form_wooden_souv_4() {
		$('form#wooden_souv_4_form')[0].reset();
	}
	function reset_form_wooden_souv_2() {
		$('form#wooden_souv_2_form')[0].reset();
	}
	function reset_form_wooden_souv_1() {
		$('form#wooden_souv_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="wooden_souv_1">
	<div class="arrow_before"></div>	       
    <h2>Тарелки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Тарелки декоративные деревянные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wooden_souv_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="wooden_souv_1_type">
		    			<option value="1">«Эконом», 17 см</option>
		    			<option value="2">«Кружево» и т.д., 20 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wooden_souv_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wooden_souv_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wooden_souv_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_wooden_souv_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wooden_souv_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Все тарелки выполнены из фанеры или ламинированного ХДФ толщиной 3 мм, между двумя слоями изделия вклеивается полноцветная вставка. Деревянные ножки и подвес на стену в комплекте, упаковка - картонная коробка.</p>
	    <p class="serv_tip">Посмотреть и выбрать варианты стандартных деревянных тарелок можно <a href="<?=PATH.'category/37';?>">здесь</a>. Возможно изготовление тарелок по нестандартному макету, стоимость рассчитывается индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_2">
	<div class="arrow_before"></div>	       
    <h2>Вечные календари</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Календарь на широкий диапазон лет, предназначенный для определения дня недели.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wooden_souv_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="wooden_souv_2_type">
		    			<option value="1">С "кубиками"</option>
		    			<option value="2">С карандашницей</option>
		    			<option value="3">С двумя фоторамками</option>
		    			<option value="4">С ключницей</option>
		    			<option value="5">С часами</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wooden_souv_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wooden_souv_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wooden_souv_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wooden_souv_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wooden_souv_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Все календари выполнены из фанеры или ламинированного ХДФ толщиной 3 мм.</p>
	    <p class="serv_tip">Изображение гравируется или печатается полноцветом по желанию заказчика.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	    <p class="serv_tip">Параметры вечных календарей: 
	    	<ol>
	    		<li>16х7.5х4 см, кубики с цифрами и месяцами поворачиваются;</li>
	    		<li>17x10x10 см, "планка" с цифрами двигается вдоль дней недели, выставляется один раз в месяц;</li>
	    		<li>15х8х5 см, "планка" с цифрами двигается вдоль дней недели, выставляется один раз в месяц;</li>
	    		<li>20х21 см, "планка" с цифрами двигается вдоль дней недели, выставляется один раз в месяц, подвес на стену;</li>
	    		<li>20x20 см, "планка" с цифрами двигается вдоль дней недели, выставляется один раз в месяц.</li>
	    	</ol>
	    </p>
	    <p class="serv_tip">Возможно изготовление календарей по нестандартному макету, стоимость рассчитывается индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_3">
	<a href="<?=PATH.'service/13';?>">
		<div class="arrow_before"></div>	       
	    <h2>Часы</h2>
	</a>
</div>
<hr>
<div class="serv-section" id="wooden_souv_4">
	<div class="arrow_before"></div>	       
    <h2>Шкатулки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Шкатулки деревянные с полноцветным изображением или гравировкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wooden_souv_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="wooden_souv_4_type">
		    			<option value="1">10х10 см (фанера/ХДФ)</option>
		    			<option value="2">18х18 см (фанера/ХДФ)</option>
		    			<option value="3">6х9 см (дерево, лак)</option>
		    			<option value="4">10х14 см (дерево, лак)</option>
		    			<option value="5">16х16 см (дерево, лак)</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wooden_souv_4_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wooden_souv_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wooden_souv_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wooden_souv_4_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wooden_souv_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	    <p class="serv_tip">Параметры шкатулок: 
	    	<ol>
	    		<li>10х10х5.5 см, фанера или ламинированный ХДФ 3 мм, гравировка или полноцветная печать на крышке;</li>
	    		<li>18х18х5.5 см, фанера или ламинированный ХДФ 3 мм, гравировка или полноцветная печать на крышке;</li>
	    		<li>6х9 см, дерево, черный лак, полноцветное изображение на крышке;</li>
	    		<li>10х14 см, дерево, черный лак, полноцветное изображение на крышке;</li>
	    		<li>16х16 см, дерево, черный лак, полноцветное изображение на крышке;</li>
	    	</ol>
	    </p>
	    <p class="serv_tip">Возможно изготовление шкатулок из фанеры или ХДФ по нестандартному макету, стоимость рассчитывается индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_5">
	<div class="arrow_before"></div>	       
    <h2>Карандашницы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Карандашницы деревянные с гравировкой или полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wooden_souv_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wooden_souv_5_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wooden_souv_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wooden_souv_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wooden_souv_5_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wooden_souv_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер стандартной карандашницы 8х5.5х5.5 см, материал - фанера 3 мм. Возможно индивидуальное изготовление карандашниц любых размеров и типов.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_6">
	<div class="arrow_before"></div>	       
    <h2>Подарочная упаковка</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Любые виды подарочной упаковки из фанеры или ламинированного ХДФ в короткие сроки. Подробности уточняйте у менеджеров. Стоимость одного изделия от 40 руб.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_7">
	<div class="arrow_before"></div>	       
    <h2>Фоторамки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Любые виды фоторамок из фанеры или ламинированного ХДФ в короткие сроки. Подробности уточняйте у менеджеров. Стоимость одного изделия от 100 руб.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_8">
	<div class="arrow_before"></div>	       
    <h2>Топперы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Любые виды топперов из фанеры в короткие сроки. Подробности уточняйте у менеджеров. Стоимость одного изделия от 50 руб.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_10">
	<div class="arrow_before"></div>	       
    <h2>Хэштеги/надписи</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Любые объемные надписи, хештеги, имена детей, друзей, памятные даты и события из фанеры 3-6 мм под заказ в короткие сроки.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wooden_souv_10_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="wooden_souv_10_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="wooden_souv_10_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wooden_souv_10_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wooden_souv_10">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wooden_souv_10();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wooden_souv_10_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wooden_souv_10();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Максимальный размер изделия 40*95 см.</p>
	    <p class="serv_tip">Возможна окраска фанеры в любой цвет, покрытие лаком или использование благородных пород дерева. Цена рассчитывается индивидуально.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый заказчиком, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 100-500 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="mirrors">
	<div class="arrow_before"></div>	       
	<h2>Зеркала</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Зеркала карманные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="mirrors_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="mirrors_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_mirrors">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_mirrors();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_mirrors_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_mirrors();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Зеркальце карманное в деревянной оправе диаметром 62 мм.</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="cardholder">
	<div class="arrow_before"></div>	       
    <h2>Кардхолдеры</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Приспособление для хранения дисконтных карт с гравировкой или полноцветной печатью, от 40 руб.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="brushes">
	<div class="arrow_before"></div>	       
    <h2>Расчески</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Расчёска деревянная с гравировкой, от 40 руб.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="wooden_souv_9">
	<div class="arrow_before"></div>	       
    <h2>Эксклюзивные сувениры</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Компания «Аверс-стиль» занимается изготовлением различных эксклюзивных сувениров в Уфе в короткие сроки.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
