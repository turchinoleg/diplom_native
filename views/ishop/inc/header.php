<?php defined('ISHOP') or die('Access denied'); ?>
<?
if ((!$_SESSION['auth']) && $view == 'personal'){
    header('Location: /');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="<?=TEMPLATE?>images/logo.png" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="yandex-verification" content="0c25b74337559c7e" />
<meta name="theme-color" content="#96ca39">
<meta name="google-site-verification" content="1jAWy01ovtnS8KlpPhzKvK7Yltmv_L15bjazFvYXtuI" />
<!-- Latest compiled and minified CSS -->
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>css/style.css?time=1" />
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<?/*<script type="text/javascript" src="https://cse.google.com/cse.js?cx=010653697322653214051:lnhjz5kntiy"></script>*/?>
<script type="text/javascript" src="<?=TEMPLATE?>js/functions.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE?>js/jquery.cookie.js"></script>
<script type="text/javascript">var path = '<?=PATH?>';</script>
<script type="text/javascript" src="<?=TEMPLATE?>js/workscripts.js"></script>
<!-- Fancybox -->
<script type="text/javascript" src="<?=PATH?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?=PATH?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?=PATH?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!-- Fancybox -->
<meta name="description" content="<?=$meta['description']?>" />
<? /*
<meta name="keywords" content="<?=$meta['keywords']?>" />
*/ ?>
<title><?=$meta['title']?></title>
</head>
<?#print_arr($_REQUEST);?>
<body>
<div class="main">
	<div class="header">
		<div class="header2" itemscope itemtype="http://schema.org/Organization" style="background: url('<?=TEMPLATE?>images/header.jpg')">
			<div class="header2inner">
				<div class="newheaderlogo">
					<a  href="/"><div class="header_logo"><div itemprop="name" id="header_logo"><span>Аверс-стиль</span></div></div></a>
				</div>
				<div class="header-contacts">
					<?/*<p>address: <span itemprop="address">Чукотская, 31/1</span></p>*/?>
					<p>ph: <span itemprop="telephone">+7(347) 243-26-54</span></p>
					<p>ph: <span itemprop="telephone">+7(999) 622-53-79</span></p>
					<p>e-mail: <a href="mailto:aversstyle@yandex.ru"> <span itemprop="email">aversstyle@yandex.ru</span></a></p>
				</div>
				<div class="newheaderblock">
					<div class="newbasket">
						<div class="newbasket-inner">
							<div class="newbasket">
					            <?php if($_SESSION['total_quantity']): ?>
					            	<?/*
					            	<span><span><?=$_SESSION['total_quantity']?></span> товар на сумму <span><?=$_SESSION['total_sum']?></span> руб.
					                </span>
					                */?>
					                <div class="total_quantity"><?=$_SESSION['total_quantity']?></div>
					            <?php endif; ?> 
					        </div>
					        <a href="<?=PATH.'cart';?>"><div class="cartlink"></div></a>
						</div>
					</div>
					<div class="authoriz">
						<div class="autoriz_block">
							<?/* старый поиск*/?>
							<form method="get" action="/">
								<ul class="search-head">
						            <input type="hidden" name="view" value="search">
									<li><input type="text" name="search" id="quickquery" placeholder="Поиск по сайту" style="color: rgb(185, 185, 185);"></li>
										<script type="text/javascript">
											 //<![CDATA[
											  placeholderSetup('quickquery');
											  //]]>
										</script>
									<li><input class="search-btn" type="image" src="/views/ishop/images/searc-btn.png"></li>
								</ul>
							</form>
							<?/**/?>
												
						</div>
						<?php if(!$_SESSION['auth']['user']): ?>
	                		<form method="post" action="">
								<div class="autoriz_block autoriz_login">
									<span class="autoriz_label">Авторизация</span><br/>
									<input type="text" name="login" id="login" />
									</div>
								<div class="autoriz_block autoriz_pass">
									<span class="autoriz_label"></span><br/>
									<input type="password" name="pass" id="pass" />
								</div>
								<div class="autoriz_block_bottom">
									<a href="<?=PATH?>reg"><span class="autoriz_label">Регистрация</span></a>
									<input type="submit" name="auth" id="auth1" value="Войти" />
								</div>
							</form>
		                <?php else: ?>
		                	<div class="autoriz_block autoriz_block_answer">
		                		<noindex><div id="customer" data-id="<?=$_SESSION['auth']['customer_id']?>"></div></noindex>
			                    <p><a href="/personal/">Личный кабинет<?#=htmlspecialchars($_SESSION['auth']['user'])?></a></p>
			                    <?/* убрали выход, перенести внутрь личного кабинета 05.01.2019
			                    <a href="<?=PATH?>?do=logout">Выход</a>
			                    */?>
		                	</div>
		                <?php endif; ?>
					</div>
				</div>
			</div>
	      	<?/*
	      	<a  href="http://xn----7sbbfas9a5cvak3e.xn--p1ai/"><div class="header_avers"></div></a>
	      	<a  href="http://aversstyle.ru/"><div class="header_viviska"></div> </a>  		
	      	*/?>
		</div>
      
      <?/* СТАРЫЙ ХЕДЕР
      <!--img src="<?=TEMPLATE?>images/header.jpg" class="header_img" />
      <a  href="/"><div class="header_logo"><h1>аверс-стиль</h1></div></a>
      <a  href="http://xn----7sbbfas9a5cvak3e.xn--p1ai/"><div class="header_avers"></div></a>
      <a  href="http://avers-style.ru/"><div class="header_viviska"></div> </a-->  
		*/?>

    <?php /*?>
		<a href="/"><img class="logo" src="<?=TEMPLATE?>images/logo.jpg" alt="Интернет магазин сотовых телефонов" /></a>
		<img class="slogan" src="<?=TEMPLATE?>images/slogan.jpg" alt="Интернет-магазин Сотовых телефонов" />
		<div class="head-contact">
		<p><strong>Телефон:</strong><br />
		<span>8 (800) 700-00-01</span></p>
		<p><strong>Режим работы:</strong><br />
		Будние дни: с 9:00 до 18:00<br />  
		Суббота, Воскресенье - выходные</p>  
		</div>
      <?php */?>  
        
        
        <?/*
		<form method="get" action="<?=PATH?>">
		<ul class="search-head">
            <input type="hidden" name="view" value="search" />
			<li><input type="text" name="search" id="quickquery" placeholder="Что вы хотите купить?" /></li>
				<script type="text/javascript">
					 //<![CDATA[
					  placeholderSetup('quickquery');
					  //]]>
				</script>
			<li><input class="search-btn" type="image" src="<?=TEMPLATE?>images/searc-btn.png" /></li>
		</ul>
		</form>	*/?>
	</div>
	<? /*
	<div style="display:none;"><pre><?print_r($get_page)?></pre></div>
	*/ ?>
	<?#print_arr($pages);?>
	<ul class="menu">
		
        <?php if($pages): ?>
            <?php foreach($pages as $item): ?>
            	<?if ($item['page_id']==1) continue;?>
            	<?if ($item['page_id']==7):?>
                	<li><a href="<?=PATH?>archive/"><?=$item['title']?></a></li>
            	<?else:?>
                	<li><a href="<?=PATH?>page/<?=$item['page_id']?>"><?=$item['title']?></a></li>
                <?endif;?>
            <?php endforeach; ?>
        <?php endif; ?>
	</ul>