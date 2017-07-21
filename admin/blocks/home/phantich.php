<style type="text/css">	

</style>
<fieldset>
  <legend style=" font-size:22px;"><i>Báo cáo</i></legend>
  	<div id="left">
	<table id="quocgia" width="400" border="1" style="float: left;">
		<div id="tieude_phantich">Các quốc gia truy cập</div>
		<tr>
			<th width="180">Quốc gia</th>
			<th width="100">Lượt truy cập</th>
			<th width="120">Tỷ lệ</th>
		</tr>
		<?php 
			$x = Array_List_Quoc_Gia();
			while ($row_quoc_gia = mysqli_fetch_array($x)) {
				ob_start();
		?>
		<tr>
			<td>{local}</td>
			<td>{soluong}</td>
			<td></td>
		</tr>
		<?php 
			$s = ob_get_clean();
			$s = str_replace("{local}",$row_quoc_gia["local"],$s);
    		$s = str_replace("{soluong}",$row_quoc_gia["soluong"],$s);
			echo $s;
			}
		?>
	</table>
	</div>
	<div id="right">
	<div id="tieude_phantich">Các thành phố truy cập</div>
	<table id="thanhpho" border="1" width="500">
		<tr>
			<th width="160">Thành Phố</th>
			<th width="160">Quốc gia</th>
			<th width="90">Lượt truy cập</th>
			<th width="90">Tỷ lệ</th>
		</tr>
		<?php 
		$y = Array_List_Thanh_Pho();
		while ($row_Thanh_Pho  = mysqli_fetch_array($y)) {
				ob_start();
		?>
		<tr>
			<td>{city}</td>
			<td>{local}</td>
			<td>{soluong}</td>
			<td></td>
		</tr>
		<?php
			$s = ob_get_clean();
			$s = str_replace("{local}",$row_Thanh_Pho["local"],$s);
    		$s = str_replace("{soluong}",$row_Thanh_Pho["soluong"],$s);
    		$s = str_replace("{city}",$row_Thanh_Pho["city"],$s);

			echo $s; 
			}
		?>
	</table>
	</div>
	<div class="clear"></div>
	<div class="clear"></div>
  <span><a style="float:right; text-align:center; background-color:#999; width:150px; font-size:18px; color:#FFF;" href="index.php?action=home&select=anlytic">Xem thêm</a></span>
</fieldset>

<?php 
	if(isset($_GET['id']) && $_GET['select'] == "view")
	{
		
	}
?>