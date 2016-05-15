<?php
	session_start();
	@$_SESSION['id'];
	@$_SESSION['account'];
	@$_SESSION['name'];
	
	if($_SESSION['account'] != "admin")
	{
		header("Location:member_login.php");
	}
	
	require_once("DB_config.php");
    require_once("DB_class.php");
	
	$db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	
	$page = empty($_GET["page"]) ? 1 : $_GET["page"]; /* 條件A?狀況A:狀況B  當條件A成立時是狀況A否則狀況B */
    $count = 5;
    $start = ($page - 1) * $count;
	
    $db->query("SELECT * FROM news ORDER BY news_date DESC LIMIT $start,$count");
	
	$idArray = array();
	$titleArray = array();
	$imageArray = array();
	$dateArray = array();
	
	while($result = $db->fetch_array())
	{
		array_push($idArray, $result['news_id']);
		array_push($titleArray, $result['news_title']);
		$imagePath = "images/news/";
		array_push($imageArray, $imagePath.$result['news_image']);
		array_push($dateArray, $result['news_date']);
	}
	
	$length = count($idArray);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改新聞</title>
<!--hoverpulse-->
<script src="js/jquery-1.10.2.min.js" type="text/javascript" ></script>
<script src="js/jquery.hoverpulse.js" type="text/javascript"></script>
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
		color: #FFF;
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
		color: #FFF;
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
    <div class="content" >
    	<div>&nbsp;</div>
    	<div class="menu" style="float:left">
            <div class="menu_item"><a href="news_index.php">時事新聞</a></div>
            <div class="menu_item"><a href="news_create_index.php">新增新聞</a></div>		
            <div class="menu_item"><a href="news_modify_index.php">修改新聞</a></div>
            <div class="menu_item"><a href="news_delete_index.php">刪除新聞</a></div>
    	</div>
		<div style="position:absolute; left:350px">
        	<table border="1" style="text-align:center; background: rgba(0,0,0,0.65);">
                <tr>
                    <td></td>
                    <td>新聞標題</td>
                    <td>發佈日期</td>
                </tr>
				<?
                    for($i=0;$i<$length;$i++)
                    {
						echo "<tr>";
                        echo "<td><div class='thumb' style='width:100px;height:75px'><img width='100' height='75px' src='".$imageArray[$i]."'></div></td>";
                        echo "<td><a href='news_modify_detail.php?id=".$idArray[$i]."'>".$titleArray[$i]."</a></td>";
						echo "<td>".$dateArray[$i]."</td>";
						echo "</tr>";
                    }
                ?>
            </table><br>
            <div align="center" style="clear:both; text-align:center">
			<?
				$db->query("SELECT * FROM news");
				$sum = $db->get_num_rows();
				$page_count = ceil($sum/$count);/*ceil 整數*/
				for ($i = 0;  $i < $page_count;  $i++)
				{
					if (($i + 1) == $page) {
						?>
						<span class="page_item" ><? echo ($i + 1); ?></span>
						<?
					} else {
						?>
						<a class="page_item" href="news_modify_index.php?page=<? echo ($i + 1);?>"><? echo ($i + 1); ?></a>
					<?
					}
				}
        	?>
    		</div>
    	</div>
    </div>
    
    
    <script>      
		$(document).ready(function() {
			$("div.thumb img").hoverpulse({
				size: 40,  // 圖片縮放的大小
				speed: 300 // 圖片變換大小的速度 
			});
		});
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