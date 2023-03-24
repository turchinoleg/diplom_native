<script type="text/javascript">
	function calc_bracers_1() {
		var vars = [
		parseInt($('select[name=bracers_1_type]').val()),
		parseInt($('input[name=bracers_1_count]').val())
		];

		var a='',d,e;

		if (vars[1]>4999){
		
		}else if (vars[1]>2999){
			d = -17;
		}else if (vars[1]>999){
			d = -14;
		}else if (vars[1]>499){
			d = -6;
		}else if (vars[1]>299){
			d = 0;
		}else if (vars[1]>99){
			d = 11;
		}else a = 'Слишком маленький тираж!';

		e = d + parseFloat('<?=$get_service['bracers_price_1'];?>') + 6 * (vars[0] - 1);

		if (isNaN(a)){
			$('span#result_bracers_1').parent().text(a);
			$('span#result_bracers_1_full').parent().text(a);			
		}else{
			if (isNaN(e)){
				$('span#result_bracers_1').parent().text('Обратитесь для расчета в офис');
				$('span#result_bracers_1_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_bracers_1').text(e.toFixed(1));
				$('span#result_bracers_1_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
		}
	}
	function calc_bracers_2() {
		var vars = [
			parseInt($('input[name=bracers_2_count]').val())
		];

		<?$get_goods = get_goods(1024);?>

		var a,b,c,d,e;
		
		if (vars[0]>999){
		
		}else if (vars[0]>499){
			d = -25;
		}else if (vars[0]>299){
			d = -20;
		}else if (vars[0]>99){
			d = -10;
		}else if (vars[0]>49){
			d = -5;
		}else if (vars[0]>9){
			d = 0;
		}else d = 10;

		e = parseFloat('<?=$get_goods['price_2'];?>') + parseFloat('<?=$get_service['dodelka_price_2'];?>') + d;

		if (isNaN(e)){
			$('span#result_bracers_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_bracers_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_bracers_2').text(e.toFixed(1));			
			$('span#result_bracers_2_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}

	function reset_form_bracers_2() {
		$('form#bracers_2_form')[0].reset();
	}
	function reset_form_bracers_1() {
		$('form#bracers_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="bracers_1">
	<div class="arrow_before"></div>	       
    <h2>Браслеты силиконовые</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Силиконовые браслеты с логотипом или надписью (круговая шелкография).</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="bracers_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Количество цветов:</span>
		    		<select name="bracers_1_type">
		    			<option value="1">1</option>
		    			<option value="2">2</option>
		    			<option value="3">3</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="bracers_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_bracers_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_bracers_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_bracers_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_bracers_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Другие виды браслетов (с гравировкой, с выпуклым или вдавленным логотипом и т.п.) рассчитываются индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="bracers_2">
	<div class="arrow_before"></div>	       
    <h2>Слэп-браслеты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Слэп-браслеты с полиграфической вставкой, 2.5х20 см.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="bracers_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="bracers_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_bracers_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_bracers_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_bracers_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_bracers_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Слэп-браслет в развернутом виде выглядит как закладка или линейка, при легком ударе о запястье, браслет закручивается вокруг руки. Это возможно благодаря особым образом согнутой стальной пластине, которая находится внутри браслета.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="bracers_3">
	<div class="arrow_before"></div>	       
    <h2>Cлэп-браслеты светоотражающие</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Слэп-браслеты светоотражающие 2.5х20 см с нанесением логотипа или надписи методом шелкографии.</p>
	    	</div>
	    </div>
	    <p class="serv_tip">В развернутом виде выглядит как закладка или линейка…при легком ударе о запястье, браслет закручивается вокруг руки. Это возможно благодаря особым образом согнутой стальной пластине, которая находится внутри браслета.</p>
	    <p class="serv_tip">Рассчитываются индивидуально в зависимости от тиража, количества и размера цветов нанесения. Минимальный тираж 50 шт.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>