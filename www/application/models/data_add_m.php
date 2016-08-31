<?php

class data_add_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function class_info_select() {
        $this->db->select('*');
        $query = $this->db->get('class_info');
        return $query->result();
    }
    
    function shangpin_info_select() {
        $this->db->select('*');
        $this->db->like('shangpin_id','0001' , 'after');
        $query = $this->db->get('shangpin_info');
        return $query->result();
    }
    
    function shangpin_info_select_by_id($class_id) {
        $this->db->select('*');
        $this->db->like('shangpin_id',$class_id , 'after');
        $query = $this->db->get('shangpin_info');
        return $query->result();
    }
    
    function guige_select_by_id($shangpin_id) {
        $this->db->select('*');
        $this->db->like('guige_id',$shangpin_id , 'after');
        $query = $this->db->get('guige');
        return $query->result();
    }
    
    

}