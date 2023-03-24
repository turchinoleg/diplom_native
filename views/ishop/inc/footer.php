<?php defined('ISHOP') or die('Access denied'); ?>
<div class="footer">
			<div class="flogo">
			<div><a href="/"><span>аверс-стиль</span></a></div>
            </div>  
			<div class="copyrights"><p>Сopyright © 2018</p></div>
			<div class="fphone">
<p>Телефон:</p>
<p>+7 (347) 243-26-54</p>
<?/*<p>+7 (986) 703-31-03</p>*/?>
<p>WhatsApp:</p>
<p>+7 (999) 622-53-79</p>

<p>Режим работы:</p>
<p>Будние дни: с 9:00 до 18:00<br /> 
Суббота, Воскресенье - выходные </p>			
</div>
</div>
<?/*
<div id="popup-message-parent" style="display:none">
	<div class="popup-wrap" id="popup-message" style="max-width: 600px">
		<p>Уважаемые покупатели! В связи с техническими неполадками просьба все заказы предварительно обсуждать по телефону или по почте. Адрес офиса временно изменён, наличие товара на сайте неточное.</p>
	    <br>
	    <a href="javascript:;" onclick="$.fancybox.close();">Закрыть</a>
	</div> 	
</div>
*/?>
<script type="text/javascript" src="<?=TEMPLATE?>js/script2.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/favorite.js"></script>
<a id="popup-message-trigger" href="#popup-message"></a>

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?64HTl24ecHVWAdDnl7ZixehxKroiUaZI";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
<?if(isset($_SESSION['auth']['error'])):?>
<script>
	$(document).ready(function(){
		$('#auth-error-helper').fancybox({
			'modal': true
		});

		$('#auth-error-helper').trigger('click');
	})
</script>
<a id="auth-error-helper" href="#auth-error">test2</a>
<?endif;?>
<div id="auth-error-parent" style="display: none">
	<div id="auth-error">
		<?if(isset($_SESSION['auth']['error'])){
	            echo '<div class="error">' .$_SESSION['auth']['error']. '</div>';
	            unset($_SESSION['auth']);
	        }?>
	    <br>
	    <a href="javascript:;" onclick="$.fancybox.close();">Закрыть</a>
	    <a href="/recovery/">Забыли пароль?</a>
	</div>
</div>
<div id="metrica">
    <!-- Yandex.Metrika informer --> <a href="https://metrika.yandex.ru/stat/?id=47336343&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/47336343/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="47336343" data-lang="ru" /></a> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script src="https://mc.yandex.ru/metrika/watch.js" type="text/javascript"></script> <script type="text/javascript" > try { var yaCounter47336343 = new Ya.Metrika({ id:47336343, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } </script> <noscript><div><img src="https://mc.yandex.ru/watch/47336343" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</div>