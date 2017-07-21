<?php 
	function List_File_Search($start, $search)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");	
		return mysqli_query($mysqli,"select * from file where id like '%$search%' or tentaptin like '%$search%' or username like '%$search%' or date like '%$search%' order by id desc limit $start,10");
	}
?>


<?php 
	function List_File($start)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from file order by id desc limit $start,10");
	}
?>

<?php 
	function Ten_Tap_Tin($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * from file where id = '$id'"));
		return $x['tentaptin'];
	}
?>