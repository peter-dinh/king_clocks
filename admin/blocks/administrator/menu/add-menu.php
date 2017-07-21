<div id="add_menu">
	<form method="post">
		<fieldset id="hop_2">
			<table>
				<tbody>
					<tr>
						<td><label>Chọn menu:</label></td>
						<td><select style="width: 173px;" name="select">
							<option value="{value_menu}">{menu}</option>
							</select></td>
					</tr>
					<tr>
						<td><label>Tên link:</label></td>
						<td><input type="text" name="ten"></td>
					</tr>
					<tr>
						<td><label>URL:</label></td>
						<td><input type="text" name="url" ></td>
					</tr>
					<tr>
						<td><label>Menu cha:</label></td>
						<td><select style="width: 173px;" name="menu_cha">
							<option value="{value_cha}">{list_cha}</option>
						</select></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="checkbox" name="tab"/>Mở trong tab mới</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="them" value="Thêm vào menu" ></td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</form>
</div>