<?php
	include('_config_inc.php');
	include(BASE_PATH.'admin/action/action.php');
	$db=new Action;
	$home_color="#000";
	$menu_color="#fff";
	$menuid=0;

	$f_title="ReanWeb Stage 17";
	$f_des= "Shot Description";
	$f_img = BASE_URL."admin/img/15702606268585.jpg";
	$f_url = BASE_URL;

	$con="status=1 && location=1";
	if(isset($_GET['new'])){
		$new_id=$_GET['new'];
		$post_data = $db->get_cur_data("*","tbl_news","title_link='".$new_id."'");
		$f_title = $post_data[2];
		$f_des = mb_substr(strip_tags(trim($post_data[3])),0,100,"utf-8");
		$f_img = BASE_URL.'admin/'.$post_data[4];
		$url = BASE_URL.'?menuid='.$post_data[7].'&new='.$new_id.'';
	}

	if(isset($_GET['menuid'])){
		$menuid=$_GET['menuid'];	
		$con="status=1 && menu_id=".$menuid." && location=1";
		$home_color="#fff";
	}
	$num_news=$db->count_data("tbl_news",$con);
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $f_title; ?></title>

<meta property="og:url"           content="<?php echo $f_url; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $f_title; ?>" />
<meta property="og:description"   content="<?php echo $f_des; ?>" />
<meta property="og:image"         content="<?php echo $f_img; ?>" />
  


<link href="https://fonts.googleapis.com/css?family=Battambang|Koulen&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>home/style/fontawesome-free-5.3.1-web/css/all.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>home/style/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>home/style/style.css">
<script src="<?php echo BASE_URL; ?>admin/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=1609776879104409&autoLogAppEvents=1"></script>	

	<div class="container-fluid bar1">
		<div class="container">
			<div class="row">
				<?php
					include('menu.php');
				?>
			</div>
		</div>
	</div>	
	<div class="container" style="margin-top: 10px;">
		<div class="row">
			<div class="col-xl-9 col-lg-9 new-box">
				<div class="row">
					<?php
						if(isset($_GET['new'])){
							include('news-detail.php');
						}else{
							include('news.php');
							?>
								<a class="btn btn-dark" id="btn-more-new" style="color: #fff;">More</a>
							<?php
						}
						
					?>
				</div>
			</div>
			<div class="col-xl-3 col-lg-9 ads2">
				<div class="row">
				<?php
				$post_data=$db->select_data("*","tbl_news","status=1 && location=2","id DESC","0,10");
						if($post_data != '0'){
							foreach($post_data as $row){
								?>
								<div class="col-xl-12 col-lg-12 new2">
									<div class="img-box2">
										<img src="<?php echo BASE_URL; ?>admin/<?php echo $row[4] ?>">
									</div>
									<div class="txt-box2">
										<a href="<?php echo BASE_URL; ?>?menu_id=<?php echo $row[7];?>&new=<?php echo $row[0]; ?>"><?php echo $row[2]; ?></a>
									</div>
								</div>
								<?php
							}
						}								
					?>					
				</div>	
				<div class="row">
					<div class="col-xl-12">
						<div class="fb-page" data-href="https://www.facebook.com/reantverweb/" data-tabs="" data-width="280" data-height="" data-small-header="false" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"></div>
					</div>					
				</div>	
				<div class="row">
					<div class="col-xl-12 ads2">
						<?php
							$post_data=$db->select_data("*","tbl_ads","status=1 && location=2","id DESC","0,10");
							if($post_data != '0'){
								foreach($post_data as $val){
									if($val[4]==2){
										echo $val[1];
									}else{									
									?>
										<a href="<?php echo $val[1]; ?>" target="_blank">
											<img src="admin/<?php echo $val[2]; ?>">
										</a>	
									<?php
									}
								}
							}
						?>
						
					</div>
				</div>		
			</div>
		</div>
	</div>
	<input type="hidden" value="<?php echo $con; ?>" id="txt-con">
	<input type="hidden" value="<?php echo $num_news-2; ?>" id="txt-num-news">
</body>
<script>
	$(document).ready(function(){
		var s=2;
		var con=$('#txt-con').val();
		var num_new=$('#txt-num-news');
		
		if(num_new.val()<=0){
			$('#btn-more-new').hide();
		}
		
		$('#btn-more-new').click(function(){
			var eThis=$(this);
				$.ajax({
				url:'get-news-more.php',
				type:'POST',
				data:{e:2,s:s,con:con},
				cache:false,
				dataType:'JSON',
				success:function(data){
					for(i=0;i<data.length;i++){
						var newBox='<div class="col-xl-12 box">'+
						'<div class="img-box">'+
						'<img src="admin/'+data[i].img+'">'+
						'</div>'+
						'<div class="txt-box">'+
						'<a href="<?php echo BASE_URL; ?>'+data[i].menuid+'/'+data[i].title_link+'">'+data[i].title+'</a>'+
						'<p>'+data[i].detail+'</p>'+
						'</div>'+
						'</div>';
						eThis.before(newBox);
					}
					s+=2;
					num_new.val(num_new.val()-2);
					if(num_new.val()<=0){
						eThis.hide();
					}
				}
			});			
		});
	});
	
</script>
</html>