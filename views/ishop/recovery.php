<?php defined('ISHOP') or die('Access denied'); ?>
<?
#if ($_SESSION['auth']) redirect('/personal/');
?>
<div class="content-txt">	
    <h2>Восстановить пароль</h2>
    <?if ($_SESSION['error']){
        echo($_SESSION['error']);
        unset($_SESSION['error']);
    }if ($_SESSION['debug']){
        #print_arr($_SESSION['debug']);
        unset($_SESSION['debug']);
    }
    #print_arr($_SERVER);?>

    <?
    function rP2() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, strlen($alphabet)-1);
	        $pass[$i] = $alphabet[$n];
	        echo "i = $i, n = $n<br>".strlen($alphabet);
	    }
	    $pass = implode($pass);
	    return $pass;
	}
	#$a = rP2();
	#$aversheaders = 'From: noreply@avers-style.ru' . "\r\n";
    #$testmail = mail('alex@1rank.pro','test_subject','test_message',$aversheaders);
    #var_dump($testmail,'1');?>
    <form method="post" action="<?=PATH?>">
        <table class="zakaz-data" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="zakaz-txt">*E-mail</td>
                <td class="zakaz-inpt"><input type="text" name="email-recovery" value="<?=htmlspecialchars($_SESSION['reg']['email'])?>" /></td>
                <td class="zakaz-prim">Пример: test@mail.ru</td>
            </tr>               
		</table>
        <input type="submit" name="recovery" value="Восстановить" />
        <?#print_arr($_SESSION)?>
    </form>	
        	
</div> <!-- .content-txt -->