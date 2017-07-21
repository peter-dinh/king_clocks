
<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	//update and xuat view
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$luot_xem = Info_View($id);
		$luot_xem += 1;
		mysqli_query($mysqli,"update product set luotxem = $luot_xem where id=$id");
	}
?>
<div id ="share">
	<table>
		<tr>
			<td><iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fvuadongho.info%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></td>
			<td><img src="admin/image/view.png" style="width: 40px;float: left;"></td>
			<td><?php  echo $luot_xem; ?></td>
		</tr>
	</table>
</div>