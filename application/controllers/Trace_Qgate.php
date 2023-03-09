<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trace_Qgate extends CI_Controller
{

	private $theme;

	public function __construct()
	{

		// $this->EXP = $this->load->database('qgate',true);
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->load->config('config', TRUE);
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
		// $this->backoffice_model->CheckSession();

	}

	public function index()
	{

		$this->backoffice_model->CheckSession();
		redirect('manage');
	}
	public function qgate()
	{

		// $ch = curl_init("http://192.168.161.102/api_system/getAccountEx?username=$code");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// $output = curl_exec($ch);
		// $data = json_decode($output, true);
		// $usercode = $data["0"]["USER_CD"];
		// $name = $data["0"]["USER_NAME"];
		// $subname = explode(" ", $name);
		// $fname = $subname["0"];
		// $lname = $subname["1"];
		// $email = $data["0"]["ADDRESS"];
		// $passex = $data["0"]["PASSWORD"];
		// $phase = $data["0"]["PLANT_CD"];
		// $group = 3;
		// $user = "System";
		$empcode = $this->session->userdata("empcode");
		$data = $this->backoffice_model->getname($empcode);
		$data["fullname"] = $data["sa_fname"] . " " . $data["sa_lname"];
		$data["user"] = $data["sa_code"];
		$data["id"] = $data["sa_id"];

		$data["plantqgate"] = $this->backmodel_qgate->getplant();


		// $data["menu"] = $this->backoffice_model->showMenu2($data["user"]);

		$setTitle = "Traceability | Traceability Flow";
		$this->template->write('page_title', $setTitle . ' ');
		$this->template->write_view('page_menu', 'themes/' . $this->theme . '/first_set/view_menu.php', $data);
		$this->template->write_view('page_header', 'themes/' . $this->theme . '/first_set/view_header.php', $data);
		$this->template->write_view('page_content', 'themes/' . $this->theme . '/set_traceability/view_flowqgate.php', $data);
		$this->template->write_view('page_footer', 'themes/' . $this->theme . '/first_set/view_footer.php');
		$this->template->render();
	}

	public function getzonebyid()
	{
		$idplant = $_GET["para"];
		$res["byid"] = $this->backmodel_qgate->getzoneby_id($idplant);
		$res["zoneall"] = $this->backmodel_qgate->getzoneall();
		echo json_encode($res);
	}
	public function getstationload()
	{
		$idstaion = $_GET["zone"];
		$idphase = $_GET["para"];
		$res["byid"] = $this->backmodel_qgate->getstationby_id($idstaion,$idphase);
		$res["all"] = $this->backmodel_qgate->getloadstation();
		echo json_encode($res);
	}

	public function checkShippingByScanTag(){

		$inputscantag = $_GET["inputscantag"];
		// $inputscantag="GBK1M11820221116002898351-8020              20221115    15BK15                         2022111500251002";
		// echo "id   ",$inputscantag;
		$checkTag = curl_init("http://192.168.161.77/Api_Traceability/Api_Get_Data/get_shift_by_qrCode?READ_QR=$inputscantag");
		// echo "   ===>>>text    ",$checkTag;
		curl_setopt($checkTag, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($checkTag);
		$data = json_decode($output, true);

		// print_r($data);
		echo json_encode($data);
		// if($checkTag == "NO DATA"){
		// 	echo "undefined";
		// }else{

		// }

		
	}


	public function inputSlip_CDShipping(){
		$slip = $_GET["inputslip"];
		// $slip="50SLD0000531113";
		// echo $slip;

		$ch =curl_init("http://192.168.161.77/Api_Traceability/Api_Get_Data/get_shift_by_slip_cd?SLIP_CD=$slip");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		$data = json_decode($output, true);

		if($data == null){

			echo "NO DATA";

		}else{

			echo json_encode($data);

		}

	}
	public function inputDeliDateShipping(){
		$deliDate = $_GET["delidate"];
		$dataDate = date_create($deliDate);
		$date = date_format($dataDate,"Y/m/d");

		$ch =curl_init("http://192.168.161.77/Api_Traceability/Api_Get_Data/get_shift_by_dev_date?dlv_date=$date");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		$data = json_decode($output, true);

		if($data == null){

			echo "NO DATA";

		}else{

			echo json_encode($data);

		}

	}

}
