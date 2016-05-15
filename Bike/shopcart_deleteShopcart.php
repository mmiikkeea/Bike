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
					  
					  
$sql = "select * from shopcart where product_ID=".$_POST["product_ID"]." and member_ID=".$_SESSION['id'];  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串

while ( $row = $dao->getRecord() ) {

$shopcartQty=$row["shopcart_buyQty"];

}

$sql = "select * from product where product_ID=".$_POST["product_ID"];  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串

while ( $row = $dao->getRecord() ) {

$productQty=$row["product_quantity"];

}

//echo "產品數量有".$productQty;


$sql = "delete from shopcart where product_ID=".$_POST["product_ID"]." and member_ID=".$_SESSION['id'];  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串

$newProductQty = $productQty + $shopcartQty;

$sql = "update product set product_quantity=".$newProductQty." where product_ID=".$_POST["product_ID"];  // 建立SQL指令字串
$dao->fetchDB($sql);

//echo $sql;
header("Location:shopcart_showShopcartDetail.php");
?>





