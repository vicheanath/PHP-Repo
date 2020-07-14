<?php
	include('admin/action/action.php');
	$db = new Action;
	$data = array();
	$e=$_POST['e'];
	$s=$_POST['s'];
	$con=$_POST['con'];
	$post_data= $db->select_data("*","tbl_news",$con,"id DESC","".$s.",".$e."");
	if($post_data !='0'){
		foreach($post_data as $row){
			$data[]=array( 
				"id" => $row[0] , "title" => $row[2] ,"img"=>$row[4],"detail"=>mb_substr(strip_tags(trim($row[3])),0,100,"utf-8"),"menuid"=>$row[7],"title_link"=>$row[8]
			);
		}
	}
	echo json_encode($data);
?>
