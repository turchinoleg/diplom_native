<script type="text/javascript">
	function calc_signs_1() {
		var vars = [
			parseInt($('select[name=signs_1_type]').val()),
			parseInt($('input[name=signs_1_count]').val())
		];

		var a,b,c,d,e;
		//console.log(vars+"\r\n");
		if (vars[1]>9999){

		}else if(vars[1]>4999){
			d = -9;
		}else if (vars[1]>999){
			d = -7;
		}else if (vars[1]>499){
			d = -5;
		}else if (vars[1]>299){
			d = -3;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>49){
			d = 5;
		}else d = 25;


		switch(vars[0]){
			case 1:
			case 2:
				e = parseInt('<?=$get_service["sign_price_1"]?>') + d;				
				break;
			case 3:
				e = parseInt('<?=$get_service["sign_price_1"]?>') + d + 5;
				break;
			case 4:
				e = ''; //здесь поменять рассчет, когда будут ценники из офиса
				break;
		}
		//console.log(e + ' ' + d + ' ' + parseInt('<?=$get_service["textileprint_price_1"]?>'));
		
		if (isNaN(e)){
			$('span#result_signs_1').parent().text('Обратитесь для расчета в офис!');
			$('span#result_signs_1_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_signs_1').text(e.toFixed(2));			
			$('span#result_signs_1_full').text((e.toFixed(2)*vars[1]).toFixed(2));			
		}
	}
	function calc_signs_2() {
		var vars = [
			parseInt($('select[name=signs_2_type]').val()),
			parseInt($('input[name=signs_2_count]').val())
		];

		var a,b,c,d,e;
		
		if (vars[1]>1999){
			
		}else if (vars[1]>999){
			d = -20;
		}else if (vars[1]>499){
			d = -15;
		}else if (vars[1]>299){
			d = -5;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>49){
			d = 10;
		}else d = 25;

		switch(vars[0]){
			case 1:
				e = parseInt('<?=$get_service["sign_price_2"]?>') + d;
				break;
			case 2:
				e = parseInt('<?=$get_service["sign_price_2"]?>') + d + 10;
				break;	
			case 3:
				e = parseInt('<?=$get_service["sign_price_2"]?>') + d + 25;
				break;			
		}

		if (isNaN(e)){
			$('span#result_signs_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_signs_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_signs_2').text(e.toFixed(1));			
			$('span#result_signs_2_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}

	function reset_form_signs_2() {
		$('form#signs_2_form')[0].reset();
	}
	function reset_form_signs_1() {
		$('form#signs_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="signs_1">
	<div class="arrow_before"></div>	       
    <h2>Значки закатные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Значки закатные круглые с булавкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="signs_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Диаметр:</span>
		    		<select name="signs_1_type">
		    			<option value="1">25 мм</option>
		    			<option value="2">38 мм</option>
		    			<option value="3">56 мм</option>
		    			<option value="4">78 мм</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="signs_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_signs_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_signs_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_signs_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_signs_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Задняя часть значка может быть пластиковой или металлической в зависимости от наличия заготовок на складе.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="signs_2">
	<div class="arrow_before"></div>	       
    <h2>Значки заливные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Значки металлические (латунь) с полноцветным изображением, залитым эпоксидным смолой, застежка цанга (бабочка) или магнит.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="signs_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="signs_2_type">
		    			<option value="1">Размер до 35 мм, цанга</option>
		    			<option value="2">Диаметр 35 мм, цанга</option>
		    			<option value="3">Диаметр 17/21/25 мм, магнит</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="signs_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_signs_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_signs_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_signs_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_signs_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер и форма значка на цанге выбираются из стандартных. Возможные варианты: 
	    	<ul>
	    		<li>Квадрат: 13х13 мм, 21х21 мм, 25х25 мм;</li>
	    		<li>Прямоугольник: 12х17 мм, 17х20 мм, 26х11 мм, 13х33 мм;</li>
	    		<li>Круг: 13 мм, 15 мм, 17 мм, 21 мм, 25 мм;</li>
	    		<li>Овал: 12х21 мм, 15х28 мм, 20х27 мм;</li>
	    		<li>Фигурные: щит 14х18 мм, герб 21х29 мм, флаг 27х20 мм</li>
	    	</ul>
	    </p>
	    <p class="serv_tip">Наличие выбранных вариантов уточняйте в офисе, круг диаметром 25 мм всегда есть в наличии.</p>
	    <p class="serv_tip">Возможно индивидуальное изготовление нестандартной подложки для значка при тиражах от 1000 шт.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="signs_3">
	<div class="arrow_before"></div>	       
    <h2>Значки штампованные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Изготовление различных штампованных значков под заказ. Минимальный тираж - 500 шт., минимальный срок изготовления - 45 дн., минимальная цена - 250 руб.</p>
	        	<p class="serv_desc">Цена рассчитывается индивидуально.</p>
	    	</div>
	    </div>
	    <p class="serv_tip">Металл - аллюминий, медь, томпак.</p>
	    <p class="serv_tip">Толщина металла - 2-4 мм.</p>
	    <p class="serv_tip">3D-объем.</p>
	    <p class="serv_tip">Эмаль - до 6 цветов.</p>
	    <p class="serv_tip">Застежка - цанговый зажим.</p>
	</div>
</div>
<hr>
