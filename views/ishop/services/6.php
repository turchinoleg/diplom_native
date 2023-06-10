<script>	
	function calc_print_fullcolor_a3(){
		var vars = [
		parseInt($('select[name=print_fullcolor_a3_format]').val())+1,
		parseInt($('select[name=print_fullcolor_a3_thickness]').val())+1,
		parseInt($('input[name=print_fullcolor_a3_sides]:checked').val())+1,
		parseInt($('input[name=print_fullcolor_a3_count]').val())
		];
		var a,b,c,d,e;
		//console.log(vars[0]+1);
		switch(vars[0]){
			case 1:
				a = 1;
				break;
			case 2:
				a = 0.5;
				break;
			case 3:
				a = 1/4;
				break;
			case 4:
				a = 1/8;
				break;
			case 5:
				a = 1/6;
				break;
		}
		if (vars[3]*a<300){
			switch(vars[1]){
				case 1:
					b = 6;
					break;
				case 2:
					b = 10;
					break;
				case 3:
					b = 15;
					break;
				case 4:
					b = 30;
					break;
			}
			c=vars[2];	
		}else{
			switch(vars[1]){
				case 1:
					b = 0;
					break;
				case 2:
					b = 8;
					break;
				case 3:
					b = 12;
					break;
				case 4:
					b = ' ';
					break;
			}
			(vars[2] == 1) ? c = 1 : c = 1.6;
		}

		
		if(vars[3]*a>1999){
			//alert('Обратитесь для расчета в офис!');
		}else if (vars[3]*a>999){
			d = -26.3;
		}else if (vars[3]*a>499){
			d = -18.5;
		}else if (vars[3]*a>299){
			d = -6.5;
		}else if (vars[3]*a>99){
			d = 0;
		}else if(vars[3]*a>49){
			d = 5;
		}else if(vars[3]*a>19){
			d = 7;
		}else d=15;		

		//a - формат
		//b - толщина бумаги
		//c - кол-во сторон
		//d - наценка за тиражность
		//e - формула
		e = (parseInt('<?=$get_service['price'];?>')+ b + d) * a * c;

		//$('input[name=result_print_fullcolor_a3]').val(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));		
		//$('span#result_print_fullcolor_a3').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));		
		if (isNaN(e)){
			$('span#result_print_fullcolor_a3').parent().text('Обратитесь для расчета в офис');
			$('span#result_print_fullcolor_a3_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_print_fullcolor_a3').text(e.toFixed(1));
			$('span#result_print_fullcolor_a3_full').text((e.toFixed(1)*vars[3]).toFixed(1));
		}
	}
	function calc_bucklets() {
	    iter = 0;
        $('#bucklets_form').find('.calc_result_row strong').each(function(){
            iter++;
            if (iter == 1){
                $(this).html('<strong>Стоимость за единицу: <span class="calc_result" id="result_bucklets">0</span> руб.</strong>');
            }else{
                $(this).html('<strong>Общая стоимость: <span class="calc_result" id="result_bucklets_full">0</span> руб.</strong>')
            }
            
        })
		var vars = [
		parseInt($('select[name=bucklets_format]').val()),
		parseInt($('input[name=bucklets_count]').val())
		];

		var e,b,d;
		if (vars[0]==1){
			b = 1;
			if(vars[1]>599){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>199){
				d = 0;
			}else if(vars[1]>99){
				d = 5;
			}else if(vars[1]>39){
				d = 7;
			}else d=15;
		} else {
			b = 0.5;			
			if(vars[1]>1199){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>399){
				d = 0;
			}else if(vars[1]>199){
				d = 5;
			}else if(vars[1]>79){
				d = 7;
			}else d=15;
		}

		e = (parseInt('<?=$get_service['price'];?>') + 10 + d)*b;

		//$('span#result_bucklets]').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
			$('span#result_bucklets').parent().text('Обратитесь для расчета в офис');
			$('span#result_bucklets_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_bucklets').text(e.toFixed(1));
			$('span#result_bucklets_full').text((e.toFixed(1)*vars[1]).toFixed(1));
		}
	}
	function calc_business_cards() {
		var vars = [
		parseInt($('select[name=business_cards_type]').val()),
		parseInt($('input[name=business_cards_sides]:checked').val()),
		parseInt($('input[name=business_cards_count]').val())
		];
		console.log(vars);
		var a,d,e;

		if(vars[2]>1999){
			d = -5;
		}else if (vars[2]>999){
			d = 0;  // 1000-1999
		}else if (vars[2]>499){
			d = 12;  // 500-999
		}else if (vars[2]>199){
			d = 19;  //200-499
		}else if (vars[2]>95){
			d = 24;  //100-199
		}else d = 60; //1-99
		
		switch(vars[0]){
			case 1:
				a = 0;
				break;
			case 2:
				a = 20;
				break;
			case 3:
				a = 70;
				break;
			case 4:
				a = 100;
				break;
		}

		e = (parseInt('<?=$get_service['price'];?>') + a + d)/24*(vars[1]==1 ? vars[1] : 1.7);

		//$('span#result_business_cards]').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		if (isNaN(e)){
			$('span#result_business_cards').parent().text('Обратитесь для расчета в офис');
			$('span#result_business_cards_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_business_cards').text(e.toFixed(1));
			$('span#result_business_cards_full').text((e.toFixed(1)*vars[2]).toFixed(1));
		}
	}
	function calc_calendars() {
		var vars = [
		parseInt($('select[name=calendars_type]').val()),
		parseInt($('input[name=calendars_count]').val())
		];
		//console.log(vars);
		var a='',d,e;


		if (vars[0]==1){  //КАРМАННЫЙ
			if(vars[1]>1999){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>999){
				d = 0;
			}else if (vars[1]>499){
				d = 16;
			}else if (vars[1]>299){
				d = 24;
			}else if (vars[1]>99){
				d = 32;
			}else if(vars[1]>49){
				d = 64;
			}else if(vars[1]>9){
				d = 144;
			}else a='Слишком маленький тираж';
		} else if(vars[0]==2){					
			if(vars[1]>1999){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>999){
				d = -14;
			}else if (vars[1]>499){
				d = 0;
			}else if (vars[1]>299){
				d = 4;
			}else if (vars[1]>99){
				d = 10;
			}else if(vars[1]>49){
				d = 14;
			}else if(vars[1]>9){
				d = 20;
			}else d = 30;
		} else if(vars[0]==3){					
			if(vars[1]>1999){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>999){
				d = -4;
			}else if (vars[1]>499){
				d = 0;
			}else if (vars[1]>299){
				d = 4;
			}else if (vars[1]>99){
				d = 10;
			}else if(vars[1]>49){
				d = 14;
			}else if(vars[1]>9){
				d = 20;
			}else d = 30;
		} else if(vars[0]==4){					
			if (vars[1]>499){
				
			}else if (vars[1]>299){
				d = 4;
			}else if (vars[1]>99){
				d = 10;
			}else if(vars[1]>49){
				d = 14;
			}else if(vars[1]>9){
				d = 64;
			}else d = 104;
		} else if(vars[0]==5 || vars[0]==6){					
			if(vars[1]>1999){
				//alert('Обратитесь для расчета в офис!');
			}else if (vars[1]>999){
				d = 0;
			}else if (vars[1]>499){
				d = 10;
			}else if (vars[1]>299){
				d = 30;
			}else if (vars[1]>99){
				d = 50;
			}else if(vars[1]>49){
				d = 60;
			}else if(vars[1]>9){
				d = 70;
			}else d = 90;
		}

		switch(vars[0]){
			case 1:
				e = (parseInt('<?=$get_service['price'];?>') * 2 + 15 + 30 + 13 + d)/16;
				break;
			case 2:
				e = (parseInt('<?=$get_service['price'];?>') + 20+ d)/2;
				break;
			case 3:
				e = (parseInt('<?=$get_service['price'];?>') + 20 + d)/4;
				break;
			case 4:
				e = (parseInt('<?=$get_service['price'];?>') + 20 + d)/2+(parseInt('<?=$get_service['price'];?>') + 15)*2+15;
				break;
			case 5:
				e = (parseInt('<?=$get_service['price'];?>') +20)/2+50+40+d;
				break;
			case 6:
				e = (parseInt('<?=$get_service['price'];?>') +20)*2+50+30+d;
				break;
		}		

		if (a==''){
			if (isNaN(e)){
				$('span#result_calendars').parent().text('Обратитесь для расчета в офис');
				$('span#result_calendars_full').parent().text('Обратитесь для расчета в офис');
			} else {
				$('span#result_calendars').text(e.toFixed(1));
				$('span#result_calendars_full').text((e.toFixed(1)*vars[1]).toFixed(1));
			}
			//$('span#result_calendars]').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
		} else {
			$('span#result_calendars]').text(a);
			$('span#result_calendars_full]').text(a);
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

		e = (parseInt('<?=$get_service['price'];?>') * 2 + 20 + 75)/16+d+a+b;
		
		if (isNaN(e)){
			$('span#result_discount_cards').parent().text('Обратитесь для расчета в офис');
			$('span#result_discount_cards_full').parent().text('Обратитесь для расчета в офис');
		}else{
			$('span#result_discount_cards').text(e.toFixed(1));	
			$('span#result_discount_cards_full').text((e*vars[0]).toFixed(1));	
		}
	}
	function calc_notebooks() {
		var vars = [		
		parseInt($('select[name=notebooks_type]').val()),
		parseInt($('input[name=notebooks_pages]').val()),
		parseInt($('input[name=notebooks_count]').val())
		];
		
		var b,d,e;

		if(vars[0]!=5){
			if (vars[2]>2999){
				
			}else if (vars[2]>999){
				d = 0;
			}else if (vars[2]>499){
				d = 3;
			}else if (vars[2]>299){
				d = 5;
			}else if(vars[2]>99){
				d = 10;
			}else if(vars[2]>49){
				d = 15;
			}else d = 25;
		}else{
			if (vars[2]>2999){
				
			}else if (vars[2]>999){
				d = 0;
			}else if (vars[2]>499){
				d = 3;
			}else if (vars[2]>299){
				d = 5;
			}else if(vars[2]>99){
				d = 7;
			}else if(vars[2]>49){
				d = 10;
			}else d = 15;
		}


		switch(vars[0]){
			case 1:
				e = (parseInt('<?=$get_service['price'];?>') + 20) / 4 + 15 / 4 + vars[1] * 1 + 15 + d;
				break;
			case 2:
				e = (parseInt('<?=$get_service['price'];?>') + 20) / 4 + 15 / 4 + vars[1] * 3 + 15 + d;
				break;
			case 3:
				e = (parseInt('<?=$get_service['price'];?>') + 20) / 8 + 15 / 8 + vars[1] * 0,5 + 15 + d;
				break;
			case 4:
				e = (parseInt('<?=$get_service['price'];?>') + 20) / 8 + 15 / 8 + vars[1] * 1,8 + 15 + d;
				break;
			case 5:
				e = (parseInt('<?=$get_service['price'];?>') + 20) / 4 + vars[1] * 0,3 + 5 + d;
				break;
		}		
		
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));

		if (isNaN(e)){
			$('span#result_notebooks').parent().text('Обратитесь для расчета в офис');
			$('span#result_notebooks_full').parent().text('Обратитесь для расчета в офис');
		}else{
			$('span#result_notebooks').text(e.toFixed(1));	
			$('span#result_notebooks_full').text((e*vars[2]).toFixed(1));	
		}
	}
	function calc_postcards() {
		var vars = [		
			parseInt($('select[name=postcards_type]').val()),
			parseInt($('input[name=postcards_count]').val())
			];
		
		var a,d,e;

		if (vars[1]>1999){
				
			}else if (vars[1]>999){
				d = -7.5;
			}else if (vars[1]>499){
				d = -3.5;
			}else if(vars[1]>299){
				d = 0;
			}else if(vars[1]>99){
				d = 2;
			}else d = 9;

		switch(vars[0]){
			case 1:
				a = 8;
				break;
			case 2:
			case 3:
				a = 5;
				break;
		}

		e = (parseInt('<?=$get_service['price'];?>') - 15 + a + d);

		if (isNaN(e)){
			$('span#result_postcards').parent().text('Обратитесь для расчета в офис');
			$('span#result_postcards_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_postcards').text(e.toFixed(1));
			$('span#result_postcards_full').text((e.toFixed(1)*vars[1]).toFixed(1));
		}
		//console.log('1');
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
	}
	function calc_holiday_cards() {
		var vars = [		
			parseInt($('select[name=holiday_cards_type]').val()),
			parseInt($('select[name=holiday_cards_paper_type]').val()),
			parseInt($('input[name=holiday_cards_sides]:checked').val()),
			parseInt($('input[name=holiday_cards_count]').val())
			];
		
		var a,d,c,b,e;
		
		/*
		if (vars[0] == 1 || vars[0] == 4){
			if (vars[2]>1999){

				}else if (vars[2]>999){
					d = 0;
				}else if (vars[2]>499){
					d = 5;
				}else if (vars[2]>299){
					d = 10;
				}else if (vars[2]>99){
					d = 15;
				}else if (vars[2]>29){
					d = 20;
				}else d = 30;			
		}else if (vars[0] == 2 || vars[0] == 3) {
			if (vars[2]>1999){

				}else if (vars[2]>999){
					d = -5;
				}else if (vars[2]>499){
					d = 0;
				}else if (vars[2]>299){
					d = 10;
				}else if (vars[2]>99){
					d = 15;
				}else if (vars[2]>29){
					d = 20;
				}else d = 30;	

		}
		*/

		switch(vars[0]){
			case 1:
				a = 1/6;
				break;
			case 2:
				a = 1/2;
				break;
			case 3:
				a = 1/3;
				break;
			case 4:
				a = 1/4;				
				break;
		}
		
		if(vars[3]*a>1999){
			//alert('Обратитесь для расчета в офис!');
		}else if (vars[3]*a>999){
			d = -12;
		}else if (vars[3]*a>499){
			d = -9;
		}else if (vars[3]*a>299){
			d = -4;
		}else if (vars[3]*a>99){
			d = 0;
		}else if (vars[3]*a>49){
			d = 6;
		}else if (vars[3]*a>19){
			d = 12;
		}else d=18;	

		switch(vars[1]){
			case 1:
				b = 20;
				break;
			case 2:
				b = 70;
				break;
			case 3:
				b = 100;
				break;
		}

		if (vars[3]*a<300){
			c = vars[2];
		}else{
			(vars[2] == 1) ? c = 1 : c = 1.7;
		}

		if (vars[3]*a<300){
			e = (parseInt('<?=$get_service['price'];?>') + b + d) * a * c + 2;			
		}else{
			e = (parseInt('<?=$get_service['price'];?>') + b + d) * a * c;
		}

		//console.log(a + ' ' + b + ' ' + c + ' ' + d + ' ' + e);

		if (isNaN(e)){
			$('span#result_holiday_cards').parent().text('Обратитесь для расчета в офис');
			$('span#result_holiday_cards_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_holiday_cards').text(e.toFixed(1));
			$('span#result_holiday_cards_full').text((e.toFixed(1)*vars[3]).toFixed(1));
		}
		//console.log('1');
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
	}
	function calc_folders() {

		var vars = [		
			parseInt($('input[name=folders_count]').val())
			];
		
		var a,d,e;
        a=20;

		<?$get_goods = get_goods(1020);?>
		<?$get_goods = get_goods(1020);?>

		a = <?=$get_goods['price_4']?>;


		if (vars[0]>1999){

			}else if (vars[0]>999){
				d = 35.5;
			}else if (vars[0]>499){
				d = 45;
			}else if (vars[0]>299){
				d = 0;
			}else if (vars[0]>99){
				d = 5;
			}else if (vars[0]>29){
				d = 15;
			}else d = 25;		

		e = (parseInt('<?=$get_service['price'];?>') + 20 + 8 + a + d);

		if (isNaN(e)){
			$('span#result_folders').parent().text('Обратитесь для расчета в офис');
			$('span#result_folders_full').parent().text('Обратитесь для расчета в офис');
		} else {
			if (d == 45 || d == 35.5){
				$('span#result_folders').text(d.toFixed(1));
				$('span#result_folders_full').text((d*vars[0]).toFixed(1));				
			}else{
				$('span#result_folders').text(e.toFixed(1));
				$('span#result_folders_full').text((e.toFixed(1)*vars[0]).toFixed(1));				
			}
		}
		//console.log('1');
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
	}
	function calc_bw_print() {

		var vars = [		
			parseInt($('select[name=bw_print_paper_type]').val()),
			parseInt($('input[name=bw_print_sides]:checked').val()),
			parseInt($('input[name=bw_print_count]').val())
			];
		
		var a,b,d,e;

		switch(vars[0]){
			case 1:
				a = 2;
				break;
			case 2:
				a = 8;
				break;
		}

		switch(vars[1]){
			case 1:
				b = 1;
				break;
			case 2:
				b = 1.7;
				break;
		}

		if (vars[2]>4999){

			}else if (vars[2]>2999){
				d = 0;
			}else if (vars[2]>999){
				d = 0.1;
			}else if (vars[2]>499){
				d = 1;
			}else if (vars[2]>199){
				d = 2;
			}else if (vars[2]>99){
				d = 3;
			}else d = 5;

		e = (parseInt('<?=$get_service['price'];?>') / 20 + a + d) * b;

		//console.log(e + ' ' + a  + ' ' + b + ' ' + d);

		if (isNaN(e)){
			$('span#result_bw_print').parent().text('Обратитесь для расчета в офис');
			$('span#result_bw_print_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_bw_print').text(e.toFixed(1));
			$('span#result_bw_print_full').text((e.toFixed(1)*vars[2]));
		}
		//console.log('1');
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
	}
	function calc_catabrosmags() {

		var vars = [		
			parseInt($('select[name=catabrosmags_type]').val()),
			parseInt($('select[name=catabrosmags_cover]').val()),
			parseInt($('select[name=catabrosmags_pages]').val()),
			parseInt($('input[name=catabrosmags_pages_count]').val()),
			parseInt($('input[name=catabrosmags_count]').val())
			];
		
		var a,b,c,d,e,f;

		switch(vars[0]){
			case 1:
				a = 1;
				break;
			case 2:
				a = 2;
				break;
			case 3:
				a = 4;
				break;
		}

		switch(vars[1]){
			case 1:
				b = parseInt('<?=$get_service['price'];?>') + 9;
				break;
			case 2:
				b = 15;
				break;
		}

		switch(vars[2]){
			case 1:
				c = 6;
				break;
			case 2:
				c = (parseInt('<?=$get_service['price'];?>') - 11 + 4) / 2;
				break;
			case 3:
				c = (parseInt('<?=$get_service['price'];?>') + 5 ) / 2;
				break;
		}

		f = vars[3];

		if (vars[4]>1999){

			}else if (vars[4]>999){
				d = -16;
			}else if (vars[4]>499){
				d = -10;
			}else if (vars[4]>299){
				d = 0;
			}else if (vars[4]>99){
				d = 10;
			}else if (vars[4]>29){
				d = 15;
			}else d = 20;	

		(f > 40 ) ? e = ((b + f * c) * 1.2 + d) / a + 15 : e = ((b + f * c) * 1.2 + d) / a;
		
		if (isNaN(e)){
			$('span#result_catabrosmags').parent().text('Обратитесь для расчета в офис');
			$('span#result_catabrosmags_full').parent().text('Обратитесь для расчета в офис');
		} else {
			$('span#result_catabrosmags').text(e.toFixed(1));
			$('span#result_catabrosmags_full').text((e.toFixed(1)*vars[4]).toFixed(1));
		}
		//console.log('1');
		//$('span#result_notebooks').text(isNaN(e) ? 'Обратитесь для расчета в офис' : e.toFixed(1));
	}
	function reset_form_print_fullcolor_a3() {
		$('form#print_fullcolor_a3_form')[0].reset();
	}
	function reset_form_bucklets() {
		$('form#bucklets_form')[0].reset();
	}
	function reset_form_business_cards() {
		$('form#business_cards_form')[0].reset();
	}
	function reset_form_calendars() {
		$('form#calendars_form')[0].reset();
	}
	function reset_form_discount_cards() {
		$('form#discount_cards_form')[0].reset();
	}	
	function reset_form_notebooks() {
		$('form#notebooks_form')[0].reset();
	}	
	function reset_form_postcards() {
		$('form#postcards_form')[0].reset();
	}	
	function reset_form_holiday_cards() {
		$('form#holiday_cards_form')[0].reset();
	}	
	function reset_form_folders() {
		$('form#folders_form')[0].reset();
	}	
	function reset_form_bw_print() {
		$('form#bw_print_form')[0].reset();
	}	
	function reset_form_catabrosmags() {
		$('form#catabrosmags_form')[0].reset();
	}
