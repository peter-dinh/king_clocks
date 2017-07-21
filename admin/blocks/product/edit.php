<?php 
$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
if($_POST['name'] == "")
		$ten = "No name";
	else
	$ten = $_POST['name'];
	$thuonghieu = $_POST['thuonghieu'];
	$gia = $_POST['gia'];
	$giamgia = $_POST['giamgia'];
	$xuatxu = $_POST['xuatxu'];
	$tinhtrang = $_POST['tinhtrang'];
	$mota = $_POST['mota'];
	$gioitinh = $_POST['gioitinh'];
	if($_POST['tag'] == "")
		$tag ="No tag";
	else
	$tag = $_POST['tag'];
	$tacgia = $_POST['tacgia'];
	$an_hien = $_POST['an_hien'];
	$row_img = Check_Img($id);
	$urlhinh = $row_img['urlimg'];
	if($_FILES['avatar']['name'] != NULL)
	$urlhinh = $_FILES['avatar']['name'];
	$date = $_POST['date'];
	$chuyenmuc = $_POST['group'];
	$query = "UPDATE `product` SET `ten` = '$ten', `gia` = '$gia', `xuatxu` = '$xuatxu', `thuonghieu` = '$thuonghieu', `tinhtrang` = '$tinhtrang', `mota` = '$mota', `tag` = '$tag', `tacgia` = '$tacgia', `idchuyenmuc` = '$chuyenmuc', `date` = '$date', `type` = '$an_hien', `urlimg` = '$urlhinh', `gioitinh` = '$gioitinh', `giamgia` = '$giamgia' WHERE `product`.`id` =$id ;";
	mysqli_query($mysqli,$query);

	mysqli_query($mysqli,"UPDATE `file` SET `tentaptin`= '$urlhinh',`username`='$tacgia',`date`='$date',`alt`='',`chuthich`='' WHERE `id_product`= $id");

	header("Refresh:0")
?>