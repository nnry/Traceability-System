<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ResetPassword extends CI_Controller
{

	private $theme;

	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->load->config('config', TRUE);
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
	public function RePassword()
	{
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["id"] = $data["sa_id"];
		$data["menu"] = $this->backoffice_model->showMenu2($data["user"]);
		$setTitle = "Traceability System | Reset Password";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_resetPassword.php');
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/first_set/view_footer.php');

		$this->template->render();
	}
	public function checkRePass(){
		
		$empcode = $this->session->userdata("empcode");
		$oldpass = md5($_POST["oldpass"]);
		$newpass = md5($_POST["newpass"]);
		$compass = md5($_POST["compass"]);

		$check = $this->backoffice_model->checkpass($empcode,$oldpass);
		 
		if($check == "true"){
			if($newpass == $compass){
				$re = $this->backoffice_model->upChangePass($newpass,$empcode);
				echo $re;
			}else{
				echo "confirm pass fail";
			}
		}else{
			echo "old pass fail";
		}
		
	}
}
