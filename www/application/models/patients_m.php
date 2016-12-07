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
    
    function menzhen_shouru_every_select($date){
        $this->db->select('*');
        $this->db->where('riqi',$date);
        $query = $this->db->get('menzhen_shouru_every');
        return $query->result();
    }
    
    function menzhen_shouru_every_select_sum($date){
        $this->db->select('*');
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
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
    
    function patients_select_keshi_sum($date,$keshi,$chufuzhen){
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('chufuzhen',$chufuzhen);
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_liushi($date,$keshi){
        $liushi=array('初诊流失','复诊流失');
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where_in('liushi',$liushi);
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_liushi_sum($date,$keshi){
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $liushi=array('初诊流失','复诊流失');
        $this->db->where('keshi',$keshi);
        $this->db->where_in('liushi',$liushi);
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_zhiliaofei($date,$keshi){
        $this->db->select('zhiliaofei');
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_zhiliaofei_sum($date,$keshi){
        $this->db->select_sum('zhiliaofei');
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_shoushufei($date,$keshi){
        $this->db->select('shoushufei');
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_shoushufei_sum($date,$keshi){
        $this->db->select('shoushufei');
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_menzhenxiaofei($date,$keshi){
        $this->db->select('menzhenxiaofei');
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_menzhenxiaofei_sum($date,$keshi){
        $this->db->select('menzhenxiaofei');
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $query = $this->db->get('patients_ic');
        return $query->result();
    }
    
    function patients_select_zhiliao($date,$keshi){
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('zhiliao','是');
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_zhiliao_sum($date,$keshi){
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('zhiliao','是');
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_shoushu($date,$keshi){
        $this->db->where('riqi',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('shoushu','是');
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
    
    function patients_select_shoushu_sum($date,$keshi){
        $first_day=substr($date, 0, 7).'-01';
        $this->db->where('riqi >=',$first_day);
        $this->db->where('riqi <=',$date);
        $this->db->where('keshi',$keshi);
        $this->db->where('shoushu','是');
        $query=$this->db->count_all_results('patients_ic');
        return $query;
    }
}