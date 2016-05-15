<?php session_start()?>
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
	<title>觀看會員所有資料</title>
	<style>
		@import url("LondrinaOutline_Regular/stylesheet.css");
		h1 {text-align:center;}
		div {color:red;}
			table{
				border: 1px solid rgb(255, 255, 255); 
				background: rgba(255,255,255,0.3);
				
				
			}
			tr{
				border: 0.5px solid rgb(255, 255, 255); 
				background: rgba(255,255,255,0.3);
				
			}

			th{
				border: 1px solid rgb(255, 255, 255); 
				background: rgba(100,150,255,0.8);
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
			input.textfiled_style{
				background: rgba(255,255,255,0.01);
				text-align: center;
				color: black;
				border:0px;
			}

	</style>
	<Script>
		function send_date(id){
			
			var account=document.getElementById("account_"+id);			
			var pwd=document.getElementById("pwd_"+id);
			var f_name=document.getElementById("f_name_"+id);
			var s_name=document.getElementById("s_name_"+id);
			var regist_date=document.getElementById("regist_date_"+id);
			var authority=document.getElementById("authority_"+id);
			var str=id+","+account.value+","+pwd.value+","+f_name.value+","+s_name.value+","+regist_date.value+","+authority.value;
			alert(str);
			var xmlhttp;
			var res=document.getElementById("memberTable");
			
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
			xmlhttp.open("GET","member_view_update.php?id="+id+"&account="+account.value+"&pwd="+pwd.value+"&f_name="+f_name.value+"&s_name="+s_name.value
				+"&regist_date="+regist_date.value+"&authority="+authority.value+"&time="+Math.random(),true);
			xmlhttp.send();		
		}
		function update_data(id){
			var account=document.getElementById("account_"+id);
			account.className ="";
			account.removeAttribute('disabled');
			
			var pwd=document.getElementById("pwd_"+id);
			pwd.className ="";
			pwd.removeAttribute('disabled');

			var f_name=document.getElementById("f_name_"+id);
			f_name.className ="";
			f_name.removeAttribute('disabled');
			
			var s_name=document.getElementById("s_name_"+id);
			s_name.className ="";
			s_name.removeAttribute('disabled');
			
			var regist_date=document.getElementById("regist_date_"+id);
			regist_date.className ="";
			regist_date.removeAttribute('disabled');
			
			var authority=document.getElementById("authority_"+id);
			authority.className ="";
			authority.removeAttribute('disabled');
			
			var send=document.getElementById("send_"+id);
			send.removeAttribute('disabled');
			
			var update=document.getElementById("update_"+id);
			update.newAttribute('disabled');

		}
		function delete_data(id){
			var xmlhttp;
			var res=document.getElementById("memberTable");
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
			xmlhttp.open("GET","member_view_delete.php?id="+id,true);
			xmlhttp.send();		

		}
	</Script>
  </head>  
	<body>
		<header>
			<? require_once'index_title.php'; ?>
			<hr/>
			<?php				
			//echo $_SESSION['login_session'];
				if(@$_SESSION['login_session'] && 1==$_SESSION['authority']){
					include("mysqlconnect.php");
					$sql="select * from member";
					$result=mysql_query($sql);
						
					echo 
						"<div align=\"center\" style=\"margin-top:5px; \">
							<div class=\"content_title\" >會員資料</div>
						</div>
						<br/>

						<div id=\"memberTable\" name=\"memberTable\" align=\"center\">
								<table align=\"center\">
									<tr align=\"center\">
										<th>會員編號</th>
										<th>帳號</th>									
										<th>密碼</th>
										<th>姓</th>
										<th>名</th>
										<!--<th>性別</th>
										<th>出生日期</th>
										<th>郵件</th>									
										<th>電話</th>
										<th>住址</th>-->
										<th>註冊日期</th>
										<th>權限</th>
									</tr>";
									while($row = mysql_fetch_row($result)){
										//echo "<form id=\"form_\"".$row[0]."name=\"form_\"".$row[0].">";
										echo "<tr >";
										/*echo "<td>".$row['0']."</td>";
										echo "<td>".$row['1']."</td>";
										echo "<td>".$row['2']."</td>";
										echo "<td>".$row['3']."</td>";
										echo "<td>".$row['4']."</td>";
										//echo "<td>".$row['5']."</td>";
										//echo "<td>".$row['6']."</td>";
										//echo "<td>".$row['7']."</td>";
										//echo "<td>".$row['8']."</td>";
										//echo "<td>".$row['9']."</td>";
										echo "<td>".$row['10']."</td>";
										echo "<td>".$row['11']."</td>";
										*/
										
										echo "<td><input type=\"textfield\" id=\"id_".$row[0]."\" name=\"id_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[0]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"account_".$row[0]."\" name=\"account_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[1]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"pwd_".$row[0]."\" name=\"pwd_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[2]."\" size=\"8\" disabled> </td>";
										echo "<td><input type=\"textfield\" id=\"f_name_".$row[0]."\" name=\"f_name_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[3]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"s_name_".$row[0]."\" name=\"s_name_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[4]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"sex_".$row[0]."\" name=\"sex_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[5]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"born_".$row[0]."\" name=\"born_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[6]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"email_".$row[0]."\" name=\"email_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[7]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"phone_".$row[0]."\" name=\"phone_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[8]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"address_".$row[0]."\" name=\"address_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[9]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"regist_date_".$row[0]."\" name=\"regist_date_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[10]."\" size=\"\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"authority_".$row[0]."\" name=\"authority_".$row[0]."\" class=\"textfiled_style\" value=\"".$row[11]."\" size=\"8\" disabled></td>";
										
										
										/*echo "<td><input type=\"textfield\" id=\"id_".$row[0]."\" name=\"id_".$row[0]."\" value=\"".$row[0]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"account_".$row[0]."\" name=\"account_".$row[0]."\"  value=\"".$row[1]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"pwd_".$row[0]."\" name=\"pwd_".$row[0]."\"  value=\"".$row[2]."\" size=\"8\" disabled> </td>";
										echo "<td><input type=\"textfield\" id=\"f_name_".$row[0]."\" name=\"f_name_".$row[0]."\"  value=\"".$row[3]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"s_name_".$row[0]."\" name=\"s_name_".$row[0]."\"  value=\"".$row[4]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"sex_".$row[0]."\" name=\"sex_".$row[0]."\"  value=\"".$row[5]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"born_".$row[0]."\" name=\"born_".$row[0]."\" value=\"".$row[6]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"email_".$row[0]."\" name=\"email_".$row[0]."\" value=\"".$row[7]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"phone_".$row[0]."\" name=\"phone_".$row[0]."\" value=\"".$row[8]."\" size=\"8\" disabled></td>";
										//echo "<td><input type=\"textfield\" id=\"address_".$row[0]."\" name=\"address_".$row[0]."\" value=\"".$row[9]."\" size=\"8\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"regist_date_".$row[0]."\" name=\"regist_date_".$row[0]."\" value=\"".$row[10]."\" size=\"\" disabled></td>";
										echo "<td><input type=\"textfield\" id=\"authority_".$row[0]."\" name=\"authority_".$row[0]."\" value=\"".$row[11]."\" size=\"8\" disabled></td>";
										*/
										echo
											"<td>
												<input type=\"button\" id=\"updat_".$row[0]."\" name=\"updat_".$row[0]."\" value=\"修改\" onclick=\"update_data(".$row[0].")\">
												<input type=\"button\" id=\"send_".$row[0]."\" name=\"send_".$row[0]."\" value=\"送出\" onclick=\"send_date(".$row[0].")\" disabled>
												<input type=\"button\" id=\"delete_".$row[0]."\" name=\"delete_".$row[0]."\" value=\"刪除\" onclick=\"delete_data(".$row[0].")\">
											</td>";
										echo "</tr>";
										//echo "</form>";
									}
									
						"		</table>	
						</div>";
				}
				else
					//echo "你未登入,或你沒有權限";
					echo "<meta http-equiv=REFRESH CONTENT=0;url=member_login.php>";
			?>
	
		</header>
		<!--	<footer>
			<p>
			&nbsp;&nbsp; 
			<p>&nbsp;版權所有：史拜客股份有限公司  @Copyright  客服專線市話：4055-9553  &nbsp;&nbsp;&nbsp;&nbsp;<img src="mail.jpg" width="40" height="28"/><a href="mailto:xxx@example.com" />
			</p>
			<p>&nbsp;</p>
		</footer>-->
	</body>

</html>