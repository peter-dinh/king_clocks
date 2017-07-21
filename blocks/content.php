<?php
	if(isset($_GET['menu']))
	{
		$tam = $_GET['menu'];
		$x = List_URL_Left();
		$num = mysqli_num_rows($x);

		while($row = mysqli_fetch_array($x))
		{
			$URL = $row['url'];
			if(strcmp($tam,$URL) == 0)
				include ("blocks/product/".$URL.".php");
		}
	}
	
	
if(isset($_GET['menu']))
	{
		$tam = $_GET['menu'];
		$x = List_URL_Main();
		$num = mysqli_num_rows($x);

		while($row = mysqli_fetch_array($x))
		{
			$URL = $row['url'];
			if(strcmp($tam,$URL) == 0)
				include ("blocks/menu/".$URL.".php");
		}
	}
	
	
if(isset($_GET['account']) && isset($_SESSION['username']))
	{
		$tam = $_GET['account'];
		switch($tam)
		{
			case "gio-hang":
				include("blocks/account/gio-hang.php");break;
			case "order":
				include("blocks/account/order.php");break;
			case "pass":
				include("blocks/account/doi-pass.php");break;
			case "profile":
				include("blocks/account/thong-tin.php");break;
		}
	}
	if(isset($_GET['select'])&& isset($_GET['id']))
	{
		include 'blocks/info.php';
	}
?>
