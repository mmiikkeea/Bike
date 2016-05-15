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

    width:  800px;
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
    
    color:#FFF;
    font-size: 20px;
    text-align: center;
    
    font-family:"微软雅黑";
	
    }

    .odSubContentRight{

    
    color:#000;
    font-size: 15px;
    text-align: center;
     
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
  
	<script>
	
	

       function trimSpace(InputString)
       {
         //去除字串中所有的空白
         return InputString.value.replace(/[" "]/g, "");  //    /[" "]/   [要全部取代的東西]
 
         //使用方式為replace(要被換掉的字串,要取代的字串)

       }

		
		//限制只能輸入數字
function ValidateNumber(e, pnumber)
{
if (!/^\d+$/.test(pnumber))
{
e.value = /^\d+/.exec(e.value);
}
return false;
}


		function formCheck(form){	    
			
			
			var flag=true;
			
			var order_bankAcc=document.getElementById("order_bankAcc");
			
			order_bankAcc=trimSpace(order_bankAcc); //取代所有讀入字串的空白字元
						
			//alert(order_bankAcc);
			
            var alertInfo="";
            
			//alert(order_bankAcc.value.length);

			
			if(order_bankAcc.length<5){

				flag=false;
				alertInfo="匯款帳號末五碼欄,必需填入5個數字";
				
			}			
			
			
				
			if(true==flag){
				form.submit();
			}
			else
			{
			  alert(alertInfo);
			}
			
		}
	</script>  

</head>
<body>


<header>
<? require_once'index_title.php'; ?>
 <hr />
<!--於以下開始編輯-->
<div class="content" >



<center>  <!--把 div  odContent 放在頁面center-->




<?

if ($_POST["order_no"]=="")
 $orderNO=$_GET["odrNO"];
else
 $orderNO=$_POST["order_no"];

// 插入函式庫的PHP檔案
require_once("order_DataAccess.php");
// 建立DataAccess物件的資料庫連結
$dao = new DataAccess("localhost","root",
                      "","bike");

$sql = "SELECT * FROM orderitem o,bikeorder bo,product p where o.order_no=".$orderNO." and o.order_no = bo.order_no and p.product_ID=o.product_ID";  // 建立SQL指令字串
$dao->fetchDB($sql);  // 執行SQL查詢指令字串

// 顯示資料庫內容



while ( $recv = $dao->getRecord() ) {
  
$recvName= $recv["order_recvName"];
$recvTel= $recv["order_recvTel"];
$recvAddress= $recv["order_recvAddress"];
$recvTime= $recv["order_recvTime"];   
$bankAcc= $recv["order_bankAcc"];   
$shipNO= $recv["order_shipNO"];
$orderStatus= $recv["order_status"];   
}


if ( $bankAcc == "" )  
   $bankAcc="尚未輸入";


if ( $shipNO == "" )  
   $shipNO="尚未輸入";
   
   

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





$records_per_page = 2;  // 每一頁顯示的記錄筆數
// 取得URL參數的頁數
if (isset($_GET["Pages"])) $pages = $_GET["Pages"];
else                       $pages = 1;
// 建立MySQL的資料庫連結
$link = mysqli_connect("localhost", "root", "") 
        or die("無法開啟MySQL資料庫連結!<br>");
mysqli_select_db($link, "bike");  // 選擇school資料庫
// 設定SQL查詢字串
$sql = "SELECT * FROM orderitem o,bikeorder bo,product p where o.order_no=".$orderNO." and o.order_no = bo.order_no and p.product_ID=o.product_ID";  // 建立SQL指令字串
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
echo "<div class=odSubTitle><div class=odTitle>訂單明細</div></div>";
?>
<div class=odContent>



<div class=odSubContentRight>
<center>

<b>
<table style="border: 1px solid rgb(255, 255, 255); background: rgba(255,255,255,0.65); width: 800px;" cellpadding="5" cellspacing="5" frame="border" rules="none">
  <tr height=30>
    <td>訂單編號：<? echo $orderNO ?></td><td width=400>訂單狀態：<? echo $orderStatus ?></td>
  </tr>
  
   <tr height=30>
    <td>收件人姓名：<? echo $recvName ?></td><td>收件人電話：<? echo $recvTel ?></td>
  </tr>
  
  <tr height=30>
    <td>收件人地址：<? echo $recvAddress ?></td><td>收件人可收件時間：<? echo $recvTime ?></td>
  </tr>
  
   <tr height=30>
   

	 
	 <td>匯款帳號：<? echo $bankAcc ?></td><td>出貨追蹤碼：<? echo $shipNO ?></td>
	
  </tr>
  
  <tr height=30>
    
	
	<form action="order_handleBankAcc.php" method="post">
     <input type="hidden" name="order_no" 
          value="<? echo $orderNO ?>">
		  
     <input type="hidden" name="nowPages" 
          value="<? echo $pages ?>">			  
		  
	 <td>
	 
	
	 <?
	 

	 if ($orderStatus=="未付款")
	   echo "輸入匯款帳號末五碼：<input type=\"text\" size=\"10\" name=\"order_bankAcc\" id=\"order_bankAcc\" maxlength=5 onkeyup=\"return ValidateNumber(this, value)\"><input type=\"button\" name=\"send\" value=\"輸入\" onclick=\"formCheck(this.form)\">";
	 
     if ($orderStatus=="確認匯款中")
	   echo "修改匯款帳號末五碼：<input type=\"text\" size=\"10\" name=\"order_bankAcc\" id=\"order_bankAcc\" maxlength=5 onkeyup=\"return ValidateNumber(this, value)\"><input type=\"button\" name=\"send\" value=\"修改\" onclick=\"formCheck(this.form)\">";	 
	   
      
	 ?>
	 </td>
	
	</form>
	
	<td>訂單中共有<? echo " ".$total_records." " ?>項產品</td>
	
  </tr>

</table></b><BR>



<table style="border: 1px solid rgb(255, 255, 255); background: rgba(255,255,255,0.65); width: 800px;" cellpadding="5" cellspacing="5" frame="border" rules="all">

<tr style="border: 1px solid rgb(255, 255, 255); background: rgba(100,150,255,0.80);" cellpadding="5" cellspacing="5" frame="border" rules="all">
    <th>產品編號</th><th>產品名稱</th>
   <th>產品單價</th><th>購買數量</th><th>小計</th>
</tr> 
<?
$orderamount=0;

$j = 1;

$flag = false; //for color

$itemSeq=1;

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
   
   <td align=center><? echo $row["product_ID"] ?></td>
   <td align=center><? echo $row["product_name"] ?></td>
   <td align=center><? echo formatMoney($row["product_price"]) ?></td>
   <td align=center><? echo $row["orderitem_buyQty"] ?></td>
   <td align=center><? echo formatMoney($row["orderitem_buyQty"]*$row["product_price"]) ?></td>     
</tr>
</form> 
   
<?   

   $orderamount=$row["order_amount"]; //orderamount 不斷取代 但都同筆訂單 所以每筆皆同
   $j++;
   
   
   
} //end of while loop
?>

