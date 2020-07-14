<?php
	include('action.php');
	$db = new Action;
	$data = array();
	$e=$_POST['e'];
	$s=$_POST['s'];
	$post_data= $db->select_data("id,title,status","tbl_news","id>0","id DESC","".$s.",".$e."");
	if($post_data !='0'){
		foreach($post_data as $row){
			$data[]=array( 
				"id" => $row[0] , "title" => $row[1] , "status" => $row[2]
			);
		}
	}
	echo json_encode($data);
?>
