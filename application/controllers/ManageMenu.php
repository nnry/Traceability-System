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
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageMenu.php', $data);
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
		} else if ($chkmenu == "false") {
			$res = $this->backoffice_model->saveEditTableMenu($menu, $idmenu, $empcodeUser);
			echo $res;
		} else {
			echo "false";
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
		$icons = "fas fa-globe";

		$resCheckMenu = $this->backoffice_model->checkMenu($menu);

		if ($resCheckMenu == "true") { // มี แอดไม่ได้
			echo "repeat";
		} else {
			$order = $this->backoffice_model->maxOrderMenu();
			$addorder = $order + 1;
			$res = $this->backoffice_model->insertMenu($menu, $icons, $empcodeUser, $addorder);

			echo $res;
		}
	}
	public function getsubbyid()
	{
		$sm_id = $_GET["sm_id"];
		$res = $this->backoffice_model->getsunmenu_bymenu($sm_id);
		echo json_encode($res);
	}
	public function statusSubMenu()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$id = $_GET["ss_id"];
		$res = $this->backoffice_model->swiftstatusSubmenu($id, $empcodeUser);
		echo json_encode($res);
	}
	public function geteditsub()
	{
		$id = $_GET["ss_id"];
		$res = $this->backoffice_model->getEditSubMenu($id);
		echo json_encode($res);
	}

	public function saveEditSubMenu()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$idmenu = $_POST["idmenu"];
		$submenu = $_POST["submenu"];
		$path = $_POST["path"];

		// echo "==>",$idmenu;
		// echo "  ==>",$submenu;
		// echo "  ==>",$submenu;



		$chksubmenu = $this->backoffice_model->checkSubmenu($submenu);
		$chkknmsub = $this->backoffice_model->normalsub($idmenu);

		if ($chkknmsub == $submenu) {
			// echo "Submenufalse";
			$chkpath = $this->backoffice_model->checkpath($path);
			$chknmpath = $this->backoffice_model->normalpath($idmenu);
			// echo $chknmpath;
			if ($chknmpath == $path) {
				$res = $this->backoffice_model->saveEditSub($empcodeUser, $idmenu, $submenu, $path);
				echo "true";
			} else {
				if ($chkpath == "true") {
					$res = $this->backoffice_model->saveEditSub($empcodeUser, $idmenu, $submenu, $path);
					echo $res;
				} else {
					echo "pathfalse";
				}
			}
		} else {
			if ($chksubmenu == "true") { // มี แอดไม่ได้
				$chkpath = $this->backoffice_model->checkpath($path);
				$chknmpath = $this->backoffice_model->normalpath($idmenu);
				// echo $chknmpath;
				if ($chknmpath == $path) {
					$res = $this->backoffice_model->saveEditSub($empcodeUser, $idmenu, $submenu, $path);
					echo "true";
				} else {
					if ($chkpath == "true") {
						$res = $this->backoffice_model->saveEditSub($empcodeUser, $idmenu, $submenu, $path);
						echo $res;
					} else {
						echo "pathfalse";
					}
				}
			} else if ($chksubmenu == "false") {
				echo "Submenufalse";
			} else {
				echo "false";
			}
		}
	}

	public function insertSubmenu()
	{
		$empcodeUser = $this->session->userdata("empcode");
		$idmenu = $_POST["idmenu"];
		$submenu = $_POST["subname"];
		$path = $_POST["pathname"];

		// echo $idmenu;

		$checkmax = $this->backoffice_model->maxOrderSubmenu($idmenu);
		$cc = $checkmax+1;
		$chksubmenu = $this->backoffice_model->checkSubmenu($submenu);
		if ($chksubmenu == "true") {
			$chkpath = $this->backoffice_model->checkpath($path);
			if ($chkpath == "true") {
				$res = $this->backoffice_model->innsertSubAddPath($submenu, $path, $idmenu, $empcodeUser,$cc);
				echo $res;
			} else {
				echo "pathfalse";
			}
		} else {
			echo "Submenufalse";
		}
	}
}
