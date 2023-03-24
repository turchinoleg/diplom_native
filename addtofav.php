<?
if (isset($_REQUEST['customer_id']) && $_REQUEST['customer_id'] != ''){
	define ("ISHOP", true);
	require_once "config.php";
	require_once "functions/functions.php";
	require_once MODEL;
	#print_r($_REQUEST);
	$isFavorite = false;
	$isFavorite = check_favorites($_REQUEST['goods_id'],$_REQUEST['customer_id']);
	if (!$isFavorite){
		$result = add_to_favorites($_REQUEST['goods_id'],$_REQUEST['customer_id']);
		echo $result ? "Added" : "Fail";
	}else{
		$result = remove_from_favorites($isFavorite);
		echo $result ? "Removed" : "Fail";
	}
}else{
	echo "Signout";
}
//var_dump ($isFavorite);
?>