<?php
	if(isset($_SESSION['username']))
	{
		$nguoisua = $_SESSION['username'];
		$tennguoisua = $_SESSION['display'];
	}
?>

<?php
	if(isset($_GET['id']))
	{
	//Lấy các thông tin đơn hàng
		$a_order = Array_Info_ID($_GET['id']);
		$username = $a_order['taikhoan'];
		$diachi=$a_order['diachi'];
		$date = $a_order['date'];
		$tinhtrang = $a_order['status'];
		$thanhtoan = $a_order['thanhtoan'];
		$nguoilap = $a_order['nguoithietlap'];
	// lấy thông tin điện thoại và email của người mua
		$check = Array_Check_Account($username);
		$dienthoai = $check['dienthoai'];
		$email = $check['email'];
	}
?>
 <div id="main_post">       
  <div id="thongtin_2">
		<fieldset id="hop">
			<table width="275" height="338" >
				<tr>
					<td width="95"><label>Tên tài khoản</label>
					</td>
					<td width="168">
						<input type="text" value="<?php echo $username ?>" name="taikhoan" class="no_change1" readonly />
					</td>
				</tr>
				<tr>
					<td width="95">Số điện thoại</td>
					<td width="168">
						<input type="text" value="<?php echo $dienthoai; ?>" name="dienthoai" class="no_change1" readonly />
					</td>
				</tr>

				<tr>
					<td width="95">Email</td>
					<td width="168"><input type="text" value="<?php echo $email; ?>" name="email" class="no_change1" readonly /></td>
				</tr>
				<tr>
					<td width="95">Địa chỉ</td>
					<td width="168"><input type="text" value="<?php echo $diachi ?>" name="diachi" style="width:150px;" /> (*)</td>
				</tr>
				<tr>
				<td>Thời gian đặt
				</td>
				<td><input type="text" value="<?php echo $date ?>" id="datepicker" name="date" style="width:150px;" /> (*)</td>
				</tr>
				<tr>
					<td>
						<label>Tình trạng</label>
					</td>
					<td>
						<select name="tinhtrang" style="width:150px;">
							<?php 
							   $status = List_Status($tinhtrang);
								while($row_status = mysqli_fetch_array($status))
								{
									
							?>
							<option value="<?php echo $row_status['id']; ?>" <?php if($tinhtrang == $row_status['id']) echo "selected"; ?>><?php echo $row_status['tinhtrang'] ?></option>
							<?php
								}
							?>
						</select> (*)
					</td>
				</tr>

				<tr>
					<td><label>Thanh toán</label>
					</td>
					<td>
						<select name="thanhtoan" style="width:150px;">
							<?php
								$html = "";
								if($thanhtoan == 0)
								{
									$html .='<option value="0" selected >Tiền mặt</option>';
									$html .='<option value="1" >Thẻ tín dụng</option>';
								}
								if($thanhtoan == 1)
								{
									$html .='<option value="1" selected >Tiền mặt</option>';
									$html .='<option value="0">Thẻ tín dụng</option>';
								}
							echo $html;
							?> 
						</select> (*)
					</td>
				</tr>
				<tr>
					<td>
						<label>Người thiết lập</label>
					</td>
					<td>

						<select name="nguoithietlap" style="width:150px;">
							<?php
								$html='';

								if(strcmp($nguoilap,$nguoisua) == 0)
									$html .= '<option value="'.$nguoisua.'" selected >'.$tennguoisua.'</option>';
								else
								{
									$html .= '<option value="'.$nguoilap.'" selected >'.$nguoilap.'</option>';
									$html .= '<option value="'.$nguosua.'">'.$tennguoisua.'</option>';
								}
								echo $html;
							?>
					   </select> (*)
					</td>
				</tr>
			</table>
		</fieldset>
		<fieldset style="width: 275px;margin-top: 20px;"><b>Warning:</b><br /><br />Bạn chỉ được phép sửa các phần (*) và Ghi chú</fieldset>
	</div>
<div id="thongtin3">
		<?php 
		if(isset($_GET['id']))
		{
			$id_order = $_GET['id'];
			$x = List_Order_Detail($id_order);
			while($row_order_detail = mysqli_fetch_array($x))
			{
				
		?>
		<fieldset id="hop2">
		  <p style="text-align: center; font-size: 15px;"><strong>Sản phẩm <?php echo $row_order_detail['number']; ?></strong></p>
		  <table width="400" height="111" >
			<tr>
			  <td width="143"><label>Tên sản phẩm</label></td>
			  <td width="245">
				<input type="text" class="no_change2" name="ten1" value="<?php  echo $row_order_detail['id_sp']." | ".$row_order_detail['ten']; ?>" readonly >
			  </td>
		  </tr>
			<tr>
			  <td width="143"><label>Số lượng</label></td>
			  <td width="245"><input type="text" value="<?php  echo $row_order_detail['so_luong']; ?>" name="soluong1" class="no_change2" readonly /></td>
		  </tr>	
		  <tr>
			  <td width="143"><label>Tổng giá</label></td>
			  <td width="245"><input type="text" value="<?php echo $row_order_detail['so_luong'] * $row_order_detail['gia']; ?>" name="tonggia1" class="no_change2" readonly /></td>
		  </tr>	
		  <tr>
			  <td width="143"><label></label></td>
			  <td width="245"><input type="checkbox" <?php echo "checked"; ?> name="check1" onclick="return false;" />Sản phẩm đã được lưu</td>
		  </tr>
		</table>
	  </fieldset>
	  	<?php 
				
			}
		}
		?>
	  
	  
	</div>

</div>
<script>
	
	  //chuyển font datepiker
	  dateVariable = undefined;
	$("#datepicker").datepicker({ 
		dateFormat: 'yy-mm-dd', 
		onClose: function(dateText) { 
			dateVariable = dateText; 

		}
	});
</script>