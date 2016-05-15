<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<body>
<?php
header('Content-Type: text/html; charset=utf-8');
include("mysqlconnect.php");
date_default_timezone_set('UTC');

$ac=$_POST['account'];
$pa=$_POST['password'];
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


//將email加入小老鼠@
$email=$email_account."@".$email_address;
$t=date("Y-m-d H:i:s",time());
//把性別轉換數字
if("man"==$sex)
	$sex=1;
else
	$sex=2;

//將日期串起來
$date=$y."/".$m."/".$d;

//$select_sql="SELECT account FROM member WHERE account='".$ac."'";
//$insert_sql;
//$sql=$select_sql;
//$result = mysql_query($sql);	//mysql_query只是判斷sql執行有無錯誤，即使是空表格也算正常執行
//$row = @mysql_fetch_row($result);
//echo $row[0];
//判斷是否有相同帳號，有就拒絕,實際上這段if可拿掉,因為我的DB有設定帳號是唯一，故sql執行錯誤肯定是帳號重複
//if(null!=$ac && null!=$pa)
//{
//$insert_sql="INSERT INTO member(account, password, first_name, second_name, sex, born, email, phone, address) 
//			values('daassa','123','we','sdd',1,'1234/12/2','sdd@aaa','123456789','asf')";

	//$insert_sql="INSERT INTO member (account, password, first_name, second_name, sex, born, email, phone, address)
	//			values('".$ac."','".$pa."','".$f_name."','".$s_name."',".$sex.",'".$date."','".$email."','".$phone."','".$address."')";
	//新增會員sql
	$insert_sql="INSERT INTO member (member_account, member_password, member_firstname, member_secondname, member_sex, member_born, member_email, 
				 member_phone, member_address,member_registdate)
				values('".$ac."','".$pa."','".$f_name."','".$s_name."',".$sex.",'".$date."','".$email."','".$phone."','".$address."','".$t."')";			
	$sql=$insert_sql;
	mysql_query($sql);
	
	//查詢會員資料並設session值
	$select_sql = "select member_id,member_account,member_firstname,member_secondname,authority_id from member where member_account='".$ac."'";
	$sql = $select_sql;
	$result= mysql_query($sql);
	$row = @mysql_fetch_row($result);
	
	$_SESSION['login_session']=true;	
	$_SESSION['id']=$row[0];
	$_SESSION['account']=$row[1];
	$_SESSION['name']=$row[2]." ".$row[3];
	$_SESSION['authority']=$row[4];
	echo "註冊成功,3秒後將返回所主頁";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	
	//echo $_SESSION['login_session'];
	//echo $_SESSION['id'];
	//echo $_SESSION['account'];
	//echo $_SESSION['name'];
	//echo $_SESSION['authority'];
	
	//if(mysql_query($sql)){
		//$_SESSION['account']=$ac;
		//echo "註冊成功,3秒後將返回所主頁";
		//echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	//}
	//else{
	//	echo "該帳號已存在,3秒後將返回上一頁";
	//	echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';
	//}
//}	
//else{
//	echo "帳號或密碼不可為空,3秒後將返回上一頁";
//	echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';
//}

?>
<br/><input type="button" name="return" value="返回"  onclick="location.href='member_register.php'">
</body>
</html>