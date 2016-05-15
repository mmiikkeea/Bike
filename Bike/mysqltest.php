<?
$userName="root"; //帳號

$password="test";  //密碼

$hostName="localHost"; //主機(Server)名稱



//建立資料連結

if (!(@ $link=mysql_connect($hostName, $userName, $password)))

{
printf("<Br> 連結主機 %s 發生錯誤 <br>", $hostName);

exit();


}

else
{

printf("<Br> 連結主機 %s 成功 <br>", $hostName);

exit();


}
?>