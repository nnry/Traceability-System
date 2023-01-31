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
	public function logout()
	{
		$this->template->set_master_template('themes/' . $this->theme . '/tpl_logout.php');
		$this->template->render();
	}


	public function checkUserLogin()
	{
		 $code = $_POST["empcode"];
		 $pass = md5($_POST["emppass"]);
		// $code = $_GET["empcode"];
		// $pass = md5($_GET["emppass"]);
		// $code = "5101716";
		// $code = "admin01";
		$rscheckLogin = $this->backoffice_model->checkLogin($code, $pass);
		if ($rscheckLogin == "true") {
			echo $rscheckLogin;
			$data = $this->backoffice_model->getname($code);
			if ($data == true) {
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
			$ch = curl_init("http://192.168.161.77/api_system/getAccountEx?username=$code");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$output = curl_exec($ch);
			$data = json_decode($output, true);
			//echo $output;
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			$code = $data["0"]["USER_CD"];
			$name = $data["0"]["USER_NAME"];
			$subname = explode(" ", $name);
			$fname = $subname["0"];
			$lname = $subname["1"];
			$email = $data["0"]["ADDRESS"];
			$pass = $data["0"]["PASSWORD"];
			$phase = $data["0"]["PLANT_CD"];
			$group = 3 ;
			$user = "System";
			$conphase = $this->backoffice_model->convert("mpa_id", "mst_plant_admin", "mpa_phase_plant='$phase'");

			if ($code) {
				// echo "true";
				 $rs = $this->backoffice_model->addexpenner($code,$fname,$lname,$email,$pass,$conphase,$group,$user);
				 echo $rs;
			} else {
				// echo "false";
			}
		}
	}
}
