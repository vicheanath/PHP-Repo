<?php
	include('../action/action.php');
	$db=new Action;
?>
<div class="frm" style="width: 960px;">
	<div class="header">
		<span>News</span>
		<i id="btn-close" class="fas fa-times"></i>
	</div>
	<form class="upl">
		<div class="body">
			<div style="width: 30%; float: left;">
			<input type="text" id="txt-edit-id" name="txt-edit-id" value="0">
				<label>ID</label>
				<input type="text" id="txt-id" name="txt-id" class="frm-control">
				<label>Location</label>
				<select id="txt-location" name="txt-location" class="frm-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<label>News Type</label>
				<select id="txt-menu" name="txt-menu" class="frm-control">
					<?php
						$post_data=$db->select_data("id,name","tbl_menu","status=1","name","0,20");
						if($post_data!='0'){
							foreach($post_data as $val){
								?>
									<option value="<?php echo $val[0]; ?>"><?php echo $val[1]; ?></option>	
								<?php
							}
						}
					?>					
				</select>
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
			<div style="width: 68%; float: left; margin-left: 2%;">
				<input type="text" id="txt-title" name="txt-title" class="frm-control"><br><br>
			
				<textarea style="float: left;" class="frm-control" id="txt-detial" name="txt-detail"></textarea>
			</div>
		</div>
		<div class="footer">
			<a class="btn btn-save">Save Change</a>
		</div>
	</form>
</div>