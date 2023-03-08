<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
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
	public function profile()
	{

		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		// $data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");


		// // $data["user"] = $this->session->userdata("empcode");
		// // $data["fname"] = $this->session->userdata("fname");
		// // $data["lname"] = $this->session->userdata("lname");
		// // $data["email"] = $this->session->userdata("email");
		// // $data["id"] = $this->session->userdata("id");

		// // $data["menu"] = $this->backoffice_model->showMenu2($empcode);
		// $data["plant"] = $this->backoffice_model->getTablePlant();



		// $data = $this->backoffice_model->getname($data["user"]);
		
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["id"] = $data["sa_id"];
		$data["menu"] = $this->backoffice_model->showMenu2($data["user"]);
		
		$data["plant"] = $this->backoffice_model->getTablePlant();
		$data["fname"] = $data["sa_fname"];
		$data["lname"] =  $data["sa_lname"];
		$data["email"] =  $data["sa_email"];
		$data["phase"] = $data['mpa_name'];
		// $data["selectplant"] = $this->backoffice_model->selectplant($data["user"]);
		// $data["youplant"] = $data["mpa_name"];
		

		$setTitle = "Traceability System | Profile";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_profile.php', $data);
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/first_set/view_footer.php');

		$this->template->render();
	}

	// public function saveProfile()
	// {

	// 	$empcodeUser = $this->session->userdata("empcode");
	// 	$fname = $_POST["fname"];
	// 	$lname = $_POST["lname"];
	// 	$email = $_POST["email"];
	// 	$plant = $_POST["plant"];

	// 	$rs = $this->backoffice_model->saveEditProfile($fname, $lname, $email, $plant, $empcodeUser);
	// 	echo $rs;
	// }
}
