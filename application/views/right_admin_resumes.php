			<script type="text/javascript">
				var admin_section = "resumes";
			</script>
			<div class="profile_container_right_admin">
				<div class="users_admin">
					<div class="users_container_admin">
						<?php 
							$attrbtn_users = array('name'=>'btn_update_users_info', 'value' => 'true', 'content'=>'Delete Résumé(s)', 'type'=>'submit', 'class'=>'btn_submit_users_admin');
							$attributes = array('class' => 'users_admin_form');

							echo form_open('admin_panel/delete_resumes', $attributes);;
							foreach ($users as $user) {
								$firstname=($user->firstname==""?"John":$user->firstname);
								$lastname=($user->lastname==""?"Doe":$user->lastname);
								$user_image=($user->user_image==""?base_url()."images/users/default_white.png":base_url().$user->user_image);
								$user_mail=($user->user_mail==""?"undefined@mail.com":$user->user_mail);

								?> 
									<div class="user_admin_block">
										<span><?php echo "<img src='".$user_image."'>"; ?></span>
										<span class="name_span"><?php echo $lastname." ".$firstname;?></span>
										<span class="mail_span"><?php echo anchor('app/resume/'.$user->id_user."_".$firstname."_".$lastname, 'Open users résumé &nbsp&nbsp<i class="fa fa-external-link" aria-hidden="true"></i>', 'class="admin_resume_link"');;?></span>
										<span><?php echo form_checkbox('userid[]', $user->id_user, false); ?></span>
									</div>
								<?php
								
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