</script>
<div class="serv-section" id="print_fullcolor_a3">
	<div class="arrow_before"></div>	       
    <h2>Полноцветная печать</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Цветная печать на бумаге тиражами до 2000 листов А3: плакаты, листовки, флаеры, афиши и т.д.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="print_fullcolor_a3_form">
	    		<div class="calc_row">
		    		<span class="calc_label">Формат:</span>
		    		<select name="print_fullcolor_a3_format">
		    			<option value="0">А3 (297мм × 420мм)</option>
		    			<option value="1">А4 (210мм х 297мм)</option>
		    			<option value="2">А5 (148мм × 210мм)</option>
		    			<option value="3">А6 (105мм × 148мм)</option>
		    			<option value="4">Евро (210мм х 99мм)</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Толщина бумаги:</span>
		    		<select name="print_fullcolor_a3_thickness">
		    			<option value="0">80-90 г/м2</option>
		    			<option value="1">105-200 г/м2</option>
		    			<option value="2">250-300 г/м2</option>
		    			<option value="3">Самоклейка</option>
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонняя</span><input type="radio" checked value="0" name="print_fullcolor_a3_sides">
		    		<span class="calc_label">Двусторонняя</span><input type="radio" value="1" name="print_fullcolor_a3_sides">				    		
		    	</div>
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
	    <p class="serv_tip">Возможна печать на дизайнерских и текстурных бумагах, кальке и прозрачной самоклейке. Стоимость уточняйте у менеджеров.</p>
	    <p class="serv_tip">При расчете тиражей от 300 л. А3 (600 л. А4, 1200 л. А5, 2400 л. А6, 1800 л. Евро) цены на сайте указаны ознакомительные, реальная цена может отличаться ±15%. Обращайтесь в офис для уточнения цен.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="bucklets">
	<div class="arrow_before"></div>
	<h2>Буклеты</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Формат А4, бумага 150 г/м2, печать двухсторонняя полноцветная, два сгиба.</p>
	    	</div>
	    </div>      
	    <form method="POST" class="serv_calc_form form-horizontal" action="" id="bucklets_form">
    		<div class="calc_row">
	    		<span class="calc_label">Формат:</span>
	    		<select name="bucklets_format">			    			
	    			<option value="1">А4 (210мм х 297мм)</option>
	    			<option value="2">А5 (148мм × 210мм)</option>			    			
	    		</select>
	    	</div>		    		
    		<div class="calc_row">
	    		<span class="calc_label">Тираж: </span><input type="text" name="bucklets_count">		    		
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Стоимость за единицу: <span class="calc_result" id="result_bucklets">0</span> руб.</strong>
		    		<button class="calc_button" type="submit" onclick="calc_bucklets();">Рассчитать</button>
	    		</div>
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<button class="calc_button" type="button" onclick="reset_form_bucklets();">Очистить форму</button>
		    		<strong>Общая стоимость: <span class="calc_result" id="result_bucklets_full">0</span> руб.</strong>
	    		</div>
	    	</div>
	    </form> 
	    <p class="serv_tip">При заказе буклетов формата А4 тиражом свыше 600 (А5 свыше 1200) меняется метод печати, что позволяет существенно снизить стоимость за единицу. Подробности уточняйте у менеджеров.</p>	
	</div>
