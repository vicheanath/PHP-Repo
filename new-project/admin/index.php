<?php
	include('action/action.php');
	$db=new Action;
	if(isset($_GET['newpass'])){
		$new_pass = $_GET['newpass']; //453969
		$email = $_GET['email']; //la3la3168@gmail.com	
		$code = $_GET['code'];
		$new_pass = md5($new_pass);
		$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
		$db->upd_data("tbl_user","pass='".$new_pass."'","email='".$email."' && verify_code='".$code."'");
		echo '<h1>Reset new password is complete.</h1>';
	}	

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<link rel="stylesheet" href="style/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="frm" style="border: 1px solid #ccc;">
	<div class="header">
		<span>Login</span>
	</div>
	<form class="upl">
		<div class="body">
			<label>Email</label>
			<input type="text" id="txt-email" name="txt-email" class="frm-control">
			<label>Password</label>
			<input type="text" id="txt-pass" name="txt-pass" class="frm-control">
		</div>
		<div class="footer">
			<a class="btn-reset-pass" href="#">Forgot password</a>
			<a class="btn btn-login" style="background-color: dodgerblue;">Login</a>
		</div>
	</form>
</div>

</body>
<script>
	$(document).ready(function(){	
		//reset new password
		$('.btn-reset-pass').click(function(){
			var email= $('#txt-email');
			if(email.val()==''){
				alert('Please input email.');
				email.focus();
				return;
			}$.ajax({
				url:'action/new-pass.php',
				type:'POST',
				data:{email:email.val()},
				cache:false,
				dataType:'JSON',
				success:function(data){
					if(data.dpl==false){
						alert('Please input email again.');
						return;
					}else if(data.send==false){
						alert('Please try again.');
						return;
					}else{
						alert('Please check ur email.');
						return;
					}
				}
			});				
		});		
	
		$('.btn-login').click(function(){
			var email= $('#txt-email');
			var pass = $('#txt-pass');
			if(email.val()==''){
				alert('Please input email.');
				email.focus();
				return;
			}else if(pass.val()==''){
				alert('Please input pass.');
				pass.focus();
				return;
			}$.ajax({
				url:'action/login.php',
				type:'POST',
				data:{email:email.val(),pass:pass.val()},
				cache:false,
				dataType:'JSON',
				success:function(data){
					if(data.login=='1'){
						window.location.href = "admin.php";

					}else{
						alert('Please input again.');
					}
				}
			});				
		});		
	});
	
</script>
</html>