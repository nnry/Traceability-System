<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
	// session_start();
	// session_destroy();
	// header("location:login.php");

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
		// $this->session->sess_destroy();
		// unset(session_id());
		$this->load->library('session');
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

		$this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
		$this->template->write('page_title', '' . $setTitle . 'TBKK | ');
		// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php');
		$this->template->render();
	}



	// $this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
	// $this->template->render();

	// public function logout()
	// {
	// 	$this->session->unset_userdata('sa_id');
	// 	$this->session->sess_destroy();
	// 	redirect('Account');
	// }

	public function checkUserLogin()
	{
		// session_start();
		$code = $_POST["empcode"];
		$pass = md5($_POST["emppass"]);
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
					'email' => $data['sa_email'],
					'login' => "OK"
				);
				$this->session->set_userdata($session_data);
				$id = $data['sa_id'];

				$cheklog = $this->backoffice_model->checkLog_login($id);
				
				
				$null_log = $cheklog["la_logout"];
				
				if($null_log == null){
					$chmax = $this->backoffice_model->maxlogid($id);
					$loglogin = $this->backoffice_model->insertlogaddupdate($id,$chmax);
					// echo $loglogin;
					
				}else{
					$loglogin = $this->backoffice_model->insertlog($id);
					// echo $loglogin;
				} 
				
			}
		} else {
			// http://192.168.161.102/api_system/getAccountEx?username=5101716
			$ch = curl_init("http://192.168.161.102/api_system/getAccountEx?username=$code");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$output = curl_exec($ch);
			$data = json_decode($output, true);
			$usercode = $data["0"]["USER_CD"];
			$name = $data["0"]["USER_NAME"];
			$subname = explode(" ", $name);
			$fname = $subname["0"];
			$lname = $subname["1"];
			$email = $data["0"]["ADDRESS"];
			$passex = $data["0"]["PASSWORD"];
			$phase = $data["0"]["PLANT_CD"];
			$group = 2;
			$user = $this->session->userdata("empcode");
			$conphase = $this->backoffice_model->convert("mpa_id", "mst_plant_admin", "mpa_phase_plant='$phase'");


			if ($usercode) {
				$excheck = $this->backoffice_model->checkexplainer($usercode);
				if ($excheck == "true") {

					$data = $this->backoffice_model->getname($usercode);
					if ($data == true) {
						$session_data = array(
							'id' => $data['sa_id'],
							'empcode' => $data['sa_code'],
							'fname' => $data['sa_fname'],
							'lname' => $data['sa_lname'],
							'email' => $data['sa_email'],
							'login' => "OK"
						);
						$this->session->set_userdata($session_data);

						$id = $data['sa_id'];

						$loglogin = $this->backoffice_model->insertlog($id);
					}

					if ($pass == $passex) {
						echo "true";
					} else {
						$rsUpdate = $this->backoffice_model->updatepass($passex, $usercode);
						echo $rsUpdate;
					}
				} else {
					$rs = $this->backoffice_model->addexplainer($usercode, $fname, $lname, $email, $passex, $conphase, $group, $user);
					echo $rs;
					$data = $this->backoffice_model->getname($usercode);
					if ($data == true) {
						$session_data = array(
							'id' => $data['sa_id'],
							'empcode' => $data['sa_code'],
							'fname' => $data['sa_fname'],
							'lname' => $data['sa_lname'],
							'email' => $data['sa_email'],
							'login' => "OK"
						);
						$this->session->set_userdata($session_data);
						$id = $data['sa_id'];

						$loglogin = $this->backoffice_model->insertlog($id);
					}
				}
			} else {
				echo "false";
			}
		}
	}
	public function logout()
	{
		$id_log = $_GET["id"];
		
		$chesa_id = $this->backoffice_model->checkLog_login($id_log);
		// echo json_encode($chesa_id);
	

		$data_status = $chesa_id["la_status"];
		$data_id = $chesa_id["la_id"];
		// echo json_encode($data_status);
		// echo json_encode($data_id);
		$chmax = $this->backoffice_model->maxlogid($id_log);
		if ($data_status == "0") {
			$res = $this->backoffice_model->logout($chmax);
			echo $res;
		}

	}
}
