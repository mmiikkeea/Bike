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
	<title>登入</title>
    <style type="text/css">
		@import url("LondrinaOutline_Regular/stylesheet.css");
		
		table{
				padding: 0px;
				color: #FFF;
				font-size: 20px;
				text-align: justify;
				text-align: center;
				font-family:"微软雅黑","黑体","宋体";
		}	   
		div {color:red}
	   
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
			footer{
				color:#000;
				font-size: x-small;
				text-align:center;
			}
			
	</style>
  <script>
	function loginCheck(form){
		var xmlhttp;
		var ac=document.getElementById("account");
		var pwd=document.getElementById("password");	
		var res=document.getElementById("result");
		var str=ac.value+","+pwd.value;
		if(ac.value=="" || pwd.value==""){
			res.innerHTML="帳密輸入不完整";
			return;
		}
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}		
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				res.innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","member_login_finish.php?q="+str,true);
		xmlhttp.send();		
		//if(ac.value!="" && pwd.value!=""){
			//if(
			//form.submit();			
		//}
	} 
 
  </script>
  </head>
  <body>
	<header>
			<? require_once'index_title.php'; ?>
			<hr/>
	
	<div align="center" style="margin-top:5px; ">
                <div class="content_title" >登入</div>
            </div>
			<br/>
	<div align="center">
	<form id="form" name="form" method="post" action="member_login_finish.php">
	<table border="0" align="center">
		<tr>
			<td>帳號：</td>
			<td colspan="2"><input type="textfield" id="account" name="account" value="" onmouseout="check()"></td>
		</tr>
		<tr>
			<td>密碼：</td>
			<td colspan="2"><input type="password" id="password" name="password" value=""></td>
		</tr>	 
		<tr>	    
			<td colspan="2">
				<div id="result"> <div>
			</td>
	    </tr>
		<tr>
			<td colspan="2">
				<input type="button" name="login" value="登入" onclick="loginCheck(this.form)">
				<!--<input type="button" name="return" value="返回" onclick="location.href='index2.php'">-->
			</td>
	    </tr>		
	</table>
	</form>	
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