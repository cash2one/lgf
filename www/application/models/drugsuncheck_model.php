<?php 
class Drugsuncheck_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function drugsuncheck_insert($arr){
		$this->db->insert('drugsuncheck',$arr);
	}
	
	function drugsuncheck_update($id,$arr){
		$this->db->where('DrugId',$userid);
		$this->db->update('drugsuncheck',$arr);
	}
	
	function drugsuncheck_delete($id){
		$this->db->where('DrugId',$drugid);
		$this->db->delete('drugsuncheck');
	}
	
	function drugsuncheck_select_max_InputDate(){
		$this->db->select_max('InputDate');
		$query=$this->db->get('drugsuncheck');
		return $query->result();
	}
	
	function drugsuncheck_select($InputDate){
		$this->db->like('InputDate',$InputDate);
		$this->db->where('IsCheck',0);//审核状态未“未审核”
		$this->db->select('*');
		$query=$this->db->get('drugsuncheck');
		return $query->result();
	}
}


?>