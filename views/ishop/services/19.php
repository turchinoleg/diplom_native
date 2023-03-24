<script type="text/javascript">
	function calc_wardrobe_1() {
		var vars = [
			parseInt($('input[name=wardrobe_1_count]').val())
		];
		<?$get_goods = get_goods(190);?>

		var d,e;

		if (vars[0]>2999){
		
		}else if (vars[0]>999){
			d = -10;
		}else if (vars[0]>499){
			d = -7;
		}else if (vars[0]>299){
			d = -5;
		}else if (vars[0]>99){
			d = 0;
		}else if (vars[0]>29){
			d = 5;
		}else d = 10;
		
		e = parseFloat('<?=$get_goods['price'];?>') + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
			$('span#result_wardrobe_1').parent().text('Обратитесь для расчета в офис');
			$('span#result_wardrobe_1_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_wardrobe_1').text(e.toFixed(1));
			$('span#result_wardrobe_1_full').text((e.toFixed(1)*vars[0]).toFixed(1));
		}
	}
	function calc_wardrobe_2() {
		var vars = [
			parseInt($('input[name=wardrobe_2_rezka]:checked').val()),
			parseFloat($('input[name=wardrobe_2_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=wardrobe_2_b]').val().replace(/,/, '.')),
			parseInt($('input[name=wardrobe_2_count]').val())
		];

		var a,b,c,d,e;
		
		if (vars[3]>299){
			d = -0.5;
		}else d = 0;

		e = vars[1]*vars[2]*(parseFloat('<?=$get_service['badge_price_1'];?>') - 1.5 + d) * vars[0];

		if (isNaN(e)){
			$('span#result_wardrobe_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wardrobe_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wardrobe_2').text(e.toFixed(1));			
			$('span#result_wardrobe_2_full').text((e.toFixed(1)*vars[3]).toFixed(1));			
		}
	}
	function calc_wardrobe_3() {
		var vars = [
			parseInt($('input[name=wardrobe_3_count]').val()),
			parseInt($('select[name=wardrobe_3_type]').val()),
			parseFloat($('input[name=wardrobe_3_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=wardrobe_3_b]').val().replace(/,/, '.'))
		];

		var a,b,c,d,e;
		
		if (vars[0]>299){
			d = -0.5;
		}else{
			d = 0;
		}

		switch(vars[1]){
			case 1:
				e = vars[2]*vars[3]*(parseFloat('<?=$get_service['badge_price_1'];?>') + d);
				break;
			case 2:
				e = vars[2]*vars[3]*(parseFloat('<?=$get_service['badge_price_1'];?>') + d + 0.5);
				break;
		}
		console.log(vars);
		console.log(d);
		console.log(parseFloat('<?=$get_service['badge_price_1'];?>'));
		if (isNaN(e)){
			$('span#result_wardrobe_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_wardrobe_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_wardrobe_3').text(e.toFixed(1));			
			$('span#result_wardrobe_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_stickers() {
		var vars = [
			parseFloat($('input[name=stickers_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stickers_b]').val().replace(/,/, '.')),
			parseInt($('input[name=stickers_count]').val())
		];

		var a,b,c,d,e;

		b = vars[0];
		c = vars[1];

		e = b * c * 0.22;	

		if (isNaN(e)){
			$('span#result_stickers').parent().text('Обратитесь для расчета в офис!');
			$('span#result_stickers_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stickers').text(e.toFixed(1));			
			$('span#result_stickers_full').text((e*vars[2]).toFixed(1));			
		}
	}

	function reset_form_stickers() {
		$('form#stickers_form')[0].reset();
	}
	function reset_form_wardrobe_3() {
		$('form#wardrobe_3_form')[0].reset();
	}
	function reset_form_wardrobe_2() {
		$('form#wardrobe_2_form')[0].reset();
	}
	function reset_form_wardrobe_1() {
		$('form#wardrobe_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="wardrobe_1">
	<div class="arrow_before"></div>	       
    <h2>Акриловые номерки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Прозрачные гардеробные номерки 6х4 см с круглой двухсторонней полиграфической вставкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wardrobe_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wardrobe_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wardrobe_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wardrobe_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_wardrobe_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wardrobe_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="wardrobe_2">
	<div class="arrow_before"></div>	       
    <h2>Деревянные номерки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Деревянные гардеробные номерки из фанеры 3-4 мм с гравировкой изображения.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wardrobe_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонний</span><input type="radio" checked value="1" name="wardrobe_2_rezka">
		    		<span class="calc_label">Двухсторонний</span><input type="radio"  value="2" name="wardrobe_2_rezka">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="wardrobe_2_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="wardrobe_2_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wardrobe_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wardrobe_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wardrobe_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wardrobe_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wardrobe_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Возможна окраска фанеры в любой цвет, покрытие лаком или использование благородных пород дерева. Цена рассчитывается индивидуально.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 200-500 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="wardrobe_3">
	<div class="arrow_before"></div>	       
    <h2>Пластиковые номерки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Гардеробные номерки из двухслойного пластика, оргстекла или полистирола с гравировкой или полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="wardrobe_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Нанесение:</span>
		    		<select name="wardrobe_3_type">
		    			<option value="1">Гравировка</option>
		    			<option value="2">УФ-печать</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="wardrobe_3_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="wardrobe_3_b">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="wardrobe_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_wardrobe_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_wardrobe_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_wardrobe_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_wardrobe_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Двухслойный пластик для гравировки может быть золотой или серебряный, варианты цвета оргстекла или полистирола уточняйте в офисе.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 200-500 руб.</p>
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
		    		<span class="calc_label">Тираж: </span><input type="text" name="stickers_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость 1 наклейки: <span class="calc_result" id="result_stickers">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stickers();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_stickers_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_stickers();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальная ширина готового изделия - 5 мм</p>
	</div>
</div>
<hr>