<script type="text/javascript">
	function calc_atrib_2() {
		var vars = [
			parseInt($('select[name=atrib_2_type]').val())
		];

		<?$get_goods = get_goods(1265);?>
		<?$get_goods1 = get_goods(1219);?>
		<?$get_goods2 = get_goods(1239);?>
		<?$get_goods3 = get_goods(1261);?>
		<?$get_goods4 = get_goods(1117);?>
		<?$get_goods5 = get_goods(1062);?>
		<?$get_goods6 = get_goods(548);?>
		<?$get_goods7 = get_goods(514);?>

		var a,b,c,d,e;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price'];?>') + parseFloat('<?=$get_service['dodelka_price_1'];?>') + parseFloat('<?=$get_goods4['price'];?>');
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price'];?>') + parseFloat('<?=$get_goods5['price'];?>') + parseFloat('<?=$get_goods6['price'];?>');
				break;	
			case 3:
				e = parseFloat('<?=$get_goods2['price'];?>') + parseFloat('<?=$get_goods5['price'];?>') + parseFloat('<?=$get_goods6['price'];?>');
				break;	
			case 4:
				e = parseFloat('<?=$get_goods3['price'];?>') + parseFloat('<?=$get_goods4['price'];?>') + parseFloat('<?=$get_goods7['price'];?>');
				break;
		}

		if (isNaN(e)){
			$('span#result_atrib_2').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_atrib_2').text(e.toFixed(1));					
		}
	}
	function calc_atrib_3() {
		var vars = [
			parseInt($('input[name=atrib_3_count]').val())
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
			$('span#result_atrib_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_atrib_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_atrib_3').text(e.toFixed(1));			
			$('span#result_atrib_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_flags_5() {
		var vars = [
			parseInt($('select[name=flags_5_size]').val()),
			parseInt($('input[name=flags_5_count]').val())
		];
		<?$get_goods = get_goods(324);?>
		<?$get_goods1 = get_goods(1070);?>
		var a,b,c,d,e,f;

		if (vars[1]>999){
		
		}else if (vars[1]>499){
			d = -50;
		}else if (vars[1]>299){
			d = -40;
		}else if (vars[1]>99){
			d = -30;
		}else if (vars[1]>49){
			d = -15;
		}else if (vars[1]>9){
			d = 0;
		}else d = 20;
		
		if (vars[1]>2999){
		
		}else if (vars[1]>999){
			f = -3;
		}else if (vars[1]>499){
			f = -2;
		}else if (vars[1]>299){
			f = -1;
		}else if (vars[1]>99){
			f = 0;
		}else f = 3;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_service["promo_price_3"];?>') + d + parseFloat('<?=$get_goods['price_1'];?>');
				break;
			case 2:
				e = parseFloat('<?=$get_service["promo_price_3"];?>')*2 + d + parseFloat('<?=$get_goods1['price_1'];?>');
				break;
			case 3:
				e = (parseFloat('<?=$get_service["price"];?>') + 7 + 20)/4 + 5.5 + f;
				break;
			case 4:
				e = (parseFloat('<?=$get_service["price"];?>') + 8 + 20)/4*2 + 5.5 + f;
				break;
		}	
		
		if (isNaN(e)){
			$('span#result_flags_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_flags_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_flags_5').text(e.toFixed(1));			
			$('span#result_flags_5_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_print_fullcolor_a3(){
		var vars = [
		parseInt($('input[name=print_fullcolor_a3_count]').val())
		];
		var a,b,c,d,e;

		if (vars[0]>2999){
			
		}else if (vars[0]>1999){
			d = -14;
		}else if (vars[0]>999){
			d = -10.2;
		}else if (vars[0]>599){
			d = -4.2;
		}else if (vars[0]>299){
			d = 0;
		}else if (vars[0]>99){
			d = 5;
		}else if (vars[0]>49){
			d = 7;
		}else d=15;		

		//a - формат
		//b - толщина бумаги
		//c - кол-во сторон
		//d - наценка за тиражность
		//e - формула
		e = (parseInt('<?=$get_service['price'];?>')+ 7 + d) / 2;

		//$('input[name=result_print_fullcolor_a3]').val(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));		
		//$('span#result_print_fullcolor_a3').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));		
		if (isNaN(e)){
			$('span#result_print_fullcolor_a3').parent().text('Обратитесь для расчета в офис');
			$('span#result_print_fullcolor_a3_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_print_fullcolor_a3').text(e.toFixed(1));
			$('span#result_print_fullcolor_a3_full').text((e.toFixed(1)*vars[0]).toFixed(1));
		}
	}

	function reset_form_atrib_11() {
		$('form#atrib_2_form')[0].reset();
	}
	function reset_form_atrib_10() {
		$('form#atrib_2_form')[0].reset();
	}
	function reset_form_atrib_9() {
		$('form#atrib_2_form')[0].reset();
	}
	function reset_form_atrib_8() {
		$('form#atrib_8_form')[0].reset();
	}
	function reset_form_atrib_7() {
		$('form#atrib_7_form')[0].reset();
	}
	function reset_form_atrib_6() {
		$('form#atrib_6_form')[0].reset();
	}
	function reset_form_atrib_5() {
		$('form#atrib_5_form')[0].reset();
	}
	function reset_form_atrib_4() {
		$('form#flags_5_form')[0].reset();
	}
	function reset_form_atrib_3() {
		$('form#atrib_3_form')[0].reset();
	}
	function reset_form_atrib_2() {
		$('form#atrib_2_form')[0].reset();
	}
	function reset_form_atrib_1() {
		$('form#atrib_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="atrib_1">
	<div class="arrow_before"></div>	       
    <h2>Кубки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Кубки можно выбрать <a href="<?=PATH.'category/19';?>">здесь</a>. Если Вы не нашли в нашем ассортименте интересующие Вас кубки - компания «Аверс-стиль» может привезти эксклюзивные кубки под заказ. Подробности уточняйте у менеджера.</p>
	    	</div>
	    </div>
	    <p class="serv_tip">Шильда для кубка с персонализацией - 50 руб/шт.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="atrib_2">
	<div class="arrow_before"></div>	       
    <h2>Медали</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="atrib_2_form">
    		<div class="calc_row">
	    		<span class="calc_label">Вид:</span>
	    		<select name="atrib_2_type">			    			
	    			<option value="1">Пластиковые</option>
	    			<option value="2">Металлические, 40-45 мм</option>
	    			<option value="3">Металлические, 50 мм</option>
	    			<option value="4">Металлические, 70 мм</option>
	    		</select>
	    	</div>	
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_atrib_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_atrib_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row"> 
			    		<button class="calc_button" type="button" onclick="reset_form_atrib_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Описание медалей можно посмотреть <a href="<?=PATH.'category/4';?>">здесь</a>.</p>
	    <p class="serv_tip">При заказе свыше 50 комплектов медалей предусмотрена скидка.</p>
	    <p class="serv_tip">Возможно изготовление нестандартных медалей по индивидуальному заказу.</p>
		<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p> 
	</div>
</div>
<hr>
<div class="serv-section" id="atrib_3">
	<a href="<?=PATH.'category/5';?>">
		<div class="arrow_before"></div>	       
	    <h2>Рамки</h2>
	    <div class="serv_content">
	        <div class="serv_preview">
	        	<div>
		        	<p class="serv_desc">Рамки можно выбрать <a href="<?=PATH.'category/5';?>">здесь</a>.</p>
		    	</div>
		    </div>
		</div>
	</a>
</div>
<hr>
<div class="serv-section" id="atrib_4">
	<div class="arrow_before"></div>	       
    <h2>Вымпелы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Вымпелы с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flags_5_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="flags_5_size">
		    			<option value="1">Атласные односторонние</option>
		    			<option value="2">Атласные двухсторонние</option>
		    			<option value="3">Бумажные односторонние</option>
		    			<option value="4">Бумажные двухсторонние</option>
		    		</select>
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
	    <p class="serv_tip">Вымпелы атласные: 22х15 см с полноцветной печатью, с жесткой вставкой. Окантовка белая или триколор, внизу переходит в кисточку. Возможна комплектация вымпела подставкой (держателем). Цена и описание <a href="<?=PATH.'product/1155';?>">здесь</a>.</p>	    
	    <p class="serv_tip">Вымпелы бумажные: 20х15 см с полноцветной печатью с ламинацией.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="atrib_5">
	<div class="arrow_before"></div>	       
    <h2>Грамоты, дипломы</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="print_fullcolor_a3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="print_fullcolor_a3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати: <span class="calc_result" id="result_print_fullcolor_a3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_print_fullcolor_a3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_print_fullcolor_a3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_print_fullcolor_a3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Формат А4, печать полноцветная, бумага 200-300 г/м2. </p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="atrib_6">
	<a href="<?=PATH.'category/120';?>">
		<div class="arrow_before"></div>	       
	    <h2>Георгиевские ленты</h2>
    </a>
</div>
<hr>
