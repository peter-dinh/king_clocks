<style>
fieldset
	{
		background: lightyellow;
		border:10px solid #F90;
		margin-bottom:5px;
	}

	label
	{
		width:180px;
		display: inline-block;
		text-align:right;
		margin-top:0px;
	}
	textarea
	{
		width:250px;
		height:50px;
		margin-top:10px;
		margin-bottom:10px;	
		resize: none;

	}
</style>
<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	$count_product = Count_Product();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if($id <= $count_product && $id > 0)
		{
			if(isset($_SESSION['cart'][$id]))
				$_SESSION['cart'][$id]= $_SESSION['cart'][$id] +1;
			else
				$_SESSION['cart'][$id] = 1;
		}
		//header("Refresh:0; url=index.php?account=gio-hang");
	}
	
	$check =0;
		if(isset($_SESSION['cart']))
		{
			foreach($_SESSION['cart'] as $key => $mang)
				if(isset($key))
					$check =1;
		}
		if($check != 1)
		{
			$message1 = 0;
			unset($_SESSION['cart']);
		}
		else
		{
			$item = $_SESSION['cart'];
			$message1 = count($item);
			
		}
?>
<div id="content">
<div class="center_title">
	<h3>Giỏ Hàng</h3>
</div>
<div class="linkpost">
	<h4><a href="trangchu.html">Trang chủ</a> > <a href="gio-hang.html">Giỏ hàng</a></h4>
</div>
	<div style="float:right;margin-top:20px;margin-right:10px;">Bạn có <?php echo $message1; ?> sản phẩm trong giỏ hàng</div>
		<form method="post">
		<table width="598" height="52" style="margin-top:50px; text-align: center;">
			<tr style="border-bottom: 1px solid #006;">
				<th style="border-bottom: 1px solid #006;" width="106">Hình ảnh</th>
				<th style="border-bottom: 1px solid #006;" width="259">Tên sản phẩm</th>
				<th style="border-bottom: 1px solid #006;" width="79">Số lượng</th>                               
				<th style="border-bottom: 1px solid #006;" width="134">Thành tiền</th>
				<th style="border-bottom: 1px solid #006;" width="50">Xóa</th>   
			</tr>
			<?php 
			$tong =0;
				if(isset($_SESSION['cart']))
				{
					foreach($_SESSION['cart'] as $key => $value)
						$items[] = $key;
						$str = implode(",",$items);
						$x = List_Product_Str($str);
					while($row_cart = mysqli_fetch_array($x))
					{
						
						ob_start();
						if(isset($_POST['capnhat']))
						{
							$id_sp = $row_cart['id'];
							$soluong = $_POST["$id_sp"];
							$_SESSION['cart'][$row_cart['id']] = $soluong;
						}
			?> 
			<tr>
				<td style="border-bottom: 1px solid #006;"><img src="upload/sanpham/{url}" style="width: 40px; " >
				</td >
				<td style="border-bottom: 1px solid #006;">{name}
				</td>
				<td style="border-bottom: 1px solid #006;"><input type="number" min="1" max="5000" name="{id}" value="<?php echo $_SESSION['cart'][$row_cart['id']]; ?>" style="width: 50px;">
				</td>
				<td style="border-bottom: 1px solid #006;"><?php $gia = $_SESSION['cart'][$row_cart['id']] *  $row_cart['gia']; echo number_format($gia,0,".",","); ?>
				</td>
				<td style="border-bottom: 1px solid #006;"><a href="index.php?account=gio-hang&del={id}"><img src="admin/image/huy.png" style="width: 20px;"></a></td>
			</tr>  
			 <?php
					$s = ob_get_clean();
					$s = str_replace("{url}",$row_cart['urlimg'],$s);
					$s = str_replace("{name}",$row_cart['ten'],$s);
					$s = str_replace("{id}",$row_cart['id'],$s);
					$tong += $gia;
					echo $s;
				}
			}
			?>                                              
			<tr>
				<td><input type="submit" name="capnhat" value="Cập nhật giỏ hàng" ></td>
				<td style="text-align:right;" colspan="2">Tổng cộng</td>
				<td width="134" style="text-align:right;"><?php echo $tong; ?></td>
				<td></td>
			</tr>
		</table>
		</form>
	<form method="POST" class="checkin" role="form">
		<fieldset style=" margin-top: 30px;">
			<legend style="font-size:30px;">Đặt hàng</legend>
				<table width="362" height="208">
					<tr>
						<td><label for="name">Họ tên:</label>
						</td>
						<td><input type= "text" id="name" name="name" style="width:250px;" required /><br>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email:</label>
						</td>
						<td><input type= "email" id="name" name="email" style="width:250px;" required /><br>
						</td>
					</tr>
					<tr>
						<td><label for="dienthoai">Số điện thoại:</label>
						</td>
						<td><input type= "tel" id="name" maxlength="12" name="dienthoai" style="width:250px;" required /><br>
						</td>
					</tr>
					<tr>
						<td><label for="diachi">Địa chỉ:</label>
						</td>
						<td><input type= "text" id="name" name="diachi" style="width:250px;" required /><br>
						</td>
					</tr>
					<tr>
						<td> 
						</td>
						<td><input type="checkbox" name="check">Nội thành Hồ Chí Minh <br />
						</td>
					</tr>
					<tr>
						<td> <label>Ghi chú:</label>
						</td>
						<td><textarea id="name" name="note"></textarea><br>
						</td>
					</tr>
				</table>
		</fieldset>
	
	<input type="submit" value="Đặt hàng" name="dathang" style="margin-top:20px;margin-right:10px;margin-bottom:20px; width:20%; float:right;" />
	<input type="button" value="Tìm thêm sản phẩm" style="margin-top:20px;margin-right:10px;margin-bottom:20px; width:25%; float:right;" />
</div>
</form>

<?php 
	$message2 = "";
	if(isset($_POST['dathang']))
	{
		if(!isset($_SESSION['cart']))
		{
			$message2 = "<div style='color:red;'>Bạn chưa có đơn hàng nào trong giỏ hàng</div>";
		}
		else
		{
			$id_order = Info_Max_ID_Order();
			$id_client = Info_Max_ID_Status_Client();
			$username = $_SESSION['username'];
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$dienthoai = $_POST['dienthoai'];
			$nguoilap = $_SESSION['username'];
			$date = date("Y-m-d");
			$date2 = date("Y-m-d G:i:s");
			$note = $_POST['note'];
			$note = "Email: $email \n SDT: $dienthoai \n Note: $note";
			mysqli_query($mysqli,"INSERT INTO `donhang`(`id`, `taikhoan`, `diachi`, `status`, `thanhtoan`, `nguoithietlap`, `date`, `note`, `giamgia`, `phi`, `tong`) VALUES ('$id_order','$username','$diachi','0','0','$nguoilap','$date','$note','0','0','$tong')");
			mysqli_query($mysqli,"INSERT INTO `tinhtrang_client`(`id`, `id_dh`, `id_tinhtrang`, `date`) VALUES ('$id_client','$id_order','0','$date2')");
			$i =1;
			foreach($_SESSION['cart'] as $key => $value)
			{
				mysqli_query($mysqli,"INSERT INTO `chitietdonhang`(`id_sp`, `so_luong`, `id_dh`, `number`) VALUES ('$key','$value','$id_order','$i')");
				$i++;
			}
			unset($_SESSION['cart']);
			header("Refresh:0");
		}
	}

?>

<?php 
	if(isset($_GET['del']))
	{
		$del = $_GET['del'];
		unset($_SESSION['cart'][$del]);
		header("Refresh:0; url=index.php?account=gio-hang");
	}
?>
