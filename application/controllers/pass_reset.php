<?php 
	/**
	* 
	*/
	class Pass_reset extends CI_Controller
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
			$this->load->view('pass_reset');
		}

		public function reset()
		{
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
				if ($is_post) {	// IF yes contiunue validation
					$btn_reset = $this->input->post('btn_reset');
					if ($btn_reset!="") {	// If submit button has a value CONTINUE

						$mail = $this->input->post('auth_mail_res');

						$this->form_validation->set_rules('auth_mail_res', 'Email', 'trim|required|valid_email|');
						
						if ($this->form_validation->run() == FALSE)
						{	
							$data['current_page']="login";
							$this->load->view('meta');
							$this->load->view('menu',$data);
							$this->load->view('pass_reset');
						}
						else
						{
							$db_res=$this->users_model->requestReset($mail);

							if ($db_res) {
								foreach ($db_res as $res) {
									$uid=$res->id_user."_".uniqid();
									$token=$res->token;
								}								

								$this->load->library('email');
						
								$config['protocol'] = 'smtp';
								$config['smtp_port'] = '465';
								$config['smtp_host'] = 'ssl://mail.petrovicstefan.rs';
								$config['smtp_user'] = 'materialresume@petrovicstefan.rs';
								$config['smtp_pass'] = 'dpidesign1995';
								$config['wordwrap'] = TRUE;
								$config['mailtype'] = 'html';

								$reset_link=base_url()."reset/index/".$uid."/".$token;
								$message = "Material Résumé password reset request was sent form this email address. If you didn't request this, safely ignore this email. Password Reset:<a href='".$reset_link."'>Click here</a>.";

								$this->email->initialize($config);

								$this->email->from("materialresume@petrovicstefan.rs", 'Material Résumé');
								$this->email->to($mail);
								
								$this->email->subject('Material Résumé Registration Confirmation');
								$this->email->message($message);
								
								if (!$this->email->send()) {
									$this->session->set_flashdata('email_err',true);
									redirect('pass_reset','refresh');	
								}
								else{
									$this->session->set_flashdata('passreset_successful', true);
									redirect('pass_reset','refresh');	
								}
								
							}
							else{
								$data['current_page']="login";
								$data['reset_error']="db_error";
								$this->load->view('meta');
								$this->load->view('menu',$data);
								$this->load->view('pass_reset',$data);
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
				$this->load->view('pass_reset');
			}
		}
	}
?>