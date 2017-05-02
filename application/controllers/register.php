<?php 
	/**
	* 
	*/
	class Register extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('users_model');
			if ($this->session->userdata('loged_in')) {
				redirect('home','refresh');
			}
		}

		public function index()
		{	
			$data['current_page']="login";
			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('register');
		}
		
		public function auth()
			{
				$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
				if ($is_post) {	// IF yes contiunue validation
					$btn_register = $this->input->post('btn_register');
					if ($btn_register!="") {	// If submit button has a value CONTINUE

						$mail = $this->input->post('auth_mail_reg');
						$pass = $this->input->post('auth_password_reg');
						$pass_re = $this->input->post('auth_password_reg_re');

						$this->form_validation->set_rules('auth_mail_reg', 'Email', 'trim|required|valid_email|');
						$this->form_validation->set_rules('auth_password_reg', 'Password', 'required|min_length[8]|max_length[20]');
						$this->form_validation->set_rules('auth_password_reg_re', 'Repeated Password', 'required|min_length[8]|max_length[20]|match[auth_password_reg]');
						
						if ($this->form_validation->run() == FALSE)
						{	
							$data['current_page']="login";
							$this->load->view('meta');
							$this->load->view('menu',$data);
							$this->load->view('register');
						}
						else
						{
							$db_res=$this->users_model->register($mail,$pass);

							if ($db_res) {
								if($db_res==="exists"){
									$this->session->set_flashdata('register_exists', true);
									redirect('register','refresh');
								}
								else{
									$this->session->set_flashdata('register_successful', true);

									$this->load->library('email');
						
									$config['protocol'] = 'smtp';
									$config['smtp_port'] = '465';
									$config['smtp_host'] = 'ssl://mail.petrovicstefan.rs';
									$config['smtp_user'] = 'materialresume@petrovicstefan.rs';
									$config['smtp_pass'] = 'dpidesign1995';
									$config['wordwrap'] = TRUE;
									$message = "Thank you for registering on Material Résumé. We hope you will enjoy our product. If you have any questions you can contact us via contact form on Material Résumé Website.";

									$this->email->initialize($config);

									$this->email->from("materialresume@petrovicstefan.rs", 'Material Résumé');
									$this->email->to($mail);
									
									$this->email->subject('Material Résumé Registration Confirmation');
									$this->email->message($message);
									
									$this->email->send();

									redirect('login','refresh');
								}
							}
							else{
								$data['current_page']="login";
								$data['register_error']="db_error";
								$this->load->view('meta');
								$this->load->view('menu',$data);
								$this->load->view('register',$data);
							}
						}
					}
				else{
					echo "Ooooops! Well this is embarrassing! :D";
				}
			}
			else{
				$data['current_page']="login";
				$this->load->view('meta');
				$this->load->view('menu',$data);
				$this->load->view('register');
			}
		}
	}
?>