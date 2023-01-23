<?php
class Backoffice_model extends CI_Model
{


	// ***********Check*********select***************Check***************select***************Check************select**********Check***************
	public function checkLogin($code, $pass)
	{
		//"EXEC [dbo].[GET_CHCEKUSERLOGIN] @sa_code = '{$code} AND @sa_password ='{$pass}'";

		$sql = "EXEC [dbo].[GET_CHCEK_USER_LOGIN] @EMP_CODE = '{$code}' , @EMP_PASS ='{$pass}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// return $row;
		if ($row) {
			return true;
		} else {
			return false;
		}
	}

	public function checkForgot($forEmail)
	{
		$sql = "EXEC [dbo].[GET_CHCEK_FORGOT] @EMP_EMAIL  = '{$forEmail}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		if ($row) {
			return true;
		} else {
			return false;
		}
	}
	public function checkUserPermission()
	{
		$sql = "EXEC [dbo].[GET_USER_PREMISSION]";
		$res = $this->db->query($sql);
		$row = $res->result_array();
	}
	//***************************explanner***************************

	// public function checkexpenner($code, $pass){
	// 	$this->EXP = $this->load->database('exp_db',true);
	// 	$checkuser ="SELECT USER_CD FROM USER_MST WHERE USER_CD='{$code}', PASSWORD='{$pass}'";
	// 	$qucheck = $this->EXP->query($checkuser);
	// 	$secheck = $qucheck->result_array();

	// }

	// ******************GET*************select*******************GET**********************select*****************GET********select*******

	public function getname($code)
	{
		$sql = "EXEC [dbo].[GET_USER_NAME] @EMP_CODE  = '{$code}'";
		//$sql = "select * from sys_admin WHERE sa_code ='{$code}'";
		$res = $this->db->query($sql);
		if ($res->num_rows() != 0) {
			$result = $res->result_array();
			return $result[0];
		} else {
			return false;
		}

	}
	public function getTableData(){
		$sql = "EXEC [dbo].[GET_MANAGE_USER]";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}
	//*********show**********innter join***************show***************innter join*****************show***************innter join*******************show*******
	public function showMenu2($empcode)
	{
		$sql = "EXEC [dbo].[GET_MENU_PERMISSION] @EMP_CODE  = '{$empcode}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		return $row;
	}


	//***********************update************update***********************update*********************update***********update
	public function forgotPass($forEmail, $forPass)
	{
		$sql = "EXEC [dbo].[GET_FORGOT_PASSWORD] @EMP_EMAIL  = '{$forEmail}',@EMP_PASS = '{$forPass}'";
		$res = $this->db->query($sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

}
?>
