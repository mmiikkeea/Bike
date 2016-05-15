<? ob_start(); 
session_start();
header("Content-Type:text/html; charset=utf-8");
?>


<?
// 插入函式庫的PHP檔案
require_once("order_DataAccess.php");
// 建立DataAccess物件的資料庫連結
$dao = new DataAccess("localhost","root",
                      "","bike");
					  

//echo $sql;
 


if ($_SESSION['account']=="admin")
{
/*  管理者 修改功能拿掉
    $bankAcc=$_POST["bankAcc"];
	$shipNO=$_POST["shipNO"];
      

    if ($bankAcc=="尚未輸入")
	 $bankAcc="";
    
	if ($shipNO=="尚未輸入")
	 $shipNO="";
	 
	

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@補這逼
$sql = "update bikeorder set order_recvName='".$_POST["recvName"]."', order_recvTel='".$_POST["recvTel"]."', order_recvAddress='".$_POST["recvAddress"]."', order_recvTime='".$_POST["recvTime"]."', order_bankAcc='".$bankAcc."', order_shipNO='".$shipNO."', order_status='".$_POST["orderStatus"]."' where order_no=".$_POST["order_no"];  // 建立SQL指令字串

*/
//echo $sql;

$sql = "update bikeorder set order_recvName='".$_POST["recvName"]."', order_recvTel='".$_POST["recvTel"]."', order_recvAddress='".$_POST["recvAddress"]."', order_recvTime='".$_POST["recvTime"]."' where order_no=".$_POST["order_no"];  // 建立SQL指令字串


}
else
{
$sql = "update bikeorder set order_recvName='".$_POST["recvName"]."', order_recvTel='".$_POST["recvTel"]."', order_recvAddress='".$_POST["recvAddress"]."', order_recvTime='".$_POST["recvTime"]."' where order_no=".$_POST["order_no"];  // 建立SQL指令字串
//echo $sql;
}

$dao->fetchDB($sql);  // 執行SQL查詢指令字串

if ($_SESSION['account']=="admin")
{
   header("Location:order_adminOrder.php");
}
else
{
   header("Location:order_modifyOrder.php");

}
//header("Location:order_modifyOrderDetail.php?Pages=".$_POST["nowPages"]."&odrNO=".$_POST["order_no"]);
?>





