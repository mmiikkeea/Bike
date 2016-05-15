
<nav style="text-align:left;">
    <ul style="
        font-family: 微软雅黑;
        font-size: 30px;
        padding: 10px;
        background: rgba(0,0,0,0.65);">
        <li ><a href="index.php"><img src="SBike.png" width="193" height="60"/></a></li>
		
		<? //20130105 Anson 只有管理員才看的到訂單管理區
		   if ($_SESSION['account'] == "admin")
		   {
		      echo "<li ><a href=\"order_adminOrder.php\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 管理訂單</a></li>";
		   }
		   else
		   {
		      echo "<a href=\"order_showOrder.php\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 訂單查詢</a></li>";
			  echo "<li ><a href=\"shopcart_showShopcartDetail.php\">&nbsp; 購物車</a></li>";
		   }
		
		?>
		
        <!--建議SBike.png放在images這資料夾-->
        <li ><a href="product_index.php">&nbsp; 商品目錄</a></li>        
        <li ><a href="news_index.php">&nbsp; 新聞</a></li>  
        <li ><a href="member_center.php">&nbsp; 會員專區</a></li> 
        

        <?php		
			if(!@$_SESSION['login_session']){
				echo "<li style=\"margin:0 0 0 30px;\"><a href=\"member_register.php\">&nbsp; 註冊</a></li>";   
				echo "<li style=\"margin:0 0 0 10 px;\"><a href=\"member_login.php\">&nbsp; 登入</a></li>";
			}
			else
			{
				echo "<li style=\"margin:0 0 0 30px; font-size:20px\">歡迎:".$_SESSION['account']."</li>";   
				//echo "<li style=\"margin:0 0 0 10 px;\"><a href=\"member_center.php\">會員中心</a></li>";   
				echo "<li style=\"margin:0 0 0 10 px; font-size:20px\"><a href=\"member_logout.php\"> 登出</a></li>";
		}
		
        ?>
    </ul>
</nav>