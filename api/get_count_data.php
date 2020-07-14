<?php 
$cn= new MySQLi("localhost","root","","shop_project");
$tbl=array("tbl_slide","tbl_category","tbl_sub_category","tbl_product");
$opt=$_POST['tbl'];
$sql = "SELECT COUNT(*) AS total FROM $tbl[$opt]";
$result = $cn->query($sql);
$row = $result->fetch_array();
$res['data']=$row[0];
echo json_encode($res);
?>