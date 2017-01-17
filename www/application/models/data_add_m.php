<?php

class data_add_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function patients_info_insert($arr) {
        $this->db->insert_batch('patients_ic', $arr);
    }
    
    function patients_info_select() {
        $this->db->select('*');
//        $this->db->like('shangpin_id','0001' , 'after');
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function ruyuan_info_insert($arr){
        $this->db->insert_batch('ruyuan_ic', $arr);
    }
            
    function zhuyuan_shouru_every_insert($arr) {
        $this->db->insert_batch('zhuyuan_shouru_every', $arr);
    }
    
    function zhuyuan_shouru_every_select($date){
        $this->db->select('*');
        $this->db->where('riqi',$date);
        $query = $this->db->get('zhuyuan_shouru_every');
        return $query->result();
    }
    
    function menzhen_shouru_every_insert($arr) {
        $this->db->insert_batch('menzhen_shouru_every', $arr);
    }
    
    function menzhen_shouru_every_select($date){
        $this->db->select('*');
        $this->db->where('riqi',$date);
        $query = $this->db->get('menzhen_shouru_every');
        return $query->result();
    }
    


}