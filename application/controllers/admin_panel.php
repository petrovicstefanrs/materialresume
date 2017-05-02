<?php 
	/**
	* 
	*/
	class Admin_panel extends CI_Controller
	{
		public $data = array();

		function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('loged_in')) {
				redirect('home','refresh');
			}
			$this->load->model('admin_model');
			$this->load->library('pagination');
		}
		
		public function index()
		{
			$data['current_page']="admin_panel";
			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('admin_panel',$data);
			$this->load->view('right_admin_empty',$data);
		}

		public function aboutme(){
			$aboutme_data=$this->admin_model->getAboutMe();

			if($aboutme_data){
				foreach ($aboutme_data as $about) {
					$data['about_name']=$about->myname;
					$data['about_desc']=$about->mydesc;
					$data['about_studid']=$about->mystudid;
					$data['about_email']=$about->myemail;
					$data['about_img']=$about->myimg;
				}
			}

			$data['current_page']="admin_panel";
			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('admin_panel',$data);
			$this->load->view('right_admin_aboutme',$data);
		}

		public function aboutmeUpdate()
		{
			$is_post = $this->input->server('REQUEST_METHOD') == 'POST'; // Is data sent over POST
			if ($is_post) {	// IF yes contiunue validation
				$btn_update_about = $this->input->post('btn_update_about_info');
				if ($btn_update_about!="") {	// If submit button has a value CONTINUE

					$fullname = $this->input->post('update_about_name');
					$studid = $this->input->post('update_about_studid');
					$studemail = $this->input->post('update_about_email');
					$abouttext = $this->input->post('update_about_about');
					
					$img_url=false;

					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size']	= '1024';
					$config['remove_spaces'] = TRUE;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload('update_about_img'))
					{
						$data['upload_err']= $this->upload->display_errors();
					}
					else
					{
						$uploadData = $this->upload->data();
						$img_url = "images/".$uploadData['file_name'];

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

					$aboutme_data=$this->admin_model->getAboutMe();

					if($aboutme_data){
						foreach ($aboutme_data as $about) {
							$about_name=$about->myname;
							$about_desc=$about->mydesc;
							$about_studid=$about->mystudid;
							$about_email=$about->myemail;
							$about_img=$about->myimg;
						}
					}
					if (!$img_url) {
						$img_url=$about_img;
					}
					if ($fullname==""){
						$fullname=$about_name;
					}
					if ($studid==""){
						$studid=$about_studid;
					}
					if ($studemail==""){
						$studemail=$about_email;
					}
					if ($abouttext==""){
						$abouttext=$about_desc;
					}

					$db_res = $this->admin_model->updateAboutMe($fullname,$abouttext,$studid,$studemail,$img_url);		// UPDATE ABOUT ME INFO
					
					
					redirect('admin_panel/aboutme','refresh');
				}
				else{
					echo "Ooooops! Well this is embarrassing! :D";
				}
			}
			else{
				redirect('admin_panel/aboutme','refresh');
			}	
		}

		public function users(){

			$config['base_url'] = base_url()."admin_panel/users";
			$config['total_rows'] = $this->admin_model->getUserNumber();
			$config['per_page'] = 10; 
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<div>';
			$config['first_tag_close'] = '</div>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<div>';
			$config['last_tag_close'] = '</div>';
			$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$config['next_tag_open'] = '<span class="chevron">';
			$config['next_tag_close'] = '</span>';
			$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
			$config['prev_tag_open'] = '<span class="chevron">';
			$config['prev_tag_close'] = '</span>';
			$config['cur_tag_open'] = '<b class="current_tag">';
			$config['cur_tag_close'] = '</b>';

			$this->pagination->initialize($config); 

			$page= ($this->uri->segment(3)) ? intval($this->uri->segment(3)) : 0;

			$data['users']=$this->admin_model->getUsers($config['per_page'],$page);

			$data['pag'] = $this->pagination->create_links();

			$data['current_page']="admin_panel";

			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('admin_panel',$data);
			$this->load->view('right_admin_users',$data);
		}

		public function delete_users()
		{
			$page=($this->uri->segment(3))?$this->uri->segment(3):"";
			$uids=$this->input->post('userid');
			foreach ($uids as $uid) {
				$this->admin_model->deleteUsers($uid);
			}
			redirect('admin_panel/users/'.$page,'refresh');
		}
		public function resumes(){

			$config['base_url'] = base_url()."admin_panel/resumes";
			$config['total_rows'] = $this->admin_model->getResumeNumber();
			$config['per_page'] = 10; 
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<div>';
			$config['first_tag_close'] = '</div>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<div>';
			$config['last_tag_close'] = '</div>';
			$config['next_link'] = '<i class="fa fa-chevron-right" aria-hidden="true"></i>';
			$config['next_tag_open'] = '<span class="chevron">';
			$config['next_tag_close'] = '</span>';
			$config['prev_link'] = '<i class="fa fa-chevron-left" aria-hidden="true"></i>';
			$config['prev_tag_open'] = '<span class="chevron">';
			$config['prev_tag_close'] = '</span>';
			$config['cur_tag_open'] = '<b class="current_tag">';
			$config['cur_tag_close'] = '</b>';

			$this->pagination->initialize($config); 

			$page= ($this->uri->segment(3)) ? intval($this->uri->segment(3)) : 0;

			$data['users']=$this->admin_model->getUsersWithResumes($config['per_page'],$page);

			$data['pag'] = $this->pagination->create_links();

			$data['current_page']="admin_panel";
			
			$this->load->view('meta');
			$this->load->view('menu',$data);
			$this->load->view('admin_panel',$data);
			$this->load->view('right_admin_resumes',$data);
		}

		public function delete_resumes()
		{
			$page=($this->uri->segment(3))?$this->uri->segment(3):"";
			$uids=$this->input->post('userid');
			foreach ($uids as $uid) {
				$this->admin_model->deleteResumes($uid);
			}
			redirect('admin_panel/resumes/'.$page,'refresh');
		}
	}
?>