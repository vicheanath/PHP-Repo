<?php 
include('db.php');
$db = new Database;
$e=$_POST['e'];
$s=$_POST['s'];
$tbl="tbl_category";
$fld="*";
$con="id>0";
$od="id DESC";
$limit=$s.','.$e;
$post_data = $db->select_data($tbl,$fld,$con,$od,$limit);
if($post_data!='0'){
	foreach($post_data as $row){
		$data[]=array(
			"id"=>$row[0],
			"name"=>$row[1],
			"img"=>$row[2],
			"od"=>$row[3],
			"status"=>$row[5],
			"status2"=>'true',
			);
	}
}else{
	$data[]=array("status2"=>"flase");
}
echo json_encode($data);
?>