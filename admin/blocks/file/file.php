<?php
	include("query-file.php");
	include("../class/pagination.php");
?>
<?php
    if(isset($_GET['select']))
    {
        $tam = $_GET['select'];
		switch ($tam) 
		{
			case "add":
				include 'new-file.php';
				break;
			case "edit":
				include 'edit-file.php';
				break;
    	}
    }
	else
		 include 'list-file.php';
?>              