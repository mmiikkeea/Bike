<? ob_start(); ?>
<?php
session_start();
@$_SESSION['id'];
@$_SESSION['account'];
@$_SESSION['name'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Elastislide - A Responsive Image Carousel" />
        <meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
<script src="js/modernizr.custom.17475.js"></script>
  <style type="text/css">
  @import url("LondrinaOutline_Regular/stylesheet.css");

    header {
	text-align: center;
	background: url("sbike_m1.jpg");
	background-size: cover;
	margin: 0 auto;
	height: 900px;
	font-size: 18px;
	color: #FFF;
    }
	nav{
		text-align:left;
	}
    
    a {
      color: white;
    }
	
    }
    h1 {
      font-size: 70px;
    }
   
	main{
	}
    ul {
      padding: 10px;
      background:/*url("http://images2.layoutsparks.com/1/238605/moon-over-mistral-sky.jpg");*/rgba(0,0,0,0.5);
    }
	/*ol {
		padding: 10px;
		background:rgba(0,0.6,0,0);
	}*/
    li {
      display: inline;
      padding: 0px 10px 0px 10px;
    }
    article {
      max-width: 500px;
      padding: 20px;
      margin: 0 auto;
    }
	h3 {
		  font-size:55px;
	}
    /*@media (max-width: 500px) {
      h1 {
        font-size: 36px;
        padding: 5px;
      }
      li {
        padding: 5px;
        display: block;
      }
	  */
 	body {
	background-color:#000;
	text-align:center;
		}
	ul.topstyle{
		font-family:"LondrinaOutline Regular";
	font-size: 25px;
	padding: 10px;
	background: rgba(0,0,0,0.65);
	}
	p.biketext{  /* 由此處更改顯示的文字 */
	color: #FFF;
	background-color: #000;
	padding: 20px;
	font-family:"粗黑體";
	}
	  <!-- 0103改了這邊 --> 

	  <!-- 0103改了這邊 --> 
	footer{
		color:#000;
	font-size: x-small;
	text-align:center;
	}
	
	
/* Anson's CSS---------------------------------------------------------- */ 

    A.styleP:visited {
    text-decoration: none;
    color: #000;
    font-weight: normal;
    }

    A.styleP:hover {
    text-decoration: underline;
    color: #FFF;
    font-weight: normal;
    }
    
	A.styleOdLink:visited {
    text-decoration: none;
    color: #FFF;
    font-weight: normal;
    }

    A.styleOdLink:hover {
    text-decoration: underline;
    color: #5599FF;
    font-weight: normal;
    }

	
	.content{
	padding: 10px;
	color:#000;
	font-size: 16px;
	text-align: justify;
    font-family:"微軟雅黑","黑体","宋体";
	text-align:center;
	}
	
	
	
	.odTitle{
    
    
    margin:10px 7px 7px 10px;
    padding: 10px;
    color:#FFF;
    font-size: 30px;
    text-align: center;
    
    font-family:"微软雅黑";
	
    }
	
	.odSubTitle{

    width:  1200px;
    margin:10px 7px 7px 10px;
    padding: 10px;
    color:#FFF;
    font-size: 20px;
    text-align: right;
    background: rgba(0,0,0,0.65);
    font-family:"微软雅黑";
	
    }

	
	.odContent{

    width:  1200px;
    margin:0px 7px 7px 10px;
    padding: 10px;odContent
    color:#FFF;
    font-size: 20px;
    text-align: right;
    
    font-family:"微软雅黑";
	
    }

    .odSubContentRight{

    
    
    font-size: 15px;
    text-align: center;
    margin:0px 7px 7px 190px;
    }
	
	.odSubContentLeft{

    width:  190px;
    
    float:left;
	margin:0px 7px 7px -10px;
    font-size: 15px;
    text-align: center;
    background: rgba(0,0,0,0.65);
    }
	
	.menu_item_order{
	
    width:  170px;
    height: 50px;
    border: inset;
    margin:0px 10px 10px 10px;
    padding: 10px;
    color:#FFF;
    font-size: 15px;
    text-align: center;
    background: rgba(0,0,0,0.65);
    font-family:"微软雅黑";
    cursor: pointer;/*滑鼠游標*/
}

.bkIndex{  
  
    
    font-size: 30px;
    text-align: center;
    <!--background: rgba(0,0,0,0.65);-->
    font-family:"微软雅黑";
   
}

.pages{  
  
    
    font-size: 15px;
    text-align: center;
    <!--background: rgba(0,0,0,0.65);-->
    font-family:"微软雅黑";
   
}


  </style>
  
  

</head>
<body>


<header>
<? require_once'index_title.php'; ?>
 <hr />
<!--於以下開始編輯-->
<div class="content" >



<center>  <!--把 div  odContent 放在頁面center-->




<?
function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number = sprintf('%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return "$".$number; 
} 





$records_per_page = 10;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
// 建立MySQL的資料庫連結
$link = mysqli_connect("localhost", "root", "") 
        or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "bike");  // 選擇school資料庫
// 設定SQL查詢字串
$sql = "SELECT * FROM bikeorder where order_memberID = '".$_SESSION['id']."' and order_status='未付款' order by order_date desc";  // 建立SQL指令字串
//echo $sql;
// 送出Big5編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, 
       "SET collation_connection = 'utf8_general_ci'");
