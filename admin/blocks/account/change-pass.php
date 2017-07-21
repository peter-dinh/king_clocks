<?php
	if(isset($_GET['id']))
	{
		$pass = Info_Account();
		$row = mysqli_fetch_array($pass);
	}
?>
<form method="post">
	<table width="384" height="120" border="1">
	  <tbody>
		<tr>
		  <td width="146"><label for="textfield">Password cũ:</label></td>
		  <td width="222">
		  <input type="password" name="pass_old" style="width: 220px;" value="<?php echo $row['password'] ?>" id="textfield"></td>
		</tr>
		<tr>
		  <td><label for="textfield">Password mới:</label></td>
		  <td><input type="password" name="pass_new" style="width: 220px;" id="textfield"></td>
		</tr>
		<tr>
		  <td><label for="textfield">Nhập lại:</label></td>
		  <td><input type="password" name="pass_ref" style="width: 220px;" id="textfield"></td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="submit" name="change_pass" id="change" value="Gửi"></td>
		</tr>
	  </tbody>
	</table>
</form>
<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	 if(isset($_POST['change_pass']))
	 {
		 if(strcmp($_POST['pass_new'],$_POST['pass_ref']) == 0)
		 {
			 if($_POST['pass_new'] == "" && $_POST['pass_ref'] == "" )
			 {
				 echo "Bạn vui lòng điền đầy đủ thông tin";
			 }
			 else
			 {
				 $change = $_POST['pass_new'];
				 mysqli_query($mysqli,"update account set password = '$change' where id = $id");
				 echo("Đã đổi thành công (^ ^)");
			 }
		 }
		 else
		 {
			if($_POST['pass_new'] == "")
			echo("Bạn vui lòng nhập mật khẩu mới");
			if($_POST['pass_ref'] == "")
			echo("Bạn vui lòng nhập mật khẩu 2 lần");
		 }
		 header("Refresh:0; url=index.php?action=account&select=change&id=$id");
	 }
	}
?>