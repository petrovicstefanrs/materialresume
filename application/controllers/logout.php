<?php 
	/**
	* 
	*/
	class Logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('loged_in')) {
				$udata=$this->session->all_userdata();
				$this->session->unset_userdata($udata);
				$this->session->sess_destroy();
				redirect('home','refresh');
			}
			else{
				redirect('home','refresh');
			}
		}
	}
?>