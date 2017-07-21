<?php 
	ob_start();
	if(isset($_SESSION["vaitro"]) && $_SESSION["vaitro"] == 1)
		include("blocks/administrator/admin.php");
	else
		include("blocks/administrator/change-user.php")
?>