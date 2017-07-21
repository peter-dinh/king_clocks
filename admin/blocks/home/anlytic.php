
<div id="anlytic">
	<fieldset id="hop_menu_anlytic">
		<ul>
			<li><a href ="index.php?action=home&select=anlytic&view=1">Phân tích theo Quốc Gia</a></li>
			<li><a href ="index.php?action=home&select=anlytic&view=2">Phân tích theo Thành Phố</a></li>
			<li><a href ="index.php?action=home&select=anlytic&view=3">Phân tích theo Thiết bị</a></li>
			<li><a href ="index.php?action=home&select=anlytic&view=4">Phân tích theo Duyệt trình</a></li>
		</ul>
	</fieldset>
<?php 
	if(isset($_GET['view']))
		{
			$id = $_GET['view'];
			switch ($id) {
				case '1':
					include "blocks/home/quoc-gia.php";
					break;
				case '2':
					include "blocks/home/thanh-pho.php";
					break;
				case '3':
					include "blocks/home/thiet-bi.php";
					break;
				case '4':
					include "blocks/home/duyet-trinh.php";
					break;
			}
		}
	
?>
	
	
</div>