</div>
<hr>
<div class="serv-section" id="business_cards">
	<div class="arrow_before"></div>
	<h2>Визитки</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Визитная карточка 90х50мм, бумага плотностью 300 г/м2.</p>
	    	</div>
	    </div>      
	    <form method="POST" class="serv_calc_form form-horizontal" action="" id="business_cards_form">
    		<div class="calc_row">
	    		<span class="calc_label">Материал:</span>
	    		<select name="business_cards_type">			    			
	    			<option value="1">Бумага мелованная, ч\б печать</option>
	    			<option value="2">Бумага мелованная, цветная печать</option>
	    			<option value="3">Бумага Лён и пр., цветная печать</option>
	    			<option value="4">Бумага Маджестик и пр., цветная печать</option>			    			
	    		</select>
	    	</div>	    	
    		<div class="calc_row">
	    		<span class="calc_label">Односторонняя</span><input type="radio" checked value="1" name="business_cards_sides">
	    		<span class="calc_label">Двусторонняя</span><input type="radio" value="2" name="business_cards_sides">		    		
	    	</div>    		
    		<div class="calc_row">
	    		<span class="calc_label">Тираж: </span><input type="text" name="business_cards_count">		    		
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Стоимость за единицу: <span class="calc_result" id="result_business_cards">0</span> руб.</strong> 
		    		<button class="calc_button" type="submit" onclick="calc_business_cards();">Рассчитать</button>
		    	</div>
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Общая стоимость: <span class="calc_result" id="result_business_cards_full">0</span> руб.</strong> 
		    		<button class="calc_button" type="button" onclick="reset_form_business_cards();">Очистить форму</button>
		    	</div>
	    	</div>
	    </form> 
	    <p class="serv_tip">Визитки с рамкой рассчитываются с коэффициентом 1,5.</p>
	</div>	
