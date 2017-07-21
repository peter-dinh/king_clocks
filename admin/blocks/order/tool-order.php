<div id="congcu">
  <div id="dangbai">
		<div id="title">
			<h3>Thao tác đơn hàng</h3>
		</div>
	  <table width="250">
		  <tr>
				<td width="103">Giảm giá
				</td>
				<td width="135"><input type="text" name="sale" value="0" style="width: 120px;"/>
				</td>
		  </tr>
		  <tr>
				<td width="103">Phí vận chuyển
				</td>
				<td width="135"><input type="text" name="phi" style="width: 120px;" value="0" />
				</td>
		  </tr>
		  <tr>
			  <td></td>
			  <td><input type="submit" style="float:right; margin-bottom: 10px;margin-right: 10px; margin-top: 10px;" value="Thêm Đơn Hàng" name="luu" onclick="alert('Đơn hàng đã được thêm...')" />
			  </td>
		  </tr>
	  </table>
	</div>
	<div id="dangbai">
		<div id="title">
			<h3>Ghi chú</h3>
		</div>
		<textarea name="note" rows="5" style="resize: none; width: 225px; margin-left:10px; margin-bottom: 10px;"></textarea>
	</div>
</div>
</form>
<?php 
	if(isset($_POST['luu']))
	{
		$id = ID_Max_Order();
		
	}

?>

<?php
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_POST['luu']))
	{
		if($_SESSION['order'] != 0)
		{
			$id = ID_Max_Order();
			$id_client = Info_Max_ID_Status_Client();
			$tonggia = 0;
			for($i= 1 ; $i <= $_SESSION['order']; $i++)
			{
				$str1 = "check".$i;
				$str2 = "ten".$i;
				$str3 = "soluong".$i;
				$check = Info_Post($str1);
				$id_sp = Info_Post($str2);
				$soluong = Info_Post($str3);
				if($check == "on")
				{
					if(!empty($id_sp1) || ($soluong == ""))
					{
						echo "Sản phẩm $i chưa được tạo <br />";
					}
					else
					{
						$row_gia =mysqli_fetch_array(Info_Gia($id_sp));
						$gia = $row_gia['gia'];
						mysqli_query($mysqli,"insert into chitietdonhang (`id_sp`, `so_luong`, `id_dh`, `number`) values('$id_sp','$soluong','$id','$i')");
						echo "Sản phẩm $i đã được tạo <br />";
						$tonggia += ($gia * $soluong);
					}
				}
			}
			$taikhoan = $_POST['taikhoan'];
			$diachi = $_POST['diachi'];
			$thoigian = $_POST['date'];
			$date2 = date("Y-m-d G:i:s");
			$tinhtrang = $_POST['tinhtrang'];
			$thanhtoan = $_POST['thanhtoan'];
			$nguoithietlap = $_POST['nguoithietlap'];
			$giamgia = $_POST['sale'];
			$phi = $_POST['phi'];
			$note = $_POST['note'];
			$tonggia = $tonggia - $giamgia + $phi;
			mysqli_query($mysqli,"insert into donhang (`id`, `taikhoan`, `diachi`, `status`, `thanhtoan`, `nguoithietlap`, `date`, `note`, `giamgia`, `phi`, `tong`) values('$id','$taikhoan','$diachi','$tinhtrang','$thanhtoan','$nguoithietlap','$thoigian','$note','$giamgia','$phi','$tonggia')");
			
			mysqli_query($mysqli,"INSERT INTO `tinhtrang_client`(`id`, `id_dh`, `id_tinhtrang`, `date`) VALUES ('$id_client','$id','0','$date2')");
		}
		else
			echo "Bạn chưa có sản phẩm";
	}
?>


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