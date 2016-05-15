<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php session_start(); 
	$_SESSION['login_session']=false;
	$_SESSION['id']=null;
	$_SESSION['account']=null;
	$_SESSION['name']=null;
	$_SESSION['authority']=null;
	//echo "已登出,將返回所主頁";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
?>

