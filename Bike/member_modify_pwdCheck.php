<?php
	session_start();
	$ac=$_SESSION['account'];
	//echo expires=-1;
	include("mysqlconnect.php");
	$q=$_REQUEST["q"];
	$sql="select member_password from member where member_account='".$ac."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
	if($q==$row[0])
		echo "正確";
	else 
		echo "密碼錯誤";
?>