</table>
<br>

<table style="border: 1px solid rgb(255, 255, 255); background: rgba(255,255,255,0.65); width: 800px;" cellpadding="5" cellspacing="5" frame="border" rules="all">
<tr><td align=right><font size=4><b>本訂單合計金額為：<? echo formatMoney($orderamount)."元"?></b>&nbsp;&nbsp; &nbsp;&nbsp; </td></tr>
</table>


</center><br><br>
<?
echo "<div class=pages><span style=\"text-decoration:underline;\">頁次</span><br>";     //div結束
if ( $pages > 1 )  // 顯示上一頁
   echo "<a href='order_showOrderDetail.php?Pages=".($pages-1).
        "&odrNO=".$orderNO."' class=\"styleP\">上一頁</a>| ";
for ( $i = 1; $i <= $total_pages; $i++ )
   if ($i != $pages)
     echo "<a href=\"order_showOrderDetail.php?Pages=".$i."&odrNO=".$orderNO."\" class=\"styleP\">".
          $i."</a> ";
   else
     echo $i." ";
if ( $pages < $total_pages )  // 顯示下一頁
   echo "|<a href='order_showOrderDetail.php?Pages=".($pages+1).
        "&odrNO=".$orderNO."' class=\"styleP\">下一頁</a> </form>";
?>
</div> <!--end of div pages -->

<div class=bkIndex ><br><span id=bkIndexSpan><a href="order_showOrder.php" class="styleP">回訂單總覽</a>｜<a href="index.php" class="styleP">回首頁</a></div>


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