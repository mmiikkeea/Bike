<!DOCTYPE html>
<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
$conn = mysql_connect("localhost", 'root', '') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bike");



$product_name = empty($_POST["product_name"]) ? null : $_POST["product_name"];
$type_ID = empty($_POST["type_ID"]) ? null : $_POST["type_ID"];
$product_price = empty($_POST["product_price"]) ? null : $_POST["product_price"];
$product_quantity = empty($_POST["product_quantity"]) ? null : $_POST["product_quantity"];

$product_image_path = "images/product/" . $_FILES["image"]["name"] . " ";

$sql = "INSERT INTO `product`"
        . "(`type_ID`, `product_name`, `product_price`, `product_quantity`, `product_image_path`) "
        . "VALUES ('$type_ID','$product_name','$product_price','$product_quantity','$product_image_path')";
$result = mysql_query($sql) or die(mysql_error());
header("Refresh: 2;url = product_index.php")
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
                     background: rgba(0,0,0,0.65);">新增產品成功，二秒後回商品目錄畫面 </div>
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
