<div class="col-xl-12 col-lg-12 menu">
				<ul>
					<li>
						<a href="<?php echo BASE_URL; ?>" style="color: <?php echo $home_color; ?>">
							<i class="fas fa-home"></i>
						</a>
					</li>
					<?php
						$post_data=$db->select_data("name,id","tbl_menu","status=1","id DESC","0,100");
						if($post_data != '0'){
							foreach($post_data as $row){
								$menu_color="#fff";
								if($row[1]==$menuid){
									$menu_color="#000";
								}
								?>
									<li>
										<a href="<?php echo BASE_URL; ?><?php echo $row[1]; ?>" style="color: <?php echo $menu_color; ?>">
											<?php echo $row[0]; ?>
										</a>
									</li>	
								<?php
							}
						}
					?>
					</ul>
				</div>