<?php
	include('action.php');
	$db = new Action;
	$id=$_POST['txt-id'];
	$email = $_POST['txt-email'];
	$pass = $_POST['txt-pass'];

	$pass=$db->real_string($pass);
	$pass = md5($pass);
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	$type = $_POST['txt-type'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$status= $_POST['txt-status'];
	$edit_id = $_POST['txt-edit-id'];
	$dpl = $db->dpl_data("id","tbl_user","email='".$email."' AND id != ".$edit_id."");
	$res['dpl']=true;
	$res['edit']=false;
	if($dpl==false){
		if($edit_id==0){		
			$tbl="tbl_user";
			$val="null,'".$email."','".$pass."','".$type."','".$ip."','000','".$status."'";
			$db->insert_data($tbl,$val);
			$res['id']=$db->last_id;		
		}else{
			$tbl="tbl_user";
			$fld="email='".$email."',status='".$status."',type='".$type."'";
			$con="id=".$edit_id."";			
			$db->upd_data($tbl,$fld,$con);			
			$res['edit']=true;
		}
		$res['dpl']=false;
	}
	echo json_encode($res);
?>