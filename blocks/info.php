<?php
    $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = mysqli_query($mysqli,"select * from product where id = $id");
		
	}
?>
   <div id="content_chitiet">
   	<?php 
    	include 'blocks/info_product.php';
        include 'blocks/share.php';
        include 'blocks/lienquan.php';
        include 'blocks/comments.php';
	   ?>
    </div>
