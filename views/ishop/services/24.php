<script type="text/javascript">
	function calc_udo_1() {
		var vars = [
		parseInt($('input[name=udo_1_count]').val())
		];
		<?$get_goods = get_goods(468);?>

		var d,e;

		(vars[0]>299) ? d=-10 : d=0;
		
		e = parseFloat('<?=$get_service['dodelka_price_2'];?>') + d + parseFloat('<?=$get_goods['price'];?>');

		if (isNaN(e)){
			$('span#result_udo_1').parent().text('Обратитесь для расчета в офис');
			$('span#result_udo_1_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_udo_1').text(e.toFixed(1));
			$('span#result_udo_1_full').text((e.toFixed(1)*vars[0]).toFixed(1));
		}
	}
	function calc_udo_2() {
		var vars = [
			parseInt($('input[name=udo_2_rezka]:checked').val()),
			parseInt($('input[name=udo_2_count]').val())
		];

		var a,b,c,d,e;
		
		if (vars[1]>999){
		
		}else if (vars[1]>299){
			d = -15;
		}else if (vars[1]>99){
			d = -10;
		}else d = 0;

		e = 20 + parseFloat('<?=$get_service['promo_price_5'];?>') + d + parseFloat('<?=$get_service['dodelka_price_2'];?>')*(vars[0]-1);

		if (isNaN(e)){
			$('#udo_2_form .calc_row:nth-last-child(2) strong').html('Обратитесь для расчета в офис');
			$('#udo_2_form .calc_row:nth-last-child(1) strong').html('');
		} else {
			$('#udo_2_form .calc_row:nth-last-child(2) strong').html('Стоимость за единицу: <span class="calc_result">'+e.toFixed(1)+'</span> руб.');
			$('#udo_2_form .calc_row:nth-last-child(1) strong').html('Полная стоимость: <span class="calc_result">'+(e*vars[1]).toFixed(1)+'</span> руб.');
		}
	}
	function calc_udo_3() {
		var vars = [
			parseInt($('input[name=udo_3_count]').val()),
			parseInt($('select[name=udo_3_type]').val())
		];

		<?$get_goods = get_goods(204);?>
		<?$get_goods1 = get_goods(205);?>
		<?$get_goods2 = get_goods(1019);?>

		var a,b,c,d,e;
		
		(vars[0]>299) ? d = -10 : d = 0;

		switch(vars[1]){
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
			$('span#result_udo_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_udo_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_udo_3').text(e.toFixed(1));			
			$('span#result_udo_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function reset_form_udo_3() {
		$('form#udo_3_form')[0].reset();
	}
	function reset_form_udo_2() {
		$('form#udo_2_form')[0].reset();
	}
	function reset_form_udo_1() {
		$('form#udo_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="udo_1">
	<div class="arrow_before"></div>	       
    <h2>Стандартные удостоверения</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Удостоверения красного цвета 10х6.5 см, с тиснением золотой фольгой герба РФ и слова «удостоверение». Внутренняя вклейка разрабатывается индивидуально.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="udo_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="udo_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_udo_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_udo_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_udo_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_udo_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 200-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="udo_2">
	<div class="arrow_before"></div>	       
    <h2>Удостоверения под заказ</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Компания «Аверс-стиль» изготавливает на заказ удостоверения любых размеров, цветов и с тиснением любого клише на обложке в Уфе.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="udo_2_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Без внутренней вклейки</span><input type="radio" checked value="1" name="udo_2_rezka">
		    		<span class="calc_label">С внутренней вклейкой</span><input type="radio"  value="2" name="udo_2_rezka">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="udo_2_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_udo_2">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_udo_2();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_udo_2_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_udo_2();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Изготовление <ownblocknorm class="serv_tip_warning">клише оплачивается отдельно</ownblocknorm>, 2500-5000 руб., в зависимости от размера и сложности.</p>
	    <p class="serv_tip">Стандартное удостоверение - 10x7 см, "без подушки", цвет красный или синий, тиснение золотой или серебряной фольгой, печать внутренний вкладки - полноцвет.</p>
	    <p class="serv_tip">При заказе нестандартного удостоверения расчет ведется индивидуально.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-1000 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="udo_3">
	<div class="arrow_before"></div>	       
    <h2>Обложки для документов</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пластиковые обложки для документов с полноцветной полиграфической вставкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="udo_3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид:</span>
		    		<select name="udo_3_type">
		    			<option value="1">Паспорт</option>
		    			<option value="2">Студенческий билет</option>
		    			<option value="3">Зачетная книжка</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="udo_3_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_udo_3">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_udo_3();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    	<strong>Полная стоимость: <span class="calc_result" id="result_udo_3_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_udo_3();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 200-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>