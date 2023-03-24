<script type="text/javascript">
	$(function(){
		$('select[name=magnets_6_type]').change(function(){			
			var a = $('select[name=magnets_6_type]').val();
			if ((a == 6) || (a == 7)){
				$('input[name=magnets_6_a]').slideDown();
				$('input[name=magnets_6_b]').slideDown();
			}else{
				$('input[name=magnets_6_a]').slideUp();
				$('input[name=magnets_6_b]').slideUp();			
			}
		})
	});
</script>
<script type="text/javascript">
	function calc_magnets_1() {
		var vars = [
		parseInt($('select[name=magnets_1_type]').val()),
		parseInt($('input[name=magnets_1_count]').val())
		];
		<?$get_goods = get_goods(76);?>
		<?$get_goods1 = get_goods(52);?>
		<?$get_goods2 = get_goods(51);?>
		<?$get_goods3 = get_goods(65);?>
		<?$get_goods4 = get_goods(64);?>

		var d,e;

		if (vars[1]>4999){
		
		}else if (vars[1]>2999){
			d = -9;
		}else if (vars[1]>999){
			d = -7;
		}else if (vars[1]>499){
			d = -5;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>49){
			d = 5;
		}else d = 15;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price_2']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price_2']?>');
				break;
			case 3:
				a = parseFloat('<?=$get_goods2['price_2']?>');
				break;
			case 4:
				if (vars[1]<100){
					a = 'Слишком маленький тираж!';
				}else{
					a = parseFloat('<?=$get_goods3['price_3']?>');
				}
				break;
			case 5:
				if (vars[1]<100){
					a = 'Слишком маленький тираж!';
				}else{
					a = parseFloat('<?=$get_goods4['price_2']?>');
				}
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(a)){
			$('span#result_magnets_1').parent().text(a);
			$('span#result_magnets_1_full').parent().text(a);			
		}else{
			if (isNaN(e)){
				$('span#result_magnets_1').parent().text('Обратитесь для расчета в офис');
				$('span#result_magnets_1_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_magnets_1').text(e.toFixed(1));
				$('span#result_magnets_1_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
		}
	}
	function calc_magnets_2() {
		var vars = [
			parseInt($('select[name=magnets_2_type]').val()),
			parseInt($('input[name=magnets_2_rezka]:checked').val()),
			parseFloat($('input[name=magnets_2_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=magnets_2_b]').val().replace(/,/, '.')),
			parseInt($('input[name=magnets_2_count]').val())
		];

		<?$get_goods = get_goods(248);?>
		<?$get_goods1 = get_goods(935);?>
		<?$get_goods2 = get_goods(247);?>

		var a,b,c,d,e;
		
		if (vars[4]>9999){
		
		}else if (vars[4]>4999){
			d = -0.09;
		}else if (vars[4]>2999){
			d = -0.07;
		}else if (vars[4]>999){
			d = -0.05;
		}else if (vars[4]>499){
			d = -0.03;
		}else if (vars[4]>99){
			d = 0;
		}else d = 0.05;

		switch(vars[0]){
			case 1:
				a = 0;
				break;
			case 2:
				a = parseFloat('<?=$get_goods['price_1'];?>');
				break;	
			case 3:
				a = parseFloat('<?=$get_goods1['price_1'];?>');
				break;	
			case 4:
				a = parseFloat('<?=$get_goods2['price_1'];?>');
				break;
		}

		e = 2+vars[2]*vars[3]*(parseFloat('<?=$get_service['magnitvinil_price_1'];?>') + d + 0.15 * (vars[1] - 1)) + a;
		if (vars[4]<200 && vars[1]==2){
			$('span#result_magnets_2').parent().text('Слишком маленький тираж!');
			$('span#result_magnets_2_full').parent().text('Слишком маленький тираж!');
		}else{
			if (isNaN(e)){
				$('span#result_magnets_2').parent().text('Обратитесь для расчета в офис!');
				$('span#result_magnets_2_full').parent().text('Обратитесь для расчета в офис!');
			}else{
				$('span#result_magnets_2').text(e.toFixed(1));			
				$('span#result_magnets_2_full').text((e.toFixed(1)*vars[4]).toFixed(1));			
			}
		}
	}
	function calc_magnets_3() {
		var vars = [
			parseInt($('input[name=magnets_3_count]').val())
		];

		<?$get_goods = get_goods(125);?>

		var a,b,c,d,e;
		
		if (vars[0]>1999){
		
		}else if (vars[0]>999){
			d = -7;
		}else if (vars[0]>499){
			d = -3;
		}else if (vars[0]>99){
			d = 0;
		}else if (vars[0]>29){
			d = 5;
		}else d = 15;

		e = parseFloat('<?=$get_goods['price_1'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;

		if (isNaN(e)){
			$('span#result_magnets_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_3').text(e.toFixed(1));			
			$('span#result_magnets_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_magnets_4() {
		var vars = [
			parseInt($('select[name=magnets_4_type]').val()),
			parseInt($('input[name=magnets_4_count]').val())
		];

		var a,b,c,d,e;
		
		(vars[0]==2) ? a = 0 : a = 5;

		if (vars[1]>4999){
		
		}else if (vars[1]>2999){
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
		}else d = 15;

		e = 5 + parseFloat('<?=$get_service['sign_price_1'];?>') + d + a;

		if (isNaN(e)){
			$('span#result_magnets_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_4').text(e.toFixed(1));			
			$('span#result_magnets_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_5() {
		var vars = [
			parseInt($('select[name=magnets_5_type]').val()),
			parseInt($('input[name=magnets_5_count]').val())
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
			$('span#result_magnets_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_5').text(e.toFixed(1));			
			$('span#result_magnets_5_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_6() {
		var vars = [
			parseInt($('select[name=magnets_6_type]').val()),
			parseFloat($('input[name=magnets_6_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=magnets_6_b]').val().replace(/,/, '.')),
			parseInt($('input[name=magnets_6_count]').val())
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
			$('span#result_magnets_6').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_6_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_6').text(e.toFixed(1));			
			$('span#result_magnets_6_full').text((e.toFixed(1)*vars[3]).toFixed(1));			
		}
	}
	function calc_magnets_7() {
		var vars = [
			parseInt($('select[name=magnets_7_type]').val()),
			parseInt($('input[name=magnets_7_count]').val())
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
			$('span#result_magnets_7').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_7_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_7').text(e.toFixed(1));			
			$('span#result_magnets_7_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_8() {
		var vars = [
			parseInt($('select[name=magnets_8_type]').val()),
			parseInt($('input[name=magnets_8_count]').val())
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
			$('span#result_magnets_8').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_8_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_8').text(e.toFixed(1));			
			$('span#result_magnets_8_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_8_1() {
		var vars = [
			parseInt($('select[name=magnets_8_1_type]').val()),
			parseInt($('input[name=magnets_8_1_count]').val())
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
				e = vars[1]*0 + 48;
				//e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 2:
				e = vars[1]*0 + 58;
				//e = 25 + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
		}

		if (isNaN(e)){
			$('span#result_magnets_8_1').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_8_1_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_8_1').text(e.toFixed(1));			
			$('span#result_magnets_8_1_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_9() {
		var vars = [
			parseInt($('input[name=magnets_9_count]').val())
		];

		<?$get_goods = get_goods(727);?>

		var a,b,c,d,e;
		
		if (vars[0]>499){
		
		}else if (vars[0]>299){
			d = -10;
		}else if (vars[0]>99){
			d = -5;
		}else if (vars[0]>29){
			d = 0;
		}else d = 10;
		
		e = parseFloat('<?=$get_goods['price_1'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;

		if (isNaN(e)){
			$('span#result_magnets_9').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_9_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_9').text(e.toFixed(1));			
			$('span#result_magnets_9_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_magnets_10() {
		var vars = [
			parseInt($('select[name=magnets_10_type]').val()),
			parseInt($('input[name=magnets_10_count]').val())
		];

		<?$get_goods = get_goods(598);?>

		var a,b,c,d,e;
		
		if (vars[1]>499){
		
		}else if (vars[1]>299){
			d = -10;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;
		
		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price_1'];?>') - 50 + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
			case 2:
				e = 20 + parseFloat('<?=$get_service['dodelka_price_1'];?>') + d;
				break;
		}

		if (isNaN(e)){
			$('span#result_magnets_10').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_10_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_10').text(e.toFixed(1));			
			$('span#result_magnets_10_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_magnets_11() {
		var vars = [
			parseInt($('input[name=magnets_11_count]').val())
		];

		<?$get_goods = get_goods(598);?>

		var a,b,c,d,e;
		
		if (vars[0]>499){
		
		}else if (vars[0]>299){
			d = -15;
		}else if (vars[0]>99){
			d = -10;
		}else if (vars[0]>29){
			d = 0;
		}else d = 10;
		
		e = 40 + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
			$('span#result_magnets_11').parent().text('Обратитесь для расчета в офис!');
			$('span#result_magnets_11_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_magnets_11').text(e.toFixed(1));			
			$('span#result_magnets_11_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_magnets_12() {
		var vars = [
			parseInt($('input[name=magnets_12_count]').val())
		];

		<?$get_goods = get_goods(598);?>

		var a,b,c,d,e;
		
		if (vars[0]>3999){
		
		}else if (vars[0]>2999){
			d = -90;
		}else if (vars[0]>1499){
			d = -70;
		}else if (vars[0]>1249){
			d = -60;
		}else if (vars[0]>999){
			d = -50;
		}else if (vars[0]>499){
			d = 0;
		}else d = 'Слишком маленький тираж!';
		
		e = 150 + d;

		if(isNaN(d)){
			$('span#result_magnets_12').parent().text(d);
			$('span#result_magnets_12_full').parent().text(d);			
		}else{
			if (isNaN(e)){
				$('span#result_magnets_12').parent().text('Обратитесь для расчета в офис!');
				$('span#result_magnets_12_full').parent().text('Обратитесь для расчета в офис!');
			}else{
				$('span#result_magnets_12').text(e.toFixed(1));			
				$('span#result_magnets_12_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
			}
		}
	}

	function reset_form_magnets_12() {
		$('form#magnets_12_form')[0].reset();
	}
	function reset_form_magnets_11() {
		$('form#magnets_11_form')[0].reset();
	}
	function reset_form_magnets_10() {
		$('form#magnets_10_form')[0].reset();
	}
	function reset_form_magnets_9() {
		$('form#magnets_9_form')[0].reset();
	}
	function reset_form_magnets_8_1() {
		$('form#magnets_8_1_form')[0].reset();
	}
	function reset_form_magnets_8() {
		$('form#magnets_8_form')[0].reset();
	}
	function reset_form_magnets_7() {
		$('form#magnets_7_form')[0].reset();
	}
	function reset_form_magnets_6() {
		$('form#magnets_6_form')[0].reset();
	}
	function reset_form_magnets_5() {
		$('form#magnets_5_form')[0].reset();
	}
	function reset_form_magnets_4() {
		$('form#magnets_4_form')[0].reset();
	}
	function reset_form_magnets_3() {
		$('form#magnets_3_form')[0].reset();
	}
	function reset_form_magnets_2() {
		$('form#magnets_2_form')[0].reset();
	}
	function reset_form_magnets_1() {
		$('form#magnets_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="magnets_1">
	<div class="arrow_before"></div>	       
    <h2>Магниты акриловые</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты акриловые с полиграфической вставкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" id="magnets_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_1_type">
		    			<option value="1">Прозрачные стандартные</option>
		    			<option value="2">Цветные или «марка»</option>
		    			<option value="3">Прозрачные большие</option>
		    			<option value="4">С блоком для записей</option>
		    			<option value="5">С термометром</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_magnets_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="reset_form_magnets_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Магниты акриловые прозрачные стандартные: квадрат 65х65 мм, прямоугольник 52х77 мм, овал 85х63 мм, круг диаметром 40 или 56 мм.</p>
	    <p class="serv_tip">Магниты акриловые цветные: 55х77 мм, цвета - синий, красный, зеленый, бронзовый. Магнит акриловые «Марка»: 65х65 мм, 78х52 мм, цвета - прозрачный или бронзовый.</p>
	    <p class="serv_tip">Магниты акриловые прозрачные большие: 100х100 мм, 105х70 мм, 130х60 мм.</p>
	    <p class="serv_tip">Магниты акриловые с блоком для записей: корпус 65х65 мм, блок 65х90 мм, заготовки привозятся под заказ, количеством кратным 100 шт.</p>
	    <p class="serv_tip">Магниты с термометром: 52х96 мм, заготовки привозятся под заказ, количеством кратным 100 шт.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_2">
	<div class="arrow_before"></div>	       
    <h2>Магниты виниловые</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_2_type">
		    			<option value="1">Без блока</option>
		    			<option value="2">С блоком для записи (ч/б)</option>
		    			<option value="3">С блоком для записи (цветным)</option>
		    			<option value="4">С календарным блоком</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Прямая резка</span><input type="radio" checked value="1" name="magnets_2_rezka">
		    		<span class="calc_label">Фигурная резка</span><input type="radio"  value="2" name="magnets_2_rezka">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="magnets_2_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="magnets_2_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Толщина используемого магнитного винила - 0.4 мм. При необходимости можно использовать винил толщиной 0.7 мм, наценка 20%.</p>
	    <p class="serv_tip">Минимальный заказ фигурных магнитов - от 300 шт.</p>
	    <p class="serv_tip">Размер ч/б блока для записей - 50х90 мм, цветного блока для записей - 90х90 мм, стандартного календарного блока - 74х65 мм. При печати персональных календарных блоков цена рассчитывается индивидуально.</p>
	    <p class="serv_tip">Магнит с блоком может быть дополнительно укомплектован ручкой или карандашом (+8 руб.).</p>
	    <p class="serv_tip">Упаковка готового магнита - полипропиленовый пакетик.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_3">
	<div class="arrow_before"></div>	       
    <h2>Магниты виниловые со смолой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты виниловые с полноцветной печатью и заливкой полимерной смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стандартные варианты виниловых магнитов со смолой: 70х50 мм, 70х50 мм с золотым орнаментом, круг диаметром 50 мм. Нестандартные размеры рассчитываются индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_4">
	<div class="arrow_before"></div>	       
    <h2>Магниты закатные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты закатные круглые диаметром 56/38 мм с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_4_type">
		    			<option value="1">56 мм</option>
		    			<option value="2">38 мм</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_4_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_4_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Задняя часть магнита может быть пластиковой или металлической в зависимости от наличия заготовок на складе.</p>
	    <p class="serv_tip">Другие размеры магнитов (78 или 110 мм) под заказ тиражом от 50 шт.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_5">
	<div class="arrow_before"></div>	       
    <h2>Магниты-кружечки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пластиковые объемные магниты в виде кружечки с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_5_type">
		    			<option value="1">Черные</option>
		    			<option value="2">Цветные</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_5_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_5_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Черный магнит-кружечка: 90х65х40 мм, цветной магнит-кружечка 40х40х50 мм, возможные цвета: зеленый, желтый, синий, красный.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_6">
	<div class="arrow_before"></div>	       
    <h2>Магниты деревянные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты деревянные с полноцветной печатью или гравировкой, стандартные заготовки и индивидуальные изготовления.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_6_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_6_type">
		    			<option value="1">«Фотокадр»</option>
		    			<option value="2">«Марка малая»</option>
		    			<option value="3">«Прямоугольник узорный»</option>
		    			<option value="4">«Подкова»</option>
		    			<option value="5">«Герб РБ»</option>
		    			<option value="6">Фигурный полноцветный</option>
		    			<option value="7">Фигурный с гравировкой</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="magnets_6_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="magnets_6_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_6_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_6">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_6();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_6_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_6();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Магнит «Фотокадр»: 60х90 мм, двухслойный, фанера 3 мм.</p>
	    <p class="serv_tip">Магнит «Марка малая»: 80х57 мм, двухслойный, фанера 3 мм.</p>
	    <p class="serv_tip">Магнит «Прямоугольник узорный»: 95х65 мм, двухслойный, фанера или ХДФ 3 мм.</p>
	    <p class="serv_tip">Магнит «Подкова»: 74х72 мм, двухслойный, фанера или ХДФ 3 мм.</p>
	    <p class="serv_tip">Магнит «Герб РБ»: 65х68 мм, двухслойный, фанера или ХДФ 3 мм.</p>
	    <p class="serv_tip">Магнит фигурный: фанера или ХДФ 3 мм, гравировка изображения или полноцветная наклейка, лазерная резка по контуру.</p>
	    <p class="serv_tip">Все готовые изделия имеют сзади магнитик (магнитный винил толщиной 0.4 мм) и упаковываются в полипропиленовый пакетик.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_7">
	<div class="arrow_before"></div>	       
    <h2>Магниты металлические</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_7_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_7_type">
		    			<option value="1">Сердце</option>
		    			<option value="2">Витой</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_7_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_7">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_7();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_7_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_7();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Магнит «Сердце»: 70х54х3 мм</p>
	    <p class="serv_tip">Магнит «Витой»: 60х80х2 мм</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_8">
	<div class="arrow_before"></div>	       
    <h2>Магниты керамические</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты керамические цветные (глазурированные) с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_8_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_8_type">
		    			<option value="1">С заливкой смолой</option>
		    			<option value="2">Без заливки смолой</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_8_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_8">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_8();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_8_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_8();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Виды керамических магнитов с линзой из эпоксидной смолы: «Свиток» 47х70 мм, «Подкова» 57х63 мм, «Город» диаметром 60 мм. Цвета в ассортименте.</p>
	    <p class="serv_tip">Магнит керамический без линзы из эпоксидной смолы: овал 80х60 мм.</p>
	    <p class="serv_tip">Наличие видов и цветов уточняйте в офисе.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_8_1">
	<div class="arrow_before"></div>	       
    <h2>Магнит-тарелочка</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магнит-тарелочка керамический круглый с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_8_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Диаметр:</span>
		    		<select name="magnets_8_1_type">
		    			<option value="1">55 мм</option>
		    			<option value="2">68 мм</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_8_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_8_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_8_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_8_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_8_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальный тираж - 50 шт.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_9">
	<div class="arrow_before"></div>	       
    <h2>Магнит пластиковый «Герб»</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магнит на холодильник пластиковый «Герб» с полноцветным изображением, залитым эпоксидной смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_9_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_9_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_9">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_9();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_9_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_9();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер магнита 45х35 мм, цвет корпуса красный.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_10">
	<div class="arrow_before"></div>	       
    <h2>Магниты-открывашки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты на холодильник с открывалкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_10_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="magnets_10_type">
		    			<option value="1">Пробка</option>
		    			<option value="2">Овал</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_10_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_10">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_10();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_10_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_10();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Магнит-пробка 82х82х15 мм, цвета: черный, синий.</p>
	    <p class="serv_tip">Магнит овальный 90х60 мм.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_11">
	<div class="arrow_before"></div>	       
    <h2>Магниты-фоторамки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магнит-фоторамка из магнитного винила с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_11_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_11_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_11">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_11();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_11_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_11();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер фоторамки 15.5х20 см, размер места под фото 7.5х11 см, винил 0.7 мм.</p>
	    <p class="serv_tip">Возможно изготовление под заказ других размеров, рассчитывается индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="magnets_12">
	<div class="arrow_before"></div>	       
    <h2>Магниты объемные из полистоуна</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Магниты объемные из полистоуна с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="magnets_12_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="magnets_12_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_magnets_12">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_magnets_12();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_magnets_12_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_magnets_12();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальный тираж 500 шт.</p>
	    <p class="serv_tip">Максимальный размер 75х75 мм, большие размеры рассчитываются индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
