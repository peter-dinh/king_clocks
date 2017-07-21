<?php 
	function Info_Account()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = mysqli_query($mysqli,"select * from account where id = $id");
				return $sql;
		}
	}

	function List_VaiTro_Khac()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = mysqli_query($mysqli,"select * from vaitro where id_vaitro != (select idvaitro from account where account.id = $id)");
			return $sql;
		}
	}
	function List_VaiTro_ID()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql = mysqli_query($mysqli,"select * from vaitro where id_vaitro = (select idvaitro from account where account.id = $id)");
			return $sql;
		}
	}
?>


<?php 
	function Check_Img($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return(mysqli_fetch_array(mysqli_query($mysqli,"select * from account where id =$id")));
	}
//use at edit-info.php
?>