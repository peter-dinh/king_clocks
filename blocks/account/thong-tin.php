
<?php 
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$row_info_account = List_Info_Account($username);
		$email = $row_info_account['email'];
		$ten = $row_info_account['display'];
		$dienthoai = $row_info_account['dienthoai'];
		$url = $row_info_account['url'];
		$vaitro = $row_info_account['idvaitro'];
	}
?>

<div id="content">
	<div class="center_title">
		<h3>Thông tin tài khoản</h3>
	</div>
	<div class="linkpost">
		<h4><a href="index.php">Trang chủ</a> > <a href="index.php?account=profile">Tài khoản</a></h4>
	</div>
  <fieldset style="background:#FFF;color:#000;border: 5px solid #CDCDCD; margin-top:20px;">
	<legend style="font-size:24px;font-style:oblique;" ><b>Thông tin</b></legend>
		<form method="post">
		<table width="588" id="form">
			<tr>
				<td width="137" >Tên đăng nhập:
				</td>
				<td width="348" ><input type="text" name="username" readonly value="<?php echo $username; ?>" style="width:350px; margin-bottom: 20px;" />
				</td>

			</tr>
			<tr>
				<td>Thư điện tử:
				</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>" style="width:350px;margin-bottom: 20px;" />
				</td>

			</tr>
			<tr>
				<td>Họ & Tên:
				</td>
				<td><input type="text" name="ten" value="<?php echo $ten ?>"  style="width:350px;margin-bottom: 20px;" />
				</td>

			</tr>
			<tr>
				<td>Số điện thoại:
				</td>
				<td><input type="text" name="dienthoai" value="<?php echo $dienthoai; ?>"  style="width:350px;margin-bottom: 20px;" />
				</td>
			</tr>

			<tr>
				<td>Ảnh đại diện:</td>
				<td><img id="preview" src="upload/thanhvien/<?php echo $url; ?>" style="width:100px;margin-bottom: 20px;"/>
				  <br /><input type="file" name="avatar" style="width:350px;margin-bottom: 20px;" />
				</td>
			</tr>
			<tr>
				<td>Vai trò:
				</td>
				<td><input type="text" value="<?php echo Info_Vai_Tro($vaitro);  ?>" readonly="readonly" style="width:350px;margin-bottom: 20px;" />        
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td><input type="submit" value="Lưu lại" name="luu" onclick="alert(Thông tin đã được lưu lại')" style="margin-top:20px;margin-right:10px;margin-bottom:20px;width: 80px; float:right;" />    
				</td>
			</tr>
			</table>
		</form>
  </fieldset>
</div>





<?php 
	if(isset($_POST['luu']))
	{
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
		$username = $_POST['username'];
		$email = $_POST['email'];
		$ten = $_POST['ten'];
		$dienthoai = $_POST['dienthoai'];
		if(empty($_FILES['avatar']['name']))
			$file = $url;
		else
			$file = $_FILES['avatar']['name'];
		mysqli_query($mysqli,"update account set email = '$email', display = '$ten', dienthoai = '$dienthoai', url ='$file' where username = '$username'");	
		header("Refresh:0");
	}

?>







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

