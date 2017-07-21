<?php
	ob_start();
	session_start();
	if(! isset($_SESSION["username"]) && isset($_SESSION["type"]) != 1)
	{
		header("location:blocks/login.php");
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin</title>
		 <link rel="stylesheet" href="style/jquery-ui.css">
		 <link rel="stylesheet" href="style/layout.css">
		<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
  <script src="ckfinder/ckfinder.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	</head>

	<body>
		<div id="main2">
			<?php
				include("includes/function.php");
				include("includes/confi.php");
				include 'blocks/header.php';
				include 'blocks/menu.php';
				include 'blocks/content.php';
				include 'blocks/footer.php';
			?>
		</div>
	</body>
</html>