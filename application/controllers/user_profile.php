<?php 
	/**
	* 
	*/
	class User_profile extends CI_Controller
	{
		public $data = array();

		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('loged_in')) {
				redirect('home','refresh');
			}
			$this->load->model('users_model');
			$this->load->model('resume_model');
		}
		
		public function index()
		{
			$user_id=$this->session->userdata('userid');
			$fetchUser = $this->users_model->requestUserInfo($user_id);
			if ($fetchUser) {
				foreach ($fetchUser as $row) {
					$data['profileimg']=$row->user_image;
					$data['fname']=$row->firstname;
					$data['lname']=$row->lastname;
					$data['mail']=$row->user_mail;
				}
			}

			$fetchInfo = $this->resume_model->getInfo($user_id);
			$fetchJobs = $this->resume_model->getJobs($user_id);
			$fetchProjects = $this->resume_model->getProjects($user_id);
			$fetchSkills = $this->resume_model->getSkills($user_id);

			if(!$fetchInfo && !$fetchJobs && !$fetchProjects && !$fetchSkills){
				//$data['has_resume']=false;
				$this->session->set_userdata(array('has_resume' => false));
			}
			else{
				//$data['has_resume']=true;
				$this->session->set_userdata(array('has_resume' => true));
			}

			$data['current_page']="user_profile";
			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('user_profile',$data);
		}

		public function changes()
		{
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
			if ($is_post) {	// IF yes contiunue validation
				$btn_change = $this->input->post('btn_change');
				if ($btn_change!="") {	// If submit button has a value CONTINUE

					$mail = $this->input->post('change_email');
					$fname = $this->input->post('change_first_name');
					$lname = $this->input->post('change_last_name');

					$this->form_validation->set_rules('change_email', 'New Email', 'trim|valid_email|');
					$this->form_validation->set_rules('change_first_name', 'First Name', 'trim|max_length[30]');
					$this->form_validation->set_rules('change_last_name', 'Last Name', 'trim|max_length[30]');
					
					if ($this->form_validation->run() == FALSE)
					{	
						$data['current_page']="user_profile";
						$this->load->view('meta');
						$this->load->view('menu',$data);
						$this->load->view('user_profile',$data);
					}
					else
					{
						$img_url=false;
						$user_id=$this->session->userdata('userid');
						$fetchUser = $this->users_model->requestUserInfo($user_id);
						
						if ($fetchUser) {
							foreach ($fetchUser as $row) {
								if (!$mail) {
									$mail=$row->user_mail;	// EMAIL
								}
								if (!$fname) {
									$fname=$row->firstname;	// NAME
								}
								if (!$lname) {
									$lname=$row->lastname;	// LAST NAME
								}

							}
						}
						else{
							$this->session->set_flashdata('changefail', true);
							redirect('user_profile','refresh');
						}

						$config['upload_path'] = './images/users/';
						$config['allowed_types'] = 'jpg|png';
						$config['max_size']	= '1024';
						$config['remove_spaces'] = TRUE;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if ( ! $this->upload->do_upload('change_img'))
						{
							$data['upload_err']= $this->upload->display_errors();
						}
						else
						{
							$uploadData = $this->upload->data();
							$img_url = "images/users/".$uploadData['file_name'];

							$config_img['image_library'] = 'gd2';
							$config_img['source_image'] = $img_url;
							$config_img['create_thumb'] = FALSE;
							$config_img['maintain_ratio'] = TRUE;
							$config_img['width'] = 500;
							$config_img['height'] = 500;

							$this->load->library('image_lib', $config_img);
							$this->image_lib->initialize($config_img);

							$this->image_lib->resize();
						}

						if (!$img_url) {
							if ($fetchUser) {
								foreach ($fetchUser as $row) {
									$img_url=$row->user_image;
								}
							}
						}

						$db_res = $this->users_model->updateProfile($mail,$fname,$lname,$img_url,$user_id);
						
						
						if ($db_res) {
							if ($db_res==="exists") {
								$data['mailexists']=true;
								$data['current_page']="user_profile";
								$this->load->view('meta');
								$this->load->view('menu',$data);
								$this->load->view('user_profile',$data);
							}
							else{
								$this->session->set_flashdata('changesucess', true);
								redirect('user_profile','refresh');
							}
						}
						else{
							$this->session->set_flashdata('changefail', true);
							redirect('user_profile','refresh');
						}
					}
				}
				else{
					echo "Ooooops! Well this is embarrassing! :D";
				}
			}
			else{
				$data['current_page']="user_profile";
				$this->load->view('meta');
				$this->load->view('menu',$data);
				$this->load->view('user_profile',$data);
			}
		}
	}
?>