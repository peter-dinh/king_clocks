<?php
	include("query-account.php");
?>
<?php
	if(isset($_GET['select']))
	{
		$tam = $_GET['select'];
		switch ($tam) 
		{
			case "add":
				include 'new-account.php';
				break;
			case "edit":
				include 'edit-account.php';
				break;
			case "change":
				include 'change-pass.php';
				break;
			case "duyet":
				include("duyetdon.php");
				break;
			case "tin":
				include("tinnhan.php");
				break;
			case "comment":
				include("binhluan.php");
		}
	}
	else
		include 'list-account.php';
?>
