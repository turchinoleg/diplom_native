<script type="text/javascript">
	function calc_clocks_1() {
		var vars = [
		parseInt($('input[name=clocks_1_count]').val())
		];
		
		<?$get_goods = get_goods(163);?>

		var d,e;

		if (vars[0]>299){
		
		}else if (vars[0]>199){
			d = -80;
		}else if (vars[0]>99){
			d = -75;
		}else if (vars[0]>49){
			d = -60;
		}else if (vars[0]>9){
			d = -40;
		}else d = 0;

		e = d + parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>');

		console.log(parseFloat('<?=$get_service['dodelka_price_2'];?>'));

		if (isNaN(e)){
			$('span#result_clocks_1').parent().text('Обратитесь для расчета в офис');
			$('span#result_clocks_1_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_clocks_1').text(e.toFixed(1));
			$('span#result_clocks_1_full').text((e.toFixed(1)*vars[0]).toFixed(1));
		}	
	}
	function calc_clocks_2() {
		var vars = [
			parseInt($('input[name=clocks_2_count]').val())
		];

		<?$get_goods = get_goods(167);?>

		var a,b,c,d,e;
		
		if (vars[0]>199){
		
		}else if (vars[0]>99){
			d = -30;
		}else if (vars[0]>49){
			d = -20;
		}else if (vars[0]>9){
			d = -10;
		}else d = 0;

		e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>') + d;

		if (isNaN(e)){
			$('span#result_clocks_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_clocks_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_clocks_2').text(e.toFixed(1));			
			$('span#result_clocks_2_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_clocks_3() {
		var vars = [
			parseInt($('input[name=clocks_3_count]').val()),
			parseInt($('select[name=clocks_3_type]').val())
		];

		<?$get_goods = get_goods(1164);?>
		<?$get_goods1 = get_goods(1165);?>

		var a,b,c,d,e;
		
		if (vars[0]>49){
			
		}else if (vars[0]>9){
			d = -50;
		}else d = 0;

		switch(vars[1]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['promo_price_3'];?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + parseFloat('<?=$get_service['promo_price_3'];?>') + d;
				break;
		}

		if (isNaN(e)){
			$('span#result_clocks_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_clocks_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_clocks_3').text(e.toFixed(1));			
			$('span#result_clocks_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_clocks_4() {
		var vars = [
			parseInt($('select[name=clocks_4_type]').val()),
			parseInt($('input[name=clocks_4_count]').val())
		];

		<?$get_goods = get_goods(170);?>
		<?$get_goods1 = get_goods(172);?>
		<?$get_goods2 = get_goods(733);?>

		var a,b,c,d,e;
		

		if (vars[1]>299){
		
		}else if (vars[1]>199){
			d = -50;
		}else if (vars[1]>99){
			d = -40;
		}else if (vars[1]>49){
			d = -30;
		}else if (vars[1]>9){
			d = -20;
		}else d = 0;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>') + d;
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>') + d;
				break;
			case 3:
				e = parseFloat('<?=$get_goods2['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>') + d;
				break;
		}
		
		if (isNaN(e)){
			$('span#result_clocks_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_clocks_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_clocks_4').text(e.toFixed(1));			
			$('span#result_clocks_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_clocks_5() {
		var vars = [
			parseInt($('input[name=clocks_5_count]').val())
		];

		<?$get_goods = get_goods(663);?>

		var a,b,c,d,e;
		
		if (vars[0]>199){
		
		}else if (vars[0]>99){
			d = -30;
		}else if (vars[0]>49){
			d = -20;
		}else if (vars[0]>9){
			d = -10;
		}else d = 0;

		e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_2']?>') + d;


		if (isNaN(e)){
			$('span#result_clocks_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_clocks_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_clocks_5').text(e.toFixed(1));			
			$('span#result_clocks_5_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}

	function reset_form_clocks_5() {
		$('form#clocks_5_form')[0].reset();
	}
	function reset_form_clocks_4() {
		$('form#clocks_4_form')[0].reset();
	}
	function reset_form_clocks_3() {
		$('form#clocks_3_form')[0].reset();
	}
	function reset_form_clocks_2() {
		$('form#clocks_2_form')[0].reset();
	}
	function reset_form_clocks_1() {
		$('form#clocks_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="clocks_1">
	<div class="arrow_before"></div>	       
    <h2>Акриловые</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Часы акриловые - магниты на холодильник с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="clocks_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="clocks_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_clocks_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_clocks_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_clocks_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_clocks_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Часы акриловые, круг диаметром 10 см или квадрат 12.4х12.4 см, имеют магниты на обратной стороне, отверстие для крепления на стену и могут комплектоваться пластиковыми ножками (+ 15 руб.) для установки на плоские поверхности.</p>
	    <p class="serv_tip">Наценка за цветной корпус +8 руб. Возможные цвета: белый, черный, синий, красный, бронзовый.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="clocks_2">
	<div class="arrow_before"></div>	       
    <h2>Деревянные настольные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Часы деревянные настольные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="clocks_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="clocks_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_clocks_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_clocks_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_clocks_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_clocks_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Диаметр часов 15 см, подставка - деревянные ножки, упаковка - картонная коробка.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="clocks_3">
	<div class="arrow_before"></div>	       
    <h2>Стеклянные настольные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Часы настольные стеклянные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="clocks_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="clocks_3_type">
		    			<option value="1">Квадратные</option>
		    			<option value="2">Прямоугольные</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="clocks_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_clocks_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_clocks_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_clocks_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_clocks_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Часы стеклянные квадратные 20х20 см с одним полем для изображения.</p>
	    <p class="serv_tip">Часы стеклянные прямоугольные 16х30 см с двумя полями для изображения.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="clocks_4">
	<div class="arrow_before"></div>	       
    <h2>Пластиковые настенные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Часы пластиковые настенные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="clocks_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="clocks_4_type">
		    			<option value="1">Без корпуса</option>
		    			<option value="2">Квадратный корпус</option>
		    			<option value="3">Круглый корпус</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="clocks_4_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_clocks_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_clocks_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_clocks_4_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_clocks_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Часы без корпуса: круг диаметром 20 см или квадрат 19.5х19.5 из пластика толщиной 4 мм с полноцветным изображением. Часовой механизм с подвесом, упаковка - картонная коробка.</p>
	    <p class="serv_tip">Квадратные часы: 20.5х20.5 см, цвета корпуса: красный, зеленый, синий, белый, черный, желтый, упаковка - картонная коробка.</p>
	    <p class="serv_tip">Круглые часы: диаметр 30 см, цвета корпуса: белый, черный, красный, синий, зеленый, серебряный, упаковка - картонная коробка.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="clocks_5">
	<div class="arrow_before"></div>	       
    <h2>Деревянные настенные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Часы настенные деревянные по стандартному или индивидуальному эскизу с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="clocks_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="clocks_5_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_clocks_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_clocks_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_clocks_5_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_clocks_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Варианты настенных деревянных часов можно посмотреть <a href="<?=PATH.'category/36';?>">здесь</a>.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>

