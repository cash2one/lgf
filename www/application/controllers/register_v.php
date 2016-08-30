<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
</html>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_v extends CI_Controller {

	public function Register_v()
	{
	    parent::__construct();
	    $this->load->helper('url');
            $this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['base'] = base_url();
		
		$this->load->view('user_add_v', $data);

		
	}
        
        public function registeruser()
	{
		$data['base'] = base_url();
		
		$this->load->view('register_page', $data);

		
	}

}
