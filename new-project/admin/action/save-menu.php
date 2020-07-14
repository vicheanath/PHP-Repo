<?php
	include('action.php');
	$db = new Action;
	$id=$_POST['txt-id'];
	$name=$_POST['txt-name'];
	$od = $_POST['txt-od'];
	$img = $_POST['txt-photo'];
	$status= $_POST['txt-status'];
	$edit_id = $_POST['txt-edit-id'];
	$dpl = $db->dpl_data("id","tbl_menu","name='".$name."' AND id != ".$edit_id."");
	$res['dpl']=true;
	$res['edit']=false;
	if($dpl==false){
		if($edit_id==0){		
			$tbl="tbl_menu";
			$val="null,'".$name."','".$img."','".$od."','".$status."'";
			$db->insert_data($tbl,$val);
			$res['id']=$db->last_id;		
		}else{
			$tbl="tbl_menu";
			$fld="name='".$name."',img='".$img."',od='".$od."',status='".$status."'";
			$con="id=".$edit_id."";			
			$db->upd_data($tbl,$fld,$con);			
			$res['edit']=true;
		}
		$res['dpl']=false;
	}
	echo json_encode($res);
?>