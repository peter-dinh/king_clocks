<?php 
	include("blocks/home/query-home.php");
?>
<?php

	if(isset($_GET['select']))
	{
		$tam = $_GET['select'];
		switch($tam)
		{
			case "view" :
				include("blocks/home/chitietthongbao.php");
				break;
			case "anlytic" :
				include("blocks/home/anlytic.php");
				break;
		}
	}
	else
	{
		include("blocks/home/thongbao.php");
		include 'blocks/home/phantich.php';
		include("blocks/home/cuahang.php");
		
	}
?>