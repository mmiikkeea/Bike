<?php
	
	session_start();
	$ac=$_SESSION['account'];
	date_default_timezone_set('UTC');
	include("mysqlconnect.php");
	$f_name=$_POST['firstname'];
	$s_name=$_POST['secondname'];
	$sex=$_POST['sex'];
	$y=$_POST['year'];
	$m=$_POST['month'];
	$d=$_POST['day'];
	$email_account=$_POST['mail_account'];
	$email_address=$_POST['mail_address'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$email_account."@".$email_address;
	
	$t=date("Y-m-d H:i:s",time());
	//把性別轉換數字
	if("man"==$sex)
		$sex=1;
	else
		$sex=2;

	$date=$y."/".$m."/".$d;
	
	//updat query
	
	$sql="Update member set member_firstname='".$f_name."',
							member_secondname='".$s_name."',
							member_sex=".$sex.",
							member_born='".$date."',
							member_email='".$email."',
							member_phone='".$phone."',
							member_address='".$address."' 
		  where member_account='".$ac."'";
	//print($sql);
	if(mysql_query($sql)){
		echo "更新成功,3秒後將返回所主頁";
		echo '<meta http-equiv=REFRESH CONTENT=3;url=member_center.php>';
	}
	else{
		echo "對不起，更新失敗,3秒後將返回會員中心";
		echo '<meta http-equiv=REFRESH CONTENT=3;url=member_center.php>';
	}
?>