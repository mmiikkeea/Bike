<?php
	header("Content-Type:text/html; charset=utf-8");

	require_once("DB_config.php");
    require_once("DB_class.php");
	
	$db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	
	if(isset($_POST['id']))
	{
		try
		{
			foreach($_POST['id'] as $id)	
    			$db->query("DELETE FROM news WHERE news_ID = '$id'");
				
		}catch(Exception $e) {
    		echo "Caught exception: ", $e->getMessage(), "\n";
		}
		
		//echo "刪除成功!";
		echo "<script>alert('刪除成功!');</script>";
		header("refresh:0; url=news_delete_index.php");
	}
		
	else
	{
		//echo "刪除失敗!";
		echo "<script>alert('刪除失敗!');</script>";
		header("refresh:0; url=news_delete_index.php");
	}
?>
