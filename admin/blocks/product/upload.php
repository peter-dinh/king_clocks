
<?php
	if(isset($_GET['id']))
	{
		$a = info();
		$row = mysqli_fetch_array($a);
		$url_img = $row['urlimg'];
		
	}
?>
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
<!-- end from at categories -->






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
