<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$number = Count_Comment($id);
		for ($i =1; $i <= $number; $i++)
			if(!isset($_SESSION['like'][$i]))
			$_SESSION['like'][$i] = 0;
		$number_product = Count_Product();
		for($i = 1; $i <= $number_product; $i++)
		{
			
		}
	}
?>
<div class="clear"></div>
<div id="comment">
	<div id="showcomment" style="width: 600px; border: 1px solid #B5B5B5; min-height: 80px;">
		<div style="text-align: center; margin-top: 20px; font-weight: bold;">BÌNH LUẬN</div>
		<?php 
		$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
			if(isset($_GET['id']))
			{
				$_id_sp = $_GET['id'];
				if(isset($_GET['full']) == "true")
					$limit = Count_Comment($_id_sp);
				else
					$limit = 3;
				$x_comment = List_Comment($_id_sp,$limit);
				while($row_comment = mysqli_fetch_array($x_comment))
				{
					$username = $row_comment['username'];
					$id = $row_comment['id'];
					$id_sp = $row_comment['id_sanpham'];
					$name = Info_Display($username);
					$type = $row_comment['type'];
					$num_like = $row_comment['num_like'];
					$url_image = Info_Image($username);
		?>
		<table width="597" style="margin-bottom: 20px;">
			<tr>
				<td width="80" rowspan="3"><img src="upload/thanhvien/<?php if($type == 1) echo $url_image; else echo "vo-danh.png" ?>" style="width: 50px; height: 50px; margin-left: 10px;"></td>
				<td width="475"><span style="color:#192ECF; font-weight: bold;"><?php if($type == 1) echo $name; else echo "Anonymous"; ?></span></td>
			</tr>
			<tr>
				<td><?php echo $row_comment['comment'] ?></td>
			</tr>
			<tr>
				<td>
					<a href="index.php?select=see&id=<?php echo $id_sp ?>&like=<?php echo $id ?>" <?php if($_SESSION['like'][$id] == 1 ) echo "hidden" ?> >Thích</a> 
					
					<a href="index.php?select=see&id=<?php echo $id_sp ?>&dislike=<?php echo $id ?>" <?php if($_SESSION['like'][$id] == 0 ) echo "hidden" ?> >Bỏ thích</a>
					
					<img src="admin/image/like.png" <?php if($row_comment['num_like'] == 0) echo "hidden"; ?> style="width: 20px; margin-left: 10px;" > <?php if($num_like != 0) echo $num_like ?></td>
			</tr>
		</table>
		<?php 
				}
			}
		?>
		<a href="index.php?select=see&id=<?php echo $id_sp; ?>&full=true" style="float: right; margin-top: 20px; margin-bottom: 20px; margin-right: 20px;">Hiện tất cả các bình luận</a>
		<div class="clear"></div>
  </div>
	<div id="input_comment" style="margin-top: 20px;">
		<form method="post">
			<table style="margin-left: 20px;">
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" style="width: 450px;" value="<?php if(isset($_SESSION['display'])) echo $_SESSION['display']; ?>" <?php if(isset($_SESSION['display'])) echo "readonly"; ?> required ></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" style="width: 450px;" name="email" required ></td>
				</tr>
				<tr>
					<td>Nội dung:</td>
					<td><textarea name="noidung" style="width: 450px; resize: none;" rows="5" ></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="binhluan" value="Gửi bình luận" ></td>
				</tr>
			</table>
		</form>
	</div>
</div>


<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['id']))
	{
		$id_sp = $_GET['id'];
		$id = Max_ID_Comment($id_sp);
		if(isset($_POST['binhluan']))
		{
			if(isset($_SESSION['username']))
				$name = $_SESSION['username'];
			else
				$name = $_POST['name'];
			if(isset($_SESSION['username']))
				$type = 1;
			else
				$type = 0;
			$email = $_POST['email'];
			$noidung = $_POST['noidung'];
			$date = date("Y-m-d G:i:s");
			mysqli_query($mysqli,"INSERT INTO `binhluan`(`id`, `username`, `comment`, `date`, `id_sanpham`, `num_like`, `email`, `type`) VALUES ('$id','$name','$noidung','$date','$id_sp','0','$email', '$type')");
			header("Refresh:0");
		}
	}
?>


<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['like']) && isset($_GET['id']))
	{
		$id_comment = $_GET['like'];
		$id_sp = $_GET['id'];
		if($_SESSION['like'][$id_comment] != 1)
		{
			$num_like = Info_Like($id_comment,$id_sp);
			$num_like += 1;
			mysqli_query($mysqli,"update binhluan set num_like = $num_like where id = $id_comment and id_sanpham = $id_sp");
			$_SESSION['like'][$id_comment] =1;
			header("Refresh:0");
		}
			
	}
?>
<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['dislike']) && isset($_GET['id']))
	{
		$id_comment = $_GET['dislike'];
		$id_sp = $_GET['id'];
		if($_SESSION['like'][$id_comment] != 0)
		{
			$num_like = Info_Like($id_comment,$id_sp);
			if($num_like >0)
			{
			$num_like -= 1;
			mysqli_query($mysqli,"update binhluan set num_like = $num_like where id = $id_comment and id_sanpham = $id_sp");
			}
			$_SESSION['like'][$id_comment] = 0;
			header("Refresh:0");
		}
			
	}
?>