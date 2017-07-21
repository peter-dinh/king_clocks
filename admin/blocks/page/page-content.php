
<?php 
	if(isset($_GET['id']))
	$row = Info_Page_ID($_GET['id'])		
?>

<div id="thongbao4">
	<fieldset id="hop5">
		<div style="font-size: 20px;">Tiêu đề</div>
		<input type="text" name="tieude" value="<?php if(isset($_GET['id'])) echo $row['tieude']; ?>" style="width: 720px; margin-bottom: 10px;">
		<br />

		<br />
		<div style="font-size: 20px;">Nội dung</div>
<textarea id="content" name="content" style="width: 400px;" rows="20" ><?php if(isset($_GET['id'])) echo $row['noidung'];?></textarea>
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
