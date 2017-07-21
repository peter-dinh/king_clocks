<?php
	if(isset($_GET['select']))
	{
		$tam = $_GET['select'];
		switch($tam)
		{
			case "message":
				include "blocks/administrator/message/message.php";
				break;
			case "menu":
				include("blocks/administrator/menu/menu.php");
				break;
			case "widget":
				include("blocks/administrator/widget/widget.php");
				break;
			case "setup":
				include("blocks/administrator/setup/setup.php");
				break;
			case "html":
				include("blocks/administrator/html/html.php");
				break;
		}
	}
	else
		include("blocks/administrator/message/message.php");
?>