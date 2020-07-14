<?php 
include('db.php');
$db = new Database;
$e=3;
$s=0;
$idpro=$_POST['id'];
$tbl="tbl_product";
$fld="*";
$con="id=".$idpro;
$od="id DESC";
$limit=$s.','.$e;
$post_data = $db->select_data($tbl,$fld,$con,$od,$limit);
if($post_data!='0'){
	foreach($post_data as $row){
		$data[]=array(
			"id"=>$row[0],
			"name"=>$row[1],
			"des"=>$row[2],
			"img"=>trim($row[3]),
			"price"=>$row[4],
			"dis"=>$row[5],
			"price_aft_dis"=>$row[6],
			"od"=>$row[7],
			"pro_status"=>$row[8],
			"slide"=>$row[9],
			"cate_id"=>$row[10],
			"sub_cate_id"=>$row[11],
			"status"=>$row[12],
			"uid"=>$row[13],
			"status2"=>'true',
			);
	}
}else{
	$data[]=array("status2"=>"flase");
}
echo json_encode($data);
?>