<?php
	include('action.php');
	$db = new Action;
	$id=$_POST['txt-id'];
	$url=$_POST['txt-url'];
	$location = $_POST['txt-location'];
	$type = $_POST['txt-type'];
	$img = $_POST['txt-photo'];
	$status= $_POST['txt-status'];
	$edit_id = $_POST['txt-edit-id'];
	$res['edit']=false;

	if($edit_id==0){		
		$tbl="tbl_ads";
		$val="null,'".$url."','".$img."',".$location.",".$type.",'".$status."'";
		$db->insert_data($tbl,$val);
		$res['id']=$db->last_id;		
	}else{
		$tbl="tbl_ads";
		$fld="url='".$url."',img='".$img."',location='".$location."',type=".$type.",status='".$status."'";
		$con="id=".$edit_id."";			
		$db->upd_data($tbl,$fld,$con);			
		$res['edit']=true;
	}
	echo json_encode($res);
?>