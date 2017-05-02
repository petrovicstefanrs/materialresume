	<section class="editor_section">
		<div class="profile_menu"></div>
		<div class="editor_wrapper">
				
			<?php 
				/* ------------------------- SOME VARS -------------------------- */

				$monthOptions = array(
			        '0' => 'MONTH',
			        '1' => 'JAN',
			        '2' => 'FEB',
			        '3' => 'MAR',
			        '4' => 'APR',
			        '5' => 'MAY',
			        '6' => 'JUN',
			        '7' => 'JUL',
			        '8' => 'AUG',
			        '9' => 'SEP',
			        '10' => 'OCT',
			        '11' => 'NOV',
			        '12' => 'DEC',
				);

				$yearOptions[0] = "YEAR";

				for ($i=1950; $i <= date("Y"); $i++) { 
					$yearOptions[$i]=$i;
				}


				/* ------------------------ HEADER INFO -------------------------- */

				$attributes = array('class' => 'editor_form');
			    echo form_open('app/preview', $attributes);

				echo "<div class='editor_header'>";
					echo "<div class='editor_profile'>";
						if(!$profile_img){
							?>
								<img src="<?php echo base_url();?>images/users/default.png">
							<?php
						}
						else{
							echo "<img src='".base_url().$profile_img."'>";
						}
					echo "</div>";	
					
					echo "<div class='editor_fullname'>";
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
					echo "</div>";
				echo "</div>";	

				/* --------------------------------------------------------------- */

				
				/* ------------------------ CONTACT INFO ------------------------- */

				echo form_label('Contact Info:');

				echo "<div class='editor_block'>";

				echo form_label('General Title:', 'resume_info_title',array('class' => 'small_label'));
				
			        if(!$fetchInfo){

			        	echo form_input( array(
				          'name' => 'resume_info_title',
				          'placeholder' => 'Enter Your Proffesion (e.g. Web Developer)',
			              'required' => 'required' ));

				        echo form_label('About Me:', 'resume_info_about',array('class' => 'small_label'));
				        echo form_textarea(array(
				          'name' => 'resume_info_about',
				          'placeholder' => 'About Me',
				          'maxlength' => 500,
			              'required' => 'required'));

						echo form_label('Contact Phone:', 'resume_phone',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_phone',
				          'placeholder' => 'Contact Phone',
			              'required' => 'required' ));

						echo form_label('Email:', 'resume_email',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_email',  
				          'placeholder' => 'Your Email',
			              'required' => 'required' ));

				        echo form_label('Website:', 'resume_website',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_website',  
				          'placeholder' => 'Your Website',
			              'required' => 'required' ));
			        }
			        else{
			        	echo form_input( array(
				          'name' => 'resume_info_title',
				          'value' => $fetchInfo['title'],
				          'placeholder' => 'Enter Your Proffesion (e.g. Web Developer)',
			              'required' => 'required' ));

				        echo form_label('About Me:', 'resume_info_about',array('class' => 'small_label'));
				        echo form_textarea(array(
				          'name' => 'resume_info_about',
				          'placeholder' => 'About Me',
				          'value' => $fetchInfo['about'],
				          'maxlength' => 500,
			              'required' => 'required'));

						echo form_label('Contact Phone:', 'resume_phone',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_phone',
				          'value' => $fetchInfo['phone'],
				          'placeholder' => 'Contact Phone',
			              'required' => 'required' ));

						echo form_label('Email:', 'resume_email',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_email', 
				          'value' => $fetchInfo['mail'], 
				          'placeholder' => 'Your Email',
			              'required' => 'required' ));

				        echo form_label('Website:', 'resume_website',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_website',  
				          'value' => $fetchInfo['website'],
				          'placeholder' => 'Your Website',
			              'required' => 'required' ));
			        }

		        echo "</div>";

		        echo "<div class='editor_block_separator'>";
		        echo "</div>";
				/* --------------------------------------------------------------- */

		        /* -------------------------- JOBS INFO -------------------------- */

				echo form_label('Work Experience:');

				if (!$fetchJobs) {
					echo "<div class='editor_block job_block'>";
						//echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
						echo form_label('Company Name:', 'resume_job_name[]',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_job_name[]',
				          'placeholder' => 'Enter Company Name',
			              'required' => 'required' ));

				        echo "<div class='date_block'>";

							echo "<div class='date_subblock'>";
								echo form_label('Start Month:', 'resume_job_smonth[]',array('class' => 'small_label'));
								echo form_dropdown('resume_job_smonth[]', $monthOptions);
							echo "</div>";

							echo "<div class='date_subblock'>";
								echo form_label('Start Year:', 'resume_job_syear[]',array('class' => 'small_label'));
								echo form_dropdown('resume_job_syear[]', $yearOptions);
							echo "</div>";

						echo "</div>";

						echo "<div class='date_block'>";

							echo "<div class='date_subblock'>";
								echo form_label('End Month:', 'resume_job_emonth[]',array('class' => 'small_label'));
								echo form_dropdown('resume_job_emonth[]', $monthOptions);
							echo "</div>";

							echo "<div class='date_subblock'>";
								echo form_label('End Year:', 'resume_job_eyear[]',array('class' => 'small_label'));
								echo form_dropdown('resume_job_eyear[]', $yearOptions);
							echo "</div>";

						echo "</div>";

					echo "</div>";
				}
				else{
					foreach ($fetchJobs as $job) {
						echo "<div class='editor_block job_block'>";
							echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
							echo form_label('Company Name:', 'resume_job_name[]',array('class' => 'small_label'));
					        echo form_input( array(
					          'name' => 'resume_job_name[]',
					          'value' => $job['name'],
					          'placeholder' => 'Enter Company Name',
			                  'required' => 'required' ));

					        echo "<div class='date_block'>";

								echo "<div class='date_subblock'>";
									echo form_label('Start Month:', 'resume_job_smonth[]',array('class' => 'small_label'));
									echo form_dropdown('resume_job_smonth[]', $monthOptions, $job['smonth']);
								echo "</div>";

								echo "<div class='date_subblock'>";
									echo form_label('Start Year:', 'resume_job_syear[]',array('class' => 'small_label'));
									echo form_dropdown('resume_job_syear[]', $yearOptions, $job['syear']);
								echo "</div>";

							echo "</div>";

							echo "<div class='date_block'>";

								echo "<div class='date_subblock'>";
									echo form_label('End Month:', 'resume_job_emonth[]',array('class' => 'small_label'));
									echo form_dropdown('resume_job_emonth[]', $monthOptions, $job['emonth']);
								echo "</div>";

								echo "<div class='date_subblock'>";
									echo form_label('End Year:', 'resume_job_eyear[]',array('class' => 'small_label'));
									echo form_dropdown('resume_job_eyear[]', $yearOptions, $job['eyear']);
								echo "</div>";

							echo "</div>";

						echo "</div>";
					}
				}

				$job_btn_attribute = array('name'=>'btn_add_job', 'value' => 'true', 'content'=>'Add Job','type'=>'button', 'class' => 'btn_add_job');
				echo form_button($job_btn_attribute);
				/* --------------------------------------------------------------- */

				/* ------------------------ PROJECTS INFO ------------------------ */

				echo form_label('Personal Projects:');

				if (!$fetchProjects) {
					echo "<div class='editor_block project_block'>";
						//echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
						echo form_label('Project Name:', 'resume_project_name[]',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_project_name[]',
				          'placeholder' => 'PHP CodeIgniter Website',
			              'required' => 'required' ));

				        echo "<div class='date_block'>";

				        	echo "<div class='date_subblock'>";
								echo form_label('Start Month:', 'resume_project_smonth[]',array('class' => 'small_label'));
								echo form_dropdown('resume_project_smonth[]', $monthOptions);
							echo "</div>";
							echo "<div class='date_subblock'>";
								echo form_label('Start Year:', 'resume_project_syear[]',array('class' => 'small_label'));
								echo form_dropdown('resume_project_syear[]', $yearOptions);
							echo "</div>";

						echo "</div>";

						echo "<div class='date_block'>";

							echo "<div class='date_subblock'>";
								echo form_label('End Month:', 'resume_project_emonth[]',array('class' => 'small_label'));
								echo form_dropdown('resume_project_emonth[]', $monthOptions);
							echo "</div>";
							echo "<div class='date_subblock'>";	
								echo form_label('End Year:', 'resume_project_eyear[]',array('class' => 'small_label'));
								echo form_dropdown('resume_project_eyear[]', $yearOptions);
							echo "</div>";

						echo "</div>";

					echo "</div>";
				}
				else{
					foreach ($fetchProjects as $project) {
						echo "<div class='editor_block project_block'>";
							echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
							echo form_label('Project Name:', 'resume_project_name[]',array('class' => 'small_label'));
					        echo form_input( array(
					          'name' => 'resume_project_name[]',
					          'value' => $project['name'],
					          'placeholder' => 'PHP CodeIgniter Website',
			                  'required' => 'required' ));

					        echo "<div class='date_block'>";

					        	echo "<div class='date_subblock'>";
									echo form_label('Start Month:', 'resume_project_smonth[]',array('class' => 'small_label'));
									echo form_dropdown('resume_project_smonth[]', $monthOptions, $project['smonth']);
								echo "</div>";
								echo "<div class='date_subblock'>";
									echo form_label('Start Year:', 'resume_project_syear[]',array('class' => 'small_label'));
									echo form_dropdown('resume_project_syear[]', $yearOptions, $project['syear']);
								echo "</div>";

							echo "</div>";

							echo "<div class='date_block'>";

								echo "<div class='date_subblock'>";
									echo form_label('End Month:', 'resume_project_emonth[]',array('class' => 'small_label'));
									echo form_dropdown('resume_project_emonth[]', $monthOptions, $project['emonth']);
								echo "</div>";
								echo "<div class='date_subblock'>";	
									echo form_label('End Year:', 'resume_project_eyear[]',array('class' => 'small_label'));
									echo form_dropdown('resume_project_eyear[]', $yearOptions, $project['eyear']);
								echo "</div>";

							echo "</div>";

						echo "</div>";
					}
				}

				$project_btn_attribute = array('name'=>'btn_add_project', 'value' => 'true', 'content'=>'Add Project','type'=>'button', 'class' => 'btn_add_project');
				echo form_button($project_btn_attribute);
				/* --------------------------------------------------------------- */

				/* --------------------------- SKILL INFO ------------------------ */

				echo form_label('Skills:');

				

				if (!$fetchSkills) {
					echo "<div class='editor_block skill_block'>";
					//echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
					echo form_label('Skill:', 'resume_skill_name[]',array('class' => 'small_label'));
			        echo form_input( array(
			          'name' => 'resume_skill_name[]',
			          'placeholder' => 'Enter Skill (e.g. PHP) ...',
			          'required' => 'required' ));
			        echo "</div>";
				}
				else{
					foreach ($fetchSkills as $skill) {
						echo "<div class='editor_block skill_block'>";
						echo "<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>";
						echo form_label('Skill:', 'resume_skill_name[]',array('class' => 'small_label'));
				        echo form_input( array(
				          'name' => 'resume_skill_name[]',
				          'value' => $skill['title'],
				          'placeholder' => 'Enter Skill (e.g. PHP) ...',
			              'required' => 'required' ));
				        echo "</div>";
					}
				}

		        $skill_btn_attribute = array('name'=>'btn_add_skill', 'value' => 'true', 'content'=>'Add Skill','type'=>'button', 'class' => 'btn_add_skill');
				echo form_button($skill_btn_attribute);
				/* --------------------------------------------------------------- */

				/*------------------------ EDITOR FOOTER --------------------------*/

				echo "<div class='editor_footer'>";
					echo "<a href='".base_url()."app/resume/".$this->session->userdata('userid')."_".$this->session->userdata('fname')."_".$this->session->userdata('lname')."'>LINK TO YOUR PUBLIC RÉSUMÉ <i class='fa fa-external-link' aria-hidden='true'></i></a>";

					echo "<div class='footer_btn_block'>";
						$editor_btn_preview = array('name'=>'btn_preview', 'value' => 'true', 'content'=>'Preview','type'=>'submit', 'class' => 'btn_preview editor_footer_btn');
						echo form_button($editor_btn_preview);

						$editor_btn_save = array('name'=>'btn_save', 'value' => 'true', 'content'=>'Save','type'=>'button', 'class' => 'btn_save editor_footer_btn');
						echo form_button($editor_btn_save);
					echo "</div>";
				echo "</div>";

				echo form_close();
				/* --------------------------------------------------------------- */
			?>
		</div>
	</section>
