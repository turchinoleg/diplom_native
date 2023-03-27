<script type="text/javascript">
    function calc_color_termoprint() {
        var vars = [
            parseInt($('select[name=color_termoprint_type]').val()),
            parseInt($('input[name=color_termoprint_count]').val())
        ];

        var a, b, c, d, e;
        //console.log(vars+"\r\n");
        if (vars[1] > 299) {

        } else if (vars[1] > 199) {
            d = -30;
        } else if (vars[1] > 99) {
            d = -20;
        } else if (vars[1] > 49) {
            d = 0;
        } else if (vars[1] > 9) {
            d = 10;
        } else d = 20;


        switch (vars[0]) {
            case 1:
                e = parseInt('<?=$get_service["textileprint_price_1"]?>') + d;
                break;
            case 2:
                e = parseInt('<?=$get_service["textileprint_price_1"]?>') + d + 40;
                break;
            case 3:
                e = (parseInt('<?=$get_service["textileprint_price_1"]?>') + d) / 4 + 15;
                break;
        }
        //console.log(e + ' ' + d + ' ' + parseInt('<?=$get_service["textileprint_price_1"]?>'));

        if (isNaN(e)) {
            $('span#result_color_termoprint').parent().text('Обратитесь для расчета в офис!');
            $('span#result_color_termoprint_full').parent().text('Обратитесь для расчета в офис!');
        } else {
            $('span#result_color_termoprint').text(e.toFixed(2));
            $('span#result_color_termoprint_full').text((e.toFixed(2) * vars[1]).toFixed(2));
        }
    }

    function calc_onecolor_termoprint() {
        var vars = [
            parseInt($('select[name=onecolor_termoprint_type]').val()),
            parseInt($('select[name=onecolor_termoprint_color_count]').val()),
            parseInt($('input[name=onecolor_termoprint_a]').val()),
            parseInt($('input[name=onecolor_termoprint_b]').val()),
            parseInt($('input[name=onecolor_termoprint_count]').val())
        ];

        var a, b, c, d, e;

        if (vars[4] > 199) {

        } else if (vars[4] > 99) {
            d = -0.05;
        } else if (vars[4] > 49) {
            d = 0;
        } else if (vars[4] > 9) {
            d = 0.1;
        } else d = 0.15;

        b = vars[2];
        c = vars[3];


        switch (vars[0]) {
            case 1:
                e = b * c * (parseFloat('<?=$get_service["textileprint_price_2"]?>') + d) * vars[1];
                break;
            case 2:
                e = b * c * (parseFloat('<?=$get_service["textileprint_price_2"]?>') + d + 0.2) * vars[1];
                break;
        }

        //console.log('e = '+e+"\r\n" + 'baza2 = '+parseFloat('<?=$get_service["textileprint_price_2"]?>')+"\r\n"+'d = '+d+"\r\n");
        /*
		if (isNaN(e)){
			$('span#result_onecolor_termoprint').parent().text('Обратитесь для расчета в офис!');
			$('span#result_onecolor_termoprint_full').parent().text('Обратитесь для расчета в офис!');
		}else{
			$('span#result_onecolor_termoprint').text(e.toFixed(1));			
			$('span#result_onecolor_termoprint_full').text((e.toFixed(1)*vars[4]).toFixed(1));			
		}*/
        if (isNaN(e)) {
            $('#onecolor_termoprint_form .calc_row:nth-last-child(2) strong').html('Обратитесь для расчета в офис');
            $('#onecolor_termoprint_form .calc_row:nth-last-child(1) strong').html('');
        } else {
            $('#onecolor_termoprint_form .calc_row:nth-last-child(2) strong').html('Стоимость за единицу нанесения: <span class="calc_result">' + e.toFixed(1) + '</span> руб.');
            $('#onecolor_termoprint_form .calc_row:nth-last-child(1) strong').html('Полная стоимость нанесения: <span class="calc_result">' + (e * vars[4]).toFixed(1) + '</span> руб.');
        }
    }

    function calc_silk() {
        var vars = [
            parseInt($('select[name=silk_format]').val()),
            parseInt($('select[name=silk_colors_count]').val()),
            parseInt($('input[name=silk_count]').val()),
            parseInt($('select[name=silk_colors_cloth_color]').val()),
            parseInt($('select[name=silk_colors_cloth_structure]').val()),
            parseInt($('select[name=silk_colors_printing_place]').val()),
            parseInt($('select[name=silk_colors_paint_type]').val())
        ];

        let silknet = parseInt('<?=$get_service["silknet_price_1"]?>');
        let tpp4 = parseInt('<?=$get_service["textileprint_price_4"]?>');

        var a, b = '', c, d, e, tt, cs, pp, pt;

        switch (vars[0]) {
            case 1:
                a = 1;
                break;
            case 2:
                a = 0.85;
                break;
            case 3:
                a = 1.4;
                break;
        }

        switch (vars[1]) {
            case 1:
                c = 1;
                break;
            case 2:
                c = 1.8;
                break;
            case 3:
                c = 2.6;
                break;
            case 4:
                c = 3.4;
                break;
            case 5:
                c = 1.2;
                break;
        }

        switch (vars[3]) {
            case 1:
                tt = 1;
                break;
            case 2:
                tt = 1.4;
                break;
        }

        switch (vars[4]) {
            case 1:
                cs = 1;
                break;
            case 2:
                cs = 1.1;
                break;
            case 3:
                cs = 1.3;
                break;
            case 4:
                cs = 2;
                break;
        }

        switch (vars[5]) {
            case 1:
                pp = 1;
                break;
            case 2:
                pp = 1.3;
                break;
        }

        switch (vars[6]) {
            case 1:
                pt = 1;
                break;
            case 2:
                pt = 1.1;
                break;
            case 3:
                pt = 1.3;
                break;
        }

        let z = (silknet / vars[2] + tpp4 * tt * cs * pp * pt) * a * c + 10;
        let full = z * vars[2];

        $('span#result_silk').text(z.toFixed(1));
        $('span#result_silk_full').text(full.toFixed(1));

    }

    function calc_sublime() {
        var vars = [
            parseInt($('input[name=sublime_count]').val())
        ];

        var a, b = '', c, d, e;

        if (vars[0] > 499) {

        } else if (vars[0] > 299) {
            d = -30;
        } else if (vars[0] > 199) {
            d = -20;
        } else if (vars[0] > 99) {
            d = -10;
        } else if (vars[0] > 49) {
            d = 0;
        } else if (vars[0] > 9) {
            d = 20;
        } else d = 30;


        e = parseInt('<?=$get_service["promo_price_3"]?>') + d;

        if (isNaN(e)) {
            $('span#result_sublime').parent().text('Обратитесь для расчета в офис!');
            $('span#result_sublime_full').parent().text('Обратитесь для расчета в офис!');
        } else {
            $('span#result_sublime').text(e.toFixed(1));
            $('span#result_sublime_full').text((e.toFixed(1) * vars[0]).toFixed(1));
        }
    }

    function calc_baseballprint() {
        var vars = [
            parseInt($('input[name=baseballprint_count]').val())
        ];

        var a, b = '', c, d, e;

        if (vars[0] > 499) {

        } else if (vars[0] > 299) {
            d = -20;
        } else if (vars[0] > 199) {
            d = -10;
        } else if (vars[0] > 99) {
            d = -5;
        } else if (vars[0] > 49) {
            d = 0;
        } else if (vars[0] > 9) {
            d = 5;
        } else d = 10;


        e = parseInt('<?=$get_service["textileprint_price_1"]?>') / 3 + d;

        if (isNaN(e)) {
            $('span#result_baseballprint').parent().text('Обратитесь для расчета в офис!');
            $('span#result_baseballprint_full').parent().text('Обратитесь для расчета в офис!');
        } else {
            $('span#result_baseballprint').text(e.toFixed(1));
            $('span#result_baseballprint_full').text((e.toFixed(1) * vars[0]).toFixed(1));
        }
    }

    function calc_hats() {
        var vars = [
            parseInt($('select[name=hats_type]').val()),
            parseInt($('input[name=hats_count]').val())
        ];

        var a, b = '', c, d, e;

        if (vars[1] > 499) {

        } else if (vars[1] > 249) {
            d = -50;
        } else if (vars[1] > 99) {
            d = -20;
        } else if (vars[1] > 49) {
            d = 0;
        } else if (vars[1] > 9) {
            d = 50;
        } else d = 100;

        switch (vars[0]) {
            case 1:
                e = 250 + d;
                break;
            case 2:
                e = 250 + 50 + d;
                break;
        }

        if (isNaN(e)) {
            $('span#result_hats').parent().text('Обратитесь для расчета в офис!');
            $('span#result_hats_full').parent().text('Обратитесь для расчета в офис!');
        } else {
            $('span#result_hats').text(e.toFixed(1));
            $('span#result_hats_full').text((e.toFixed(1) * vars[1]).toFixed(1));
        }
    }

    function calc_bandanas() {
        var vars = [
            parseInt($('select[name=bandanas_type]').val()),
            parseInt($('input[name=bandanas_count]').val())
        ];

        var a, b = '', c, d, e;

        if (vars[1] > 399) {

        } else if (vars[1] > 249) {
            d = -50;
        } else if (vars[1] > 99) {
            d = -25;
        } else if (vars[1] > 49) {
            d = 0;
        } else if (vars[1] > 9) {
            d = 75;
        } else d = 125;

        switch (vars[0]) {
            case 1:
                e = 375 + d;
                break;
            case 2:
                e = 425 + d;
                break;
            case 3:
                e = 300 + d;
                break;
        }

        if (vars[0] == 3 && vars[1] < 50) {
            $('span#result_bandanas').parent().text('Слишком маленький тираж!');
            $('span#result_bandanas_full').parent().text('Слишком маленький тираж!');
        } else {
            if (isNaN(e)) {
                $('span#result_bandanas').parent().text('Обратитесь для расчета в офис!');
                $('span#result_bandanas_full').parent().text('Обратитесь для расчета в офис!');
            } else {
                $('span#result_bandanas').text(e.toFixed(1));
                $('span#result_bandanas_full').text((e.toFixed(1) * vars[1]).toFixed(1));
            }
        }
    }

    function reset_form_baseballprint() {
        $('form#baseballprint_form')[0].reset();
    }

    function reset_form_sublime() {
        $('form#sublime_form')[0].reset();
    }

    function reset_form_silk() {
        $('form#silk_form')[0].reset();
    }

    function reset_form_onecolor_termoprint() {
        $('form#onecolor_termoprint_form')[0].reset();
    }

    function reset_form_color_termoprint() {
        $('form#color_termoprint_form')[0].reset();
    }
