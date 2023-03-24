<script type="text/javascript">
	function calc_tampoprint() {
		var vars = [
		parseInt($('select[name=tampoprint_colors]').val()),				
		parseInt($('input[name=tampoprint_count]').val())
		];
		
		var a='',b,с,d,e;

		if (vars[1]>4999){
				d = -0.2;
			}else if (vars[1]>1999){
				d = 0.9;
			}else if (vars[1]>999){
				d = 2.6;
			}else if (vars[1]>499){
				d = 4.8;
			}else if(vars[1]>199){
				d = 9;
			}else if(vars[1]>99){
				d = 15.5;
			}else a='Слишком маленький тираж';

		switch (vars[0]){
			case 1:
				b = 1;
				break;
			case 2:
				b = 1.6;
				break;
			case 3:
				b = 2.2;
				break;
		}
		if (vars[1]>99){
			e = (parseInt('<?=$get_service['promo_price_1'];?>') + d)*b;
		}else{
			e = (2500)/vars[1]*b;
		}
		console.log(e + ' ' + a + ' ' + parseInt('<?=$get_service['promo_price_1'];?>'));
		
		if (isNaN(e)){
			$('span#result_tampoprint').parent().text('Обратитесь для расчета в офис');
			$('span#result_tampoprint_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_tampoprint').text(e.toFixed(1));
			$('span#result_tampoprint_full').text((e*vars[1]).toFixed(1));
		}
	}
	function calc_pens_fullcolor() {
		var vars = [		
		parseInt($('input[name=pens_fullcolor_count]').val())
		];
		<?$get_goods = get_goods(144);?>
		var d,e;

		if (vars[0]>1999){
			d = 8;
		}else if (vars[0]>999){
			d = 10;
		}else if (vars[0]>499){
			d = 12;
		}else if(vars[0]>299){
			d = 13;
		}else if(vars[0]>99){
			d = 15;
		}else d = 20;

		e = parseFloat('<?=$get_goods['price_6'];?>') + d;	
		//console.log(parseFloat('<?=$get_goods['price_6'];?>'));
		
		//$('span#result_pens_fullcolor').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
				$('span#result_pens_fullcolor').parent().text('Обратитесь для расчета в офис');
				$('span#result_pens_fullcolor_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_pens_fullcolor').text(e.toFixed(1));
				$('span#result_pens_fullcolor_full').text((e.toFixed(1)*vars[0]));
			}
	}
	function calc_cups_logo() {
		var vars = [
		parseInt($('select[name=cups_logo_colors]').val()),				
		parseInt($('input[name=cups_logo_count]').val())
		];
		
		var a='',b,c,d,e;

		if (vars[1]>1999){
				
			}else if (vars[1]>999){
				d = 0;
			}else if (vars[1]>499){
				d = 4;
			}else if (vars[1]>199){
				d = 8;
			}else if(vars[1]>99){
				d = 32;
			}else if(vars[1]>49){
				d = 68;
			}else a='Рассчитайте в разделе «Кружки с полноцветной печатью»';

		switch (vars[0]){
			case 1:
				b = 1;
				break;
			case 2:
				b = 1.6;
				break;
			case 3:
				b = 2.2;
				break;
		}

		e = (parseInt('<?=$get_service['promo_price_2'];?>') + d)*b;
		
		if (a==''){
			if (isNaN(e)){
				$('span#result_cups_logo').parent().text('Обратитесь для расчета в офис');
				$('span#result_cups_logo_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_cups_logo').text(e.toFixed(1));
				$('span#result_cups_logo_full').text((e.toFixed(1)*vars[1]));
			}

			//$('span#result_tampoprint').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		}else{			
			$('span#result_cups_logo').parent().text(a);
			$('span#result_cups_logo_full').parent().text(a);
		}
	}	
	function calc_cups_fullcolor() {
		var vars = [		
		parseInt($('select[name=cups_fullcolor_position]').val()),
		parseInt($('input[name=cups_fullcolor_count]').val())
		];
		<?
		$get_goods = array();
		$get_goods[] = get_goods(88);?> //1
		<?$get_goods[] = get_goods(104);?> //price_1
		<?$get_goods[] = get_goods(315);?> //price_1
		<?$get_goods[] = get_goods(131);?> //1
		<?$get_goods[] = get_goods(132);?> //1
		<?$get_goods[] = get_goods(129);?> //1
		<?$get_goods[] = get_goods(133);?> //2
		<?$get_goods[] = get_goods(318);?> //price_1
		var d,e;
		<?#print_arr($get_goods);?>
		if (vars[1]>499){
			d = -25;
		}else if (vars[1]>199){
			d = -10;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>49){
			d = 20;
		}else if (vars[1]>9){
			d = 50;
		}else d = 70;

		switch (vars[0]){
			case 2:
				e = parseInt('<?=$get_goods[1]['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') -50 + d;
				break;
			case 3:
				e = parseInt('<?=$get_goods[2]['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') -50 + d;
				break;
			case 8:
				e = parseInt('<?=$get_goods[7]['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') + d;
				break;
			case 1:				
				e = parseInt('<?=$get_goods[0]['price'];?>') + parseInt('<?=$get_service['price'];?>') + 12 + d;
				break;
			case 4:
				e = parseInt('<?=$get_goods[3]['price'];?>') + parseInt('<?=$get_service['price'];?>') + 12 + d;
				break;
			case 5:
				e = parseInt('<?=$get_goods[4]['price'];?>') + parseInt('<?=$get_service['price'];?>') + 12 + d;
				break;
			case 6:
				e = parseInt('<?=$get_goods[5]['price'];?>') + parseInt('<?=$get_service['price'];?>') + 12 + d;
				break;
			case 7:
				e = parseInt('<?=$get_goods[6]['price_1'];?>') + parseInt('<?=$get_service['price'];?>') + 12 + d;
				break;
				
		}

		//e = parseFloat('<?=$get_goods['price_1'];?>') + d;	
		//console.log(e);
		
		//$('span#result_cups_fullcolor').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
				$('span#result_cups_fullcolor').parent().text('Обратитесь для расчета в офис');
				$('span#result_cups_fullcolor_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_cups_fullcolor').text(e.toFixed(1));
				$('span#result_cups_fullcolor_full').text((e.toFixed(1)*vars[1]));
			}
	}
	function calc_brelocks() {
		var vars = [		
		parseInt($('select[name=brelocks_type]').val()),
		parseInt($('input[name=brelocks_count]').val())
		];
		<?$get_goods = get_goods(74);?> //price_1
		<?$get_goods1 = get_goods(157);?> //price_3
		var d,e;


		if (vars[1]>999){
			d = -15;
		}else if (vars[1]>499){
			d = -10;
		}else if (vars[1]>299){
			d = -7;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>49){
			d = 0;
		}else if (vars[1]>9){
			d = 5;
		}else d = 20;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price_1'];?>') + parseInt('<?=$get_service['dodelka_price_1'];?>') + d;	
				break;
			case 2:
				e = parseFloat('<?=$get_goods1['price_3'];?>') + parseInt('<?=$get_service['dodelka_price_1'];?>') + d;	
				break;
		}
		
		//$('span#result_brelocks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
				$('span#result_brelocks').parent().text('Обратитесь для расчета в офис');
				$('span#result_brelocks_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_brelocks').text(e.toFixed(1));
				$('span#result_brelocks_full').text((e.toFixed(1)*vars[1]));
			}
	}
	function calc_mousecarp() {
		var vars = [		
		parseInt($('select[name=mousecarp_type]').val()),
		parseInt($('input[name=mousecarp_count]').val())
		];
		<?$get_goods = get_goods(194);?> //price_1
		<?$get_goods1 = get_goods(1242);?> //price
		var a='',d,e;
	

		if (vars[1]>499){
			d = -20;
		}else if (vars[1]>299){
			d = -15;
		}else if (vars[1]>99){
			d = -10;
		}else if (vars[1]>49){
			d = -5;
		}else d = 0;

		switch(vars[0]){
			case 1:
				e = parseFloat('<?=$get_goods['price_1'];?>') + parseInt('<?=$get_service['price'];?>') + 7 + d;	
				break;
			case 2:
				if (vars[1]>=101){
					a = 'Обратитесь для расчета в офис';
				}else{
					e = parseFloat('<?=$get_goods1['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') + d;	
				}
				break;
		}
		
		//$('span#result_mousecarp').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (a == ''){
			if (isNaN(e)){
				$('span#result_mousecarp').parent().text('Обратитесь для расчета в офис');
				$('span#result_mousecarp_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_mousecarp').text(e.toFixed(1));
				$('span#result_mousecarp_full').text((e.toFixed(1)*vars[1]));
			}			
		}else{
			$('span#result_mousecarp').parent().text(a);
			$('span#result_mousecarp_full').parent().text(a);
		}
	}
	function calc_dailybooks() {
		var vars = [		
		parseInt($('select[name=dailybooks_type]').val()),
		parseInt($('input[name=dailybooks_count]').val())
		];
		var a='',b,d,e;
	

		if (vars[1]>1999){
			
		}else if (vars[1]>999){
			d = -10;
		}else if (vars[1]>499){
			d = -9;
		}else if (vars[1]>299){
			d = -7;
		}else if (vars[1]>199){
			d = -5;
		}else if (vars[1]>99){
			d = 0;
		}else if (vars[1]>49){
			d = 10;
		}else if (vars[1]>9){
			d = 30;
		}else d = 50;

		switch(vars[0]){
			case 1:
				b=0;
				break;
			case 2:
				b=0;
				if (vars[1]<50){
					a='Слишком маленький тираж!';
				}
				break;
			case 3:
				b=10;
				if (vars[1]<50){
					a='Слишком маленький тираж!';
				}
				break;
			case 4:
				if (vars[1]<50){
					a='Слишком маленький тираж!';
				}
				b=5;
				break;
		}
		
		e = parseInt('<?=$get_service['promo_price_5'];?>') + b + d;
		
		//console.log(parseInt('<?=$get_service['promo_price_5'];?>') + ' ' + b  + ' ' + d);
		//$('span#result_dailybooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (a==''){
			if (isNaN(e)){
				$('span#result_dailybooks').parent().text('Обратитесь для расчета в офис');
				$('span#result_dailybooks_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_dailybooks').text(e.toFixed(1));
				$('span#result_dailybooks_full').text((e.toFixed(1)*vars[1]));
			}			
		}else{
			$('span#result_dailybooks').parent().text(a);
			$('span#result_dailybooks_full').parent().text(a);
		}
	}
	function calc_puzzles() {
		var vars = [		
		parseInt($('select[name=puzzles_type]').val()),
		parseInt($('input[name=puzzles_count]').val())
		];
		<?$get_goods = get_goods(785);?> //price_1
		<?$get_goods1 = get_goods(329);?> //price_1
		var d,e;


		if (vars[1]>299){
			
		}else if (vars[1]>199){
			d = -50;
		}else if (vars[1]>99){
			d = -40;
		}else if (vars[1]>49){
			d = -20;
		}else if (vars[1]>9){
			d = 0;
		}else d = 20;

		switch(vars[0]){
			case 1:
				e = (parseFloat('<?=$get_goods['price_1'];?>') + parseInt('<?=$get_service['promo_price_3'];?>')) + d;	
				break;
			case 2:
				e = (parseFloat('<?=$get_goods1['price_3'];?>') + parseInt('<?=$get_service['promo_price_3'];?>')) / 2 + d;	
				break;
		}
		
		//$('span#result_puzzles').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
				$('span#result_puzzles').parent().text('Обратитесь для расчета в офис');
				$('span#result_puzzles_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_puzzles').text(e.toFixed(1));
				$('span#result_puzzles_full').text((e.toFixed(1)*vars[1]));
			}
	}
	function calc_textile() {
		var vars = [		
		parseInt($('select[name=textile_type]').val()),
		parseInt($('input[name=textile_count]').val())
		];
		<?$get_goods = get_goods(370);?> //price
		<?$get_goods1 = get_goods(811);?> //price
		<?$get_goods2 = get_goods(373);?> //price
		<?$get_goods3 = get_goods(1014);?> //price
		var d,e;


		if (vars[1]>299){
			
		}else if (vars[1]>199){
			d = -20;
		}else if (vars[1]>99){
			d = -10;
		}else if (vars[1]>49){
			d = 0;
		}else if (vars[1]>9){
			d = 15;
		}else d = 30;

		switch(vars[0]){
			case 1:
				e = (parseFloat('<?=$get_goods['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>')) + d;	
				break;
			case 2:
				e = (parseFloat('<?=$get_goods1['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>')) + d;	
				break;
			case 3:
				e = (parseFloat('<?=$get_goods2['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') / 2) + d;	
				break;
			case 4:
				e = (parseFloat('<?=$get_goods3['price'];?>') + parseInt('<?=$get_service['promo_price_3'];?>') / 2) + d;	
				break;
		}
		
		//$('span#result_textile').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
				$('span#result_textile').parent().text('Обратитесь для расчета в офис');
				$('span#result_textile_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_textile').text(e.toFixed(1));
				$('span#result_textile_full').text((e.toFixed(1)*vars[1]));
			}
	}
	function calc_lighters() {
		var vars = [		
		parseInt($('select[name=lighters_type]').val()),
		parseInt($('input[name=lighters_count]').val())
		];
		<?$get_goods = get_goods(177);?> //price_1
		<?$get_goods1 = get_goods(715);?> //price_1
		<?$get_goods2 = get_goods(1079);?> //price_1
		var d,e;


		if (vars[1]>499){
			
		}else if (vars[1]>299){
			d = -15;
		}else if (vars[1]>199){
			d = -10;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price']?>');
				break;
			case 3:
				a = parseFloat('<?=$get_goods2['price']?>');
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_lighters').parent().text('Обратитесь для расчета в офис');
				$('span#result_lighters_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_lighters').text(e.toFixed(1));
				$('span#result_lighters_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
	}
	function calc_mirrors() {
		var vars = [		
		parseInt($('select[name=mirrors_type]').val()),
		parseInt($('input[name=mirrors_count]').val())
		];
		<?$get_goods = get_goods(173);?> //price_1
		<?$get_goods1 = get_goods(1142);?>  //price_1
		var d,e;


		if (vars[1]>499){
			
		}else if (vars[1]>299){
			d = -20;
		}else if (vars[1]>199){
			d = -18;
		}else if (vars[1]>99){
			d = -15;
		}else if (vars[1]>29){
			d = -10;
		}else d = 0;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price_1']?>');
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_2'];?>');

		if (isNaN(e)){
				$('span#result_mirrors').parent().text('Обратитесь для расчета в офис');
				$('span#result_mirrors_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_mirrors').text(e.toFixed(1));
				$('span#result_mirrors_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
	}
	function calc_bells() {
		var vars = [		
		parseInt($('select[name=bells_type]').val()),
		parseInt($('input[name=bells_count]').val())
		];
		<?$get_goods = get_goods(516);?> //price_1
		<?$get_goods1 = get_goods(176);?>  //price_1
		var d,e;


		if (vars[1]>499){
			
		}else if (vars[1]>299){
			d = -15;
		}else if (vars[1]>199){
			d = -10;
		}else if (vars[1]>99){
			d = -5;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price']?>');
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_bells').parent().text('Обратитесь для расчета в офис');
				$('span#result_bells_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_bells').text(e.toFixed(1));
				$('span#result_bells_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
	}
	function calc_spoons() {
		var vars = [		
		parseInt($('select[name=spoons_type]').val()),
		parseInt($('input[name=spoons_count]').val())
		];
		<?$get_goods = get_goods(560);?> //price_1
		<?$get_goods1 = get_goods(175);?>  //price_1
		<?$get_goods2 = get_goods(980);?>  //price_1
		var d,e;


		if (vars[1]>499){
			
		}else if (vars[1]>299){
			d = -25;
		}else if (vars[1]>199){
			d = -20;
		}else if (vars[1]>99){
			d = -10;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price']?>');
				break;
			case 3:
				a = parseFloat('<?=$get_goods2['price']?>');
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_spoons').parent().text('Обратитесь для расчета в офис');
				$('span#result_spoons_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_spoons').text(e.toFixed(1));
				$('span#result_spoons_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
	}
	function calc_flakes() {
		var vars = [		
		parseInt($('select[name=flakes_type]').val()),
		parseInt($('input[name=flakes_count]').val())
		];
		<?$get_goods = get_goods(1007);?> //price_1
		<?$get_goods1 = get_goods(998);?>  //price_1
		<?$get_goods2 = get_goods(519);?>  //price_1
		var d,e;


		if (vars[1]>499){
			
		}else if (vars[1]>299){
			d = -30;
		}else if (vars[1]>199){
			d = -20;
		}else if (vars[1]>99){
			d = -10;
		}else if (vars[1]>29){
			d = 0;
		}else d = 10;

		switch(vars[0]){
			case 1:	
				a = parseFloat('<?=$get_goods['price']?>');
				break;
			case 2:
				a = parseFloat('<?=$get_goods1['price']?>');
				break;
			case 3:
				a = parseFloat('<?=$get_goods2['price']?>');
				break;
		}
		
		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_flakes').parent().text('Обратитесь для расчета в офис');
				$('span#result_flakes_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_flakes').text(e.toFixed(1));
				$('span#result_flakes_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
	}
	function calc_johncubus() {
		var vars = [
		parseInt($('input[name=johncubus_count]').val())
		];
		<?$get_goods = get_goods(180);?>
		var d,e;


		if (vars[0]>499){
			
		}else if (vars[0]>299){
			d = -30;
		}else if (vars[0]>199){
			d = -20;
		}else if (vars[0]>99){
			d = -10;
		}else if (vars[0]>29){
			d = 0;
		}else d = 10;
		
		a = parseFloat('<?=$get_goods['price']?>');

		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_johncubus').parent().text('Обратитесь для расчета в офис');
				$('span#result_johncubus_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_johncubus').text(e.toFixed(1));
				$('span#result_johncubus_full').text((e.toFixed(1)*vars[0]).toFixed(1));
			}
	}
	function calc_metalbooks() {
		var vars = [
		parseInt($('input[name=metalbooks_count]').val())
		];
		<?$get_goods = get_goods(940);?>
		var d,e;


		if (vars[0]>499){
			
		}else if (vars[0]>299){
			d = -15;
		}else if (vars[0]>199){
			d = -10;
		}else if (vars[0]>99){
			d = -5;
		}else if (vars[0]>29){
			d = 0;
		}else d = 10;
		
		a = parseFloat('<?=$get_goods['price']?>');

		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_metalbooks').parent().text('Обратитесь для расчета в офис');
				$('span#result_metalbooks_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_metalbooks').text(e.toFixed(1));
				$('span#result_metalbooks_full').text((e.toFixed(1)*vars[0]).toFixed(1));
			}
	}
	function calc_visits() {
		var vars = [
		parseInt($('input[name=visits_count]').val())
		];
		<?$get_goods = get_goods(393);?>
		var d,e;


		if (vars[0]>499){
			
		}else if (vars[0]>299){
			d = -15;
		}else if (vars[0]>199){
			d = -10;
		}else if (vars[0]>99){
			d = -5;
		}else if (vars[0]>29){
			d = 0;
		}else d = 10;
		
		a = parseFloat('<?=$get_goods['price_1']?>');

		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_visits').parent().text('Обратитесь для расчета в офис');
				$('span#result_visits_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_visits').text(e.toFixed(1));
				$('span#result_visits_full').text((e.toFixed(1)*vars[0]).toFixed(1));
			}
	}
	function calc_moneyholder() {
		var vars = [
		parseInt($('input[name=moneyholder_count]').val())
		];
		<?$get_goods = get_goods(929);?>
		var d,e;


		if (vars[0]>499){
			
		}else if (vars[0]>299){
			d = -15;
		}else if (vars[0]>199){
			d = -15;
		}else if (vars[0]>99){
			d = -10;
		}else if (vars[0]>29){
			d = 0;
		}else d = 0;
		
		a = parseFloat('<?=$get_goods['price']?>');

		e = a + d + parseFloat('<?=$get_service['dodelka_price_1'];?>');

		if (isNaN(e)){
				$('span#result_moneyholder').parent().text('Обратитесь для расчета в офис');
				$('span#result_moneyholder_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_moneyholder').text(e.toFixed(1));
				$('span#result_moneyholder_full').text((e.toFixed(1)*vars[0]).toFixed(1));
			}
	}
	function reset_form_moneyholder() {
		$('form#moneyholder_form')[0].reset();
	}
	function reset_form_visits() {
		$('form#visits_form')[0].reset();
	}
	function reset_form_metalbooks() {
		$('form#metalbooks_form')[0].reset();
	}
	function reset_form_tampoprint() {
		$('form#tampoprint_form')[0].reset();
	}
	function reset_form_pens_fullcolor() {
		$('form#pens_fullcolor_form')[0].reset();
	}
	function reset_form_cups_logo() {
		$('form#cups_logo_form')[0].reset();
	}
	function reset_form_cups_fullcolor() {
		$('form#cups_fullcolor_form')[0].reset();
	}
	function reset_form_brelocks() {
		$('form#brelocks_form')[0].reset();
	}
	function reset_form_mousecarp() {
		$('form#mousecarp_form')[0].reset();
	}
	function reset_form_dailybooks() {
		$('form#dailybooks_form')[0].reset();
	}
	function reset_form_puzzles() {
		$('form#puzzles_form')[0].reset();
	}
	function reset_form_textile() {
		$('form#textile_form')[0].reset();
	}
	function reset_form_bells() {
		$('form#bells_form')[0].reset();
	}
	function reset_form_mirrors() {
		$('form#mirrors_form')[0].reset();
	}
	function reset_form_lighters() {
		$('form#lighters_form')[0].reset();
	}
	function reset_form_spoons() {
		$('form#spoons_form')[0].reset();
	}
	function reset_form_flakes() {
		$('form#flakes_form')[0].reset();
	}
	function reset_form_johncubus() {
		$('form#johncubus_form')[0].reset();
	}
</script>
<div class="serv-section" id="tampoprint">
	<div class="arrow_before"></div>	       
    <h2>Ручки, брелоки, зажигалки с логотипом (тампопечать)</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Нанесение векторного логотипа на пластиковые ручки, зажигалки, брелоки и прочие плоские поверхности. (Тампопечать однокомпонентной краской) </p>
	    	</div>
	    </div>
	    <p class="serv_tip serv_tip_warning">Стоимость изделия с логотипом = цена изделия + цена нанесения логотипа</p>
		<p class="serv_tip">Ниже представлен расчет нанесения логотипа без стоимости изделия</p>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="tampoprint_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Количество цветов в логотипе:</span>
		    		<select name="tampoprint_colors">
		    			<option value="1">1</option>
		    			<option value="2">2</option>
		    			<option value="3">3</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="tampoprint_count">		    		
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_tampoprint">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_tampoprint();">Рассчитать</button>
			    	</div>
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_tampoprint_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_tampoprint();">Очистить форму</button>
			    	</div>
		    	</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальная сумма заказа 2500 рублей.</p>
	    <p class="serv_tip">При необходимости нанести изображение, состоящее из 4-х и более цветов, цена рассчитывается индивидуально. Подробности уточняйте у менеджеров.</p>
	   	<p class="serv_tip">При нанесении одинакового изображения на разные изделия расчет ведется исходя из общего количества, но за перенастройку оборудования под каждый вид изделия дополнительная плата 1000 руб.
	    </p>
	   	<p class="serv_tip">При необходимости нанесения изображения в нескольких местах сувенира, каждый краскооттиск рассчитывается отдельно</p>
    	<p class="serv_tip">Максимальный размер одного краскооттиска на ручках 6*60мм, на прочих плоских поверхностях 80*80мм.</p>
    	<p class="serv_tip">Возможно круговое нанесение логотипа, рассчитывается индивидуально.</p>
    	<p class="serv_tip">Возможна полноцветная УФ-печать, рассчитывается индивидуально.</p>
    	<p class="serv_tip">Пластиковые ручки можно выбрать <a href="<?=PATH?>category/133">здесь</a> (в наличии) или <a href="//happygifts.ru/catalog_new/1049/">здесь</a> (под заказ), упаковку для них <a href="<?=PATH?>category/105">здесь</a></p>
    	<p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 100-300 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="newpens">
	<div class="arrow_before"></div>	       
    <h2>Ручки c гравировкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Ручки пластиковые или металлические с гравировкой. Стоимость гравировки от 10 до 50 руб в зависимости от сложности.</p>
	    	</div>
	    </div>
	    <p class="serv_tip">Для гравировки подходят только ручки с крашеным металлом (лазер снимает только краску).</p>
	    <p class="serv_tip">Ручки можно выбрать <a href="https://happygifts.ru/catalog_new/1051/" target="_blank">здесь</a>. Футляры для ручек можно выбрать <a href="<?=PATH.'category/105'?>">здесь</a>.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="pens_fullcolor">
	<div class="arrow_before"></div>	       
    <h2>Ручки c полноцветной вставкой</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Полноцветная вставка по всей площади ручки позволяет не ограничивать себя в количество используемых цветов и объеме размещаемой информации.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="pens_fullcolor_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="pens_fullcolor_count">		    		
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_pens_fullcolor">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_pens_fullcolor();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_pens_fullcolor_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_pens_fullcolor();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
		<p class="serv_tip">Стоимость ручки включена в итоговую цену.</p>
		<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="cups_logo">
	<div class="arrow_before"></div>	       
    <h2>Кружки с логотипом (тампопечать)</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Нанесение векторного логотипа на керамические или стеклянные кружки, бокалы, пепельницы и т.д. (тампопечать двухкомпонентной краской). </p>
	    	</div>
	    </div>
	    <p class="serv_tip serv_tip_warning">Стоимость изделия с логотипом = цена изделия + цена нанесения логотипа</p>
		<p class="serv_tip">Ниже представлен расчет нанесения логотипа без стоимости изделия</p>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="cups_logo_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Количество цветов в логотипе:</span>
		    		<select name="cups_logo_colors">
		    			<option value="1">1</option>
		    			<option value="2">2</option>
		    			<option value="3">3</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="cups_logo_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_cups_logo">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_cups_logo();">Рассчитать</button>
			    	</div>
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_cups_logo_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_cups_logo();">Очистить форму</button>
			    	</div>
		    	</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Минимальная сумма заказа 3500 рублей.</p>
	    <p class="serv_tip">При необходимости нанести изображение, состоящее из 4-х и более цветов, рекомендуется просчитать в разделе "Кружки с полноцветным изображением".</p>
	   	<p class="serv_tip">При нанесении одинакового изображения на разные изделия расчет ведется исходя из общего количества, но за перенастройку оборудования под каждый вид изделия дополнительная плата 500 руб.
	    </p>
	   	<p class="serv_tip">При печати на нестандартном изделии дополнительная плата 500 руб. за приладку.</p>
	   	<p class="serv_tip">При необходимости нанесения изображения в нескольких местах сувенира, каждый краскооттиск рассчитывается отдельно</p>
    	<p class="serv_tip">Максимальный размер одного краскооттиска на плоских поверхностях 45*45мм.</p>
    	<p class="serv_tip">Возможно круговое нанесение логотипа, рассчитывается индивидуально.</p>
    	<p class="serv_tip">Кружки и другие сувениры могут быть приобретены в «Аверс-стиль» или предоставлены заказчиком. Варианты кружек можно выбрать <a href="https://happygifts.ru/catalog_new/710/">здесь</a>.</p>
    	<p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 100-300 руб.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="cups_fullcolor">
	<div class="arrow_before"></div>	       
    <h2>Кружки c полноцветным изображением</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Кружки и термостаканы с полноцветным изображением по всей поверхности.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="cups_fullcolor_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тип:</span>
		    		<select name="cups_fullcolor_position">
		    			<option value="1">Пластиковая кружка 330 мл</option>
		    			<option value="2">Керамическая белая кружка 330 мл</option>
		    			<option value="3">Керамическая кружка с цветными элементами 330 мл</option>
		    			<option value="4">Термокружка 350 мл</option>
		    			<option value="5">Термокружка 450 мл</option>
		    			<option value="6">Термостакан пластиковый 400 мл</option>
		    			<option value="7">Термостакан металлический 400 мл</option>
		    			<option value="8">Пивная керамическая кружка</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="cups_fullcolor_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_cups_fullcolor">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_cups_fullcolor();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_cups_fullcolor_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_cups_fullcolor();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">Стоимость кружки включена в итоговую цену.</p>
    	<p class="serv_tip">Цветные элементы керамической кружки: ручка, каёмка, внутренняя поверхность. Наличие конкретных цветов и моделей уточняйте в офисе.</p>
    	<p class="serv_tip">Упаковку (коробочки) можно выбрать <a href="<?=PATH.'category/105';?>">здесь</a></p>
    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="cups_glass">
	<div class="arrow_before"></div>	       
    <h2>Кружки cтеклянные с гравировкой</h2>
	<div class="serv_content">
		<p>За расчётом обращайтесь в офис.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="brelocks"> 
	<div class="arrow_before"></div>	       
	<h2>Брелоки с полноцветным изображением</h2>
	<div class="serv_content">
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Пластиковые и металлические брелоки с полноцветным изображением (картинкой, логотипом, фотографией).</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="brelocks_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="brelocks_type">
		    			<option value="1">Пластиковые</option>
		    			<option value="2">Металлические</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="brelocks_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия от: <span class="calc_result" id="result_brelocks">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_brelocks();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость от: <span class="calc_result" id="result_brelocks_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_brelocks();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">Стоимость брелока включена в итоговую цену.</p>
    	<p class="serv_tip">Расчет произведен на самые популярные модели брелоков. Выбрать другие модели брелоков можно <a href="<?=PATH.'category/140';?>">здесь</a> или <a href="<?=PATH.'category/34';?>">здесь</a>. Стоимость заготовки увеличится на стоимость доработки брелока до готового изделия на 5-30 руб. в зависимости от вида и тиража.</p>
    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div> 			
</div>
<hr>
<div class="serv-section" id="bowls"> 
	<div class="arrow_before"></div>	       
	<h2>Тарелки керамические</h2>
	<div class="serv_content">
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Тарелки керамические с полноцветным изображением. <br>За расчётом обращайтесь в офис.</p>
	    	</div>
	    </div>
	    <?/*
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="bowls_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="bowls_type">
		    			<option value="1">Пластиковые</option>
		    			<option value="2">Металлические</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="bowls_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия от: <span class="calc_result" id="result_bowls">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_bowls();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость от: <span class="calc_result" id="result_bowls_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_bowls();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">Стоимость брелока включена в итоговую цену.</p>
    	<p class="serv_tip">Расчет произведен на самые популярные модели брелоков. Выбрать другие модели брелоков можно <a href="<?=PATH.'category/140';?>">здесь</a> или <a href="<?=PATH.'category/34';?>">здесь</a>. Стоимость заготовки увеличится на стоимость доработки брелока до готового изделия на 5-30 руб. в зависимости от вида и тиража.</p>
    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
    	*/?>
	</div> 			
</div>
<hr>
<div class="serv-section" id="dailybooks">
	<div class="arrow_before"></div>	       
	<h2>Ежедневники</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Нанесение векторного логотипа на ежедневники, планнинги, блокноты, визитницы и т.п.</p>
	    	</div>
	    </div>
	    <p class="serv_tip serv_tip_warning">Стоимость изделия с логотипом = цена изделия + цена нанесения логотипа</p>
		<p class="serv_tip">Ниже представлен расчет нанесения логотипа без стоимости изделия</p>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="dailybooks_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тип нанесения:</span>
		    		<select name="dailybooks_type">
		    			<option value="1">Лазерная гравировка</option>
		    			<option value="2">Тиснение</option>
		    			<option value="3">Тиснение фольгой</option>
		    			<option value="4">Нанесение краски в 1 цвет</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="dailybooks_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_dailybooks">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_dailybooks();">Рассчитать</button>
			    	</div>
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_dailybooks_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_dailybooks();">Очистить форму</button>
			    	</div>
		    	</div>
	    	</form>		    	
	    </div>
	    <p class="serv_tip">Максимальный размер нанесения - 100х100 мм</p>
	    <p class="serv_tip"></p>
	    <p class="serv_tip">Ежедневники и другая продукция может быть приобретена в «Аверс-стиль» или предоставлена заказчиком. Варианты ежедневников можно выбрать <a href="//happygifts.ru/catalog_new/733/">здесь</a>.</p>	
	    <p class="serv_tip">Не все ежедневники подходят для брендирования. Перед закупом партии для нанесения логотипа советуем получить консультацию специалиста и сделать тестовый экземпляр.</p>	
	    <p class="serv_tip serv_tip_warning">При заказе нанесения методом тиснения к стоимости прибавляется цена клише, зависящая от размера логотипа (от 2000 руб.).</p>
	    <p class="serv_tip">В случае нанесения краской компания «Аверс-стиль» оставляет за собой право выбора метода нанесения: шелкография или тампопечать</p>
	    <p class="serv_tip">При заказе нанесения обязательно должен быть предоставлен один экземпляр сверх тиража на приладку.</p>
    	<p class="serv_tip">Файл с изображением, предоставляемый для нанесения, должен быть векторным. При отсутствии соответствующего файла стоимость подготовки макета 100-300 руб.</p>
	</div>     			
</div>
<hr>
<div class="serv-section" id="mousecarp">
	<div class="arrow_before"></div>	       
	<h2>Коврики для мыши</h2>
	<div class="serv_content">
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="mousecarp_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="mousecarp_type">
		    			<option value="1">Пластиковый со вставкой</option>
		    			<option value="2">Тканевый</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="mousecarp_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия от: <span class="calc_result" id="result_mousecarp">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_mousecarp();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость от: <span class="calc_result" id="result_mousecarp_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_mousecarp();">Очистить форму</button>
	    			</div>
	    	</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">Пластиковый коврик с полиграфической полноцветной вставкой 19х19см, в наличии с синим кантом, красный кант под заказ.</p>
    	<p class="serv_tip">Тканевый коврик 36х29 см, нанесение полноцветного изображения методом «сублимация». Возможно изготовление других размеров под заказ.</p>
    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div> 	   			
</div>
<hr>
<div class="serv-section" id="puzzles">
	<div class="arrow_before"></div>	       
	<h2>Пазлы</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Пазл картонный, ячейки примерно по 2х2 см. Нанесение методом сублимации.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="puzzles_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="puzzles_type">
		    			<option value="1">А4, 19х24 см</option>
		    			<option value="2">А5, 18х13 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="puzzles_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия от: <span class="calc_result" id="result_puzzles">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_puzzles();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость от: <span class="calc_result" id="result_puzzles_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_puzzles();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
		<p class="serv_tip">Возможно изготовление других размеров пазлов, в том числе в форме сердечка под заказ.</p>
		<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>  			
</div>
<hr>
<div class="serv-section" id="textile">
	<div class="arrow_before"></div>	       
	<h2>Текстиль</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Фартуки, подушки, полотенца махровые с нанесением полноцветного изображения методом сублимации.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="textile_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="textile_type">
		    			<option value="1">Фартук</option>
		    			<option value="2">Подушка</option>
		    			<option value="3">Полотенце махровое 30х70 см</option>
		    			<option value="4">Полотенце махровое 47х90 см</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="textile_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия от: <span class="calc_result" id="result_textile">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_textile();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость от: <span class="calc_result" id="result_textile_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_textile();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">С изделиями Вы можете ознакомиться по следующим ссылкам:
    		<ul style="font-style: italic;">
    			<li><a href="<?=PATH.'product/370';?>">Фартук</a></li>
    			<li><a href="<?=PATH.'product/811';?>">Подушка</a></li>
    			<li><a href="<?=PATH.'product/373';?>">Полотенце махровое 30х70 см</a></li>
    			<li><a href="<?=PATH.'product/1014';?>">Полотенце махровое 47х90 см</a></li>
    		</ul>
    	</p>
	</div>   			
</div>
<hr>
<div class="serv-section" id="magnets">
	<a href="<?=PATH.'service/12';?>">
		<div class="arrow_before"></div>	       
		<h2>Магниты на холодильник</h2>
		<div class="serv_content">
			<p>Данный раздел находится на заполнении.</p>
		</div>
	</a>
</div>
<hr>
<div class="serv-section" id="signs">
	<a href="<?=PATH.'service/9';?>">
		<div class="arrow_before"></div>	       
		<h2>Значки</h2>
		<div class="serv_content">
			<p>Данный раздел находится на заполнении.</p>
		</div>
	</a>
</div>
<hr>
<div class="serv-section" id="notebooks">
	
		<div class="arrow_before"></div>	       
		<h2>Блокноты</h2>
		<div class="serv_content">
			<p>Изготовление блокнотов можно просчитать в разделе <a href="<?=PATH.'service/6';?>">Полноцветная печать</a> / Блокноты</p>
		</div>
</div>
<hr>
<div class="serv-section" id="clocks">
	<a href="<?=PATH.'service/13';?>">
		<div class="arrow_before"></div>	       
		<h2>Часы</h2>
		<div class="serv_content">
			<p>Данный раздел находится на заполнении.</p>
		</div>
	</a>
</div>
<hr>
<div class="serv-section" id="wooden_souv">
	<a href="<?=PATH.'service/18';?>">
		<div class="arrow_before"></div>	       
		<h2>Деревянные сувениры</h2>
		<div class="serv_content">			
			<p>Данный раздел находится на заполнении.</p>
		</div>
	</a>
</div>
<hr>
<div class="serv-section" id="lighters">
	<div class="arrow_before"></div>	       
	<h2>Зажигалки металлические</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Зажигалки металлические с полноцветным изображением, залитым эпоксидным смолой или гравировкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="lighters_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="lighters_type">
		    			<option value="1">Бензиновая</option>
		    			<option value="2">Газовая</option>
		    			<option value="3">Газовая «Мини»</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="lighters_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_lighters">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_lighters();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_lighters_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_lighters();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Бензиновая зажигалка может быть изготовлена с полноцветным изображением или гравировкой.</p>
		    	<p class="serv_tip">Газовая зажигалка - 7х2.5 см, линза 6.5х2.5 см, заправляемая.</p>
		    	<p class="serv_tip">Газовая зажигалка «Мини»- 6.5х2.5 см, линза диаметром 1.5 см, заправляемая.</p>
		    	<p class="serv_tip">Бензиновые зажигалки поставляются незаправленными, заправка - +10 руб.</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="mirrors">
	<div class="arrow_before"></div>	       
	<h2>Зеркала</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Зеркала карманные с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="mirrors_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="mirrors_type">
		    			<option value="1">Металлическое</option>
		    			<option value="2">Деревянное</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="mirrors_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_mirrors">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_mirrors();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_mirrors_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_mirrors();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
    	<p class="serv_tip">Зеркало металлическое компактное складное &asymp; 7x7 см с двумя зеркалами. Возможна допольнительная комплектация <a href ="<?=PATH.'category/136';?>">подарочной упаковкой</a>.</p>
    	<p class="serv_tip">Зеркальце карманное в деревянной оправе диаметром 62 мм.</p>
    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
	</div>  			
</div>
<hr>
<div class="serv-section" id="bells">
	<div class="arrow_before"></div>	       
	<h2>Колокольчики</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Колокольчики металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="bells_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="bells_type">
		    			<option value="1">С верхним полем</option>
		    			<option value="2">С тремя линзами</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="bells_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_bells">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_bells();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_bells_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_bells();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Колокольчик металлический с верхним полем, 10х4.5 см, 2 линзы диаметром 32 мм.</p>
		    	<p class="serv_tip">Колокольчик металлический с тремя линзами, 6х4.5 см, линзы овальные 12.8х20мм.</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="spoons">
	<div class="arrow_before"></div>	       
	<h2>Ложки</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Ложки металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="spoons_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="spoons_type">
		    			<option value="1">«Мини»</option>
		    			<option value="2">«Под золото»</option>
		    			<option value="3">«Чайная»</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="spoons_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_spoons">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_spoons();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_spoons_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_spoons();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Ложка «Мини» 11х2.6 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Ложка «Под золото» 13.5х3 см, упаковка - пластиковый футляр.</p>
		    	<p class="serv_tip">Ложка «Чайная» 14х3.5 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="flakes">
	<div class="arrow_before"></div>	       
	<h2>Фляжки</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Фляжки металлические с полноцветным изображением, залитым эпоксидным смолой или гравировкой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="flakes_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Вид: </span>
		    		<select name="flakes_type">
		    			<option value="1">Прямоугольная</option>
		    			<option value="2">Круглая</option>
		    			<option value="3">VIP</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="flakes_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_flakes">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_flakes();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_flakes_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_flakes();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Фляжка прямоугольная &asymp; 210-240 мл, под «серебро» с полноцветным изображением, цветные - с гравировкой.</p>
		    	<p class="serv_tip">Фляжка круглая 150 мл, цвет - под «серебро».</p>
		    	<p class="serv_tip">Фляжка круглая 240 мл, цвет - под «золото», подарочная коробка с окном.</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="johncubus">
	<div class="arrow_before"></div>	       
	<h2>Портсигары</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Портсигары металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="johncubus_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="johncubus_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_johncubus">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_johncubus();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_johncubus_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_johncubus();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Портсигар металлический 9х6 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="metalbooks">
	<div class="arrow_before"></div>	       
	<h2>Блокноты металлические</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Блокноты металлические с полноцветным изображением.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="metalbooks_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="metalbooks_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_metalbooks">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_metalbooks();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_metalbooks_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_metalbooks();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Блокнот металлический с отывными листочками и ручкой, 10х7.5 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="visits">
	<div class="arrow_before"></div>	       
	<h2>Визитницы (cardholder)</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Визитницы металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="visits_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="visits_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_visits">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_visits();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_visits_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_visits();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Визитницы металлические 9.3х6 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>
<div class="serv-section" id="moneyholder">
	<div class="arrow_before"></div>	       
	<h2>Зажимы для денег</h2>
	<div class="serv_content">
		<div class="serv_preview">
	    	<div>
	        	<p class="serv_desc">Зажимы для денег металлические с полноцветным изображением, залитым эпоксидным смолой.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="moneyholder_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="moneyholder_count">
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость одного изделия: <span class="calc_result" id="result_moneyholder">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_moneyholder();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость: <span class="calc_result" id="result_moneyholder_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_moneyholder();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip">Зажимы для денег металлические 6х3 см, цвет - под «серебро».</p>
		    	<p class="serv_tip">Стоимость подготовки макета для печати оплачивается отдельно, 100-500 руб. в зависимости от сложности.</p>
		    	<p class="serv_tip">При заказе большим тиражом предусмотрены скидки.</p>
	    	</form>		    	
	    </div>
	    <div class="serv_preview">
	    	<div>
	        	<p class="serv_desc need_photo"> СЮДА ФОТКИ</p>				        		        	
	    	</div>
	    </div>
	</div>  			
</div>
<hr>