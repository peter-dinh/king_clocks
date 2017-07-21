<?php
	if(isset($_SESSION['username']))
	{
		$nguoi_lap = $_SESSION['username'];
		$ten_nguoi_lap = $_SESSION['display'];
	}
?>
<div id="main_post">
	<div id="thongtin_2">
		<form method="post">
			<fieldset style="width: 275px; margin-bottom: 30px;">
			Nhập số sản phẩm:
			<input type="number"  max="10000" min="1" value="<?php if(isset($_POST['ok'])) echo $_POST['so_san_pham'] ?>" style="width: 180px;" name="so_san_pham"><input type="submit" name="ok" value="Thêm">
			</fieldset>
		</form>
		<form method="post"> <!-- end form tại tool-order.php -->
		<fieldset id="hop">
			<table width="275" height="220" >
				<tr>
					<td width="95"><label>Tên tài khoản</label>
					</td>
					<td width="168">
						<select name="taikhoan" style="width:150px;">
							<?php 
								$b = List_Account();
							while($row_tk = mysqli_fetch_array($b))
							{
							?>
							<option value="<?php echo $row_tk['username'] ?>" ></optio><?php echo $row_tk['id']." | ".$row_tk['display'] ?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="95"><label>Địa chỉ</label>
					</td>
					<td width="168">
						<input type="text" name="diachi" style="width:150px;" />
					</td>
				</tr>
				<tr>
				<td>Thời gian đặt
				</td>
				<td><input type="text" id="datepicker" name="date" style="width:150px;" /></td>
				</tr>
				<tr>
					<td>
						<label>Tình trạng</label>
					</td>
					<td>
						<select name="tinhtrang">
							<option value="0">Đang xử lý
							</option>
							<option value="1">Đang chuyển
							</option>
							<option value="2">Hoàn thành
							</option>
							<option value="3">Không hoàn thành
							</option>
						</select>
					</td>
				</tr>

				<tr>
					<td><label>Thanh toán</label>
					</td>
					<td>
						<select name="thanhtoan">
							<option value="0">Nhận tiền khi giao hàng
							</option>
							<option value="1">Dùng thẻ tín dụng
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Người thiết lập</label>
					</td>
					<td>

						<select name="nguoithietlap" style="width:150px;">
						  <option value="<?php echo $nguoi_lap?>"><?php echo $ten_nguoi_lap?></option>
					   </select>
					</td>
				</tr>
			</table>
		</fieldset>
	</div>
<div id="thongtin3">
		<?php
		if(isset($_POST['ok']))
		{
			$n = $_POST['so_san_pham'];
			$_SESSION['order'] = $n;
			echo $_SESSION['order'];
			for($i=1; $i <= $n; $i++)
			{
	?>
		<fieldset id="hop2">
		  <p style="text-align: center; font-size: 15px;"><strong>Sản phẩm <?php echo $i ?></strong></p>
		  <table width="400" height="111" >
			<tr>
			  <td width="143"><label>Tên sản phẩm</label></td>
			  <td width="245">
			  	<select name="ten<?php echo $i; ?>" style="width:200px;" size="3">
			  		<?php 
						$x = List_Product();
						while($row = mysqli_fetch_array($x))
						{
					?>
					<option value="<?php echo $row['id'] ?>" ><?php echo $row['id']." | ".$row['ten'] ?></option>
					<?php }?>
				</select>
			  </td>
		  </tr>
			<tr>
			  <td width="143"><label>Số lượng</label></td>
			  <td width="245"><input type="text" name="soluong<?php echo $i; ?>" style="width:200px;" /></td>
		  </tr>
		  <tr>
			  <td width="143"><label></label></td>
			  <td width="245"><input type="checkbox" name="check<?php echo $i; ?>" checked />Thêm Sản Phẩm</td>
		  </tr>
		</table>
	  </fieldset>
	  <?php 
				
			}
		}
	?>
	  
	 
	</div>
</div>


