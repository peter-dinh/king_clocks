<?php 
	include("query-product.php");
?>
 <?php
    if(isset($_GET['select']))
    {
        $tam = $_GET['select'];
		switch ($tam) 
		{
			case "add":
				include 'new-product.php';
				break;
			case "edit":
				include 'edit-product.php';
				break;
    	}
    }
	else
		include 'list-product.php';

?>

