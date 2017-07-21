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
	if($_FILES['avatar']['name'] != NULL)
	$urlhinh = $_FILES['avatar']['name'];
	else
		$urlhinh = "no-image.png";
	$date = $_POST['date'];
	$id = $row['id']+1;
	$chuyenmuc = $_POST['group'];
	$query ="INSERT INTO `product` (`id`, `ten`, `gia`, `xuatxu`, `thuonghieu`, `tinhtrang`, `mota`, `tag`, `tacgia`, `idchuyenmuc`, `date`, `type`, `urlimg`, `noibat`, `gioitinh`, `luotxem`, `giamgia`) VALUES ('$id', '$ten', '$gia', '$xuatxu', '$thuonghieu', '$tinhtrang', '$mota', '$tag', '$tacgia', '$chuyenmuc', '$date', '$an_hien', '$urlhinh', '0', '$gioitinh', '0', '$giamgia')";
	mysqli_query($mysqli,$query);

	$id_image = Max_ID_Image();
	mysqli_query($mysqli,"INSERT INTO `file`(`id`, `tentaptin`, `username`, `id_product`, `date`, `alt`, `chuthich`) VALUES ('$id_image','$urlhinh','$tacgia','$id','$date' ,'','')");
	
	header("Refresh:0; url=index.php?action=product&select=edit&id=$id");
?>