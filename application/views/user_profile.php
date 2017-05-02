	<section class="profile_section">
		<div class="profile_menu"></div>
		<div class="profile_container">
			<div class="profile_container_left">
				<?php 
					$attrbtn_change = array('name'=>'btn_change', 'value' => 'true', 'content'=>'Save Changes','type'=>'submit');

					$attributes = array('class' => 'changes_form');

			        
			        echo form_open_multipart('user_profile/changes', $attributes);

			        if ($profileimg!="") {
			        	?>

				        <div class="profile_img">
				        	<img src="<?php echo base_url().$profileimg?>">
				        </div>

				        <?php
			        }
			        else{
			        	?>

				        <div class="profile_img">
				        	<img src="<?php echo base_url()?>images/users/default.png">
				        </div>

				        <?php
			        }
			        
			        echo form_label('Edit Information');

			        echo "<div class='btn_upload'>";

			        echo "<span><p>Choose Profile Image</p></span>";

			        echo form_upload( array(
			          'name' => 'change_img'
			           ));
			        
					echo "</div>";

					echo form_label('Change Email:', 'change_email',array('class' => 'small_label'));
			        echo form_input( array(
			          'name' => 'change_email', 
			          'value' => set_value('change_email',$mail), 
			          'placeholder' => 'New Email' ));

		        	echo form_label('Change First Name:', 'change_first_name',array('class' => 'small_label'));
			        echo form_input( array(
			          'name' => 'change_first_name', 
			          'value' => set_value('change_first_name',$fname), 
			          'placeholder' => 'First Name' ));

					echo form_label('Change Last Name:', 'change_last_name',array('class' => 'small_label'));
			        echo form_input( array(
			          'name' => 'change_last_name', 
			          'value' => set_value('change_last_name',$lname), 
			          'placeholder' => 'Last Name' ));

			        echo form_button($attrbtn_change);
			        
				?>
				<?php 
			      	if (validation_errors()) {
			      		?>
			      			<div class="validation_msg">
						    	<?php echo validation_errors(); ?>
						    </div>
			      		<?php
			      	}

			      	if(isset($mailexists)){
			      		?>
			      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> The mail you specified is already taken!</div>
			      		<?php
			      	}

			      	if($this->session->flashdata('changesucess')){
			      		?>
			      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Info updated successfuly!</div>
			      		<?php
			      	}

			      	if(isset($upload_err)){
			      		?>
			      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><?php echo $upload_err?></div>
			      		<?php
			      	}

			      	if ($this->session->flashdata('changefail')) {
			      		?>
			      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> There was a problem changing your info. Please try again later!</div>
			      		<?php
			      	}
			      	echo form_close();
			    ?>
			</div>
			<div class="profile_container_right">
				<?php 
					if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
						?>
							<div class="btn_create" type="button"><a href="<?php echo base_url();?>app/edit"><img src="<?php echo base_url();?>images/edit_resume.png"></a></div>
							<span class="resume_icon_label"><p>Edit Résumé</p></span>
							<span class="resume_icon_separator"></span>
							<div class="btn_create" type="button"><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>"><img src="<?php echo base_url();?>images/open_resume.png"></a></div>
							<span class="resume_icon_label"><p>Open Résumé</p></span>
						<?php
					}
					else{
						?>
							<div class="btn_create" type="button"><a href="<?php echo base_url();?>app/edit"><img src="<?php echo base_url();?>images/add_resume.png"></a></div>
							<span class="resume_icon_label"><p>Create Résumé</p></span>
						<?php
					}
				?>
			</div>
		</div>
	</section>