<script type="text/javascript">
	function calc_pockets_1() {
		var vars = [
		parseInt($('select[name=pockets_1_type]').val()),
		parseInt($('input[name=pockets_1_count]').val()),
		$('input[name=pockets_1_checkbox]:checked').val()
		];
		
		var c=0,d,e;
		
		switch(vars[0]){
			case 1:
				a = 1;
				break;
			case 2:
				a = 1.2;
				break;
			case 3:
				a = 1.4;
				break;
		}

		if (vars[1]>6999){
			
		}else if (vars[1]>4999){
			d = -6;
		}else if (vars[1]>1999){
			d = -3.5;
		}else if (vars[1]>999){
			d = 0;
		}else if (vars[1]>499){
			d = 6.5;
		}else if (vars[1]>299){
			d = 14;
		}else if (vars[1]>199){
			d = 17.5;
		}else if (vars[1]>99){
			d = 21.5;
		}

		if (vars[2]=='on'){
			c = 5;
		}

		if (vars[1]>99){
			e = (parseFloat('<?=$get_service['pockets'];?>') + d ) * a;
		}else{
			e = 4000 / vars[1] * a;
		}
		console.log(vars);
		e = e + c;

		if (isNaN(e)){
			$('span#result_pockets_1').parent().text('Обратитесь для расчета в офис');
			$('span#result_pockets_1_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_pockets_1').text(e.toFixed(1));
			$('span#result_pockets_1_full').text((e*vars[1]).toFixed(1));
		}
	}
	function calc_pockets_2() {
		var vars = [
			parseInt($('select[name=pockets_2_type]').val()),
			parseInt($('input[name=pockets_2_rezka]:checked').val()),
			parseFloat($('input[name=pockets_2_a]').val().replace(/,/, '.')),
			parseFloat($('input[name=pockets_2_b]').val().replace(/,/, '.')),
			parseInt($('input[name=pockets_2_count]').val())
		];

		<?$get_goods = get_goods(248);?>
		<?$get_goods1 = get_goods(935);?>
		<?$get_goods2 = get_goods(247);?>

		var a,b,c,d,e;
		
		if (vars[4]>9999){
		
		}else if (vars[4]>4999){
			d = -0.09;
		}else if (vars[4]>299){
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

		e = vars[2]*vars[3]*(parseFloat('<?=$get_service['magnitvinil_price_1'];?>') + d + 0.15 * (vars[1] - 1)) + a;

		if (isNaN(e)){
			$('span#result_pockets_2').parent().text('Обратитесь для расчета в офис!');
			$('span#result_pockets_2_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_pockets_2').text(e.toFixed(1));			
			$('span#result_pockets_2_full').text((e.toFixed(1)*vars[4]).toFixed(1));			
		}
	}
	function calc_pockets_3() {
		var vars = [
			parseInt($('input[name=pockets_3_count]').val())
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
			$('span#result_pockets_3').parent().text('Обратитесь для расчета в офис!');
			$('span#result_pockets_3_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_pockets_3').text(e.toFixed(1));			
			$('span#result_pockets_3_full').text((e.toFixed(1)*vars[0]).toFixed(1));			
		}
	}
	function calc_pockets_4() {
		var vars = [
			parseInt($('select[name=pockets_4_type]').val()),
			parseInt($('input[name=pockets_4_count]').val())
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
			$('span#result_pockets_4').parent().text('Обратитесь для расчета в офис!');
			$('span#result_pockets_4_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_pockets_4').text(e.toFixed(1));			
			$('span#result_pockets_4_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}
	function calc_pockets_5() {
		var vars = [
			parseInt($('select[name=pockets_5_type]').val()),
			parseInt($('input[name=pockets_5_count]').val())
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
			$('span#result_pockets_5').parent().text('Обратитесь для расчета в офис!');
			$('span#result_pockets_5_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_pockets_5').text(e.toFixed(1));			
			$('span#result_pockets_5_full').text((e.toFixed(1)*vars[1]).toFixed(1));			
		}
	}


	function reset_form_pockets_5() {
		$('form#pockets_2_form')[0].reset();
	}
	function reset_form_pockets_4() {
		$('form#pockets_2_form')[0].reset();
	}
	function reset_form_pockets_3() {
		$('form#pockets_2_form')[0].reset();
	}
	function reset_form_pockets_2() {
		$('form#pockets_2_form')[0].reset();
	}
	function reset_form_pockets_1() {
		$('form#pockets_1_form')[0].reset();
	}
</script>
<div class="serv-section" id="pockets_1">
	<div class="arrow_before"></div>	       
    <h2>Пакеты полиэтиленовые ПВД с прорубной ручкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пакеты полиэтиленовые с прорубной усиленной ручкой с логотипом или надписью из полиэтилена высокого давления (мягкие).</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="pockets_1_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Количество цветов:</span>
		    		<select name="pockets_1_type">
		    			<option value="1">1</option>
		    			<option value="2">2</option>
		    			<option value="3">3</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Цветной пакет: </span><input type="checkbox" name="pockets_1_checkbox">
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="pockets_1_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость за единицу: <span class="calc_result" id="result_pockets_1">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_pockets_1();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_pockets_1_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_pockets_1();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Стандартные пакеты: белые, 40-50 мкн, размер 30х40 см или 40х50 см.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="pockets_2">
	<div class="arrow_before"></div>	       
    <h2>Пакеты полиэтиленовые ПНД с прорубной ручкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пакеты полиэтиленовые с прорубной усиленной ручкой с логотипом или надписью из полиэтилена низкого давления (шуршащие).</p>
	    	</div>
	    </div>
	    <?/*
	    <table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid windowtext 1.0pt">
			<tbody>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">Размеры, тираж</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">20 мкм</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">30 мкм</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">40 мкм</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">50 мкм</span></span></p>
					</td>
				</tr>
				<tr>
					<td colspan="5" style="vertical-align:top; width:445.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><strong><span style="font-size:11.0pt">37*48 см.</span></strong></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">5000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,2 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">3,4 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">4,5 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">5,6 р.</span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">10000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,9 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,8 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">3,8 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">4,8 р.</span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">50000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,6 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,5 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">3,3 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">4,2 р.</span></span></p>
					</td>
				</tr>
				<tr>
					<td colspan="5" style="vertical-align:top; width:445.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><strong><span style="font-size:11.0pt">30*38 см.</span></strong></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">5000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,6 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,1 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,8 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">3,7 р.</span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">10000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,2 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,8 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,5 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,9 р.</span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">50000</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,1 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">1,6 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.0pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,2 р.</span></span></p>
					</td>
					<td style="vertical-align:top; width:89.05pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-size:11.0pt">2,8 р.</span></span></p>
					</td>
				</tr>
			</tbody>
		</table>
		*/?>

		<p class="serv_tip">Изготовление <span class="serv_tip_warning">клише оплачивается отдельно</span>, 5 руб/кв.см. каждого цвета.</p>
	    <p class="serv_tip">Каждый следующий цвет в нанесении - +10%.</p>
	    <p class="serv_tip">Цвет пакета не влияет на цену.</p>
	    <p class="serv_tip">Другие размеры пакетов рассчитываются индивидуально. </p>
	    <p class="serv_tip">Минимальный тираж - 5000 шт.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="pockets_3">
	<div class="arrow_before"></div>	       
    <h2>Пакеты-маечки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пакеты-маечки полиэтиленовые с логотипом или надписью из полиэтилена низкого давления.</p>
	    	</div>
	    </div>
	    <?/*
		<table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid windowtext 1.0pt; width:584px; text-align: center;">
			<tbody>
				<tr>
					<td rowspan="2" style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Размеры пакетов, см.</span></span></span></p>
					</td>
					<td rowspan="2" style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Количество цветов в макете</span></span></span></p>
					</td>
					<td rowspan="2" style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Количество</span></span></span></p>
					</td>
					<td colspan="4" style="vertical-align:top; width:210.55pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Толщина пакетов мкм, цена в рублях</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">16 мкм</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">17 мкм</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">18 мкм</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">20 мкм</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">28+14*48</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,96</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,1</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,17</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10&nbsp;000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,68</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,75</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,89</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,54</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,75</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,54</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">30+15*48</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,1</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,24</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,38</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,82</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,89</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,03</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,54</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,68</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,75</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">32+16*53</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,38</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,59</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,1</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,4</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,45</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,89</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1,96</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,17</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">32+16*58</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,94</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,08</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,31</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,52</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,1</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,24</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,38</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">35+16*58</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,94</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,15</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,22</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,52</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,8</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,24</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,38</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,52</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">43+20*58</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1+0</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">5 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">4,06</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">4,48</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,5</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,92</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,15</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,5</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">10 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,94</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,12</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,5</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,5</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:90.45pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:70.9pt">
					<p style="margin-left:0cm; margin-right:0cm">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:65.85pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">50 000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.15pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">2,8</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:53.2pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,08</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:51.05pt">
					<p style="margin-left:0cm; margin-right:0cm"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">3,50</span></span></span></p>
					</td>
				</tr>
			</tbody>
		</table>
		*/?>

	    <p class="serv_tip">Изготовление <span class="serv_tip_warning">клише оплачивается отдельно</span>, 5 руб/кв.см. каждого цвета.</p>
	    <p class="serv_tip">Каждый следующий цвет в нанесении - +10%.</p>
	    <p class="serv_tip">Цвет пакета не влияет на цену.</p>
	    <p class="serv_tip">Другие размеры пакетов рассчитываются индивидуально. </p>
	    <p class="serv_tip">Минимальный тираж - 5000 шт.</p>
	    <p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="pockets_4">
	<div class="arrow_before"></div>	       
    <h2>Пакеты бумажные с полноцветной печатью</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пакеты бумажные ламинированные с веревочными ручками с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <?/*
	    <table border="1" cellspacing="0" class="MsoTableGrid" style="border-collapse:collapse; border:solid windowtext 1.0pt; text-align: center;">
			<tbody>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.5pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Формат А5</span></span></span></p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.55pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Формат А4</span></span></span></p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.55pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Формат А3</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Виды (Ш*В*Г, см.)</span></span></span></p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.5pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">8,5*36*8,5</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">12*16*8</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">24*14*7</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">20*14*7</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">18*27*6</span></span></span></p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.55pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">12*36*8</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">20*25*10</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">21,5*27*12</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">22*20*8</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">24*34,5*8,5</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">25*35*9</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">35*25*9</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">22*21*10</span></span></span></p>
					</td>
					<td colspan="2" style="vertical-align:top; width:133.55pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">30*40*12</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">30*35*20</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">34*45*9</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">34*45*14,5</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">34*46*12</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">37*42*11</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">45*34*10</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">45*35*13,5</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">55*38*13</span></span></span></p>

					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">53*37*15</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Ламинация</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Глян.</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Матов.</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Глян.</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Матов.</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Глян.</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">Матов.</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">100</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">175</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">180</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">259</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">273</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">150</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">130</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">140</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">210</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">224</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">200</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center">&nbsp;</p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">119</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">126</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">189</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">203</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">300</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">66</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">70</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">98</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">105</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">154</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">168</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">500</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">59</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">63</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">90</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">96,5</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">133</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">147</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">700</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">53</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">57,5</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">77</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">84</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">123</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">137</span></span></span></p>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top; width:76.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">1000</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:62.2pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">43,5</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:71.3pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">47,6</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.15pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">70</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:69.4pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">77</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:64.8pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">100</span></span></span></p>
					</td>
					<td style="vertical-align:top; width:68.75pt">
					<p style="margin-left:0cm; margin-right:0cm; text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-size:11.0pt">115</span></span></span></p>
					</td>
				</tr>
			</tbody>
		</table>
		*/?> 
	    <p class="serv_tip">При изготовлении пакета А3 размера с разными изображениями с двух сторон, стоимость пакета увеличивается на 20-50 % в зависимости от тиража. За точным расчетом обратитесь в офис.</p>
	    <p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="pockets_5">
	<div class="arrow_before"></div>	       
    <h2>Пакеты с нанесением методом шелкографии</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Пакеты из имитлина и прочих материалов, крафт-пакеты с нанесением логотипа или надписей, рассчитываются индивидуально. Минимальный тираж 100 шт.</p>
	    	</div>
	    </div>	   
	</div>
</div> 
<hr>