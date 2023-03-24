<script type="text/javascript">
	function calc_present_1() {
		var vars = [
		parseInt($('select[name=present_1_type]').val())
		];
		<?$get_goods = get_goods(72);?>
		<?$get_goods1 = get_goods(1049);?>
		<?$get_goods2 = get_goods(1051);?>
		<?$get_goods3 = get_goods(1050);?>
		<?$get_goods4 = get_goods(380);?>
		<?$get_goods5 = get_goods(1047);?>

		var d,e;

		switch(vars[0]){
			case 1:	
				e = parseFloat('<?=$get_goods['price']?>') + 0.85 * 2 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 350);
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price']?>') + 0.85 * 2 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 350);
				break;
			case 3:
				e = parseFloat('<?=$get_goods2['price']?>') + 1.2 * 2 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 350);
				break;
			case 4:
				e = parseFloat('<?=$get_goods3['price']?>') + 1.5 * 2 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 350);
				break;
			case 5:
				e = parseFloat('<?=$get_goods4['price']?>') + 0.8 * 1.8 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 150) + parseFloat('<?=$get_service['wideprint_price_2']?>') * 4;
				break;
			case 6:
				e = parseFloat('<?=$get_goods5['price']?>') + 3.75 * 2.3 * (parseFloat('<?=$get_service['wideprint_price_3']?>') + 350);
				break;
		}

		if (isNaN(e)){
			$('span#result_present_1').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_present_1').text(e.toFixed(1));
		}
	}
	function calc_present_2() {
		var vars = [
			parseInt($('select[name=present_2_type]').val())
		];

		<?$get_goods = get_goods(376);?>
		<?$get_goods1 = get_goods(377);?>

		var a,b,c,d,e;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + 2*2*(parseFloat('<?=$get_service['wideprint_price_3'];?>')+ 150 +(parseFloat('<?=$get_service['wideprint_price_2'];?>')*2*4));
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + 2*3*(parseFloat('<?=$get_service['wideprint_price_3'];?>')+ 150 +(parseFloat('<?=$get_service['wideprint_price_2'];?>')*2*5));
				break;
		}

		if (isNaN(e)){
			$('span#result_present_2').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_2').text(e.toFixed(1));						
		}
	}
	function calc_present_3() {
		var vars = [
			parseInt($('select[name=present_3_type]').val())
		];

		<?$get_goods = get_goods(382);?>
		<?$get_goods1 = get_goods(1048);?>

		var a,b,c,d,e;
		
		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + 1500;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + 1000;
				break;
		}

		if (isNaN(e)){
			$('span#result_present_3').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_3').text(e.toFixed(1));						
		}
	}
	function calc_present_4() {
		var vars = [
			parseInt($('select[name=present_4_type]').val())
		];

		var a,b,c,d,e;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_service['present_price_1'];?>');
				break;
			case 2:
				e = parseFloat('<?=$get_service['present_price_1'];?>')*2;
				break;
		}

		if (isNaN(e)){
			$('span#result_present_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_present_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_4').text(e.toFixed(1));			
			$('span#result_present_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_present_5() {
		var vars = [
			parseInt($('select[name=present_5_type]').val()),
			parseInt($('input[name=present_5_count]').val())
		];

		<?$get_goods = get_goods(1160);?>

		var a,b,c,d,e;
		
		if (vars[1]>999){
		
		}else if (vars[1]>499){
			d = -10;
		}else if (vars[1]>299){
			d = -8;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>49){
			d = 0;
		}else d = 5;

		if (vars[0]==1){
			e = 35 + d;
		}else{
			e = parseFloat('<?=$get_goods['price_2'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
		}



		if (isNaN(e)){
			$('span#result_present_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_present_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_5').text(e.toFixed(1));			
			$('span#result_present_5_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_present_6() {
		var vars = [
			parseInt($('select[name=present_6_type]').val()),
			parseFloat($('input[name=present_6_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=present_6_b]').val().replace(/,/, '.')),
			parseInt($('input[name=present_6_count]').val())
		];

		<?$get_goods = get_goods(59);?>
		<?$get_goods1 = get_goods(60);?>
		<?$get_goods2 = get_goods(98);?>
		<?$get_goods3 = get_goods(151);?>
		<?$get_goods4 = get_goods(100);?>

		var a,b,c,d,e;
		
		if (vars[3]>2999){
		
		}else if (vars[3]>999){
			d = -14;
		}else if (vars[3]>499){
			d = -12;
		}else if (vars[3]>299){
			d = -10;
		}else if (vars[3]>99){
			d = -5;
		}else if (vars[3]>49){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 3:
				e = parseFloat('<?=$get_goods2['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 4:
				e = parseFloat('<?=$get_goods3['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d + 8;
				break;
			case 5:
				e = parseFloat('<?=$get_goods4['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d + 8;
				break;
			case 6:
				e = vars[1]*vars[2]*(parseFloat('<?=$get_service['badge_price_1'];?>') - 2.3) + d;
				break;
			case 7:
				e = vars[1]*vars[2]*(parseFloat('<?=$get_service['badge_price_1'];?>') - 2) + d;
				break;
		}



		if (isNaN(e)){
			$('span#result_present_6').parent().text('Обратитесь для расчета в офис!');
			$('span#result_present_6_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_6').text(e.toFixed(1));			
			$('span#result_present_6_full').text((e.toFixed(1)*vars[3]).toFixed(1));			
		}
	}
	function calc_present_7() {
		var vars = [
			parseInt($('select[name=present_7_type]').val()),
			parseInt($('input[name=present_7_count]').val())
		];

		<?$get_goods = get_goods(343);?>
		<?$get_goods1 = get_goods(937);?>

		var a,b,c,d,e;
		
		if (vars[1]>999){
		
		}else if (vars[1]>499){
			d = -15;
		}else if (vars[1]>299){
			d = -10;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price_2'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
		}

		if (isNaN(e)){
			$('span#result_present_7').parent().text('Обратитесь для расчета в офис!');
			$('span#result_present_7_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_7').text(e.toFixed(1));			
			$('span#result_present_7_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_present_8() {
		var vars = [
			parseInt($('select[name=present_8_type]').val()),
			parseInt($('input[name=present_8_count]').val())
		];

		<?$get_goods = get_goods(954);?>

		var a,b,c,d,e;
		
		if (vars[1]>999){
		
		}else if (vars[1]>499){
			d = -15;
		}else if (vars[1]>299){
			d = -10;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 2:
				e = 25 + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
		}

		if (isNaN(e)){
			$('span#result_present_8').parent().text('Обратитесь для расчета в офис!');
			$('span#result_present_8_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_present_8').text(e.toFixed(1));			
			$('span#result_present_8_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}

	function reset_form_present_8() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_7() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_6() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_5() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_4() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_3() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_2() {
		$('form#present_2_form')[0].reset();
	}
	function reset_form_present_1() {
		$('form#present_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="present_1">
	<div class="arrow_before"></div>	       
    <h2>Мобильные баннерные стенды</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Баннерные стенды — это доступный и экономичный вариант для решения рекламных, презентационных и иных задач. Общая особенность таких конструкций — легкий и одновременно с этим, прочный каркас, выполняющий роль опоры, а также полотно, фиксируемое с помощью специальных креплений.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" id="present_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="present_1_type" style="width: 250px;">
		    			<option value="1">Roll-up (85х200 см, стандарт)</option>
		    			<option value="2">Roll-up (85х200 см, премиум)</option>
		    			<option value="3">Roll-up (120х200 см)</option>
		    			<option value="4">Roll-up (150х200 см)</option>
		    			<option value="5">X-стенд</option>
		    			<option value="6">Pop-up стенд</option>
		    		</select>
		    	</div>
		    	<div class="calc_row" style="margin-top: 20px;">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_present_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_present_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_present_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Roll-up (ролл-ап) - роллерный баннерный стенд из аллюминия. Рекламное поле шириной 85, 120 или 150 см хранится в основании и растягивается по принципу «экран-вверх». Матерчатый чехол в комплекте. Время сборки 1-2 мин.</p>
	    <p class="serv_tip">Х-стенд («паук») - баннерный стенд на углепластиковом каркасе. Рекламное поле с четырьмя люверсами по углам растягивается на Х-образный каркас размером 80х180 см. Время сборки 1-2 мин.</p>
	    <p class="serv_tip">Pop-up (поп-ап) - стенд зонтичного типа с аллюминиевым каркасом и рекламным полем 230х300 см. Сумка-тележка для транспортировки приобретается отдельно по желанию (5000 руб). Время монтажа 10-20 мин.</p>
	    <p class="serv_tip">Печать рекламного поля - интерьерная, 1440 dpi. Возможно снижение стоимости готового изделия за счет снижения качества печати рекламного поля.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 300-1000 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="present_2">
	<div class="arrow_before"></div>	       
    <h2>Пресс-воллы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пресс-волл стенд или brand wall (бренд волл), это сборная конструкция в виде баннера с полноцветной печатью на каркасе из хромированных труб.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="present_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Размер:</span>
		    		<select name="present_2_type">
		    			<option value="1">2х2 м</option>
		    			<option value="2">2х3 м</option>
		    		</select>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_present_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_present_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_present_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Время сборки 10-20 мин.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 300-1000 руб. в зависимости от сложности.</p>
	    <p class="serv_tip">Печать рекламного поля - интерьерная, 1440 dpi. Возможно снижение стоимости готового изделия за счет снижения качества печати рекламного поля.</p>
	    <p class="serv_tip">Нестандартные размеры пресс-воллов рассчитываются индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="present_3">
	<div class="arrow_before"></div>	       
    <h2>Промо-стойки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Промо-стойка - мобильное рекламное оборудование с полноцветным рекламным полем. Данные стойки отличаются легкостью сборки и установки.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="present_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="present_3_type">
		    			<option value="1">Стандарт</option>
		    			<option value="2">Ресепшн</option>
		    		</select>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_present_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_present_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_present_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стандартная промо-стойка - стол 81.5х80.5х38 см и верхний фриз (рекламное поле) из пластика 80.5х30 см с полноцветным изображением, тумба стойки закрывается рекламным полем (178.5х80.5 см) с полноцветным изображением, имеет одну внутреннюю полку. Матерчатый чехол для перевозки в комплекте. Время сборки 5-10 мин.</p>
	    <p class="serv_tip">Мобильный ресепшн Pop-up состоит из каркаса зонтичного типа, набора ребер жесткости, лаковой черной столешницы и рекламного поля с полноцветным изображением с магнитной лентой, имеются две полки внутри. Габариты 128х100 см. Матерчатая сумка для транспортировки в комплекте. Время сборки 10-15 мин.</p>
	    <p class="serv_tip">Возможно индивидуальное изготовление промо-стоек от 5500 руб. Подробности уточняйте в офисе.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 300-1000 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="present_4">
	<div class="arrow_before"></div>	       
    <h2>Штендеры</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Выносная складная конструкция в форме арки с информацией на двух рекламных поверхностях.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="present_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Размер:</span>
		    		<select name="present_4_type">
		    			<option value="1">1.2х0.64 м</option>
		    			<option value="2">2х0.8 м</option>
		    		</select>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_present_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_present_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_present_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 300-1000 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="present_5">
	<div class="arrow_before"></div>	       
    <h2>Настольное презентационное оборудование</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Варианты стандартного настольного презентационного POS-материала (подставки под меню, визитницы и прочее) можно выбрать <a href="<?=PATH.'category/76';?>">здесь</a>. Возможно изготовление под заказ любых нестандартных изделий.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="present_6">
	<div class="arrow_before"></div>	       
    <h2>Настенное презентационное оборудование</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Стенды и таблички можно рассчитать <a href="<?=PATH.'service/16';?>">здесь</a>. Прочие настенные POS-материалы можно выбрать <a href="<?=PATH.'category/57';?>">здесь</a>.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="present_8">
	<a href="<?=PATH.'service/11';?>">
		<div class="arrow_before"></div>	       
	    <h2>Бейджи</h2>
	</a>
</div>
<hr>