</div>
<hr>
<div class="serv-section" id="calendars">
	<div class="arrow_before"></div>
	<h2>Календари</h2>
    <div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc"></p>
	    	</div>
	    </div>      
	    <form method="POST" class="serv_calc_form form-horizontal" action="" id="calendars_form">
    		<div class="calc_row">
	    		<span class="calc_label">Тип календаря:</span>
	    		<select name="calendars_type">			    			
	    			<option value="1">Карманный</option>
	    			<option value="2">Шалаш (домик) А4</option>			    			
	    			<option value="3">Шалаш (домик) А5</option>			    			
	    			<option value="4">Шалаш (домик) А4 перекидной</option>			    			
	    			<option value="5">Квартальный только с верхним полем</option>			    		
	    			<option value="6">Квартальный с 4 полями</option>			    			
	    		</select>
	    	</div>		    		
    		<div class="calc_row">
	    		<span class="calc_label">Тираж: </span><input type="text" name="calendars_count">		    		
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Стоимость за единицу: <span class="calc_result" id="result_calendars">0</span> руб.</strong>
		    		<button class="calc_button" type="submit" onclick="calc_calendars();">Рассчитать</button>
	    		</div>
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Общая стоимость: <span class="calc_result" id="result_calendars_full">0</span> руб.</strong>
		    		<button class="calc_button" type="button" onclick="reset_form_calendars();">Очистить форму</button>
		    	</div>
	    	</div>
	    </form> 
	    <p class="serv_tip">Возможно изготовление нестандартных календарей, подробности по телефону <a href="tel:83472432654">+7 (347) 243-26-54</a></p>
	    <p class="serv_tip">Карманный календарь - 100х70 мм, бумага мелованная 300 г/м2, ламинация 25-30 мкн, углы скругленные.</p>
	    <p class="serv_tip">Квартальный календарь - календарные сетки 3 шт 297х145 мм, бумага 80 г/м2, печать цветная. Верхнее и разделительные поля - 297х210 мм, бумага мелованная 300 г/м2, печать полноцветная. Календарные сетки можно выбрать из стандартных имеющихся в наличии в офисе или у поставщиков, использование нестандартных календарных сеток ведет к удорожанию календаря.</p>
	    <p class="serv_tip">Календарь-шалаш в развернутом виде 297х210 мм, бумага мелованная 300 г/м2, печать полноцветная, 3 сгиба, двухсторонний скотч по краю для сборки.</p>
	    <p class="serv_tip">Календарь-шалаш перекидной: размер одной стороны 210х115 мм, бумага мелованная 300 г/м2, печать полноцветная, перекидные страницы 210х97 мм, бумага глянцевая 130 г/м2, 3 сгиба, сборка на металлическую пружину.</p>
	</div>	
