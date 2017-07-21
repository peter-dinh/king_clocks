<?php
	include'includes/confi.php';
	include'includes/function.php';
	include 'database/query.php';
	include 'class/pagination.php';
	session_start();
	ob_start(); 
?>



<?php

	include  'includes/info_client.php';
		// kết nối đăng nhập
	if(isset($_POST["btnDangNhap"]))
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$user = $_POST["txtUser"];
		$pass = $_POST["txtPass"];

		$sql = "select * from account where username = '$user' and password ='$pass'";
		$tk = mysqli_query($mysqli,$sql);
		if(mysqli_num_rows($tk) == 1)
		{
			mysqli_query($mysqli,"update account set statust = 1 where username = '$user'");
			$row= mysqli_fetch_array($tk);
			$_SESSION["username"] = $row["username"];
			$_SESSION["password"] = $row["password"];
			$_SESSION["display"] = $row["display"];
			$_SESSION["type"] = $row["type"];
			$_SESSION["vaitro"] = $row["idvaitro"];
		}
		
	}
?>

<?php
	if(isset($_POST['btnDangXuat']))
	{
		$user = $_SESSION['username'];
		mysqli_query($mysqli,"update account set statust = 0 where username = '$user'");
		unset($_SESSION["username"]);
		unset($_SESSION["password"]);
		unset($_SESSION["display"]);
		unset($_SESSION["type"]);
		unset($_SESSION["vaitro"]);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang chủ</title>
<link href="style/layout.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
	<div id="main">
		<?php
			if(!isset($_SESSION["username"]))
			{
				include("blocks/header2.php");
			}else
			{
				include("blocks/header.php");
			}
		?>
		<?php 
			
			include 'blocks/menu.php';
			include 'blocks/search.php';
			include'blocks/left.php';
			include'blocks/right.php';
			include'blocks/content.php';
			include'blocks/footer.php';
		?>
	</div>

</body>


</html>
