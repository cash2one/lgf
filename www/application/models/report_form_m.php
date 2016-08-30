<?php

class report_form_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
//    function changjia_select() {
//        $this->db->select('*');
//        $query = $this->db->get('changjia');
//        return $query->result();
//    }
//
//    function add_to_drugs($arr){
//        $this->db->insert('drugs', $arr);
//    }
    
    function drug_purchase_price_comp($drug_name,$price_min,$price_max){
//        $where = "drug_name = $drug_name AND danjia = $price_min";
//        $this->db->where($where);
        $this->db->where('drug_name',$drug_name);
//        $this->db->where('supplier_name',$supplier_name);
        $this->db->where('danjia >=',$price_min);
        $this->db->where('danjia <=',$price_max);
//        $this->db->limit($page_size,$offset);
        $this->db->select('*');
        $query = $this->db->get('drug_purchase_list');
        return $query->result();
    }


}