</div>
<hr>
<div class="serv-section" id="discount_cards">
	<div class="arrow_before"></div>
	<h2>Дисконтные карты</h2>
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
<div class="serv-section" id="notebooks">
	<div class="arrow_before"></div>
	<h2>Блокноты</h2>
	<div class="serv_content">
		 <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Обложка с полноцветной печатью, бумага 300 г/м2, подложка - белая бумага 300 г/м2, страницы 80 г/м2, сборка на металлическую пружину (кроме А7).</p>
	    	</div>
	    </div>      
	    <form method="POST" class="serv_calc_form form-horizontal" action="" id="notebooks_form">
    		<div class="calc_row">
	    		<span class="calc_label">Формат:</span>
	    		<select name="notebooks_type">			    			
	    			<option value="1">А5, листы 0+0</option>			    			
	    			<option value="2">А5, листы 1+0</option>			    			
	    			<option value="3">А6, листы 0+0</option>			    			
	    			<option value="4">А6, листы 1+0</option>			    			
	    			<option value="5">А7, листы 0+0</option>			    			
	    		</select>
	    	</div>  		
    		<div class="calc_row">
	    		<span class="calc_label">Количество страниц: </span><input type="text" name="notebooks_pages">		    		
	    	</div>  		
    		<div class="calc_row">
	    		<span class="calc_label">Тираж: </span><input type="text" name="notebooks_count">		    		
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Стоимость за единицу: <span class="calc_result" id="result_notebooks">0</span> руб.</strong> 
		    		<button class="calc_button" type="submit" onclick="calc_notebooks();">Рассчитать</button>
		    	</div>
	    	</div>
	    	<div class="calc_row">
	    		<div class="calc_result_row">
		    		<strong>Общая стоимость: <span class="calc_result" id="result_notebooks_full">0</span> руб.</strong> 
		    		<button class="calc_button" type="button" onclick="reset_form_notebooks();">Очистить форму</button>
		    	</div>
	    	</div>
	    </form> 
	    <p class="serv_tip">Цветность 1+0 в выборе формата блокнотов означает возможность печати изображения в 1 цвет на каждой странице.</p>
	    <p class="serv_tip">Цветность 0+0 означает белые листы без печати.</p>
	    <p class="serv_tip">Блокнот формата А7 собирается на скрепку, количество страниц более 25 шт. не рекомендуется.</p>
	    <p class="serv_tip">Оптимальное количество страниц для блокнотов А6 и А5 - 30 шт.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="postcards">
	<div class="arrow_before"></div>
	<h2>Конверты</h2>
	<div class="serv_content">
        <div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Конверты белые без окна с полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="postcards_form">		    		
	    		<div class="calc_row">
		    		<span class="calc_label">Вид конверта:</span>
		    		<select name="postcards_type">			    			
		    			<option value="1">C4 (324x229 мм)</option>			    			
		    			<option value="2">C5 (229х162 мм)</option>			    			
		    			<option value="3">E65 (220х110 мм)</option>			    			
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span><input type="text" name="postcards_count">		    		
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_postcards">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_postcards();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_postcards_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_postcards();">Очистить форму</button>
	    			</div>
	    	</div>
		    	<p class="serv_tip">Возможна печать на конвертах с окном (при тираже от 500 шт.). Стоимость конверта увеличивается на 80 коп.</p>
	    	</form>		    	
	    </div>
	</div>        	
