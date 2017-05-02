<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["current_page"]="home";
		$this->load->view('meta');
		$this->load->view('menu',$data);
		$this->load->view('home');
		$this->load->view('footer',$data);
	}
}

