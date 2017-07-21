<?php
	include '../class/pagination.php';
?>

<div id="admin_tacvu2">
	<table>
    	<tr>
			<td width="119">
				<select>
					<option>Ngày đăng ký
					</option>
					<option>1 ngày trước
					</option>
					<option>3 ngày trước
					</option>
					<option>7 ngày trước
					</option>
					<option>Lâu hơn
					</option>
				</select>
			</td>
			<td width="81">
				<select>
					<option>Hiển thị</option>
					<option>10 Tin</option>
					<option>30 Tin</option>
					<option>50 Tin</option>
					<option>100 Tin</option>
				</select>
			</td>
			<td width="590"><input type="button" value="Lọc" name="loc" style="width:70px;" />
			</td>
			<td width="144">
				<input type="text" name="search"/>
			</td>
			<td width="54">
				<input type="submit" name="submit" value="search" />
				<input type="hidden" name="action" value="account">
				<input type="hidden" name="select" value="duyet">
				<input type="hidden" name="page" value="1">                
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
            <th height="30" width="132">Số điện thoại</th>
            <th height="30" width="190">Ngày đăng ký</th>
            <th height="30" width="50">Xem</th>
        </tr>
    </table>
</div>
<div id="admin_tacvu3">
	<div id="phantrang">
    </div>
</div>