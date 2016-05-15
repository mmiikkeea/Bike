<?php
	header("Content-Type:text/html; charset=utf-8");
	
	require_once("DB_config.php");
    require_once("DB_class.php");
	
	$db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
    $db->query("SELECT * FROM news ORDER BY news_date DESC LIMIT 5");
	
	$idArray = array();
	$titleArray = array();
	$imageArray = array();
	$dateArray = array();
	
	while($result = $db->fetch_array())
	{
		array_push($idArray, $result['news_id']);
		array_push($titleArray, $result['news_title']);
		$imagePath = "images/news/";
		array_push($imageArray, $imagePath.$result['news_image']);
		array_push($dateArray, $result['news_date']);
	}
	
	$length = count($idArray);

	echo "<table style='text-align:center; background: rgba(0,0,0,0.65);'>";
	echo "<tr>";
	echo "<td></td>";
	echo "<td>&nbsp;</td>";
	echo "<td>最新消息</td>";
	echo "<td>&nbsp;</td>";
	echo "<td>發佈日期</td>";
	echo "</tr>";

	for($i=0;$i<$length;$i++)
	{
		echo "<tr>";
		echo "<td><div class='thumb' style='width:100px;height:75px'><img width='100' height='75px' src='".$imageArray[$i]."'></div></td>";
		echo "<td>&nbsp;</td>";
		echo "<td style='width:500px'><a href='news_detail.php?id=".$idArray[$i]."'>".$titleArray[$i]."</a></td>";
		echo "<td>&nbsp;</td>";
		echo "<td>".$dateArray[$i]."</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<div style='width:726px;text-align:right; background: rgba(0,0,0,0.65);'><a href='news_index.php'><u>更多新聞...</u></a></div>";
	
?>