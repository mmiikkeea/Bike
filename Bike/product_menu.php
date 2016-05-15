
<div>
    <?php
    $page = empty($_GET["page"]) ? 1 : $_GET["page"]; /* 條件A?狀況A:狀況B  當條件A成立時是狀況A否則狀況B */
    $count = 6;
    $start = ($page - 1) * $count;
    $sql = "SELECT `type_name`,`type_ID` FROM `product_type` "; /* limit 從第幾個開始取 ,取幾個 */
    $result = mysql_query($sql) or die('MySQL query error');
    ?>
    <div 
        style="
        width: 209px;
        height: 60px;
        border: outset;
        border-width: 9px;
        border-style: double;
        margin: 10px 0px 0px 1px;
        padding: 5px;
        color: darkslategrey;
        font-size: 25px;
        text-align: center;
        background: rgba(1000,2000,2000,0.65);
        font-family: '微软雅黑';">產品類別</div>
        <?php
        while ($row = mysql_fetch_array($result)) {
            ?>

            <form action="product_index.php">
            <input type="hidden" name="type_ID" value="<?php echo $row['type_ID']; ?>"/>
            <input class="menu_item" type="submit" value="<?php echo $row['type_name']; ?>"/>
            </form>

            <?php
        }
        ?>

        <?php
        if ($_SESSION["account"]=="admin") {
            ?> 
            <form action="product_insert.php"> <input class="insert" type="submit" value="新增產品" /></form>
              <?php
        } else {
           } ?>
    </div>