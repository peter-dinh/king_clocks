<?php 
	if(isset($_GET['id']))
	{
		$ten = Ten_Tap_Tin($_GET['id']);
	}

?>
<form method="post" enctype="multipart/form-data">
	<div id="upload_img">
		<table>
			<tr>
				<td>
					<img id="preview" src="../upload/sanpham/<?php if(isset($_GET['id']) && $ten != "") echo $ten; else echo("no-image.png"); ?>" style="width:275px;"/>
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
					<td><input type="submit" name="sua" ></td>
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


?>