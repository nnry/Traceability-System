<?php
class Backmodel_qgate extends CI_Model
{
    function getplant(){
        $this->EMP = $this->load->database('qgate',true);
    }
    


}
