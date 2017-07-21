<?php 
	$a = Info_Account();
	$row = mysqli_fetch_array($a);
	$use_id = List_VaiTro_ID();
	$row_use_id = mysqli_fetch_array($use_id);
	
?>


<div id="main-setup">
	<form method="post" enctype="multipart/form-data" >
		<fieldset class="setup_tongquan">
			<legend id="fieldset_tongquan" style="font-size: 24px; font-style: oblique;"><a name="1">Thông tin</a></legend>
			<table width="649" height="338">
			<tr>
				<td width="268">Tên đăng nhập:
				</td>
				<td width="470"><input name="username" type="text" value="<?php echo $row['username'] ?>" style="width:350px;" readonly />
				</td>
			</tr>
			<tr>
				<td>Thư điện tử:
				</td>
				<td><input type="text" name="email" value="<?php echo $row['email'] ?>" style="width:350px;" />
				</td>
			</tr>
			<tr>
				<td>Họ & Tên:
				</td>
				<td><input type="text" name="display" value="<?php echo $row['display'] ?>" style="width:350px;" />
				</td>
			</tr>
			<tr>
				<td>Số điện thoại:
				</td>
				<td><input type="text" name="dienthoai" value="<?php echo $row['dienthoai'] ?>" style="width:350px;" />
				</td>
			</tr>


			<tr>
				<td>Ảnh đại diện:</td>
				<td><img id="preview" src="<?php if($row['url'] != NULL) echo "../upload/thanhvien/".$row['url']; else echo "image/no-image.png" ?>" style="width:100px;"/>
				  <br /><input name="img" type="file" style="width:350px;" />
				</td>
			</tr>
			<tr>
				<td>Vai trò của thành viên mới
				</td>
				<td>
				<select name="vaitro">
					<option value="<?php echo $row_use_id['id_vaitro'] ?>"><?php echo $row_use_id['tenvaitro'] ?></option>
				<?php
					$no_id = List_Vaitro_Khac();
					while($row_no_id = mysqli_fetch_array($no_id))
					{
						ob_start();
				?>
					<option value="{id_vai_tro}">{ten_vai_tro}
					</option>
							<?php
						$s = ob_get_clean();
						$s = str_replace("{id_vai_tro}",$row_no_id['id_vaitro'],$s);
						$s = str_replace("{ten_vai_tro}",$row_no_id['tenvaitro'],$s);
						echo $s;

					}
					?>
				</select>
				</td>
			</tr>

			<tr>
				<td>
				</td>
				<td><input type="submit" name="edit_account" value="Cập nhật" />
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
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if(isset($_POST['edit_account']))
		{
			if($_POST['username'] == "" )
				$username ="No Name";
			else
			$username = $_POST['username'];
			$ten = $_POST['display'];
			$email = $_POST['email'];
			$vaitro =$_POST['vaitro'];
			$row_img = Check_Img($id);
			$img =$row_img['url'];
			if($_FILES['img']['name'] != NULL)
				$img = $_FILES['img']['name'];
			$dienthoai = $_POST['dienthoai'];
			$query = "UPDATE `account` SET `display`='$ten',`email`='$email',`idvaitro`='$vaitro',`dienthoai`='$dienthoai',`url`='$img' WHERE `id`=$id";
			mysqli_query($mysqli,$query);
			header("Refresh:0; url=index.php?action=account&select=edit&id=$id");
		}
	}
?>

<?php
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_POST['edit_account']))
	{
		$dir = '../upload/thanhvien/';
		$file = $dir.basename($_FILES['img']['name']);
		$up_load_ok = 1;
		$image_file_type = pathinfo($file,PATHINFO_EXTENSION);
		if(isset($_POST['edit_account']))
		{
			if($_FILES['img']['tmp_name'] != NULL)
			{
				$check = getimagesize($_FILES['img']['tmp_name']);
				if($check !== false)
				{
					$up_load_ok = 1;
				}
				else
				{
					$up_load_ok = 0;
				}
			}
		}

		//kiểm tra file đó đã tồn tại chưa
		if(file_exists($file))
		{
			$up_load_ok = 0;
		}

		//kiểm tra kích thước ảnh
		if($_FILES['img']['size'] > 500000)//kích thước tối đa của file ản là dưới 5 MB
		{
			$up_load_ok = 0;
		}
		//kiểm tra đuôi file cần upload
		if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif")
		{
			$up_load_ok =0;
		}
		if($up_load_ok ==0)
		{
			echo "File bạn chọn đã không được chấp thuận<br />";
		}
		else
		{
			if(move_uploaded_file($_FILES['img']['tmp_name'],$file))
				echo "File bạn đã chọn ". basename($_FILES['img']['name'])."<br />";
			else
				echo "File upload không thành công!<br />";
		}
	}
?>