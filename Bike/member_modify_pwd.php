<?php 
	session_start();
	$ac=$_SESSION['account'];
?>

<link href="/normalize.css" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
<meta name="description" content="Elastislide - A Responsive Image Carousel" />
<meta name="keywords" content="carousel, jquery, responsive, fluid, elastic, resize, thumbnail, slider" />
<meta name="author" content="Codrops" />
<link rel="shortcut icon" href="../favicon.ico"> 
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" type="text/css" href="css/LondrinaOutline_Regular/stylesheet.css" />
<script src="js/modernizr.custom.17475.js"></script> 
<link rel="stylesheet" type="text/css" href="css/myStyle.css" />
<html>

  <head>
	<title>修改密碼</title>
	<style type="text/css">
		@import url("LondrinaOutline_Regular/stylesheet.css");
	   h1 {text-align:center;}
	   div {
			color:red;}
	   
	   table{
				padding: 0px;
				color: #FFF;
				font-size: 20px;
				text-align: justify;
				text-align:center;
				font-family:"微软雅黑","黑体","宋体";
				background: rgba(0,0,0,0.65);
		}
			
			
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
				background-color:#FFF;cd
				color:#000;
				text-align:center;
			}
	</style>
	<script>
		var result;
		var flag1=false;
		var flag2=false;

		function pwdCheck(pwd){
			var xmlhttp;
			var result=document.getElementById("check_result");
			if(pwd=="")
			{
				result.innerHTML="";
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
					
					string=xmlhttp.responseText.split(">");
					string=string[1].split(" ");
					
					if(string[1]=="密碼錯誤"){
						result.innerHTML=xmlhttp.responseText;		
						flag1=false;
					}
					else{
						result.innerHTML="";		
						flag1=true;
					}
				}
			}		

			xmlhttp.open("GET","member_modify_pwdCheck.php?q="+pwd,true);
			xmlhttp.send();
		}
		function newPwdCheck(){
			var new_pwd1=document.getElementById("new_password");
			var new_pwd2=document.getElementById("check_passwork");
			var result=document.getElementById("check_result");
			/*if(new_pwd1.value=="" || new_pwd2.value==""){
				result1.innerHTML="新密碼欄不能為空";
				flag2=false;
				return;
				//alert("新密碼欄不能為空");
			}*/
			
			if(new_pwd1.value!=new_pwd2.value )
			{
				result.innerHTML="你輸入的新密碼不相等";
				flag2=false;
			}
			else{
				result.innerHTML="";
				flag2=true;
			}
			
		}
		//驗證密碼對錯
		function CheckForm(form){
			var result=document.getElementById("check_result");
			/*var str =result.innerHTML.split("");
			var flag=false;
			var string="";
			for(i=1;i<str.length;i++)
			{
				if(str[i]==">"){
					flag=true;
					continue;
				}
				if(flag==true)
					string+=str[i];
			}
			//var str=result.innerHTML.split(">");
			//string=str;
			string=string.split("");*/
			
			if(flag1 && flag2){
				form.submit();
			}
			else{
				result.innerHTML="你的舊密碼或新密碼輸入不正確";
			}
		}
	</script>
  </head>
  
  <body>
	<header>
			<? require_once'index_title.php'; ?>
			<hr/>
	
	<div align="center" style="margin-top:5px; ">
		<div class="content_title" >修改密碼</div>
    </div>
	<br/>
	
	<div align="center">
	<form id="form" name="form" method="post" action="member_modify_pwd_finish.php">
	<table border="0" align="center">
	    <tr>
		<td>原密碼：</td>
		<td colspan="2"><input id="old_password" type="password" name="old_password" value="" onkeyup="pwdCheck(this.value)"></td>
	    </tr>
	    <tr>
		<td>新密碼：</td>
		<td colspan="2"><input id="new_password" type="password" name="new_password" value="" onkeyup="newPwdCheck()"></td>
	    </tr>
	    <tr>
		<td>密碼確認：</td>
		<td colspan="2"><input id="check_passwork" type="password" name="check_passwork" value="" onkeyup="newPwdCheck()"></td>
		</td>
		<tr>
		<td colspan="4"><div id="check_result"></div></td>
	    <tr>
		<td colspan="4">
			<input id="send" type="button" name="send" value="送出" onclick="CheckForm(this.form)">
			<input id="back" type="button" name="clear" value="返回" onclick="location.href='member_center.php'">
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
  </body>
</html>