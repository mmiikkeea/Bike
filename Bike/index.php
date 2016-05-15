<?php
	session_start();
	@$_SESSION['login_session'];	
	@$_SESSION['id'];
	@$_SESSION['account'];
	@$_SESSION['name'];
	@$_SESSION['authority'];
	
	if(empty($_SESSION['login_session']))
	{
		@$_SESSION['login_session']=false;
	}
	if(empty($_SESSION['id'])){
		$_SESSION['id']=0;
	}
	if(empty($_SESSION['account'])){
		$_SESSION['account']="";
	}
	if(empty($_SESSION['name'])){
		$_SESSION['name']="";
	}
	if(empty($_SESSION['authority'])){
		$_SESSION['authority']="";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SBike 單車購物網</title>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<script src="js/modernizr.custom.17475.js"></script>
<!--hoverpulse-->
<script src="js/jquery-1.10.2.min.js" type="text/javascript" ></script>
<script src="js/jquery.hoverpulse.js" type="text/javascript"></script>
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
	
	nav {
		text-align:left;
	}
	
	a {
		color: white;
	}
	
	h1 {
		font-size: 70px;
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
	/* 0103改了這邊 */ 
	
	/* 0103改了這邊 */
	footer{
		color:#000;
		font-size: x-small;
		text-align:center;
	}
</style>
</head>

<body>
<header>
	<? require_once("index_title.php"); ?>
 	<hr />
    
  	<table width="auto" height="327" border="0" style="margin:30px 10px 0 50px" >
  		<tr>
    		<th width="478" height="321" align="left" scope="row">
                <div class="container demo-4">
                    <div class="main" align="left">
                        <div class="gallery" >
                            <!-- Elastislide Carousel -->
                            <ul id="carousel" class="elastislide-list">
                             	<li data-preview="images/large/1.jpg"><a href="#"><img src="images/small/1.jpg" alt="image01" /></a></li>
                                <li data-preview="images/large/2.jpg"><a href="#"><img src="images/small/2.jpg" alt="image02" /></a></li>
                                <li data-preview="images/large/3.jpg"><a href="#"><img src="images/small/3.jpg" alt="image03" /></a></li>
                                <li data-preview="images/large/4.jpg"><a href="#"><img src="images/small/4.jpg" alt="image04" /></a></li>
                                <li data-preview="images/large/5.jpg"><a href="#"><img src="images/small/5.jpg" alt="image05" /></a></li>
                                <li data-preview="images/large/6.jpg"><a href="#"><img src="images/small/6.jpg" alt="image06" /></a></li>
                                <li data-preview="images/large/7.jpg"><a href="#"><img src="images/small/7.jpg" alt="image07" /></a></li>
                                <li data-preview="images/large/8.jpg"><a href="#"><img src="images/small/8.jpg" alt="image08" /></a></li>
                                <li data-preview="images/large/9.jpg"><a href="#"><img src="images/small/9.jpg" alt="image09" /></a></li>
                                <li data-preview="images/large/10.jpg"><a href="#"><img src="images/small/10.jpg" alt="image10" /></a></li>
                                <li data-preview="images/large/11.jpg"><a href="#"><img src="images/small/11.jpg" alt="image11" /></a></li>
                                <li data-preview="images/large/12.jpg"><a href="#"><img src="images/small/12.jpg" alt="image12" /></a></li>
                                <li data-preview="images/large/13.jpg"><a href="#"><img src="images/small/13.jpg" alt="image13" /></a></li>
                                <li data-preview="images/large/14.jpg"><a href="#"><img src="images/small/14.jpg" alt="image14" /></a></li>
                                <li data-preview="images/large/15.jpg"><a href="#"><img src="images/small/15.jpg" alt="image15" /></a></li>
                                <li data-preview="images/large/16.jpg"><a href="#"><img src="images/small/16.jpg" alt="image16" /></a></li>
                                <li data-preview="images/large/17.jpg"><a href="#"><img src="images/small/17.jpg" alt="image17" /></a></li>
                                <li data-preview="images/large/18.jpg"><a href="#"><img src="images/small/18.jpg" alt="image18" /></a></li>
                                <li data-preview="images/large/19.jpg"><a href="#"><img src="images/small/19.jpg" alt="image19" /></a></li>
                                <li data-preview="images/large/20.jpg"><a href="#"><img src="images/small/20.jpg" alt="image20" /></a></li>
                            </ul>
                            <!-- End Elastislide Carousel -->
                            <div class="image-preview"><img src="images/large/1.jpg" alt="" id="preview" /></div>
                        </div>
                    </div>
                </div>
    		</th>
    		<td width="100%" align="middle" valign="top" style="font-size:22px">
				<?
                    require("news.php");
                ?>
   	 		</td>
    	</tr>
    </table>
    <!--<script>
        function function1()
        {
            document.getElementById('bikelink').innerHTML="此為第一部腳踏車，請見商品頁";
            document.getElementById('bikelink').href="http://www.google.com";
            document.getElementById('bikelink').target="_blank";
        }
        function function2()
        {
            document.getElementById('bikelink').innerHTML="此為第二部腳踏車，請見商品頁";
            document.getElementById('bikelink').href="http://www.google.com";
            document.getElementById('bikelink').target="_blank";
        }
        function function3()
        {
            document.getElementById('bikelink').innerHTML="此為第三部腳踏車，請見商品頁";
            document.getElementById('bikelink').href="http://www.google.com";
            document.getElementById('bikelink').target="_blank";
        }
        function function4()
        {
            document.getElementById('bikelink').innerHTML="此為第四部腳踏車，請見商品頁";
            document.getElementById('bikelink').href="http://www.google.com";
            document.getElementById('bikelink').target="_blank";
        }
        function function5()
        {
            document.getElementById('bikelink').innerHTML="此為第五部腳踏車，請見商品頁";
            document.getElementById('bikelink').href="http://www.google.com";
            document.getElementById('bikelink').target="_blank";
        }
    </script>-->

	<!--show photo-->
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
				
				onClick : function( el, pos, evt ){
					changeImage( el, pos );
					evt.preventDefault();
				},
				
				onReady : function(){
					changeImage( $carouselItems.eq( current ), current );
		
				}
			});
			
		function changeImage( el, pos ){
			$preview.attr( 'src', el.data( 'preview' ) );
			$carouselItems.removeClass( 'current-img' );
			el.addClass( 'current-img' );
			carousel.setCurrent( pos );
		}
	</script>

	<script>      
		$(document).ready(function() {
			$("div.thumb img").hoverpulse({
				size: 40,  // 圖片縮放的大小
				speed: 300 // 圖片變換大小的速度 
			});
		});
	</script>
</header>

<!--0103改了這邊--> 
<footer>
    <p>&nbsp;</p>
    <p>&nbsp;版權所有：史拜客股份有限公司 @Copyright 客服專線市話：4055-9553 &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="mailto:xxx@example.com"><img src="mail.jpg" width="40" height="28"/></a>
    </p>
    <p>&nbsp;</p>
</footer>
</body>
</html>
