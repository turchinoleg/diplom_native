<?#print_arr($get_service);?>
<script type="text/javascript">
	function calc_wideprint() {
		var vars = [
			parseInt($('select[name=wideprint_osnova]').val()),
			parseInt($('input[name=wideprint_quality]:checked').val()),
			parseFloat($('input[name=wideprint_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=wideprint_b]').val().replace(/,/, '.')),
			parseInt($('input[name=wideprint_postprint]:checked').val())
		];

		var a,b,c,d,e;

		if (vars[1]==1){	
			switch(vars[0]){
				case 1:
					a = -30;
					break;
				case 2:
				case 10:
					a = 0;
					break;
				case 3:
				case 7:
					a = 100;
					break;
				case 4:
				case 5:
				case 6:
					a = 150;
					break;
				case 8:
					a = 350;
					break;
				case 9:
					a = -50;
					break;
			}
		}else{
			switch(vars[0]){
				case 1:
					a = 50;
					break;
				case 2:
				case 10:
					a = 100;
					break;
				case 3:
				case 7:
					a = 200;
					break;
				case 4:
				case 5:
				case 6:
					a = 250;
					break;
				case 8:
					a = 500;
					break;
				case 9:
					a = 50;
					break;
			}
		}

		b = vars[2];
		c = vars[3];

		d = b * c;

		if (d < 1){
			d = 1;
		}

		if (vars[0]==6){
			e = d * (parseInt('<?=$get_service['wideprint_price_1'];?>') + a) + 2 * (b + c) * (parseInt('<?=$get_service['wideprint_price_2'];?>') + 35) * vars[4];	
		}else{
			e = d * (parseInt('<?=$get_service['wideprint_price_1'];?>') + a) + 2 * (b + c) * parseInt('<?=$get_service['wideprint_price_2'];?>') * vars[4];	
		}

		//console.log(e + ' = ' + d + ' * (' + parseInt('<?=$get_service['wideprint_price_1'];?>') + ' + ' + a + ') + 2 * (' + b + ' + ' + c + ') * ' + parseInt('<?=$get_service['wideprint_price_2'];?>') + ' * ' + vars[4]);


		if (isNaN(e)){
			$('span#result_wideprint').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wideprint').text(e.toFixed(1));			
		}
	}
	function calc_interiorprint() {
		var vars = [
			parseInt($('select[name=interiorprint_osnova]').val()),
			parseFloat($('input[name=interiorprint_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=interiorprint_b]').val().replace(/,/, '.')),
			parseInt($('input[name=interiorprint_postprint]:checked').val())
		];

		var a,b,c,d,e;
				
		switch(vars[0]){
			case 1:
				a = 50;
				break;
			case 2:
				a = 100;
				break;
			case 3:
				a = 0;
				break;
			case 4:
				a = -50;
				break;
			case 5:
				a = 350;
				break;
			case 6:
				a = 600;
				break;
			case 7:
				a = 900;
				break;
			
		}
		

		b = vars[1];
		c = vars[2];

		d = b * c;

		if (d < 0.5){
			d = 0.5;
		}

		e = d * (parseInt('<?=$get_service['wideprint_price_3'];?>') + a) + 2 * (b + c) * parseInt('<?=$get_service['wideprint_price_2'];?>') * vars[3];	

		//console.log(d+' '+parseInt('<?=$get_service['wideprint_price_3'];?>')+' '+a+' '+b+' '+c+' '+parseInt('<?=$get_service['wideprint_price_2'];?>')+' '+vars[3]);

		if (isNaN(e)){
			$('span#result_interiorprint').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_interiorprint').text(e.toFixed(1));			
		}
	}
	function calc_stickers() {
		var vars = [
			parseFloat($('input[name=stickers_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stickers_b]').val().replace(/,/, '.'))
		];

		var a,b,c,d,e;

		b = vars[0];
		c = vars[1];

		e = b * c * 0.22;	

		if (isNaN(e)){
			$('span#result_stickers').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stickers').text(e.toFixed(1));			
		}
	}

	function reset_form_stickers() {
		$('form#stickers_form')[0].reset();
	}
	function reset_form_interiorprint() {
		$('form#interiorprint_form')[0].reset();
	}
	function reset_form_wideprint() {
		$('form#wideprint_form')[0].reset();
	}
