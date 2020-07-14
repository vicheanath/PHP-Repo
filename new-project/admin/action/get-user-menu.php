<?php
	include('action.php');
	$db = new Action;
	$data = array();
	$uid = $_POST['uid'];
	$post_data= $db->select_data("*","tbl_permission","uid=".$uid."","uid  DESC","0,100");
	if($post_data !='0'){
		foreach($post_data as $row){
			$data[]=array( 
				"uid" => $row[0] , "mid" => $row[1] ,"mname"=>$row[2]
			);
		}
	}
	echo json_encode($data);
?>
