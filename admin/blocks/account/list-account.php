<?php
	include '../class/pagination.php';
?>
<div id="admin_tacvu1">
    <form method="get">
    	<table width="1025">
        	<tr>
            	<td width="130">
               		Danh sách thành viên
                </td>
                <td width="696">
                	<input type="button" onclick="window.location.href='index.php?action=account&select=add'" name="them" value="Thành viên mới" />
                </td>
                <td width="147">
                	<input type="text" name="search"/>
                </td>
                <td width="32">
                	<input type="submit" name="submit" value="search" />
                    <input type="hidden" name="action" value="account">
                    <input type="hidden" name="page" value="1">                
                </td>
           	</tr>
        </table>
    </form>
</div>
<div id="admin_tacvu1">
		<table>
    	<tr>
      		<td style=" width: 130px;"><a href="index.php?action=account&select=duyet">Quản lý duyệt đơn</a>
            </td>
        	<td style=" width: 130px;"><a href="index.php?action=account&select=tin">Quản lý tin nhắn</a>
            </td>
            <td style=" width: 130px;"><a href="index.php?action=account&select=comment">Quản lý bình luận</a></td>
        </tr>
    </table>
</div>
<div id="admin_tacvu2">
	<table width="500">
    	<tr>
          		<td width="157">
                	<select>
                    	<option>Tham gia từ
                        </option>
                        <option>Tháng 11 năm 2016
                        </option>
                        <option>Tháng 10 năm 2016
                        </option>
                        <option>Lâu hơn
                        </option>
                    </select>
                </td>
            	<td width="123">
                <select>
                  		<option>Chức vụ
                        </option>
                    	<option>Quản trị viên
                        </option>
                        <option>Cộng tác viện
                        </option>
                        <option>Biên tập viên
                        </option>
                        <option>Tác giả
                        </option>
                        <option>Quản lý
                        </option>
                        <option>Thành viên
                        </option>
                    </select>
                </td>
                <td width="129">
                	<select>
                    	<option>Hiển thị</option>
                        <option>10 thành viên</option>
                    	<option>30 thành viên</option>
                        <option>50 thành viên</option>
                        <option>100 thành viên</option>
                    </select>
                </td>
                <td width="71"><input type="button" value="Lọc" name="loc" style="width:70px;" />
                </td>
            </tr>
    </table>
</div>
<div id="danhsach">
	<table id="bang_danhsach" width="1035">
    	<tr>
        	<th height="30" width="37">ID</th>
            <th height="30" width="172">Tên đăng nhập</th>
            <th height="30" width="162">Nich name</th>
            <th height="30" width="244">Thư điện tử</th>
            <th height="30" width="132">Vai trò</th>
            <th height="30" width="190">Đăng nhập lần cuối</th>
            <th height="30" width="50">Online</th>
            <th height="30" width="30">Sửa</th>

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
                    $taikhoan = null;
                    $sobai = 0;
                }
                else
                {
                    $sql="select * from account,vaitro where (account.idvaitro = vaitro.id_vaitro) and (account.id like '%$search%' or username like '%$search%' or email like '%$search%' or vaitro.tenvaitro like '%$search%')";
                    $query = mysqli_query($mysqli,$sql);
                    $sobai = mysqli_num_rows($query);
                    $array = Array_Pagination2($sobai,"index.php?action=account&submit=search&search=$search&page={page}");
                    $pagination = new pagination();
                    $pagination->init($array);
                    $taikhoan = ListTaiKhoan2(($pagination->get_page()-1)*10,$search);
                }
            }
            else
            {
                $sobai = mysqli_num_rows(mysqli_query($mysqli,"select * from account,vaitro where vaitro.id_vaitro = account.idvaitro"));
                $array = Array_Pagination2($sobai,"index.php?action=account&page={page}");
                $pagination = new pagination();
                $pagination->init($array);
    			$taikhoan = ListTaiKhoan(($pagination->get_page()-1)*10);
            }
            if($taikhoan != null)
			while($row_tk = mysqli_fetch_array($taikhoan))
			{
				ob_start();
		?>
        <tr>
        	<td><a href="index.php?action=account&select=edit&id={id}">{id}</a></td>
            <td>{user}</td>
            <td>{display}</td>
            <td>{email}</td>
            <td>{vaitro}</td>
            <td>{date}</td>
            <td><img src="<?php if($row_tk['statust'] == 1) echo "image/online.png"; else echo "image/offline.png"; ?>" style="width:20px;" /></td>
            <td><a href="index.php?action=account&select=edit&id={id}"><img src="image/edit.png" style="width: 25px;" /></a></td>
        </tr>
        <?php
				$s = ob_get_clean();
				$s = str_replace("{id}",$row_tk["id"],$s);
				$s = str_replace("{user}",$row_tk["username"],$s);
				$s = str_replace("{display}",$row_tk["display"],$s);
				$s = str_replace("{email}",$row_tk["email"],$s);
				$s = str_replace("{vaitro}",$row_tk["tenvaitro"],$s);
				$s = str_replace("{date}",$row_tk["timeonline"],$s);
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
    function ListTaiKhoan($start)
        {
            $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	        mysqli_set_charset($mysqli, "utf8");
        	$sql = "
        			select * from account, vaitro
        			where vaitro.id_vaitro = account.idvaitro
        			order by account.id
        			limit $start,20";
        	return(mysqli_query($mysqli,$sql));
        }
    function ListTaiKhoan2($start, $search)
    {
        $mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	    mysqli_set_charset($mysqli, "utf8");
        $sql = "select * from account,vaitro 
        where vaitro.id_vaitro = account.idvaitro 
        and (account.id like '%$search%' 
        or username like '%$search%' 
        or email like '%$search%' 
        or vaitro.tenvaitro like '%$search%')
        order by account.id
        limit $start,10";
        return mysqli_query($mysqli,$sql);
    }

?>