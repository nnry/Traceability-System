<?php
class Backoffice_model extends CI_Model {

	public function getUser()
	{
		$sql = "select * from sys_admin";
	 	$res = $this->db->query($sql);
		$row = $res->result_array();														
		return $row;
	}

	public function checkLogin($code,$pass){
		$sql = "select * from sys_admin where sa_code = '{$code}'and sa_password ='{$pass}'";
		$res = $this->db->query($sql);
		$row = $res->result_array();
		// return $row;
		if($row){
			return true;
		}else{
			return false;
		}
	}
	public function checkStatus(){

	}
	

}
?>
