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
	public function getpdf()
	{
	}
	public function searchbypart()
	{
		$delidate = $_POST["delidate"];
		$selectplant = $_POST["selectplant"];
		$selectzone = $_POST["selectzone"];
		$selectstation = $_POST["selectstation"];
		$inputpart = $_POST["inputpart"];

		// echo "delidate==>", $delidate;
		// echo "selectplant==>",$selectplant;
		// echo "selectzone==>",$selectzone;
		// echo "selectstation==>",$selectstation;
		// echo "inputpart==>",$inputpart;
		$res = $this->backmodel_qgate->searchByPathNo($delidate,$selectplant,$selectzone,$selectstation,$inputpart);
		echo $res;


	}
	public function searchByScanTag()
	{
		// $delidate = $_POST["delidate"];
		// $selectplant = $_POST["selectplant"];
		// $selectzone = $_POST["selectzone"];
		// $selectstation = $_POST["selectstation"];
		$inputscantag = $_POST["inputscantag"];

		// echo "delidate => ",$delidate;
		// echo "selectplant => ",$selectplant;
		// echo "selectzone => ",$selectzone;
		// echo "selectstation => ",$selectstation;
		// echo "inputscantag => ",$inputscantag;

		$res = $this->backmodel_qgate->ScanTagQgate($inputscantag);
		if ($res == false) {
			echo "undefined";
		} else {
			$data["tag_id"] = $res[0]["iotc_id"];
			$data["idFa"] = $res[0]["ifts_id"];
			$data["plant"] = $res[0]["mpa_id"];
			$data["zone"] = $res[0]["mza_id"];
			$data["station"] = $res[0]["msa_id"];
			$data["byUser"] = $res[0]["iotc_create_by"];
			$data["line"] = $res[0]["ifts_line_cd"];
			$data["lot"] = $res[0]["ifts_lot_current"];
			$data["snp"] = $res[0]["ifts_snp"];
			$data["part_no"] = $res[0]["ifts_part_no"];
			$data["date"] = $res[0]["date"];

			echo json_encode($data);
		}
	}

	public function searchwashing()
	{

		$inputscantag = $_GET["inputscantag"];
		// echo $inputscantag;
		$res = $this->backmodel_qgate->searchWashing($inputscantag);

		if ($res == false) {
			echo "undefined";
		} else {
			$data["tagScan"] = $res[0]["iotc_tag_qgate"];
			$data["tagId"] = $res[0]["ifts_id"];
			$data["line"] = $res[0]["ifts_line_cd"];
			$data["partNo"] = $res[0]["ifts_part_no"];
			$data["date"] = $res[0]["datewash"];
			$data["byUser"] = $res[0]["iodc_created_by"];

			echo json_encode($data);
		}
	}
	public function searchQgateByScan()
	{

		$inputscantag = $_GET["inputscantag"];
		// echo $inputscantag;
		$res = $this->backmodel_qgate->searchQgate($inputscantag);

		if ($res == false) {
			echo "undefined";
		} else {
			$data["tagScan"] = $res[0]["iotc_tag_qgate"];
			$data["tagId"] = $res[0]["iotc_id"];
			$data["idFa"] = $res[0]["ifts_id"];
			$data["line"] = $res[0]["ifts_line_cd"];
			$data["partNo"] = $res[0]["ifts_part_no"];
			$data["date"] = $res[0]["date"];
			$data["byUserName"] = $res[0]["ss_emp_name"];
			$data["byUserId"] = $res[0]["ss_id"];

			echo json_encode($data);
		}
	}
	public function getWashing()
	{

		$idTagFa = $_GET["idTagFa"];
		$res = $this->backmodel_qgate->searchwashingQgate($idTagFa);

		if ($res == false) {
			echo "undefined";
		} else {
			$data["plantFA"] = $res[0]["ifts_plant"];
			$data["lineFA"] = $res[0]["ifts_line_cd"];
			$data["boxNoFA"] = $res[0]["ifts_box"];
			$data["dateplanFA"] = $res[0]["ifts_plan_date"];
			$data["seqpalnFA"] = $res[0]["ifts_seq_paln"];
			$data["seqActFA"] = $res[0]["ifts_seq_actual"];
			$data["partNoFA"] = $res[0]["ifts_part_no"];
			$data["dateActFA"] = $res[0]["ifts_actual_date"];
			$data["spnFA"] = $res[0]["ifts_snp"];
			$data["lotNoProd"] = $res[0]["ifts_lot_no_prod"];
			$data["empCode"] = $res[0]["ss_emp_code"];
			$data["empName"] = $res[0]["ss_emp_name"];
			$data["codeFAmaster"] = $res[0]["mfcm_line_code"];
			$data["nameFAmaster"] = $res[0]["mfcm_name_code"];
			$data["datecom"] = $res[0]["date"];

			echo json_encode($data);
		}
	}

	public function getQgate()
	{

		$idfa = $_GET["idfa"];
		$res = $this->backmodel_qgate->searchQgatebyFaId($idfa);

		if ($res == false) {
			echo "undefined";
		} else {
			// $data["plantFA"] = $res[0]["ifts_plant"];
			// $data["lineFA"] = $res[0]["ifts_line_cd"];
			// $data["boxNoFA"] = $res[0]["ifts_box"];
			// $data["dateplanFA"] = $res[0]["ifts_plan_date"];
			// $data["seqpalnFA"] = $res[0]["ifts_seq_paln"];
			// $data["seqActFA"] = $res[0]["ifts_seq_actual"];
			// $data["partNoFA"] = $res[0]["ifts_part_no"];
			// $data["dateActFA"] = $res[0]["ifts_actual_date"];
			// $data["spnFA"] = $res[0]["ifts_snp"];
			// $data["lotNoProd"] = $res[0]["ifts_lot_no_prod"];
			// $data["empCode"] = $res[0]["ss_emp_code"];
			// $data["empName"] = $res[0]["ss_emp_name"];
			// $data["codeFAmaster"] = $res[0]["mfcm_line_code"];
			// $data["nameFAmaster"] = $res[0]["mfcm_name_code"];
			// $data["datecom"] = $res[0]["date"];


			echo json_encode($res);
		}
	}
}
