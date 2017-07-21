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
				<td><input type="text" name="ngaydang" style="width: 150px;background-color: dimgray;" value="--/--/----" readonly>
				</td>
		  </tr>
		  <tr>
				<td>Tag:
				</td>
				<td><input type="text" name="tag" style="width: 150px;">
				</td>
		  </tr>
		  <tr>
			  <td>
			  </td>
			  <td><input type="submit" value="Đăng trang" style="float: right; margin-right: 15px; margin-bottom: 10px;" name="dang" onclick="alert('Bài viết đã được đăng...')" />
			  </td>
		  </tr>
	</table>
  </div>
</div>


<?php

	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_POST['dang']))
	{
		$id = List_Page_ID_Max();
	 	$tieude = $_POST['tieude'];
		$noidung = $_POST['content'];
		$ngaycapnhat = $_POST['capnhat'];
		$ngaydang = $_POST['ngaydang'];
		$tag = $_POST['tag'];
		$author = $_SESSION['username'];
		mysqli_query($mysqli,"INSERT INTO `page` (`id`, `tieude`, `noidung`, `date`, `tag`, `username`) VALUES ('$id', '$tieude', '$noidung', '$ngaycapnhat', '$tag', '$author')");
	}
?>