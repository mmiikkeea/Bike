<?php
session_start();
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
	<title>修改個人資料</title>
	<style type="text/css">
		@import url("LondrinaOutline_Regular/stylesheet.css");
	   h1 {text-align:center;}
	   div {color:red}
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
	<script>

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
		
		/*function ValidateNumber(e, pnumber)
		{
			if (!/^\d+$/.test(pnumber))
			{
				e.value = /^\d+/.exec(e.value);
			}
			return false;
		}
		*/
		限制只能輸入數字
		function onlyNum(){
			if(!(event.keyCode>=0 && event.keyCode<=57)){){
				
				
				event.returnValue=false;
				phone_result.innerHTML="只能輸入數字";
			}
			else
				phone_result.innerHTML=""
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
			var flag=true;
			var name_result=document.getElementById("name_result");
			var email_result=document.getElementById("email_result");
			var phone_result=document.getElementById("phone_result");
			var address_result=document.getElementById("address_result");

			if(!nameCheck()){
				name_result.innerHTML="姓名欄不可為空值,\n";
				flag=false;
			}
			else
				name_result.innerHTML="";
				
			if(!emailCheck()){
				email_result.innerHTML="郵件欄不可為空值,\n";
				flag=false;
			}
			else
				email_result.innerHTML="";
				
			if(!phoneCheck()){
				phone_result.innerHTML="電話欄不可為空值,\n";
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
				
			if(true==flag){
				form.submit();
			}
			
		}
	</script>

  </head> 
  <body>
	
	<header>
			<? require_once'index_title.php'; ?>
			<hr/>
			
			
			<?php
		date_default_timezone_set('UTC'); 	
		$t=time();
		$y=date("Y",$t);		
		$age_limit=0;
	
		include("mysqlconnect.php");
		$ac=$_SESSION['account'];
		
		$sql="select member_firstname,member_secondname,member_sex,member_born,member_email,member_phone,member_address
			  from member where member_account=\"".$ac."\"";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		function select_option($value,$date){
			if($value==$date)
				echo "<option selected=\"selected\" value=".$value.">".$value."</option>";
			else
				echo "<option value=".$value.">".$value."</option>";
		}
  ?>
	<div align="center" style="margin-top:5px; ">
		<div class="content_title" >修改個人資料</div>
    </div>
	
	<br/>
	<div align="center">
	<form id="form" name="form" method="post" action="member_modify_info_finish.php" >
	
	<table border="0" align="center">    
	    <tr>
		<td>姓名：</td>
		<td colspan="2">
			<input type="textfield" id="firstname" name="firstname" value="<?php echo $row[0]; ?>" >
			<input type="textfield" id="secondname" name="secondname" value="<?php echo $row[1]?>" >
		</td>		
		<td><div id="name_result"></div></td>
	    </tr>
	    <tr>
		<td>性別：</td>
		<td colspan="2">
			<?php 
				if(1==$row[2])
				{
					echo "<input type=\"radio\" id=\"sex\" name=\"sex\" value=\"man\" checked=\"checked\">男";
					echo "<input type=\"radio\" id=\"sex\"  name=\"sex\" value=\"women\">女";
				}
				else
				{
					echo "<input type=\"radio\" id=\"sex\"  name=\"sex\" value=\"man\" >男";
					echo "<input type=\"radio\" id=\"sex\"  name=\"sex\" value=\"women\" checked=\"checked\">女";
				}
			?>
		</td>
	    </tr>
		<tr>
		<td>生日：</td>
		<td colspan="2">
			<?php
				$date=preg_split("/\//",$row[3]);
				//echo $date[0];
			?>
			<!--<select name=year onChange="changeDay(year.options[selectedIndex],month.options[selectedIndex],day)">-->
			<select id="year" name="year" onChange="changeDay(year,month,day)" >
				<?php 
					$y=date("Y",$t);					
					for($i=$y-100;$i<date("Y",$t)-$age_limit;$i++)
					{	
						select_option($i,$date[0]);
						/*if($i==$date[0])
							echo "<option selected=\"selected\" value=".$i.">".$i."</option>";
						else
							echo "<option value=".$i.">".$i."</option>";*/
					}
				?>
				
			</select>年		
				
			<!--<select name="month" onChange="changeDay(year.options[selectedIndex],month.options[selectedIndex],day)">-->
			<select id="month" name="month" onChange="changeDay(year,month,day)">	
				<?php
					for($m=1;$m<13;$m++){
						select_option($m,$date[1]);
						/*if($m==$date[1])
							echo "<option selected=\"selected\" value=".$m.">".$m."</option>";
						else
							echo "<option value=".$m.">".$m."</option>";*/
					}
				?>
						
			</select>月
			<select id="day" name="day">
				<?php
					for($d=1;$d<32;$d++)
					{	
					
						select_option($d,$date[2]);
						/*if($d==date[2])
							echo "<option value=".$d.">".$d."</option>";
						else
							echo "<option value=".$d.">".$d."</option>";*/
					}
				?>			
			</select>日
		
		</td>
	    </tr>

			
			
  	    <tr>
		<td>E-mail：</td>
		<td colspan="2">
		<?php
				$email=preg_split("/@/",$row[4]);
		?>
		<input type="textfield" id="mail_account" name="mail_account" value="<?php echo $email[0]?>" size=15>@
		<input type="textfield" id="mail_address" name="mail_address" value="<?php echo $email[1]?>" size=20></td>
		<td><div id="email_result"></div></td>
	    </tr>
 	    <tr>
		<td>電話：</td>
		<td colspan="2">
			<input type="textfield" id="phone" name="phone" value="<?php echo $row[5]?>" size=10 maxlength=10 style="ime-mode:disabled;" onkeydown="onlyNum()" onkeyup="this.value=this.value.replace(/[\u4e00-\u9fa5]/g,'')">
		</td>
		<td><div id="phone_result"></div></td>
	    </tr>
	    <tr>
		<td>住址：</td>
		<td colspan="2"><input type="textfield" id="address" name="address" value="<?php echo $row[6]?>"></td>
		<td><div id="address_result"></div></td>
	    </tr>	    
	    <tr>
		<td colspan="3" align="center">
			<input type="button" name="updatef" value="修改" onclick="formCheck(this.form)">
			<input type="button" name="clear" value="取消" onclick="location.href='member_center.php'">
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