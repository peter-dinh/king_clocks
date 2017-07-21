
<div id="content">
<div class="center_title">
	<h3>Đồng Hồ Tissot</h3>
</div>
<div class="center_title">
	<select style="float:right;">
				<option>Sắp xếp mặc định</option>
				<option>Sắp xếp theo tên sản phẩm</option>
				<option>Sắp xếp theo giá sản phẩm</option>
				<option>Sắp xếp theo sản phẩm mới</option>
				<option>Sắp xếp theo thương hiệu</option>
				<option>Sắp xếp theo độ phổ biến </option>
   </select>
</div>
<div class="linkpost">
<h4><a href="index.php">Trang chủ</a> > <a href="index.php?menu=dong-ho-tissot">Đồng hồ Tissot</a></h4>
</div>
<?php 
	$mysqli = $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	$sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from product where idchuyenmuc = 1 order by id desc"));
	$array = Array_Pagination($sobai,"index.php?menu=dong-ho-tissot&page={page}");
	$pagination = new pagination();
	$pagination->init($array);
	$tissot = List_Tissot(($pagination->get_page()-1)*9);
	while($row_Tissot = mysqli_fetch_array($tissot))
	{
		ob_start();
?>
<div id="box">
	<div class="tieude">
	{tensanpham}
	</div>
	<div class="img">
		<a href="index.php?select=see&id={id}"><img src="upload/sanpham/{url}" width="180px" height="235px"/></a>
	</div>
	<div class="gia">
		Giá: {gia} VNĐ
	</div>
	<div class="xemchitiet_sanpham">

		<a href="index.php?select=see&id={id}"><img src="upload/tool/xem-chi-tiet.png"/></a>
	</div>
	<div class="xemchitiet_sanpham">
		<a href="<?php if(isset($_SESSION['username'])) echo "index.php?account=gio-hang&id=".$row_Tissot['id']; else echo "#"; ?>" onClick="<?php if(!isset($_SESSION['username'])) echo "alert('Bạn vui lòng đăng nhập/ đăng ký trước khi mua hàng!')" ?>"><img src="upload/tool/muahang.png"/></a>
	</div>
</div>
<?php
		$s = ob_get_clean();
		$s = str_replace("{tensanpham}",$row_Tissot['ten'],$s);
		$s = str_replace("{gia}",number_format($row_Tissot['gia']),$s);
		$s = str_replace("{url}",$row_Tissot['urlimg'],$s);
		$s = str_replace("{id}",$row_Tissot['id'],$s);
		echo $s;
	}
	?>
	<div class="clear"></div>
	<div class="clear"></div>
   <div id="pagination">
        <ul>
            <?php
            if($sobai != 0)
                echo $pagination->list_page();
            ?>
        </ul>
    </div>
</div>
