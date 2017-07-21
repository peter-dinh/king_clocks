<?php
	
	$row = mysqli_fetch_array(List_Info_Product($_GET['id']));
	$id_chuyenmuc = $row['idchuyenmuc'];
	$list = List_Rand_Product($_GET['id'],$id_chuyenmuc);
?>
<div id="content_sanphamlienquan">
	<div class="center_title">
		<h3>--- Sản Phẩm Liên Quan ---</h3>
	</div>
	<?php 
		while($row_lienquan = mysqli_fetch_array($list))
		{
			ob_start();
	?>
	<div id="box">
		<div class="tieude">
		{ten}</div>
		<div class="img"> <a href="index.php?select=see&id={id}"><img src="upload/sanpham/{url}" width="180" height="235px"/></a>
		</div>
		<div class="gia">
			Giá: {gia} VNĐ
		</div>
		<div class="xemchitiet_sanpham"> <a href="index.php?select=see&id={id}"><img src="upload/tool/xem-chi-tiet.png"/></a>
		</div>
		<div class="xemchitiet_sanpham">
			<a href="<?php if(isset($_SESSION['username'])) echo "index.php?account=gio-hang&id=".$row_lienquan['id']; else echo "#"; ?>" onClick="<?php if(!isset($_SESSION['username'])) echo "alert('Bạn vui lòng đăng nhập/ đăng ký trước khi mua hàng!')" ?>"><img src="upload/tool/muahang.png"/></a>
		</div>
	</div>
	<?php
			$s = ob_get_clean();
			$s = str_replace("{id}",$row_lienquan['id'],$s);
			$s = str_replace("{ten}",$row_lienquan['ten'],$s);
			$s = str_replace("{url}",$row_lienquan['urlimg'],$s);
			$s = str_replace("{gia}",$row_lienquan['gia'],$s);
			echo $s;
		}
	?>
</div>