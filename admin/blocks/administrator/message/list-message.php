<div id="list-message">
	<div id="title" ><h3>Những tin nhắn gần đây</h3></div>
	<table width="330" border="1">
  <tbody>
    <tr>
      <th width="26">ID</th>
      <th width="192">Tiêu đề</th>
      <th width="90">Ngày cập nhật</th>
    </tr>
    <?php
	  $x = List_Message();
	  while($row = mysqli_fetch_array($x))
	  {
		  ob_start();
	 ?>
    <tr>
      <td>{id}</td>
      <td><a href="index.php?action=administrator&select=message&id={id}">{tieude}</a></td>
      <td>{date}</td>
    </tr>
    <?php
		  $s = ob_get_clean();
		  $s = str_replace("{id}",$row['id'],$s);
		  $s = str_replace("{tieude}",$row['tieude'],$s);
		  $s = str_replace("{date}",$row['date'],$s);
		  echo $s;
	  }
	  ?>
  </tbody>
</table>

</div>

<?php 
	$mysqli = mysqli_connect("localhost","peterdinh018","","c9");
	mysqli_set_charset($mysqli, "utf8");
	if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		mysqli_query($mysqli,"delete from message where id = $id");
		header("Refresh:0; url=index.php?action=administrator&select=message");
	}

?>
