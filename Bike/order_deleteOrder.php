<? ob_start(); 
session_start();
header("Content-Type:text/html; charset=utf-8");
?>


<?


// 插入函式庫的PHP檔案
require_once("order_DataAccess.php");




//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ 抓出該筆訂單中有哪些產品 一筆一筆做處理
// 建立DataAccess物件的資料庫連結
$dao = new DataAccess("localhost","root",
                      "","bike");

//					  
$sql = "SELECT * FROM orderitem where order_no=".$_POST["order_no"];  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串


// 顯示資料庫內容


$odrQty=0;
$pdtID=0;
$odrNO=0;

while ( $row = $dao->getRecord() ) { //抓出該筆訂單中有哪些產品 一筆一筆做處理
   
$odrQty=$row["orderitem_buyQty"];
$pdtID=$row["product_ID"];
$odrNO=$row["order_no"];

//echo $odrQty."<br>";
//echo $pdtID."<br>";
//echo $odrNO."<br>";
   
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  逐筆刪除 訂單內的商品項目
// 建立DataAccess物件的資料庫連結
$result = new DataAccess("localhost","root",
                      "","bike");

					  
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ 查詢現有產品庫存數量
$sql2 = "select * from product where product_ID=".$pdtID;  
$result->fetchDB($sql2);  // 執行SQL查詢指令字串

while ( $getPdtQty = $result->getRecord() ) {

$productQty=$getPdtQty["product_quantity"];

}



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ 刪除一筆訂單內商品項目
$sql2 = "delete from orderitem where order_no=".$odrNO." and product_ID=".$pdtID;  
	
$result->fetchDB($sql2);  // 執行SQL查詢指令字串


$newQty = $odrQty + $productQty;//計算新的產品數量

//echo "訂單中產品數量 ".$odrQty."<br>";
//echo "產品庫存數量 ".$productQty."<br>";	

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@更新該筆產品庫存數量
$sql2 = "update product set product_quantity=".$newQty." where product_ID=".$pdtID;  
$result->fetchDB($sql2);




}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  刪除該筆訂單
$sql = "delete from bikeorder where order_no=".$odrNO;  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串



header("Location:order_modifyOrder.php");

?>