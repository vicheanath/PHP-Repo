<?php
	include('action.php');
	$db = new Action;
	$data = array();
	$e=$_POST['e'];
	$s=$_POST['s'];
	$post_data= $db->select_data("*","tbl_menu","id>0","id DESC","".$s.",".$e."");
	if($post_data !='0'){
		foreach($post_data as $row){
			$data[]=array( 
				"id" => $row[0] , "name" => $row[1] , "od" => $row[3] ,  
				"img" => $row[2] , "status" => $row[4]
			);
		}
	}
	echo json_encode($data);
?>