</div>
<hr>
<div class="serv-section" id="holiday_cards">
	<div class="arrow_before"></div>
	<h2>Открытки, приглашения</h2>
	<div class="serv_content">
		<div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Открытка (приглашение) на бумаге 300 г/м2 с двухсторонней полноцветной печатью.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="holiday_cards_form">	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Вид открытки:</span>
		    		<select name="holiday_cards_type">			    			
		    			<option value="1">Евро, без сгиба (200х100 мм)</option>	    			
		    			<option value="2">Евро, со сгибом (200х200 мм)</option>	    			
		    			<option value="3">Евро, со сгибом (400х100 мм)</option>	    			
		    			<option value="4">А6, со сгибом (210х150 мм)</option>	    			
		    		</select>
		    	</div>		    		
	    		<div class="calc_row">
		    		<span class="calc_label">Бумага:</span>
		    		<select name="holiday_cards_paper_type">			    			
		    			<option value="1">Мелованная</option>			    			
		    			<option value="2">Лён</option>			    			
		    			<option value="3">Маджестик</option>			    			
		    		</select>
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонняя</span><input type="radio" checked value="1" name="holiday_cards_sides">
		    		<span class="calc_label">Двусторонняя</span><input type="radio" value="2" name="holiday_cards_sides">				    		
		    	</div>
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span>
		    		<input type="text" name="holiday_cards_count"/>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_holiday_cards">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_holiday_cards();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_holiday_cards_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_holiday_cards();">Очистить форму</button>
	    			</div>
	    	</div>
		    	<p class="serv_tip">Размер открытки указан в развернутом виде.</p>
		    	<p class="serv_tip">Открытки могут быть дополнены калькой, высечкой и т.д. Варианты украшений уточняйте у менеджера.</p>
		    	<p class="serv_tip">Наличие рамки в макете удорожает печать. Рассчет ведется индивидуально.</p>
	    	</form>		    	
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="folders">
	<div class="arrow_before"></div>
	<h2>Папки</h2>
	<div class="serv_content">
		<div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Папка бумажная (300 г/м2) А4 формата, полноцветная печать с одной стороны, внутри имеется карман глубиной 5 мм с прорезью для визитки. При тираже до 500 шт - карман приклеен, при больших тиражах - карман вырублен вместе с папкой).</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="folders_form">	   		
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span>
		    		<input type="text" name="folders_count"/>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_folders">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_folders();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_folders_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_folders();">Очистить форму</button>
	    			</div>
	    		</div>
	    	</form>		    	
	    </div>
		<p class="serv_tip">Возможно изготовление папок нестандартного формата, расчет индивидуальный. Подробности уточняйте у менеджера.</p>
	</div>
