			<script type="text/javascript">
				var admin_section = "about";
			</script>
			<div class="profile_container_right_admin">
				<div class="admin_aboutme">
					<div class="aboutme_container_admin">
						<div class="aboutme_heading_admin">
							<img src="<?php echo base_url().$about_img;?>">
							<span class="big_name_admin">
								<?php echo $about_name; ?>
							</span>
						</div>
						<div class="aboutme_desc_admin">
							<span class="desc_admin">
								<?php echo $about_desc; ?>
							</span>
						</div>
						<div class="aboutme_info_admin">
							<span class="info_admin">
								<?php 
									echo $about_studid;
									echo "</br>";
									echo $about_email;
								?>
							</span>
						</div>
					</div>
				</div>	

				<div class="admin_aboutme_form">
					<?php 

						$attrbtn_about = array('name'=>'btn_update_about_info', 'value' => 'true', 'content'=>'Save Changes', 'type'=>'submit', 'class'=>'btn_submit_about_admin');
						$attributes = array('class' => 'about_admin_form');

				        
				        echo form_open_multipart('admin_panel/aboutmeUpdate', $attributes);
				        echo form_label('Edit About Me Information');

				        
				        echo "<div class='btn_update_about'>";
				        echo "<span><p>Choose About Me Image</p></span>";
				        echo form_upload( array(
				          'name' => 'update_about_img'
				           ));
						echo "</div>";

						echo "<div class='first_row_about'>";
							echo "<div>";
								echo form_label('Change Name:', 'update_about_name',array('class' => 'small_label'));
						        echo form_input( array(
						          'name' => 'update_about_name',
						          'placeholder' => 'First & Last Name' ));
							echo "</div>";
					    
							echo "<div>";
								echo form_label('Change Student ID:', 'update_about_studid',array('class' => 'small_label'));
						        echo form_input( array(
						          'name' => 'update_about_studid', 
						          'placeholder' => 'New Student ID' ));
							echo "</div>";

							echo "<div>";
						        echo form_label('Change Student Email:', 'update_about_email',array('class' => 'small_label'));
						        echo form_input( array(
						          'name' => 'update_about_email', 
						          'placeholder' => 'New Student Email' ));
					        echo "</div>";
				        echo "</div>";
				        echo form_label('Change About Me:', 'update_about_about',array('class' => 'small_label'));
				        echo form_textarea(array(
				          'name' => 'update_about_about',
				          'placeholder' => 'About Me',
				          'maxlength' => 800
			              ));

			        	echo form_button($attrbtn_about);
					
				      	echo form_close();
					?>
				</div>
			</div>
		</div>
	</section>