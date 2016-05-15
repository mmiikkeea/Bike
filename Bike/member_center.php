<?php
	session_start();
	
?>
<link href="/normalize.css" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
<meta name="description" content="Elastislide - A Responsive Image Carousel" />
<meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
<meta name="author" content="Codrops" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
<script src="js/modernizr.custom.17475.js"></script> 
<link rel="stylesheet" type="text/css" href="css/myStyle.css" />

<html>
	<head>	
		<title>會員中心</title>
		<style type="text/css">
			 @import url("LondrinaOutline_Regular/stylesheet.css");
			h1 {text-align:center;}	   
			tr {text-align:center;}	

			
			header {
				text-align: center;
				background: url("images/page/sbike_m1.jpg");
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
			ul.topstyle{
				font-family:"LondrinaOutline Regular";
				font-size: 25px;
				padding: 10px;
				background: rgba(0,0,0,0.65);
			}
			li {
				display: inline;
				padding: 0px 10px 0px 10px;
			}
			content {
				padding: 0px;
				color: #FFF;
				font-size: 20px;
				text-align: justify;
				font-family:"微软雅黑","黑体","宋体";
				text-align:center;
				
			}
			footer{
				color:#000;
				font-size: x-small;
				text-align:center;
			}
			
	}
		</style>	
	</head>
	
	<body>
		<header>
			<? require_once'index_title.php'; ?>
			<hr />
			<div align="center" style="margin-top:5px; ">

				<?php
				if($_SESSION['login_session']){
					//echo "<h1>會員中心</h1>";
					//echo "<hr>";
					//echo "<table border=\"0\" align=\"center\">";
					echo "<ul>";
					echo "<li><a href=\"member_modify_pwd.php\"><div class=\"content_title\" >變更密碼</div></li>";
					echo "<li><a href=\"member_modify_info.php\"><div class=\"content_title\" >修改個人資料</a></li>";

					//echo "<li><a href=\"index.php\"><div class=\"content_title\" >查詢訂單</a></li>";
					
					if(1==$_SESSION['authority'])
						echo "<li><a href=\"member_view.php\"><div class=\"content_title\" >查詢所有會員資料</a></li>";
						
					echo "<ul>";
					//echo "<tr>";
					//echo "<td colspan=\"2\" align=\"center\"><input type=\"button\" name=\"return\" value=\"回首頁\" onclick=\"location.href='index.php'\"></td>";
					//echo "</tr>";
					//echo "</table>";
				}
				else{
					//echo "請先登入";
					echo "<meta http-equiv=REFRESH CONTENT=0;url=member_login.php>";
				}
		
				?>
				</div>
		</header>
		<footer>
			<p>
			&nbsp;&nbsp; 
			<p>&nbsp;版權所有：史拜客股份有限公司  @Copyright  客服專線市話：4055-9553  &nbsp;&nbsp;&nbsp;&nbsp;<img src="mail.jpg" width="40" height="28"/><a href="mailto:xxx@example.com" />
			</p>
			<p>&nbsp;</p>
		</footer>
  	</body>
</html>