	<section class="passreset_section">
		<div class="passreset_container">
			<?php

		        $attrbtn_res = array('name'=>'btn_reset', 'value' => 'true', 'content'=>'Reset Password','type'=>'submit');
		        $attributes = array('class' => 'passreset_form');

		        echo form_open('pass_reset/reset', $attributes);
		        echo form_label('Reset Password');
		        echo form_input( array(
		          'name' => 'auth_mail_res', 
		          'value' => set_value('auth_mail_res'), 
		          'placeholder' => 'Email' ));
		        echo form_button($attrbtn_res);
		        echo "<p class='message'>Insert the email you used to create your account in the field above.</p><";
		        echo form_close();
		      ?>
		      <?php 
		      	if (validation_errors()) {
		      		?>
		      			<div class="validation_msg">
					    	<?php echo validation_errors(); ?>
					    </div>
		      		<?php
		      	}
		      	if(isset($reset_error)){
		      		?>
		      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> There is no account with that email.</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('passreset_successful')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> We sent you an email containing further steps you need to make in order to reset your password. It should arive shortly!</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('reset_successful')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Your password was reset successfuly!</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('db_err')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> There was a problem with our database. Please request the reset again!</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('email_err')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> We couldn't send you the password reset email this time. Please try again later.</div>
		      		<?php
		      	}
		    ?>
		</div>
	</section>