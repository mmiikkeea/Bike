<!DOCTYPE html>
<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
$conn = mysql_connect("localhost", 'root', '') or die('Error with MySQL connection');
if(empty($_SESSION['account']))
{?>
   <script> alert("請先登入會員");</script>
   <?php header("Refresh: 0;url = member_login.php");
}
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bike");
$product_ID = empty($_POST["product_ID"]) ? null : $_POST["product_ID"];
$shopcart_buyQty = empty($_POST["product_quantity"]) ? null : $_POST["product_quantity"];
$member_ID = empty($_POST["member_ID"]) ? null : $_POST["member_ID"];

$sql = "SELECT member_ID, product_ID, shopcart_buyQty "
        . "FROM `shopcart` "
        . "WHERE `member_ID` = $member_ID and `product_ID`=$product_ID";
$result = mysql_query($sql) or die('');
$count = mysql_num_rows($result);


if ($count != 0) {
    $row = mysql_fetch_array($result);
    $num_o = $row['shopcart_buyQty']; /* 原先預約的數目 */

    $sql = "SELECT product_quantity FROM `product` WHERE `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error111');
    $row = mysql_fetch_array($result);
    $num = $row['product_quantity'] + $num_o; /* 第一次預約剩下的數目加上原先預約的數目 等於 最一開始的數目 */

    $sql = "UPDATE `shopcart` SET "
            . "`shopcart_buyQty`='$shopcart_buyQty'"
            . "WHERE `member_ID`=$member_ID and `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error222'); /* 更新中以後 */

    $sql = "SELECT member_ID, product_ID, shopcart_buyQty "
            . "FROM `shopcart` "
            . "WHERE `member_ID` = $member_ID and `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error333'); /* 抓出更先完的預約數目 */
    
    $row = mysql_fetch_array($result);
    $num_a = $num - $row['shopcart_buyQty']; /* 最一開始數目減後來預約數目 */
    
    $sql = "UPDATE `product` SET "
            . "`product_quantity`= '$num_a'"
            . "WHERE `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error444');/*更新庫存量完成*/
    
} else {
    $sql = "INSERT INTO `shopcart`"
            . " (member_ID, product_ID, shopcart_buyQty) "
            . "VALUES ($member_ID, $product_ID, $shopcart_buyQty);";
    $result = mysql_query($sql) or die('MySQL query error111');/*放入預約數目到購物車*/
    
    $sql = "SELECT product_quantity FROM `product` WHERE `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error222');
    $row = mysql_fetch_array($result);
    $num = $row['product_quantity'] - $shopcart_buyQty;/*庫存量減預約數目*/
    
    $sql = "UPDATE `product` SET "
            . "`product_quantity`='$num'"
            . "WHERE `product_ID`=$product_ID";
    $result = mysql_query($sql) or die('MySQL query error333');/*更新庫存量*/
}
$result = mysql_query($sql) or die('MySQL query error555');

header("Refresh: 2;url = product_index.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
        <script src="js/modernizr.custom.17475.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/myStyle.css" />
        <title>商品</title>
    </head>
    <body>
        <header>
            <?php require_once'index_title.php'; ?>
            <hr />
            <!--於以下開始編輯-->
            <div align="center" style="margin-top:5px; ">
                <div class="content_title" >商品</div>
            </div>
            <div class="my_body">
                <div style="padding: 10px;
                     color:#FFF;
                     font-size: 30px;
                     text-align: justify;
                     font-family:'微软雅黑';
                     text-align:center;
                     background: rgba(0,0,0,0.65);">新增購物車成功，二秒後回商品目錄畫面</div>
            </div>
        </header>

        <footer>
            &nbsp;&nbsp; 
            <p> &nbsp;@Copyright  聯絡我們<a href="mailto:XXXX@example.com">'Send Email to Us'</a>
                <time datetime="2013-12-01" pubdate>12/1</time>
                publish
        </footer>
    </body>
</html>
