<?php 
	/**
	* 
	*/
	class Login extends CI_Controller
	{ 
		public $data = array();
			
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
			$this->load->view('login');
		}

		public function auth()
		{
			$is_post=$this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
			if ($is_post) {	// IF yes contiunue validation
				$btn_login = $this->input->post('btn_login');
				if ($btn_login!="") {	// If submit button has a value CONTINUE

					$mail = $this->input->post('auth_mail_log');
					$pass = $this->input->post('auth_password_log');

					$this->form_validation->set_rules('auth_mail_log', 'Email', 'trim|required|valid_email|');
					$this->form_validation->set_rules('auth_password_log', 'Password', 'required|min_length[8]|max_length[20]');
					
					if ($this->form_validation->run() == FALSE)
					{	
						$data['current_page']="login";
						$this->load->view('meta');
						$this->load->view('menu',$data);
						$this->load->view('login');
					}
					else
					{
						$db_res=$this->users_model->login($mail,$pass);

						if($db_res){
							foreach ($db_res as $res) {
								$sessiondata = array(
									'user_role' => $res->role_name,
									'loged_in' => true,
									'mail' => $res->user_mail,
									'userid' => $res->id_user,
									'fname' => $res->firstname,
									'lname' => $res->lastname
								);
							}
							
							$this->session->set_userdata($sessiondata);

							if ($this->session->userdata('user_role')) {
								switch ($this->session->userdata('user_role')) {
									case 'user':
										redirect('user_profile','refresh');
										break;

									case 'admin':
										redirect('admin_panel','refresh');
										break;
									
									default:
										redirect('home','refresh');
										break;
								}
							}
						}
						else{
							$data['current_page']="login";
							$data['login_error']="db_error";
							$this->load->view('meta');
							$this->load->view('menu',$data);
							$this->load->view('login',$data);
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
				$this->load->view('login');
			}
		}
	}
?>