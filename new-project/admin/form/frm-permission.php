<?php
	include('../action/action.php');
	$db=new Action;
?>
<div class="frm" style="border: 1px solid #ccc; width: 760px;">
	<div class="header">
		<span>Permission</span>
	</div>
	<form class="upl">
		<div class="body">
			<label>Email</label>
			<select id="txt-user" name="txt-user" class="frm-control">
				<option value="0">---select one user email---</option>
				<?php
						$post_data=$db->select_data("id,email","tbl_user","status=1 && type='client'","id","0,20");
						if($post_data!='0'){
							foreach($post_data as $val){
								?>
									<option value="<?php echo $val[0]; ?>"><?php echo $val[1]; ?></option>	
								<?php
							}
						}
					?>					
			</select>
			<div class="user-menu" id="txt-disable-menu">
				<ul>
					
				</ul>
			</div>
			<div class="user-menu" id="txt-enable-menu">
				<ul></ul>
			</div>
			
		</div>
		<div class="footer"></div>
	</form>
</div>