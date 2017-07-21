<div id="main-setup">
	<form method="post" enctype="multipart/form-data" >
		<fieldset class="setup_tongquan">
			<legend id="fieldset_tongquan"><a name="1">Thông tin</a></legend>
			<table width="649" height="338">
				<tr>
					<td width="268">Tên đăng nhập:
					</td>
					<td width="470"><input name="username" type="text" value="" required style="width:350px;" />(*)
					</td>
				</tr>
				<tr>
					<td>Thư điện tử:
					</td>
					<td><input type="email" name="email" value="" required style="width:350px;" />(*)
					</td>
				</tr>
				<tr>
					<td>Họ & Tên:
					</td>
					<td><input type="text" name="display" value="" style="width:350px;" />
					</td>
				</tr>
				<tr>
					<td>Số điện thoại:
					</td>
					<td><input type="text" name="dienthoai" style="width:350px;" required/>
					</td>
				</tr>
				<tr>
					<td>Mật khẩu:
					</td>
					<td><input type="password" name= "pass1" style="width:350px;" required />
					</td>
				</tr>
				<tr>
					<td>Nhập lại mật khẩu:
					</td>
					<td><input type="password" name="pass2" style="width:350px;" required />
					</td>
				</tr>
				<tr>
					<td>Ảnh đại diện:</td>
					<td><img id="preview" src="../upload/thanhvien/no-image.png" style="width:100px;"/>
					  <br /><input name="img" type="file" style="width:350px;" />
					</td>
				</tr>
				<tr>
					<td>Vai trò của thành viên mới
					</td>
					<td>
					<select name="vaitro">
						<option value="0">Thành viên
								</option >
								<option value="1" >Quản trị viên
								</option>
								<option value="2">Cộng tác viện
								</option>
								<option value="3">Biên tập viên
								</option>
								<option value="4">Tác giả
								</option>
								<option value="5">Quản lý
								</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td><input type="submit" name="new_account" value="Tạo tài khoản ngay" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</div>
    <script>
  window.onload = function(){
   var files = document.querySelectorAll("input[type=file]");
   files[0].addEventListener("change", function(e) {
    if(this.files && this.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) { 
      document.getElementById("preview").setAttribute("src", e.target.result); 
     }
      reader.readAsDataURL(this.files[0]);
    }
      });
  }
 </script>
<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	$row = mysqli_fetch_array(mysqli_query($mysqli,"select * from account order by id desc limit 1"));
	if(isset($_POST['new_account']))
	if(strcmp($_POST['pass1'],$_POST['pass2'])  != 0)
		echo "Mật khẩu không trùng khớp";
	if(isset($_POST['new_account']) && strcmp($_POST['pass1'],$_POST['pass2'])  == 0)
	{
		if($_POST['username'] == "" )
			$username ="No Name";
		else
		$username = $_POST['username'];
		$password = $_POST['pass1'];
		$ten = $_POST['display'];
		$email = $_POST['email'];
		$vaitro =$_POST['vaitro'];
		if($_FILES['img']['name'] == NULL)
			$img = "no-image.png";
		else
			$img = $_FILES['img']['name'];
		$dienthoai = $_POST['dienthoai'];
		$id = $row['id']+1;
		$query =mysqli_query($mysqli,"INSERT INTO `account` (`id`, `username`, `password`, `display`, `email`, `idvaitro`, `type`, `dienthoai`, `url`) VALUES ('$id', '$username', '$password', '$ten', '$email', '$vaitro', '0', '$dienthoai', '$img'); ");
		
		if(!$query)
		{
			die('Xảy ra lỗi <br /> '.mysqli_error());
		}
	}
?>
