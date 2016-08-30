<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    public function main(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('main_v');
    }
    
    public function head()
    {
        $this->load->view('head_v');
    }
    
    public function left()
    {
        $this->load->view('left_v');
    }
    
    public function right()
    {
        $this->load->view('right_v');
    }
}
