<div class="frm">
	<div class="header">
		<span>Menu</span>
		<i id="btn-close" class="fas fa-times"></i>
	</div>
	<form class="upl">
		<div class="body">
			<input type="text" id="txt-edit-id" name="txt-edit-id" value="0">
			<label>ID</label>
			<input type="text" id="txt-id" name="txt-id" class="frm-control">
			<label>Name</label>
			<input type="text" id="txt-name" name="txt-name" class="frm-control">
			<label>OD</label>
			<input type="text" id="txt-od" name="txt-od" class="frm-control">
			<label>Status (1=Active,2=Delete)</label>
			<select id="txt-status" name="txt-status" class="frm-control">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<label>Photo</label>
			<div class="img-box">
				<input type="file" id="txt-file" name="txt-file">	
			</div>	
			<input type="text" id="txt-photo" name="txt-photo">	
		</div>
		<div class="footer">
			<a class="btn btn-save">Save Change</a>
		</div>
	</form>
</div>