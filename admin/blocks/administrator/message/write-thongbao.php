
<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$row = Array_Info_Message($id);
		$tieude = $row['tieude'];
		$noidung = $row['noidung'];
	}
?>

<div id="thongbao3">
	<fieldset id="hop4">
		<input type="text" name="tieude" value="<?php if(isset($_GET['id'])) echo $tieude; else echo "Nhập tiêu đề thông báo ..." ?>" style="width: 650px; margin-bottom: 10px;">
		<br />

		<br />
<textarea id="content" name="content" style="width: 400px;resize: none;" rows="20" ><?php if(isset($_GET['id'])) echo $noidung; else echo "Nhập nội dung thông báo tại đây ^ - ^" ?></textarea>
	<script type="text/javascript">
	
var editor = CKEDITOR.replace( 'content',{
	uiColor : '#9AB8F3',
	language:'vi',
	skin:'v2',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images', 
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash', 
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images', 
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	toolbar:[
	['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
	]
});		
</script>
	<script>
		config.removePlugins = 'resize';
		</script>

	</fieldset>
</div>
