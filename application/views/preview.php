	<section class="preview_section">
		<div class="preview_menu">
			<?php 
				echo "<a href='".base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname')."'>LINK TO YOUR PUBLIC RÉSUMÉ <i class='fa fa-external-link' aria-hidden='true'></i></a>";

				echo "<div class='preview_btn_block'>";
					echo "<a href='".base_url()."app/edit/"."'><i class='fa fa-arrow-left' aria-hidden='true'></i> BACK TO EDIT</a>";
				echo "</div>";
			?>
		</div>
		<div class="preview_header"></div>
		<div class="preview_wrapper">
			
			<div class="resume_header">
				<?php 
					if(!$profile_img){
						?>
							<div class="resume_image">
								<img src="<?php echo base_url();?>images/users/default.png">
							</div>
						<?php
					}
					else{
						echo "<div class='resume_image'><img src='".base_url().$profile_img."'></div>";
					}
				?>
				<div class="resume_header_info">
					<div class="resume_header_info_name">
						<div>
						<?php 
							if (!$profile_fname) {
								?>
									<span> John </span>
								<?php
							}
							else{
								echo "<span> ".$profile_fname." </span>";
							}

							if (!$profile_lname) {
								?>
									<span> Doe </span>
								<?php
							}
							else{
								echo "<span> ".$profile_lname." </span>";
							}
						?>
						</div>
						<div>
							<?php 
								if(!$fetchInfo['title']){
									echo "<span>Proffesion Not Defined</span>";
								}
								else{
									?>
										<span><?php echo $fetchInfo['title']; ?></span>
									<?php
								}
							?>
						</div>
					</div>

					<div class="resume_header_info_contact">
						<?php 
							if(!$fetchInfo['phone']){
								echo "<span><i class='fa fa-phone-square' aria-hidden='true'></i>\tPhone Not Provided</span>";
							}
							else{
								?>
									<span><i class="fa fa-phone-square" aria-hidden="true"></i><?php echo "\t".$fetchInfo['phone']; ?></span>
								<?php
							}

							if(!$fetchInfo['mail']){
								echo "<span><i class='fa fa-envelope' aria-hidden='true'></i>\tMail Not Provided</span>";
							}
							else{
								?>
									<span><i class="fa fa-envelope" aria-hidden="true"></i><?php echo "\t".$fetchInfo['mail']; ?></span>
								<?php
							}

							if(!$fetchInfo['website']){
								echo "<span><i class='fa fa-external-link-square' aria-hidden='true'></i>\tWebsite Not Provided</span>";
							}
							else{
								?>
									<span><i class="fa fa-external-link-square" aria-hidden="true"></i><?php echo "\t".$fetchInfo['website']; ?></span>
								<?php
							}
						?>
					</div>
				</div>
			</div>

			<div class="resume_block_label"><span> Summary: </span></div>
			<div class="resume_about resume_block">
				<?php 
					if(!$fetchInfo['about']){
						echo "<span> No Description Is Defined </span>";
					}
					else{
						?>
							<span><?php echo $fetchInfo['about']; ?></span>
						<?php
					}
				?>
			</div>

			<div class="resume_block_label"><span> Work Experience: </span></div>
			<?php 
				if(!$fetchJobs){
					?>
						<div class="resume_work resume_block">
							<span> No Work Experience Defined </span>
						</div>
					<?php
				}
				else{
					foreach ($fetchJobs as $job) {
						?>
							<div class="resume_work resume_block">
								<span><?php echo $job['smonth'].".".$job['syear']."  -  ".$job['emonth'].".".$job['eyear']; ?></span>
								<span><?php echo $job['name']; ?></span>
							</div>
						<?php
					}
				}
			?>

			<div class="resume_block_label"><span> Personal Projects: </span></div>
			<?php 
				if(!$fetchProjects){
					?>
						<div class="resume_projects resume_block">
							<span> No Previous Projects Defined </span>
						</div>
					<?php
				}
				else{
					foreach ($fetchProjects as $project) {
						?>
							<div class="resume_projects resume_block">
								<span><?php echo $project['smonth'].".".$project['syear']."  -  ".$project['emonth'].".".$project['eyear']; ?></span>
								<span><?php echo $project['name']; ?></span>
							</div>
						<?php
					}
				}
			?>

			<div class="resume_block_label"><span> Skills: </span></div>
			<div class="resume_skills resume_block">
				<?php 
					if (!$fetchSkills) {
						?>
							<span>No Skills Defined</span>
						<?php
					}
					else{
						foreach ($fetchSkills as $skill) {
							?>
								<span><?php echo $skill['title']; ?></span>
							<?php
						}
					}
				?>
			</div>
		</div>
	</section>