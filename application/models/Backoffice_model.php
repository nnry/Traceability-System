<?php
class Backoffice_model extends CI_Model {


	// ***********************************  Check *************************************************
	public function checkLogin($code,$pass){
		//"EXEC [dbo].[GET_CHCEKUSERLOGIN] @sa_code = '{$code} AND @sa_password ='{$pass}'";

		$sql = "EXEC [dbo].[GET_CHCEK_USER_LOGIN] @EMP_CODE = '{$code}' , @EMP_PASS ='{$pass}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// return $row;
		if($row){
			return true;
		}else{
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
	public function forgotPass($forEmail,$forPass){
		$sql ="EXEC [dbo].[GET_FORGOT_PASSWORD] @EMP_EMAIL  = '{$forEmail}',@EMP_PASS = '{$forPass}'";
		$res = $this->db->query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	

}
?>
