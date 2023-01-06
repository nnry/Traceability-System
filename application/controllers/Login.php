<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	 
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
	public function Account() {
		$setTitle = strtoupper($this->router->fetch_method().' '.$this->router->fetch_class());
		
		$this->template->set_master_template('themes/'. $this->theme .'/tpl_login.php');
		$this->template->write('page_title', 'TBKK | '.$setTitle.'');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php');
		$this->template->render();

		// $rs = $this->backoffice_model->getUser();
		// echo json_encode($rs);
		}

	
	public function checkUserLogin() {

		// $code = $_POST["empcode"];
		// $pass = $_POST["emppass"];
		
		$code = $_GET["empcode"];
		$pass = $_GET["emppass"];

		$rs = $this->backoffice_model->checkLogin($code,$pass);
		// $this->checkPermis($rs);
		echo $rs;
		
	}

	public function checkPermis($rs){

		$rs  = $this->backoffice_model->getUser($rs);
		echo json_encode($rs);

	}



	
}
