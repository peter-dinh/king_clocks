<form method="post" enctype="multipart/form-data">
	<div id="upload_img">
		<table>
			<tr>
				<td>
					<img id="preview" src="../upload/sanpham/<?php if(isset($_GET['id']) && $row['urlimg']!="") echo $url_img; else echo("no-image.png"); ?>" style="width:275px;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input type='file' name="avatar" id="avatar"/>
				</td>
			</tr>

		</table>
	</div>
	<div id="thongtin">
		<fieldset id="hop">
			<table>
				<tr>
					<td>Chú thích</td>
					<td><input type="text" ></td>
				</tr>
				<tr>
					<td>Văn bản thay thế</td>
					<td><input type="text" ></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="dang" ></td>
				</tr>
			</table>
		</fieldset>
	</div>
</form>


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
	if(isset($_POST['dang']))
	{
		$dir = '../upload/sanpham/';
		$file = $dir.basename($_FILES['avatar']['name']);
		$up_load_ok = 1;
		$image_file_type = pathinfo($file,PATHINFO_EXTENSION);
		if(isset($_POST['dang']))
		{
			$check = getimagesize($_FILES['avatar']['tmp_name']);
			if($check !== false)
			{
				$up_load_ok = 1;
			}
			else
			{
				$up_load_ok = 0;
			}
		}

		//kiểm tra file đó đã tồn tại chưa
		if(file_exists($file))
		{
			$up_load_ok = 0;
		}

		//kiểm tra kích thước ảnh
		if($_FILES['avatar']['size'] > 500000)//kích thước tối đa của file ản là dưới 5 MB
		{
			$up_load_ok = 0;
		}
		//kiểm tra đuôi file cần upload
		if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif")
		{
			$up_load_ok =0;
		}
		else
		{
			if(move_uploaded_file($_FILES['avatar']['tmp_name'],$file))
				echo "File bạn đã chọn ". basename($_FILES['avatar']['name'])."<br />";
			else
				echo "File upload không thành công!<br />";
		}
	}
?>