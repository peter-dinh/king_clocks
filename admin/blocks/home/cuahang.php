<?php 
	$dang_doi = DH_Wating();
	$huy = DH_Cancel();
	$sap_het = SP_Sap_Het();
	$het = SP_Het();
	$doanh_thu = number_format(Sum(), 0, ',', '.');
?>
<fieldset>
  <legend style=" font-size:22px;"><i>Thông Kê Cửa Hàng</i></legend>
	<table width="985">
		<tr>
			<td><img src="image/doanhthu.png" style="width:55px; margin-left:20px;" /></td>
			<td ><b><a href="#">Tổng doanh thu <?php echo $doanh_thu ?> VNĐ</a></b><br />tính trong tháng này</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td width="86"><img src="image/cho-xu-ly.png" style="width:55px;margin-left:20px;" /></td>
			<td width="335"><b><a href="#"><?php echo $dang_doi ?> Đơn hàng</a></b><br />đang được xử lý</td>
			<td width="89"><img src="image/huy.png" style="width:55px;margin-left:20px;" /></td>
			<td width="465"><b><a href="#"><?php echo $huy ?> Đơn hàng</a></b><br />đã bị hủy</td>
		</tr>
		<tr>
			<td><img src="image/sap-het.png" style="width:55px;margin-left:20px;" /></td>
			<td><b><a href="#"><?php echo $sap_het ?> Sản phẩm</a></b><br />
		  Sắp hết hàng</td>
			<td><img src="image/het-hang.png" style="width:55px;margin-left:20px;" /></td>
			<td><b><a href="#"><?php echo $het ?> Sản phẩm</a></b><br />Hết hàng</td>
		</tr>
	</table>
	<div class="clear"></div>
	<div class="clear"></div>
	<span><a style="float:right; text-align:center; background-color:#999; width:150px; font-size:18px; color:#FFF;" href="index.php?action=order&select=shop">Xem thêm</a></span>
</fieldset>
