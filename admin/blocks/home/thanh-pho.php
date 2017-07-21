<fieldset id="hop6">
	<table border="1">
		<tr>
			<th>Thành Phố</th>
			<th>Quốc gia</th>
			<th>Số lượt truy cập</th>
			<th>Tỷ lệ</th>
		</tr>
		<?php 
		$x = List_Thanh_Pho();
		$total = Total();
		while($row = mysqli_fetch_array($x))
		{
			$tyle = number_format(($row['soluong']/ $total) *100, 2, '.', '');
		?>
		<tr>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['local']; ?></td>
			<td><?php echo $row['soluong']; ?></td>
			<td><?php echo $tyle; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</fieldset>