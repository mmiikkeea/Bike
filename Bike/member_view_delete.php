<?php 

session_start();
if($_SESSION['login_session'] && 1==$_SESSION['authority']){
	include("mysqlconnect.php");
	$id=$_REQUEST["id"];
	
	//先刪除該筆會員
	$sql="delete from member where member_id='".$id."';";
	mysql_query($sql);
	
	//重新查詢並回傳結果給div
	$sql="select * from member";
	$result=mysql_query($sql);
	echo 
		"<table border=\"0\" align=\"center\">
			<tr>
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
				echo "<tr>";
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
					echo
						"<td>
							<input type=\"button\" id=\"updat_".$row[0]."\" name=\"updat_".$row[0]."\" value=\"修改\" onclick=\"update_data(".$row[0].")\">
							<input type=\"button\" id=\"send_".$row[0]."\" name=\"send_".$row[0]."\" value=\"送出\" onclick=\"send_data(".$row[0].")\" disabled>
							<input type=\"button\" id=\"delete_".$row[0]."\" name=\"delete_".$row[0]."\" value=\"刪除\" onclick=\"delete_data(".$row[0].")\">
						</td>";
				echo "</tr>";
			}
	echo "</table>";
}
?>
