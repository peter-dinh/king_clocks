
<div id="admin_tacvu1">
	<form method="get">
		<table width="1025">
			<tr>
				<td width="113">
					Danh sách tập tin
				</td>
				<td width="713">
				  <input type="button" onclick="window.location.href='index.php?action=file&select=add'" name="them" value="Tập tin mới" />
				</td>
				<td width="147">
					<input type="search" name="search" value="" />
				</td>
				<td width="32">
					<input type="submit" name="submit" value="search">
					<input type="text" name="action" value="file" hidden >
					<input type="text" name="page" value="1" hidden>
				</td>
			</tr>
		</table>
	</form>
</div>

<div id="danhsach" style="margin-top: 30px;">
	<table id="bang_danhsach" width="1021">
		<tr>
			<th height="30" width="40">ID</th>
			<th height="30" width="50">Hình</th>
			<th height="30" width="273">Tên tập tin</th>
			<th height="30" width="170">Người upload</th>
			<th height="30" width="170">Thuộc sản phẩm</th>
			<th height="30" width="170">Thời gian</th>
			<th height="30" width="50">Sửa</th>
			<th height="30" width="50">Xóa</th>
		</tr>
			<?php 
			$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
			mysqli_set_charset($mysqli, "utf8");
			if(isset($_GET['submit']))
			{
				$search = addslashes($_GET["search"]);
                if(empty($search))
                {
                    echo "<span style= '"."font-size:20px;'".">Bạn chưa nhập từ khóa! Vui lòng thử lại</span>";
                    $file= null;
                    $sobai = 0;
                }
                else
                {
                    $sql="select * from file where id like '%$search%' or tentaptin like '%$search%' or username like '%$search%' or date like '%$search%'";
                    $query = mysqli_query($mysqli,$sql);
                    $sobai = mysqli_num_rows($query);
                    $array = Array_Pagination1($sobai,"index.php?action=file&submit=search&search=$search&page={page}");//use admin/include/function.php at line 33
                    $pagination = new pagination();
                    $pagination->init($array);
                    $file = List_File_Search(($pagination->get_page()-1)*10,$search);
                }
			}
		else
		{
			$sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from file"));
                $array = Array_Pagination1($sobai,"index.php?action=file&page={page}");
                $pagination = new pagination();
                $pagination->init($array);
    			$file = List_File(($pagination->get_page()-1)*10);
		}
		if($file != null)
			while($row = mysqli_fetch_array($file))
			{
				ob_start();
		?>
		<tr>
			<td><a href="index.php?action=file&select=edit&id={id}">{id}</a></td>
			<td><img src="../upload/sanpham/{ten_taptin}" style="width:30px;"/></td>
			<td>{ten_taptin}</td>
			<td>{ten_taikhoan}</td>
			<td>{ten_sanpham}</td>
			<td>{date}</td>
			<td><a href="index.php?action=file&select=edit&id={id}"><img src="image/edit.png" style="width: 20px;"></a></td>
			<td><a href="index.php?action=file&del={id}"><img src="image/delete.png" style="width: 20px;"></a></td>
		</tr>
		<?php
				$s = ob_get_clean();
				$s = str_replace("{id}",$row['id'],$s);
				$s = str_replace("{ten_taptin}",$row['tentaptin'],$s);
				$s = str_replace("{ten_taikhoan}",$row['username'],$s);
				$s = str_replace("{ten_sanpham}",$row['id_product'],$s);
				$s = str_replace("{date}",$row['date'],$s);
				echo $s;
			}
		?>
	</table>
</div>

<div id="admin_tacvu3">
	<div id="phantrang">
		<?php
            if($sobai != 0)
                echo $pagination->list_page();
        ?>
	</div>
</div>

<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($mysqli,"delete from file where id =$id");
		header("Refresh:0; url=index.php?action=file");
	}
?>

