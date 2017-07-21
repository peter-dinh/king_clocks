<?php
	function ListThuongHieu_ID($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
			select * from thuonghieu where id!=$id
			";
		return mysqli_query($mysqli,$sql);
	}
?>

<?php
	function ListThuongHieu_ID_Select($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
			select * from thuonghieu where id = $id
			";
		return mysqli_query($mysqli,$sql);
	}
?>

<?php
	function ListXuatXu_ID($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
			select * from xuatxu where id!=$id
			";
		return mysqli_query($mysqli,$sql);
	}
?>

<?php
	function ListXuatXu_ID_Select($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
			select * from xuatxu where id = $id
			";
		return mysqli_query($mysqli,$sql);
	}
?>




<?php
	function tenchuyenmuc($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql =mysqli_query($mysqli,"select tenchuyenmuc from product, chuyenmuc where product.idchuyenmuc = chuyenmuc.id and product.id=$id");
		return $sql;
	}
// use at categories.php
?>
<?php 
	function id_new_post($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql= mysqli_query($mysqli,"select * from product order by id desc limit 1");
		$row_id = mysqli_fetch_array($sql);
		$num_id_new = $row_id['id'] + 1;
		return $num_id_new;
	}
// use at categories.php
?>

<?php
function soluong()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		$sql = mysqli_query($mysqli,"select * from chuyenmuc");
		$num_chuyenmuc = mysqli_num_rows($sql);
		return $num_chuyenmuc;
	}
// use at categories.php
?>


<?php
    function ListSanPham($strat)
        {$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
        mysqli_set_charset($mysqli, "utf8");
            $sql ="
                Select * From product
                order by id desc
                limit $strat,10";
                return  mysqli_query($mysqli,$sql);
        }// use list-product.php
?>
<?php
    function ListSanPham2($strat,$search)
    {$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
    mysqli_set_charset($mysqli, "utf8");
        $sql ="
            select * from product 
            where id like '%$search%'
            or ten like '%$search%' 
            or tacgia like '%$search%' 
            or tag like '%$search%'
            order by id desc
            limit $strat,10";
            return  mysqli_query($mysqli,$sql);
    }// use list-product.php
?>

<?php
	if(isset($_GET['del']))
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$id_del = $_GET['del'];
		mysqli_query($mysqli,"delete from product where id=$id_del");
		header("Refresh:0; url=index.php?action=product");
	} // use list-product.php
?>


<?php 
	function ListXuatXu()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
		select * from xuatxu
		order by id desc";
		return mysqli_query($mysqli,$sql);
	}
?>


<?php 
	function ListThuongHieu()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql ="
		select * from thuonghieu
		order by id desc";
		return(mysqli_query($mysqli,$sql));
	}
?>

<?php
	function info()
	{
		if(isset($_GET['id']))
		{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
			$id_post = $_GET['id'];
			$sql = mysqli_query($mysqli,"select * from product where id='$id_post'");
			return $sql;
		}	
	}
?>

<?php
	
?>


<?php
	function ListChuyenMuc()
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$sql = "
		select * from chuyenmuc
		order by id desc";
		return mysqli_query($mysqli,$sql);
	}
?>

<?php
	 function Get_ID_Product_Max()
	 {$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	 mysqli_set_charset($mysqli, "utf8");
		 return mysqli_query($mysqli,"select * from product order by id desc limit 1");
	 }
?>


<?php 
 function Check_Img($id)
	{$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
return(mysqli_fetch_array(mysqli_query($mysqli,"select * from product where id = $id")));
	}
//use at catigories.php
?>

<?php 
	function Max_ID_Image()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
		$x = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * from file order by id desc limit 0,1"));
		return $x['id']+1;
	}
?>