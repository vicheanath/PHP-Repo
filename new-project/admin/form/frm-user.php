<div class="frm">
	<div class="header">
		<span>User</span>
		<i id="btn-close" class="fas fa-times"></i>
	</div>
	<form class="upl">
		<div class="body">
			<input type="text" id="txt-edit-id" name="txt-edit-id" value="0">
			<label>ID</label>
			<input type="text" id="txt-id" name="txt-id" class="frm-control">
			<label>Email</label>
			<input type="text" id="txt-email" name="txt-email" class="frm-control">
			<label>Password</label>
			<input type="text" id="txt-pass" name="txt-pass" class="frm-control">
			
			<label>User type</label>
			<select id="txt-type" name="txt-type" class="frm-control">
				<option value="admin">admin</option>
				<option value="client">client</option>
			</select>
			
			<label>Status (1=Active,2=Delete)</label>
			<select id="txt-status" name="txt-status" class="frm-control">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</div>
		<div class="footer">
			<a class="btn btn-save">Save Change</a>
		</div>
	</form>
</div>