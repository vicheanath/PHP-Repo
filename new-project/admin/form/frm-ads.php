<div class="frm">
	<div class="header">
		<span>Ads</span>
		<i id="btn-close" class="fas fa-times"></i>
	</div>
	<form class="upl">
		<div class="body">
			<input type="text" id="txt-edit-id" name="txt-edit-id" value="0">
			<label>ID</label>
			<input type="text" id="txt-id" name="txt-id" class="frm-control">
			<label>URL</label>
			<input type="text" id="txt-url" name="txt-url" class="frm-control">
			<label>Location</label>
			<select id="txt-location" name="txt-location" class="frm-control">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<label>Type</label>
			<select id="txt-type" name="txt-type" class="frm-control">
				<option value="1">1-Photo</option>
				<option value="2">2-Video</option>
			</select>
			
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