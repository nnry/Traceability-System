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
    public function checkpass($empcode, $oldpass)
    {
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
    public function checkMenu($menu)
    {
        $sql = "EXEC [dbo].[GET_CHECK_MENU] @MN_NAME= '{$menu}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if ($row) {
            return "true"; // มี
        } else {
            return "false"; //ไม่มี
        }
    }
    public function checkSubmenu($menu)
    {
        $sql = "EXEC [dbo].[GET_CHECK_SUBMENU] @MN_NAME= '{$menu}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        if (empty($row)) {
            return "true"; //ไม่มี แอดได้
        } else {
            return "false"; //ซ้ำ
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
    public function getEditMenu($ss_id)
    {
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

    public function detailGroup($id)
    {
        $sql = "EXEC [dbo].[GET_PER_MENU] @GROP_ID ='{$id}'";
        // $sql = "EXEC [dbo].[GET_PER_MENU_TWO] @GROP_ID ='{$id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }

    public function tableMenu()
    {
        $sql = "EXEC [dbo].[GET_TABLE_MENU]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }

    public function tableIcon()
    {
        $sql = "EXEC [dbo].[GET_TABLE_MENU]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function tableMainMenu()
    {
        $sql = "EXEC [dbo].[GET_MENU_MAIN]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function tableMainSubMenu()
    {
        $sql = "EXEC [dbo].[GET_SUBMENU_MAIN]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }

    public function loadMaingroup($id)
    {
        $sql = "select DISTINCT spd.sm_id from sys_permission_detail as spd left JOIN  sys_menu as sm on  sm.sm_id != spd.sm_id 
        where  spd.spg_id = '{$id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function Mainmenu($spg_id){
        $sql = " SELECT
            * 
        FROM
            sys_permission_detail 
        WHERE
            spg_id = '{$spg_id}' 
        ";
    $res = $this->db->query($sql);
    $id= "";
    $i = 0;
    foreach ($row = $res->result_array() as $value) {
        $id.=$value["ss_id"];
        if($i < count($row)-1){
            $id .= ",";
        }
        $i++;
    }
    if($id == ""){
        $id = 0;
    }
         $sql = "SELECT
            sys_menu.sm_id ,
            sys_menu.sm_name  
        FROM
            sys_submenu INNER JOIN sys_menu on sys_submenu.sm_id = sys_menu.sm_id
        WHERE
        ss_id NOT IN({$id})
    GROUP BY
    sys_menu.sm_id,
    sys_menu.sm_name";
    $res = $this->db->query($sql);
    $rowLoad = $res->result_array();
    return $rowLoad;
    }
public function loadDataAdd($id){
       $sql = " SELECT
            * 
        FROM
            sys_permission_detail 
        WHERE
            spg_id = '{$id}' 
        ";
    $res = $this->db->query($sql);
    $id= "";
    $i = 0;
    foreach ($row = $res->result_array() as $value) {
        $id.=$value["ss_id"];
        if($i < count($row)-1){
            $id .= ",";
        }
        $i++;
    }
    if($id == ""){
        $id = 0;
    }
    $sqlLoad = "SELECT
                * 
            FROM
            sys_submenu INNER JOIN sys_menu on sys_submenu.sm_id = sys_menu.sm_id
            WHERE
            ss_id NOT IN({$id})"; 
     $resLoad = $this->db->query($sqlLoad);
     $rowLoad = $resLoad->result_array();
     return $rowLoad;
}

    //*********show**********innter join***************show***************innter join*****************show***************innter join*******************show*******
    public function showMenu2($empcode)
    {
        $sql = "EXEC [dbo].[GET_MENU_PERMISSION] @EMP_CODE  = '{$empcode}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function ShowMenu()
    {

        $para = $this->session->userdata('id');

        $get_url = trim($this->router->fetch_class() . '/' . $this->router->fetch_method());
        $sqlChkGrp = "SELECT spg_id FROM sys_admin WHERE sa_id = '{$para}';";
        $excChkGrp = $this->db->query($sqlChkGrp);
        $recChkGrp = $excChkGrp->result_array();
        $Grp = implode($recChkGrp[0]);

        $sqlGroupMenu = "EXEC [dbo].[GET_MENU_PER] @SSM_GROUP  = '{$Grp}'";
        // var_dump($sqlGroupMenu);
        // exit;

        $excGroupMenu = $this->db->query($sqlGroupMenu);
        // var_dump($excGroupMenu);
        // exit;

        $result = array();
        foreach ($excGroupMenu->result_array() as $gm) {

            $sqlSubMenu = "EXEC [dbo].[GET_SUBMENU_PER] @SSM_GROUP  = '{$Grp}',@ANS ='{$gm["sm_id"]}'";

            $excSubMenu = $this->db->query($sqlSubMenu);

            $subMenu = array();
            foreach ($excSubMenu->result_array() as $sm) {
                // var_dump($sm);
                array_push($subMenu, array('name' => $sm['ss_name'], 'method' => $sm['ss_method']));
            }

            array_push($result, array('g_name' => $gm['sm_name'], 'icon_menu' => $gm['sm_icon'], 'sub_menu' => $subMenu));
        }

        return $result;
        //    var_dump($para);
        // exit;
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
    public function swiftStatusDetail($spd_id)
    {
        $sql = "EXEC [dbo].[GET_DETAIL_GROUP_STATUS] @EMP_ID ='{$spd_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $result = $row[0]["spd_status"];
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
    public function saveEditProfile($fname, $lname, $email, $plant, $empcodeUser)
    {
        $sql = "EXEC [dbo].[GET_EDIT_PROFILE] @EMP_FNAME  ='{$fname}', @EMP_LNAME ='{$lname}',@EMP_EMAIL='{$email}',@EMP_PLANT='{$plant}',@EMP_USER='{$empcodeUser}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function upChangePass($newpass, $empcode)
    {
        $sql = "EXEC [dbo].[UP_DATE_CHANGE_PASS] @EMP_NEWPASS ='{$newpass}', @EMP_ID='{$empcode}'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }

    public function saveEditTableMenu($menu, $sub, $path, $idsub, $empcodeUser)
    {
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
    public function insertSubMenu($consm_id,$submenu,$path,$icons,$empcodeUser,$addorder)
    {
        $sql = "EXEC [dbo].[INSERT_SUBMENU] @SSM_ID = '{$consm_id}',@MN_SUBMENU ='{$submenu}',@MN_PATH = '{$path}',@EMP_USER ='{$empcodeUser}',@MN_ICON='{$icons}',@MN_ORDER='$addorder'";
        $res = $this->db->query($sql);
        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }
    public function insertMenu($menu,$icons,$empcodeUser,$addorder)
    {
        $sql = "EXEC [dbo].[INSERT_MENU_MM] @SM_NAME = '{$menu}',@EMP_USER ='{$empcodeUser}',@MN_ICON='{$icons}',@MN_ORDER='$addorder'";
        $res = $this->db->query($sql);

        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }

    public function regis($id,$menu,$sub,$empcode){
        
        $sql = "EXEC [dbo].[INSERT_MENU_MM] @SM_NAME = '{$menu}',@EMP_USER ='{$empcodeUser}',@MN_ICON='{$icons}',@MN_ORDER='$addorder'";
        $res = $this->db->query($sql);

        if ($res) {
            return "true";
        } else {
            return "false";
        }
    }

    ////////////////////////////////////////////////  MAX //////////////////////////////////////////////////////////
    public function maxOrder($consm_id){
        $sql = "EXEC [dbo].[MAX_ORDER_NO] @SM_ID = '{$consm_id}'";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $ss = $row["0"]["re_max"];
        return $ss;
      

        
    }
    public function maxOrderMenu(){
        $sql = "EXEC [dbo].[MAX_ORDER_NO_MENU]";
        $res = $this->db->query($sql);
        $row = $res->result_array();
        $ss = $row["0"]["re_max"];
        return $ss;
      

    }
}
