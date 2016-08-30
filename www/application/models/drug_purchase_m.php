<?php

class drug_purchase_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function add_to_drug_purchase_list($arr) {
        $this->db->insert_batch('drug_purchase_list', $arr);
    }
    
    function add_to_drug_purchase($arr) {
        $this->db->insert('drug_purchase', $arr);
    }

    function user_update($userid, $arr) {
        $this->db->where('UserId', $userid);
        $this->db->update('users', $arr);
    }

    function user_delete($id) {
        $this->db->where('Id', $id);
        $this->db->delete('users');
    }

    function price_packing_select() {
        $this->db->select('*');
        $query = $this->db->get('price_packing');
        return $query->result();
    }
    
    function class_info_select() {
        $this->db->select('*');
        $query = $this->db->get('price_packing');
        return $query->result();
    }

    function supplier_select() {
        $this->db->select('*');
        $query = $this->db->get('supplier');
        return $query->result();
    }

    function drug_auto_select($drug_name) {
        $this->db->like('drug_name', $drug_name);
        $this->db->select('*');
        $this->db->limit(10,0);
        $query = $this->db->get('drugs');
        return $query->result();
    }

    function supplier_auto_select($supplier_name) {
        $this->db->like('supplier_name', $supplier_name);
        $this->db->select('*');
        $this->db->limit(10,0);
        $query = $this->db->get('supplier');
        return $query->result();
    }
    
    function supplier_auto_select_ten() {
        $this->db->select('*');
        $this->db->limit(2,0);
        $query = $this->db->get('supplier');
        return $query->result();
    }

    function class_name_select($class_id) {
        $this->db->where('class_id', $class_id);
        $this->db->select('drug_class');
        $query = $this->db->get('class_info');
        return $query->result();
    }

    function shangpin_name_select($shangpin_id) {
        $this->db->where('shangpin_id', $shangpin_id);
        $this->db->select('shangpin_name');
        $query = $this->db->get('shangpin_info');
        return $query->result();
    }

    function jixing_name_select($jixing_id) {
        $this->db->where('jixing_id', $jixing_id);
        $this->db->select('jixing_name');
        $query = $this->db->get('jixing');
        return $query->result();
    }

    function med_in_type_name_select($med_in_type_id) {
        $this->db->where('med_in_type_id', $med_in_type_id);
        $this->db->select('med_in_type_name');
        $query = $this->db->get('med_in_type');
        return $query->result();
    }

    function changjia_name_select($changjia_id) {
        $this->db->where('changjia_id', $changjia_id);
        $this->db->select('changjia_name');
        $query = $this->db->get('changjia');
        return $query->result();
    }

    function supplier_name_select($supplier_id) {
        $this->db->where('supplier_id', $supplier_id);
        $this->db->select('supplier_name');
        $query = $this->db->get('supplier');
        return $query->result();
    }

    function purchase_batch_latest() {
        $this->db->select_max('purchase_batch');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    function purchase_batch($batch) {
        $this->db->where('purchase_batch',$batch);
        $this->db->select('purchase_batch');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    
    function drug_purchase_select() {
        $this->db->where('check_state',0);
        $this->db->select('*');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    
    function drug_pruchase_select_by_userid($userid) {
        $this->db->where('userid',$userid);
        $this->db->where('check_state',0);
        $this->db->select('*');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    
    function drug_pruchase_select() {
        $this->db->select('*');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    
    function drug_purchase_check($purchase_batch) {
        $this->db->where('purchase_batch',$purchase_batch);
        $this->db->select('*');
        $query = $this->db->get('drug_purchase');
        return $query->result();
    }
    
    function check_state_update($purchase_batch,$arr) {
        $this->db->where('purchase_batch', $purchase_batch);
        $this->db->update('drug_purchase', $arr);
    }
    

    function get_drug_purchase_list($purchase_batch) {
        $this->db->where('purchase_batch',$purchase_batch);
        $this->db->select('*');
        $query = $this->db->get('drug_purchase_list');
        return $query->result();
    }
    
    function drug_purchase_list_delete_by_id($id){
        $this->db->where('Id', $id);
        $this->db->delete('drug_purchase_list');
    }
    
    function drug_purchase_list_update_by_id($id,$arr){
        $this->db->where('id', $id);
        $this->db->update('drug_purchase_list', $arr);
    }

}

?>