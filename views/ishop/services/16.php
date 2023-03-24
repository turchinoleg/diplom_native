<script type="text/javascript">
	$(function(){

		$('select[name=stands_1_type]').change(function(){

			var sel = parseInt($('select[name=stands_1_type]').val());
			
			switch (sel){
				case 1:
					$('input[name=stands_1_a]').val('50');
					$('input[name=stands_1_b]').val('60');
					break;
				case 2:
					$('input[name=stands_1_a]').val('90');
					$('input[name=stands_1_b]').val('60');
					break;
				case 3:
					$('input[name=stands_1_a]').val('90');
					$('input[name=stands_1_b]').val('85');
					break;
				case 4:
					$('input[name=stands_1_a]').val('');
					$('input[name=stands_1_b]').val('');					
					break;
			}

		});
		$('input[name=stands_1_a], input[name=stands_1_b]').change(function(){
			$('select[name=stands_1_type]').val(4);
		});
		return false;
	})
</script>

<script type="text/javascript">

	function calc_stands_1() {
		var vars = [
		parseInt($('input[name=stands_1_a]').val().replace('/,/','.')),
		parseInt($('input[name=stands_1_b]').val().replace('/,/','.')),
		parseInt($('input[name=stands_1_count]').val())
		];
		<?$get_goods = get_goods(1010);?>
		var d,e;

		if (isNaN(vars[2])){
			d = 0;
		}else{
			d = vars[2];
		}

		e = vars[0]*vars[1]* parseFloat('<?=$get_service['stand_price_1'];?>') + parseFloat('<?=$get_goods['price'];?>') * d;

		if (isNaN(e)){
			$('span#result_stands_1').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_stands_1').text(e.toFixed(1));
		}
	}
	function calc_stands_2() {
		var vars = [
			$('input[name=stands_2_sides]:checked').val(),
			parseFloat($('input[name=stands_2_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stands_2_b]').val().replace(/,/, '.'))
		];

		var c=0,e;

		if (vars[0]=='on') c = 1;
		
		
		e = vars[1]*vars[2]*(parseFloat('<?=$get_service['stand_price_1'];?>') + 0.15) + (vars[1] * vars[2] * 0.08 * c);

		if (isNaN(e)){
			$('span#result_stands_2').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stands_2').text(e.toFixed(1));						
		}
	}
	function calc_stands_3() {
		var vars = [
			parseFloat($('input[name=stands_3_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stands_3_b]').val().replace(/,/, '.'))
		];

		var e;
		
		e = vars[0]*vars[1]*(parseFloat('<?=$get_service['stand_price_1'];?>') + 0.15)

		if (isNaN(e)){
			$('span#result_stands_3').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stands_3').text(e.toFixed(1));					
		}
	}
	function calc_stands_4() {
		var vars = [
			parseInt($('input[name=stands_4_sides]:checked').val()),
			parseFloat($('input[name=stands_4_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stands_4_b]').val().replace(/,/, '.'))
		];

		var a,b,c,d,e;
		
		switch (vars[0]){
			case 1:
				e = vars[1]*vars[2]*parseFloat('<?=$get_service['stand_price_1'];?>');
				break;
			case 2:
				e = vars[1]*vars[2]*(parseFloat('<?=$get_service['stand_price_1'];?>') - 0.05);
				break;
			case 3:
				e = vars[1]*vars[2]*(parseFloat('<?=$get_service['stand_price_1'];?>') + 0.1);
				break;
		}

		console.log(parseFloat('<?=$get_service['stand_price_1'];?>'));

		if (isNaN(e)){
			$('span#result_stands_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_stands_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stands_4').text(e.toFixed(1));			
			$('span#result_stands_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_stands_5() {
		var vars = [
			$('input[name=stands_5_sides]:checked').val(),
			parseFloat($('input[name=stands_5_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stands_5_b]').val().replace(/,/, '.'))
		];

		var b=0,c,e;

		if (vars[0]=='on') b = 1;

		c = vars[1] * vars[2];

		if (c<1500){
			e = 100;
		}else {
			e = c * parseFloat('<?=$get_service['oracal_price_1'];?>') + c * 0.03 * b;
		}

		if (isNaN(e)){
			$('span#result_stands_5').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stands_5').text(e.toFixed(1));					
		}
	}
	function calc_stands_6() {
		var vars = [
			parseFloat($('input[name=stands_6_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=stands_6_b]').val().replace(/,/, '.'))
		];

		var c,e;

		c = vars[0] * vars[1];

		if (c<1250){
			e = 100;
		}else {
			e = c * (parseFloat('<?=$get_service['oracal_price_1'];?>') + 0.02);
		}

		if (isNaN(e)){
			$('span#result_stands_6').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_stands_6').text(e.toFixed(1));					
		}
	}


	function reset_form_stands_5() {
		$('form#stands_5_form')[0].reset();
	}
	function reset_form_stands_6() {
		$('form#stands_6_form')[0].reset();
	}
	function reset_form_stands_4() {
		$('form#stands_4_form')[0].reset();
	}
	function reset_form_stands_3() {
		$('form#stands_3_form')[0].reset();
	}
	function reset_form_stands_2() {
		$('form#stands_2_form')[0].reset();
	}
	function reset_form_stands_1() {
		$('form#stands_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="stands_1">
	<div class="arrow_before"></div>	       
    <h2>Стенды информационные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" onsumbit="calc_stands_1(); return false;" id="stands_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Размер стенда:</span>
		    		<select name="stands_1_type">
		    			<option value="1">С 2 карманами</option>
		    			<option value="2">С 4 карманами</option>
		    			<option value="3">С 6 карманами</option>
		    			<option value="4">Другой размер</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_1_a" value="50">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_1_b" value="60">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Количество объемных карманов: </span><input type="text" name="stands_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="sumbit" onclick="calc_stands_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стенд информационный (уголок покупателя и т.п.): пластик ПВХ 4 мм; самоклеющаяся плёнка с полноцветной печатью 1440 dpi или одноцветные плёнки Oracal; карманы плоские - ПЭТ 0.5 мм; карманы объемные - оргстекло 1.5-2 мм.</p>
	    <p class="serv_tip">Возможно изготовление фигурных стендов, расчет ведется по максимальным габаритным размерам, +30%.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	    <p class="serv_tip">Нестандартные стенды рассчитываются индивидуально.</p>
	    <p class="serv_tip">При заказе свыше 10 стендов предусмотрены скидки.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stands_2">
	<div class="arrow_before"></div>	       
    <h2>Таблички «Режим работы»</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stands_2_form">
	    		<div class="calc_row">
		    		<input type="checkbox" name="stands_2_sides"><span class="calc_label">&nbsp;&nbsp;С ламинацией</span>				    		
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_2_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_2_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stands_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
		<p class="serv_tip">Таблички изготавливаются из пластика ПВХ толщиной 4 мм с закаткой самоклеющейся плёнкой (одноцветные плёнки Oracal или плёнки с полноцветной печатью).</p>
		<p class="serv_tip">Ламинация табличек производится для защиты поверхности таблички и увеличения срока службы.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stands_3">
	<div class="arrow_before"></div>	       
    <h2>Таблички кабинетные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stands_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_3_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_3_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stands_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
		<p class="serv_tip">Таблички изготавливаются из пластика ПВХ толщиной 4 мм с закаткой самоклеющейся плёнкой (одноцветные плёнки Oracal или плёнки с полноцветной печатью).</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		<p class="serv_tip">Возможно изготовление других видов табличек (с использованием металлического профиля, с гравировкой и т.д.). Расчет ведется индивидуально.</p>
		<p class="serv_tip">При заказе свыше 30 табличек предусмотрены скидки.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stands_4">
	<div class="arrow_before"></div>	       
    <h2>Вывески фирменные</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Вывеска фирменная на пластике или композите с закаткой самоклеющейся плёнкой (одноцветная плёнка Oracal или плёнка с полноцветной печатью).</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stands_4_form">
	    		<div class="calc_row">
		    		<span class="calc_label">ПВХ</span><input type="radio" checked value="1" name="stands_4_sides">
		    		<span class="calc_label">Поликарбонат</span><input type="radio" value="2" name="stands_4_sides">				    		
		    		<span class="calc_label">Композит</span><input type="radio" value="3" name="stands_4_sides">				    		
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_4_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_4_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_4">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stands_4();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_4();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stands_5">
	<div class="arrow_before"></div>	       
    <h2>Аппликация из плёнки Oracal</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Одноцветные плёнки Oracal с вырезанными по контуру изображениями или надписями для приклеивания на различные поверхности.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stands_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">С монтажной плёнкой </span><input type="checkbox" name="stands_5_sides">			    		
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_5_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_5_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_5">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stands_5();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_5();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	    <p class="serv_tip">Максимальная ширина реза - 58 см.</p>
	    <p class="serv_tip">Монтажная плёнка используется для переноса вырезанного изображения с подложки на поверхность.</p>
	    <p class="serv_tip">При необходимости нарезать большое количество мелких элементов возможна наценка за сложность.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="stands_6">
	<div class="arrow_before"></div>	       
    <h2>Трафареты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Трафарет из ПЭТ 0.5 мм.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="stands_6_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Длина в сантиметрах: </span><input type="text" name="stands_6_a">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Ширина в сантиметрах: </span><input type="text" name="stands_6_b">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_stands_6">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_stands_6();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<button class="calc_button" type="button" onclick="reset_form_stands_6();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Максимальный размер 40х95 см.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 200-500 руб.</p>
	</div>
</div>
<hr>