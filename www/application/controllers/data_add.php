<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_add extends CI_Controller {

    public function data_add() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('info_add_m');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function jiuzhen_index() {
        $this->load->view('jiuizhen_index_v');
    }
    
    public function date_gen_index() {

        $this->load->view('date_gen');
    }

    public function jiuzhen_add() {
        var_dump($this->input->post(NULL,TRUE));
//        $data['class_info'] = $this->info_add_m->class_info_select();
//        $data['shangpin_info'] = $this->info_add_m->shangpin_info_select();
//        $data['guige'] = $this->info_add_m->guige_select();
//        $data['jixing'] = $this->info_add_m->jixing_select();
//        $data['med_in_type'] = $this->info_add_m->med_in_type_select();
//        $data['changjia'] = $this->info_add_m->changjia_select();
//        $data['supplier'] = $this->drug_purchase_m->supplier_select();
//        var_dump($data);
//        $this->load->view('drug_property_add_v', $data);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */