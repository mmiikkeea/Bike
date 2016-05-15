<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "bike";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "";
$link=mysql_connect($db_server, $db_user, $db_passwd);
//對資料庫連線
if(!@$link)
        echo "DB connect failed ";

//資料庫連線採UTF8
mysql_query("SET NAMES utf8");
//die(!mysql_select_db($db_name));
//選擇資料庫
if(!mysql_select_db($db_name,$link))
        echo "DB select failed";
//else
		//echo "success";

?> 