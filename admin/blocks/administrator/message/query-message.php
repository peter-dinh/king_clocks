<?php
	function List_Message()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from message order by id desc limit 5"));
	}
//use at list-message.php
?>
<?php 
	// hàm lấy các thông tin của 1 phần tử
	function Array_Info_Message($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return(mysqli_fetch_array(mysqli_query($mysqli,"select * from message where id = $id")));
	}
//use at list-message.php
?>


<?php 
	function Info_Account()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from account where idvaitro!=1 and idvaitro!=0"));
	}
//use at tool-add.php
?>


<?php 
	function Info_Max_Id()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return (mysqli_fetch_array(mysqli_query($mysqli,"select * from message order by id desc limit 1")));
	}
//use at tool-message.php
?>
