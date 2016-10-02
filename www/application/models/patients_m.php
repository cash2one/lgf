<?php

class patients_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function registered_type_select($registered_type,$month) {
//        $this->db->select_sum('*');
//        $query = $this->db->count_all_results('patients');
        $this->db->where('registered_type',$registered_type);
        $this->db->where("month(year)",$month);
        $query=$this->db->count_all_results('patients');
        return $query;
    }
    
    function source_select($source,$month) {
//        $this->db->select_sum('*');
//        $query = $this->db->count_all_results('patients');
        $this->db->where('source',$source);
        $this->db->where("month(year)",$month);
        $query=$this->db->count_all_results('patients');
        return $query;
    }
    
    function office_select($office,$month) {
//        $this->db->select_sum('*');
//        $query = $this->db->count_all_results('patients');
        $this->db->where('office',$office);
        $this->db->where("month(year)",$month);
        $query=$this->db->count_all_results('patients');
        return $query;
    }
    
    function zhuyuan_shouru_every_select($riqi){
        $this->db->select('*');
        $this->db->where('riqi',$riqi);
        $query = $this->db->get('zhuyuan_shouru_every');
        return $query->result();
    }
    
    function menzhen_shouru_every_select($riqi){
        $this->db->select('*');
        $this->db->where('riqi',$riqi);
        $query = $this->db->get('menzhen_shouru_every');
        return $query->result();
    }
    
    function patients_select($date){
        $this->db->select('*');
        $this->db->where('riqi',$date);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_keshi($date,$keshi,$chufuzhen){
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('chufuzhen',$chufuzhen);
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
}