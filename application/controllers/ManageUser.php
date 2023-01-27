<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class manageUser extends CI_Controller
{
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
	public function ManagementUser()
	{
		$data["fullname"] = $this->session->userdata("fname") . " " . $this->session->userdata("lname");
		$empcode = $this->session->userdata("empcode");
		$data["menu"] = $this->backoffice_model->showMenu2($empcode); //show เมนูใหญ่
		$setTitle = "Traceability | Management User";
		$data["resultUser"] = $this->backoffice_model->getTableData();
		$data["groupper"] = $this->backoffice_model->getTableGroup();
		$data["plant"] = $this->backoffice_model->getTablePlant();
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageUser.php', $data);

		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');
		$this->template->render();
	}

	public function swiftStatus()
	{
		$sa_id = $_GET["sa_id"];
		$res = $this->backoffice_model->editStatus($sa_id);
		// echo date('h:i:s')."<br>";
		echo json_encode($res);
	}
	public function editManageUser()
	{
		$sa_id = $_GET["sa_id"];
		$res = $this->backoffice_model->editUser($sa_id);
		echo json_encode($res);
	}
	public function saveEdit()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$empcode = $_POST["empcode"];
		$groupper = $_POST["groupper"];
		$editemail = $_POST["editemail"];
			$groupCon = $this->backoffice_model->convert("spg_id", "sys_permission_group", "spg_name ='$groupper'");
			$rs = $this->backoffice_model->saveEdit($empcode, $groupCon, $editemail,$empcodeUser);
			echo $rs;
	
	}
	public function addManageUser()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$empcode = $_POST["empcode"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$groupper = $_POST["groupper"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$plant = $_POST["plant"];

		$rscheck = $this->backoffice_model->checkUserAdd($empcode);
		if ($rscheck == "true") {
			$groupCon = $this->backoffice_model->convert("spg_id", "sys_permission_group", "spg_name ='$groupper'");
			$plantCon = $this->backoffice_model->convert("mpa_id", "mst_plant_admin", "mpa_name='$plant'");
			$password_md5 = md5($password);
			$rs = $this->backoffice_model->insertUser($empcode, $firstname, $lastname, $groupCon, $email, $password_md5, $plantCon,$empcodeUser);
			echo $rs;
		} else if ($rscheck == "false") {
			return "false";
		} else {
			return "false";
		}
	}
}
