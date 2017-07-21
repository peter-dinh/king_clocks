<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$row = Array_Info_Message($id);
		$date = $row['date'];
		$link = "index.php?action=administrator&select=message&del=".$id;
		$id_vaitro = $row['nguoinhan'];
		$new = $row['new'];
	}
?>
<div id="tool_message">
	<div id="title"><h3>CÔNG CỤ MESSAGE</h3></div>
	<table style="margin-left: 15px;">
		<tr>
			<td><?php if(isset($_GET['id'])) echo "Ngày tạo tin:"; else echo "Ngày cập nhập:"; ?></td>
			<td><input style="width: 200px;" readonly class='no_change2' value="<?php if(isset($_GET['id'])) echo $date; else echo date("Y-m-d G:i:s"); ?>" type="text" name="date" ></td>
		</tr>
		<tr>
			<td>Người nhận:</td>
			<td><select style="width: 203px;" name="nguoinhan">
				<?php 
					$x = Info_Account();
					while($row_account = mysqli_fetch_array($x))
					{
						ob_start();
				?>
				<option value="{id_vaitro}" <?php if(isset($_GET['id']) && $id_vaitro == $row_account['idvaitro']) echo "seleted"; ?> >{display}</option>
				<?php
						$s=ob_get_clean();
						$s = str_replace("{id_vaitro}",$row_account['idvaitro'],$s);
						$s = str_replace("{display}",$row_account['display'],$s);
						echo $s;
					}
				?>
			</select></td>
		</tr>
		<tr>
			<td>Nhãn new:</td>
			<td><select name="new">
			<?php 
				$html = '';
				if(isset($_GET['id']))
				{
					if($new == 1)
					{
						$html .= '<option value="1" seleted>Có</optinon>';
						$html .= '<option value="0">Không</option>';
					}
					if($new == 0)
					{
						$html .= '<option value="1">Có</optinon>';
						$html .= '<option value="0" seleted >Không</option>';
					}
				}
				else
				{
					$html .= '<option value="1">Có</optinon>';
					$html .= '<option value="0">Không</option>';
				}
				echo $html;
			?>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="<?php if(isset($_GET['id'])) echo "capnhat"; else echo "tao"; ?>" value="<?php if(isset($_GET['id'])) echo "Cập nhật"; else echo "Tạo"; ?>"> <input type="button" name="xoa" <?php if(!isset($_GET['id'])) echo "hidden" ?> onclick="window.location.href='<?php echo $link ?>'" value="Xóa"> </td>
		</tr>
	</table>
</div>

<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(!isset($_GET['id']))
	if(isset($_POST['tao']))
	{
		$n = Info_Max_ID();
		$id = $n['id'] + 1;
		$tieude = $_POST['tieude'];
		$noidung = $_POST['content'];
		$date = $_POST['date'];
		$nguoinhan = $_POST['nguoinhan'];
		$new = $_POST['new'];
		mysqli_query($mysqli,"INSERT INTO `message` (`id`, `tieude`, `noidung`, `date`, `nguoinhan`, `new`) VALUES ('$id', '$tieude', '$noidung', '$date', '$nguoinhan','$new');");
	}
?>


<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
		if(isset($_POST['capnhat']))
		{
			$id = $_GET['id'];
			$tieude = $_POST['tieude'];
			$noidung = $_POST['content'];
			$date = $_POST['date'];
			$nguoinhan = $_POST['nguoinhan'];
			$new = $_POST['new'];
			mysqli_query($mysqli,"UPDATE `message` SET `tieude`='$tieude',`noidung`='$noidung',`date`='$date',`nguoinhan`='$nguoinhan', `new` = '$new' WHERE `id`= '$id'");
			header("Refresh:0; url=index.php?action=administrator&select=message");
		}
?>