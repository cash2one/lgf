<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends CI_Controller {
    public function patients(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('patients_m');
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
    
    public function patients_year() {
        for($i=1;$i<=12;$i++){
        $guahao[$i]=$this->patients_m->registered_type_select("挂号",$i);
        $chuzhen[$i] = $this->patients_m->registered_type_select("初诊",$i);
        $fuzhen[$i] = $this->patients_m->registered_type_select("复诊",$i);
        $liushi[$i] = $this->patients_m->registered_type_select("流失",$i);
        $wangluo[$i] = $this->patients_m->source_select("网络",$i);
        $dianhua[$i] = $this->patients_m->source_select("电话",$i);
        $qq[$i] = $this->patients_m->source_select("qq",$i);
        $zazhi[$i] = $this->patients_m->source_select("杂志",$i);
        $shichang[$i] = $this->patients_m->source_select("市场",$i);
        $chika[$i] = $this->patients_m->source_select("持卡",$i);
        $luguo[$i] = $this->patients_m->source_select("路过",$i);
        $fujin[$i] = $this->patients_m->source_select("附近",$i);
        $jiehsao[$i] = $this->patients_m->source_select("介绍",$i);
        $laiguo[$i] = $this->patients_m->source_select("来过",$i);
        $huiyuanzheng[$i] = $this->patients_m->source_select("会员证",$i);
        $fuke[$i] = $this->patients_m->office_select("妇科",$i);
        $nanke[$i] = $this->patients_m->office_select("男科",$i);
        $waike[$i] = $this->patients_m->office_select("外科",$i);
        $wuguanke[$i] = $this->patients_m->office_select("五官科",$i);
        $chanke[$i] = $this->patients_m->office_select("产科",$i);
        $neike[$i] = $this->patients_m->office_select("内科",$i);
        $neierke[$i] = $this->patients_m->office_select("内儿科",$i);
        $zhongyike[$i] = $this->patients_m->office_select("中医科",$i);
        $tentongke[$i] = $this->patients_m->office_select("疼痛科",$i);
        $zonghemenzhen[$i] = $this->patients_m->office_select("综合门诊",$i);
        $ruyuan[$i] = $this->patients_m->office_select("入院",$i);
        }
        $data['guahao'] = $guahao;
        $data['chuzhen'] = $chuzhen;
        $data['fuzhen'] = $fuzhen;
        $data['liushi'] = $liushi;
        $data['wangluo'] = $wangluo;
        $data['dianhua'] = $dianhua;
        $data['qq'] = $qq;
        $data['zazhi'] = $zazhi;
        $data['shichang'] = $shichang;
        $data['chika'] = $chika;
        $data['luguo'] = $luguo;
        $data['fujin'] = $fujin;
        $data['jieshao'] = $jiehsao;
        $data['laiguo'] = $laiguo;
        $data['huiyuanzheng'] = $huiyuanzheng;
        $data['fuke'] = $fuke;
        $data['nanke'] = $nanke;
        $data['waike'] = $waike;
        $data['wuguanke'] = $wuguanke;
        $data['chanke'] = $chanke;
        $data['neike'] = $neike;
        $data['neierke'] = $neierke;
        $data['zhongyike'] = $zhongyike;
        $data['tentongke'] = $tentongke;
        $data['zonghemenzhen'] = $zonghemenzhen;
        $data['ruyuan'] = $ruyuan;
//        $data['shangpin_info'] = $this->patients_m->shangpin_info_select();
//        $data['guige'] = $this->patients_m->guige_select();
//        $data['jixing'] = $this->patients_m->jixing_select();
//        $data['med_in_type'] = $this->patients_m->med_in_type_select();
//        $data['changjia'] = $this->patients_m->changjia_select();
//        $data['supplier'] = $this->drug_purchase_m->supplier_select();
//        var_dump($guahao);
//        var_dump($data);
        $this->load->view('patients_year_v',$data);
    }
    
    public function date_select(){
        $this->load->view('date_select_v');
    }
    public function patients_menzhen_every(){
        $date_every=date('Y-m-d');
        $menzhen_shouru_every = $this->patients_m->menzhen_shouru_every_select($date_every);
        $patients = $this->patients_m->patients_select($date_every);
        $data['nanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '初诊');
        $data['waike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '初诊');
        $data['neike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '初诊');
        $data['nanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '复诊');
        $data['waike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '复诊');
        $data['neike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '复诊');
        $data['zongmenzhen_chuzhen'] = $data['nanke_chuzhen_count'] + $data['waike_chuzhen_count'] + $data['chanke_chuzhen_count'] + $data['erbihou_chuzhen_count'] + $data['tengtong_chuzhen_count'] + $data['qita_chuzhen_count'] + $data['neike_chuzhen_count'] + $data['zhongyi_chuzhen_count'];
        $data['zongmenzhen_fuzhen'] = $data['nanke_fuzhen_count'] + $data['waike_fuzhen_count'] + $data['chanke_fuzhen_count'] + $data['erbihou_fuzhen_count'] + $data['tengtong_fuzhen_count'] + $data['qita_fuzhen_count'] + $data['neike_fuzhen_count'] + $data['zhongyi_fuzhen_count'];
//        var_dump($shouru_every);
        if(!empty($menzhen_shouru_every)){
            foreach($menzhen_shouru_every as $val){
                $data['yinlian']=$val->yinlian;
                $data['yibao']=$val->yibao;
                $data['dangrizhichu']=$val->dangrizhichu;
                $data['dabizhichu']=$val->dabizhichu;
            }
        }
        else{
            $data['yinlian']=0;
            $data['yibao']=0;
            $data['dangrizhichu']=0;
            $data['dabizhichu']=0;
        }
        
//        var_dump($patients);
        $data['date_every']=$date_every;
        $this->load->view('patients_menzhen_every_v',$data);
    }
    
    public function menzhen_patients_every_sel(){
        $date_every=$_POST['date_every'];
        $menzhen_shouru_every = $this->patients_m->menzhen_shouru_every_select($date_every);
        $patients = $this->patients_m->patients_select($date_every);
        $data['nanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '初诊');
        $data['waike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '初诊');
        $data['neike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '初诊');
        $data['nanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '复诊');
        $data['waike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '复诊');
        $data['neike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '复诊');
        $data['zongmenzhen_chuzhen'] = $data['nanke_chuzhen_count'] + $data['waike_chuzhen_count'] + $data['chanke_chuzhen_count'] + $data['erbihou_chuzhen_count'] + $data['tengtong_chuzhen_count'] + $data['qita_chuzhen_count'] + $data['neike_chuzhen_count'] + $data['zhongyi_chuzhen_count'];
        $data['zongmenzhen_fuzhen'] = $data['nanke_fuzhen_count'] + $data['waike_fuzhen_count'] + $data['chanke_fuzhen_count'] + $data['erbihou_fuzhen_count'] + $data['tengtong_fuzhen_count'] + $data['qita_fuzhen_count'] + $data['neike_fuzhen_count'] + $data['zhongyi_fuzhen_count'];
//        var_dump($shouru_every);
        if(!empty($menzhen_shouru_every)){
            foreach($menzhen_shouru_every as $val){
                $data['yinlian']=$val->yinlian;
                $data['yibao']=$val->yibao;
                $data['dangrizhichu']=$val->dangrizhichu;
                $data['dabizhichu']=$val->dabizhichu;
            }
        }
        else{
            $data['yinlian']=0;
            $data['yibao']=0;
            $data['dangrizhichu']=0;
            $data['dabizhichu']=0;
        }
        
//        var_dump($patients);
        $data['date_every']=$date_every;
        $this->load->view('patients_menzhen_every_v',$data);
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
