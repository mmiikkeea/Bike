<? ob_start(); 
session_start();
header("Content-Type:text/html; charset=utf-8");
?>


<?


// 插入函式庫的PHP檔案
require_once("order_DataAccess.php");

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@確認訂單號碼
// 建立DataAccess物件的資料庫連結
$dbOrder = new DataAccess("localhost","root",
                      "","bike");
$sql = "SELECT order_no FROM bikeorder";  // 建立SQL指令字串
$dbOrder->fetchDB($sql);  // 執行SQL查詢指令字串
//echo $sql;



//ECHO "DFDFDFDF" . $dbOrder->num_rows;
if ($dbOrder->num_rows==0){

 $tmpOrderNO = 100;
	
 
 }
else
{

$sql = "SELECT MAX(order_no) FROM bikeorder";  // 建立SQL指令字串
$dbOrder->fetchDB($sql);  // 執行SQL查詢指令字串
$tmp=$dbOrder->getRecord();
$tmpOrderNO = $tmp["MAX(order_no)"] + 1;


}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@確認訂單號碼end




//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@從購物車抓資料出來
// 建立DataAccess物件的資料庫連結
$dao = new DataAccess("localhost","root",
                      "","bike");
$sql = "SELECT * FROM shopcart s,product p WHERE s.product_ID = p.product_ID and s.member_ID='".$_SESSION['id']."'";  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串
$flag = false;
// 顯示資料庫內容


$orderAmount=0;  //訂單總金額

while ( $row = $dao->getRecord() ) {
   

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@訂購內容從購物車轉到 訂單
// 建立DataAccess物件的資料庫連結
$result = new DataAccess("localhost","root",
                      "","bike");


 // 建立SQL指令字串
$sql = "insert into orderitem values(".$tmpOrderNO.",".$row["product_ID"].",".$row["shopcart_buyQty"].")";  
	
$result->fetchDB($sql);  // 執行SQL查詢指令字串	





$orderAmount=$orderAmount + ($row["product_price"] * $row["shopcart_buyQty"]);


}





//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  記錄 訂單 資訊 
// 建立DataAccess物件的資料庫連結
$chkOrder = new DataAccess("localhost","root",
                      "","bike");
	
$today = date("Y-m-d H:i:s",mktime (date(H), date(i), date(s), date(m), date(d), date(Y)));

					  
$sql4 = "insert into bikeorder values(".$tmpOrderNO.",'".$today."',".$orderAmount.",'未付款','','','".$_SESSION['id']."','".$_POST["order_recvName"]."','".$_POST["order_recvTel"]."','".
    $_POST["order_recvAddress"]."','".$_POST["order_recvTime"]."')";  
$chkOrder ->fetchDB($sql4);  // 執行SQL查詢指令字串    
   
//echo $sql4;

// 將購物車產品放到訂單後 要清空自己的購物車Start   //// 到時整合後再槓掉註解////

$sqlClrShopcart="delete from shopcart where member_ID=".$_SESSION['id'];
$chkOrder ->fetchDB($sqlClrShopcart); 


// 將購物車產品放到訂單後 要清空購物車End





header("Location:order_showCreateOrderDetail.php?odrNO=".$tmpOrderNO);

?>