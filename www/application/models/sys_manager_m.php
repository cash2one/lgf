<?php 
class Sys_manager_m extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function user_insert($arr){
		$this->db->insert('users',$arr);
	}
	
	function user_update($id,$arr){
		$this->db->where('UserId',$userid);
		$this->db->update('users',$arr);
	}
	
	function user_delete($id){
		$this->db->where('Id',$id);
		$this->db->delete('users');
	}
	
	function user_select($UserId){
		$this->db->where('userid',$UserId);
		$this->db->select('*');
		$query=$this->db->get('users');
		return $query->result();
	}
        
        function username_select($UserId){
		$this->db->where('userid',$UserId);
		$this->db->select('username');
		$query=$this->db->get('users');
		return $query->result();
	}
        
        function auto_select($UserId){
		$this->db->like('userid',$UserId);
		$this->db->select('userid');
		$query=$this->db->get('users');
		return $query->result();
	}
        
//        function company_select(){
//                $this->db->like('userid',$UserId);
//		$this->db->select('company');
//		$query=$this->db->get('company');
//		return $query->result();
//	}
        
        function company_select($UserId){
                $this->db->like('userid',$UserId);
		$this->db->select('company');
		$query=$this->db->get('users');
		return $query->result();
	}

}
