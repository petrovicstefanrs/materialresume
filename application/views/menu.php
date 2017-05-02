<body>
	<section class="header">
		<nav id="main_menu">
			<div class="logo">
				<span class="logotype"><a href="<?php echo base_url();?>home"><span class="logo_slim">Material</span> Résumé</a></span>
			</div>
			<div class="menu_links">
				<?php  
					if (isset($current_page)) {
						switch ($current_page) {

							case 'home':
								if ($this->session->userdata('loged_in')) {
									if ($this->session->userdata('user_role')=="admin") {
										?>
											<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
											<span><a href="<?php echo base_url();?>admin_panel">Admin Panel</a></span>
											<span><a href="<?php echo base_url();?>logout">Logout</a></span>
										<?php
									}
									if ($this->session->userdata('user_role')=="user") {
										?>
											<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
											<span><a href="<?php echo base_url();?>user_profile">My Profile</a></span>
											<?php 
												if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
													?>
													<span><a href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
													<span><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
													<?php											
												}
												else{
													?>
													<span><a href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
													<?php
												}
											?>
											<span><a href="<?php echo base_url();?>logout">Logout</a></span>
										<?php
									}
								}
								else{
									?>
										<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
										<span><a href="<?php echo base_url();?>login">Log In</a></span>
									<?php
								}
								break;

							case 'login':
								?>
									<span><a href="<?php echo base_url();?>home">Home</a></span>
									<span><a class="active" href="<?php echo base_url();?>login">Log In</a></span>
								<?php
								break;
							
							case 'user_profile':
								if ($this->session->userdata('user_role')=="user") {
									?>
										<span><a href="<?php echo base_url();?>home">Home</a></span>
										<span><a class="active" href="<?php echo base_url();?>user_profile">My Profile</a></span>
										<?php 
											if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
												?>
												<span><a href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
												<span><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
												<?php											
											}
											else{
												?>
												<span><a href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
												<?php
											}
										?>
										<span><a href="<?php echo base_url();?>logout">Logout</a></span>
									<?php
								}
								break;

							case 'admin_panel':
								if ($this->session->userdata('user_role')=="admin") {
									?>
										<span><a href="<?php echo base_url();?>home">Home</a></span>
										<span><a class="active" href="<?php echo base_url();?>admin_panel">Admin Panel</a></span>
										<span><a href="<?php echo base_url();?>logout">Logout</a></span>
									<?php
								}
								break;

							case 'editor':
								if ($this->session->userdata('user_role')=="user") {
									?>
										<span><a href="<?php echo base_url();?>home">Home</a></span>
										<span><a href="<?php echo base_url();?>user_profile">My Profile</a></span>
										<?php 
											if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
												?>
												<span><a class="active" href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
												<span><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
												<?php											
											}
											else{
												?>
												<span><a class="active" href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
												<?php
											}
										?>
										<span><a href="<?php echo base_url();?>logout">Logout</a></span>
									<?php
								}
								break;	

							case 'preview':
								if ($this->session->userdata('user_role')=="user") {
									?>
										<span><a href="<?php echo base_url();?>home">Home</a></span>
										<span><a href="<?php echo base_url();?>user_profile">My Profile</a></span>
										<?php 
											if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
												?>
												<span><a href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
												<span><a class='active' href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
												<?php											
											}
											else{
												?>
												<span><a class="active" href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
												<?php
											}
										?>
										<span><a href="<?php echo base_url();?>logout">Logout</a></span>
									<?php
								}
								break;

							default:
								if ($this->session->userdata('loged_in')) {
									if ($this->session->userdata('user_role')=="admin") {
										?>
											<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
											<span><a href="<?php echo base_url();?>admin_panel">Admin Panel</a></span>
											<span><a href="<?php echo base_url();?>logout">Logout</a></span>
										<?php
									}
									if ($this->session->userdata('user_role')=="user") {
										?>
											<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
											<span><a href="<?php echo base_url();?>user_profile">My Profile</a></span>
											<?php 
												if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
													?>
													<span><a href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
													<span><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
													<?php											
												}
												else{
													?>
													<span><a href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
													<?php
												}
											?>
											<span><a href="<?php echo base_url();?>logout">Logout</a></span>
										<?php
									}
								}
								else{
									?>
										<span><a class="active" href="<?php echo base_url();?>home">Home</a></span>
										<span><a href="<?php echo base_url();?>login">Log In</a></span>
									<?php
								}
								break;
						}
					}
					else{
						if ($this->session->userdata('loged_in')) {
							if ($this->session->userdata('user_role')=="admin") {
								?>
									<span><a href="<?php echo base_url();?>home">Home</a></span>
									<span><a href="<?php echo base_url();?>admin_panel">Admin Panel</a></span>
									<span><a href="<?php echo base_url();?>logout">Logout</a></span>
								<?php
							}
							if ($this->session->userdata('user_role')=="user") {
								?>
									<span><a href="<?php echo base_url();?>home">Home</a></span>
									<span><a href="<?php echo base_url();?>user_profile">My Profile</a></span>
									<?php 
										if ($this->session->userdata('has_resume') && $this->session->userdata('has_resume')==true) {
											?>
											<span><a href="<?php echo base_url();?>app/edit">Edit Résumé</a></span>
											<span><a href="<?php echo base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname');?>">MY Résumé</a></span>
											<?php											
										}
										else{
											?>
											<span><a href="<?php echo base_url();?>app/edit">Create Résumé</a></span>
											<?php
										}
									?>
									<span><a href="<?php echo base_url();?>logout">Logout</a></span>
								<?php
							}
						}
						else{
							?>
								<span><a href="<?php echo base_url();?>home">Home</a></span>
								<span><a href="<?php echo base_url();?>login">Log In</a></span>
							<?php
						}
					}
				?>
			</div>
		</nav>
	</section>
	