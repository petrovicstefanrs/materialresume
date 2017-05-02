/* Admin section var initilize */
	var admin_section=false;
/* Admin section var initilize END */


$(document).ready(function () {

	/* Form validation for password reset form */

	$('.btn_resetpass').on('click',function (e) {
		e.preventDefault();
		var greske="";
		if ($('.auth_pass_respas').val().length < 8) {
			greske+="<p> Password field must be at least 8 characters long.</p>";
		}
		if ($('.auth_pass_respas_re').val()!=$('.auth_pass_respas').val()){
			greske+="<p>Passwords do not match. Please enter the same Password in both fields.</p>";
		}

		if (greske.length>0) {
			if($('.validation_msg').length!=0){
				$('.validation_msg').html("<div class='validation_msg'>"+greske+"</div>");
			}
			else{
				$('.passreset_form').after("<div class='validation_msg'>"+greske+"</div>");
			}
		}
		else{
			$('.passreset_form').submit();
		}
	});

	/* Password reset validation END */

	/* Disable erasing the first of evry edit block */
	$(document).find('.job_block').first().find('.erase_block').remove();
	$(document).find('.project_block').first().find('.erase_block').remove();
	$(document).find('.skill_block').first().find('.erase_block').remove();

	/* Disable erasing the first of evry edit block END*/

	/* Add new editor sections */

	$(document).on('click','.btn_add_job', function () {	// NEW JOB SECTION
		var $newJob = $('.job_block').clone();
		$newJob.find('input').val(null);
		$newJob.find('option:selected').removeAttr('selected');
		$newJob.find('option:first').attr('selected','selected');
		$newJob.find('option').trigger('change');
		$newJob.prepend("<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>");
		$('.btn_add_job').before($newJob[0]);
	});

	$(document).on('click','.btn_add_project', function () {	// NEW PROJECT SECTION
		var $newJob = $('.project_block').clone();
		$newJob.find('input').val(null);
		$newJob.find('option:selected').removeAttr('selected');
		$newJob.find('option:first').attr('selected','selected');
		$newJob.find('option').trigger('change');
		$newJob.prepend("<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>");
		$('.btn_add_project').before($newJob[0]);
	});

	$(document).on('click','.btn_add_skill', function () {	// NEW SKILL SECTION
		var $newJob = $('.skill_block').clone();
		$newJob.find('input').val(null);
		$newJob.prepend("<div class='erase_block'><i class='fa fa-trash' aria-hidden='true'></i></div>");
		$('.btn_add_skill').before($newJob[0]);
	});

	/* New editor sections END */

	/* Erase Editor Sections */
	$(document).on('click','.erase_block',function () {
		$(this).parent().remove();
	})

	/* Erase Editor Sections END*/

	/* SAVE RESUME AJAX*/

	$(document).on('click','.btn_save',function () {

		$(this).html("<i class='fa fa-cog fa-spin fa-fw'></i> Saving...");
		// INFO VARS //////////////////////////////////////////////////

		var infoTitle = $("input[name='resume_info_title']").val();
		var infoAbout = $("textarea[name='resume_info_about']").val();
		var infoPhone = $("input[name='resume_phone']").val();
		var infoEmail = $("input[name='resume_email']").val();
		var infoWebsite = $("input[name='resume_website']").val();

		// JOB VARS ///////////////////////////////////////////////////

		var resumeJobNames =[];	
		
		$("input[name='resume_job_name[]']").each(function() {
		    resumeJobNames.push($(this).val());
		});

		var resumeJobSMonths =[];
		
		$("select[name='resume_job_smonth[]']").each(function() {
		    resumeJobSMonths.push($(this).val());
		});

		var resumeJobSYears =[];
		
		$("select[name='resume_job_syear[]']").each(function() {
		    resumeJobSYears.push($(this).val());
		});

		var resumeJobEMonths =[];
		
		$("select[name='resume_job_emonth[]']").each(function() {
		    resumeJobEMonths.push($(this).val());
		});

		var resumeJobEYears =[];
		
		$("select[name='resume_job_eyear[]']").each(function() {
		    resumeJobEYears.push($(this).val());
		});

		// PROJECT VARS ////////////////////////////////////////////////

		var resumeProjectNames =[];	
		
		$("input[name='resume_project_name[]']").each(function() {
		    resumeProjectNames.push($(this).val());
		});

		var resumeProjectSMonths =[];
		
		$("select[name='resume_project_smonth[]']").each(function() {
		    resumeProjectSMonths.push($(this).val());
		});

		var resumeProjectSYears =[];
		
		$("select[name='resume_project_syear[]']").each(function() {
		    resumeProjectSYears.push($(this).val());
		});

		var resumeProjectEMonths =[];
		
		$("select[name='resume_project_emonth[]']").each(function() {
		    resumeProjectEMonths.push($(this).val());
		});

		var resumeProjectEYears =[];
		
		$("select[name='resume_project_eyear[]']").each(function() {
		    resumeProjectEYears.push($(this).val());
		});

		// SKILL VARS /////////////////////////////////////////////////////

		var resumeSkillNames =[];

		$("input[name='resume_skill_name[]']").each(function() {
			resumeSkillNames.push($(this).val());
		});

		$.ajax({
			type: 'POST',
	        url: base_url+'app/saveResume',
	        data: {
	        	resume_info_title : infoTitle,
	        	resume_info_about : infoAbout,
	        	resume_phone : infoPhone,
	        	resume_email : infoEmail,
	        	resume_website : infoWebsite,
	        	
	        	resume_job_name : resumeJobNames,
	        	resume_job_smonth : resumeJobSMonths,
	        	resume_job_syear : resumeJobSYears,
	        	resume_job_emonth : resumeJobEMonths,
	        	resume_job_eyear : resumeJobEYears,

	        	resume_project_name : resumeProjectNames,
	        	resume_project_smonth : resumeProjectSMonths,
	        	resume_project_syear : resumeProjectSYears,
	        	resume_project_emonth : resumeProjectEMonths,
	        	resume_project_eyear : resumeProjectEYears,

	        	resume_skill_name : resumeSkillNames
	        },
	        dataType: 'text',
	        success: function (resp){
	        	if (resp=='success') {
	        		setTimeout(function () {
	        			$('.btn_save').html("<i class='fa fa-check' aria-hidden='true'></i> Saved!");
	        			setTimeout(function () { 
		        			$('.btn_save').html("Save"); 
		        		}, 1500);
	        		}, 1500);
	        	}
	        	else {
	        		alert(resp);
	        	}
		    }
		});
	});

	/* SAVE RESUME AJAX END*/

	/* SELECT ADMIN SECTIONS IN MENU */
	if (admin_section) {
		switch(admin_section){
			case "about":
				$(document).find('#about_link').css({"background":"#b71c1c","color":"white"});
				break;

			case "users":
				$(document).find('#users_link').css({"background":"#b71c1c","color":"white"});
				break;

			case "resumes":
				$(document).find('#resumes_link').css({"background":"#b71c1c","color":"white"});
				break;
		}
	}

	/* SELECT ADMIN SECTIONS IN MENU END*/

	/* DISABLE DELETE USERS AND DELETE RESUMES BUTTONS */
	checkChecked();
	
	function checkChecked() {
		var checkedNum = 0;
		$(document).find('input[name="userid[]"]').each(function () {
			if ($(this).is(':checked')) {
				checkedNum++;
			}
		});
		if (checkedNum==0) {
			$(document).find('.btn_submit_users_admin').prop('disabled', true);
			$(document).find('.btn_submit_users_admin').css({"cursor":"not-allowed"});
		}
		else{
			$(document).find('.btn_submit_users_admin').prop('disabled', false);
			$(document).find('.btn_submit_users_admin').css({"cursor":"pointer"});
		}
	}

	$(document).on('click','input[name="userid[]"]',function () {
		checkChecked();
	})

	
	/* DISABLE DELETE USERS AND DELETE RESUMES BUTTONS END*/
})