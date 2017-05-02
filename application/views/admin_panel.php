	<section class="profile_section_admin">
		<div class="profile_menu_admin"></div>
		<div class="profile_container_admin">
			<div class="profile_container_left_admin">
				<div class="left_menu">
					<?php 
						$left_menu_list = array(
							anchor('admin_panel/aboutme', '<i class="fa fa-address-card" aria-hidden="true"></i>&nbsp&nbspManage About Me Page', array('class'=>'left_menu_link','id'=>'about_link')),
							anchor('admin_panel/users', '<i class="fa fa-users" aria-hidden="true"></i>&nbsp&nbspManage Users', array('class'=>'left_menu_link','id'=>'users_link')),
							anchor('admin_panel/resumes', '<i class="fa fa-file-text" aria-hidden="true"></i>&nbsp&nbspManage Résumés', array('class'=>'left_menu_link','id'=>'resumes_link')),
							'<a class="left_menu_link" href="javascript:void(0)"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp&nbspMore Tools Coming Soon</a>'
							
							);
						$left_menu_attr = array(
							'class'=>'left_menu_list'
							);
						echo ul($left_menu_list,$left_menu_attr);
					?>
				</div>
			</div>
			