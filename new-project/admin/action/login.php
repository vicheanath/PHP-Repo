<?php
	session_start();
	include('action.php');
	$db=new Action;

	$email= $_POST['email']; //la3la3168@gmail.com
	$pass = $_POST['pass'];
	$pass = trim($pass);
	$pass = $db->real_string($pass);	

	$pass = md5($pass);

	$res['login']='0';

	$ip = $_SERVER['REMOTE_ADDR'];

	$dpl = $db->dpl_data("*","tbl_user","email='".$email."'");
	if($dpl==true){
		
		$post_data=$db->get_cur_data("*","tbl_user","email='".$email."'");
		
		if (password_verify($pass, $post_data[2])) {
			// Success!	
			$db->upd_data("tbl_user","ip='".$ip."'","email='".$email."'");
			$res['login']='1';
			$_SESSION['email']=$email;
			$_SESSION['uid']=$post_data[0];
			$_SESSION['utype']=$post_data[3];
		}
		
		$res['dpl']=true;
		
	}else{
		$res['dpl']=false;
	}

	echo json_encode($res);

?>