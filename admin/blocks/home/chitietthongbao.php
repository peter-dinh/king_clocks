<?php
	if($_GET['id'])
	{
		$id = $_GET['id'];
		$row = Array_Info_Message_ID($id);
		$tieude = $row['tieude'];
		$noidung = $row['noidung'];
		$date = $row['date'];
		$nguoinhan = $row['nguoinhan'];
		$row_display = Array_Info_Men_To($nguoinhan);
		$display = $row_display['tenvaitro'];
	}

?>
<div id="chitietthongbao">
	<fieldset id= "hop5">
		<ul>
			<li>
				<div style="margin-bottom: 5px; font-size: 20px;"> <label class="label" for="tieude">Tiều đề</label></div>
              <input type="text" name="tieude" value="<?php echo $tieude; ?>"  readonly style="width: 600px; margin-bottom: 10px; background-color: gainsboro;">
			</li>
			<li>
			  <div style="margin-bottom: 5px;font-size: 20px;"> <label class="label" for="textarea">Nội dung</label></div>
              <div id="noidung_message"><?php echo $noidung; ?></div>
			</li>
			<li>
				<div style="margin-bottom: 5px;font-size: 20px;"> <label class="label" for="textfield">Người nhận:</label></div>
              <input type="text" name="textfield" value="<?php echo $display; ?>" readonly style="width: 600px;background-color: gainsboro;margin-bottom: 10px;" id="textfield">
			</li>
			<li>
				<div style="margin-bottom: 5px;font-size: 20px;"> <label class="label" for="textfield2">Ngày cập nhật:</label></div>
              <input type="text" name="textfield2" value="<?php echo $date; ?>" readonly style="background-color: gainsboro;width: 600px;margin-bottom: 10px;" id="textfield2">
			</li>
		</ul>
	</fieldset>
</div>

<script type="text/javascript">
var editor = CKEDITOR.instances['textarea'].setData(html)
CKEDITOR.instances.editor1.insertHtml( '<p>This is a new paragraph.</p>' );
</script>
<div class="clear"></div>
<div id="admin_tacvu3">
	<div id="phantrang">
		<?php 
			if(isset($_GET['id'])) $id = $_GET['id']; 
			$row = Array_Message_Max_ID();
			$max = $row['id'];
		?>
		<a href="index.php?action=home&select=view&id=<?php echo $id-1; ?>" <?php if($id == 1) echo "hidden" ?> style="float: left;">Tin cũ hơn</a> <a href="index.php?action=home&select=view&id=<?php echo $id+1; ?>" <?php if($id == $max) echo "hidden" ?> style="float: right;" >Tin mới hơn</a>
	</div>
</div>
