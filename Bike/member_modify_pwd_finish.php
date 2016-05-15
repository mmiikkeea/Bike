<?php
	session_start();
	$ac=$_SESSION['account'];
	include("mysqlconnect.php");
	$pwd=$_POST['new_password'];
	//update sql
	$sql="update member set member_password='".$pwd."' where member_account='".$ac."';";
	
	if(mysql_query($sql)){
		echo "密碼更新成功,三秒後將自動回到會員中心";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=member_center.php>';
	}
	else{
		echo "密碼更新失敗，三秒後將自動回到上一頁";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=member_modify_pwd.php>';
	}
	
?>