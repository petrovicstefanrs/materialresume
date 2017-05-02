<?php 
	/**
	* 
	*/
	class Reset extends CI_Controller
	{
		private $data = array();

		function __construct()
		{
			parent::__construct();
			$this->load->model('users_model');
		}

		public function index($uid=0,$token=0)
		{

			$userid=explode("_", $uid)[0];
			$db_res=$this->users_model->userForReset($userid,$token);
			if (!$db_res) {
				redirect('home','refresh');
			}
			else{
				$data['current_page']="login";
				$data['uid'] = $userid; // parsed uid
				$data['uid_url']=$uid; // uid for url
				$data['token'] = $token; // pass them to hidden form
				$this->load->view('meta');
				$this->load->view('menu',$data);
				$this->load->view('reset');
			}
		}

		public function changepass()
		{
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
			if ($is_post) {	// IF yes contiunue validation
				
				$pass = $this->input->post('auth_pass_respas');
				$pass_re = $this->input->post('auth_pass_respas_re');
				$uid = $this->input->post('uid');
				$uid_url = $this->input->post('uid_url');
				$token = $this->input->post('token');


				$db_res=$this->users_model->userForReset($uid,$token);
				
				foreach ($db_res as $res) {
					$usermail=$res->user_mail;
				}
				$db_res = $this->users_model->passwordReset($uid,$token,$pass);
				if ($db_res) {
					$this->load->library('email');
						
					$config['protocol'] = 'smtp';
					$config['smtp_port'] = '465';
					$config['smtp_host'] = 'ssl://mail.petrovicstefan.rs';
					$config['smtp_user'] = 'materialresume@petrovicstefan.rs';
					$config['smtp_pass'] = 'dpidesign1995';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';

					$message = "Material Résumé password reset was successful.</br>You can now log in with your new creditentials.";

					$this->email->initialize($config);

					$this->email->from("materialresume@petrovicstefan.rs", 'Material Résumé');
					$this->email->to($usermail);
					
					$this->email->subject('Material Résumé Registration Confirmation');
					$this->email->message($message);
					
					if (!$this->email->send()) {
						$this->session->set_flashdata('email_err',true);
						redirect('pass_reset','refresh');	
					}
					else{
						$this->session->set_flashdata('reset_successful', true);
						redirect('pass_reset','refresh');	
					}
				}
				else{
					$this->session->set_flashdata('db_err', true);
					redirect('pass_reset','refresh');
				}
			}
			else{
				redirect('home','refresh');
			}
		}
	}
?>