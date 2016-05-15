<? ob_start(); ?>


<?
// 插入函式庫的PHP檔案
require_once("order_DataAccess.php");
// 建立DataAccess物件的資料庫連結
$dao = new DataAccess("localhost","root",
                      "","bike");


$sql = "update bikeorder set order_status='已匯款，訂單處理中' where order_no=".$_POST["order_no"];  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串
//echo $sql
header("Location:order_adminOrder.php");
?>