</script>
<div class="serv-section" id="color_termoprint">
    <div class="arrow_before"></div>
    <h2>Полноцветный термоперенос</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Нанесение полноцветного изображения на ткань путём термопереноса.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="color_termoprint_form">
                <div class="calc_row">
                    <span class="calc_label">Вид:</span>
                    <select name="color_termoprint_type">
                        <option value="1">А4, светлая ткань</option>
                        <option value="2">А4, тёмная ткань</option>
                        <option value="3">Менее А5</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="color_termoprint_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость за единицу нанесения: <span class="calc_result"
                                                                      id="result_color_termoprint">0</span>
                            руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_color_termoprint();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость нанесения: <span class="calc_result" id="result_color_termoprint_full">0</span>
                            руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_color_termoprint();">Очистить
                            форму
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Для получения качественного изображения (переноса) ткань должна содержать не менее 50%
            хлопка.</p>
        <p class="serv_tip">Используемый текстиль должен выдерживать температуру не менее 170°C</p>
    </div>
</div>
<hr>
<div class="serv-section" id="onecolor_termoprint">
    <div class="arrow_before"></div>
    <h2>Термотрансфер одноцветными плёнками (спот).</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Нанесение векторного изображения на текстиль с помощью одноцветных термоплёнок.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="onecolor_termoprint_form">
                <div class="calc_row">
                    <span class="calc_label">Вид:</span>
                    <select name="onecolor_termoprint_type">
                        <option value="1">Обычная плёнка</option>
                        <option value="2">Световозвращающая плёнка</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Количество цветов:</span>
                    <select name="onecolor_termoprint_color_count">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Длина в сантиметрах: </span><input type="text"
                                                                                name="onecolor_termoprint_a">
                </div>
                <div class="calc_row">
                    <span class="calc_label">Ширина в сантиметрах: </span><input type="text"
                                                                                 name="onecolor_termoprint_b">
                </div>
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="onecolor_termoprint_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость за единицу нанесения: <span class="calc_result"
                                                                      id="result_onecolor_termoprint">0</span>
                            руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_onecolor_termoprint();">Рассчитать
                        </button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость нанесения: <span class="calc_result"
                                                                  id="result_onecolor_termoprint_full">0</span>
                            руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_onecolor_termoprint();">Очистить
                            форму
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Используемый текстиль должен выдерживать температуру не менее 170°C</p>
        <p class="serv_tip">Если наносимое изображение содержит большое количество мелких элементов - наценка 20-40% за
            сложность.</p>
        <p class="serv_tip">Файл с изображением, предоставляемый для нанесения должен быть векторным. При отсутствии
            соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
    </div>
