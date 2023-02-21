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
		// $this->session->sess_destroy();
	}

	public function index()
	{

		$this->backoffice_model->CheckSession();
		redirect('manage');
		// $this->session->sess_destroy();
	}
	public function ManagementUser()
	{
		// $this->session->sess_destroy();
		// $this->session->sess_destroy();
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["id"] = $data["sa_id"];
		$setTitle = "Traceability | Management User";
		$data["resultUser"] = $this->backoffice_model->getTableData();
		$data["groupper"] = $this->backoffice_model->getTableGroup();
		$data["plant"] = $this->backoffice_model->getTablePlant();


		$menu["menu"] = $this->backoffice_model->showMenu2($data["user"]);



		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $menu);

		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageUser.php', $data);

		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');
		$this->template->render();
	}

	public function swiftStatus()
	{
		$empcode = $this->session->userdata("empcode");
		$sa_id = $_GET["sa_id"];
		$res = $this->backoffice_model->editStatus($sa_id, $empcode);
		echo json_encode($res);
	}
	public function editManageUser()
	{
		$sa_id = $_GET["sa_id"];
		$res["getdata"] = $this->backoffice_model->editUser($sa_id);
		$res["datatableGroup"] = $this->backoffice_model->getTableGroup();
		echo json_encode($res);
	}
	public function saveEdit()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$empcode = $_POST["empcode"];
		$emailUser = $this->backoffice_model->getemail($empcode);
		$groupper = $_POST["groupper"];
		$editemail = $_POST["editemail"];
		// echo json_encode($emailUser);

		if ($emailUser == $editemail) {
			$rs = $this->backoffice_model->saveEditmodel($empcode, $groupper, $editemail, $empcodeUser);
			echo $rs;
		} else {
			$chemail = $this->backoffice_model->checkEmail($editemail);
			// echo $chemail;
			if ($chemail == "true") {
				$rs = $this->backoffice_model->saveEditmodel($empcode, $groupper, $editemail, $empcodeUser);
				echo $rs;
			} else {
				echo "Duplicate email";
			}
		}





		// echo $empcode.$groupper.$editemail;

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
			$password_md5 = md5($password);
			$rs = $this->backoffice_model->insertUser($empcode, $firstname, $lastname, $groupper, $email, $password_md5, $plant, $empcodeUser);
			echo $rs;
		} else if ($rscheck == "false") {
			return "false";
		} else {
			return "false";
		}
	}
}
