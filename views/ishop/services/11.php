<script type="text/javascript">
	function calc_badge_1() {
		var vars = [
			parseInt($('input[name=badge_1_count]').val())
		];

		<?$get_goods = get_goods(257);?>

		var a,b,c,d,e;
		
		if (vars[0]>2999){
			d = -9;
		}else if (vars[0]>999){
			d = -8;
		}else if (vars[0]>499){
			d = -7;
		}else if (vars[0]>299){
			d = -5;
		}else if (vars[0]>99){
			d = 0;
		}else if (vars[0]>19){
			d = 5;
		}else d = 10;

		e = (parseFloat('<?=$get_service['price'];?>') + 15 + 26) / 8 + parseFloat('<?=$get_goods['price_1'];?>') + d + 20;
		
		if (isNaN(e)){
			$('span#result_badge_1').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_1_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_1').text(e.toFixed(1));			
			$('span#result_badge_1_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_badge_2() {
		var vars = [
			parseInt($('select[name=badge_2_const]').val()),
			parseInt($('input[name=badge_2_count]').val())
		];

		<?$get_goods = get_goods(258);?>
		<?$get_goods1 = get_goods(257);?>
		<?$get_goods2 = get_goods(1122);?>
		<?$get_goods3 = get_goods(388);?>
		<?$get_goods4 = get_goods(259);?>
		
		var a,b,c,d,e;
		
		if (vars[1]>2999){
			
		}else if (vars[1]>999){
			d = -8;
		}else if (vars[1]>499){
			d = -7;
		}else if (vars[1]>299){
			d = -5;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>19){
			d = 6;
		}else d = 11;

		switch(vars[0]){
			case 1:
				e = 8 + parseFloat('<?=$get_goods['price_1'];?>') + parseFloat('<?=$get_goods1['price_1'];?>') + d;
				break;
			case 2:
				e = 8 + parseFloat('<?=$get_goods['price_1'];?>') + parseFloat('<?=$get_goods2['price'];?>') + d;
				break;	
			case 3:
				e = 8 + parseFloat('<?=$get_goods3['price_1'];?>') + d;
				break;		
			case 4:
				e = 8 + parseFloat('<?=$get_goods['price_1'];?>') + parseFloat('<?=$get_goods4['price_1'];?>') + d;
				break;			
		}

		if (isNaN(e)){
			$('span#result_badge_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_2').text(e.toFixed(1));			
			$('span#result_badge_2_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}

	function calc_badge_3() {
		var vars = [
			parseInt($('input[name=badge_3_wind]:checked').val()),
			parseFloat($('input[name=badge_3_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=badge_3_b]').val().replace(/,/, '.')),
			parseInt($('input[name=badge_3_count]').val())
		];

		<?$get_goods = get_goods(1507);?>
		
		var a,b,c,d,e;
		
		e = vars[1]*vars[2]* parseFloat('<?=$get_service['badge_price_1'];?>') + parseFloat('<?=$get_goods['price'];?>')*2 + 10 * (vars[0]-1);

		if (isNaN(e)){
			$('span#result_badge_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_3').text(e.toFixed(1));		
			$('span#result_badge_3_full').text((e*vars[3]).toFixed(1));		
		}
	}
	function calc_badge_5() {
		var vars = [
			parseInt($('input[name=badge_5_wind]:checked').val()),
			parseInt($('input[name=badge_5_count]').val())
		];

		<?$get_goods = get_goods(1119);?>
		<?$get_goods1 = get_goods(202);?>
		<?$get_goods2 = get_goods(1507);?>
		
		var a,b,c,d,e;
		
		if(vars[0]==1){
			e = parseFloat('<?=$get_service['promo_price_3'];?>')/5 + parseFloat('<?=$get_goods2['price'];?>')*2 + parseFloat('<?=$get_goods['price'];?>')*2;
		}else{
			e = parseFloat('<?=$get_service['promo_price_3'];?>')/5 + parseFloat('<?=$get_goods2['price'];?>')*2 + parseFloat('<?=$get_goods1['price'];?>')*2;
		}

		if (isNaN(e)){
			$('span#result_badge_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_5').text(e.toFixed(1));		
			$('span#result_badge_5_full').text((e*vars[1]).toFixed(1));		
		}
	}
	function calc_badge_6() {
		var vars = [
			parseFloat($('input[name=badge_6_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=badge_6_b]').val().replace(/,/, '.')),
			parseInt($('input[name=badge_6_wind]:checked').val()),
			$('input[name=badge_6_window]:checked').val(),
			parseInt($('input[name=badge_6_count]').val())
		];

		<?$get_goods = get_goods(1507);?>
		<?$get_goods1 = get_goods(256);?>
		
		var a,b,c=0,d,e;

		if (vars[3]=='on') c = c + 10;
		
		if(vars[2]==1){
			e = vars[0]*vars[1]*10+parseFloat('<?=$get_goods['price'];?>');
		}else{
			e = vars[0]*vars[1]*10+parseFloat('<?=$get_goods1['price'];?>');
		}

		e = e + c;


		if (isNaN(e)){
			$('span#result_badge_6').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_6_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_6').text(e.toFixed(1));		
			$('span#result_badge_6_full').text((e*vars[4]).toFixed(1));		
		}
	}
	function calc_badge_7() {
		var vars = [
			parseFloat($('input[name=badge_7_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=badge_7_b]').val().replace(/,/, '.')),
			parseInt($('input[name=badge_7_count]').val()),
			$('input[name=badge_7_window]:checked').val()
		];

		<?$get_goods = get_goods(1507);?>
		
		var a,b,c=0,d,e;
		
		(vars[2]>299) ? d = -0.5 : d = 0;

		if (vars[3]=='on'){
			c = 10;
		}

		e = vars[0] * vars[1] * (parseFloat('<?=$get_service['badge_price_1'];?>')-1.5 + d) + parseFloat('<?=$get_goods['price'];?>') + c;

		if (isNaN(e)){
			$('span#result_badge_7').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_7_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_7').text(e.toFixed(1));		
			$('span#result_badge_7_full').text((e*vars[2]).toFixed(1));		
		}
	}
	function calc_badge_4() {
		var vars = [
			parseFloat($('input[name=badge_4_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=badge_4_b]').val().replace(/,/, '.')),
			parseInt($('input[name=badge_4_count]').val()),
			$('input[name=badge_4_window]:checked').val()
		];

		<?$get_goods = get_goods(1507);?>
		
		var a,b,c=0,d,e;
		
		(vars[2]>299) ? d = -0.5 : d = 0;

		if (vars[3]=='on'){
			c = 10;
		}

		e = vars[0] * vars[1] * (parseFloat('<?=$get_service['badge_price_1'];?>')+0.5 + d) + parseFloat('<?=$get_goods['price'];?>')*2 + c;

		if (isNaN(e)){
			$('span#result_badge_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_badge_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_badge_4').text(e.toFixed(1));		
			$('span#result_badge_4_full').text((e*vars[2]).toFixed(1));		
		}
	}

	function reset_form_badge_7() {
		$('form#badge_7_form')[0].reset();
	}
	function reset_form_badge_6() {
		$('form#badge_6_form')[0].reset();
	}
	function reset_form_badge_5() {
		$('form#badge_5_form')[0].reset();
	}
	function reset_form_badge_4() {
		$('form#badge_4_form')[0].reset();
	}
	function reset_form_badge_3() {
		$('form#badge_3_form')[0].reset();
	}
	function reset_form_badge_2() {
		$('form#badge_2_form')[0].reset();
	}
	function reset_form_badge_1() {
		$('form#badge_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="badge_1">
	<div class="arrow_before"></div>	       
    <h2>Ламинированный бейдж на ленте</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Бейджик ламинированный 10х15 см (бумага 300 г/м2) с полноцветной печатью на ленте.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер ленты 1х80 см., крепление - карабин или «крокодил», возможные цвета ленты: белый, синий, красный, желтый, зеленый, черный.</p>
	    <p class="serv_tip">Возможна комплектация бейджа лентой с рулеткой .</p>
	    <p class="serv_tip">Возможно нанесение логотипа или надписи на ленту, рассчитывается индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макетов для печати оплачивается отдельно (100-500 руб. в зависимости от сложности).</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_2">
	<div class="arrow_before"></div>	       
    <h2>Бейдж прозрачный с вкладышем</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Прозрачный пластиковый карман (бейджик) с различными видами крепления и бумажным вкладышем с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Крепление: </span>
		    		<select name="badge_2_const">
		    			<option value="1">Лента</option>
		    			<option value="2">Лента с рулеткой</option>
		    			<option value="3">Булавка и зажим</option>
		    			<option value="4">Клипса с петлей</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Размер стандартного прозрачного кармана - 100х70 мм (горизонтальный или вертикальный). Бейдж с булавкой и зажимом имеет размер 55х90 мм.</p>
	    <p class="serv_tip">Размер ленты 1х80 см., крепление - карабин или «крокодил», возможные цвета ленты: белый, синий, красный, желтый, зеленый, черный.</p>
	    <p class="serv_tip">Размер ленты с рулеткой - 1.5х85 см, крепление - силиконовая петля с кнопкой, цвет белый.</p>
	    <p class="serv_tip">Металлический зажим (клипса) с силиконовой петлей имеет длину 5 см.</p>
	    <p class="serv_tip">Стоимость подготовки макетов для печати оплачивается отдельно (100-500 руб. в зависимости от сложности).</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_3">
	<div class="arrow_before"></div>	       
    <h2>Пластиковый бейдж с гравировкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Для производства подобных бейджей применяется двухслойный пластик. В процессе гравировки верхний слой пластика «срезается» и гравируемые элементы становятся черными.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="badge_3_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="badge_3_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Без окна</span><input type="radio" checked value="1" name="badge_3_wind">
		    		<span class="calc_label">С окном</span><input type="radio" value="2" name="badge_3_wind">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Возможные цвета: золото, серебро.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
	    <p class="serv_tip">Крепление - металлический магнитный держатель для бейджа, 45х12 мм или круг диаметром 17 мм.</p>
	    <p class="serv_tip">При расчете фигурного бейджа учитываются максимальные габаритные размеры.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_4">
	<div class="arrow_before"></div>	       
    <h2>Пластиковый бейдж с печатью</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пластиковые бейджики с полноцветной УФ-печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="badge_4_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="badge_4_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_4_count">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">С окном: </span><input type="checkbox" name="badge_4_window">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_4_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Крепление - металлический магнитный держатель для бейджа, 45х12 мм или круг диаметром 17 мм.</p>
	    <p class="serv_tip">При расчете фигурного бейджа учитываются максимальные габаритные размеры.</p>
	    <p class="serv_tip">Стоимость подготовки макетов для печати оплачивается отдельно (100-500 руб. в зависимости от сложности).</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_5">
	<div class="arrow_before"></div>	       
    <h2>Металлический бейдж с печатью</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Металлические бейджи стандартных размеров из металла с полноцветной печатью (сублимация) и магнитной застежкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Без окна</span><input type="radio" checked value="1" name="badge_5_wind">
		    		<span class="calc_label">С окном</span><input type="radio" value="2" name="badge_5_wind">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_5_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_5_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Возможные цвета: золото, серебро, белый.</p>
	    <p class="serv_tip">Возможные размеры бейджа без окна: 65х35 мм, 70х40 мм, 76х51 мм.</p>
	    <p class="serv_tip">Размер бейджа с окном 76х51 мм, окно 64х20 мм.</p>
	    <p class="serv_tip">Наличие выбранных заготовок уточняйте в офисе.</p>
	    <p class="serv_tip">Крепление - металлический магнитный держатель для бейджа, 45х12 мм или круг диаметром 17 мм.</p>
	    <p class="serv_tip">Стоимость подготовки макетов для печати оплачивается отдельно (100-500 руб. в зависимости от сложности).</p>
	    <p class="serv_tip">При расчете фигурного бейджа учитываются максимальные габаритные размеры.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_6">
	<div class="arrow_before"></div>	       
    <h2>Бейдж с заливкой смолой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пластиковый бейдж с полнцветной печатью, залитой эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_6_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="badge_6_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="badge_6_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_6_count">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Магнитная застежка</span><input type="radio" checked value="1" name="badge_6_wind">
		    		<span class="calc_label">Пластиковая булавка</span><input type="radio" value="2" name="badge_6_wind">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">С окном: </span><input type="checkbox" name="badge_6_window">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_6">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_6();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_6_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_6();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальный тираж - 50 шт.</p>
	    <p class="serv_tip">Крепление - металлический магнитный держатель для бейджа 45х12 мм, круг диаметром 17 мм или пластиковая булавка 34х10 мм.</p>
	    <p class="serv_tip">Наличие кармана цену не меняет.</p>
	    <p class="serv_tip">При расчете фигурного бейджа учитываются максимальные габаритные размеры.</p>
	    <p class="serv_tip">Стоимость подготовки макетов для печати оплачивается отдельно (100-500 руб. в зависимости от сложности).</p>
	</div>
</div>
<hr>
<div class="serv-section" id="badge_7">
	<div class="arrow_before"></div>	       
    <h2>Деревянный бейдж с гравировкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Деревянный бейдж с гравировкой с магнитной застежкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="badge_7_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="badge_7_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="badge_7_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="badge_7_count">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">С окном: </span><input type="checkbox" name="badge_7_window">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_badge_7">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_badge_7();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_badge_7_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_badge_7();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Возможные материалы: ламинированный ХДФ (цвет белый или венге) или фанера натурального цвета.</p>
	    <p class="serv_tip">Возможна окраска фанеры в любой цвет, покрытие лаком или использование благородных пород дерева. Цена рассчитывается индивидуально.</p>
	    <p class="serv_tip">Крепление - металлический магнитный держатель для бейджа 45х12 мм, круг диаметром 17 мм.</p>
	    <p class="serv_tip">При расчете фигурного бейджа учитываются максимальные габаритные размеры.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 200-500 руб.</p>
	</div>
</div>
<hr>
