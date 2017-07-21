<?php
	function info()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		if(isset($_GET['id']))
		{
			$id_order = $_GET['id'];
			$sql = mysqli_query($mysqli,"select * from donhang where id='$id_order'");
			return $sql;
		}	
	}
//use edit-order.php
?>

<?php
	function List_Product()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$sql = mysqli_query($mysqli,"select id,ten from product");
		return($sql);
	}
?>
<?php
	function Info_Gia($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select gia from product where id = $id");
	}
//use at tool-edit.php
?>

<?php 
	function ID_Max_Order()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = (mysqli_fetch_array(mysqli_query($mysqli,"select * from donhang order by id desc limit 1")));
		return $x['id'] + 1;
	}
?>

<?php
	function List_Account()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from account");
	}
?>
<?php 
	function ThongTin()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$sql = mysqli_query($mysqli,"select * from account, donhang where account.username = donhang.taikhoan");
		$m = mysqli_fetch_array($sql);
		$dienthoai = "SĐT: ".$m['dienthoai'];
		$mail = "Mail: ".$m['email'];
		return $dienthoai."
".$mail."
";
	}
//use edit-order.php
?>


<?php 
	function Array_Info_ID($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_query($mysqli,"select * from donhang where id = $id");
		return(mysqli_fetch_array($x));
	}
//use edit-info.php  & tool-edit.php
?>
<?php 
	function Array_Check_Account($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_query($mysqli,"select * from account where username = '$username'");
		return mysqli_fetch_array($x);
	}
//check tel & email at edit-info.php
?>
<?php 
	function Number_Record($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_query($mysqli,"select * from chitietdonhang where id_dh = $id");
		$num = mysqli_num_rows($x);
		return $num;
	}
//count num record at edit-info.php
?>
<?php
	function CheckBox($id_donhang,$id_sp)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_query($mysqli,"select * from chitietdonhang where id_dh = $id_donhang and id_sp = $id_sp");
		$num = mysqli_num_rows($x);
		return $num;
	}
// check at checkbox at edit-info.php
?>


<?php
	function Info_Detail_Order($id_donhang,$number)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from chitietdonhang where id_dh= $id_donhang and number = $number");
	}
// check at edit-info.php
?>


<?php 
	function Check_ID_Detail_Order($id_donhang,$number)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return(mysqli_num_rows(mysqli_query($mysqli,"select * from chitietdonhang where id_dh= $id_donhang and number = $number")));
	}
// check at edit-info.php
?>


<?php 
	function Array_Check_Name_Product($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_fetch_array((mysqli_query($mysqli,"select * from product where id = $id")));
	}
// check name product at edit-info.php
?>


<?php
	function Get_Tong_Gia($id_donhang,$number)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_query($mysqli,"select * from chitietdonhang where id_dh= $id_donhang and number = $number");
		$row = mysqli_fetch_array($x);
		$soluong = $row['soluong'];
		$id_sp = $row['id_sp'];
		$y = mysqli_query($mysqli,"select * from product where id = $id_sp");
		$row2 = mysqli_fetch_array($y);
		$gia = $row2['gia'];
		return $soluong * $gia;
	}
//hàm lấy tổng giá của sản phẩm dùng cho 2 hàm edit-info.php & tool-edit.php
?>


<?php 
	function List_Status($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from tinhtrang_donhang limit $id,5 ");
	}
?>
<?php 
	function List_Order_Detail($id_order)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from chitietdonhang,product where chitietdonhang.id_sp = product.id and id_dh = $id_order");
	}
?>

<?php 
	function Info_Max_ID_Status_Client()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from tinhtrang_client order by  id desc limit 1"));
		return $x['id']+1;
	}
?>


<?php 
	function Info_Post($str)
	{
		foreach ($_POST as $key => $value) 
			if(strcmp($str,$key) == 0)
		return $value;
	}
?>