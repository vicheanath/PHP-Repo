<?php 
include('db/db.php');
$db = new Database;
$e=$_POST['e'];
$s=$_POST['s'];
//$tbl="tbl_sub_category";
//$od="id DESC";
$limit=$s.','.$e;
$sql="SELECT tbl_sub_category.id,
		tbl_category.name, 
		tbl_sub_category.name,
		tbl_sub_category.img,
		tbl_sub_category.od,
		tbl_sub_category.status,
		tbl_sub_category.id
		FROM tbl_sub_category INNER JOIN tbl_category ON tbl_category.id=tbl_sub_category.cate_id WHERE tbl_sub_category.id>0 ORDER BY tbl_sub_category.id DESC LIMIT $limit";
$post_data=$db->select_inner_join_data($sql);
if($post_data!='0'){
	foreach($post_data as $row){
		$data[]=array(
			"id"=>$row[0],
			"cate"=>$row[1],
			"name"=>$row[2],
			"img"=>$row[3],
			"od"=>$row[4],
			"status"=>$row[5],
			"cate_id"=>$row[6],
			"status2"=>'true',
			);
	}
}else{
	$data[]=array("status2"=>"flase");
}
echo json_encode($data);
?>