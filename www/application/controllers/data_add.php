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
        $ruyuan_infos=$this->data_add_m->ruyuan_info_select_by_hospitalization_id($_REQUEST['hospitalization_id']);
//        var_dump($ruyuan_infos);
        if(!empty($ruyuan_infos)){
            foreach ($ruyuan_infos as $key => $value) {
//                $data['hospitalization_id=$value->hospitalization_id;
                $data['yiyuan']=$value->yiyuan;
                $data['name']=$value->name;
                $data['nianling']=$value->nianling;
                $data['xingbie']=$value->xingbie;
                $data['keshi']=$value->keshi;
                $data['laiyuanqudao']=$value->laiyuanqudao;
                $data['quyu']=$value->quyu;
                $data['chufuzhenruyuan']=$value->chufuzhenruyuan;
                $data['yujiaokuan']=$value->yujiaokuan;
                $data['canbaoleixing']=$value->canbaoleixing;
                $data['riqi']=$value->riqi;
            }
        }
        $data['yiyuan']=$_SESSION['company'];
        $data['hospitalization_id']=$_REQUEST['hospitalization_id'];
//        echo date('Y-m-d',time());
//        echo $data['riqi'];
//      计算日期天数差
        $data['zhuyuantianshu']=ceil(strtotime(date('Y-m-d',time()))-strtotime($data['riqi']))/86400;
        $this->load->view('chuyuan_index_v',$data);
    }
    
    public function chuyuan_index_sel() {
        session_start();
        $this->load->view('chuyuan_index_sel_v');
    }
    
