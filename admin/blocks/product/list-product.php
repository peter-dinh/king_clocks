<?php
    include'../class/pagination.php';
?>
<div id="admin_tacvu1">
    <form method="get">
        <table width="1025">
            <tr>
                <td width="113">
                    Danh sách bài viết
                </td>
                <td width="713">
                    <input type="button" onclick="window.location.href='index.php?action=product&select=add'" name="them" value="Bài viết mới" />
                </td>
                <td width="147">
                    <input type="text" name="search" />
                </td>
                <td width="32">
                    <input type="submit" name="submit" value="search" />
                    <input type="hidden" name="action" value="product">
                    <input type="hidden" name="page" value="1">
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="danhsach">
    <table id="bang_danhsach" width="1021" style="margin-top: 50px;">
    	<tr>
        	<th height="30" width="40">ID</th>
            <th height="30" width="273">Tên sản phẩm</th>
            <th height="30" width="170">Tác giả</th>
            <th height="30" width="170">Chuyên mục</th>
            <th height="30" width="170">Tag</th>
            <th height="30" width="170">Thời gian</th>
            <th height="30" width="30">Sửa</th>
            <th height="30" width="30">Xóa</th>
        </tr>
        <?php 
        $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
            if(isset($_GET["submit"]))
            {
                
                $search = addslashes($_GET["search"]);
                if(empty($search))
                {
                    echo "<span style= '"."font-size:20px;'".">Bạn chưa nhập từ khóa! Vui lòng thử lại</span>";
                    $sanpham = null;
                    $sobai = 0;
                }
                else
                {
                    $sql="select * from product where id like '%$search%' or ten like '%$search%' or tacgia like '%$search%' or tag like '%$search%'";
                    $query = mysqli_query($mysqli,$sql);
                    $sobai = mysqli_num_rows($query);
                    $array = Array_Pagination1($sobai,"index.php?action=product&submit=search&search=$search&page={page}");//use admin/include/function.php at line 33
                    $pagination = new pagination();
                    $pagination->init($array);
                    $sanpham = ListSanPham2(($pagination->get_page()-1)*10,$search);
                }
            }
            else
            {
                $sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from product"));
                $array = Array_Pagination1($sobai,"index.php?action=product&page={page}");//use admin/include/function.php
                $pagination = new pagination();
                $pagination->init($array);
    			$sanpham = ListSanPham(($pagination->get_page()-1)*10);
            }
            if($sanpham!=null)
		while($row_sp = mysqli_fetch_array($sanpham))
		{
			ob_start();
		?>
        <tr>
			<td><a href="index.php?action=product&select=edit&id={id}">{id}</a></td>
            <td>{ten}</td>
            <td>{tacgia}</td>
            <td>{idchuyenmuc}</td>
            <td>{tag}</td>
            <td>{date}</td>
            <td><a href="index.php?action=product&select=edit&id={id}"><img src="image/edit.png" style="width: 25px;" /></a></td>
            <td><a href="index.php?action=product&del={id}"><img src="image/delete.png" style="width: 25px;" /></a></td>
        </tr>
        <?php
			$s = ob_get_clean();
			$s = str_replace("{id}", $row_sp["id"], $s);
			$s = str_replace("{ten}", $row_sp["ten"], $s);
			$s = str_replace("{tacgia}", $row_sp["tacgia"], $s);
			$s = str_replace("{idchuyenmuc}", $row_sp["idchuyenmuc"], $s);
			$s = str_replace("{tag}", $row_sp["tag"], $s);
			$s = str_replace("{date}", $row_sp["date"], $s);
			echo $s;
		}
		?>
    </table>
</div>
<div id="admin_tacvu3">
    <div id="phantrang">
        <ul>
            <?php
            if($sobai != 0)
                echo $pagination->list_page();
            ?>
        </ul>
    </div>
</div>

