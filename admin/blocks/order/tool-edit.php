<?php
	if(isset($_GET['id'])) $id = $_GET['id'];
?>

<?php
	$row = Array_Info_ID($id);
	$giamgia = $row['giamgia'];
	$phi = $row['phi'];
	$tonggia = $row['tong'];
	$note = $row['note'];
?>
<div id="congcu">
  <div id="dangbai">
		<div id="title">
			<h3>Thao tác đơn hàng</h3>
		</div>
	  <table width="250">
		  <tr>
				<td width="103">Giảm giá
				</td>
				<td width="135"><input type="text" name="sale" value="<?php echo $giamgia; ?>" class="no_change3" readonly />
				</td>
		  </tr>
		  <tr>
				<td width="103">Phí vận chuyển
				</td>
				<td width="135"><input type="text" name="phi" class="no_change3" value="<?php echo $phi ?>" readonly />
				</td>
		  </tr>
		  <tr>
				<td width="103">Tổng tiền
				</td>
				<td width="135"><input type="text" name="phi" class="no_change3" value="<?php echo $tonggia ?>" readonly />
				</td>
		  </tr>
		  <tr>
			  <td><input type="button" style="float:left; margin-bottom: 10px;margin-left: 10px; margin-top: 10px;" onClick="window.location.href='index.php?action=order&del=<?php echo $id ?>'" value="Xóa"></td>
			  <td><input type="submit" style="float:right; margin-bottom: 10px;margin-right: 10px; margin-top: 10px;" value="Cập nhật" name="capnhat" onclick="alert('Đơn hàng đã được cập nhật...')" />
			  </td>
		  </tr>
	  </table>
	</div>
	<div id="dangbai">
		<div id="title">
			<h3>Ghi chú</h3>
		</div>
		<textarea name="note" rows="5" style="resize: none; width: 225px; margin-left:10px; margin-bottom: 10px;"><?php echo $note ?></textarea>
	</div>
</div>


<?php
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
	{
		$id_client = Info_Max_ID_Status_Client();
		$id = $_GET['id'];
		
		if(isset($_POST['capnhat']))
		{
			$diachi = $_POST['diachi'];
			$tinhtrang = $_POST['tinhtrang'];
			$thanhtoan = $_POST['thanhtoan'];
			$nguoisua = $_POST['nguoithietlap'];
			$date = $_POST['date'];
			$date2 = date("Y-m-d G:i:s");
			$note = $_POST['note'];
			mysqli_query($mysqli,"UPDATE `donhang` SET `diachi`='$diachi',`status`='$tinhtrang',`thanhtoan`='$thanhtoan',`nguoithietlap`='$nguoisua',`date`='$date',`note`='$note' WHERE id=$id");
			mysqli_query($mysqli,"INSERT INTO `tinhtrang_client`(`id`, `id_dh`, `id_tinhtrang`, `date`) VALUES ('$id_client','$id','$tinhtrang','$date2')");
			header("Refresh:0; url=index.php?action=order&select=edit&id=$id");
		}
	}
?>