
<div id="dangbai">
	<div id="title">
		<h3>Chuyên mục</h3>
	</div>
	<table style="margin-left:20px;">
	   <?php
	   
		
			if(isset($_GET['id']))
			{
				$id = tenchuyenmuc($_GET['id']);
				$a = mysqli_fetch_array($id);
			}
			$chuyenmuc= ListChuyenMuc();
			while($row_chuyenmuc = mysqli_fetch_array($chuyenmuc))
			{
		?>
		<tr>
			<td><input type="radio" name="group" <?php if(isset($_GET['id'])) if(strcmp($row_chuyenmuc['tenchuyenmuc'],$a['tenchuyenmuc']) == 0 ) echo "checked";?> value="<?php echo $row_chuyenmuc["id"] ?>" /><?php echo $row_chuyenmuc["tenchuyenmuc"] ?>
			</td>
			<td><a href="index.php?action=product&select=<?php if(isset($_GET['id'])) echo "edit"; else echo "add"; ?><?php if(isset($_GET['id'])) echo "&id=".$_GET['id'] ?>&delete=<?php if($row_chuyenmuc['id'] ==1) {$id_del= 0;} else $id_del=$row_chuyenmuc["id"]; echo"$id_del" ?>">Xóa</a></td>
		</tr>
		<?php } ?>
		</form> <!--strat from at upload.php -->
		<form method="post" >
		<tr>
			<td><input type="text" name="chuyenmuc" >
			</td>
			<td>
				<input type="submit" name="add_categories" value="Add">
			</td>
		</tr>
		</form>
	</table>
</div>

<?php
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	if(isset($_POST['add_categories']))
	{
		$sql = mysqli_query($mysqli,"select * from chuyenmuc order by id desc limit 1");
		$num = mysqli_fetch_array($sql);
		$num_add = $num['id']+1;
		$str = $_POST['chuyenmuc'];
		mysqli_query($mysqli,"insert into chuyenmuc values('$num_add','$str')");
		header("Refresh:0");
	}
	if(isset($_GET['id']))
	{
		$id_get = $_GET['id'];
		if(isset($_GET['delete']))
		{
			$id_del = $_GET['delete'];
			mysqli_query($mysqli,"delete from chuyenmuc where id = $id_del");
			header("Refresh:0; url=index.php?action=product&select=edit&id=$id_get");
		}
	}else
	{
		if(isset($_GET['delete']))
		{
			$id_del = $_GET['delete'];
			mysqli_query($mysqli,"delete from chuyenmuc where id = $id_del");
			header("Refresh:0; url=index.php?action=product&select=add");
		}
	}
?>

<?php
	$x = Get_ID_Product_Max();
	$row = mysqli_fetch_array($x);
	if(isset($_POST['dang']))
	{
		include 'blocks/product/add.php';
	}
?>


<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		if(isset($_POST['capnhat']))
		{
			include 'blocks/product/edit.php';	
		}
	}
?>


<?php
	if(isset($_POST['dang']) || isset($_POST['capnhat']))
	{
		$dir = '../upload/sanpham/';
		$file = $dir.basename($_FILES['avatar']['name']);
		$up_load_ok = 1;
		$image_file_type = pathinfo($file,PATHINFO_EXTENSION);
		$tmp_name = $_FILES['avatar']['tmp_name'];
		if(!empty($tmp_name))
		{
		//kiểm tra file đó đã tồn tại chưa
			if(getimagesize($_FILES['avatar']['tmp_name']) !== false)
			{
				$up_load_ok = 1;
			}
			else
			{
				$tam = explode(".", $_FILES["avatar"]["name"]);
				$newfilename = round(microtime(true)) . '.' . end($tam);
				$file = '../upload/sanpham/'.$newfilename;
				$up_load_ok = 1;
			}
		}
		else 
			$up_load_ok = 0;
		//kiểm tra kích thước ảnh
		if($_FILES['avatar']['size'] > 5000000)//kích thước tối đa của file ảnh là dưới ~5 MB
		{
			$up_load_ok = 0;
		}
		//kiểm tra đuôi file cần upload
		if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif")
		{
			$up_load_ok =0;
		}
		if($up_load_ok == 1)
		{
			move_uploaded_file($_FILES['avatar']['tmp_name'],$file);
			echo "Upload file thành công";
			
		}
		else
			echo "File upload không thành công!<br />";
	}
?>