<?php
	session_start();
	@$_SESSION['id'];
	@$_SESSION['account'];
	@$_SESSION['name'];
	
	if($_SESSION['account'] != "admin")
	{
		header("Location:member_login.php");
	}
	
	require_once("DB_config.php");
	require_once("DB_class.php");
	
	$db = new DB();
	$db->connect_db($_DB['host'],$_DB['username'],$_DB['password'],$_DB['dbname']);
	$db->query("SELECT product_ID, product_name FROM product");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>新增新聞</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--kendoui-->
<link href="kendoui/styles/kendo.common.min.css" rel="stylesheet" />
<link href="kendoui/styles/kendo.default.min.css" rel="stylesheet" />
<script src="kendoui/js/jquery.min.js"></script>
<script src="kendoui/js/kendo.web.min.js"></script>
<!--main page-->
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="css/custom.css" />
<link rel="stylesheet" type="text/css" href="css/myStyle.css" />
<script src="js/modernizr.custom.17475.js" type="text/javascript"></script>
<style type="text/css">
	@import url("css/LondrinaOutline_Regular/stylesheet.css");
	
	header {	
		background: url("images/page/SBike_bg.jpg");
		background-size: cover;
		margin: 0 auto;
		height: 900px;	
	}
	
	nav{
		text-align:left;
	}
	
	a {
		color: white;
	}   
	
	li {
		display: inline;
		padding: 0px 10px 0px 10px;
	}
	
	ul.topstyle{
		font-family: "LondrinaOutline Regular";
		font-size: 25px;
		padding: 10px;
		background: rgba(0,0,0,0.65);
	}
	
	footer{
		background-color:#FFF;
		color:#000;
	}
	
	.content{
		padding: 10px;
		color:#FFF;
		font-size: 20px;
		text-align: justify;
		font-family:"微软雅黑";
		text-align:center;
	}
	
	/*kendoui*/
	.k-input.k-fontName.k-group-start {
			font-size:15px;
			height:25px;
			width:50px;
		}
		
	.k-input.k-fontSize.k-group-end {
		font-size:15px;
		height:25px;
	}
	#image.k-button {
		width:200px;
	}
	.k-button {
		font-size:15px;
		height:27px;
	}
	.k-multiselect-wrap {
		min-height:30px;
	}
	.k-widget.k-multiselect {
		width:450px;
	}
</style>
</head>

<body>
<header>
    <? require_once("index_title.php"); ?>
	<hr />
    
	<!--於以下開始編輯-->
	<div class="content">
    	<div>&nbsp;</div>
    	<div class="menu" style="float:left">
            <div class="menu_item"><a href="news_index.php">時事新聞</a></div>
            <div class="menu_item"><a href="news_create_index.php">新增新聞</a></div>		
            <div class="menu_item"><a href="news_modify_index.php">修改新聞</a></div>
            <div class="menu_item"><a href="news_delete_index.php">刪除新聞</a></div>
    	</div>
        <div style="position:absolute; left:350px; background:rgba(0,0,0,0.65)">
    		<form action="news_create_main.php" method="post" enctype="multipart/form-data">
                <div>
                    <span><font>標題</font></span>
                    <span><input type="text" size="50" name="title" id="title" style="height:27px; font-size:20px"/></span>
                </div>
                <br>
                <div>
                    <span><font>日期</font></span>
                    <span><input id="date" name="date" value="2014/1/1" style="width:175px; font-size:15px; text-align:center" /></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span><font>圖片</font></span>
                    <span><input name="image" id="image" type="file" style="font-size:15px; text-align:center" /></span>
                </div>
                <br>
                <div style="float:left; margin-left:90px">
                    <label for="productID" style="color:#FFFFFF; size:5; font-family:微软雅黑; float:left">相關產品&nbsp;&nbsp;</label>
                    <select id="productID" name="productID[]" multiple="multiple" data-placeholder="選擇相關產品..." style="float:left">
                    	<?
							while($result = $db->fetch_array())
							{
								echo "<option value='".$result['product_ID']."'>";
								echo $result['product_name'];
								echo "</option>";
							}
						?>
                    </select>
       			</div>
                <br><br>
                <div id="example" class="k-content" align="center" style="background-color:transparent">
                    <textarea id="content" rows="10" cols="30" style="width:740px; height:440px" name="content"></textarea>
                </div>
                <button type="submit" id="buttonSubmit">新增</button>
                <button type="button" id="buttonClear" onclick="clearEditor();">清除</button>
       		</form>
        </div>
    </div>
    
    <script>
		$(':file').change(function(){  //選取類型為file且值發生改變的
			var file = this.files[0]; //定義file=發生改變的file
			name = file.name; //name=檔案名稱
			size = file.size; //size=檔案大小
			type = file.type; //type=檔案型態
			
			if(file.size > 1000000) { //假如檔案大小超過1MB
				alert("圖片上限1MB!"); //顯示警告!!
				$(this).val('');  //將檔案欄設為空白
			}
			else if(file.type != 'image/png' && file.type != 'image/jpg' 
			&& !file.type != 'image/gif' && file.type != 'image/jpeg' )
			{ //假如檔案格式不等於 png、jpg、gif、jpeg
				alert("檔案格式不符合: png, jpg, gif"); //顯示警告
				$(this).val(''); //將檔案欄設為空
			}
		});
	</script>
    
    <script>
		$(document).ready(function() {
			// create DatePicker from input HTML element
			$("#date").kendoDatePicker({
				format: "yyyy/MM/dd",
			});
			
			// create MultiSelect from select HTML element
            $("#productID").kendoMultiSelect().data("kendoMultiSelect");
			
			// create Editor from textarea HTML element with default set of tools
			$("#content").kendoEditor({
				messages: {
					fontNameInherit: "新細明體",
					fontSizeInherit: "12"
				},
				tools: [
					{
						name: "fontName",
						items: [
							{ text: "標楷體", value: "標楷體" },
							{ text: "微軟正黑體", value: "微軟正黑體" }
						]

					},
					{
						name: "fontSize",
						items: [
							{ text: "16", value: "16px" },
							{ text: "20", value: "20px" },
							{ text: "24", value: "24px" },
							{ text: "28", value: "28px" },
							{ text: "32", value: "32px" }
						]
					},
					"bold",
					"italic",
					"underline",
				]
			});
			
			$("#image").kendoButton();
			$("#buttonSubmit").kendoButton();
			$("#buttonClear").kendoButton();
		});
	</script>
    
	<script>
		$("#buttonSubmit").click(function(){
			var title = $("#title").val(), image = $("#image").val(), content = $("#content").val();
			
			if(title == "")
			{
				alert("請輸入標題!");
				return false;
			}
			else if(image == "")
			{
				alert("請上傳圖片!")
				return false;
			}
			else if(content == "")
			{
				alert("請輸入內容!");
				return false;
			}
		});

		function clearEditor(){
			var editor = $("#content").data("kendoEditor");
			editor.value("");
		}
	</script>
</header>

<footer align="center">
    <p>&nbsp;</p>
    <p>&nbsp;版權所有：史拜客股份有限公司 @Copyright 客服專線市話：4055-9553 &nbsp;&nbsp;
    <a href="mailto:xxx@example.com"><img src="mail.jpg" width="40" height="28"/></a>
    </p>
    <p>&nbsp;</p>
</footer>
</body>
</html>




