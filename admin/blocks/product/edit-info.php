<?php
	if(isset($_SESSION['username']))
	{
		$tacgia = $_SESSION['username'];
		$tentacgia = $_SESSION['display'];
	}
?>


<?php
	$a = info();
	$row = mysqli_fetch_array($a);
	$c = ListXuatXu_ID_Select($row['xuatxu']);
	$row_ID_XX = mysqli_fetch_array($c);
	
?>

<div id="thongtin">
	<fieldset id="hop">
		<table>
			<tr>
				<td width="99"><label>Tên sản phẩm:</label></td>
				<td width="205"><input type="text" name="name" value="<?php echo $row['ten'] ?>" style="width: 300px;" /></td>
			</tr>
			<tr>
				<td width="99"><label>Giá tiền:</label>
				</td>
				<td width="205">
					<input type="text" name="gia" value="<?php echo $row['gia'] ?>" style="width:250px;" /> VNĐ
				</td>
			</tr>
			<tr>
				<td width="99"><label>Giảm giá:</label>
				</td>
				<td width="205">
					<input type="text" name="giamgia" value="<?php echo $row['giamgia'] ?>" style="width:250px;" /> VNĐ
				</td>
			</tr>
			<tr>
				<td>
				<label>Xuất xứ
				</label>
				</td>
				<td>
					<select name="xuatxu" style="width:300px;">
				   		<option value="<?php echo $row_ID_XX['id'] ?>" selected><?php echo $row_ID_XX['tenxuatxu'] ?></option>
					   <?php 
							$xuatxu = ListXuatXu_ID($row_ID_XX['id']); // use at query_product.php
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
					<input type="text" name="thuonghieu" value="<?php echo $row['thuonghieu'] ?>" style="width: 300px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Tình trạng</label>
				</td>
				<td>
					<select name="tinhtrang" style="width:300px;">
					<?php 
						$a = $row['tinhtrang'];
						$html='';
						if($row['tinhtrang'] == 1)
						{
							$html .='<option value="'.$a.'">Còn Hàng</option>';
							$html .='<option value="'.$a--.'">Hết Hàng</option>';
						}
						else
						{
							$html .='<option value="'.$a.'">Hết Hàng</option>';
							$html .='<option value="'.$a++.'">Còn Hàng</option>';
						}
						echo $html;
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Mô Tả</label> 
				</td>
				<td><textarea name="mota" rows="5" style="resize: none; width: 300px;"><?php echo $row['mota'] ?></textarea>
				</td>
			</tr>
			<tr>
				<td><label>Giới tính</label>
				</td>
				<td>
					<select name="gioitinh" style="width:300px;">
						<?php 
							$a = $row['gioitinh'];
							$html='';
							if($row['gioitinh'] == 1)
							{
								$html .='<option value="'.$a.'">Đồng hồ nam</option>';
								$html .='<option value="'.$a--.'">Đồng hồ nữ</option>';
							}
							else
							{
								$html .='<option value="'.$a.'">Đồng hồ nữ</option>';
								$html .='<option value="'.$a++.'">Đồng hồ nam</option>';
							}
							echo $html;
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Tag</label>
				</td>
				<td>
					<input name="tag" type="text" name="tag" value="<?php echo $row['tag']?>" style="width:300px;" />
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
					<?php
						$a = $row['tacgia'];
						$html='';
						
						if(strcmp($a,$tacgia)==0)
							$html .= '<option value="'.$tacgia.'">'.$tentacgia.'</option>';
						else
						{
							$html .= '<option value="'.$a.'" selected>'.$a.'</option>';
							$html .= '<option value="'.$tacgia.'">'.$tentacgia.'</option>';
						}
						echo $html;
					?>
				   </select>
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div class="clear"></div>
		

    
    
