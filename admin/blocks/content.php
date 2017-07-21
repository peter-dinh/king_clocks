
<div id="admin">
	<?php
		include("blocks/title.php");
	?>
    <?php
        if(isset($_GET['action']))
        {
            $tam = $_GET['action'];
            	switch($tam)
			{
				case "home":
				include("home/home.php");break;
				case "product":
				include("product/product.php");break;
				case "page":
				include("page/page.php");break;
				case "file":
					include("file/file.php"); break;
				case "order":
					include("order/order.php");break;
				case "account":
					include("account/account.php");break;
				case "administrator":
					include("administrator/administrator.php");break;
			}
        }
	else
		include("home/home.php");
		
	?>
</div>