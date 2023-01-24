<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	private $theme; 
	 
	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->theme = $theme; 

		$this->asset_url = $this->config->item('asset_url');
		$this->js_url = $this->config->item('js_url');
		$this->css_url = $this->config->item('css_url');
		$this->image_url = $this->config->item('image_url');

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
  	    $this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
		// ini_set('display_errors', 1);
		// error_reporting(E_ALL);
	}
	 
	public function index()
	{

		$this->backoffice_model->checksession();
		redirect('manage');	
					
	}
	public function profile() {
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->showMenu2($empcode); 
		$setTitle = "Traceability System | Profile";
        $this->template->write('page_title',$setTitle.' ');
        $this->template->write_view('page_menu', 'themes/'. $this->theme .'/first_set/view_menu.php',$data);
        $this->template->write_view('page_header', 'themes/'. $this->theme .'/first_set/view_header.php',$data);
		$this->template->write_view('page_content', 'themes/'. $this->theme .'/view_profile.php');
		// $this->template->write_view('page_footer', 'themes/'. $this->theme .'/first_set/view_footer.php');

		$this->template->render();
	}

		
	}



	

