<?php 
	/**
	* 
	*/
	class Aboutme extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('aboutme_model');
		}

		public function index()
		{
			$data = array();
		
			$db_res=$this->aboutme_model->getAboutMe();
			if($db_res){
				foreach ($db_res as $res) {
					$data['about_name']=$res->myname;
					$data['about_desc']=$res->mydesc;
					$data['about_studid']=$res->mystudid;
					$data['about_email']=$res->myemail;
					$data['about_img']=$res->myimg;
				}
				$this->load->view('meta');
				$this->load->view('menu');
				$this->load->view('aboutme',$data);
				$this->load->view('footer');
			}
			else{
				redirect('home','refresh');
			}
		}
	}
?>