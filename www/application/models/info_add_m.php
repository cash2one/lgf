<?php

class info_add_m extends CI_Model {

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
    
    function guige_id_latest_as_shangpin_id($shangpin_id) {
        $this->db->like('guige_id',$shangpin_id,'after');
        $this->db->select_max('guige_id');
        $query = $this->db->get('guige');
        return $query->result();
    }
    
    function add_to_guige($arr) {
        $this->db->insert('guige', $arr);
    }
    
    function guige_select() {
        $this->db->select('*');
        $this->db->like('guige_id','000101' , 'after');
        $query = $this->db->get('guige');
        return $query->result();
    }
    
    function jixing_select() {
        $this->db->select('*');
        $query = $this->db->get('jixing');
        return $query->result();
    }
    
    function jixing_id_latest() {
        $this->db->select_max('jixing_id');
        $query = $this->db->get('jixing');
        return $query->result();
    }
    
    function add_to_jixing($arr) {
        $this->db->insert('jixing', $arr);
    }
    
    function med_in_type_select() {
        $this->db->select('*');
        $query = $this->db->get('med_in_type');
        return $query->result();
    }
    
    function changjia_select() {
        $this->db->select('*');
        $query = $this->db->get('changjia');
        return $query->result();
    }
    
    function changjia_id_latest() {
        $this->db->select_max('changjia_id');
        $query = $this->db->get('changjia');
        return $query->result();
    }

    function add_to_changjia($arr){
        $this->db->insert('changjia', $arr);
    }
    
    function drug_id_latest() {
        $this->db->select_max('drug_id');
        $query = $this->db->get('drugs');
        return $query->result();
    }
    
    function shangpin_id_latest_as_class_id($class_id) {
        $this->db->like('shangpin_id',$class_id,'after');
        $this->db->select_max('shangpin_id');
        $query = $this->db->get('shangpin_info');
        return $query->result();
    }
    
    function add_to_shangpin_info($arr) {
        $this->db->insert('shangpin_info', $arr);
    }
    
    function add_to_drugs($arr){
        $this->db->insert('drugs', $arr);
    }
    
    function supplier_id_latest() {
        $this->db->select_max('supplier_id');
        $query = $this->db->get('supplier');
        return $query->result();
    }

    function add_to_supplier($arr){
        $this->db->insert('supplier', $arr);
    }

}