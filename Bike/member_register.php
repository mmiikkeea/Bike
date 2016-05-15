<?php session_start() ?>
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
	<title>註冊</title>
	<style>
		h1 {text-align:center;}
		div {color:red;}
		table{
				padding: 0px;
				color: #FFF;
				font-size: 20px;
				text-align: justify;
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
				color:#000;
				font-size: x-small;
				text-align:center;
			}
	</style>
	<Script>
		var a;
		var ac_flag=false;
		var pwd_result=document.getElementById("pwd_result");
		var name_result=document.getElementById("name_result");
		var email_result=document.getElementById("email_result");
		var phone_result=document.getElementById("phone_result");
		var address_result=document.getElementById("address_result");
		function CheckForm(){
			return a;
		}
		function accountcheck(str){

			var xmlhttp;
			var img=document.getElementById("accheck_result_img");
			var result=document.getElementById("accheck_result");
			if(str=="")
			{
				img.src="";
				result.innerHTML="";
				ac_flag=false;
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

					
					if(string[1]=="可註冊"){
						ac_flag=true;
						img.src="images/member/green.png";
						result.innerHTML="";
						
					}
					else{
						ac_flag=false;
						img.src="images/member/error.png";
						result.innerHTML=string[1];
					}					
					//img.src=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","member_register_accountcheck.php?q="+str,false);
			xmlhttp.send();
			
		}
		
		function changeDay(y,m,d){
		
			month=new Array(31,28,31,30,31,30,31,31,30,31,30,31);
			//var y=year.selectedIndex;
			//var m=month.selectedIndex;
			y=y.options[y.selectedIndex].value;
			m=m.options[m.selectedIndex].value;

			
			//判斷閏年
			var leap_year=false;
			if((0==y%4 && 0!=y%100) || 0==y%400)
				leap_year=true;
			
			if(true==leap_year)
				month[1]=29;
	
			d.options.length=0;
			
			for(i=1;i<=month[m-1];i++)
				d.options.add(new Option(i,i));

		}
		
		//限制只能輸入數字
		function onlyNum(){
			var phone_result=document.getElementById("phone_result");
					
			
			//var str1=phone.value.split("");
			//var str2="";
			//for(i=0;i<str1.length-1;i++)
			//	str2+=str1[i];
			//alert(event.keyCode);
			if(!(event.keyCode>=0 && event.keyCode<=57)){
				
				
				event.returnValue=false;
				phone_result.innerHTML="只能輸入數字";
			}
			else
				phone_result.innerHTML=""
			
			//alert(event.returnValue);
			//if(even
				//phone.value=str2;
				//alert(event.keyCode);
				//result.innerHTML="只能輸入英文";
				
				//return false;
			
			
		}

		function pwdCheck(){ 
			var pwd=document.getElementById("password");
			if(pwd.value!="")
				return true;
			else 
				return false;
		
		}
		function nameCheck(){
			var f_name=document.getElementById("firstname");
			var s_name=document.getElementById("secondname");
			if(f_name.value!="" && s_name.value!="")
				return true;
			else
				return false;
			
		}
		function emailCheck(){
			var mail_account=document.getElementById("mail_account");
			var mail_address=document.getElementById("mail_address");
			if(mail_address.value!="" && mail_account.value!="")
				return true;
			else
				return false;
			
		}
		function phoneCheck(){
			var phone=document.getElementById("phone");
			if(phone.value!="")
				return true;
			else
				return false;
		}
		function addressCheck(){
			var address=document.getElementById("address");
			if(address.value!="")
				return true;
			else
				return false;
		}
		function formCheck(form){
			var str="";
			var flag=true;
			var pwd_result=document.getElementById("pwd_result");
			var name_result=document.getElementById("name_result");
			var email_result=document.getElementById("email_result");
			var phone_result=document.getElementById("phone_result");
			var address_result=document.getElementById("address_result");
			if(!ac_flag){
				//str+="帳號欄位輸入或該帳號已被註冊,\n";
				flag=false;
			}
			
			if(!pwdCheck()){
				pwd_result.innerHTML="密碼欄格式錯誤或為空值";
				flag=false;
			}
			else
				pwd_result.innerHTML="";
				
			if(!nameCheck()){
				name_result.innerHTML="姓名欄不可為空值";
				flag=false;
			}
			else
				name_result.innerHTML="";
			
			if(!emailCheck()){
				email_result.innerHTML="郵件欄不可為空值";
				flag=false;
			}
			else
				email_result.innerHTML="";
				
			if(!phoneCheck()){
				phone_result.innerHTML="電話欄不可為空值";
				flag=false;
			}
			else
				phone_result.innerHTML="";
				
			if(!addressCheck()){
				address_result.innerHTML="住址欄不可為空值";
				flag=false;
			}
			else
				address_result.innerHTML="";

			if(flag){
				form.submit();
			}		
		}
		function all_reset(form){
			var pwd_result=document.getElementById("pwd_result");
			var name_result=document.getElementById("name_result");
			var email_result=document.getElementById("email_result");
			var phone_result=document.getElementById("phone_result");
			var address_result=document.getElementById("address_result");
			form.reset();
			pwd_result.innerHTML="";
			name_result.innerHTML="";
			email_result.innerHTML="";
			phone_result.innerHTML="";
			address_result.innerHTML="";
			
		}
		
	</Script>
  </head>
  
  <body>
	<header>
			<? require_once'index_title.php'; ?>
			<hr/>
  
	<?php date_default_timezone_set('UTC'); 	
		$t=time();
		$y=date("Y",$t);
		$age_limit=0;
	?>
	
	<div align="center" style="margin-top:5px; ">
		<div class="content_title" >註冊</div>
    </div>
	<br/>
	<div align="center">
	<form id="form" name="form" method="post" action="member_register_finish.php" >
	<table border="0" align="center">
	    <tr>
		<td>帳號：</td>
		<td colspan="2">
		    <input type="textfield" id="account" name="account" value="" maxlength=10 onkeyup="accountcheck(this.value)" >
		    <h6 style=" color:red;">限制10碼</h6>
		</td>
		<td>
			<img id="accheck_result_img" src="" style="display:block"></img>
			<div id="accheck_result"></div>
		</td>
	    </tr>
	    <tr>
		<td>密碼：</td>
		<td colspan="2"><input type="password" id="password" name="password" value=""></td>
		<td><div id="pwd_result"></div></td>
	    </tr>
	    <tr>
		<td>姓名：</td>
		<td colspan="2">
		<input type="textfield" id="firstname" name="firstname" value="">
		<input type="textfield" id="secondname" name="secondname" value="">
		</td>
		<td><div id="name_result"></div></td>
	    </tr>
	    <tr>
		<td>性別：</td>
		<td colspan="2">
			<input type="radio" id="sex" name="sex" value="man" checked="checked">男
			<input type="radio" id="sex" name="sex" value="women">女
		</td>
	    </tr>
            <tr>
		<td>生日：</td>
		<td colspan="2">
		
			<!--<select name=year onChange="changeDay(year.options[selectedIndex],month.options[selectedIndex],day)">-->
			<select id="year" name="year" onChange="changeDay(year,month,day)">
				<?php 
					$y=date("Y",$t);					
					for($i=$y-100;$i<date("Y",$t)-$age_limit;$i++)
						echo "<option value=".$i.">".$i."</option>"						
				?>
				
			</select>年		
				
			<!--<select name="month" onChange="changeDay(year.options[selectedIndex],month.options[selectedIndex],day)">-->
			<select id="month" name="month" onChange="changeDay(year,month,day)">	
				<?php
					for($m=1;$m<13;$m++)
						echo "<option value=".$m.">".$m."</option>";
				?>
						
			</select>月
			<select id="day" name="day">
				<?php
					for($d=1;$d<32;$d++)
						echo "<option value=".$d.">".$d."</option>";
				?>			
			</select>日
		
		</td>
	    </tr>
  	    <tr>
		<td>E-mail：</td>
		<td colspan="2">
		<input type="textfield" id="mail_account" name="mail_account" value="" size=15>@
		<input type="textfield" id="mail_address" name="mail_address" value="" size=20></td>
		<td><div id="email_result"></div></td>
	    </tr>
 	    <tr>
		<td>電話：</td>
		<td colspan="2">
			<input type="textfield" id="phone" name="phone" value="" size=10 maxlength=10 style="ime-mode:disabled;" onkeydown="onlyNum()" onkeyup="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')">
			<td><div id="phone_result"></div></td>
		</td>
	    </tr>
	    <tr>
		<td>住址：</td>
		<td colspan="2"><input type="textfield" id="address" name="address" value=""></td>
		<td><div id="address_result"></div></td>
	    </tr>
	    	    
	    <!--<tr>
		<td>驗證碼：</td>
		<td><input type="textfield" name="E-mail" value=""></td>
		<td>1234</td>
	    </tr>
	    -->
	    <tr>
		<td colspan="3" align="center">
			<input id="confirm" type="button" name="confirm" value="確認" onclick="formCheck(this.form)">
			<input id="clear" type="button" name="clear" value="清除" onclick="all_reset(this.form)">
			<!--<input id="return" type="button" name="return" value="返回" onclick="location.href='index.php'">-->
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