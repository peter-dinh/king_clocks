<?php
	include("query-order.php");
?>
<?php
    if(isset($_GET['select']))
    {
        $tam = $_GET['select'];
		switch ($tam) 
		{
			case "add":
				include 'new-order.php';
				break;
			case "edit":
				include 'edit-order.php';
				break;
			case "shop":
				include 'shop.php';
				break;
			case "sales":
				include 'sales.php';
				break;
			case "revenue":
				include 'revenue.php';
				break;
			case "sale":
				include 'sale.php';
				break;	
    	}
    }
	else
		 include 'list-order.php';
?>              