</div>
<hr>
<div class="serv-section" id="silk">
    <div class="arrow_before"></div>
    <h2>Шёлкография</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Нанесение векторного изображения на текстиль краской через трафарет.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="silk_form">
                <div class="calc_row">
                    <span class="calc_label">Размер:</span>
                    <select name="silk_format">
                        <option value="1">А4 (не более 20х30 см)</option>
                        <option value="2">А5 (не более 20х15 см)</option>
                        <option value="3">А3 (не более 30х40 см)</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Количество цветов:</span>
                    <select name="silk_colors_count">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">Замена цвета</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Цвет ткани</span>
                    <select name="silk_colors_cloth_color">
                        <option value="1">Светлая</option>
                        <option value="2">Темная</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Структура ткани</span>
                    <select name="silk_colors_cloth_structure">
                        <option value="1">Хлопок</option>
                        <option value="2">Синтетика</option>
                        <option value="3">Нейлон, пропитка, ворс</option>
                        <option value="4">Ватники, резина</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Место нанесения</span>
                    <select name="silk_colors_printing_place">
                        <option value="1">Грудь, спина, крой</option>
                        <option value="2">Рукав, сложные элементы</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Краска</span>
                    <select name="silk_colors_paint_type">
                        <option value="1">Белая, цветная, лак</option>
                        <option value="2">Золото, серебро</option>
                        <option value="3">Термоподъём, блестки</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="silk_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость за единицу нанесения: <span class="calc_result" id="result_silk">0</span> руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_silk();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость нанесения: <span class="calc_result" id="result_silk_full">0</span>
                            руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_silk();">Очистить форму</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Файл с изображением, предоставляемый для нанесения должен быть векторным. При отсутствии
            соответствующего файла стоимость подготовки макета 300-1000 руб.</p>
    </div>
