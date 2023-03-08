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
		// session_start();
		## asset config

		$theme = $this->config->item('theme');
		$this->theme = $theme;
		$this->load->library('session');
		$this->load->config('config', TRUE);



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





	// $this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
	// $this->template->render();

	// public function logout()
	// {
	// 	$this->session->unset_userdata('sa_id');
	// 	$this->session->sess_destroy();
	// 	redirect('Account');
	// }

	public function Account()
	{
		// session_start();
		$session = $this->session->userdata('id');
		if ($session == "") {
			// echo "ไม่มีจ้าาาาาาาาาา ไอ่หน้าโง่";
			// $setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

			$this->template->set_master_template('themes/' . $this->theme . '/tpl_login.php');
			// $this->template->write('page_title', '' . $setTitle . 'TBKK | ');
			// $this->template->write_view('page_content', 'themes/'. $this->theme .'/view_login.php');
			$this->template->render();
		} else {
			// echo "มีจ้าาาาาาาาาา";
			// echo $session;
			$empcode = $this->session->userdata("empcode");
			$data = $this->backoffice_model->getname($empcode);
			$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
			$data["user"] = $data["sa_code"];
			$data["id"] = $data["sa_id"];
			// $data["menu"] = $this->backoffice_model->showMenu2($data["user"]);
			$setTitle = "Traceability | Homepage";


			$this->template->write('page_title', $setTitle . ' ');
			$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
			$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
			$this->template->write_view('page_content', 'themes/' . $this->theme . '/view_homepage.php');
			$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');
			$this->template->render();
		}

	}
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

				$session_data1 = array(
					'id' => $data['sa_id'],
					'empcode' => $data['sa_code'],
					'fname' => $data['sa_fname'],
					'lname' => $data['sa_lname'],
					'email' => $data['sa_email'],
					'phase' => $data['mpa_name'],

					'login' => "OK"
				);
				$this->session->set_userdata($session_data1);
				$id = $data['sa_id'];

				$cheklog = $this->backoffice_model->checkLog_login($id);

				if ($cheklog == false) {
					$loglogin = $this->backoffice_model->insertlog($id);
				} else {
					$null_log = $cheklog["la_logout"];

					if ($null_log == null) {
						$chmax = $this->backoffice_model->maxlogid($id);
						$loglogin = $this->backoffice_model->insertlogaddupdate($id, $chmax);
						// echo $loglogin;

					} else {
						$loglogin = $this->backoffice_model->insertlog($id);
						// echo $loglogin;
					}
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
				if ($excheck == "false") {
					$rss = $this->backoffice_model->checkpassword($pass);
					echo $rss;
					if ($pass == $rss) {
						echo "true";
						$data = $this->backoffice_model->getname($usercode);
						if ($data == true) {
							$session_data1 = array(
								'id' => $data['sa_id'],
								'empcode' => $data['sa_code'],
								'fname' => $data['sa_fname'],
								'lname' => $data['sa_lname'],
								'email' => $data['sa_email'],
								'phase' => $data['mpa_name'],
								'login' => "OK"
							);
							$this->session->set_userdata($session_data1);

							$id = $data['sa_id'];

							$cheklog = $this->backoffice_model->checkLog_login($id);

							if ($cheklog == false) {
								$loglogin = $this->backoffice_model->insertlog($id);
							} else {
								$null_log = $cheklog["la_logout"];

								if ($null_log == null) {
									$chmax = $this->backoffice_model->maxlogid($id);
									$loglogin = $this->backoffice_model->insertlogaddupdate($id, $chmax);
									// echo $loglogin;

								} else {
									$loglogin = $this->backoffice_model->insertlog($id);
									// echo $loglogin;
								}
							}
						}
					} else {
						if ($pass == $passex) {
							$rsUpdate = $this->backoffice_model->updatepass($passex, $usercode);
							echo $rsUpdate;
							$data = $this->backoffice_model->getname($usercode);
							if ($data == true) {
								$session_data1 = array(
									'id' => $data['sa_id'],
									'empcode' => $data['sa_code'],
									'fname' => $data['sa_fname'],
									'lname' => $data['sa_lname'],
									'email' => $data['sa_email'],
									'phase' => $data['mpa_name'],
									'login' => "OK"
								);
								$this->session->set_userdata($session_data1);

								$id = $data['sa_id'];

								$cheklog = $this->backoffice_model->checkLog_login($id);

								if ($cheklog == false) {
									$loglogin = $this->backoffice_model->insertlog($id);
								} else {
									$null_log = $cheklog["la_logout"];

									if ($null_log == null) {
										$chmax = $this->backoffice_model->maxlogid($id);
										$loglogin = $this->backoffice_model->insertlogaddupdate($id, $chmax);
										// echo $loglogin;

									} else {
										$loglogin = $this->backoffice_model->insertlog($id);
										// echo $loglogin;
									}
								}
							}
						} else {
							// echo $pass ,"==", $passex;
							echo "passfail";
						}
					}
				} else {
					$checkuser = $this->backoffice_model->checkUserAdd($usercode);
					if ($checkuser == "true") {
						if ($passex == $pass) {
							$rs = $this->backoffice_model->addexplainer($usercode, $fname, $lname, $email, $passex, $conphase, $group, $usercode);
							echo $rs;
							$data = $this->backoffice_model->getname($usercode);
							if ($data == true) {
								$session_data1 = array(
									'id' => $data['sa_id'],
									'empcode' => $data['sa_code'],
									'fname' => $data['sa_fname'],
									'lname' => $data['sa_lname'],
									'email' => $data['sa_email'],
									'phase' => $data['mpa_name'],
									'login' => "OK"
								);
								$this->session->set_userdata($session_data1);
								$id = $data['sa_id'];

								$cheklog = $this->backoffice_model->checkLog_login($id);

								if ($cheklog == false) {
									$loglogin = $this->backoffice_model->insertlog($id);
								} else {
									$null_log = $cheklog["la_logout"];

									if ($null_log == null) {
										$chmax = $this->backoffice_model->maxlogid($id);
										$loglogin = $this->backoffice_model->insertlogaddupdate($id, $chmax);
										// echo $loglogin;

									} else {
										$loglogin = $this->backoffice_model->insertlog($id);
										// echo $loglogin;
									}
								}
							}
						} else {
							echo "passfail";
						}
					} else {
						echo "duplicate";
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
		// $data_id = $chesa_id["la_id"];
		// echo json_encode($data_status);
		// echo json_encode($data_id);
		$chmax = $this->backoffice_model->maxlogid($id_log);
		if ($data_status == "0") {
			$res = $this->backoffice_model->logout($chmax);
			echo $res;
			session_destroy();
		}
	}
	// public function tt()
	// {
	// 	$code ='admin01';
	// 	$data = $this->backoffice_model->getname($code);
	// 	echo json_encode($data);
	// }
	
}
