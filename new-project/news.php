<?php
					$post_data=$db->select_data("*","tbl_news",$con,"id DESC","0,2");
						if($post_data != '0'){
							foreach($post_data as $row){
								?>
									<div class="col-xl-12 box">
										<div class="img-box">
											<img src="admin/<?php echo $row[4]; ?>">
										</div>
										<div class="txt-box">
											<a href="<?php echo BASE_URL; ?><?php echo $row[7];?>/<?php echo $row[8]; ?>"><?php echo $row[2]; ?></a>
											<p>										
											<span>
											<?php 
												$date= date("Y/m/d", strtotime($row[1]));
												$time = date("H:i:s", strtotime($row[1]));
												$db->get_post_date($time,$date)						
											?>
											</span>										
											<span> View </span>
											<span>										
											<?php echo $row[10] ?></span>
											<br><?php echo 		mb_substr(strip_tags(trim($row[3])),0,100,"utf-8"); ?>	
											</p>
											
										</div>
									</div>	
								<?php
							}
						}
					?>				