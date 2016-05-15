<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<body>
<?php
include("mysqlconnect.php");

$q=$_REQUEST["q"];
$q=preg_split("/,/",$q);
$ac=$q[0];
$pwd=$q[1];
//$ac=$_POST['account'];
//$pwd=$_POST['password'];

$select_sql="SELECT member_id,member_account,member_password,member_firstname,member_secondname,authority_id FROM member WHERE member_account='".$ac."'";
$sql=$select_sql;
$result = mysql_query($sql);	//mysql_query只是判斷sql執行有無錯誤，即使是空表格也算正常執行
$row = @mysql_fetch_row($result);
//echo $row[1];
//echo $row[2];
//echo $row[3];
//if(@$_SESSION['account']!=""){
	//if(null!=$ac && null!=$pa)
	//{
		if($ac==$row[1] && $pwd==$row[2]){	
			$_SESSION["login_session"]=true;	
			$_SESSION['id']=$row[0];
			$_SESSION['account']=$row[1];
			$_SESSION['name']=$row[3]." ".$row[4];
			$_SESSION['authority']=$row[5];
			//echo "登入成功,將返回所主頁";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
			//echo $_SESSION["login_session"];
			//echo $_SESSION['id'];
			//echo $_SESSION['account'];
			//echo $_SESSION['name'];
			//echo $_SESSION['authority'];
		}
		else{
			echo "帳密輸入錯誤";
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=member_login.php>';
		}
	//}	
	//else{
	//	echo "登入失敗,將返回上一頁";
	//	echo '<meta http-equiv=REFRESH CONTENT=2;url=member_login.php>';
	//}
//}
//else{
//	echo "請先登入";
//	echo '<meta http-equiv=REFRESH CONTENT=2;url=member_login.php>';
//}
?>
</body>
</html>