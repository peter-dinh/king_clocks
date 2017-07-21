<fieldset id="hop6">
	<table border="1">
		<tr>
			<th>Tên thiết bị</th>
			<th>Số lượt truy cập</th>
			<th>Tỷ lệ</th>
		</tr>
		<?php 
		$x = List_Thiet_Bi();
		$total = Total();
		while ($row = mysqli_fetch_array($x)) {
			$tyle = number_format(($row['soluong']/ $total) *100, 2, '.', '');
		?>
		<tr>
			<td><?php echo $row['tenthietbi']; ?></td>
			<td><?php echo $row['soluong']; ?></td>
			<td><?php echo $tyle ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</fieldset>