</div>
<hr>
<div class="serv-section" id="sublime">
    <div class="arrow_before"></div>
    <h2>Сублимация</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <p class="serv_desc">Нанесение полноцветного изображения на белую синтетическую ткань методом
                сублимации.</p>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="sublime_form">
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="sublime_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость за единицу нанесения: <span class="calc_result" id="result_sublime">0</span>
                            руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_sublime();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость нанесения: <span class="calc_result" id="result_sublime_full">0</span>
                            руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_sublime();">Очистить форму
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Стандартный формат печати - А4. При нанесении изображения формата А5 и менее -30% от
            стоимости.</p>
        <p class="serv_tip">Для получения качественного изображения (переноса) ткань должна содержать не менее 50%
            полиэстера.</p>
        <p class="serv_tip">Используемый текстиль должен выдерживать температуру не менее 190°C</p>
        <p class="serv_tip">
			<span class="item_gallery">
				<span class="item_thumbs">
					<a rel="gallery" title="Бандана универсальная с сублимацией"
                       href="/userfiles/service_img/baf/1.jpg"><img src="/userfiles/service_img/baf/1.jpg"/></a>
				</span>
			</span>
        </p>
    </div>
</div>
<hr>
<div class="serv-section" id="directprint">
    <div class="arrow_before"></div>
    <h2>DTF-печать</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Печать полноцветного изображения на ткани.</p>
                <p class="serv_desc">Стоимость печати формата А5 - 300 руб., А4 - 400 руб.,  А3 - 700 руб.</p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="serv-section" id="stitch">
    <div class="arrow_before"></div>
    <h2>Вышивка</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Компьютерная вышивка на изделиях из текстиля рассчитывается индивидуально.</p>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="serv-section" id="baseballprint">
    <div class="arrow_before"></div>
    <h2>Нанесение на бейсболки</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Нанесение векторного или полноцветного изображения на бейсболки.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="baseballprint_form">
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="baseballprint_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость за единицу нанесения: <span class="calc_result"
                                                                      id="result_baseballprint">0</span> руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_baseballprint();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость нанесения: <span class="calc_result"
                                                                  id="result_baseballprint_full">0</span> руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_baseballprint();">Очистить форму
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Максимальный размер нанесения - 50х80 мм</p>
        <p class="serv_tip">Компания «Аверс-стиль» оставляет за собой право выбора метода нанесения.</p>
    </div>
