<?php
	function List_Thong_Bao()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return(mysqli_query($mysqli,"SELECT * FROM `message` WHERE date >= DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) and NOW()>=date order by id desc limit 5"));
	}
//use at thongbao.php
?>


<?php
	function Array_Info_Men_To($id_vaitro)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return(mysqli_fetch_array(mysqli_query($mysqli,"select * from vaitro where id_vaitro = $id_vaitro")));
	}
// use at thongbao.php and chitietthongbao.php	
?>


<?php 
 function Array_Info_Message_ID($id)
 {$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	 return(mysqli_fetch_array(mysqli_query($mysqli,"select * from message where id=$id")));
 }
//use at  chitietthongbao
?>

<?php 
 function Array_Message_Max_ID()
 {$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	 return(mysqli_fetch_array(mysqli_query($mysqli,"select * from message order by id desc limit 1")));
 }
//use at  chitietthongbao
?>

<?php 
	function Array_List_Quoc_Gia()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return (mysqli_query($mysqli,"SELECT count(*) as soluong,local FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by local order by soluong desc limit 0,3"));
	}
?>

<?php
	function List_Thanh_Pho()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return mysqli_query($mysqli,"SELECT count(*) as soluong, city, local FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by city order by soluong desc ");
	}
 ?>
<?php 
	function List_Quoc_Gia()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return (mysqli_query($mysqli,"SELECT count(*) as soluong,local FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by local order by soluong desc"));
	}
?>

<?php
	function Array_List_Thanh_Pho()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return mysqli_query($mysqli,"SELECT count(*) as soluong, city, local FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by city order by soluong desc ");
	}
 ?>


 <?php
	function List_Thiet_Bi()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return mysqli_query($mysqli,"SELECT count(*) as soluong, tenthietbi FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by tenthietbi order by soluong desc ");
	}
 ?>

 <?php
	function List_Duyet_Trinh()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		return mysqli_query($mysqli,"SELECT count(*) as soluong, browse FROM  `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time group by browse order by soluong desc ");
	}
 ?>

 <?php 
 	function Total()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$x = mysqli_fetch_array(mysqli_query($mysqli,"SELECT count(*) as soluong from `so_luot_truy_cap` WHERE time >= DATE_SUB(DATE(NOW()), INTERVAL 30 DAY) and NOW()>=time"));
 		return $x['soluong'];
 	}
 ?>

 <?php 
 	function DH_Wating()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$x = mysqli_fetch_array(mysqli_query($mysqli,"SELECT count(*) as soluong from donhang WHERE status = 0 or status = 1 "));
 		return $x['soluong'];
 	}

 ?>

  <?php 
 	function DH_Cancel()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$x = mysqli_fetch_array(mysqli_query($mysqli,"SELECT count(*) as soluong from donhang WHERE status = 3"));
 		return $x['soluong'];
 	}

 ?>
 <?php 
 	function SP_Sap_Het()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$x = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM `khohang` WHERE soluong = 1 or soluong = 2 GROUP BY id_sanpham ORDER BY id DESC"));
 		return $x;
 	}

 ?>

  <?php 
 	function SP_Het()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$x = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM `khohang` WHERE soluong = 0 GROUP BY id_sanpham ORDER BY id DESC "));
 		return $x;
 	}

 ?>

 <?php 
 	function Sum()
 	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
 		$s = mysqli_fetch_array(mysqli_query($mysqli,"SELECT sum(tong) as sum from donhang where status = 2"));
 		return $s['sum'];
 	}

 ?>
