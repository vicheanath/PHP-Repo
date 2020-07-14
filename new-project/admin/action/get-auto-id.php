<?php
	include('action.php');
	$db = new Action;
	$tbl=array("tbl_menu","tbl_news","tbl_ads","tbl_user");
	$frm=$_POST['frm'];//10
	$res['id'] = $db->get_auto_id("id",$tbl[$frm],"id>0","id DESC");
	echo json_encode($res);
?>