</div>
<hr>
<div class="serv-section" id="hats">
    <div class="arrow_before"></div>
    <h2>Косынки (галстуки)</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Треугольный платок со сторонами 100х60х60 см из полиэстера или атласа с
                    полноцветной печатью и обрезкой края термоножом.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="hats_form">
                <div class="calc_row">
                    <span class="calc_label">Вид:</span>
                    <select name="hats_type">
                        <option value="1">Полиэстер</option>
                        <option value="2">Атлас</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="hats_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость готового изделия: <span class="calc_result" id="result_hats">0</span>
                            руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_hats();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость: <span class="calc_result" id="result_hats_full">0</span> руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_hats();">Очистить форму</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Дополнительный оверлок края +70 руб.</p>
        <p class="serv_tip">Для снижения стоимости изделия возможно изготовление однотонного галстука с небольшим
            логотипом только в одном углу. Этот и прочие нестандартные варианты рассчитываются индивидуально</p>
    </div>
</div>
<hr>
<div class="serv-section" id="bandanas">
    <div class="arrow_before"></div>
    <h2>Бандана (платок)</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Квардратный платок 60х60 см с нанесением изображения.</p>
            </div>
        </div>
        <div class="serv_calc">
            <form method="POST" class="serv_calc_form form-horizontal" action="" id="bandanas_form">
                <div class="calc_row">
                    <span class="calc_label">Вид:</span>
                    <select name="bandanas_type">
                        <option value="1">Полиэстер, полноцвет</option>
                        <option value="2">Атлас, полноцвет</option>
                        <option value="3">Х/б, нанесение 1 цвет</option>
                    </select>
                </div>
                <div class="calc_row">
                    <span class="calc_label">Тираж: </span><input type="text" name="bandanas_count">
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Стоимость готового изделия: <span class="calc_result" id="result_bandanas">0</span> руб.</strong>
                        <button class="calc_button" type="submit" onclick="calc_bandanas();">Рассчитать</button>
                    </div>
                </div>
                <div class="calc_row">
                    <div class="calc_result_row">
                        <strong>Полная стоимость: <span class="calc_result" id="result_bandanas_full">0</span>
                            руб.</strong>
                        <button class="calc_button" type="button" onclick="reset_form_bandanas();">Очистить форму
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <p class="serv_tip">Край обрабатывается термоножом или оверлоком в зависимости от используемой ткани.</p>
        <p class="serv_tip">Нестандартные изделия рассчитываются индивидуально.</p>
    </div>
</div>
<hr>
<div class="serv-section" id="nastitch">
    <div class="arrow_before"></div>
    <h2>Нашивки</h2>
    <div class="serv_content">
        <div class="serv_preview">
            <div>
                <p class="serv_desc">Рассчитываются индивидуально.</p>
            </div>
        </div>
    </div>
</div>
<hr>
