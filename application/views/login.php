	<section class="login_section">
		<div class="login_container">
			<?php

		        $attrbtn_log = array('name'=>'btn_login', 'value' => 'true', 'content'=>'Log In','type'=>'submit');
		        $attributes = array('class' => 'login_form');

		        echo form_open('login/auth', $attributes);
		        echo form_label('Log In');
		        echo form_input( array(
		          'name' => 'auth_mail_log', 
		          'value' => set_value('auth_mail_log'), 
		          'placeholder' => 'Email' ));
		        echo form_password( array(
		          'name' => 'auth_password_log', 
		          'value' => set_value('auth_password_log'), 
		          'placeholder' => 'Password' ));
		        echo form_button($attrbtn_log);
		        echo "<p class='message'>Not registered? <a href='".base_url()."register'>Create an account</a></br>Forgot password? <a href='".base_url()."pass_reset'>Click here!</a></p><";
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

		      	if(isset($login_error)){
		      		?>
		      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Wrong email or password! Please try again!</div>
		      		<?php
		      	}
		      	if ($this->session->flashdata('register_successful')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Thank you for registering! You can now log in.</br>An Email was sent to you confirming your registration.</div>
		      		<?php
		      	}
		    ?>
		</div>
	</section>