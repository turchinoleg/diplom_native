<script type="text/javascript">
	function calc_discount_1() {
		var vars = [
		$('input[name=discount_option_1]:checked').val(),
		$('input[name=discount_option_2]:checked').val(),
		$('input[name=discount_option_3]:checked').val(),
		parseInt($('input[name=discount_1_count]').val())
		];

		console.log(vars);
		var d,e;
		var a=0,b=0,c=0;

		if (vars[0]=='on') a = 3;
		if (vars[1]=='on') b = 5;
		if (vars[2]=='on') c = 3;

		if (vars[3]>9999){
		
		}else if (vars[3]>4999){
			d = -3;
		}else if (vars[3]>999){
			d = -2;
		}else if (vars[3]>499){
			d = -1;
		}else if (vars[3]>299){
			d = 0;
		}else if (vars[3]>99){
			d = 5;
		}else d = 15;
		
		e = a + b + c + d + parseFloat('<?=$get_service['discount_price_1'];?>');

		if (isNaN(e)){
			$('span#result_discount_1').parent().text('Обратитесь для расчета в офис');
			$('span#result_discount_1_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_discount_1').text(e.toFixed(1));
			$('span#result_discount_1_full').text((e.toFixed(1)*vars[3]).toFixed(1));
		}
	}
	function calc_discount_cards() {
		var vars = [
		parseInt($('input[name=discount_cards_count]').val()),
		$('input[name=discount_cards_option_1]:checked').val(),
		$('input[name=discount_cards_option_2]:checked').val()
		];

		var a=0,b=0,e,d;
		if(vars[0]>2999){
			//alert('Обратитесь для расчета в офис!');
		}else if (vars[0]>999){
			d = -1;
		}else if (vars[0]>499){
			d = 1;
		}else if(vars[0]>99){
			d = 2;
		}else if(vars[0]>49){
			d = 4;
		}else d=7;

		if (vars[1]=='on') a = 3;
		if (vars[2]=='on') b = 1;

		e = (parseInt('<?=$get_service['price'];?>') * 2 + 7 + 75)/16+d+a+b;
		
		if (isNaN(e)){
			$('span#result_discount_cards').parent().text('Обратитесь для расчета в офис');
			$('span#result_discount_cards_full').parent().text('Обратитесь для расчета в офис');
		}else{
			$('span#result_discount_cards').text(e.toFixed(1));	
			$('span#result_discount_cards_full').text((e*vars[0]).toFixed(1));	
		}
	}
	function reset_form_discount_2() {
		$('form#discount_2_form')[0].reset();
	}
	function reset_form_discount_1() {
		$('form#discount_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="discount_1">
	<div class="arrow_before"></div>	       
    <h2>Пластиковые карты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пластиковые дисконтные карты 86х54 мм с двухсторонней полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="discount_1_form">
	    		<div class="calc_row">
		    		<input type="checkbox" name="discount_option_1">
		    		<span class="calc_label">Золотой/серебряный пластик</span>
		    		<input type="checkbox" name="discount_option_2">
		    		<span class="calc_label">Эмбоссирование</span>
		    		<input type="checkbox" name="discount_option_3">
		    		<span class="calc_label">Магнитная полоса</span>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="discount_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_discount_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_discount_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_discount_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_discount_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Печать нумерации или штрихкода входит в основную стоимость.</p>
	    <p class="serv_tip">Опции, не представленные в списке, рассчитываются индивидуально.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="discount_2">
	<div class="arrow_before"></div>	       
    <h2>Ламинированные картонные карты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Дисконтные карты 55х85мм, двухсторонняя полноцветная печать, бумага 300г/м2, ламинация 200 мкн, углы скругленные</p>
	    	</div>
	    </div>      
	    <form method="POST" class="serv_calc_form form-horizontal" action="" id="discount_cards_form">
    		<div class="calc_row">
	    		<input type="checkbox" name="discount_cards_option_1">
	    		<span class="calc_label">Золото/серебро</span>
	    		<input type="checkbox" name="discount_cards_option_2">
	    		<span class="calc_label">Нумерация</span>
    		</div>
    		<div class="calc_row">
	    		<span class="calc_label">Тираж: </span><input type="text" name="discount_cards_count">		    		
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Стоимость за единицу: <span class="calc_result" id="result_discount_cards">0</span> руб.</strong>
		    		<button class="calc_button" type="submit" onclick="calc_discount_cards();">Рассчитать</button>
		    	</div>
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Общая стоимость: <span class="calc_result" id="result_discount_cards_full">0</span> руб.</strong>
		    		<button class="calc_button" type="button" onclick="reset_form_discount_cards();">Очистить форму</button>
		    	</div>
	    	</div>
	    </form> 
	</div>
</div>
<hr>