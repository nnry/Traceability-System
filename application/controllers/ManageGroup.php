<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class manageGroup extends CI_Controller
{

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
	public function ManagementGroupPer()
	{
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["menu"] = $this->backoffice_model->showMenu2($data["user"]);
		$data["groupper"] = $this->backoffice_model->getTableGroup();
		$data["tabledetail"] = $this->backoffice_model->TableDetailGroup();
		$setTitle = "Traceability System | Management Group Permission";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageGroup.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');

		$this->template->render();
	}
	public function swiftStatus()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->swiftStatusGrop($spg_id);
		// echo date('h:i:s')."<br>";
		echo json_encode($res);
	}
	public function statusDetail(){
		$spd_id = $_GET["spd_id"];
		$res = $this->backoffice_model->swiftStatusDetail($spd_id);
		// // echo date('h:i:s')."<br>";
		echo json_encode($res);

	}
	public function editNameGroup()
	{
		$spg_id = $_GET["spg_id"];
		$res = $this->backoffice_model->editNameGroupPer($spg_id);
		echo json_encode($res);
	}
	public function saveEditPer()
	{
		$empcode = $this->session->userdata("empcode");
		$id = $_POST["id"];
		$name = $_POST["name"];
		$check = $this->backoffice_model->checkPerAdd($name);
		if ($check == "true") {
			$res = $this->backoffice_model->saveEditNameGroup($id, $name, $empcode);
		echo $res;
		}else {
			echo "false";
		}
		
	}
	public function addPergroup()
	{
		$empcode = $this->session->userdata("empcode");
		// $id = $_POST["id"];
		$name = $_POST["name"];
		$check = $this->backoffice_model->checkPerAdd($name);
		if ($check == "true") {
			$res = $this->backoffice_model->insertPermissionGroup($name, $empcode);
			echo $res;
		}else {
			echo "false";
		}
	}
	public function getDetailGroup(){
		$id = $_GET["spg_id"];
		$res = $this->backoffice_model->detailGroup($id);
		echo json_encode($res) ;
	}
}
