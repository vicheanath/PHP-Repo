<?php
	include('action.php');
	$db = new Action;
	$uid = $_POST['uid'];
	$mid = $_POST['mid'];
	$mname = $_POST['mname'];
	$tbl="tbl_permission";
	$val="".$uid.", ".$mid.", '".$mname."'";
	$db->insert_data($tbl,$val);	
//	$res['id']=10;
//	echo json_encode($res);
?>