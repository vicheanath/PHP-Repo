<?php
	include('action.php');
	$db = new Action;
	$data = array();
	$e=$_POST['e'];
	$s=$_POST['s'];
	$post_data= $db->select_data("*","tbl_ads","id>0","id DESC","".$s.",".$e."");
	if($post_data !='0'){
		foreach($post_data as $row){
			$data[]=array( 
				"id" => $row[0] , "url" => $row[1] , "img" => $row[2] ,
				"location" => $row[3] , "type"=>$row[4] , "status" => $row[5]
			);
		}
	}
	echo json_encode($data);
?>
