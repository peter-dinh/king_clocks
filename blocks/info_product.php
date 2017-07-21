<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$list = List_Info_Product($id);
		$row_info = mysqli_fetch_array($list);
	}
?>
<div class="center_title">
	<h3>--- Thông Tin Sản Phẩm ---</h3>
</div>
<div class="center_title">
	<h3><?php echo $row_info['ten'] ?></h3>
</div>
<div class="linkpost">
<h4><a href="../trangchu.html">Trang chủ</a> > <a href="../dong-ho-rolex-1.html">Đồng hồ Rolex</a> > <a href="rolex1.html"><?php echo $row_info['ten'] ?></a></h4>
</div>
<div id="box_img_chitiet">
		<div class="img">
		  <img src="upload/sanpham/<?php echo $row_info['urlimg'] ?>" width="250px"/>
		</div>
		<div class="clear">
		</div>
  <div class="xemchitiet_sanpham">
			<a href="<?php if(isset($_SESSION['username'])) echo "index.php?account=gio-hang&id=".$id; else echo "#"; ?>" onClick="<?php if(!isset($_SESSION['username'])) echo "alert('Bạn vui lòng đăng nhập/ đăng ký trước khi mua hàng!')" ?>"><img src="upload/tool/muahang.png"/></a>
		</div>
</div>
<div id="box_text_chitiet">
  <table style="margin-top:-40px;" width="285" height="257" align="center" cellpadding="4" cellspacing="0" >
		<tr>
			<td width="112" height="42"><b>Tên sản phẩm</b>
			</td>
			<td width="151"><?php echo $row_info['ten'] ?>
			</td>
		</tr>
		<tr>
			<td height="35"><b>Giá tiền</b>
			</td>
			<td><?php echo $row_info['gia'] ?>
			</td>
		</tr>
		<tr>
			<td height="32"><b>Xuất xứ</b>
			</td>
			<td><?php echo $row_info['xuatxu'] ?>
			</td>
		</tr>
		<tr>
			<td height="38"><b>Thương hiệu</b>
			</td>
			<td><?php echo $row_info['tenthuonghieu'] ?>
			</td>
		</tr>
		<tr>
			<td height="39"><b>Tình trạng</b>
			</td>
			<td><?php if($row_info['tinhtrang'] == 0) echo "Hết hàng"; else echo "Còn Hàng"?>
			</td>
		</tr>
		<tr>
			<td height="59"><b>Mô tả</b>
			</td>
			<td><?php echo $row_info['mota'] ?></td>
		</tr>
	</table>
</div>