// 執行SQL查詢
$result = mysqli_query($link, $sql);
$total_fields=mysqli_num_fields($result); // 取得欄位數
$total_records=mysqli_num_rows($result);  // 取得記錄數
// 計算總頁數
$total_pages = ceil($total_records/$records_per_page);
// 計算這一頁第1筆記錄的位置
$offset = ($pages - 1)*$records_per_page;
mysqli_data_seek($result, $offset); // 移到此記錄
echo "<div class=odSubTitle><div class=odTitle>未付款訂單</div>".$_SESSION["account"] . "  共有 ". $total_records." 筆訂單記錄</div>";
?>
<div class=odContent>

   <div class=odSubContentLeft>  
      <div class=menu_item_order><a href="order_showOrder.php" class="styleOdLink">訂單總覽</a></div>
      <div class=menu_item_order><a href="order_showOrderUnpaid.php" class="styleOdLink">查詢 未付款訂單</a></div>
      <div class=menu_item_order><a href="order_showOrderChecking.php" class="styleOdLink">查詢 確認匯款中訂單</a></div>
      <div class=menu_item_order><a href="order_showOrderProcessing.php" class="styleOdLink">查詢 處理中訂單</a></div>
      <div class=menu_item_order><a href="order_showOrderShipped.php" class="styleOdLink">查詢 已出貨訂單</a></div>
	  <div class=menu_item_order><a href="order_modifyOrder.php" class="styleOdLink">修改 未付款訂單</a></div>
   </div>

<div class=odSubContentRight>
<table style="border: 1px solid rgb(255, 255, 255); background: rgba(255,255,255,0.65); width: 1000px;" cellpadding="5" cellspacing="5" frame="border" rules="all">

<tr style="border: 1px solid rgb(255, 255, 255); background: rgba(100,150,255,0.80);" cellpadding="5" cellspacing="5" frame="border" rules="all">
   <th>訂單詳情</th><th>訂單編號</th><th>訂購時間</th>
   <th>訂購總金額</th><th>匯款帳號末五碼</th><th>訂單狀態</th><th>出貨追蹤碼</th><th>收件人</th><th>收件人電話</th><th>收件人地址</th><th>收件時間</th>
</tr> 
<?
$j = 1;

$flag = false; //for color


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)
       and $j <= $records_per_page) {  
   
      if ($flag) {
      $flag = false;
      $color=" style=\"color:#FFF; border: 1px solid rgb(255, 255, 255); background: rgba(0,0,0,0.65); \" cellpadding=\"5\" cellspacing=\"5\" frame=\"border\" rules=\"all\"";
   } else {
      $flag = true;
      $color=""; //還原底色
   }
   // 顯示所有訂單
   
   
   
?>
	  
<form action="order_showOrderDetail.php" method="post">
 <input type="hidden" name="order_no" 
          value="<? echo $row["order_no"] ?>">
   <input type="hidden" name="bikeOrderDate" 
          value="<? echo $row["order_date"] ?>">
   <input type="hidden" name="bikeOrderAmount"
          value="<? echo $row["order_amount"]; ?>">
   <input type="hidden" name="bikeOrderStatus"
          value="<? echo $row["order_status"]; ?>">
<tr "<? echo $color ?>">
   <td align=center><input type="submit" name="Send" value="訂單明細"></td>
   <td align=center><? echo $row["order_no"] ?></td>
   <td align=center><? echo $row["order_date"] ?></td>
   <td align=center><? echo formatMoney($row["order_amount"]); ?></td>
   <td align=center><? echo $row["order_bankAcc"] ?></td>
   <td align=center><? echo $row["order_status"] ?></td>  
   <td align=center><? echo $row["order_shipNO"] ?></td>  
   <td align=center><? echo $row["order_recvName"] ?></td>  
   <td align=center><? echo $row["order_recvTel"] ?></td>  
    <td align=center><? echo $row["order_recvAddress"] ?></td>  
	<td align=center><? echo $row["order_recvTime"] ?></td>  
</tr>
</form> 
   
<?   

   
   $j++;
}
echo "</table><br><br><div class=pages><span style=\"text-decoration:underline;\">頁次</span><br>";     //div結束
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='order_showOrderUnpaid.php?Pages=".($pages-1).
        "' class=\"styleP\">上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"order_showOrderUnpaid.php?Pages=".$i."\" class=\"styleP\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='order_showOrderUnpaid.php?Pages=".($pages+1).
        "' class=\"styleP\">下一頁</a> </form>";
?>
</div> <!--end of div pages -->

<div class=bkIndex ><br><span id=bkIndexSpan><a href="index.php" class="styleP">回首頁</a></div>

</div><!--end of div odSubContentRight -->




</div><!--end of div odSubContent -->



<?
mysqli_free_result($result);  // 釋放佔用的記憶體
mysqli_close($link); // 關閉資料庫連結


?>






</center>



</header>



 <footer>
  &nbsp;&nbsp; 
  <p> &nbsp;@Copyright  聯絡我們<a href="mailto:XXXX@example.com">'Send Email to Us'</a>
    <time datetime="2013-12-01" pubdate>12/1</time>
    publish
  </footer>
 
</body>