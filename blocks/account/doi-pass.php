
<?php 
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$row_info_account = List_Info_Account($username);
		$pass = $row_info_account['password'];
		$message1 ="";
		$message2 ="";
		$message3 = "";
		$message4 ="";
	}

?>
<?php 
	if(isset($_POST['luu']))
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		$username = $_POST['username'];
		$new_pass = $_POST['new-pass'];
		$old_pass = $_POST['old-pass'];
		$reset = $_POST['resert'];
		if($new_pass != "" && $reset != "")
		{
			if(strcmp($new_pass,$reset) == 0)
				if(strlen($new_pass) >= 6)
				{
					mysqli_query($mysqli,"update account set password = '$new_pass' where username = '$username'");
					$message4="<div style='color:red;'>Đổi mật khẩu thành công</div>";
				}
				else
				{
					$message1 = "<div style='color:red'>Số ký tự phải trên 6</div>";
					$message2 = "<div style='color:red'>Số ký tự phải trên 6</div>";
				}
			else
			{
				$message3= "<div style='color:red'>Mật khẩu không trùng khớp</div>";
			}
		}
		else
		{
			if($new_pass == "")
				$message1="<div style='color:red'>Bạn không được phép để trống</div>";
			if($reset == "")
				$message2 = "<div style='color:red'>Bạn không được phép để trống</div>";
		}
	}
?>

<div id="content">
	<div class="center_title">
		<h3>Đổi mật khẩu</h3>
	</div>
	<div class="linkpost">
		<h4><a href="index.php">Trang chủ</a> > <a href="index.php?account=pass">Đổi mật khẩu</a></h4>
	</div>
	<form method="post" action="index.php?account=pass">
  <fieldset style="background:#FFF;color:#000;border: 5px solid #CDCDCD; margin-top:20px;">
	<legend style="font-size:24px;font-style:oblique;" ><b>Đổi mật khẩu</b></legend>
			<table width="588" >
			<tr>
				<td width="137" >Tên đăng nhập:
				</td>
				<td width="348" ><input type="text" name="username" value="<?php echo $username; ?>" readonly="readonly" style="width:250px;" />
				</td>
			</tr>
			<tr>
				<td>Mật khẩu cũ:
				</td>
				<td><input type="password" readonly name="old-pass" value="<?php echo $pass; ?>" style="width:250px;" />
				</td>
			</tr>
			<tr>
				<td>Mật khẩu mới:
				</td>
				<td><input type="password" name="new-pass" style="width:250px;" /><?php echo $message1; ?>
				</td>
			</tr>
			<tr>
				<td>Nhập lại:
				</td>
				<td><input type="password" name="resert" style="width:250px;" /><?php echo $message2; ?>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td><?php echo $message3; ?>
				</td>
			</tr>
			</table>
			<br />
  </fieldset>
  <?php echo $message4; ?>
  <input type="submit" value="Lưu lại" name="luu" style="margin-top:20px;margin-right:10px;margin-bottom:20px; width:10%; float:right;" />
</div>
</form>
