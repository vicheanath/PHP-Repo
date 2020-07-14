<?php
	session_start();
	include('action/action.php');
	$db=new Action;

	if(!isset($_SESSION['email'])){
		header('Location: index.php');
	}
	$email = $_SESSION['email'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$dplData= $db->dpl_data("*","tbl_user","email='".$email."' && ip = '".$ip."'");
	if($dplData==false){
		header('Location: index.php');
	}
	$uid = $_SESSION['uid'];
	$utype = $_SESSION['utype'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Page</title>
<link rel="icon" href="img/icon.jpg">
<link href="https://fonts.googleapis.com/css?family=Content&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style/fontawesome-free-5.3.1-web/css/all.min.css">
<link rel="stylesheet" href="style/style.css">
<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>

<div class="bar1">
	<div class="left">
		<div class="btn-menu"></div>
	</div>
	<div class="right">
		<span id="form-title">Funciton Title</span>
		<ul>
			<li id="btn-add">Add</li>
			<li> 
				<select id="txt-fil-page" name="txt-fil-page">
					<option value="2">2</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="500">500</option>
					<option value="5000">5000</option>
				</select> 
			</li>
			<li id="btn-back"> < </li>
			<li> <span id="cur-page">1</span>  / <span id="total-page"></span> of <span id="total-record"></span> </li>
			<li id="btn-next"> > </li>
		</ul>
	</div>
</div>

<div class="left-menu">
	<ul>
		<?php
			if($utype=='client'){
				$post_data=$db->select_data("*","tbl_permission","uid=".$uid."","uid","0,100");
				if($post_data!='0'){
					foreach($post_data as $val){
						?>
							<li data-frm="<?php echo $val[1]; ?>"><?php echo $val[2]; ?></li>
						<?php
					}
				}	
			}else{
				?>					
					<li data-frm="0">Menu</li>
					<li data-frm="1">News</li>
					<li data-frm="2">Ads</li>
					<li data-frm="3">User</li>
					<li data-frm="4">Permission</li>		
				<?php
			}
			
		?>
	

	</ul>
</div>
<div class="content">
	<table id="tbl-data"></table>
	<div id="frm-other"></div>
</div>
</body>
<script>
	$(document).ready(function(){
		//hide show menu
		var ind;
		var body=$('body');
		var tbl=$('#tbl-data');
		var pop="<div class='popup'></div>";
		var t=0;
		var e=$('#txt-fil-page').val();
		var s=0;
		var frm;
		var totalRecord=$('#total-record');
		var totalPage=$('#total-page');
		var curPage=$('#cur-page');
		var frm_name = ["frm-menu.php","frm-news.php","frm-ads.php","frm-user.php","frm-permission.php"];
		var btnAction= "<input type='button' value='Edit' class='btn-edit'>";
		
		var all_menu="<li data-frm='0'>Menu</li>"+
					"<li data-frm='1'>News</li>"+
					"<li data-frm='2'>Ads</li>"+
					"<li data-frm='3'>User</li>"+
					"<li data-frm='4'>Permission</li>";		
		
		
		body.on("change","#txt-user",function(){
			var uid = $(this);			
			if(uid.val()=='0'){
				$('#txt-disable-menu').find('ul').empty();
				return;
			}
			$.ajax({
				url:'action/get-user-menu.php',
				type:'POST',
				data:{uid:uid.val()},
				cache:false,
				dataType:'JSON',
				success:function(data){
					var txt='';
					for(i=0;i<data.length;i++){
						txt +="<li data-frm='"+data[i].mid+"'> "+data[i].mname+" </li>";
						$('#txt-disable-menu').find('ul li[data-frm='+data[i].mid+']').remove();
					}
					$('#txt-enable-menu').find('ul').html(txt);					
				}
			});				
			
			$('#txt-disable-menu').find('ul').html(all_menu);
		});
		
		
		body.on('click',"#txt-disable-menu ul li",function(){
			var eThis = $(this);
			var uid = $('#txt-user');
			var mid = eThis.data("frm");
			var mname = eThis.text();			
			$.ajax({
				url:'action/save-user-menu.php',
				type:'POST',
				data:{uid:uid.val(),mid:mid,mname:mname},
				cache:false,
				//dataType:'JSON',
				success:function(data){
					$('#txt-enable-menu').find('ul').append(eThis);
				}
			});
		});
		body.on('click',"#txt-enable-menu ul li",function(){
			var eThis = $(this);
			var eThis = $(this);
			var uid = $('#txt-user');
			var mid = eThis.data("frm");	
			$.ajax({
				url:'action/del-user-menu.php',
				type:'POST',
				data:{uid:uid.val(),mid:mid},
				cache:false,
				//dataType:'JSON',
				success:function(data){
					$('#txt-disable-menu').find('ul').append(eThis);
				}
			});
			
			
		});
		
		
		
		$('.btn-menu').click(function(){
			if(t==0){
				$('.left-menu').hide();	
				t=1;
				$('.content').css({'width':'100%'});
			}else{
				$('.left-menu').show();	
				t=0;
				$('.content').css({'width':'85%'});
			}
			
		});
		//add form
		$('#btn-add').click(function(){	
			body.append(pop);	
			$(".popup").load("form/"+frm_name[frm]+"", function(responseTxt, statusTxt, xhr){
				if(statusTxt == "success")
				  	get_auto_id();
					calleditor();
				if(statusTxt == "error")
				  alert("Error: " + xhr.status + ": " + xhr.statusText);
			});
		});
	
		//close form
		body.on('click','#btn-close',function(){
			$('.popup').remove();
		});
		//left men click
		$('.left-menu').on('click','ul li',function(){
			s=0;
			$('#frm-other').empty();
			$('#tbl-data').empty();
			var eThis=$(this);
			frm=eThis.data('frm');
			$('.right').show();
			$('.right').find('#form-title').text(eThis.text());
			$('.left-menu').find('ul li').css({'background-color':'#eee'});
			eThis.css({'background-color':'yellowgreen'});
			if(frm==0){
				get_menu_list();
			}else if(frm==1){
				get_news_list();
			}else if(frm==2){
				get_ads_list();
			}else if(frm==3){
				get_user_list();
			}else if(frm==4){
				get_permission_form();
			}	
			count_data();
			curPage.text(1);
		});
		
		$('#txt-fil-page').change(function(){
			e = $(this).val();
			s=0;
			if(frm==0){
				get_menu_list();	
			}else if(frm==1){
				get_news_list();
			}
			
			curPage.text(1);
			totalPage.text( Math.ceil(parseInt(totalRecord.text()) / e));
		});
		//next record
		$('#btn-next').click(function(){
			if( parseInt(curPage.text()) ==  parseInt(totalPage.text()) ){
				return;
			}
			s += parseFloat(e);
			if(frm==0){
				get_menu_list();	
			}else if(frm==1){
				get_news_list();
			}
			curPage.text( parseInt(curPage.text())+ 1  );
		});
		//back record
		$('#btn-back').click(function(){
			if(s==0){
				return;
			}			
			s -= parseFloat(e);
			if(frm==0){
				get_menu_list();	
			}else if(frm==1){
				get_news_list();
			}
			curPage.text( parseInt(curPage.text()) - 1  );
		});		
		//save data
		body.on('click','.btn-save',function(){
			var eThis=$(this);
			if(frm==0){
				save_menu(eThis);	
			}else if(frm==1){
				save_new(eThis);
			}else if(frm==2){
				save_ads(eThis);
			}else if(frm==3){
				save_user(eThis);
			}			
		});
		//save user
		function save_user(eThis){
			var id=$('#txt-id');
			var email=$('#txt-email');
			var pass=$('#txt-pass');
			var type=$('#txt-type');
			var status=$('#txt-status');
			if(email.val()==''){
				alert('Please input email.');
				email.focus();
				return;
			}else if(pass.val()==''){
				alert('Please input pass');
				pass.focus();
				return;
			}
			var frm=eThis.closest('form.upl');
			var form_data=new FormData(frm[0]);
			$.ajax({
				url:'action/save-user.php',
				type:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				dataType:'JSON',
				beforeSend:function(){
				
				},
				success:function(data){
					if(data.dpl==true){
						alert('Duplicate name.');
						return;
					}
					if(data.edit==true){
						tbl.find('tr:eq('+ind+') td:eq(1)').text(name.val());
						tbl.find('tr:eq('+ind+') td:eq(2)').text(od.val());
						tbl.find('tr:eq('+ind+') td:eq(3) img').attr('src',photo.val());
						tbl.find('tr:eq('+ind+') td:eq(4)').text(status.val());
						$('.popup').remove();
						return;
					}
					var img="<img src="+photo.val()+" width='50' height='50'>";
					var tr="<tr> <td>"+data.id+"</td>  <td>"+name.val()+"</td> <td>"+od.val()+"</td> <td>"+img+"</td> <td>1</td> <td>"+btnAction+"</td> </tr>";
					tbl.find('tr:eq(0)').after(tr);
					
					id.val(data.id+1);
					od.val(data.id+1);
					name.val('');
					name.focus();
					photo.val('');
					imgBox.css({'background-image':'url(img/default_bg.jpg)'});
					$('#txt-file').val('');
				},
				error:function(){
					
				}
			});
		}
		//save new
		function save_menu(eThis){
			var id=$('#txt-id');
			var name=$('#txt-name');
			var od=$('#txt-od');
			var status=$('#txt-status');
			var photo=$('#txt-photo');
			var imgBox=$('.img-box');
			if(name.val()==''){
				alert('Please input name.');
				name.focus();
				return;
			}else if(od.val()==''){
				alert('Please input od');
				od.focus();
				return;
			}
			var frm=eThis.closest('form.upl');
			var form_data=new FormData(frm[0]);
			$.ajax({
				url:'action/save-menu.php',
				type:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				dataType:'JSON',
				beforeSend:function(){
				
				},
				success:function(data){
					if(data.dpl==true){
						alert('Duplicate name.');
						return;
					}
					if(data.edit==true){
						tbl.find('tr:eq('+ind+') td:eq(1)').text(name.val());
						tbl.find('tr:eq('+ind+') td:eq(2)').text(od.val());
						tbl.find('tr:eq('+ind+') td:eq(3) img').attr('src',photo.val());
						tbl.find('tr:eq('+ind+') td:eq(4)').text(status.val());
						$('.popup').remove();
						return;
					}
					var img="<img src="+photo.val()+" width='50' height='50'>";
					var tr="<tr> <td>"+data.id+"</td>  <td>"+name.val()+"</td> <td>"+od.val()+"</td> <td>"+img+"</td> <td>1</td> <td>"+btnAction+"</td> </tr>";
					tbl.find('tr:eq(0)').after(tr);
					
					id.val(data.id+1);
					od.val(data.id+1);
					name.val('');
					name.focus();
					photo.val('');
					imgBox.css({'background-image':'url(img/default_bg.jpg)'});
					$('#txt-file').val('');
				},
				error:function(){
					
				}
			});
		}
		//save new
		function save_new(eThis){
			tinymce.triggerSave();
			var id = $('#txt-id');
			var title = $('#txt-title');
			var status = $('#txt-status');
			var detial = $('#txt-detial');
			if(title.val()==''){
				alert('Please input title.');
				title.focus();
				return;
			}
			var frm=eThis.closest('form.upl');
			var form_data=new FormData(frm[0]);
			$.ajax({
				url:'action/save-news.php',
				type:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				dataType:'JSON',
				beforeSend:function(){
				
				},
				success:function(data){
					if(data.dpl==true){
						alert('duplicate title.');
						title.focus();
						return;
					}
					if(data.edit==true){
						tbl.find('tr:eq('+ind+') td:eq(1)').text(title.val());
						tbl.find('tr:eq('+ind+') td:eq(2)').text(status.val());
						$('.popup').remove();						
						return;
					}
					var tr='<tr>'+
							'<td>'+data.id+'</td>'+
							'<td>'+title.val()+'</td>'+
							'<td>1</td>'+
							'<td>'+btnAction+'</td>'+
							'</tr>';
					tbl.find('tr:eq(0)').after(tr);
					title.val('');
					detial.val('');
					title.focus();
					id.val(data.id+1);
				}
			});
		}
		//save ads
		function save_ads(eThis){
			var id=$('#txt-id');
			var url=$('#txt-url');
			var location = $("#txt-location");
			var type = $("#txt-type");
			var status=$('#txt-status');
			var photo=$('#txt-photo');
			var imgBox=$('.img-box');
			if(url.val()==''){
				alert('Please input url.');
				url.focus();
				return;
			}
			var frm=eThis.closest('form.upl');
			var form_data=new FormData(frm[0]);
			$.ajax({
				url:'action/save-ads.php',
				type:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				dataType:'JSON',
				beforeSend:function(){
				
				},
				success:function(data){
					if(data.dpl==true){
						alert('Duplicate name.');
						return;
					}
					if(data.edit==true){
						tbl.find('tr:eq('+ind+') td:eq(1)').text(name.val());
						tbl.find('tr:eq('+ind+') td:eq(2)').text(od.val());
						tbl.find('tr:eq('+ind+') td:eq(3) img').attr('src',photo.val());
						tbl.find('tr:eq('+ind+') td:eq(4)').text(status.val());
						$('.popup').remove();
						return;
					}
					var img="<img src="+photo.val()+" width='50' height='50'>";
					var tr="<tr> <td>"+data.id+"</td>  <td>"+name.val()+"</td> <td>"+od.val()+"</td> <td>"+img+"</td> <td>1</td> <td>"+btnAction+"</td> </tr>";
					tbl.find('tr:eq(0)').after(tr);
					
					id.val(data.id+1);
					od.val(data.id+1);
					name.val('');
					name.focus();
					photo.val('');
					imgBox.css({'background-image':'url(img/default_bg.jpg)'});
					$('#txt-file').val('');
				},
				error:function(){
					
				}
			});
		}
		//upload image
		body.on('change','#txt-file',function(){
			var photo=$('#txt-photo');
			var imgBox=$('.img-box');
			
			var frm=$(this).closest('form.upl');
			var form_data=new FormData(frm[0]);
			$.ajax({
				url:'action/upl-img.php',
				type:'POST',
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				dataType:'JSON',
				success:function(data){
					if(data.send==false){
						alert(data.msg);
					}else{
						imgBox.css({'background-image':'url('+data.img_name+')'});
						photo.val(data.img_name);
					}					
				}				
			});	
		});
		//edit data
		body.on('click','.btn-edit',function(){
			var eThis=$(this);
			if(frm==0){
				get_edit_menu(eThis);
			}else if(frm==1){
				get_edit_new(eThis);
			}
		});	
		//get edit menu
		function get_edit_menu(eThis){
			body.append(pop);	
			$(".popup").load("form/"+frm_name[frm]+"", function(responseTxt, statusTxt, xhr){
				if(statusTxt == "success")
					var tr=eThis.parents('tr');
					ind=tr.index();
					var id2=tr.find('td:eq(0)').text();
					var name2=tr.find('td:eq(1)').text();
					var od2=tr.find('td:eq(2)').text();
				
					var img2=tr.find('td:eq(3) img').attr('src');
					var status2=tr.find('td:eq(4)').text();
					$('#txt-edit-id').val(id2);
					$('#txt-id').val(id2);
					$('#txt-name').val(name2);
					$('#txt-od').val(od2);
					$('#txt-status').val(status2);
					$('#txt-photo').val(img2);
					$('.img-box').css({'background-image':'url('+img2+')'});
				if(statusTxt == "error")
				  alert("Error: " + xhr.status + ": " + xhr.statusText);
			});
		}
		//get eidt new
		function get_edit_new(eThis){
			body.append(pop);	
			$(".popup").load("form/"+frm_name[frm]+"", function(responseTxt, statusTxt, xhr){
				if(statusTxt == "success")
					var tr=eThis.parents('tr');
					ind=tr.index();	
					var id=tr.find('td:eq(0)').text();
					$.ajax({
						url:'action/get-news-edit.php',
						type:'POST',
						data:{id:id},
						cache:false,
						dataType:'JSON',
						success:function(data){
							$('#txt-edit-id').val(id);
							$('#txt-id').val(id);
							$('#txt-title').val(data.title);
							$('#txt-detial').val(data.des);
							$('#txt-location').val(data.location);
							$('#txt-menu').val(data.menu);
							$('#txt-status').val(data.status);
							$('#txt-od').val(data.od);
							$('#txt-photo').val(data.img);
							$('.img-box').css({'background-image':'url('+data.img+')'});
							calleditor();
						}
					});			
				if(statusTxt == "error")
				  alert("Error: " + xhr.status + ": " + xhr.statusText);
			});
		}
		//get permission form
		function get_permission_form(){
			$("#frm-other").load("form/frm-permission.php", function(responseTxt, statusTxt, xhr){
				if(statusTxt == "success")
				  //alert('yes');
				if(statusTxt == "error")
				  alert("Error: " + xhr.status + ": " + xhr.statusText);
			});
		}
		//get auto id
		function get_auto_id(){
			$.ajax({
				url:'action/get-auto-id.php',
				type:'POST',
				data:{frm:frm},
				cache:false,
				dataType:'JSON',
				success:function(data){
					$('#txt-id').val(parseInt(data.id)+1);
					$('#txt-od').val(parseInt(data.id)+1);
				}
			});
		}
		//count record
		function count_data(){
			$.ajax({
				url:'action/count-data.php',
				type:'POST',
				data:{frm:frm},
				cache:false,
				dataType:'JSON',
				success:function(data){
					totalRecord.text(data.total);
					totalPage.text(Math.ceil(data.total/e))
				}
			});			
		}
		//get menu
		function get_user_list(){
			//var td='';
			var th='<tr> <th width="70">ID</th> <th align="left">Email</th> <th width="70">Type</th> <th width="50">IP</th> <th width="70">Status</th>  <th width="70">Action</th></tr>';
			tbl.find('tr').remove();
			tbl.append(th);
			$.ajax({
				url:'action/get-user-list.php',
				type:'POST',
				data:{e:e,s:s},
				cache:false,
				dataType:'JSON',
				success:function(data){
					for(i=0;i<data.length;i++){
					
					var td = "<tr> <td>"+data[i].id+"</td> <td>"+data[i].email+"</td> <td>"+data[i].type+" </td> <td>"+data[i].ip+"</td> <td>"+data[i].status+"</td> <td> "+btnAction+" </td> </tr>";
						tbl.append(td);
					}
					//alert(td);
					//tbl.html(th+td);
				}
			});			
		}
		//get menu
		function get_menu_list(){
			//var td='';
			var th='<tr> <th width="70">ID</th> <th align="left">Name</th> <th width="70">OD</th> <th width="50">Photo</th> <th width="70">Status</th>  <th width="70">Action</th></tr>';
			tbl.find('tr').remove();
			tbl.append(th);
			$.ajax({
				url:'action/get-menu-list.php',
				type:'POST',
				data:{e:e,s:s},
				cache:false,
				dataType:'JSON',
				success:function(data){
					for(i=0;i<data.length;i++){
					
						var imgBox="<img src='"+data[i].img+"' width=50 height=50>";
						var td = "<tr> <td>"+data[i].id+"</td> <td>"+data[i].name+"</td> <td>"+data[i].od+" </td> <td>"+imgBox+"</td> <td>"+data[i].status+"</td> <td> "+btnAction+" </td> </tr>";
						tbl.append(td);
					}
					//alert(td);
					//tbl.html(th+td);
				}
			});			
		}
		//get mews
		function get_news_list(){
			var th='<tr> <th width="50">ID</th> <th>Title</th> <th width="50">Status</th> <th width="50">Action</th> </tr>';
			tbl.find('tr').remove();
			tbl.append(th);
			$.ajax({
				url:'action/get-news-list.php',
				type:'POST',
				data:{e:e,s:s},
				cache:false,
				dataType:'JSON',
				success:function(data){
					for(i=0;i<data.length;i++){
					
						var td = "<tr> <td>"+data[i].id+"</td> <td>"+data[i].title+"</td> <td>"+data[i].status+"</td> <td> "+btnAction+" </td> </tr>";
						tbl.append(td);
					}
					//alert(td);
					//tbl.html(th+td);
				}
			});			
		}
		
		//get ads
		function get_ads_list(){
			//var td='';
			var th='<tr> <th width="70">ID</th> <th align="left">URL</th> <th width="70">Location</th> <th width="70">Type</th> <th width="50">Photo</th> <th width="70">Status</th>  <th width="70">Action</th></tr>';
			tbl.find('tr').remove();
			tbl.append(th);
			$.ajax({
				url:'action/get-ads-list.php',
				type:'POST',
				data:{e:e,s:s},
				cache:false,
				dataType:'JSON',
				success:function(data){
					for(i=0;i<data.length;i++){
					
						var imgBox="<img src='"+data[i].img+"' width=50 height=50>";
						var td = "<tr> <td>"+data[i].id+"</td> <td>"+data[i].url+"</td> <td>"+data[i].location+" </td> <td>"+data[i].type+" </td> <td>"+imgBox+"</td> <td>"+data[i].status+"</td> <td> "+btnAction+" </td> </tr>";
						tbl.append(td);
					}
					//alert(td);
					//tbl.html(th+td);
				}
			});			
		}
		
		function calleditor(){
			tinymce.remove();
			tinymce.init({selector:"textarea",theme: "modern",width: "760",height:"300",relative_urls: false, remove_script_host: false,
			file_browser_callback:function(field_name, url, type, win){
			var filebrowser = "js/filebrowser.php";
			filebrowser += (filebrowser.indexOf("?") < 0) ? "?type=" + type : "&type=" + type;
			tinymce.activeEditor.windowManager.open({
			title : "Insert Photo",
			width : 560,
			height : 500,
			url : filebrowser
			}, {
			window : win,
			input : field_name
			});
			return false;
			},
			plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table contextmenu directionality",
					"emoticons template paste textcolor colorpicker textpattern imagetools media code",	
			],
			menubar:true,toolbar1: "undo redo | insert | sizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
			toolbar2:"fontselect | fontsizeselect | forecolor media code",
			});
			}
		
	});
	
</script>
</html>