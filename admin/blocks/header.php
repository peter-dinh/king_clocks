
<?php
	if(isset($_POST["logout"]))
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$user1 = $_SESSION['username'];
		mysqli_query($mysqli,"update account set statust = 0 where username = '$user1'");
		unset($_SESSION["username"]);
		unset($_SESSION["password"]);
		unset($_SESSION["display"]);
		unset($_SESSION["type"]);
		unset($_SESSION["vaitro"]);
		header("location:index.php");
	}
?>
<div id="adminbar">
	<form method="post">
		<table width="1199" id="bar">
			<tr>
				<td width="30"></td>
				<td width="115"><a href="../index.php"><h3>Vua Đồng Hồ</h3></a></td>
				<td width="770"></td>
				<td width="225"><a href="#"><h3>Chào Bạn, <?php echo $_SESSION["display"] ?></h3></a></td>
				<td width="35"><input type="submit" name="logout" value="" style="background: url('image/logout.png') no-repeat;background-size: 30px 42px; height: 46px; width:32px";""></td>
			</tr>
		</table>
	</form>
</div>
