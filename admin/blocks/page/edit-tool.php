
 <?php 
	if(isset($_GET['id']))
	$row = Info_Page_ID($_GET['id'])		
?>

 <div id="congcu">
  <div id="dangbai">
		<div id="title">
			<h3>Đăng trang</h3>
		</div>
	  <table width="250">
		  <tr>
				<td>Cập nhật:
				</td>
				<td>
					<input type="text" name="capnhat"  style="width: 150px;background-color: dimgray;" value="<?php echo date("Y-m-d") ?>" readonly>
				</td>
		  </tr>
		  <tr>
				<td>Ngày đăng:
				</td>
				<td><input type="text" name="ngaydang" style="width: 150px;background-color: dimgray;" value=" <?php if(isset($_GET['id'])) echo $row['date']; ?>" readonly>
				</td>
		  </tr>
		  <tr>
				<td>Tag:
				</td>
				<td><input type="text" name="tag" value="<?php if(isset($_GET['id'])) echo $row['tag']; ?>"style="width: 150px;">
				</td>
		  </tr>
		  <tr>
			  <td>
			  </td>
			  <td><input type="submit" value="Cập nhật" style="float: right; margin-right: 15px; margin-bottom: 10px;" name="capnhat" onclick="alert('Bài viết đã được cập nhật...')" />
			  </td>
		  </tr>
	</table>
  </div>
</div>


<?php
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if(isset($_POST['capnhat']))
		{
			$tieude = $_POST['tieude'];
			$noidung = $_POST['content'];
			$ngaycapnhat = $_POST['capnhat'];
			$ngaydang = $_POST['ngaydang'];
			$author = $_SESSION['username'];
			$tag = $_POST['tag'];
			mysqli_query($mysqli,"UPDATE `page` SET `tieude`='$tieude',`noidung`='$noidung',`date`='$ngaydang',`tag`='$tag',`username`='$author' WHERE `id`=$id");
		}
	}
?>