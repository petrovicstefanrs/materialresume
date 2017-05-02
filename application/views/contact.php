	<section class="contact_section">
		<div class="contact_container">
			<?php

		        $attrbtn_con = array('name'=>'btn_contact', 'value' => 'true', 'content'=>'Send Message','type'=>'submit');
		        $attributes = array('class' => 'contact_form');

		        echo form_open('contact/send', $attributes);
		        echo form_label('Contact US');
		        echo form_input( array(
					'name' => 'contact_name', 
					'value' => set_value('contact_name'), 
					'placeholder' => 'Name', 
					'class' => 'con_name'));
		        echo form_input( array(
					'name' => 'contact_lastname', 
					'value' => set_value('contact_lastname'), 
					'placeholder' => 'Last Name', 
					'class' => 'con_lastname'));
		        echo form_input( array(
					'name' => 'contact_mail', 
					'value' => set_value('contact_mail'), 
					'placeholder' => 'Email', 
					'class' => 'con_mail'));
		        echo form_textarea(array(
		        	'name' => 'contact_message',
		        	'value'=> set_value('contact_message'),
		        	'placeholder' => 'Type your message here!',
		        	'maxlength' => '400'));
		        echo form_button($attrbtn_con);
		        echo "<p class='message'>We will contact you upon reciving the email. Please note that it can take up to several days before we get back to you.</p>";
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

		      	if(isset($contact_error)){
		      		?>
		      			<div class="validation_msg"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Something went wrong! Please try again later!</div>
		      		<?php
		      	}
		      	if (isset($contact_sent)) {
		      		?>
		      			<div class="validation_msg"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Your message was sent! We will contact you shortly.</div>
		      		<?php
		      	}
		    ?>
		</div>
	</section>