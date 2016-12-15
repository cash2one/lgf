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
        $this->load->library('table');
        $this->load->model('data_add_m');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function jiuzhen_index() {
        session_start();
        $data['yiyuan']=$_SESSION['company'];
        $this->load->view('jiuizhen_index_v',$data);
    }
    
    public function ruyuan_index() {
        session_start();
        $data['yiyuan']=$_SESSION['company'];
        $this->load->view('ruyuan_index_v',$data);
    }
    
    public function chuyuan_index() {
        session_start();
        $data['yiyuan']=$_SESSION['company'];
        $this->load->view('chuyuan_index_v',$data);
    }
    
    public function date_gen_index() {

        $this->load->view('date_gen');
    }

    public function jiuzhen_add() {

//        var_dump($this->input->post(NULL,TRUE));
        $patients=$this->input->post(NULL,TRUE);
        $len=count($patients);
//        echo $arr0['date']=$patents['date'];
//        echo $arr0['yiyuan0']=$patents['yiyuan0'];
        for($i=0;$i<($len-2)/18;$i++){
            $arr[$i]['yiyuan']=$patients['yiyuan'.$i];
            $arr[$i]['chufuzhen']=$patients['chufuzhen'.$i];
            if($arr[$i]['chufuzhen']==1){$arr[$i]['chufuzhen']='初诊';}
            else{$arr[$i]['chufuzhen']='复诊';}
            $arr[$i]['liushi']=$patients['liushi'.$i];
            if($arr[$i]['liushi']==1){$arr[$i]['liushi']='初诊流失';}
            else if($arr[$i]['liushi']==2){$arr[$i]['liushi']='复诊流失';}
            else{$arr[$i]['liushi']='';}
            $arr[$i]['keshi']=$patients['keshi'.$i];
            $arr[$i]['zhenshi']=$patients['zhenshi'.$i];
            if($arr[$i]['zhenshi']==1){$arr[$i]['zhenshi']='一诊室';}
            else if($arr[$i]['zhenshi']==2){$arr[$i]['zhenshi']='二诊室';}
            else if($arr[$i]['zhenshi']==3){$arr[$i]['zhenshi']='三诊室';}
            else{$arr[$i]['zhenshi']='';}
            $arr[$i]['bingzhong']=$patients['bingzhong'.$i];
            if($arr[$i]['keshi']==1){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='感冒';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='胃炎';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='支气管炎';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='冠/肺心病';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='三高';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='糖尿病';}
                else if($arr[$i]['bingzhong']==6){$arr[$i]['bingzhong']='腹泻';}
                else if($arr[$i]['bingzhong']==7){$arr[$i]['bingzhong']='脑A/硬化供血不足';}
                else if($arr[$i]['bingzhong']==8){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==9){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==2){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='腋臭';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='痔疮.肛痿';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='肝胆胰脾';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='冠/肾结石';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='骨科';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='阑尾疝气';}
                else if($arr[$i]['bingzhong']==6){$arr[$i]['bingzhong']='外伤';}
                else if($arr[$i]['bingzhong']==7){$arr[$i]['bingzhong']='V曲张';}
                else if($arr[$i]['bingzhong']==8){$arr[$i]['bingzhong']='普外';}
                else if($arr[$i]['bingzhong']==9){$arr[$i]['bingzhong']='腹/胸痛';}
                else if($arr[$i]['bingzhong']==10){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==11){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==3){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='包皮包茎';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='前列腺';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='早泄阳痿';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='性功';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='湿疣疱疹';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='不孕不育';}
                else if($arr[$i]['bingzhong']==6){$arr[$i]['bingzhong']='生殖感染';}
                else if($arr[$i]['bingzhong']==7){$arr[$i]['bingzhong']='附睾囊肿';}
                else if($arr[$i]['bingzhong']==8){$arr[$i]['bingzhong']='男科检查';}
                else if($arr[$i]['bingzhong']==9){$arr[$i]['bingzhong']='HPV/TP/淋病';}
                else if($arr[$i]['bingzhong']==10){$arr[$i]['bingzhong']='阴茎短小';}
                else if($arr[$i]['bingzhong']==11){$arr[$i]['bingzhong']='皮肤病';}
                else if($arr[$i]['bingzhong']==12){$arr[$i]['bingzhong']='其他';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==4){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='早孕';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='中孕';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='宫颈';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='炎症';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='内分泌/痛经';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='妇检肌瘤/囊肿';}
                else if($arr[$i]['bingzhong']==6){$arr[$i]['bingzhong']='积液';}
                else if($arr[$i]['bingzhong']==7){$arr[$i]['bingzhong']='上环取环';}
                else if($arr[$i]['bingzhong']==8){$arr[$i]['bingzhong']='不孕';}
                else if($arr[$i]['bingzhong']==9){$arr[$i]['bingzhong']='宫外孕';}
                else if($arr[$i]['bingzhong']==10){$arr[$i]['bingzhong']='整形';}
                else if($arr[$i]['bingzhong']==11){$arr[$i]['bingzhong']='功血';}
                else if($arr[$i]['bingzhong']==12){$arr[$i]['bingzhong']='乳腺';}
                else if($arr[$i]['bingzhong']==13){$arr[$i]['bingzhong']='外阴白斑';}
                else if($arr[$i]['bingzhong']==14){$arr[$i]['bingzhong']='HPV/Tp';}
                else if($arr[$i]['bingzhong']==15){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==16){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==5){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='孕检';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='中孕';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='晚孕';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='产后体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==6){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='鼻炎';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='咽炎';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='耳';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='眼睛';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='口腔';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='取异物';}
                else if($arr[$i]['bingzhong']==6){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==7){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==7){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='肩周/关节炎';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='颈椎病';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='腰椎突出';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='风湿';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==8){
                if($arr[$i]['bingzhong']==0){$arr[$i]['bingzhong']='上感';}
                else if($arr[$i]['bingzhong']==1){$arr[$i]['bingzhong']='支气管炎';}
                else if($arr[$i]['bingzhong']==2){$arr[$i]['bingzhong']='腰痛';}
                else if($arr[$i]['bingzhong']==3){$arr[$i]['bingzhong']='眩晕/心悸';}
                else if($arr[$i]['bingzhong']==4){$arr[$i]['bingzhong']='其他';}
                else if($arr[$i]['bingzhong']==5){$arr[$i]['bingzhong']='体检';}
                else{$arr[$i]['bingzhong']='';}
            }
            if($arr[$i]['keshi']==9){
                $arr[$i]['bingzhong']='';
            }
            
            if($arr[$i]['keshi']==1){$arr[$i]['keshi']='内科';}
            else if($arr[$i]['keshi']==2){$arr[$i]['keshi']='外科';}
            else if($arr[$i]['keshi']==3){$arr[$i]['keshi']='男科';}
            else if($arr[$i]['keshi']==4){$arr[$i]['keshi']='妇科';}
            else if($arr[$i]['keshi']==5){$arr[$i]['keshi']='产科';}
            else if($arr[$i]['keshi']==6){$arr[$i]['keshi']='耳鼻喉';}
            else if($arr[$i]['keshi']==7){$arr[$i]['keshi']='疼痛科';}
            else if($arr[$i]['keshi']==8){$arr[$i]['keshi']='中医';}
            else if($arr[$i]['keshi']==9){$arr[$i]['keshi']='其他';}
            else{$arr[$i]['keshi']='';}
            $arr[$i]['laiyuanqudao']=$patients['laiyuanqudao'.$i];
            if($arr[$i]['laiyuanqudao']==0){$arr[$i]['laiyuanqudao']='网络';}
            else if($arr[$i]['laiyuanqudao']==1){$arr[$i]['laiyuanqudao']='电话';}
            else if($arr[$i]['laiyuanqudao']==2){$arr[$i]['laiyuanqudao']='QQ';}
            else if($arr[$i]['laiyuanqudao']==3){$arr[$i]['laiyuanqudao']='杂志';}
            else if($arr[$i]['laiyuanqudao']==4){$arr[$i]['laiyuanqudao']='市场';}
            else if($arr[$i]['laiyuanqudao']==5){$arr[$i]['laiyuanqudao']='持卡';}
            else if($arr[$i]['laiyuanqudao']==6){$arr[$i]['laiyuanqudao']='路过';}
            else if($arr[$i]['laiyuanqudao']==7){$arr[$i]['laiyuanqudao']='附近';}
            else if($arr[$i]['laiyuanqudao']==8){$arr[$i]['laiyuanqudao']='介绍';}
            else if($arr[$i]['laiyuanqudao']==9){$arr[$i]['laiyuanqudao']='来过';}
            else if($arr[$i]['laiyuanqudao']==9){$arr[$i]['laiyuanqudao']='会员证';}
            else{$arr[$i]['laiyuanqudao']='';}
            $arr[$i]['nianling']=$patients['nianling'.$i];
            $arr[$i]['xingbie']=$patients['xingbie'.$i];
            if($arr[$i]['xingbie']==0){$arr[$i]['xingbie']='男';}
            else if($arr[$i]['xingbie']==1){$arr[$i]['xingbie']='女';}
            $arr[$i]['quyu']=$patients['quyu'.$i];
            if($arr[$i]['quyu']==0){$arr[$i]['quyu']='县城';}
            else if($arr[$i]['quyu']==1){$arr[$i]['quyu']='广顺';}
            else if($arr[$i]['quyu']==1){$arr[$i]['quyu']='杜家坝';}
            $arr[$i]['shouzhuyuan']=$patients['shouzhuyuan'.$i];
            if($arr[$i]['shouzhuyuan']==0){$arr[$i]['shouzhuyuan']='否';}
            else if($arr[$i]['shouzhuyuan']==1){$arr[$i]['shouzhuyuan']='是';}
            $arr[$i]['zhiliao']=$patients['zhiliao'.$i];
            if($arr[$i]['zhiliao']==0){$arr[$i]['zhiliao']='否';}
            else if($arr[$i]['zhiliao']==1){$arr[$i]['zhiliao']='是';}
            $arr[$i]['zhiliaofei']=$patients['zhiliaofei'.$i];
            $arr[$i]['shoushu']=$patients['shoushu'.$i];
            if($arr[$i]['shoushu']==0){$arr[$i]['shoushu']='否';}
            else if($arr[$i]['shoushu']==1){$arr[$i]['shoushu']='是';}
            $arr[$i]['shoushufei']=$patients['shoushufei'.$i];
            $arr[$i]['menzhenxiaofei']=$patients['menzhenxiaofei'.$i];
            $arr[$i]['riqi']=$patients['date'];
        }
//        var_dump($arr);
        
//        $data=$this->data_add_m->patients_info_select();
//        var_dump($this->input->post(NULL,TRUE));
        $jiuzhen=$this->input->post(NULL,TRUE);
//        var_dump($jiuzhen);
//        echo $jiuzhen['date'];
        foreach ($jiuzhen as $key => $value) {
//            echo $value ;
//            echo '<br>';
        }
//        $data['class_info'] = $this->info_add_m->class_info_select();
//        $data['shangpin_info'] = $this->info_add_m->shangpin_info_select();
//        $data['guige'] = $this->info_add_m->guige_select();
//        $data['jixing'] = $this->info_add_m->jixing_select();
//        $data['med_in_type'] = $this->info_add_m->med_in_type_select();
//        $data['changjia'] = $this->info_add_m->changjia_select();
//        $data['supplier'] = $this->drug_purchase_m->supplier_select();

//        var_dump($data);
//        $patients_ic=$this->db->query('select * from patients_ic');
        
//      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading( '单位', '初复诊','流失','科室','诊室','病种','来源渠道','年龄','性别','区域','是否收住院','是否治疗','治疗费','是否手术','手术费','门诊消费','日期');
        $data['html']=$this->table->generate($arr);
        
        
        
        
        $this->data_add_m->patients_info_insert($arr);
        $this->load->view('patients_ic_v',$data);
//      设置表单校验类
//        $this->form_validation->set_rules('chufuzhen','初复诊','required');
//        $this->form_validation->set_rules('keshi','科室','required');
//        $this->form_validation->set_rules('nianling','年龄','required|numeric');
//        
////        echo 'user_add';
//        echo validation_errors(); 
//        $bool=$this->form_validation->run();
//        if($bool){
//            $this->data_add_m->patients_info_insert($arr);
//            $this->load->view('patients_ic_v',$data);
//        }
//        else{
////            echo 'add failed';
////            $data['company'] = $this->sys_manager_m->company_select();
////            $this->load->view('user_add_v');
//            echo "<script>alert('".form_error('chufuzhen')."');</script>";
//            echo "<script>alert('".form_error('keshi')."');</script>";
//            echo "<script>alert('".form_error('nianling')."');</script>";
//        }
        
        
    }
    
    public function zhuyuan_shouru_every(){
        $this->load->view('zhuyuan_shouru_every_v');
    }
    
    public function zhuyuan_shouru_every_add(){
        $shouru_every=$this->input->post(NULL,TRUE);
//        var_dump($shouru_every);

        $arr[0]['riqi']=$shouru_every['date'];
        $arr[0]['yujiaokuan']=$shouru_every['yujiaokuan'];
        $arr[0]['tuibukuan']=$shouru_every['tuibukuan'];
        $arr[0]['xianjinshouru']=$shouru_every['xianjinshouru'];
        $arr[0]['yibaoshouru']=$shouru_every['yibaoshouru'];

//        var_dump($arr);
        
        $riqi_arr=$this->data_add_m->zhuyuan_shouru_every_select($arr[0]['riqi']);
//        var_dump($riqi);
        if(!empty($riqi_arr)){
            $data['pr']='您选择的日期已维护数据！';
            $data['html_shouru_every']=null;
        }else{
            $data['pr']='恭喜你！导入成功！！';
//      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading( '日期', '预付款','退补款','现金收入','医保收入');
        $data['html_shouru_every']=$this->table->generate($arr);
        }
//        foreach($riqi_arr as $val){
//            echo $riqi=$val->riqi;
//        }
        
        
        $this->data_add_m->zhuyuan_shouru_every_insert($arr);
        $this->load->view('zhuyuan_shouru_every_add_v',$data);
    }
    
    public function menzhen_shouru_every(){
        $this->load->view('menzhen_shouru_every_v');
    }
    
    public function menzhen_shouru_every_add(){
        $shouru_every=$this->input->post(NULL,TRUE);
//        var_dump($shouru_every);

        $arr[0]['riqi']=$shouru_every['date'];
        $arr[0]['yinlian']=$shouru_every['yinlian'];
        $arr[0]['yibao']=$shouru_every['yibao'];
        $arr[0]['dangrizhichu']=$shouru_every['dangrizhichu'];
        $arr[0]['dabizhichu']=$shouru_every['dabizhichu'];

//        var_dump($arr);
        
        $riqi_arr=$this->data_add_m->menzhen_shouru_every_select($arr[0]['riqi']);
//        var_dump($riqi);
        if(!empty($riqi_arr)){
            $data['pr']='您选择的日期已维护数据！';
            $data['html_shouru_every']=null;
        }else{
            $data['pr']='恭喜你！导入成功！！';
//      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading( '日期', '银联','医保','当日支出','大笔支出');
        $data['html_shouru_every']=$this->table->generate($arr);
        }
//        foreach($riqi_arr as $val){
//            echo $riqi=$val->riqi;
//        }
        
        
        $this->data_add_m->menzhen_shouru_every_insert($arr);
        $this->load->view('menzhen_shouru_every_add_v',$data);
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */