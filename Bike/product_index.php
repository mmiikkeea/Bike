<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
$conn = mysql_connect("localhost", 'root', '') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bike");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
        <script src="js/modernizr.custom.17475.js"></script> 
        <link rel="stylesheet" type="text/css" href="css/myStyle.css" />
        <title>商品目錄</title>
    </head>
    <body>
        <header>
            <?php require_once'index_title.php'; ?>
            <hr />
            <!--於以下開始編輯-->
            <div align="center" style="margin-top:5px; ">
                <div class="content_title" >商品目錄</div>
            </div>
            <div class="my_body">
                <div class="menu">
                    <?php require_once 'product_menu.php'; ?>
                </div>
                <div class="product_list">
                    <?php
                    $type_ID = empty($_GET["type_ID"]) ? 0 : $_GET["type_ID"];
                    $page = empty($_GET["page"]) ? 1 : $_GET["page"]; /* 條件A?狀況A:狀況B  當條件A成立時是狀況A否則狀況B */
                    $count = 8;
                    $start = ($page - 1) * $count;
                    if (empty($type_ID)) {
                        $sql = "SELECT * FROM `product`LIMIT $start,$count";
                    } else {
                        $sql = "SELECT * FROM `product` WHERE `type_ID`=$type_ID   LIMIT $start,$count";
                    }

                    $result = mysql_query($sql) or die('MySQL query error');
                    while ($row = mysql_fetch_array($result)) {
                        ?>
                        <div class="product">
                            <div style="text-align: center;">
                                <img class="product_img" src="<?php echo $row['product_image_path']; ?>" />
                            </div>
                            <div class="product_word">
                                
                                商品名稱 : <?php
                                $str = $row['product_name'];
                                echo (mb_strlen($str) > 5) ? mb_substr($str, 0, 5, 'UTF-8') . "..." : $str;
                                ?>
                                <br>
                                商品價錢 : NT<?php
                                $str = $row['product_price'];
                                echo (mb_strlen($str) > 5) ? mb_substr($str, 0, 5, 'UTF-8') . "..." : $str;
                                ?>元<br>
                            </div>
                            <form action="product.php"method="GET">
                                <input type="hidden" name="product_ID" value="<?php echo $row['product_ID']; ?>"/>
                                <?php if ($_SESSION["account"] == "admin") { ?>
                                    <input class="product_item" type="submit" value="修改資訊"/>
                                <?php } else {
                                    ?>
                                    <input class="product_item" type="submit" value="購買"/>  
                                <?php }
                                ?>

                            </form>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="page_list">
                    <?php
                    if (empty($type_ID)) {
                        $sql = "SELECT COUNT(*) count FROM `product`";
                    } else {
                        $sql = "SELECT COUNT(*) count FROM `product` WHERE `type_ID` = $type_ID";
                    }
                    $result = mysql_query($sql) or die('MySQL query error');
                    $row = mysql_fetch_array($result);
                    $sum = $row["count"]; /* 所有項目 */
                    $page_count = ceil($sum / $count); /* ceil 整數 */
                    for ($i = 0; $i < $page_count; $i++) {
                        if (($i + 1) == $page) {
                            ?>
                            <span class="page_item" ><?php echo ($i + 1); ?></span>
                            <?php
                        } else {
                            ?>
                            <a class="page_item" href="./product_index.php?page=<?php echo ($i + 1); ?>&type_ID=<?php echo $type_ID ?>"><?php echo ($i + 1); ?></a>
                            <?php
                        }
                    }
                    ?>
                </div> <!--用來清掉float-->
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
