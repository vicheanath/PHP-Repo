<?php
	include('action.php');
	$db = new Action;
	$id = $_POST['id'];
	$post_data = $db->get_cur_data("*","tbl_news","id=".$id."");
	if($post_data!='0'){
		$res['title'] = $post_data[2];
		$res['des'] = $post_data[3];
		$res['img'] = $post_data[4];
		$res['od'] = $post_data[5];
		$res['location'] = $post_data[6];
		$res['menu'] = $post_data[7];
		$res['status']= $post_data[11];
	}
	echo json_encode($res);
?>
