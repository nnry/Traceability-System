<?php
class Backmodel_qgate extends CI_Model
{
    public function getplant(){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_PHASE]";
        $res = $this->EXP->query($sql);
        $row = $res->result_array();
        return $row;

    }

    public function getzoneby_id($idplant){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_ZONE_BY_ID] @PHASE_ID ='{$idplant}'";
        $res = $this->EXP->query($sql);
        $row = $res->result_array();
        return $row;

    }
    public function getzoneall(){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_ZONE_ALL]";
        $res = $this->EXP->query($sql);
        $row = $res->result_array();
        return $row;

    }
    public function getstationby_id($idstaion){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_ZONE_BY_ID] @PHASE_ID ='{$idstaion}'";
        $res = $this->EXP->query($sql);
        $row = $res->result_array();
        return $row;

    }

    public function getloadstation(){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_STATION_LOAD]";
        $res = $this->EXP->query($sql);
        $row = $res->result_array();
        return $row;
    }
    public function ScanTagQgate($inputscantag){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_SEARCH_MACHINE] @TAG_QGATE = '{$inputscantag}'";
        $res = $this->EXP->query($sql);
        // $row = $res->result_array();
        if ($res->num_rows() != 0) {
            $result = $res->result_array();
            return $result;;
        } else {
            return false;
        }
       

    }

    public function searchWashing($inputscantag){
        $this->EXP = $this->load->database('qgate',true);
        $sql = "EXEC [dbo].[API_SEARCH_WASHING] @TAG_QGATE = '{$inputscantag}'";
        $res = $this->EXP->query($sql);
        // $row = $res->result_array();
        if ($res->num_rows() != 0) {
            $result = $res->result_array();
            return $result;;
        } else {
            return false;
        }
    }
    


}
