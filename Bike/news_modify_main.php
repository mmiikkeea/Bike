<?php
	require_once("DB_config.php");
	require_once("DB_class.php");
	
	$db = new DB();
	$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	
	if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content']))
	{
		try
		{
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date = $_POST['date'];

			$db->query("UPDATE news SET news_title = '$title', news_content = '$content', news_date = '$date' WHERE news_id = '$id'");

		}catch (Exception $e) {
    		echo "Caught exception: ", $e->getMessage(), "\n";
		}
		
		//echo "修改成功!";
		echo "<script>alert('修改成功!');</script>";
		header("refresh:0; url=news_modify_index.php");
	}
	else
	{
		//echo "修改失敗!";
		echo "<script>alert('修改失敗!');</script>";
		header("refresh:0; url=news_modify_index.php");
	}
?>