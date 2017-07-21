<?php 
	function List_Page_ID_Max()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from page order by id desc limit 1"));
		return $x['id']+1;
	}
//use at  new-tool.php
?>

<?php 
	function List_Page_Search($start, $search)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from page where id like '%$search%' or tieude like '%$search%' or noidung like '%$search%' or tag like '%$search%' order by id desc limit $start,10 "));
	}
?>


<?php 
	function List_Page($start)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from page order by id desc limit $start,10 "));
	}
?>


<?php 
	function In_Display_Author($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from account where username = '$username'"));
		return $x['display'];
	}
?>

<?php 
	function Info_Page_ID($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		return(mysqli_fetch_array(mysqli_query($mysqli,"select * from page where id = $id")));
	}
?>