<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
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

	public function Account()
	{
		$this->load->library('session');
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

		$this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
		$this->template->write('page_title', '' . $setTitle . 'TBKK | ');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php');
		$this->template->render();



	}
	public function logout(){
		$this->template->set_master_template('themes/' . $this->theme . '/tpl_logout.php');
		$this->template->render();
	}


	public function checkUserLogin()
	{
		$code = $_POST["empcode"];
		$pass = md5($_POST["emppass"]);


		// $code = $_GET["empcode"];
		// $pass = md5($_GET["emppass"]);

		$rscheckLogin = $this->backoffice_model->checkLogin($code, $pass);
		if ($rscheckLogin == "true") {
			echo $rscheckLogin;
			$data = $this->backoffice_model->getname($code);
			if ($data == true ) {
				$session_data = array(
					'id' => $data['sa_id'],
					'empcode' => $data['sa_code'],
					'fname' => $data['sa_fname'],
					'lname' => $data['sa_lname'],
					'login' => "OK"
				);
				$this->session->set_userdata($session_data);
			}
		} else {
			echo $rscheckLogin;
		}
	}
}
