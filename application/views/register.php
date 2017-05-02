	<section class="register_section">
		<div class="register_container">
			<?php

		        $attrbtn_reg = array('name'=>'btn_register', 'value' => 'true', 'content'=>'Create Account','type'=>'submit');
		        $attributes = array('class' => 'register_form');

		        echo form_open('register/auth', $attributes);
		        echo form_label('Create Account');
		        echo form_input( array(
		          'name' => 'auth_mail_reg', 
		          'value' => set_value('auth_mail_reg'), 
		          'placeholder' => 'Email' ));
		        echo form_password( array(
		          'name' => 'auth_password_reg', 
		          'value' => set_value('auth_password_reg'), 
		          'placeholder' => 'Password' ));
		        echo form_password( array(
		          'name' => 'auth_password_reg_re', 
		          'placeholder' => 'Repeat Password' ));
		        echo form_button($attrbtn_reg);
		        echo "<p class='message'>Already have an account? <a href='".base_url()."login'>Log In.</a></p>";
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
		      	if(isset($register_error)){
		      		?>
		      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> There was an error conecting to the database. Please try again later!</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('register_exists')) {
		      		?>
		      			<div class="validation_msg"><p><i class="fa fa-thumbs-up" aria-hidden="true"></i> Account with that email exists already! <a href="<?php echo base_url();?>pass_reset">Click here</a> if you forgot your password.</p></div>
		      		<?php
		      	}
		      ?>
		</div>
	</section>