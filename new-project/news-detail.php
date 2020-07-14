<?php
$newid=$_GET['new'];
$post_data=$db->get_cur_data("*","tbl_news","title_link='".$newid."'");	
$db->upd_data("tbl_news","view=view+1","id=".$newid."");	
?>
	<div class="col-xl-12">
		<h1><?php echo $post_data[2]; ?></h1>
		
		<div class="fb-share-button" data-href="<?php echo $f_url; ?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
		
		<?php echo $post_data[3]; ?>
	</div>
	<div class="col-xl-12">
		<div class="fb-comments" data-href="<?php echo BASE_URL; ?>?menuid=<?php echo $menuid; ?>&new=<?php echo $newid; ?>" data-width="" data-numposts="5"></div>
	</div>
<?php
?>