</script>
<div class="serv-section" id="wideprint">
	<div class="arrow_before"></div>	       
    <h2>Широкоформатная печать (540 или 720 dpi)</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wideprint_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Основа (материал):</span>
		    		<select name="wideprint_osnova">
		    			<option value="1">Баннер (Китай), 350 г/м2</option>
		    			<option value="2">Баннер (Китай), 450 г/м2</option>
		    			<option value="3">Баннер (Китай), 520 г/м2</option>
		    			<option value="4">Баннер (Европа), 520 г/м2</option>
		    			<option value="5">Баннер транслюцентный</option>
		    			<option value="6">Сетка баннерная</option>
		    			<option value="7">Плёнка самоклеющаяся</option>
		    			<option value="8">Плёнка самоклеющаяся перфорированная</option>
		    			<option value="9">Бумага BlueBack</option>
		    			<option value="10">Бумага постерная</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Стандарт 540 dpi</span><input type="radio" checked value="1" name="wideprint_quality">
		    		<span class="calc_label">Премиум 720 dpi</span><input type="radio" value="2" name="wideprint_quality">				    		
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в метрах: </span><input type="text" name="wideprint_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в метрах: </span><input type="text" name="wideprint_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">С постпечатью</span><input type="radio" value="1" name="wideprint_postprint">
		    		<span class="calc_label">Без постпечати</span><input type="radio" checked value="0" name="wideprint_postprint">				    		
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость: <span class="calc_result" id="result_wideprint">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wideprint();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_wideprint();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip" style="color:red;">Минимальная сумма заказа - 1 кв. м.</p>
	    <p class="serv_tip">Постпечать - подгибка (проклейка) края, установка люверсов (3 шт на п.м.).</p>
	    <p class="serv_tip">Максимальная ширина печати - 3,1 м., бумага - 1,48 м.</p>
	    <p class="serv_tip">При необходимости можно прорезать ветровые карманы. Стоимость одного кармана - 15 руб.</p>
	    <p class="serv_tip">При заказе более 100 кв.м. предусмотрены скидки, обращайтесь в офис.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="interiorprint">
	<div class="arrow_before"></div>	       
    <h2>Интерьерная печать (1440 dpi)</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="interiorprint_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Основа (материал):</span>
		    		<select name="interiorprint_osnova">
		    			<option value="1">Баннер (Китай), 300 г/м2</option>
		    			<option value="2">Баннер (Китай), 450 г/м2</option>
		    			<option value="3">Плёнка самоклеющаяся</option>
		    			<option value="4">Бумага постерная</option>
		    			<option value="5">Баннер полипропиленовый</option>
		    			<option value="6">Бэклит</option>
		    			<option value="7">Холст</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в метрах: </span><input type="text" name="interiorprint_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в метрах: </span><input type="text" name="interiorprint_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">С постпечатью</span><input type="radio" value="1" name="interiorprint_postprint">
		    		<span class="calc_label">Без постпечати</span><input type="radio" checked value="0" name="interiorprint_postprint">				    		
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость: <span class="calc_result" id="result_interiorprint">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_interiorprint();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_interiorprint();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip" style="color:red;">Минимальная сумма заказа - 0.5 кв. м.</p>
	    <p class="serv_tip">Постпечать - подгибка (проклейка) края, установка люверсов (3 шт на п.м.).</p>
	    <p class="serv_tip">Максимальная ширина печати:
	    	<ul>
	    		<li>Баннер и плёнка - 1,56 м.;</li>
	    		<li>Бумага и бэклит - 0,98 м.;</li>
	    		<li>Холст - 0,6 м.</li>
	    	</ul>
	    </p>
	    <p class="serv_tip">При заказе более 100 кв.м. предусмотрены скидки, обращайтесь в офис.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stickers">
	<div class="arrow_before"></div>	       
    <h2>Наклейки с высечкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Плёнка самоклеющаяся с интерьерной печатью (1440 dpi) с высечкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stickers_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stickers_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stickers_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость 1 наклейки: <span class="calc_result" id="result_stickers">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stickers();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stickers();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальная ширина готового изделия - 5 мм</p>
	</div>
</div>
<hr>
