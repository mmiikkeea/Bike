<?php
	//echo expires=-1;
	include("mysqlconnect.php");
	$q=$_REQUEST["q"];
	$sql="select * from member where member_account=\"".$q."\"";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
	if($q==$row[1])
		echo "重複帳號";
	else 
		echo "可註冊";
?>
