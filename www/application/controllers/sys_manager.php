<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys_manager extends CI_Controller {
    public function sys_manager(){
        parent::__construct();
        $this->load->helper('url');;
        $this->load->library('form_validation');
        $this->load->model('sys_manager_m');
    }

    public function index()
    {
//        $data['company'] = $this->sys_manager_m->company_select();
        $this->load->view('user_add_v');
    }
    
    public function user_add(){
        
        //var_dump($_POST);
        //echo $password=$_POST['password'];
        $this->form_validation->set_rules('userid','用户ID','required|callback_username_check');
        $this->form_validation->set_rules('username','姓名','required');
        $this->form_validation->set_rules('password','密码','required|min_length[6]|MD5');
        $this->form_validation->set_rules('confirmpassword','确认密码','required|matches[password]|MD5');
//        $this->form_validation->set_rules('company','单位','required');
//        $this->form_validation->set_rules('mobilephone','电话','required');
        $this->form_validation->set_rules('company','单位','min_length[0]');
        $this->form_validation->set_rules('mobilephone','电话','min_length[0]');
//        echo 'user_add';
        echo validation_errors(); 
        $bool=$this->form_validation->run();
        if($bool){
            //echo 'add success';
            $arr=array('userid'=>$_POST['userid'],'username'=>$_POST['username'],'password'=>$_POST['password'],'company'=>$_POST['company'],'mobilephone'=>$_POST['mobilephone'],'logintime'=>DATE('Y-m-d H:i:s',time()));
//            var_dump($arr);
            $this->sys_manager_m->user_insert($arr);
            $this->load->view('user_add_success_v');
        }
        else{
//            echo 'add failed';
//            $data['company'] = $this->sys_manager_m->company_select();
            $this->load->view('user_add_v');
        }
    }
    
    public function username_check()
    {
        $userid=$this->sys_manager_m->user_select($_POST['userid']);
        if ($userid)
        {
            $this->form_validation->set_message('username_check', '%s 已经存在');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
