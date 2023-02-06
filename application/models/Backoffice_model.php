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

    public function checkUserAdd($empcode)
    {
        $sql = "EXEC [dbo].[CHECK_ADD_USER] @EMP_CODE  = '{$empcode}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if (empty($row)) {
            return "true";
        } else {
            return "false";
        }
    }
    public function checkpass($empcode,$oldpass){
        $sql = "EXEC [dbo].[CHECK_PASSWORD] @EMP_CODE  ='{$empcode}', @EMP_OLD_PASS ='{$oldpass}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if ($row) {
            return "true";
        } else {
            return "false";
        }
    }
    public function checkPerAdd($name)
    {
        $sql = "EXEC [dbo].[CHECK_ADD_PER] @PER_NAME= '{$name}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if (empty($row)) {
            return "true";
        } else {
            return "false";
        }
    }
    //***************************explanner***************************

    public function checkexplainer($usercode)
    {
        $sql = "EXEC [dbo].[GET_CHCEK_EXPLANER] @EMP_CODE  = '{$usercode}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if ($row) {
            return "true";
        } else {
            return "false";
        }
    }
    public function addexplainer($code, $fname, $lname, $email, $pass, $conphase, $group, $user)
    {
        $sql = "EXEC [dbo].[ADD_EXPLAINER] @EMP_CODE ='{$code}',@EMP_FNAMEE='{$fname}',@EMP_LNAMEE ='{$lname}',@EMP_GROUP ='{$group}',@EMP_EMAIL='{$email}',@EMP_PASS='{$pass}',@EMP_PLANT='{$conphase}',@EMP_USER='{$user}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function updatepass($passex, $usercode)
    {
        $sql = "EXEC [dbo].[UP_DATE_EXPLAINER] @EMP_PASS  ='{$passex}',@EMP_CODE='{$usercode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
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
    public function editUser($sa_id)
    {
        $sql = "EXEC [dbo].[GET_EDIT_MANAGE] @EMP_ID ='{$sa_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function getEditMenu($ss_id){
        $sql = "EXEC [dbo].[GET_EDIT_MANU] @EMP_ID ='{$ss_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;

    }
    public function getTableGroup()
    {
        $sql = "EXEC [dbo].[GET_TABLE_GROUP]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function getTablePlant()
    {
        $sql = "EXEC [dbo].[GET_TABLE_PLANT]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function editNameGroupPer($spg_id)
    {
        $sql = "EXEC [dbo].[GET_EDIT_NAME_GROUP] @EMP_ID ='{$spg_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function TableDetailGroup()
    {
        $sql = "EXEC [dbo].[GET_TABLE_PER_MENU]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }

    public function detailGroup($id){
        $sql = "EXEC [dbo].[GET_PER_MENU] @GROP_ID ='{$id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }

    public function tableMenu(){
        $sql = "EXEC [dbo].[GET_TABLE_MENU]";
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
    public function convert($attr, $table, $condition)
    {
        $sql = "select $attr from $table where $condition";
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
            if ($res) {
                return true;
            } else {
                return false;
            }
        } elseif ($result == 0) {
            $sql = "EXEC [dbo].[GET_EDIT_STATUS_ON] @EMP_ID ='{$sa_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {
            return  true;
        }
    }
    public function saveEditmodel($empcode, $groupCon, $editemail, $empcodeUser)
    {
        $sql = "EXEC [dbo].[GET_SAVE_EDIT] @EMP_CODE ='{$empcode}',@EMP_GROUP='{$groupCon}',@EMP_EMAIL='{$editemail}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }

    public function swiftStatusGrop($spg_id)
    {
        $sql = "EXEC [dbo].[GET_GROUP_STATUS] @EMP_ID ='{$spg_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["spg_status"];
        if ($result == 1) {
            $sql = "EXEC [dbo].[GET_GROUP_STATUS_OFF] @EMP_ID ='{$spg_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } elseif ($result == 0) {
            $sql = "EXEC [dbo].[GET_GROUP_STATUS_ON] @EMP_ID ='{$spg_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {
            return  true;
        }
    }
    public function swiftStatusDetail($spd_id){
        $sql = "EXEC [dbo].[GET_DETAIL_GROUP_STATUS] @EMP_ID ='{$spd_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["ss_status"];
        // return $result;
        if ($result == 1) {
            $sql = "EXEC [dbo].[GET_DETAIL_STATUS_OFF] @EMP_ID ='{$spd_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return "0"; /// ปิด
            } else {
                return false;
            }
        
        } elseif ($result == 0) {
            $sql = "EXEC [dbo].[GET_DETAIL_STATUS_ON] @EMP_ID ='{$spd_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return "1"; //เปิด
            } else {
                return false;
            }
        } else {
            return  $res;
        }

    }
    public function saveEditNameGroup($id, $name, $empcode)
    {
        $sql = "EXEC [dbo].[GET_SAVE_EDIT_GROUP] @EMP_ID  ='{$id}',@EMP_NAME='{$name}',@EMP_USER='{$empcode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function saveEditProfile($fname, $lname, $email, $plant,$empcodeUser){
        $sql = "EXEC [dbo].[GET_EDIT_PROFILE] @EMP_FNAME  ='{$fname}', @EMP_LNAME ='{$lname}',@EMP_EMAIL='{$email}',@EMP_PLANT='{$plant}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function upChangePass($newpass,$empcode){
        $sql = "EXEC [dbo].[UP_DATE_CHANGE_PASS] @EMP_NEWPASS ='{$newpass}', @EMP_ID='{$empcode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }

    public function saveEditTableMenu($menu,$sub,$path,$idsub,$empcodeUser){
        $sql = "EXEC [dbo].[GET_SAVE_EDIT_MENU] @MN_ID  ='{$idsub}',@MN_MENU ='{$menu}',@MN_SUBMENU='{$sub}',@MN_PATH='{$path}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }

    }
    public function swiftStatusMenu($ss_id)
    {
        $sql = "EXEC [dbo].[GET_STATUS_MENU] @EMP_ID ='{$ss_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["ss_status"];
        if ($result == 1) {
            $sql = "EXEC [dbo].[GET_STATUS_MENU_OFF] @EMP_ID ='{$ss_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } elseif ($result == 0) {
            $sql = "EXEC [dbo].[GET_STATUS_MENU_ON] @EMP_ID ='{$ss_id}'";
            $res = $this->db->query($sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        } else {
            return  true;
        }
    }
    // ***********insert***************************************insert***************************insert**************************insert********************** insert*******************************************

    public function insertUser($empcode, $firstname, $lastname, $groupCon, $email, $password, $plantCon, $empcodeUser)
    {
        $sql = "EXEC [dbo].[INSERT_USER] @EMP_CODE ='{$empcode}',@EMP_FNAMEE='{$firstname}',@EMP_LNAMEE ='{$lastname}',@EMP_GROUP ='{$groupCon}',@EMP_EMAIL='{$email}',@EMP_PASS='{$password}',@EMP_PLANT='{$plantCon}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function insertPermissionGroup($name, $empcode)
    {
        $sql = "EXEC [dbo].[INSERT_PER_GROUP] @EMP_NAMEGROUP ='{$name}', @EMP_USER='{$empcode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function insertMenu($menu,$submenu,$path,$icons,$empcodeUser){
        $sql = "EXEC [dbo].[INSERT_MENU] @EMP_NAMEGROUP ='{$name}', @EMP_USER='{$empcode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    
}
