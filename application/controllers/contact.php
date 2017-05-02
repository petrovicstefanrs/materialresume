<?php 
	/**
	* 
	*/
	class Contact extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('meta');
			$this->load->view('menu');
			$this->load->view('contact');
			$this->load->view('footer');
		}

		public function send()
		{
			$data = array();
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST';
			if ($is_post) {
				$btn_contact = $this->input->post('btn_contact');
				if ($btn_contact!="") {
					$name = $this->input->post('contact_name');
					$lastname = $this->input->post('contact_lastname');
					$mail = $this->input->post('contact_mail');
					$message = $this->input->post('contact_message');

					$this->form_validation->set_rules('contact_mail', 'Email', 'trim|required|valid_email|');
					$this->form_validation->set_rules('contact_name', 'Name', 'trim|required|min_length[3]|max_length[30]');
					$this->form_validation->set_rules('contact_lastname', 'Last Name', 'trim|required|min_length[3]|max_length[30]');
					$this->form_validation->set_rules('contact_message', 'Message', 'trim|required|min_length[20]|max_length[400]');

					if ($this->form_validation->run() == FALSE) {
						$this->load->view('meta');
						$this->load->view('menu');
						$this->load->view('contact');
						$this->load->view('footer');
					} else {
						$this->load->library('email');
						
						$config['protocol'] = 'smtp';
						$config['smtp_port'] = '465';
						$config['smtp_host'] = 'ssl://mail.petrovicstefan.rs';
						$config['smtp_user'] = 'materialresume@petrovicstefan.rs';
						$config['smtp_pass'] = 'dpidesign1995';
						$config['wordwrap'] = TRUE;

						$this->email->initialize($config);

						$this->email->from($mail, $name.$lastname);
						$this->email->to('materialresume@petrovicstefan.rs');
						$this->email->cc('dotperinchdesign@gmail.com');
						
						$this->email->subject('Material Resume Contact Form');
						$this->email->message($message);
						
						if ( ! $this->email->send())
						{
						    $data['contact_error']="Send Error";
						}
						else{
							$data['contact_sent']="Success";
						}
						//echo $this->email->print_debugger();

						$this->load->view('meta');
						$this->load->view('menu');
						$this->load->view('contact',$data);
						$this->load->view('footer');
					}
				}
			}
		}
	}

?>