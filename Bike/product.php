<?php
session_start();
$conn = mysql_connect("localhost", 'root', '') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bike");
$product_ID = $_GET["product_ID"];
?>

<html>
    <head>
        <script src="js/modernizr.custom.17475.js"></script> 
        <script src="js/jquery-1.10.2.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="css/myStyle.css" />
        <title>商品</title>
        <style type="text/css">

            div.product{
                width: 60%;
                height: 177px;
                margin: 8px;
                color: lightyellow;
                text-align: left;
                float: left;
                font-size: 16px;
                font-family:"微软雅黑";
                background: rgba(0,0,0,0.65);
            }
            img.product_img{
                width: 230px;
                height: 230px;
                float: left;
                margin:20px 20px 20px 30px;
                border:ridge;
                border-color:paleturquoise;
                border-width:9px;
            }
        </style> 
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
                <div class="menu">
                    <?php require_once 'product_menu.php'; ?>
                </div>
                <?php
                $sql = "SELECT product_ID, p.type_ID type_ID,type_name,product_name,product_price, product_image_path, product_quantity "
                        . "FROM `product` p,`product_type` pt "
                        . "WHERE `product_ID`=$product_ID "
                        . "and p.type_id=pt.type_id";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                ?>
                <div class="product_list">
                    <div class="product_img">
                        <img class = "product_img" src="<?php echo $row['product_image_path']; ?>" /><br>
                    </div>
                    <?php
                    if ($_SESSION["account"] == "admin") {
                        ?>
                        <div class = "product">
                            <form action="pro_updatasql.php" method="POST" name="" enctype="multipart/form-data">
                                <input type="hidden" name="product_ID" value="<?php echo $row['product_ID']; ?>"/></p>
                                <p>商品名稱 : <input type="text" name="product_name" id="product_name" value="<?php echo $row['product_name']; ?>"maxLength="20" />請勿輸入空白字元</p>
                                <p>商品種類 : 
                                    <?php
                                    $type_sql = "SELECT type_ID,type_name "
                                            . "FROM `product_type` ";
                                    $type_result = mysql_query($type_sql);
                                    ?>
                                    <select name="type_ID" id="type_ID">
                                        <?php
                                        while ($type_row = mysql_fetch_array($type_result)) {
                                            if ($row['type_ID'] == $type_row['type_ID']) {
                                                ?>
                                                <option value="<?php echo $type_row['type_ID'] ?>" selected="selected"><?php echo $type_row['type_name'] ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $type_row['type_ID'] ?>"><?php echo $type_row['type_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </p>
                                <p>商品價錢 : <input type="text" name="product_price" id="product_price"value="<?php echo $row['product_price']; ?>" maxLength="10"onkeyup="return ValidateNumber(this, value)"/>  請輸入數字</p>
                                <p>商品庫存量 : <input type="text" name="product_quantity" id="product_quantity" value="<?php echo $row['product_quantity']; ?>"maxLength="10" onkeyup="return ValidateNumber(this, value)"/>  請輸入數字</p>
                                <p>圖片<input name="image" id="image" type="file" style="font-size:15px; text-align:center"></p>
                                <p>原先路徑 : <?php echo $row['product_image_path']; ?></p>
                                <br>
                                <input class="product_item" style=" float:left;"type="submit" id="changebutton"value="修改完成" />
                            </form>
                            <form action="pro_delete.php"  method="POST">
                                <input type="hidden" name="product_ID" value="<?php echo $row['product_ID']; ?>"/></p>
                                <input class="product_item"  style=" float:right; "type="submit" value="刪除產品" />
                            </form>
                        </div>
                        <div> </div>
                    <?php } else { ?>                  
                        <div class = "product">
                            商品名稱 : <?php echo $row['product_name']; ?><br>
                            商品種類 : <?php echo $row['type_name']; ?><br>
                            商品價錢 : NT<?php echo $row['product_price']; ?>元<br>
                            <?php
                            $boolean = $row['product_quantity'];
                            if ($boolean != 0) {
                                ?>
                                <form action="product_shopcart_insert.php"  method="POST">
                                    <p>購買數量 :  
                                        <select name="product_quantity">
                                            <?php
                                            if ($row['product_quantity'] > 10) {
                                                $number = 10;
                                            } else {
                                                $number = $row['product_quantity'];
                                            }
                                            for ($i = 1; $i < $number + 1; $i++) {
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php
                                            }
                                            ?>

                                        </select></p>
                                    <input type="hidden" name="product_ID" value="<?php echo $row['product_ID']; ?>"/></p>
                                    <input type="hidden" name="member_ID" value="<?php echo $_SESSION['id']; ?>"/></p>
                                <br>
                                <br>
                                    <input class="product_item" type="submit" value="放入購物車" />
                                </form>            
                                <?php
                            } else {
                                echo '尚無庫存';
                            }
                            ?>
                        </div>   
                    <?php } ?>
                </div>
            </div> 
        </header>

        <footer>
            &nbsp;&nbsp; 
            <p> &nbsp;@Copyright  聯絡我們<a href="mailto:XXXX@example.com">'Send Email to Us'</a>
                <time datetime="2013-12-01" pubdate>12/1</time>
                publish
        </footer>
    </body>
    <script>
        $(':file').change(function() {  //選取類型為file且值發生改變的
            var file = this.files[0]; //定義file=發生改變的file
            name = file.name; //name=檔案名稱
            size = file.size; //size=檔案大小
            type = file.type; //type=檔案型態

            if (file.size > 1000000) { //假如檔案大小超過1MB
                alert("圖片上限1MB!"); //顯示警告!!
                $(this).val('');  //將檔案欄設為空白
            }
            else if (file.type != 'image/png' && file.type != 'image/jpg'
                    && !file.type != 'image/gif' && file.type != 'image/jpeg')
            { //假如檔案格式不等於 png、jpg、gif、jpeg
                alert("檔案格式不符合: png, jpg, gif"); //顯示警告
                $(this).val(''); //將檔案欄設為空
            }
        });

    </script>
    <script>
        function ValidateNumber(e, pnumber)
        {
            if (!/^\d+$/.test(pnumber))
            {
                e.value = /^\d+/.exec(e.value);
            }
            return false;
        }
        $("#changebutton").click(function() {
            var product_name = $("#product_name").val();
            var type_ID = $("#type_ID").val();
            var product_price = $("#product_price").val();
            var product_quantity = $("#product_quantity").val();
            var image = $("#image").val();
            product_name = product_name.replace(/[" "]/g, "");
           
            if (product_name == "")
            {
                alert("請輸入商品名稱!請勿輸入空白字元");
                return false;
            }
            else if (type_ID == "")
            {
                alert("請選擇商品類別!")
                return false;
            }
            else if (product_price == "")
            {
                alert("請輸入商品價錢!");
                return false;
            }
            else if (product_quantity == "")
            {
                alert("請輸入商品庫存量!");
                return false;
            }
            else if (image == "")
            {
                alert("請選擇商品圖片!");
                return false;
            }
        });
    </script>

</html>