</div>
<hr>
<div class="serv-section" id="bw_print">
	<div class="arrow_before"></div>
	<h2>Черно-белое тиражирование</h2>
	<div class="serv_content">
		<div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Черно-белое тиражирование на ризографе на бумаге 80 г/м2, формат А4</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="bw_print_form">	   		
	    		<div class="calc_row">
		    		<span class="calc_label">Бумага:</span>
		    		<select name="bw_print_paper_type">			    			
		    			<option value="1">Белая</option>
		    			<option value="2">Цветная</option>
		    		</select>
		    	</div>				    	
	    		<div class="calc_row">
		    		<span class="calc_label">Односторонняя</span><input type="radio" checked value="1" name="bw_print_sides">
		    		<span class="calc_label">Двусторонняя</span><input type="radio" value="2" name="bw_print_sides">
		    		
		    	</div>	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span>
		    		<input type="text" name="bw_print_count"/>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_bw_print">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_bw_print();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_bw_print_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_bw_print();">Очистить форму</button>
	    			</div>
	    		</div>
		    	<p class="serv_tip"></p>
	    	</form>		    	
	    </div>
	</div>
</div>
<hr>
<div class="serv-section" id="catabrosmags">
	<div class="arrow_before"></div>
	<h2>Каталоги, брошюры, журналы</h2>
	<div class="serv_content">
		<div class="serv_preview">
        	<div>
	        	<p class="serv_desc">Компания Аверс-стиль предлагает Вам услуги печати каталогов, брошюр и журналов в Уфе.</p>
	    	</div>
	    </div>
	    <div class="serv_calc">
	    	<form method="POST" class="serv_calc_form form-horizontal" action="" id="catabrosmags_form">	   		
	    		<div class="calc_row">
		    		<span class="calc_label">Формат:</span>
		    		<select name="catabrosmags_type">			    			
		    			<option value="1">А4</option>
		    			<option value="2">А5</option>
		    			<option value="3">А6</option>
		    		</select>
		    	</div>			   		
	    		<div class="calc_row">
		    		<span class="calc_label">Обложка:</span>
		    		<select name="catabrosmags_cover">			    			
		    			<option value="1">Полноцветная</option>
		    			<option value="2">Ч/Б на цветной бумаге</option>
		    		</select>
		    	</div>				   		
	    		<div class="calc_row">
		    		<span class="calc_label">Страницы:</span>
		    		<select name="catabrosmags_pages">			    			
		    			<option value="1">Снегурочка, Ч/Б</option>
		    			<option value="2">Глянец, Ч/Б</option>
		    			<option value="3">Глянец, полноцветные</option>
		    		</select>
		    	</div>	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Количество страниц: </span>
		    		<input type="text" name="catabrosmags_pages_count"/>
		    	</div>	    		
	    		<div class="calc_row">
		    		<span class="calc_label">Тираж: </span>
		    		<input type="text" name="catabrosmags_count"/>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Стоимость печати на одном изделии: <span class="calc_result" id="result_catabrosmags">0</span> руб.</strong> 
			    		<button class="calc_button" type="submit" onclick="calc_catabrosmags();">Рассчитать</button>
			    	</div>
		    	</div>
		    	<div class="calc_row">
		    		<div class="calc_result_row">
			    		<strong>Полная стоимость печати: <span class="calc_result" id="result_catabrosmags_full">0</span> руб.</strong> 
			    		<button class="calc_button" type="button" onclick="reset_form_catabrosmags();">Очистить форму</button>
	    			</div>
	    	</div>
		    	<p class="serv_tip">Размер брошюры указан в сложенном виде.</p>
		    	<p class="serv_tip">Количество страниц если их меньше 40, должно быть кратно 4, если больше - кратно 2. При расчете с неверным количеством страниц результат может быть неверным.</p>
		    	<p class="serv_tip">При расчете готового изделия по умолчанию заданы следующие параметры:
		    		<ul id="catabrosmags_tip" style="font-style: italic;">
			    		<li>Обложка - бумага мелованная, 300 г/м2, 4+0 или 1+0;</li>
			    		<li>Cтраницы - бумага Снегурочка (Ч/Б цифровая печать) или мелованная глянцевая 115 г/м2 (Ч/Б цифровая печать) или мелованная глянцевая 130 г/м2 (цветная цифровая печать);</li>
			    	</ul>
			    </p>
	    		<p class="serv_tip">Брошюры, отличные от этих параметров (например, страницы напечатаны на ризографе или обложка заламинирована и т.д.), рассчитываются индивидуально. Стоимость может снизиться или возрасти;</p>
	    		<p class="serv_tip">При объеме брошюры до 40 страниц предусмотрена сборка на 2 скрепки, при большем количестве страниц - на металлическую пружину.</p>
	    	</form>		    	
	    </div>
	</div>
</div>
<hr>