<?php 
class Sys_manager_m extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function captcha_select($word){
		$this->db->where('word',$word);
		$this->db->select('*');
		$query=$this->db->get('captcha');
		return $query->result();
	}
}


?>