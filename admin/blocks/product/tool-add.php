<?php
	if(isset($_GET['id']))
	{
		$a = info();
		$row = mysqli_fetch_array($a);
		$date = $row['date'];
	}
?>

  <div id="dangbai">
	<div id="title">
		<h3>Đăng sản phẩm</h3>
	</div>
  <table width="250">
	  <tr>
		  <td><span class="dangbai_1">Chế độ xem:</span>
		  </td>
		  <td>
			  <select name="an_hien" style="width:165px;">
				  <option value="1">Hiện</option>
				  <option value="0">Ẩn</option>
			  </select>
		  </td>
	  </tr>
	  <tr>
			<td>Cập nhật:
			</td>
			<td>
			<?php
				date_default_timezone_set("Asia/Bangkok");
			?>
			<input type="text" name="date" value="<?php echo  date("Y-m-d G:i:s");?>" style="width:160px;" readonly>	
			</td>
	  </tr>
	  <tr>
			<td>Ngày đăng
			</td>
			<td><?php if(isset($_GET['id'])) echo $date; else echo("--/--/----") ?>
			</td>
	  </tr>
	  <tr>	
		  <td><input type="button" style="margin-left: 5px;margin-bottom: 10px;"  value="Xem thử" name="xem" />
		  </td>
		  <td><input type="submit" style="margin-left: 70px; margin-bottom: 10px;" value="<?php if(isset($_GET['id'])) echo("Cập nhật"); else echo("Đăng bài viết");?>" onclick="alert('<?php if(isset($_GET['id'])) {echo "Đã cập nhật bài viết";} else echo "Đã đăng bài" ?>')" name="<?php if(isset($_GET['id'])) {echo "capnhat";} else echo "dang" ?>" />
		  </td>
	  </tr>
  </table>
</div>
    
