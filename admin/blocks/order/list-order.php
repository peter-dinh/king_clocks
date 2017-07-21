<?php

    include '../class/pagination.php';
?>
<div id="admin_tacvu1">
    <form method="get">
   	    <table width="1025">
        	<tr>
            	<td width="141">
               		Danh sách đơn hàng
                </td>
                <td width="685">
                	<input type="button" onclick="window.location.href='index.php?action=order&select=add'" name="them" value="Thêm đơn hàng" />
                </td>
                <td width="147">
                	   <input type="text" name="search" />
                </td>
                <td width="32">
                    <input type="submit" name="submit" value="search" />
                    <input type="hidden" name="action" value="order">
                    <input type="hidden" name="page" value="1">
                </td>
           	</tr>
        </table>
    </form>
</div>

<?php
        
?>
<div id="admin_tacvu1">
  		<table>
        	<tr>
          		<td width="130"><a href="index.php?action=order&select=shop">Quản lý kho hàng</a>
                </td>
            	<td width="130"><a href="index.php?action=order&select=sales">Thống kê doanh số</a>
                </td>
                <td width="130"><a href="index.php?action=order&select=revenue">Thống kê doanh thu</a>
                </td>
                <td width="130"><a href="index.php?action=order&select=sale">Tạo mã khuyến mãi</a>
                </td>
            </tr>
        </table>
  </div>

<div id="danhsach">
	  <table id="bang_danhsach" width="1021">
    	<tr>
            <th height="30" width="35">Đơn hàng</th>
            <th height="30" width="128">Tài khoản</th>
            <th height="30" width="363">Giao đến</th>
            <th height="30" width="82">Tổng giá</th>
            <th height="30" width="82">Thanh toán</th>
            <th height="30" width="108">Thời gian</th>
            <th height="30" width="30">Trạng thái</th>
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
                    $donhang = null;
                    $sobai = 0;
                }
                else
                {
                    $sql="select * from donhang where id like '%$search%' or taikhoan like '%$search%' or diachi like '%$search%' or thanhtoan like '%$search%'";
                    $query = mysqli_query($mysqli,$sql);
                    $sobai = mysqli_num_rows($query);
                    $array = Array_Pagination($sobai,"index.php?action=order&submit=search&search=$search&page={page}");
                    $pagination = new pagination();
                    $pagination->init($array);
                    $donhang = ListDonHang2(($pagination->get_page()-1)*10,$search);
                }
            }
            else
            {
                $sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from donhang"));

                $array = Array_Pagination($sobai,"index.php?action=order&page={page}");
                $pagination = new pagination();
                $pagination->init($array);
                $donhang = ListDonHang(($pagination->get_page()-1)*10);
            }
           if($donhang !=null)
		  	while($row_dh = mysqli_fetch_array($donhang))
			{
				ob_start();
		 ?>
        <tr>
            <td><a href="index.php?action=order&select=edit&id={id}">{id}</a></td>
            <td>{taikhoan}</td>
            <td>{diachi}</td>
            <td>{gia}</td>
            <td>{thanhtoan}</td>
            <td>{date}</td>
            <td><img src="<?php if($row_dh['status'] == 0) echo "image/dang-xu-ly.png"; if($row_dh['status'] == 1) echo "image/send.png"; if($row_dh['status'] == 2 ) echo "image/hoanthanh.png"; if ($row_dh['status'] == 3 ) echo "image/huy.png"; ?>" style="width:20px;" /></td>
            <td><a href="index.php?action=order&select=edit&id={id}"><img src="image/edit.png" style="width: 25px;" /></a></td>
            <td><a href="index.php?action=order&del={id}"><img src="image/delete.png" style="width: 25px;" /></a></td>
        </tr>
        
        <?php
				$s = ob_get_clean();
				$s = str_replace("{id}",$row_dh["id"],$s);
				$s = str_replace("{taikhoan}",$row_dh["taikhoan"],$s);
				$s = str_replace("{diachi}",$row_dh["diachi"],$s);
				$s = str_replace("{thanhtoan}",$row_dh["thanhtoan"],$s);
				$s = str_replace("{date}",$row_dh['date'],$s);
				$s = str_replace("{gia}",$row_dh['tong'],$s);
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
    
   <?php
	function ListDonHang($start){
	    $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
		$sql = "select * from donhang
		order by id desc
		limit $start,10";
		return mysqli_query($mysqli,$sql);
	}
    function ListDonHang2($start,$search){
        $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
        $sql = "select * from donhang
        where id like '%$search%' 
        or taikhoan like '%$search%' 
        or diachi like '%$search%' 
        or thanhtoan like '%$search%'
        order by id desc
        limit $start,10
        ";
        return mysqli_query($mysqli,$sql);
    }
?>


<?php 
	if(isset($_GET['del']))
	{
	    $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
		$id = $_GET['del'];
		mysqli_query($mysqli,"delete from chitiethoadon where id_dh = $id");
		mysqli_query($mysqli,"delete from donhang where id = $id");
		header("Refresh:0; url=index.php?action=order");
	}
?>