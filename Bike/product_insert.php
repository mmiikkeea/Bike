<?php
session_start();
$conn = mysql_connect("localhost", 'root', '') or die('Error with MySQL connection');
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bike");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
        <script src="js/modernizr.custom.17475.js"></script> 
        <script src="js/jquery-1.10.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/myStyle.css" />
        <title>商品</title>
        <style type="text/css">

            div.product{
                width: 60%;
                height: 156px;
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
                <div class="content_title" >新增商品</div>
            </div>
            <div class="my_body">
                <div class="menu">
                    <?php require_once 'product_menu.php'; ?>
                </div>
                <?php
                $sql = "SELECT product_ID, p.type_ID type_ID,type_name,product_name,product_price, product_image_path, product_quantity "
                        . "FROM `product` p,`product_type` pt ";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);
                ?>
                <div class="product_list">
                    <div class="product_img">
                        <br>
                    </div>      
                    <div class = "product">                           
                        <form action="pro_insert.php" method="POST" name="" enctype="multipart/form-data">
                            <p>商品名稱 : <input type="text" name="product_name" value="" id="product_name" maxLength="20"/>請勿輸入空白字元</p>
                            <p>商品種類 : 
                                <?php
                                $type_sql = "SELECT type_ID,type_name "
                                        . "FROM `product_type` ";
                                $type_result = mysql_query($type_sql);
                                ?>
                                <select name="type_ID" id="type_ID">
                                    <?php
                                    while ($type_row = mysql_fetch_array($type_result)) {
                                        ?>
                                        <option value="<?php echo $type_row['type_ID'] ?>"><?php echo $type_row['type_name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </p>
                            <p>商品價錢 : <input type="text" name="product_price" value="" id="product_price" onkeyup="return ValidateNumber(this, value)"maxLength="10"/>請輸入數字</p>
                            <p>商品庫存量 : <input type="text" name="product_quantity" value="" id="product_quantity" onkeyup="return ValidateNumber(this, value)"maxLength="10"/>請輸入數字</p>
                            <p>圖片<input name="image" id="image" type="file" style="font-size:15px; text-align:center" /></p>
                            <br>
                            <input class="product_item" type="submit" value="送出" id="insertbutton"/>
                        </form>

                    </div>
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
        $("#insertbutton").click(function() {
            var product_name = $("#product_name").val(), type_ID = $("#type_ID").val(), product_price = $("#product_price").val(), product_quantity = $("#product_quantity").val(), image = $("#image").val();
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