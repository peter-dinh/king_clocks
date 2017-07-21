<?php 
	include("../class/pagination.php");
?>
  	<div id="admin_tacvu1">
   	<form method="get">
    <table width="1025">
        <tr>
            <td width="113">
            Danh sách trang
            </td>
            <td width="713">
            <input type="button" onclick="window.location.href='index.php?action=page&select=add'" name="them" value="Trang mới" />
            </td>
            <td width="147">
            <input type="search" name="search"/>
            </td>
            <td width="32">
				<input type="submit" value="search" name="submit">
				<input type="hidden" name="action" value="page">
                <input type="hidden" name="page" value="1">
            </td>
        </tr>
    </table>
    </form>
</div>


<div id="danhsach" style="margin-top: 30px;">
    <table id="bang_danhsach" width="1021">
        <tr>
            <th height="30" width="56">ID</th>
            <th height="30" width="406">Tiêu đề</th>
            <th height="30" width="237">Tác giả</th>
            <th height="30" width="234">Thời gian</th>
            <th height="30" width="30">Sửa</th>
            <th height="30" width="30">Xóa</th>
        </tr>
        <?php 
        $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
		mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['submit']))
	{
		$search = addslashes($_GET['search']);
		if(empty($search))
		{
			echo "<span style= '"."font-size:20px;'".">Bạn chưa nhập từ khóa! Vui lòng thử lại</span>";
			$trang = null;
			$sobai = 0;
		}
		else
		{
			$sql="select * from page where id like '%$search%' or tieude like '%$search%' or noidung like '%$search%' or tag like '%$search%'";
			$query = mysqli_query($mysqli,$sql);
			$sobai = mysqli_num_rows($query);
			$array = Array_Pagination1($sobai,"index.php?action=page&submit=search&search=$search&page={page}");
			$pagination = new pagination();
			$pagination->init($array);
			$trang = List_Page_Search(($pagination->get_page()-1)*10,$search);
		}
	}
	else
	{
		$sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from page"));
		$array = Array_Pagination1($sobai,"index.php?action=page&page={page}");
		$pagination = new pagination();
		$pagination->init($array);
		$trang = List_Page(($pagination->get_page()-1)*10);
	}
		while($row = mysqli_fetch_array($trang))
		{
			ob_start();
?>
        <tr>
            <td><a href="index.php?action=page&select=edit&id={id}">{id}</a></td>
            <td>{tieude}</td>
            <td>{tacgia}</td>
            <td>{date}</td>
            <td><a href="index.php?action=page&select=edit&id={id}"><img src="image/edit.png" style="width: 25px;" /></a></td>
            <td><a href="index.php?action=page&del={id}"><img src="image/delete.png" style="width: 25px;" /></a></td>
        </tr>
        <?php 
			$s = ob_get_clean();
			$s = str_replace("{id}",$row['id'],$s);
			$s = str_replace("{tieude}",$row['tieude'],$s);
			$author = In_Display_Author($row['username']);
			$s = str_replace("{tacgia}",$author, $s);
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
		mysqli_query($mysqli,"delete from page where id =$id");
		header("Refresh:0; url=index.php?action=page");
	}
?>