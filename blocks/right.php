<?php

?>
<?php 
	// số lượn người đã truy cập
	$soluong_truycap = So_luong_truy_cap();
?>

<?php
	//số lượng người đang online
	$time = time();
	$time_out = 120;
	$time_new = $time - $time_out;
	$ip_so_luot_truy_cap = $_SERVER['REMOTE_ADDR'];
	$local = $_SERVER['PHP_SELF'];
	mysqli_query($mysqli,"INSERT INTO useronline_client(`time`, `ip`, `local`) VALUES ('$time','$ip_so_luot_truy_cap','$local')");
	mysqli_query($mysqli,"delete from useronline_client where time < $time_new");
	$x = mysqli_num_rows(mysqli_query($mysqli,"select distinct ip from useronline_client where local = '$local'"));
	$message1 = $x; 
?>


   <div id="right">
	<div id="sanphamnoibat">
			<div class="div_title">
				<h2>Sản phẩm nổi bật</h2>
			</div>
			<?php 
				$SPNoiBat = ListSPNoiBat();
				while($row_SPNB = mysqli_fetch_array($SPNoiBat))
				{
					ob_start();
			?>
			<div id="box_noibat">
				<div class="tieude">
					{tensp}
				</div>
				<div class="img">
					<a href="index.php?select=see&id={id}"><img src="upload/sanpham/{urlimg}" width="180px" height="235px"/></a>
				</div>
				<div class="gia">
					Giá: {gia} VNĐ
				</div>
				<div class="xemchitiet_sanpham"> <a href="index.php?select=see&id={id}"><img src="upload/tool/xem-chi-tiet.png" style="margin-left:18px;"/></a>
				</div>
				<div class="xemchitiet_sanpham">
					<a href="<?php if(isset($_SESSION['username'])) echo "index.php?account=gio-hang&id=".$row_SPNB['id']; else echo "#"; ?>" onClick="<?php if(!isset($_SESSION['username'])) echo "alert('Bạn vui lòng đăng nhập/ đăng ký trước khi mua hàng!')" ?>"><img src="upload/tool/muahang.png"/></a>
				</div>
			</div>
			<div class="clear"></div>
			<?php
				$s = ob_get_clean();
				$s = str_replace("{id}",$row_SPNB['id'],$s);
				$s = str_replace("{tensp}",$row_SPNB["ten"],$s);
				$s = str_replace("{urlimg}",$row_SPNB["urlimg"],$s);
				$s = str_replace("{gia}",number_format($row_SPNB["gia"]),$s);
				echo $s;
				}
			?>
	</div>
	<div id="sanphamnoibat">
			<div class="div_title">
				<h2>Lượt truy cập</h2>
			</div>
			<div style="text-align: center;margin-top: 20px;">Tổng lượt truy cập: <?php echo $soluong_truycap ?> </div>
			<div style="text-align: center;margin-top: 20px;">Đang online: <?php echo $message1; ?></div>
	</div>
</div>
    
   <?php
	function ListSPNoiBat()
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		return mysqli_query($mysqli,"select * from product where noibat = 1 order by rand() limit 0,3");
	}
?>