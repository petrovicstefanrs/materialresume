	<section class="passreset_section">
		<div class="passreset_container">
			<?php

		        $attrbtn_respas = array('name'=>'btn_resetpass', 'value' => 'true', 'content'=>'Reset Password','type'=>'submit','class'=>'btn_resetpass');
		        $attributes = array('class' => 'passreset_form');

		        echo form_open('reset/changepass', $attributes);
		        echo form_label('Reset Password');
		        echo form_password( array(
		          'name' => 'auth_pass_respas', 
		          'value' => set_value('auth_pass_respas'), 
		          'placeholder' => 'New Password',
		          'class' => 'auth_pass_respas' ));
		        echo form_password( array(
		          'name' => 'auth_pass_respas_re', 
		          'value' => set_value('auth_pass_respas_re'), 
		          'placeholder' => 'Repeat Password',
		          'class' => 'auth_pass_respas_re' ));
		        echo form_hidden('uid', $uid);
		        echo form_hidden('uid_url', $uid_url);
		        echo form_hidden('token', $token);
		        echo form_button($attrbtn_respas);
		        echo "<p class='message'>Insert and confirm your new password.</p><";
		        echo form_close();
		      ?>
		      <?php 
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
		      	if ($this->session->flashdata('email_err')) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> We couldn't send you the password reset email this time. Please try again later.</div>
		      		<?php
		      	}
		    ?>
		</div>
	</section>