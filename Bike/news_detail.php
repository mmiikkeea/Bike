<?php
	session_start();
	@$_SESSION['id'];
	@$_SESSION['account'];
	@$_SESSION['name'];

	require_once("DB_config.php");
    require_once("DB_class.php");

    $db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	
	$newsArray = array();
	$imageArray = array();
	
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		
		$db->query("SELECT news.*, product.product_ID, product.product_image_path FROM news, product, newsproduct WHERE news.news_ID = newsproduct.news_ID AND product.product_ID = newsproduct.product_ID AND news.news_ID = '$id'");
		
		if($db->get_num_rows() != 0)
		{
			while($result = $db->fetch_array())
			{
				array_push($newsArray, $result['news_title'], $result['news_date'], $result['news_content'], $result['news_image']);
				array_push($imageArray, $result['product_ID'],$result['product_image_path']);
			}
		}
		else
		{
			$sql = mysql_query("SELECT * FROM news WHERE news_ID = '$id'");

			while($result2 = mysql_fetch_array($sql))
			{
				array_push($newsArray, $result2['news_title'], $result2['news_date'], $result2['news_content'], $result2['news_image']);
			}
		}
		
		$length = count($imageArray);
	}
	else
	{
		header("location:news_index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? echo "時事新聞"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--main page-->
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" type="text/css" href="css/myStyle.css" />
<script src="js/modernizr.custom.17475.js" type="text/javascript"></script>
<style type="text/css">
	@import url("css/LondrinaOutline_Regular/stylesheet.css");
	
	header {	
		background: url("images/page/SBike_bg.jpg");
		background-size: cover;
		margin: 0 auto;
		height: 900px;
	}
	
	nav{
		text-align:left;
	}
	
	a {
		color: white;
	}   
	
	li {
		display: inline;
		padding: 0px 10px 0px 10px;
	}
	
	ul.topstyle{
		font-family: "LondrinaOutline Regular";
		font-size: 25px;
		padding: 10px;
		background: rgba(0,0,0,0.65);
	}
	
	footer{
		background-color:#FFF;
		color:#000;
	}
	
	.content{
		padding: 10px;
		color:#FFF;
		font-size: 20px;
		text-align: justify;
		font-family:"微软雅黑","黑体","宋体";
		text-align:center;
	}
</style>
</head>

<body>
<header>
    <? require_once("index_title.php"); ?>
	<hr />
    
	<!--於以下開始編輯-->
	<div class="content">
    	<div>&nbsp;</div>
    	<div class="menu">
            <div class="menu_item"><a href="news_index.php">時事新聞</a></div>
            <?
				if($_SESSION['account'] == "admin")
				{
					echo "<div class='menu_item'><a href='news_create_index.php'>新增新聞</a></div>";		
					echo "<div class='menu_item'><a href='news_modify_index.php'>修改新聞</a></div>";
					echo "<div class='menu_item'><a href='news_delete_index.php'>刪除新聞</a></div>";
				}
			?>
    	</div>
    	<div style="position:absolute; left:250px; width:600px; height:600px; overflow:auto; background:rgba(0,0,0,0.65); text-align:left; padding:5px">
            <span><h3><? echo $newsArray[0]; ?></h3></span>
            <span>發佈日期 : <? echo $newsArray[1]; ?></span><br><br>
            <span><? if($id != 0){echo html_entity_decode($newsArray[2]);} ?></span><br>
        </div>
        <div style="position:absolute; left:900px;">
        	<font style="background: rgba(0,0,0,0.65)">新聞圖片</font><br>
        	<img src="<? echo "images/news/".$newsArray[3]; ?>" width="400px" height="300px" border="0">
        </div>
        <div class="container demo-4" style="position:absolute; top:450px; left:900px; width:400px"><br>
        	<font style="background: rgba(0,0,0,0.65)"><? if(count($imageArray) != 0){ echo "相關產品"; } ?></font>
            <div class="main">
                <div class="gallery">
                    <!-- Elastislide Carousel -->
               		<ul id="carousel" class="elastislide-list">
                    <?
						for($i=0; $i<$length; $i+=2)
						{
							echo "<li data-preview='".$imageArray[$i+1]."'><a href='product.php?product_ID=".$imageArray[$i]."'>
							<img width='100px' height='80px' src='".$imageArray[$i+1]."'></a></li>";
						}
					?>
                    </ul>
                    <!-- End Elastislide Carousel -->
                </div>
            </div>
        </div>
    </div>
    	
    <!-- show photo  -->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="js/jquery.elastislide.js"></script>
    
    <script>
    // example how to integrate with a previewer
        var current = 0,
            $preview = $( '#preview' ),
            $carouselEl = $( '#carousel' ),
            $carouselItems = $carouselEl.children(),
                carousel = $carouselEl.elastislide({
                current : current,
                minItems : 4,
                
                /*onClick : function( el, pos, evt ) {
                    changeImage( el, pos );
                    evt.preventDefault();
                },*/
                
                onReady : function() {
                    changeImage( $carouselItems.eq( current ), current );
                }
            });
    
        function changeImage( el, pos ) {
            $preview.attr( 'src', el.data( 'preview' ) );
            $carouselItems.removeClass( 'current-img' );
            el.addClass( 'current-img' );
            carousel.setCurrent( pos );
        }
    </script>
</header>

<footer align="center">
    <p>&nbsp;</p>
    <p>&nbsp;版權所有：史拜客股份有限公司 @Copyright 客服專線市話：4055-9553 &nbsp;&nbsp;
    <a href="mailto:xxx@example.com"><img src="mail.jpg" width="40" height="28"/></a>
    </p>
    <p>&nbsp;</p>
</footer>
</body>
</html>