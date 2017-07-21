
<style>
	.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.6s ease-in-out;
    opacity: 0;
}

div.panel.show {
    opacity: 1;
    max-height: 500px;  
}
</style>
<div id="content">
<div class="center_title">
	<h3>Thông tin đơn hàng</h3>
</div>
<div class="linkpost">
	<h4><a href="index.php">Trang chủ</a> > <a href="index.php?account=order">Thông tin đơn hàng</a></h4>
</div>

<?php 
	$username = $_SESSION['username'];
	$x_donhang = List_Order($username);
	while($row_donhang = mysqli_fetch_array($x_donhang))
	{
		$id_order = $row_donhang['id'];
	?>
<h2 style="text-align:center;background-color: #ddd; margin-top:50px;" class="accordion"> Đơn hàng số <?php echo $row_donhang['id'] ?></h2>
<div id="foo" class="panel">
<table style="margin-left:200px; text-align: center;">
	<tr>
		<td>Tên sản phẩm:</td>
		<td><?php 
		$str ="";
		$x_chitietdonhang = List_Order_Detail($id_order); 
			while($row_order_detail = mysqli_fetch_array($x_chitietdonhang))
			{
				$id_order_detail = $row_order_detail['id_sp'];
				$str .= Name_Product($id_order_detail)."   ";
			}
		echo $str;
			?>
		</td>
	</tr>
	<tr>
		<td>Ngày:</td>
		<td><?php echo $row_donhang['date']; ?></td>
	</tr>
	<tr>
		<td>Tổng tiền:</td>
		<td><?php echo $row_donhang['tong']; ?></td>
	</tr>
</table>
<table width="322" height="77" style="margin-left:130px;">
	<tr >
	  <td width="48"><div class="tooltip" onclick="myFunction()"><img src="admin/image/1.png" width="50px;" /><span class="tooltiptext" id="myPopup">Tiếp nhận đơn hàng</span></div>
		</td>
		<td width="201" style="text-align:center;"><hr />
		</td>
	  <td width="49"><div class="tooltip"><img src="admin/image/2.png" width="50px;" /><span class="tooltiptext" id="myPopup">Đóng gói - Giao nhận</span></div>
		</td>
		<td width="222" style="text-align:center;"><hr /></td>
		<td width="54"><div class="tooltip"><img src="admin/image/3.png" width="50px;" /><span class="tooltiptext" id="myPopup">Đã được nhận</span></div>
		</td>
	</tr>
	<tr>
		<?php 
			if($row_donhang['status'] == 0)
			{
				$message1 = "dd.png";
			}
			if($row_donhang['status'] == 1)
			{
				$message1 ="ht.png";
				$message2 = "dd.png";
			}
			if($row_donhang['status'] == 2)
			{
				$message1 ="ht.png";
				$message2 = "ht.png";
				$message3 = "dd.png";
			}
			if($row_donhang['status'] == 3)
			{
				$message1 ="huy.png";
				$message2 = "huy.png";
				$message3 = "huy.png";
			}
		?>
		<td><img src="admin/image/<?php echo $message1; ?>"  style="margin-left:15px;" width="20px;" />
		</td>
		<td>
		</td>
		<td><img src="admin/image/<?php echo $message1; ?>" <?php if($row_donhang['status'] == 0) echo "hidden" ?> style="margin-left:15px;" width="20px;"  />
		</td>
		<td>
		</td>
		<td><img src="admin/image/<?php echo $message1; ?>" <?php if($row_donhang['status'] == 0 || $row_donhang['status'] == 1) echo "hidden" ?> style="margin-left:15px;" width="20px;" />
		</td>
	</tr>

</table>
<br/>
<table class="tb2" width="600" height="39" style="text-align:center; margin-bottom:10px;">
	<tr>
		<th style="border: 1px solid #333; background:#CCC;" width="144">Ngày - giờ
		</th>
		<th style="border: 1px solid #333; background:#CCC;" width="444">Mô tả 
		</th>
	</tr>
	<?php
		$x_status_client = List_Status_Client($id_order);
		while($row_status_client = mysqli_fetch_array($x_status_client))
		{
	?>
	<tr>
		<td style="border: 1px solid #333;"><?php echo $row_status_client['date']; ?>
		</td>
		<td style="border: 1px solid #333;"><?php if($row_status_client['id_tinhtrang'] == 0) echo"Đơn hàng đang được xử lý"; if($row_status_client['id_tinhtrang'] == 1) echo "Đơn hàng đang được chuyển đi"; if($row_status_client['id_tinhtrang'] == 2) echo "Đơn hàng đã hoàn thành"; if($row_status_client['id_tinhtrang'] == 3) echo "Đơn hàng đã bị hủy"; ?>
		</td>
	</tr>
	<?php 
		}
	?>
	
</table>
</div>

 <?php 
	}
?>
</div> 
 
  <script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById('myPopup');
    popup.classList.toggle('show');
}
</script>   
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>   
