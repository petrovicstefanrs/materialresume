			<script type="text/javascript">
				var admin_section = "users";
			</script>
			<div class="profile_container_right_admin">
				<div class="users_admin">
					<div class="users_container_admin">
						<?php 
							$attrbtn_users = array('name'=>'btn_update_users_info', 'value' => 'true', 'content'=>'Delete User(s)', 'type'=>'submit', 'class'=>'btn_submit_users_admin');
							$attributes = array('class' => 'users_admin_form');

							echo form_open('admin_panel/delete_users', $attributes);;
							foreach ($users as $user) {
								$firstname=($user->firstname==""?"John":$user->firstname);
								$lastname=($user->lastname==""?"Doe":$user->lastname);
								$user_image=($user->user_image==""?base_url()."images/users/default_white.png":base_url().$user->user_image);
								$user_mail=($user->user_mail==""?"undefined@mail.com":$user->user_mail);

								if ($user->role_name=="admin") {
									$disabledcheckbox = array( 
										'name' => 'userid[]', 
									    'value' => "admin", 
									    'checked' => false,                                                    
									    'disabled' => 'disabled');
									?>
										<div class="user_admin_block admin_user">
											<span><?php echo "<img src='".$user_image."'>"; ?></span>
											<span class="name_span"><?php echo $lastname." ".$firstname;?></span>
											<span class="mail_span"><?php echo $user_mail;?></span>
											<span><?php echo form_checkbox($disabledcheckbox); ?></span>
										</div>
									<?php
								}
								else{
									?> 
										<div class="user_admin_block">
											<span><?php echo "<img src='".$user_image."'>"; ?></span>
											<span class="name_span"><?php echo $lastname." ".$firstname;?></span>
											<span class="mail_span"><?php echo $user_mail;?></span>
											<span><?php echo form_checkbox('userid[]', $user->id_user, false); ?></span>
										</div>
									<?php
								}
							}

							echo form_button($attrbtn_users);
					
				      		echo form_close();
						?>
					</div>
				</div>
				<div class="pagination_admin">
					<div class="userspag_container_admin">
						<?php 
							echo $pag;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
