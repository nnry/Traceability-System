<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class manageMenu extends CI_Controller
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
	public function ManagementMenu()
	{
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["id"] = $data["sa_id"];
		$data["tableMenu"] = $this->backoffice_model->tableMenu();
		$data["tablesubmenu"] = $this->backoffice_model->tableMainSubMenu();
		$setTitle = "Traceability System | Management Menu";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageMenu.php',$data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');

		$this->template->render();
	}

	public function editMenu()
	{
		$sm_id = $_GET["sm_id"];
		$res = $this->backoffice_model->getEditMenu($sm_id);
		echo json_encode($res);
	}
	public function saveEditMenu()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$idmenu = $_POST["idmenu"];
		$menu = $_POST["menu"];


		$chkmenu = $this->backoffice_model->checkMenu($menu);
		if ($chkmenu == "true") { // มี แอดไม่ได้
			echo "repeat";
		} else {
			$res = $this->backoffice_model->saveEditTableMenu($menu, $idmenu, $empcodeUser);
			echo $res;
		}
	}
	public function statusMenu()
	{
		$empcode = $this->session->userdata("empcode");
		$sm_id = $_GET["sm_id"];
		$res = $this->backoffice_model->swiftStatusMenu($sm_id, $empcode);
		echo json_encode($res);
	}
	public function insertMenu()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$menu = $_POST["addmmenu"];
		$icons = $_POST["addicons"];

		$resCheckMenu = $this->backoffice_model->checkMenu($menu);

		if ($resCheckMenu == "true") { // มี แอดไม่ได้
			echo "repeat";
		} else {
			$order = $this->backoffice_model->maxOrderMenu();
			$addorder = $order + 1;
			$res = $this->backoffice_model->insertMenu($menu,$icons,$empcodeUser,$addorder);
			
			echo $res;
		}
	}
}
