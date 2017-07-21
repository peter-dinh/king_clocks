
<div id="content">
<div class="center_title">
	<h3>Đồng Hồ Rolex</h3>
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
<h4><a href="index.php">Trang chủ</a> > <a href="index.php?menu=dong-ho-casio">Đồng hồ Casio</a></h4>
</div>
<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	$sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from product where idchuyenmuc = 3 order by id desc"));
	$array = Array_Pagination($sobai,"index.php?menu=dong-ho-casio&page={page}");
	$pagination = new pagination();
	$pagination->init($array);
	$casio = List_Casio(($pagination->get_page()-1)*9);
	while($row_Casio = mysqli_fetch_array($casio))
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
		<a href="<?php if(isset($_SESSION['username'])) echo "index.php?account=gio-hang&id=".$row_Casio['id']; else echo "#"; ?>" onClick="<?php if(!isset($_SESSION['username'])) echo "alert('Bạn vui lòng đăng nhập/ đăng ký trước khi mua hàng!')" ?>"><img src="upload/tool/muahang.png"/></a>
	</div>
</div>
<?php
		$s = ob_get_clean();
		$s = str_replace("{tensanpham}",$row_Casio['ten'],$s);
		$s = str_replace("{gia}",number_format($row_Casio['gia']),$s);
		$s = str_replace("{url}",$row_Casio['urlimg'],$s);
		$s = str_replace("{id}",$row_Casio['id'],$s);
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
