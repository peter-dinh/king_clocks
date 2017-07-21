<?php 
	include("blocks/page/query-page.php");
?>
 <?php
    if(isset($_GET['select']))
    {
        $tam = $_GET['select'];
		switch ($tam) {
        case "add":
            include 'new-page.php';
            break;
			case "edit":
				include 'edit-page.php';
    	}
    }
	else include('list-page.php');

    
?>
