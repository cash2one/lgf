<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function login(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('sys_manager_m');
    }

    public function index()
    {
        //$this->load->view('login_v',array('cap'=>$cap['image']));
        $this->load->view('login_v');
    }
    
    public function logout() {
        session_start();
        session_destroy();
        //echo 'session删除成功';
        $this->load->view('login_v');
    }
    
    public function get_captcha(){
        $vals=array(
            'word'=>rand(1000,9999),//使用自己生成的字符串
            'img_path'=>'./captcha/',//此目录需要手工创建
            'img_url'=>  base_url().'captcha/',
            'img_width'=>75,
            'img_height'=>30,
            //'expiration'=> 5 //过期个数
            'expiration'=> 7200 //过期时间，时间一到，会自动删除图片
        );
        $cap=  create_captcha($vals);
        //$this->load->view($cap['image']);
        //$data = array(
        //    'captcha_time' => $cap['time'],
        //    'ip_address' => $this->input->ip_address(),
        //    'word' => $cap['word']
        //);
        //$query = $this->db->insert_string('captcha', $data);
        //$this->db->query($query);
        
        
        echo $cap['image'];
        
        session_start();
        $_SESSION['cap']=$cap['word'];
        //echo session_id();
        //echo 'session'.$_SESSION['cap'];
        //验证时，对比$_SESSION['cap']
        //unset($_SESSION);
    }

    public function checklogin(){        
        session_start();
        $_SESSION['userid']=$_POST['userid']; 
        $username=$this->sys_manager_m->username_select($_SESSION['userid']);
        //var_dump($username);
        foreach ($username as $key_username => $username_value) {
            $username_v=$username_value->username;
        }
        $_SESSION['username']=$username_v;
        $data['userid']=$_SESSION['userid'];
        $this->form_validation->set_rules('userid','用户名','required|callback_username_check');
        $this->form_validation->set_rules('password','密码','required|callback_password_check');
        $this->form_validation->set_rules('captcha','验证码','required|callback_captcha_check');
        $bool=$this->form_validation->run();
        if($bool){
            //echo $s;
            //$this->load->view('main_v');
            $this->load->view('main_v',$data);
            //$this->load->view('head_v',$data);
            //$this->load->view('left_v');
            //$this->load->view('right_v');
        }else{
            //$vals=array(
            //'img_path'=>'./captcha/',//此目录需要手工创建
            //'img_url'=>  base_url().'captcha/',
            //'img_width'=>100,
            //'img_height'=>30,
            //'expiration'=> 5 //过期个数
            //'expiration'=> 60*10 //过期时间，时间一到，会自动删除图片
            //);
            //$cap=  create_captcha($vals);
            //$this->load->view($cap['image']);
            //$this->load->view('login_v',array('cap'=>$cap['image']));
            $this->load->view('login_v');
        }
    }
    
    public function username_check()
    {
        $userid=$this->sys_manager_m->user_select($_POST['userid']);
        //var_dump($userid);
        //foreach($userid as $key=>$val){
                //echo $userid = $val->userid;
        //}
        if (!$userid)
        {
            $this->form_validation->set_message('username_check', '%s 不存在，请确认后再输入');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function password_check()
    {
        $arr=$this->sys_manager_m->user_select($_POST['userid']);
        $psd=$_POST['password'];
            $password=0;
            foreach($arr as $key=>$v){
                $password = $v->password;
            }
            if(md5($psd)!=$password){
                $this->form_validation->set_message('password_check', '%s 不正确，请确认后再输入');
                return FALSE;
            }
            else{
                return TRUE;
            }
    }
    
    public function captcha_check() {
        $cap=$_POST['captcha'];
        if($cap & $cap!=@$_SESSION['cap']){
            $this->form_validation->set_message('captcha_check', '%s 不一致，请重新输入');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
}
