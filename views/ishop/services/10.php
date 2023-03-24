<?#print_arr($get_service);?>
<script type="text/javascript">
	function calc_flags_1() {
		var vars = [
			parseInt($('input[name=flags_1_sides]:checked').val()),
			parseInt($('input[name=flags_1_lams]:checked').val()),
			parseInt($('select[name=flags_1_size]').val()),
			parseInt($('input[name=flags_1_count]').val())
		];

		var a,b,c,d,e;
		
		if (vars[3]>2999){
			
		}else if (vars[3]>999){
			d = -2;
		}else if (vars[3]>499){
			d = -1;
		}else if (vars[3]>99){
			d = 0;
		}else d = 3;

		switch(vars[2]){
			case 1:
				b = 6;
				break;
			case 2:
				b = 4;
				break;
		}

		e = (parseInt('<?=$get_service["price"];?>') * vars[0] + 7 + 24 * (vars[1] - 1))/b + 4 + d;
		
		console.log(e + ' ' + b + ' ' + d + ' ' + parseInt('<?=$get_service["price"];?>'));

		if (isNaN(e)){
			$('span#result_flags_1').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_1_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_1').text(e.toFixed(1));			
			$('span#result_flags_1_full').text((e.toFixed(1)*vars[3]).toFixed(1));			
		}
	}
	function calc_flags_2() {
		var vars = [
			parseInt($('input[name=flags_2_count]').val())
		];

		var a,b,c,d,e;
		
		if (vars[0]>1999){
			
		}else if (vars[0]>999){
			d = -16;
		}else if (vars[0]>499){
			d = -14;
		}else if (vars[0]>299){
			d = -11;
		}else if (vars[0]>99){
			d = -9;
		}else if (vars[0]>49){
			d = -4;
		}else d = 1;

		<?$get_goods = get_goods(372);?>

		e = parseFloat('<?=$get_goods['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>')/4 + 4 + d;

		if (isNaN(e)){
			$('span#result_flags_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_2').text(e.toFixed(1));			
			$('span#result_flags_2_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_flags_3() {
		var vars = [
			parseInt($('select[name=flags_3_type]').val()),
			parseInt($('select[name=flags_3_fstock]').val()),
			parseFloat($('input[name=flags_3_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=flags_3_b]').val().replace(/,/, '.')),
			parseInt($('input[name=flags_3_count]').val())
		];

		var a,b,c,d,e;

		<?$get_goods = get_goods(251);?>
		<?$get_goods1 = get_goods(1101);?>
		<?$get_goods2 = get_goods(801);?>
		<?$get_goods3 = get_goods(802);?>

		if (vars[4]>1999){
		
		}else if (vars[4]>999){
			d = -15;
		}else if (vars[4]>499){
			d = -12;
		}else if (vars[4]>299){
			d = -10;
		}else if (vars[4]>99){
			d = 0;
		}else if (vars[4]>29){
			d = 10;
		}else d = 20;

		switch(vars[0]){
			case 1:
				b = 1;
				break;
			case 2:
				b = 1.3;
				break;
		}

		switch(vars[1]){
			case 1:
				e = (vars[2]*vars[3]*parseFloat('<?=$get_service["flags_price_1"];?>')*b)+ 15 + d + parseFloat('<?=$get_goods['price_3'];?>');
				break;
			case 2:
				e = (vars[2]*vars[3]*parseFloat('<?=$get_service["flags_price_1"];?>')*b)+ 15 + d + parseFloat('<?=$get_goods1['price_1'];?>');
				break;
			case 3:
				e = ((vars[2]*vars[3]*parseFloat('<?=$get_service["flags_price_1"];?>')*b)+ 15 + d)*2 + parseFloat('<?=$get_goods2['price_1'];?>');
				break;
			case 4:
				e = ((vars[2]*vars[3]*parseFloat('<?=$get_service["flags_price_1"];?>')*b)+ 15 + d)*3 + parseFloat('<?=$get_goods3['price_1'];?>');
				break;
		}		
		
		console.log(e + ' ' + b + ' ' + d + ' ' + parseFloat('<?=$get_service["flags_price_1"];?>') + ' ' + d + parseFloat('<?=$get_goods3['price_1'];?>'));

		if (isNaN(e)){
			$('span#result_flags_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_3').text(e.toFixed(1));			
			$('span#result_flags_3_full').text((e.toFixed(1)*vars[4]).toFixed(1));			
		}
	}	
	function calc_flags_4() {
		var vars = [
			parseInt($('select[name=flags_4_type]').val()),
			parseFloat($('input[name=flags_4_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=flags_4_b]').val().replace(/,/, '.'))
		];

		var a,b,c,d,e;

		switch(vars[0]){
			case 1:
				b = 1;
				break;
			case 2:
				b = 1.3;
				break;
			case 3:
				b = 2.3;
				break;
		}	
		
		e = vars[1]*vars[2]*parseFloat('<?=$get_service["flags_price_1"];?>')*10000*b;

		//console.log(e + ' ' + b + ' ' + d + ' ' + parseFloat('<?=$get_service["flags_price_1"];?>') + ' ' + d + parseFloat('<?=$get_goods3['price_1'];?>'));

		if (isNaN(e)){
			$('span#result_flags_4').parent().text('Обратитесь для расчета в офис!');			
		}else{
			$('span#result_flags_4').text(e.toFixed(1));		
		}
	}
	function calc_flags_5() {
		var vars = [
			parseInt($('select[name=flags_5_size]').val()),
			parseInt($('input[name=flags_5_sides]:checked').val()),
			parseInt($('input[name=flags_5_count]').val())
		];
		<?$get_goods = get_goods(324);?>
		<?$get_goods1 = get_goods(1070);?>
		var a,b,c,d,e;

		if (vars[2]>999){
		
		}else if (vars[2]>499){
			d = -50;
		}else if (vars[2]>299){
			d = -40;
		}else if (vars[2]>99){
			d = -30;
		}else if (vars[2]>49){
			d = -15;
		}else if (vars[2]>9){
			d = 0;
		}else d = 20;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_service["promo_price_3"];?>')*vars[1] + d + parseFloat('<?=$get_goods['price_1'];?>');
				break;
			case 2:
				e = parseFloat('<?=$get_service["promo_price_3"];?>')*vars[1] + d + parseFloat('<?=$get_goods1['price_1'];?>');
				break;
		}	
		
		//e = vars[1]*vars[2]*parseFloat('<?=$get_service["flags_price_1"];?>')*10000*b;

		//console.log(e + ' ' + b + ' ' + d + ' ' + parseFloat('<?=$get_service["flags_price_1"];?>') + ' ' + d + parseFloat('<?=$get_goods3['price_1'];?>'));

		if (isNaN(e)){
			$('span#result_flags_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_5').text(e.toFixed(1));			
			$('span#result_flags_5_full').text((e.toFixed(1)*vars[2]).toFixed(1));			
		}
	}
	function calc_flags_6() {
		var vars = [
			parseInt($('select[name=flags_6_size]').val()),
			parseInt($('input[name=flags_6_count]').val())
		];

		var a,b='',c,d,e;

		if (vars[0]==1){
			if (vars[1]>499){
			
			}else if (vars[1]>199){
				d = -30;
			}else if (vars[1]>49){
				d = 0;
			}else if (vars[1]>9){
				d = 50;
			}else b = 'Слишком маленький тираж!';

			e = 100 + d;		
		}else{
			if (vars[1]>499){
				
			}else if (vars[1]>199){
				d = -35;
			}else if (vars[1]>49){
				d = 0;
			}else if (vars[1]>9){
				d = 30;
			}else b = 'Слишком маленький тираж!';

			e = 135 + d;
		}
		if (b!=''){
			$('span#result_flags_6').parent().text(b);
			$('span#result_flags_6_full').parent().text(b);
		}else{
			if (isNaN(e)){
				$('span#result_flags_6').parent().text('Обратитесь для расчета в офис!');
				$('span#result_flags_6_full').parent().text('Обратитесь для расчета в офис!');
			}else{
				$('span#result_flags_6').text(e.toFixed(1));			
				$('span#result_flags_6_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
			}			
		}
	}
	function calc_flags_7() {
		var vars = [
			parseInt($('input[name=flags_7_count]').val())
		];

		var a,b,c,d,e;

		
		if (vars[0]>199){
		
		}else if (vars[0]>149){
			d = -60;
		}else if (vars[0]>99){
			d = -40;
		}else if (vars[0]>49){
			d = 0;
		}else if (vars[0]>9){
			d = 50;
		}else d = 100;

		e = 300 + d;
		
		if (isNaN(e)){
			$('span#result_flags_7').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_7_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_7').text(e.toFixed(1));			
			$('span#result_flags_7_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}			
		
	}

	function reset_form_flags_7() {
		$('form#flags_7_form')[0].reset();
	}
	function reset_form_flags_6() {
		$('form#flags_6_form')[0].reset();
	}
	function reset_form_flags_5() {
		$('form#flags_5_form')[0].reset();
	}
	function reset_form_flags_4() {
		$('form#flags_4_form')[0].reset();
	}
	function reset_form_flags_3() {
		$('form#flags_3_form')[0].reset();
	}
	function reset_form_flags_2() {
		$('form#flags_2_form')[0].reset();
	}
	function reset_form_flags_1() {
		$('form#flags_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="flags_1">
	<div class="arrow_before"></div>	       
    <h2>Флажки бумажные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Флажки бумажные полноцветные на палочке.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонняя</span><input type="radio" checked value="1" name="flags_1_sides">
		    		<span class="calc_label">Двусторонняя</span><input type="radio" value="2" name="flags_1_sides">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Без ламинации</span><input type="radio" checked value="1" name="flags_1_lams">
		    		<span class="calc_label">С ламинацией</span><input type="radio"  value="2" name="flags_1_lams">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Размер: </span>
		    		<select name="flags_1_size">
		    			<option value="1">20х10 см</option>
		    			<option value="2">20х15 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flags_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_2">
	<div class="arrow_before"></div>	       
    <h2>Флажки тканевые на палочке</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Флажки текстильные 17.5х12см из полиэстера с полноцветной печатью на палочке.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flags_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Печать сублимационная, обрезка термоножом, прошивка под флагшток.</p>
	    <p class="serv_tip">Возможна комплектация присосками.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_3">
	<div class="arrow_before"></div>	       
    <h2>Флажки тканевые с подставкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Флажки фирменные с полноцветной печатью, с настольной подставкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_3_form">	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Материал: </span>
		    		<select name="flags_3_type">
		    			<option value="1">Полиэстер</option>
		    			<option value="2">Атлас</option>
		    		</select>
		    	</div>	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Флагшток: </span>
		    		<select name="flags_3_fstock">
		    			<option value="1">Палочка белая, 30 см</option>
		    			<option value="2">Настольный однорожковый</option>
		    			<option value="3">Настольный двухрожковый</option>
		    			<option value="4">Настольный трехрожковый</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="flags_3_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="flags_3_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flags_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Печать сублимационная, обрезка термоножом, прошивка под флагшток.</p>
	    <p class="serv_tip">Возможна комплектация присосками.</p>
	    <p class="serv_tip">Настольные подставки могут быть белые или черные, длина флагштока 32 см, наличие подставок уточняйте в офисе.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_4">
	<div class="arrow_before"></div>	       
    <h2>Флаги фирменные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Флаги фирменные с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Материал: </span>
		    		<select name="flags_4_type">
		    			<option value="1">Полиэстер</option>
		    			<option value="2">Атлас</option>
		    			<option value="3">Блэкаут</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в метрах: </span><input type="text" name="flags_4_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в метрах: </span><input type="text" name="flags_4_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_flags_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Печать методом сублимации, обрезка края термоножом или прошивка по периметру (в зависимости от ткани), карман или завязки для флагштока.</p>
	    <p class="serv_tip">Максимальная ширина печати - 1,5 м. Флаги большего размера изготавливаются со швом.</p>
	    <p class="serv_tip">Блэкаут - непрозрачная ткань для двухсторонней печати.</p>
	    <p class="serv_tip">Дополнительные услуги:
	    	<ul>
	    		<li>Люверсы - 20 руб./шт.;</li>
	    		<li>Карабины - 25 руб./шт.;</li>
	    		<li>Усиленная прошивка - 40 руб./п.м.;</li>
	    		<li>Вшивка шнура по периметру - 50 руб./п.м.</li>
	    	</ul>
	    </p>
	    <p class="serv_tip">Флагштоки для больших флагов не предоставляются, при необходимости приобретаются под заказ.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_5">
	<div class="arrow_before"></div>	       
    <h2>Вымпелы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Вымпелы атласные с полноцветной печатью, с жесткой вставкой. Окантовка белая или триколор, внизу переходит в кисточку.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Размер: </span>
		    		<select name="flags_5_size">
		    			<option value="1">22х15 см</option>
		    			<option value="2">15х10 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонний</span><input type="radio" checked value="1" name="flags_5_sides">
		    		<span class="calc_label">Двухсторонний</span><input type="radio"  value="2" name="flags_5_sides">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flags_5_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_5_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Цвет окантовки уточняйте в офисе.</p>	    
	    <p class="serv_tip">Возможна комплектация вымпела подставкой (держателем). Цена и описание <a href="<?=PATH.'product/1155';?>">здесь</a>.</p>	    
	    <p class="serv_tip">Нестандартные вымпелы рассчитываются индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_6">
	<div class="arrow_before"></div>	       
    <h2>Флажная лента (гирлянда из флажков)</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_6_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Размер флажков: </span>
		    		<select name="flags_6_size">
		    			<option value="1">15х20 см</option>
		    			<option value="2">20х30 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж (п.м.): </span><input type="text" name="flags_6_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_6">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_6();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_6_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_6();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Флажки изготавливаются из однотонной ткани (полиэстер), обрезаются термоножом и пришиваются к шнуру.</p>	    
	    <p class="serv_tip">Минимальный заказ - 10 п.м.</p>	    
	    <p class="serv_tip">Лента с печатью на флажках рассчитывается индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_7">
	<div class="arrow_before"></div>	       
    <h2>Ленты нагрудные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Ленты нагрудные (лента выпускника) 15х200 см, с надписью или изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_7_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flags_7_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_flags_7">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flags_7();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flags_7_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flags_7();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Ленты нагрудные изготавливаются из полиэстера или атласа, край обрезается термоножом или подгибается.</p>	    
	    <p class="serv_tip">Метод нанесения изображения выбирается индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="flags_8">
	<div class="arrow_before"></div>	       
    <h2>Знамёна, штандарты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Знамёна, штандарты и прочие нестандартные изделия рассчитываются индивидуально.</p>
	    	</div>
	    </div>
	</div>
</div>
<hr>