
<?php
function List_Menu_Top()
{
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	$sql = "select *from menu where type ='1' ";
	return $mysqli->query($sql);
	$mysqli->close();
}

function List_Menu_Left()
{
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	$sql = "select *from menu where type ='0'";
	return $mysqli->query($sql);
	$mysqli->close();

}

?>
