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
		$setTitle = "Traceability System | Management Menu";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_manageMenu.php');
		$this->template->write_view('page_footer', 'themes/'. $this->theme .'/first_set/view_footer.php');

		$this->template->render();
	}

	public function editMenu(){
		$ss_id = $_GET["ss_id"];
		$res = $this->backoffice_model->getEditMenu($ss_id);
		echo json_encode($res);
	
	}
	public function saveEditMenu(){
		$empcodeUser = $this->session->userdata("empcode");
		$idsub = $_POST["idsub"];
		$menu = $_POST["menu"];
		$sub = $_POST["submenu"];
		$path = $_POST["path"];

		// echo $idsub;
		// echo $menu;
		// echo $sub;
		// echo $path;
	
		$chkmenu=$this->backoffice_model->checkMenu($menu);
		if($chkmenu == "true") {// มี
			// echo "false";
			$checksub = $this->backoffice_model->checkSubmenu($sub);
			// echo $checksub;
			if($checksub == "true"){
				$res = $this->backoffice_model->saveEditTableMenu($menu,$sub,$path,$idsub,$empcodeUser);
				echo $res;
			}else{
				echo "false";
			}
		}else{
			$checksub = $this->backoffice_model->checkSubmenu($sub);
			echo $checksub;
			if($checksub == "true"){
				$res = $this->backoffice_model->saveEditTableMenu($menu,$sub,$path,$idsub,$empcodeUser);
				echo $res;
			}else{
				echo "false";
			}
		}
	}
	public function statusMenu(){
		$ss_id = $_GET["ss_id"];
		$res = $this->backoffice_model->swiftStatusMenu($ss_id);
		echo json_encode($res);
	}
	public function insertMenu(){
		$empcodeUser = $this->session->userdata("empcode");
		$menu = $_POST["addmmenu"];
		$submenu = $_POST["addsubmenu"];
		$path = $_POST["addpath"];
		$icons = $_POST["addicons"];

		$resCheckMenu = $this->backoffice_model->checkMenu($menu);

		if($resCheckMenu ==  "true" ){ //มีอยู่แล้ว
			$consm_id = $this->backoffice_model->convert("sm_id", "sys_menu", "sm_name ='{$menu}'");
			$check = $this->backoffice_model->checkSubmenu($submenu);
			if($check == "true"){
				$order = $this->backoffice_model->maxOrder($consm_id);
				$addorder = $order + 1;
				$insertsubmenu = $this->backoffice_model->insertSubMenu($consm_id,$submenu,$path,$icons,$empcodeUser,$addorder);
				echo $insertsubmenu; 
			}else{
				echo $check;
			}
			
		}else{ //ไม่มีแอดได้
			$check = $this->backoffice_model->checkSubmenu($submenu);
			if($check == "true"){
				$order = $this->backoffice_model->maxOrderMenu();
				$addorder = $order + 1;
				$insertmenu = $this->backoffice_model->insertMenu($menu,$icons,$empcodeUser,$addorder);
				if($insertmenu =="true"){
					$consm_id = $this->backoffice_model->convert("sm_id", "sys_menu", "sm_name ='{$menu}'");
					$insertsubmenu = $this->backoffice_model->insertSubMenu($consm_id,$submenu,$path,$icons,$empcodeUser,$addorder);
					echo $insertsubmenu;
				}else{
					return $insertmenu;
				}
			}else{
				echo $check;
			}

		}
		

	}
}
