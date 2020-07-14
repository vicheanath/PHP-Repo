<?php
	//$cn = new mysqli("localhost","treanweb","4dDhCw*&0s;H","treanweb_stage17");
	$cn = new mysqli("localhost","root","","stage17_project");
	$tbl=array("tbl_menu","tbl_news","tbl_ads","tbl_user");
	$frm=$_POST['frm'];
	$sql="SELECT COUNT(*) AS total FROM ".$tbl[$frm]."";
	$result=$cn->query($sql);
	$row=$result->fetch_array();
	$res['total']=$row[0];
	echo json_encode($res);
?>