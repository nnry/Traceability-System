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
            return "true";
        } else {
            return "false";
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

    public function checkUserAdd($empcode){
        $sql = "EXEC [dbo].[CHECK_ADD_USER] @EMP_CODE  = '{$empcode}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if (empty($row)) {
            return "true"; 
        } else {
            return "false";
        }
    }
    //***************************explanner***************************

    public function addexpenner($code,$fname,$lname,$email,$pass,$conphase,$group,$user){
        $sql = "EXEC [dbo].[ADD_EXPLANER] @EMP_CODE ='{$code}',@EMP_FNAMEE='{$fname}',@EMP_LNAMEE ='{$lname}',@EMP_GROUP ='{$group}',@EMP_EMAIL='{$email}',@EMP_PASS='{$pass}',@EMP_PLANT='{$conphase}',@EMP_USER='{$user}'";
        $res = $this->db->query($sql);
		if($res){
			return "true";
		}else{
			return "false";
		}
    }

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
    public function getTableData()
    {
        $sql = "EXEC [dbo].[GET_MANAGE_USER]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function editUser($sa_id){
        $sql = "EXEC [dbo].[GET_EDIT_MANAGE] @EMP_ID ='{$sa_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function getTableGroup(){
        $sql = "EXEC [dbo].[GET_TABLE_GROUP]" ;
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function getTablePlant(){
        $sql = "EXEC [dbo].[GET_TABLE_Plant]" ;
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function editNameGroupPer($spg_id){
        $sql = "EXEC [dbo].[GET_EDIT_NAME_GROUP] @EMP_ID ='{$spg_id}'";
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
    public function convert($attr, $table, $condition){
		$sql ="select $attr from $table where $condition";
		$query = $this->db->query($sql);
		$get = $query->result_array();
		if (empty($get)) {
			return "0";
		} else {
			return $get["0"][$attr];
		}
	}   
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
    public function editStatus($sa_id)
    {
        $sql = "EXEC [dbo].[GET_USER] @EMP_ID ='{$sa_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["sa_status"];
			if ($result == 1) {
				$sql = "EXEC [dbo].[GET_EDIT_STATUS_OFF] @EMP_ID ='{$sa_id}'";
				$res = $this->db->query($sql);
				if($res){
					return true;
				   }else{
					return false; 
				   }
			} elseif ($result == 0) {
				$sql = "EXEC [dbo].[GET_EDIT_STATUS_ON] @EMP_ID ='{$sa_id}'";
				$res = $this->db->query($sql);
				if($res){
					return true;
				   }else{
					return false; 
				   }
			}else{
				return  true;
			}
    }
    public function saveEditmodel($empcode, $groupCon, $editemail,$empcodeUser){
        $sql = "EXEC [dbo].[GET_SAVE_EDIT] @EMP_CODE ='{$empcode}',@EMP_GROUP='{$groupCon}',@EMP_EMAIL='{$editemail}',@EMP_USER='{$empcodeUser}'";
		$res = $this->db->query($sql);
        if($res){
			return "true";
		}else{
			return "false";
		}
    }

    public function swiftStatusGrop($spg_id)   {
        $sql = "EXEC [dbo].[GET_GROUP_STATUS] @EMP_ID ='{$spg_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["spg_status"];
			if ($result == 1) {
				$sql = "EXEC [dbo].[GET_GROUP_STATUS_OFF] @EMP_ID ='{$spg_id}'";
				$res = $this->db->query($sql);
				if($res){
					return true;
				   }else{
					return false; 
				   }
			} elseif ($result == 0) {
				$sql = "EXEC [dbo].[GET_GROUP_STATUS_ON] @EMP_ID ='{$spg_id}'";
				$res = $this->db->query($sql);
				if($res){
					return true;
				   }else{
					return false; 
				   }
			}else{
				return  true;
			}
    }
    public function saveEditNameGroup($idgroup,$name,$empcodeUser){
        $sql = "EXEC [dbo].[GET_SAVE_EDIT_GROUP] @EMP_ID  ='{$idgroup}',@EMP_NAME='{$name}',@EMP_USER='{$empcodeUser}'";
		$res = $this->db->query($sql);
        if($res){
			return "true";
		}else{
			return "false";
		}
    }
// ***********insert***************************************insert***************************insert**************************insert********************** insert*******************************************

public function insertUser($empcode,$firstname,$lastname,$groupCon,$email,$password,$plantCon,$empcodeUser){
        $sql = "EXEC [dbo].[INSERT_USER] @EMP_CODE ='{$empcode}',@EMP_FNAMEE='{$firstname}',@EMP_LNAMEE ='{$lastname}',@EMP_GROUP ='{$groupCon}',@EMP_EMAIL='{$email}',@EMP_PASS='{$password}',@EMP_PLANT='{$plantCon}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
		if($res){
			return "true";
		}else{
			return "false";
		}
}
}
