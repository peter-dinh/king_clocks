<div id="tool_quanly">
	<div id="tim">
		<form method="post">
			<input type="text">
			<input type="submit" name="tìm" value="Search">
		</form>
	</div>
	<div class="clear"></div>
	<div id="form">
		<form method="post">
			<table>
				<tr>
					<td>Tên sản phẩm</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td><input type="number"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Thêm"><input type="submit" value="Cập nhật"></td>
				</tr>
			</table>
		</form>
	</div>
	<div>
		<button id="danhsach_nhapxuat" onClick="window.location.href='index.php?action=order&select=shop&tool=nhap-xuat'">Xem danh sách nhập, xuất kho</button>
	</div>
	<div>
		<button onClick="window.location.href='index.php?action=order&select=shop&tool=sell'" id="danhsach_nhapxuat">Xem danh sách sản phẩm đã bán</button>
	</div>
	<div>
		<button onClick="window.location.href='index.php?action=order&select=shop&tool=most'" id="danhsach_nhapxuat">Xem danh sách sản phẩm bán chạy</button>
	</div>
	<div>
		<button onClick="window.location.href='index.php?action=order&select=shop&tool=giamgia'" id="danhsach_nhapxuat">Xem danh sách sản phẩm giảm giá</button>
	</div>
	<div>
		<button onClick="window.location.href='<?php if(!isset($_GET['tool']) || $_GET['tool'] == "sanpham") echo "index.php?action=order"; else echo "index.php?action=order&select=shop&tool=sanpham"; ?>'" id="back_shop">Trở về</button>
	</div>
</div>
<div class="clear"></div>


<?php 
	if(isset($_GET['tool']))
	{
		$tool = $_GET['tool'];
		switch($tool)
		{
			
			case "sanpham":
				include("blocks/order/hientai.php");
				break;
			case "nhap-xuat":
				include("blocks/order/nhap-xuat.php");
				break;
			case "most":
				include("blocks/order/most.php");
				break;
			case "sell":
				include("blocks/order/sell.php");
				break;
			case "giamgia":
				include("blocks/order/giamgia.php");
		}
		
	}
	else
		include("blocks/order/hientai.php");
?>