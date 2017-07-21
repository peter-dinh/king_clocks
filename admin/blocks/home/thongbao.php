<fieldset>
  <legend style=" font-size:22px;"><i>Thông Báo Admin</i></legend>
	<table width="985">
	<?php 
		$x = List_Thong_Bao();
		while ($row = mysqli_fetch_array($x))
		{
			ob_start();
	?>
		<tr>
			<td width="41"><img src="image/thong-bao.gif" style="width:20px;"/></td>
			<td width="91"><b>Vua Đồng Hồ:</b></td>
			<td width="561"><a href="index.php?action=home&select=view&id={id}">{tieude}</a></td>
			<td width="137">Đến: {nguoinhan}</td>
			<td width="146">{date}</td>
			<td><img src="image/new.png" style="height: 20px;" <?php if($row['new'] == 0) echo "hidden" ?>></td>
		</tr>
		<?php
			$row_men_to = Array_Info_Men_To($row['nguoinhan']);
			$s = ob_get_clean();
			$s = str_replace("{id}",$row['id'],$s);
			$s = str_replace("{tieude}",$row['tieude'],$s);
			$s = str_replace("{nguoinhan}",$row_men_to['tenvaitro'],$s);
			$s = str_replace("{date}",$row['date'],$s);
			echo $s;
		}
		?>
	</table>
	<div class="clear"></div>
	<div class="clear"></div>
  <span><a style="float:right; text-align:center; background-color:#999; width:150px; font-size:18px; color:#FFF;" href="#">Xem thêm</a></span>
</fieldset>

<?php 
	if(isset($_GET['id']) && $_GET['select'] == "view")
	{
		
	}
?>
