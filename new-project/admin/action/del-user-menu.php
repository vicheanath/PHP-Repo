<?php
	include('action.php');
	$db = new Action;
	$uid = $_POST['uid'];
	$mid = $_POST['mid'];
	$tbl="tbl_permission";
	$con= " uid=".$uid." && menu_id=".$mid." ";
	$db->del_data($tbl,$con);
?>