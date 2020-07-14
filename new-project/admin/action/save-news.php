<?php
	date_default_timezone_set('Asia/Phnom_Penh');

	include('action.php');
	$db = new Action;
	$id=$_POST['txt-id'];
	$date_post = date("Y/m/d").' '.date("h:i:sa");
	$title = $_POST['txt-title'];
	$title= trim($title);
	$title = $db->real_string($title);
	$des = $_POST['txt-detail'];
	$des = trim($des);
	$des = $db->real_string($des);
	$img = $_POST['txt-photo'];
	$od = $_POST['txt-od'];
	$location = $_POST['txt-location'];
	$menu = $_POST['txt-menu'];
	$title_link=$db->php_slug($title);
	$user = 1;
	$view =0 ;	
	$status= $_POST['txt-status'];
	$edit_id = $_POST['txt-edit-id'];

	$dpl = $db->dpl_data("id","tbl_news","title='".$title."' AND id != ".$edit_id."");
	$res['dpl']=true;
	$res['edit']=false;
	if($dpl==false){
		if($edit_id==0){		
			$tbl="tbl_news";			$val="null,'".$date_post."','".$title."','".$des."','".$img."','".$od."',".$location.",".$menu.",'".$title_link."',".$user.",".$view.",'".$status."'";
			
			$db->insert_data($tbl,$val);
			$res['id']=$db->last_id;		
		}else{
			$tbl="tbl_news";
			$fld="title='".$title."',des='".$des."',img='".$img."',od='".$od."',location=".$location.",menu_id='".$menu."',title_link='".$title_link."',status='".$status."'";
			$con="id=".$edit_id."";			
			$db->upd_data($tbl,$fld,$con);			
			$res['edit']=true;
		}
		$res['dpl']=false;
	}
	echo json_encode($res);
?>