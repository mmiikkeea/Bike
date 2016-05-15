<?php
	header("Content-Type:text/html; charset=utf-8");
	
	require_once("DB_config.php");
	require_once("DB_class.php");
	
	$db = new DB();
	$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	
	if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['date']) && isset($_FILES['image']['name']))
	{
		try
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$date = $_POST['date'];
			
			$filename=$_FILES['image']['name'];
			$tmpname=$_FILES['image']['tmp_name'];

			if($_FILES['image']['error']==0)
			{                                    
				move_uploaded_file($_FILES["image"]["tmp_name"],"images/news/".$_FILES["image"]["name"]);    
			}
			else
			{
				echo "Error: " .$_FILES["image"]["error"];
			}

			$db->query("INSERT INTO news(news_title, news_content, news_date, news_image) VALUES('$title', '$content', '$date', '$filename')");
			$id = $db->get_insert_id();
			
			if(isset($_POST['productID']))
			{
				try
				{
					foreach($_POST['productID'] as $productID)	
    					$db->query("INSERT INTO newsproduct(news_id, product_ID) VALUES('$id','$productID')");
				
				}catch(Exception $e) {
    				echo "Caught exception: ", $e->getMessage(), "\n";
				}
			}

		}catch (Exception $e) {
    		echo "Caught exception: ", $e->getMessage(), "\n";
		}
		
		//echo "新增成功!";
		echo "<script>alert('新增成功!');</script>";
		header("refresh:0; url=news_index.php");
	}
	else
	{
		//echo "新增失敗!";
		echo "<script>alert('新增失敗!');</script>";
		header("refresh:0; url=news_create_index.php");
	}
?>