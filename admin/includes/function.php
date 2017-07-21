
<?php
	function List_Menu_Admin()
	{
	    $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
		$sql = "select * from menu where type ='2' order by id";
		return mysqli_query($mysqli,$sql);
	}
?>

<?php
	function List_Menu_Sub($id)
	{
	    $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
		$sql = "select * from menu where menu_root = '$id' order by id";
		return mysqli_query($mysqli,$sql);
	}
?>


<?php
	function Array_Pagination($sobai,$link_full)
	{
	 	$phantrang = array(
            'tranghientai' => isset($_GET['page']) ? $_GET['page']: 1,
            'tongsobai' => $sobai,
            'limit' => 10,
            'link_full' => $link_full,
            'link' => 'index.php',
        );
        return $phantrang;
	}


	function Array_Pagination1($sobai,$link_full)
	{
	 	$phantrang = array(
            'tranghientai' => isset($_GET['page']) ? $_GET['page']: 1,
            'tongsobai' => $sobai,
            'limit' => 10,
            'link_full' => $link_full,
            'link' => 'index.php',
        );
        return $phantrang;
	}// use list-product.php 


	function Array_Pagination2($sobai,$link_full)
	{
	 	$phantrang = array(
            'tranghientai' => isset($_GET['page']) ? $_GET['page']: 1,
            'tongsobai' => $sobai,
            'limit' => 10,
            'link_full' => $link_full,
            'link' => 'index.php',
        );
        return $phantrang;
	}
?>