<?php 
include('db/db.php');
$db = new Database;
$cate_id = $_POST['cate'];

$data[]=array();
$post_data = $db->select_data("tbl_sub_category","id,name","status=1 && cate_id=$cate_id","name","0,99999999");
if($post_data !='0'){
	foreach($post_data as $val){
		$data[]=array(
			"id"=>$val[0],
			"name"=>$val[1],
		);
	}
}

echo json_encode($data);
?>