//    public function chuyuan_index_res() {
//        $this->load->view('chuyuan_index_res_v');
//    }
    
    public function ruyuan_select() {
        $ruyuan=$this->input->post(NULL,TRUE);
//        var_dump($ruyuan);
        
        $ruyuan_date_begin=$ruyuan['ruyuan_date_begin'];
        $ruyuan_date_end=$ruyuan['ruyuan_date_end'];
        $hospitalization_id=$ruyuan['hospitalization_id'];
        $name=$ruyuan['name'];
        
        $ruyuan_infos=$this->data_add_m->ruyuan_info_select($ruyuan_date_begin,$ruyuan_date_end,$hospitalization_id,$name);
//      对象转换为数组
//        $arr = json_decode(json_encode($arr),true); 
//        var_dump($ruyuan_infos);
        if(!empty($ruyuan_infos)){
            foreach ($ruyuan_infos as $key => $value) {
                $arr[$key]['hospitalization_id']='<a target=_blank href='. base_url() . 'index.php/data_add/chuyuan_index?hospitalization_id='.$value->hospitalization_id.' value='.$value->hospitalization_id.'>'.$value->hospitalization_id.'</a>';
                $arr[$key]['yiyuan']=$value->yiyuan;
                $arr[$key]['name']=$value->name;
                $arr[$key]['nianling']=$value->nianling;
                $arr[$key]['xingbie']=$value->xingbie;
                $arr[$key]['keshi']=$value->keshi;
                $arr[$key]['laiyuanqudao']=$value->laiyuanqudao;
                $arr[$key]['quyu']=$value->quyu;
                $arr[$key]['chufuzhenruyuan']=$value->chufuzhenruyuan;
                $arr[$key]['yujiaokuan']=$value->yujiaokuan;
                $arr[$key]['canbaoleixing']=$value->canbaoleixing;
                $arr[$key]['riqi']=$value->riqi;
            }
        }
        else{
            $arr= ' ';
        }
//        var_dump($arr);

        //      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading( '住院号', '医院','姓名','年龄','性别','科室','来源渠道','区域','初复诊入院','预交款','参保类型','入院日期');
        $data['ruyuan_sel_html']=$this->table->generate($arr);
        $data['ruyuan_date_begin']=$ruyuan_date_begin;
        $data['ruyuan_date_end']=$ruyuan_date_end;
        $data['hospitalization_id']=$hospitalization_id;
        $data['name']=$name;

        $this->load->view('chuyuan_index_res_v',$data);
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
            else if($arr[$i]['quyu']==2){$arr[$i]['quyu']='杜家坝';}
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
    
    public function ruyuan_add() {

//        var_dump($this->input->post(NULL,TRUE));
        $ruyuans=$this->input->post(NULL,TRUE);
        $len=count($ruyuans);
//        echo $arr0['date']=$patents['date'];
//        echo $arr0['yiyuan0']=$patents['yiyuan0'];
        for($i=0;$i<($len-2)/18;$i++){
            $arr[$i]['hospitalization_id']=$ruyuans['hospitalization_id'.$i];
            $arr[$i]['yiyuan']=$ruyuans['yiyuan'.$i];
            $arr[$i]['name']=$ruyuans['name'.$i];
            $arr[$i]['nianling']=$ruyuans['nianling'.$i];
            $arr[$i]['xingbie']=$ruyuans['xingbie'.$i];
            if($arr[$i]['xingbie']==0){$arr[$i]['xingbie']='男';}
            else if($arr[$i]['xingbie']==1){$arr[$i]['xingbie']='女';}
//          科室
            $arr[$i]['keshi']=$ruyuans['keshi'.$i];
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
//          来源渠道
            $arr[$i]['laiyuanqudao']=$ruyuans['laiyuanqudao'.$i];
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
            
//          区域
            $arr[$i]['quyu']=$ruyuans['quyu'.$i];
            if($arr[$i]['quyu']==0){$arr[$i]['quyu']='县城';}
            else if($arr[$i]['quyu']==1){$arr[$i]['quyu']='广顺';}
            else if($arr[$i]['quyu']==2){$arr[$i]['quyu']='杜家坝';}
            
//          初复诊入院
            $arr[$i]['chufuzhenruyuan']=$ruyuans['chufuzhenruyuan'.$i];
            if($arr[$i]['chufuzhenruyuan']==1){$arr[$i]['chufuzhenruyuan']='初诊入院';}
            else{$arr[$i]['chufuzhenruyuan']='复诊入院';}
            
            $arr[$i]['yujiaokuan']=$ruyuans['yujiaokuan'.$i];
            
//          参保类型
            $arr[$i]['canbaoleixing']=$ruyuans['canbaoleixing'.$i];
            if($arr[$i]['canbaoleixing']==0){$arr[$i]['canbaoleixing']='农合';}
            else if($arr[$i]['canbaoleixing']==1){$arr[$i]['canbaoleixing']='职工';}
            else if($arr[$i]['canbaoleixing']==2){$arr[$i]['canbaoleixing']='其他';}
            
//          日期
            $arr[$i]['riqi']=$ruyuans['date'];
        }
//        var_dump($arr);
        
//      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading( '住院号', '医院','姓名','年龄','性别','科室','来源渠道','区域','初复诊入院','预交款','参保类型','日期');
        $data['ruyuan_html']=$this->table->generate($arr);
        
//      将数据插入数据库
        $this->data_add_m->ruyuan_info_insert($arr);
        $this->load->view('ruyuan_ic_v',$data);        
    }
    
    public function chuyuan_add() {

//        var_dump($this->input->post(NULL,TRUE));
        $chuyuans=$this->input->post(NULL,TRUE);
//        $arr['chuyuan_date'] = $chuyuans['chuyuan_date'];
//        $arr['hospitalization_id'] = $chuyuans['hospitalization_id'];
//        $arr['yiyuan'] = $chuyuans['yiyuan'];
//        $arr['name'] = $chuyuans['name'];
//        $arr['nianling'] = $chuyuans['nianling'];
//        $arr['xingbie'] = $chuyuans['xingbie'];
//        $arr['keshi'] = $chuyuans['keshi'];
//        $arr['laiyuanqudao'] = $chuyuans['laiyuanqudao'];
//        $arr['quyu'] = $chuyuans['quyu'];
//        $arr['chufuzhenruyuan'] = $chuyuans['chufuzhenruyuan'];
//        $arr['canbaoleixing'] = $chuyuans['canbaoleixing'];
//        $arr['riqi'] = $chuyuans['riqi'];
//        $arr['shifoushoushu'] = $chuyuans['shifoushoushu'];
//        $arr['zhuyuantianshu'] = $chuyuans['zhuyuantianshu'];
//        $arr['yujiaokuan'] = $chuyuans['yujiaokuan'];
//        $arr['zifei'] = $chuyuans['zifei'];
//        $arr['yibao'] = $chuyuans['yibao'];
//        $arr['bukuan'] = $chuyuans['bukuan'];
//        $arr['yiyuandianfu'] = $chuyuans['yiyuandianfu'];
//        $arr['shouru'] = $chuyuans['shouru'];
//        $arr['zongfeiyong'] = $chuyuans['zongfeiyong'];
//        $arr['zhenduan'] = $chuyuans['zhenduan'];

        if($chuyuans['shifoushoushu']==0){
            $chuyuans['shifoushoushu']='否';
        }else{
            $chuyuans['shifoushoushu']='是';
        }

        
        $arr =array($chuyuans['chuyuan_date'],$chuyuans['hospitalization_id'],$chuyuans['yiyuan'],$chuyuans['name'],
            $chuyuans['nianling'],$chuyuans['xingbie'],$chuyuans['keshi'],$chuyuans['laiyuanqudao'],$chuyuans['quyu'],
            $chuyuans['chufuzhenruyuan'],$chuyuans['canbaoleixing'],$chuyuans['riqi'],$chuyuans['shifoushoushu'],
            $chuyuans['zhuyuantianshu'],$chuyuans['yujiaokuan'],$chuyuans['zifei'],$chuyuans['yibao'],$chuyuans['bukuan'],
            $chuyuans['yiyuandianfu'],$chuyuans['shouru'],$chuyuans['zongfeiyong'],$chuyuans['zhenduan']);
        
//      设置表格类
        $template = array(
            'table_open' => '<table align="center" border="1" cellpadding="2" cellspacing="1" class="table">'
        );

        $this->table->set_template($template);
        $this->table->set_heading('出院日期','住院号', '医院','姓名','年龄','性别','科室','来源渠道','区域','初复诊入院',
                '参保类型','入院日期','是否手术','住院天数','预交款','自费','医保','补款','医院垫付','收入','总费用','诊断');
        $this->table->add_row($arr);
        $data['ruyuan_html']=$this->table->generate();
//        var_dump($arr);
        $arr_db[0]['chuyuan_date']=$arr[0];
        $arr_db[0]['hospitalization_id']=$arr[1];
        $arr_db[0]['zhenduan']=$arr[2];
        $arr_db[0]['zifei']=$arr[3];
        $arr_db[0]['yibao']=$arr[4];
        $arr_db[0]['bukuan']=$arr[5];
        $arr_db[0]['yiyuandianfu']=$arr[6];
        $arr_db[0]['shouru']=$arr[7];
        $arr_db[0]['zongfeiyong']=$arr[8];
        $arr_db[0]['shifoushoushu']=$arr[9];
        $arr_db[0]['zhuyuantianshu']=$arr[10];
        
//        var_dump($arr_db);
                
//      将数据插入数据库
        $this->data_add_m->chuyuan_info_insert($arr_db);
        $this->load->view('ruyuan_ic_v',$data);        
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