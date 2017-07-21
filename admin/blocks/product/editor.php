<?php
	if(isset($_SESSION['username']))
	{
		$tacgia = $_SESSION['username'];
		$tentacgia = $_SESSION['display'];
	}
?>

<div id="thongtin">
	<fieldset id="hop">
		<table>
			<tr>
				<td width="99"><label>Tên sản phẩm:</label></td>
				<td width="205"><input type="text" name="name" style="width: 300px;" /></td>
			</tr>
			<tr>
				<td width="99"><label>Giá tiền:</label>
				</td>
				<td width="205">
					<input type="text" name="gia" style="width:250px;" /> VNĐ
				</td>
			</tr>
			<tr>
				<td width="99"><label>Giảm giá:</label>
				</td>
				<td width="205">
					<input type="text" name="giamgia" style="width:250px;" /> VNĐ
				</td>
			</tr>
			<tr>
				<td>
				<label>Xuất xứ
				</label>
				</td>
				<td>
					<select name="xuatxu" style="width:300px;">
					   <?php 
							$xuatxu = ListXuatXu();
							while($row_xuatxu = mysqli_fetch_array($xuatxu))
							{
						?>
						<option value="<?php echo $row_xuatxu["id"] ?>"><?php echo $row_xuatxu["tenxuatxu"] ?>
						</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Thương hiệu</label>
				</td>
				<td>
					<input type="text" name="thuonghieu" style="width: 300px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Tình trạng</label>
				</td>
				<td>
					<select name="tinhtrang" style="width:300px;">
						<option value="1">Còn Hàng
						</option>
						<option value="0">Hết hàng
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Mô Tả</label>
				</td>
				<td><textarea name="mota" rows="5" style="resize: none; width: 300px;"></textarea>
				</td>
			</tr>
			<tr>
				<td><label>Giới tính</label>
				</td>
				<td>
					<select name="gioitinh" style="width:300px;">
						<option value="1">Đồng hồ Nam
						</option>
						<option value="0">Đồng hồ Nữ
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Tag</label>
				</td>
				<td>
					<input type="text" name="tag" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>* Phân biệt tag bằng dấu ","
				</td>
			</tr>
			<tr>
				<td>
					<label>Tác giả</label>
				</td>
				<td>
					<select name="tacgia" style="width:300px;">
					  <option value="<?php echo $tacgia ?>"><?php echo $tentacgia ?></option>
				   </select>
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div class="clear"></div>
		

    
