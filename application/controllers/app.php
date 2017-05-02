<?php 
	/**
	* 
	*/
	class App extends CI_Controller
	{
		public $data = array();
		private $user_id=null;
		function __construct()
		{
			parent::__construct();
			$this->load->model('resume_model');
			$this->load->model('users_model');
			$this->user_id=$this->session->userdata('userid');
		}

		public function index()
		{
			if ($this->session->userdata('loged_in')) {
				redirect('app/edit','refresh');
			}
			else{
				redirect('home','refresh');
			}
		}

		public function edit()
		{

			if (!$this->session->userdata('loged_in')) {
				redirect('register','refresh');
			}
			else{
				$fetchInfo = $this->resume_model->getInfo($this->user_id);
				$fetchJobs = $this->resume_model->getJobs($this->user_id);
				$fetchProjects = $this->resume_model->getProjects($this->user_id);
				$fetchSkills = $this->resume_model->getSkills($this->user_id);
				
				$data=$this->getAllData($fetchInfo,$fetchJobs,$fetchProjects,$fetchSkills,'editor',$this->user_id);

				$this->load->view('meta');
				$this->load->view('menu', $data);
				$this->load->view('editor', $data);
			}
						
		}

		public function saveResume()
		{
			if (!$this->session->userdata('loged_in')) {
				redirect('home','refresh');
			}
			else{
				$info_general_title = $this->input->post('resume_info_title');		// GENERAL INFO
				$info_about = $this->input->post('resume_info_about');
				$info_phone = $this->input->post('resume_phone');
				$info_email = $this->input->post('resume_email');
				$info_website = $this->input->post('resume_website');				// GENERAL INFO

				$job_names = $this->input->post('resume_job_name');					// JOB INFORMATION
				$job_smonths = $this->input->post('resume_job_smonth');
				$job_syears = $this->input->post('resume_job_syear');
				$job_emonths = $this->input->post('resume_job_emonth');
				$job_eyears = $this->input->post('resume_job_eyear');				// JOB INFORMATION

				$project_names = $this->input->post('resume_project_name');			// PROJECT INFORMATION
				$project_smonths = $this->input->post('resume_project_smonth');
				$project_syears = $this->input->post('resume_project_syear');
				$project_emonths = $this->input->post('resume_project_emonth');
				$project_eyears = $this->input->post('resume_project_eyear');		// PROJECT INFORMATION

				$skill_names = $this->input->post('resume_skill_name');				// SKILL INFORMATION		
				
				$this->resume_model->deleteInfo($this->user_id);					// DELETE OLD VALUES
				$this->resume_model->deleteJobs($this->user_id);
				$this->resume_model->deleteProjects($this->user_id);
				$this->resume_model->deleteSkills($this->user_id);					// DELETE OLD VALUES

				$this->resume_model->setInfo($this->user_id,$info_general_title,$info_about,$info_phone,$info_email,$info_website);		// INPUT NEW GENERAL INFO

				for ($i=0; $i < count($job_names); $i++) { 			
					$this->resume_model->setJobs($this->user_id,$job_names[$i],$job_smonths[$i],$job_syears[$i],$job_emonths[$i],$job_eyears[$i]);		// INPUT NEW JOBS
				}

				for ($i=0; $i < count($project_names); $i++) { 		
					$this->resume_model->setProjects($this->user_id,$project_names[$i],$project_smonths[$i],$project_syears[$i],$project_emonths[$i],$project_eyears[$i]);		// INPUT NEW PROJECTS
				}

				for ($i=0; $i < count($skill_names); $i++) { 
					$this->resume_model->setSkills($this->user_id,$skill_names[$i]);
				}

				$this->output->set_content_type('text');
				$this->output->set_output("success");
			}
		}

		public function preview()
		{
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
			if ($is_post) {	// IF yes contiunue validation
				$btn_preview = $this->input->post('btn_preview');
				if ($btn_preview!="") {	// If submit button has a value CONTINUE

					$info_general_title = $this->input->post('resume_info_title');		// GENERAL INFO
					$info_about = $this->input->post('resume_info_about');
					$info_phone = $this->input->post('resume_phone');
					$info_email = $this->input->post('resume_email');
					$info_website = $this->input->post('resume_website');				// GENERAL INFO

					$job_names = $this->input->post('resume_job_name');					// JOB INFORMATION
					$job_smonths = $this->input->post('resume_job_smonth');
					$job_syears = $this->input->post('resume_job_syear');
					$job_emonths = $this->input->post('resume_job_emonth');
					$job_eyears = $this->input->post('resume_job_eyear');				// JOB INFORMATION

					$project_names = $this->input->post('resume_project_name');			// PROJECT INFORMATION
					$project_smonths = $this->input->post('resume_project_smonth');
					$project_syears = $this->input->post('resume_project_syear');
					$project_emonths = $this->input->post('resume_project_emonth');
					$project_eyears = $this->input->post('resume_project_eyear');		// PROJECT INFORMATION

					$skill_names = $this->input->post('resume_skill_name');				// SKILL INFORMATION		
					
					$this->resume_model->deleteInfo($this->user_id);					// DELETE OLD VALUES
					$this->resume_model->deleteJobs($this->user_id);
					$this->resume_model->deleteProjects($this->user_id);
					$this->resume_model->deleteSkills($this->user_id);					// DELETE OLD VALUES

					$this->resume_model->setInfo($this->user_id,$info_general_title,$info_about,$info_phone,$info_email,$info_website);		// INPUT NEW GENERAL INFO

					for ($i=0; $i < count($job_names); $i++) { 			
						$this->resume_model->setJobs($this->user_id,$job_names[$i],$job_smonths[$i],$job_syears[$i],$job_emonths[$i],$job_eyears[$i]);		// INPUT NEW JOBS
					}

					for ($i=0; $i < count($project_names); $i++) { 		
						$this->resume_model->setProjects($this->user_id,$project_names[$i],$project_smonths[$i],$project_syears[$i],$project_emonths[$i],$project_eyears[$i]);		// INPUT NEW PROJECTS
					}

					for ($i=0; $i < count($skill_names); $i++) { 
						$this->resume_model->setSkills($this->user_id,$skill_names[$i]);
					}

					// PREVIEW ALL THE NEW VALUES 

					$fetchInfo = $this->resume_model->getInfo($this->user_id);
					$fetchJobs = $this->resume_model->getJobs($this->user_id);
					$fetchProjects = $this->resume_model->getProjects($this->user_id);
					$fetchSkills = $this->resume_model->getSkills($this->user_id);

					$data=$this->getAllData($fetchInfo,$fetchJobs,$fetchProjects,$fetchSkills,'editor',$this->user_id);

					$this->load->view('meta');
					//$this->load->view('menu', $data);
					$this->load->view('preview', $data);

				}
				else{
					echo "Ooooops! Well this is embarrassing! :D";
				}
			}
			else{
				redirect('app/edit','refresh');
			}
			
		}
		
		public function resume($userInfo=-1)
		{
			if ($userInfo==-1) {
				redirect('home','refresh');
			}
			else{
				// PREVIEW ALL THE NEW VALUES 
				$uid = explode("_", $userInfo)[0];

				$fetchInfo = $this->resume_model->getInfo($uid);
				$fetchJobs = $this->resume_model->getJobs($uid);
				$fetchProjects = $this->resume_model->getProjects($uid);
				$fetchSkills = $this->resume_model->getSkills($uid);

				$data=$this->getAllData($fetchInfo,$fetchJobs,$fetchProjects,$fetchSkills,'preview',$uid);

				if ($data['user_exists']==false) {
					redirect('home','refresh');
				}
				else{
					$this->load->view('meta');
					$this->load->view('publicresume', $data);
				}
				
			}
		}

		private function getAllData($fetchInfo,$fetchJobs,$fetchProjects,$fetchSkills,$page,$uid)
		{
			if ($fetchInfo) {
				foreach ($fetchInfo as $info) {
					$data['fetchInfo']=array(
						'title' => $info->info_title,
						'about' => $info->info_about,
						'phone' => $info->info_phone,
						'mail' => $info->info_mail,
						'website' => $info->info_website
					);
				}
			}
			else{
				$data['fetchInfo']=false;
			}

			if ($fetchJobs) {
				foreach ($fetchJobs as $job) {
					$data['fetchJobs'][]=array(
						'name' => $job->work_name,
						'smonth' => $job->work_start_month,
						'syear' => $job->work_start_year,
						'emonth' => $job->work_end_month,
						'eyear' => $job->work_end_year
					);
				}
			}
			else{
				$data['fetchJobs']=false;
			}

			if ($fetchProjects) {
				foreach ($fetchProjects as $project) {
					$data['fetchProjects'][]=array(
						'name' => $project->project_name,
						'smonth' => $project->project_start_month,
						'syear' => $project->project_start_year,
						'emonth' => $project->project_end_month,
						'eyear' => $project->project_end_year
					);
				}
			}
			else{
				$data['fetchProjects']=false;
			}

			if ($fetchSkills) {
				foreach ($fetchSkills as $skill) {
					$data['fetchSkills'][]=array(
						'title' => $skill->skill_name
					);
				}
			}
			else{
				$data['fetchSkills'] = false;
			}

			$userInfo=$this->users_model->requestUserInfo($uid);
			if ($userInfo) {
				foreach ($userInfo as $user_info) {
					$data['profile_img'] = $user_info->user_image;
					$data['profile_fname'] = $user_info->firstname;
					$data['profile_lname'] = $user_info->lastname;
					$data['user_exists']=true;
				}
			}
			else{
				$data['user_exists']=false;
			}

			$data['current_page'] = $page;

			return $data;
		}
	}
?>