<?php
	
	

	
	function List_URL_Left()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select url from menu where type = 0");
	}

?>

<?php
	function List_URL_Main()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select url from menu where type = 1");
	}

?>

<?php
	function List_Info_Product($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from product where product.id = $id");
	}
	
	function List_Rand_Product($id,$id_chuyenmuc)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"SELECT * FROM product where idchuyenmuc = $id_chuyenmuc and id != $id  ORDER BY RAND()  LIMIT 3");
	}
?>

<?php 
	function List_Rolex($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 2 order by id desc limit $start,9 ");
		}
	function List_Tissot($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 1 order by id desc limit $start,9");
		}
	function List_Casio($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 3 order by id desc limit $start,9 ");
		}
	function List_Longines($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 4 order by id desc limit $start,9");
		}
	function List_Ogival($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 5 order by id desc limit $start,9");
		}
	function List_Smart($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 6 order by id desc limit $start,9");
		}
	function List_Omega($start)
		{
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
			return  mysqli_query($mysqli,"select * from product where idchuyenmuc = 7 order by id desc limit $start,9");
		}
	function List_Men($start)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from product where gioitinh = 1 order by id desc limit $start,9"));
	}
	function List_Wommen($start)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from product where gioitinh = 0 order by id desc limit $start,9"));
	}
?>


<?php
	function Array_Pagination($sobai,$link_full)
	{
	 	$phantrang = array(
            'tranghientai' => isset($_GET['page']) ? $_GET['page']: 1,
            'tongsobai' => $sobai,
            'limit' => 9,
            'link_full' => $link_full,
            'link' => 'index.php',
        );
        return $phantrang;
	}
?>

<?php 
	function List_Info_Account($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return mysqli_fetch_array(mysqli_query($mysqli,"select * from account where username = '$username'"));
	}
?>
	

<?php
	function Info_Vai_Tro($id_vaitro)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from vaitro where id_vaitro = $id_vaitro"));
		return $x['tenvaitro'];
	}

?>


<?php 
function List_Product_Str($str)
{
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
	return mysqli_query($mysqli,"select * from product where id in ($str)");
}
?>


<?php 
	function Info_Max_ID_Order()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from donhang order by id desc limit 1"));
		return $x['id']+1;
	}
?>

<?php 
	function Info_Max_ID_Status_Client()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from tinhtrang_client order by id desc limit 1"));
		return $x['id']+1;
	}
?>

<?php 
	function List_Order($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from donhang where taikhoan = '$username' and (day(now())- day(date) <31) order by id desc");
	}
?>

<?php 
	function List_Order_Detail($id_donhang)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from chitietdonhang where id_dh = $id_donhang"));
	}
?>
<?php 
	function Name_Product($id_sp)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x =  mysqli_fetch_array(mysqli_query($mysqli,"select * from product where id = $id_sp"));
		return $x['ten'];
	}
?>


<?php 
	function Count_Product()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return mysqli_num_rows(mysqli_query($mysqli,"select * from product"));
	}
?>


<?php 
	function List_Status_Client($id_dh)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return (mysqli_query($mysqli,"select * from tinhtrang_client where id_dh = $id_dh order by id_tinhtrang asc"));
	}
?>


<?php 
	function Info_Max_ID()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = (mysqli_fetch_array(mysqli_query($mysqli,"select * from so_luot_truy_cap order by id desc limit 1")));
		return $x['id'] + 1;
	}
?>
<?php 
	function Info_View($id)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from product where id = '$id'"));
		return $x['luotxem'];
	}
?>
<?php 
	function So_luong_truy_cap()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return( mysqli_num_rows(mysqli_query($mysqli,"select * from so_luot_truy_cap")));
	}
?>

<?php 
	function Max_ID_Comment($id_sp)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from binhluan where id_sanpham = $id_sp order by id desc limit 1"));
		return $x['id'] + 1;
	}
?>
<?php
	function List_Comment($id_sanpham,$limit)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return(mysqli_query($mysqli,"select * from binhluan where id_sanpham = $id_sanpham order by id desc limit $limit"));
	}
?>
<?php 
	function Info_Image($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from account where username = '$username'"));
		return $x['url'];
	}
?>
<?php 
	function Info_Display($username)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from account where username = '$username'"));
		return $x['display'];
	}
?>
<?php 
	function Info_Like($id, $id_sp)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"select * from binhluan where id = $id and id_sanpham = $id_sp"));
		return $x['num_like'];
	}
?>
<?php 
	function Count_Comment($id_sp)
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
		return(mysqli_num_rows(mysqli_query($mysqli,"select * from binhluan where id_sanpham = $id_sp")));
	}
?>