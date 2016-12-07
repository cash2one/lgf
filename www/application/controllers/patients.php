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
        $menzhen_shouru_every_sum = $this->patients_m->menzhen_shouru_every_select_sum($date_every);
        $patients = $this->patients_m->patients_select($date_every);
        
//      初诊
        $data['nanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '初诊');
        $data['waike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '初诊');
        $data['neike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '初诊');
        $data['zongmenzhen_chuzhen'] = $data['nanke_chuzhen_count'] + $data['waike_chuzhen_count'] + $data['chanke_chuzhen_count'] + $data['erbihou_chuzhen_count'] + $data['tengtong_chuzhen_count'] + $data['qita_chuzhen_count'] + $data['neike_chuzhen_count'] + $data['zhongyi_chuzhen_count'];
//      复诊
        $data['nanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '复诊');
        $data['waike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '复诊');
        $data['neike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '复诊');
        $data['zongmenzhen_fuzhen'] = $data['nanke_fuzhen_count'] + $data['waike_fuzhen_count'] + $data['chanke_fuzhen_count'] + $data['erbihou_fuzhen_count'] + $data['tengtong_fuzhen_count'] + $data['qita_fuzhen_count'] + $data['neike_fuzhen_count'] + $data['zhongyi_fuzhen_count'];
//      流失
        $data['nanke_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '男科');
        $data['waike_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '外科');
        $data['chanke_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '产科');
        $data['erbihou_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '耳鼻喉');
        $data['tengtong_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '疼痛科');
        $data['qita_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '其他');
        $data['neike_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '内科');
        $data['zhongyi_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '中医');
        $data['zongmenzhen_liushi'] = $data['nanke_liushi_count'] + $data['waike_liushi_count'] + $data['chanke_liushi_count'] + $data['erbihou_liushi_count'] + $data['tengtong_liushi_count'] + $data['qita_liushi_count'] + $data['neike_liushi_count'] + $data['zhongyi_liushi_count'];
//      治疗费
        $nanke_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '男科');
        $data['nanke_zhiliaofei']=0;
        if(!empty($nanke_zhiliaofei)){
            foreach ($nanke_zhiliaofei as $val){
            $data['nanke_zhiliaofei']=$data['nanke_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $waike_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '外科');
        $data['waike_zhiliaofei']=0;
        if(!empty($waike_zhiliaofei)){
            foreach ($waike_zhiliaofei as $val){
            $data['waike_zhiliaofei']=$data['waike_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $chanke_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '产科');
        $data['chanke_zhiliaofei']=0;
        if(!empty($chanke_zhiliaofei)){
            foreach ($chanke_zhiliaofei as $val){
            $data['chanke_zhiliaofei']=$data['chanke_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $erbihou_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '耳鼻喉');
        $data['erbihou_zhiliaofei']=0;
        if(!empty($erbihou_zhiliaofei)){
            foreach ($erbihou_zhiliaofei as $val){
            $data['erbihou_zhiliaofei']=$data['erbihou_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $tengtong_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '疼痛科');
        $data['tengtong_zhiliaofei']=0;
        if(!empty($tengtong_zhiliaofei)){
            foreach ($tengtong_zhiliaofei as $val){
            $data['tengtong_zhiliaofei']=$data['tengtong_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $qita_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '其他');
        $data['qita_zhiliaofei']=0;
        if(!empty($qita_zhiliaofei)){
            foreach ($qita_zhiliaofei as $val){
            $data['qita_zhiliaofei']=$data['qita_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $neike_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '内科');
        $data['neike_zhiliaofei']=0;
        if(!empty($neike_zhiliaofei)){
            foreach ($neike_zhiliaofei as $val){
            $data['neike_zhiliaofei']=$data['neike_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $zhongyi_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '中医');
        $data['zhongyi_zhiliaofei']=0;
        if(!empty($zhongyi_zhiliaofei)){
            foreach ($zhongyi_zhiliaofei as $val){
            $data['zhongyi_zhiliaofei']=$data['zhongyi_zhiliaofei']+$val->zhiliaofei;
            }
        }
        $data['zongmenzhen_zhiliaofei'] = $data['nanke_zhiliaofei'] + $data['waike_zhiliaofei'] + $data['chanke_zhiliaofei'] + $data['erbihou_zhiliaofei'] + $data['tengtong_zhiliaofei'] + $data['qita_zhiliaofei'] + $data['neike_zhiliaofei'] + $data['zhongyi_zhiliaofei'];
        
//      手术费
        $nanke_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '男科');
        $data['nanke_shoushufei']=0;
        if(!empty($nanke_shoushufei)){
            foreach ($nanke_shoushufei as $val){
            $data['nanke_shoushufei']=$data['nanke_shoushufei']+$val->shoushufei;
            }
        }
        $waike_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '外科');
        $data['waike_shoushufei']=0;
        if(!empty($waike_shoushufei)){
            foreach ($waike_shoushufei as $val){
            $data['waike_shoushufei']=$data['waike_shoushufei']+$val->shoushufei;
            }
        }
        $chanke_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '产科');
        $data['chanke_shoushufei']=0;
        if(!empty($chanke_shoushufei)){
            foreach ($chanke_shoushufei as $val){
            $data['chanke_shoushufei']=$data['chanke_shoushufei']+$val->shoushufei;
            }
        }
        $erbihou_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '耳鼻喉');
        $data['erbihou_shoushufei']=0;
        if(!empty($erbihou_shoushufei)){
            foreach ($erbihou_shoushufei as $val){
            $data['erbihou_shoushufei']=$data['erbihou_shoushufei']+$val->shoushufei;
            }
        }
        $tengtong_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '疼痛科');
        $data['tengtong_shoushufei']=0;
        if(!empty($tengtong_shoushufei)){
            foreach ($tengtong_shoushufei as $val){
            $data['tengtong_shoushufei']=$data['tengtong_shoushufei']+$val->shoushufei;
            }
        }
        $qita_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '其他');
        $data['qita_shoushufei']=0;
        if(!empty($qita_shoushufei)){
            foreach ($qita_shoushufei as $val){
            $data['qita_shoushufei']=$data['qita_shoushufei']+$val->shoushufei;
            }
        }
        $neike_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '内科');
        $data['neike_shoushufei']=0;
        if(!empty($neike_shoushufei)){
            foreach ($neike_shoushufei as $val){
            $data['neike_shoushufei']=$data['neike_shoushufei']+$val->shoushufei;
            }
        }
        $zhongyi_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '中医');
        $data['zhongyi_shoushufei']=0;
        if(!empty($zhongyi_shoushufei)){
            foreach ($zhongyi_shoushufei as $val){
            $data['zhongyi_shoushufei']=$data['zhongyi_shoushufei']+$val->shoushufei;
            }
        }
        $data['zongmenzhen_shoushufei'] = $data['nanke_shoushufei'] + $data['waike_shoushufei'] + $data['chanke_shoushufei'] + $data['erbihou_shoushufei'] + $data['tengtong_shoushufei'] + $data['qita_shoushufei'] + $data['neike_shoushufei'] + $data['zhongyi_shoushufei'];
        
//      门诊消费
        $nanke_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '男科');
        $data['nanke_menzhenxiaofei']=0;
        if(!empty($nanke_menzhenxiaofei)){
            foreach ($nanke_menzhenxiaofei as $val){
            $data['nanke_menzhenxiaofei']=$data['nanke_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $waike_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '外科');
        $data['waike_menzhenxiaofei']=0;
        if(!empty($waike_menzhenxiaofei)){
            foreach ($waike_menzhenxiaofei as $val){
            $data['waike_menzhenxiaofei']=$data['waike_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $chanke_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '产科');
        $data['chanke_menzhenxiaofei']=0;
        if(!empty($chanke_menzhenxiaofei)){
            foreach ($chanke_menzhenxiaofei as $val){
            $data['chanke_menzhenxiaofei']=$data['chanke_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $erbihou_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '耳鼻喉');
        $data['erbihou_menzhenxiaofei']=0;
        if(!empty($erbihou_menzhenxiaofei)){
            foreach ($erbihou_menzhenxiaofei as $val){
            $data['erbihou_menzhenxiaofei']=$data['erbihou_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $tengtong_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '疼痛科');
        $data['tengtong_menzhenxiaofei']=0;
        if(!empty($tengtong_menzhenxiaofei)){
            foreach ($tengtong_menzhenxiaofei as $val){
            $data['tengtong_menzhenxiaofei']=$data['tengtong_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $qita_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '其他');
        $data['qita_menzhenxiaofei']=0;
        if(!empty($qita_menzhenxiaofei)){
            foreach ($qita_menzhenxiaofei as $val){
            $data['qita_menzhenxiaofei']=$data['qita_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $neike_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '内科');
        $data['neike_menzhenxiaofei']=0;
        if(!empty($neike_menzhenxiaofei)){
            foreach ($neike_menzhenxiaofei as $val){
            $data['neike_menzhenxiaofei']=$data['neike_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $zhongyi_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '中医');
        $data['zhongyi_menzhenxiaofei']=0;
        if(!empty($zhongyi_menzhenxiaofei)){
            foreach ($zhongyi_menzhenxiaofei as $val){
            $data['zhongyi_menzhenxiaofei']=$data['zhongyi_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $data['zongmenzhen_menzhenxiaofei'] = $data['nanke_menzhenxiaofei'] + $data['waike_menzhenxiaofei'] + $data['chanke_menzhenxiaofei'] + $data['erbihou_menzhenxiaofei'] + $data['tengtong_menzhenxiaofei'] + $data['qita_menzhenxiaofei'] + $data['neike_menzhenxiaofei'] + $data['zhongyi_menzhenxiaofei'];
        
//      复诊率
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_fuzhenlv'] = $data['nanke_fuzhen_count'] / $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_fuzhenlv'] = 0;
        }
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_fuzhenlv'] = $data['waike_fuzhen_count'] / $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_fuzhenlv'] = 0;
        }
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_fuzhenlv'] = $data['chanke_fuzhen_count'] / $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_fuzhenlv'] = 0;
        }
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_fuzhenlv'] = $data['erbihou_fuzhen_count'] / $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_fuzhenlv'] = 0;
        }
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_fuzhenlv'] = $data['tengtong_fuzhen_count'] / $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_fuzhenlv'] = 0;
        }
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_fuzhenlv'] = $data['qita_fuzhen_count'] / $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_fuzhenlv'] = 0;
        }
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_fuzhenlv'] = $data['neike_fuzhen_count'] / $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_fuzhenlv'] = 0;
        }
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_fuzhenlv'] = $data['zhongyi_fuzhen_count'] / $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_fuzhenlv'] = 0;
        }
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_fuzhenlv'] = $data['zongmenzhen_fuzhen'] / $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_fuzhenlv'] = 0;
        }
        
//      治疗比
        $data['nanke_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '男科');
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_zhiliao_rate']=$data['nanke_zhiliao_count']/ $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_zhiliao_rate'] = 0;
        }
        $data['waike_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '外科');
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_zhiliao_rate']=$data['waike_zhiliao_count']/ $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_zhiliao_rate'] = 0;
        }
        $data['chanke_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '产科');
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_zhiliao_rate']=$data['chanke_zhiliao_count']/ $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_zhiliao_rate'] = 0;
        }
        $data['erbihou_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_zhiliao_rate']=$data['erbihou_zhiliao_count']/ $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_zhiliao_rate'] = 0;
        }
        $data['tengtong_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_zhiliao_rate']=$data['tengtong_zhiliao_count']/ $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_zhiliao_rate'] = 0;
        }
        $data['qita_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '其他');
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_zhiliao_rate']=$data['qita_zhiliao_count']/ $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_zhiliao_rate'] = 0;
        }
        $data['neike_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '内科');
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_zhiliao_rate']=$data['neike_zhiliao_count']/ $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_zhiliao_rate'] = 0;
        }
        $data['zhongyi_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '中医');
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_zhiliao_rate']=$data['zhongyi_zhiliao_count']/ $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_zhiliao_rate'] = 0;
        }
        $data['zongmenzhen_zhiliao'] = $data['nanke_zhiliao_count'] + $data['waike_zhiliao_count'] + $data['chanke_zhiliao_count'] + $data['erbihou_zhiliao_count'] + $data['tengtong_zhiliao_count'] + $data['qita_zhiliao_count'] + $data['neike_zhiliao_count'] + $data['zhongyi_zhiliao_count'];
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_zhiliao_rate']=$data['zongmenzhen_zhiliao']/ $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_zhiliao_rate'] = 0;
        }

        
//      手术比
        $data['nanke_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '男科');
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_shoushu_rate']=$data['nanke_shoushu_count']/ $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_shoushu_rate'] = 0;
        }
        $data['waike_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '外科');
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_shoushu_rate']=$data['waike_shoushu_count']/ $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_shoushu_rate'] = 0;
        }
        $data['chanke_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '产科');
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_shoushu_rate']=$data['chanke_shoushu_count']/ $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_shoushu_rate'] = 0;
        }
        $data['erbihou_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_shoushu_rate']=$data['erbihou_shoushu_count']/ $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_shoushu_rate'] = 0;
        }
        $data['tengtong_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_shoushu_rate']=$data['tengtong_shoushu_count']/ $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_shoushu_rate'] = 0;
        }
        $data['qita_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '其他');
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_shoushu_rate']=$data['qita_shoushu_count']/ $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_shoushu_rate'] = 0;
        }
        $data['neike_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '内科');
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_shoushu_rate']=$data['neike_shoushu_count']/ $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_shoushu_rate'] = 0;
        }
        $data['zhongyi_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '中医');
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_shoushu_rate']=$data['zhongyi_shoushu_count']/ $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_shoushu_rate'] = 0;
        }
        $data['zongmenzhen_shoushu'] = $data['nanke_shoushu_count'] + $data['waike_shoushu_count'] + $data['chanke_shoushu_count'] + $data['erbihou_shoushu_count'] + $data['tengtong_shoushu_count'] + $data['qita_shoushu_count'] + $data['neike_shoushu_count'] + $data['zhongyi_shoushu_count'];
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_shoushu_rate']=$data['zongmenzhen_shoushu']/ $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_shoushu_rate'] = 0;
        }
        
//      人均
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_renjun'] = $data['nanke_menzhenxiaofei'] / $data['nanke_chuzhen_count'];
        } else {
            $data['nanke_renjun'] = 0;
        }
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_renjun'] = $data['waike_menzhenxiaofei'] / $data['waike_chuzhen_count'];
        } else {
            $data['waike_renjun'] = 0;
        }
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_renjun'] = $data['chanke_menzhenxiaofei'] / $data['chanke_chuzhen_count'];
        } else {
            $data['chanke_renjun'] = 0;
        }
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_renjun'] = $data['erbihou_menzhenxiaofei'] / $data['erbihou_chuzhen_count'];
        } else {
            $data['erbihou_renjun'] = 0;
        }
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_renjun'] = $data['tengtong_menzhenxiaofei'] / $data['tengtong_chuzhen_count'];
        } else {
            $data['tengtong_renjun'] = 0;
        }
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_renjun'] = $data['qita_menzhenxiaofei'] / $data['qita_chuzhen_count'];
        } else {
            $data['qita_renjun'] = 0;
        }
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_renjun'] = $data['neike_menzhenxiaofei'] / $data['neike_chuzhen_count'];
        } else {
            $data['neike_renjun'] = 0;
        }
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_renjun'] = $data['zhongyi_menzhenxiaofei'] / $data['zhongyi_chuzhen_count'];
        } else {
            $data['zhongyi_renjun'] = 0;
        }
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_renjun'] = $data['zongmenzhen_menzhenxiaofei'] / $data['zongmenzhen_chuzhen'];
        } else {
            $data['zongmenzhen_renjun'] = 0;
        }
        
        
//      当月累计
//      当月累计初诊
        $data['nanke_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '男科', '初诊');
        $data['waike_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '其他', '初诊');
        $data['neike_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '中医', '初诊');
        $data['zongmenzhen_chuzhen_sum'] = $data['nanke_chuzhen_count_sum'] + $data['waike_chuzhen_count_sum'] + $data['chanke_chuzhen_count_sum'] + $data['erbihou_chuzhen_count_sum'] + $data['tengtong_chuzhen_count_sum'] + $data['qita_chuzhen_count_sum'] + $data['neike_chuzhen_count_sum'] + $data['zhongyi_chuzhen_count_sum'];
//      当月累计复诊
        $data['nanke_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '男科', '复诊');
        $data['waike_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '其他', '复诊');
        $data['neike_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '中医', '复诊');
        $data['zongmenzhen_fuzhen_sum'] = $data['nanke_fuzhen_count_sum'] + $data['waike_fuzhen_count_sum'] + $data['chanke_fuzhen_count_sum'] + $data['erbihou_fuzhen_count_sum'] + $data['tengtong_fuzhen_count_sum'] + $data['qita_fuzhen_count_sum'] + $data['neike_fuzhen_count_sum'] + $data['zhongyi_fuzhen_count_sum'];
//      当月累计流失
        $data['nanke_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '男科');
        $data['waike_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '外科');
        $data['chanke_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '产科');
        $data['erbihou_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '耳鼻喉');
        $data['tengtong_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '疼痛科');
        $data['qita_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '其他');
        $data['neike_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '内科');
        $data['zhongyi_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '中医');
        $data['zongmenzhen_liushi_sum'] = $data['nanke_liushi_count_sum'] + $data['waike_liushi_count_sum'] + $data['chanke_liushi_count_sum'] + $data['erbihou_liushi_count_sum'] + $data['tengtong_liushi_count_sum'] + $data['qita_liushi_count_sum'] + $data['neike_liushi_count_sum'] + $data['zhongyi_liushi_count_sum'];
//      当月累计治疗费
        $nanke_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '男科');
        $data['nanke_zhiliaofei_sum']=0;
        if(!empty($nanke_zhiliaofei_sum)){
            foreach ($nanke_zhiliaofei_sum as $val){
            $data['nanke_zhiliaofei_sum']=$data['nanke_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $waike_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '外科');
        $data['waike_zhiliaofei_sum']=0;
        if(!empty($waike_zhiliaofei_sum)){
            foreach ($waike_zhiliaofei_sum as $val){
            $data['waike_zhiliaofei_sum']=$data['waike_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $chanke_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '产科');
        $data['chanke_zhiliaofei_sum']=0;
        if(!empty($chanke_zhiliaofei_sum)){
            foreach ($chanke_zhiliaofei_sum as $val){
            $data['chanke_zhiliaofei_sum']=$data['chanke_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $erbihou_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '耳鼻喉');
        $data['erbihou_zhiliaofei_sum']=0;
        if(!empty($erbihou_zhiliaofei_sum)){
            foreach ($erbihou_zhiliaofei_sum as $val){
            $data['erbihou_zhiliaofei_sum']=$data['erbihou_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $tengtong_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '疼痛科');
        $data['tengtong_zhiliaofei_sum']=0;
        if(!empty($tengtong_zhiliaofei_sum)){
            foreach ($tengtong_zhiliaofei_sum as $val){
            $data['tengtong_zhiliaofei_sum']=$data['tengtong_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $qita_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '其他');
        $data['qita_zhiliaofei_sum']=0;
        if(!empty($qita_zhiliaofei_sum)){
            foreach ($qita_zhiliaofei_sum as $val){
            $data['qita_zhiliaofei_sum']=$data['qita_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $neike_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '内科');
        $data['neike_zhiliaofei_sum']=0;
        if(!empty($neike_zhiliaofei_sum)){
            foreach ($neike_zhiliaofei_sum as $val){
            $data['neike_zhiliaofei_sum']=$data['neike_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $zhongyi_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '中医');
        $data['zhongyi_zhiliaofei_sum']=0;
        if(!empty($zhongyi_zhiliaofei_sum)){
            foreach ($zhongyi_zhiliaofei_sum as $val){
            $data['zhongyi_zhiliaofei_sum']=$data['zhongyi_zhiliaofei_sum']+$val->zhiliaofei;
            }
        }
        $data['zongmenzhen_zhiliaofei_sum'] = $data['nanke_zhiliaofei_sum'] + $data['waike_zhiliaofei_sum'] + $data['chanke_zhiliaofei_sum'] + $data['erbihou_zhiliaofei_sum'] + $data['tengtong_zhiliaofei_sum'] + $data['qita_zhiliaofei_sum'] + $data['neike_zhiliaofei_sum'] + $data['zhongyi_zhiliaofei_sum'];
        
//      当月累计手术费
        $nanke_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '男科');
        $data['nanke_shoushufei_sum']=0;
        if(!empty($nanke_shoushufei_sum)){
            foreach ($nanke_shoushufei_sum as $val){
            $data['nanke_shoushufei_sum']=$data['nanke_shoushufei_sum']+$val->shoushufei;
            }
        }
        $waike_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '外科');
        $data['waike_shoushufei_sum']=0;
        if(!empty($waike_shoushufei_sum)){
            foreach ($waike_shoushufei_sum as $val){
            $data['waike_shoushufei_sum']=$data['waike_shoushufei_sum']+$val->shoushufei;
            }
        }
        $chanke_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '产科');
        $data['chanke_shoushufei_sum']=0;
        if(!empty($chanke_shoushufei_sum)){
            foreach ($chanke_shoushufei_sum as $val){
            $data['chanke_shoushufei_sum']=$data['chanke_shoushufei_sum']+$val->shoushufei;
            }
        }
        $erbihou_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '耳鼻喉');
        $data['erbihou_shoushufei_sum']=0;
        if(!empty($erbihou_shoushufei_sum)){
            foreach ($erbihou_shoushufei_sum as $val){
            $data['erbihou_shoushufei_sum']=$data['erbihou_shoushufei_sum']+$val->shoushufei;
            }
        }
        $tengtong_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '疼痛科');
        $data['tengtong_shoushufei_sum']=0;
        if(!empty($tengtong_shoushufei_sum)){
            foreach ($tengtong_shoushufei_sum as $val){
            $data['tengtong_shoushufei_sum']=$data['tengtong_shoushufei_sum']+$val->shoushufei;
            }
        }
        $qita_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '其他');
        $data['qita_shoushufei_sum']=0;
        if(!empty($qita_shoushufei_sum)){
            foreach ($qita_shoushufei_sum as $val){
            $data['qita_shoushufei_sum']=$data['qita_shoushufei_sum']+$val->shoushufei;
            }
        }
        $neike_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '内科');
        $data['neike_shoushufei_sum']=0;
        if(!empty($neike_shoushufei_sum)){
            foreach ($neike_shoushufei_sum as $val){
            $data['neike_shoushufei_sum']=$data['neike_shoushufei_sum']+$val->shoushufei;
            }
        }
        $zhongyi_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '中医');
        $data['zhongyi_shoushufei_sum']=0;
        if(!empty($zhongyi_shoushufei_sum)){
            foreach ($zhongyi_shoushufei_sum as $val){
            $data['zhongyi_shoushufei_sum']=$data['zhongyi_shoushufei_sum']+$val->shoushufei;
            }
        }
        $data['zongmenzhen_shoushufei_sum'] = $data['nanke_shoushufei_sum'] + $data['waike_shoushufei_sum'] + $data['chanke_shoushufei_sum'] + $data['erbihou_shoushufei_sum'] + $data['tengtong_shoushufei_sum'] + $data['qita_shoushufei_sum'] + $data['neike_shoushufei_sum'] + $data['zhongyi_shoushufei_sum'];
        
//      当月累计门诊消费
        $nanke_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '男科');
        $data['nanke_menzhenxiaofei_sum']=0;
        if(!empty($nanke_menzhenxiaofei_sum)){
            foreach ($nanke_menzhenxiaofei_sum as $val){
            $data['nanke_menzhenxiaofei_sum']=$data['nanke_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $waike_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '外科');
        $data['waike_menzhenxiaofei_sum']=0;
        if(!empty($waike_menzhenxiaofei_sum)){
            foreach ($waike_menzhenxiaofei_sum as $val){
            $data['waike_menzhenxiaofei_sum']=$data['waike_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $chanke_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '产科');
        $data['chanke_menzhenxiaofei_sum']=0;
        if(!empty($chanke_menzhenxiaofei_sum)){
            foreach ($chanke_menzhenxiaofei_sum as $val){
            $data['chanke_menzhenxiaofei_sum']=$data['chanke_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $erbihou_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '耳鼻喉');
        $data['erbihou_menzhenxiaofei_sum']=0;
        if(!empty($erbihou_menzhenxiaofei_sum)){
            foreach ($erbihou_menzhenxiaofei_sum as $val){
            $data['erbihou_menzhenxiaofei_sum']=$data['erbihou_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $tengtong_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '疼痛科');
        $data['tengtong_menzhenxiaofei_sum']=0;
        if(!empty($tengtong_menzhenxiaofei_sum)){
            foreach ($tengtong_menzhenxiaofei_sum as $val){
            $data['tengtong_menzhenxiaofei_sum']=$data['tengtong_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $qita_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '其他');
        $data['qita_menzhenxiaofei_sum']=0;
        if(!empty($qita_menzhenxiaofei_sum)){
            foreach ($qita_menzhenxiaofei_sum as $val){
            $data['qita_menzhenxiaofei_sum']=$data['qita_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $neike_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '内科');
        $data['neike_menzhenxiaofei_sum']=0;
        if(!empty($neike_menzhenxiaofei_sum)){
            foreach ($neike_menzhenxiaofei_sum as $val){
            $data['neike_menzhenxiaofei_sum']=$data['neike_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $zhongyi_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '中医');
        $data['zhongyi_menzhenxiaofei_sum']=0;
        if(!empty($zhongyi_menzhenxiaofei_sum)){
            foreach ($zhongyi_menzhenxiaofei_sum as $val){
            $data['zhongyi_menzhenxiaofei_sum']=$data['zhongyi_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $data['zongmenzhen_menzhenxiaofei_sum'] = $data['nanke_menzhenxiaofei_sum'] + $data['waike_menzhenxiaofei_sum'] + $data['chanke_menzhenxiaofei_sum'] + $data['erbihou_menzhenxiaofei_sum'] + $data['tengtong_menzhenxiaofei_sum'] + $data['qita_menzhenxiaofei_sum'] + $data['neike_menzhenxiaofei_sum'] + $data['zhongyi_menzhenxiaofei_sum'];
        
//      当月累计复诊率
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_fuzhenlv_sum'] = $data['nanke_fuzhen_count_sum'] / $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_fuzhenlv_sum'] = 0;
        }
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_fuzhenlv_sum'] = $data['waike_fuzhen_count_sum'] / $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_fuzhenlv_sum'] = 0;
        }
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_fuzhenlv_sum'] = $data['chanke_fuzhen_count_sum'] / $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_fuzhenlv_sum'] = 0;
        }
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_fuzhenlv_sum'] = $data['erbihou_fuzhen_count_sum'] / $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_fuzhenlv_sum'] = 0;
        }
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_fuzhenlv_sum'] = $data['tengtong_fuzhen_count_sum'] / $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_fuzhenlv_sum'] = 0;
        }
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_fuzhenlv_sum'] = $data['qita_fuzhen_count_sum'] / $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_fuzhenlv_sum'] = 0;
        }
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_fuzhenlv_sum'] = $data['neike_fuzhen_count_sum'] / $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_fuzhenlv_sum'] = 0;
        }
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_fuzhenlv_sum'] = $data['zhongyi_fuzhen_count_sum'] / $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_fuzhenlv_sum'] = 0;
        }
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_fuzhenlv_sum'] = $data['zongmenzhen_fuzhen_sum'] / $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_fuzhenlv_sum'] = 0;
        }
        
//      当月累计治疗比
        $data['nanke_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '男科');
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_zhiliao_rate_sum']=$data['nanke_zhiliao_count_sum']/ $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_zhiliao_rate_sum'] = 0;
        }
        $data['waike_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '外科');
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_zhiliao_rate_sum']=$data['waike_zhiliao_count_sum']/ $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_zhiliao_rate_sum'] = 0;
        }
        $data['chanke_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '产科');
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_zhiliao_rate_sum']=$data['chanke_zhiliao_count_sum']/ $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_zhiliao_rate_sum'] = 0;
        }
        $data['erbihou_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_zhiliao_rate_sum']=$data['erbihou_zhiliao_count_sum']/ $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_zhiliao_rate_sum'] = 0;
        }
        $data['tengtong_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_zhiliao_rate_sum']=$data['tengtong_zhiliao_count_sum']/ $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_zhiliao_rate_sum'] = 0;
        }
        $data['qita_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '其他');
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_zhiliao_rate_sum']=$data['qita_zhiliao_count_sum']/ $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_zhiliao_rate_sum'] = 0;
        }
        $data['neike_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '内科');
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_zhiliao_rate_sum']=$data['neike_zhiliao_count_sum']/ $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_zhiliao_rate_sum'] = 0;
        }
        $data['zhongyi_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '中医');
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_zhiliao_rate_sum']=$data['zhongyi_zhiliao_count_sum']/ $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_zhiliao_rate_sum'] = 0;
        }
        $data['zongmenzhen_zhiliao_sum'] = $data['nanke_zhiliao_count_sum'] + $data['waike_zhiliao_count_sum'] + $data['chanke_zhiliao_count_sum'] + $data['erbihou_zhiliao_count_sum'] + $data['tengtong_zhiliao_count_sum'] + $data['qita_zhiliao_count_sum'] + $data['neike_zhiliao_count_sum'] + $data['zhongyi_zhiliao_count_sum'];
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_zhiliao_rate_sum']=$data['zongmenzhen_zhiliao_sum']/ $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_zhiliao_rate_sum'] = 0;
        }

        
//      当月累计手术比
        $data['nanke_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '男科');
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_shoushu_rate_sum']=$data['nanke_shoushu_count_sum']/ $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_shoushu_rate_sum'] = 0;
        }
        $data['waike_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '外科');
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_shoushu_rate_sum']=$data['waike_shoushu_count_sum']/ $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_shoushu_rate_sum'] = 0;
        }
        $data['chanke_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '产科');
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_shoushu_rate_sum']=$data['chanke_shoushu_count_sum']/ $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_shoushu_rate_sum'] = 0;
        }
        $data['erbihou_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_shoushu_rate_sum']=$data['erbihou_shoushu_count_sum']/ $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_shoushu_rate_sum'] = 0;
        }
        $data['tengtong_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_shoushu_rate_sum']=$data['tengtong_shoushu_count_sum']/ $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_shoushu_rate_sum'] = 0;
        }
        $data['qita_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '其他');
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_shoushu_rate_sum']=$data['qita_shoushu_count_sum']/ $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_shoushu_rate_sum'] = 0;
        }
        $data['neike_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '内科');
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_shoushu_rate_sum']=$data['neike_shoushu_count_sum']/ $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_shoushu_rate_sum'] = 0;
        }
        $data['zhongyi_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '中医');
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_shoushu_rate_sum']=$data['zhongyi_shoushu_count_sum']/ $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_shoushu_rate_sum'] = 0;
        }
        $data['zongmenzhen_shoushu_sum'] = $data['nanke_shoushu_count_sum'] + $data['waike_shoushu_count_sum'] + $data['chanke_shoushu_count_sum'] + $data['erbihou_shoushu_count_sum'] + $data['tengtong_shoushu_count_sum'] + $data['qita_shoushu_count_sum'] + $data['neike_shoushu_count_sum'] + $data['zhongyi_shoushu_count_sum'];
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_shoushu_rate_sum']=$data['zongmenzhen_shoushu_sum']/ $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_shoushu_rate_sum'] = 0;
        }
        
//      当月累计人均
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_renjun_sum'] = $data['nanke_menzhenxiaofei_sum'] / $data['nanke_chuzhen_count_sum'];
        } else {
            $data['nanke_renjun_sum'] = 0;
        }
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_renjun_sum'] = $data['waike_menzhenxiaofei_sum'] / $data['waike_chuzhen_count_sum'];
        } else {
            $data['waike_renjun_sum'] = 0;
        }
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_renjun_sum'] = $data['chanke_menzhenxiaofei_sum'] / $data['chanke_chuzhen_count_sum'];
        } else {
            $data['chanke_renjun_sum'] = 0;
        }
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_renjun_sum'] = $data['erbihou_menzhenxiaofei_sum'] / $data['erbihou_chuzhen_count_sum'];
        } else {
            $data['erbihou_renjun_sum'] = 0;
        }
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_renjun_sum'] = $data['tengtong_menzhenxiaofei_sum'] / $data['tengtong_chuzhen_count_sum'];
        } else {
            $data['tengtong_renjun_sum'] = 0;
        }
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_renjun_sum'] = $data['qita_menzhenxiaofei_sum'] / $data['qita_chuzhen_count_sum'];
        } else {
            $data['qita_renjun_sum'] = 0;
        }
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_renjun_sum'] = $data['neike_menzhenxiaofei_sum'] / $data['neike_chuzhen_count_sum'];
        } else {
            $data['neike_renjun_sum'] = 0;
        }
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_renjun_sum'] = $data['zhongyi_menzhenxiaofei_sum'] / $data['zhongyi_chuzhen_count_sum'];
        } else {
            $data['zhongyi_renjun_sum'] = 0;
        }
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_renjun_sum'] = $data['zongmenzhen_menzhenxiaofei_sum'] / $data['zongmenzhen_chuzhen_sum'];
        } else {
            $data['zongmenzhen_renjun_sum'] = 0;
        }
        
        
//      每日收支
        $data['xianjinshouru']=0;
        $data['yinlian']=0;
        $data['yibao']=0;
        $data['dangrizhichu']=0;
        $data['dabizhichu']=0;
        if(!empty($menzhen_shouru_every)){
            foreach($menzhen_shouru_every as $val){
                $data['xianjinshouru']=$val->xianjinshouru;
                $data['yinlian']=$val->yinlian;
                $data['yibao']=$val->yibao;
                $data['dangrizhichu']=$val->dangrizhichu;
                $data['dabizhichu']=$val->dabizhichu;
                
            }
            
        }
        $data['zongyeji']=$data['xianjinshouru']+$data['yinlian']+$data['yibao'];
        
//      每日收支累计
        $data['xianjinshouru_sum']=0;
        $data['yinlian_sum']=0;
        $data['yibao_sum']=0;
        $data['dangrizhichu_sum']=0;
        $data['dabizhichu_sum']=0;
        if(!empty($menzhen_shouru_every_sum)){
            foreach($menzhen_shouru_every_sum as $val){
                $data['xianjinshouru_sum']=$data['xianjinshouru_sum']+$val->xianjinshouru;
                $data['yinlian_sum']=$data['yinlian_sum']+$val->yinlian;
                $data['yibao_sum']=$data['yibao_sum']+$val->yibao;
                $data['dangrizhichu_sum']=$data['dangrizhichu_sum']+$val->dangrizhichu;
                $data['dabizhichu_sum']=$data['dabizhichu_sum']+$val->dabizhichu;
                
            }
            
        }
        $data['zongyeji_sum']=$data['xianjinshouru_sum']+$data['yinlian_sum']+$data['yibao_sum'];
        $data['zhichu_sum']=$data['dangrizhichu_sum']+$data['dabizhichu_sum'];
        

        
//        var_dump($patients);
        $data['date_every']=$date_every;
        $this->load->view('patients_menzhen_every_v',$data);
    }
    
    public function menzhen_patients_every_sel(){
        $date_every=$_POST['date_every'];
        $menzhen_shouru_every = $this->patients_m->menzhen_shouru_every_select($date_every);
        $menzhen_shouru_every_sum = $this->patients_m->menzhen_shouru_every_select_sum($date_every);
        $patients = $this->patients_m->patients_select($date_every);
        
//      初诊
        $data['nanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '初诊');
        $data['waike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '初诊');
        $data['neike_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '初诊');
        $data['zongmenzhen_chuzhen'] = $data['nanke_chuzhen_count'] + $data['waike_chuzhen_count'] + $data['chanke_chuzhen_count'] + $data['erbihou_chuzhen_count'] + $data['tengtong_chuzhen_count'] + $data['qita_chuzhen_count'] + $data['neike_chuzhen_count'] + $data['zhongyi_chuzhen_count'];
//      复诊
        $data['nanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '男科', '复诊');
        $data['waike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '其他', '复诊');
        $data['neike_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count'] = $this->patients_m->patients_select_keshi($date_every, '中医', '复诊');
        $data['zongmenzhen_fuzhen'] = $data['nanke_fuzhen_count'] + $data['waike_fuzhen_count'] + $data['chanke_fuzhen_count'] + $data['erbihou_fuzhen_count'] + $data['tengtong_fuzhen_count'] + $data['qita_fuzhen_count'] + $data['neike_fuzhen_count'] + $data['zhongyi_fuzhen_count'];
//      流失
        $data['nanke_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '男科');
        $data['waike_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '外科');
        $data['chanke_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '产科');
        $data['erbihou_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '耳鼻喉');
        $data['tengtong_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '疼痛科');
        $data['qita_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '其他');
        $data['neike_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '内科');
        $data['zhongyi_liushi_count']=$this->patients_m->patients_select_liushi($date_every, '中医');
        $data['zongmenzhen_liushi'] = $data['nanke_liushi_count'] + $data['waike_liushi_count'] + $data['chanke_liushi_count'] + $data['erbihou_liushi_count'] + $data['tengtong_liushi_count'] + $data['qita_liushi_count'] + $data['neike_liushi_count'] + $data['zhongyi_liushi_count'];
//      治疗费
        $nanke_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '男科');
        $data['nanke_zhiliaofei']=0;
        if(!empty($nanke_zhiliaofei)){
            foreach ($nanke_zhiliaofei as $val){
            $data['nanke_zhiliaofei']=$data['nanke_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $waike_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '外科');
        $data['waike_zhiliaofei']=0;
        if(!empty($waike_zhiliaofei)){
            foreach ($waike_zhiliaofei as $val){
            $data['waike_zhiliaofei']=$data['waike_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $chanke_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '产科');
        $data['chanke_zhiliaofei']=0;
        if(!empty($chanke_zhiliaofei)){
            foreach ($chanke_zhiliaofei as $val){
            $data['chanke_zhiliaofei']=$data['chanke_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $erbihou_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '耳鼻喉');
        $data['erbihou_zhiliaofei']=0;
        if(!empty($erbihou_zhiliaofei)){
            foreach ($erbihou_zhiliaofei as $val){
            $data['erbihou_zhiliaofei']=$data['erbihou_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $tengtong_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '疼痛科');
        $data['tengtong_zhiliaofei']=0;
        if(!empty($tengtong_zhiliaofei)){
            foreach ($tengtong_zhiliaofei as $val){
            $data['tengtong_zhiliaofei']=$data['tengtong_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $qita_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '其他');
        $data['qita_zhiliaofei']=0;
        if(!empty($qita_zhiliaofei)){
            foreach ($qita_zhiliaofei as $val){
            $data['qita_zhiliaofei']=$data['qita_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $neike_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '内科');
        $data['neike_zhiliaofei']=0;
        if(!empty($neike_zhiliaofei)){
            foreach ($neike_zhiliaofei as $val){
            $data['neike_zhiliaofei']=$data['neike_zhiliaofei']+$val->zhiliaofei;
        }
        }
        $zhongyi_zhiliaofei=$this->patients_m->patients_select_zhiliaofei($date_every, '中医');
        $data['zhongyi_zhiliaofei']=0;
        if(!empty($zhongyi_zhiliaofei)){
            foreach ($zhongyi_zhiliaofei as $val){
            $data['zhongyi_zhiliaofei']=$data['zhongyi_zhiliaofei']+$val->zhiliaofei;
            }
        }
        $data['zongmenzhen_zhiliaofei'] = $data['nanke_zhiliaofei'] + $data['waike_zhiliaofei'] + $data['chanke_zhiliaofei'] + $data['erbihou_zhiliaofei'] + $data['tengtong_zhiliaofei'] + $data['qita_zhiliaofei'] + $data['neike_zhiliaofei'] + $data['zhongyi_zhiliaofei'];
        
//      手术费
        $nanke_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '男科');
        $data['nanke_shoushufei']=0;
        if(!empty($nanke_shoushufei)){
            foreach ($nanke_shoushufei as $val){
            $data['nanke_shoushufei']=$data['nanke_shoushufei']+$val->shoushufei;
            }
        }
        $waike_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '外科');
        $data['waike_shoushufei']=0;
        if(!empty($waike_shoushufei)){
            foreach ($waike_shoushufei as $val){
            $data['waike_shoushufei']=$data['waike_shoushufei']+$val->shoushufei;
            }
        }
        $chanke_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '产科');
        $data['chanke_shoushufei']=0;
        if(!empty($chanke_shoushufei)){
            foreach ($chanke_shoushufei as $val){
            $data['chanke_shoushufei']=$data['chanke_shoushufei']+$val->shoushufei;
            }
        }
        $erbihou_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '耳鼻喉');
        $data['erbihou_shoushufei']=0;
        if(!empty($erbihou_shoushufei)){
            foreach ($erbihou_shoushufei as $val){
            $data['erbihou_shoushufei']=$data['erbihou_shoushufei']+$val->shoushufei;
            }
        }
        $tengtong_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '疼痛科');
        $data['tengtong_shoushufei']=0;
        if(!empty($tengtong_shoushufei)){
            foreach ($tengtong_shoushufei as $val){
            $data['tengtong_shoushufei']=$data['tengtong_shoushufei']+$val->shoushufei;
            }
        }
        $qita_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '其他');
        $data['qita_shoushufei']=0;
        if(!empty($qita_shoushufei)){
            foreach ($qita_shoushufei as $val){
            $data['qita_shoushufei']=$data['qita_shoushufei']+$val->shoushufei;
            }
        }
        $neike_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '内科');
        $data['neike_shoushufei']=0;
        if(!empty($neike_shoushufei)){
            foreach ($neike_shoushufei as $val){
            $data['neike_shoushufei']=$data['neike_shoushufei']+$val->shoushufei;
            }
        }
        $zhongyi_shoushufei=$this->patients_m->patients_select_shoushufei($date_every, '中医');
        $data['zhongyi_shoushufei']=0;
        if(!empty($zhongyi_shoushufei)){
            foreach ($zhongyi_shoushufei as $val){
            $data['zhongyi_shoushufei']=$data['zhongyi_shoushufei']+$val->shoushufei;
            }
        }
        $data['zongmenzhen_shoushufei'] = $data['nanke_shoushufei'] + $data['waike_shoushufei'] + $data['chanke_shoushufei'] + $data['erbihou_shoushufei'] + $data['tengtong_shoushufei'] + $data['qita_shoushufei'] + $data['neike_shoushufei'] + $data['zhongyi_shoushufei'];
        
//      门诊消费
        $nanke_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '男科');
        $data['nanke_menzhenxiaofei']=0;
        if(!empty($nanke_menzhenxiaofei)){
            foreach ($nanke_menzhenxiaofei as $val){
            $data['nanke_menzhenxiaofei']=$data['nanke_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $waike_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '外科');
        $data['waike_menzhenxiaofei']=0;
        if(!empty($waike_menzhenxiaofei)){
            foreach ($waike_menzhenxiaofei as $val){
            $data['waike_menzhenxiaofei']=$data['waike_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $chanke_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '产科');
        $data['chanke_menzhenxiaofei']=0;
        if(!empty($chanke_menzhenxiaofei)){
            foreach ($chanke_menzhenxiaofei as $val){
            $data['chanke_menzhenxiaofei']=$data['chanke_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $erbihou_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '耳鼻喉');
        $data['erbihou_menzhenxiaofei']=0;
        if(!empty($erbihou_menzhenxiaofei)){
            foreach ($erbihou_menzhenxiaofei as $val){
            $data['erbihou_menzhenxiaofei']=$data['erbihou_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $tengtong_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '疼痛科');
        $data['tengtong_menzhenxiaofei']=0;
        if(!empty($tengtong_menzhenxiaofei)){
            foreach ($tengtong_menzhenxiaofei as $val){
            $data['tengtong_menzhenxiaofei']=$data['tengtong_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $qita_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '其他');
        $data['qita_menzhenxiaofei']=0;
        if(!empty($qita_menzhenxiaofei)){
            foreach ($qita_menzhenxiaofei as $val){
            $data['qita_menzhenxiaofei']=$data['qita_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $neike_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '内科');
        $data['neike_menzhenxiaofei']=0;
        if(!empty($neike_menzhenxiaofei)){
            foreach ($neike_menzhenxiaofei as $val){
            $data['neike_menzhenxiaofei']=$data['neike_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $zhongyi_menzhenxiaofei=$this->patients_m->patients_select_menzhenxiaofei($date_every, '中医');
        $data['zhongyi_menzhenxiaofei']=0;
        if(!empty($zhongyi_menzhenxiaofei)){
            foreach ($zhongyi_menzhenxiaofei as $val){
            $data['zhongyi_menzhenxiaofei']=$data['zhongyi_menzhenxiaofei']+$val->menzhenxiaofei;
        }
        }
        $data['zongmenzhen_menzhenxiaofei'] = $data['nanke_menzhenxiaofei'] + $data['waike_menzhenxiaofei'] + $data['chanke_menzhenxiaofei'] + $data['erbihou_menzhenxiaofei'] + $data['tengtong_menzhenxiaofei'] + $data['qita_menzhenxiaofei'] + $data['neike_menzhenxiaofei'] + $data['zhongyi_menzhenxiaofei'];
        
//      复诊率
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_fuzhenlv'] = $data['nanke_fuzhen_count'] / $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_fuzhenlv'] = 0;
        }
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_fuzhenlv'] = $data['waike_fuzhen_count'] / $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_fuzhenlv'] = 0;
        }
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_fuzhenlv'] = $data['chanke_fuzhen_count'] / $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_fuzhenlv'] = 0;
        }
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_fuzhenlv'] = $data['erbihou_fuzhen_count'] / $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_fuzhenlv'] = 0;
        }
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_fuzhenlv'] = $data['tengtong_fuzhen_count'] / $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_fuzhenlv'] = 0;
        }
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_fuzhenlv'] = $data['qita_fuzhen_count'] / $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_fuzhenlv'] = 0;
        }
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_fuzhenlv'] = $data['neike_fuzhen_count'] / $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_fuzhenlv'] = 0;
        }
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_fuzhenlv'] = $data['zhongyi_fuzhen_count'] / $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_fuzhenlv'] = 0;
        }
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_fuzhenlv'] = $data['zongmenzhen_fuzhen'] / $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_fuzhenlv'] = 0;
        }
        
//      治疗比
        $data['nanke_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '男科');
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_zhiliao_rate']=$data['nanke_zhiliao_count']/ $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_zhiliao_rate'] = 0;
        }
        $data['waike_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '外科');
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_zhiliao_rate']=$data['waike_zhiliao_count']/ $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_zhiliao_rate'] = 0;
        }
        $data['chanke_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '产科');
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_zhiliao_rate']=$data['chanke_zhiliao_count']/ $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_zhiliao_rate'] = 0;
        }
        $data['erbihou_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_zhiliao_rate']=$data['erbihou_zhiliao_count']/ $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_zhiliao_rate'] = 0;
        }
        $data['tengtong_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_zhiliao_rate']=$data['tengtong_zhiliao_count']/ $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_zhiliao_rate'] = 0;
        }
        $data['qita_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '其他');
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_zhiliao_rate']=$data['qita_zhiliao_count']/ $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_zhiliao_rate'] = 0;
        }
        $data['neike_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '内科');
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_zhiliao_rate']=$data['neike_zhiliao_count']/ $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_zhiliao_rate'] = 0;
        }
        $data['zhongyi_zhiliao_count']=$this->patients_m->patients_select_zhiliao($date_every, '中医');
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_zhiliao_rate']=$data['zhongyi_zhiliao_count']/ $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_zhiliao_rate'] = 0;
        }
        $data['zongmenzhen_zhiliao'] = $data['nanke_zhiliao_count'] + $data['waike_zhiliao_count'] + $data['chanke_zhiliao_count'] + $data['erbihou_zhiliao_count'] + $data['tengtong_zhiliao_count'] + $data['qita_zhiliao_count'] + $data['neike_zhiliao_count'] + $data['zhongyi_zhiliao_count'];
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_zhiliao_rate']=$data['zongmenzhen_zhiliao']/ $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_zhiliao_rate'] = 0;
        }

        
//      手术比
        $data['nanke_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '男科');
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_shoushu_rate']=$data['nanke_shoushu_count']/ $data['nanke_chuzhen_count'] * 100;
        } else {
            $data['nanke_shoushu_rate'] = 0;
        }
        $data['waike_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '外科');
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_shoushu_rate']=$data['waike_shoushu_count']/ $data['waike_chuzhen_count'] * 100;
        } else {
            $data['waike_shoushu_rate'] = 0;
        }
        $data['chanke_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '产科');
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_shoushu_rate']=$data['chanke_shoushu_count']/ $data['chanke_chuzhen_count'] * 100;
        } else {
            $data['chanke_shoushu_rate'] = 0;
        }
        $data['erbihou_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_shoushu_rate']=$data['erbihou_shoushu_count']/ $data['erbihou_chuzhen_count'] * 100;
        } else {
            $data['erbihou_shoushu_rate'] = 0;
        }
        $data['tengtong_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_shoushu_rate']=$data['tengtong_shoushu_count']/ $data['tengtong_chuzhen_count'] * 100;
        } else {
            $data['tengtong_shoushu_rate'] = 0;
        }
        $data['qita_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '其他');
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_shoushu_rate']=$data['qita_shoushu_count']/ $data['qita_chuzhen_count'] * 100;
        } else {
            $data['qita_shoushu_rate'] = 0;
        }
        $data['neike_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '内科');
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_shoushu_rate']=$data['neike_shoushu_count']/ $data['neike_chuzhen_count'] * 100;
        } else {
            $data['neike_shoushu_rate'] = 0;
        }
        $data['zhongyi_shoushu_count']=$this->patients_m->patients_select_shoushu($date_every, '中医');
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_shoushu_rate']=$data['zhongyi_shoushu_count']/ $data['zhongyi_chuzhen_count'] * 100;
        } else {
            $data['zhongyi_shoushu_rate'] = 0;
        }
        $data['zongmenzhen_shoushu'] = $data['nanke_shoushu_count'] + $data['waike_shoushu_count'] + $data['chanke_shoushu_count'] + $data['erbihou_shoushu_count'] + $data['tengtong_shoushu_count'] + $data['qita_shoushu_count'] + $data['neike_shoushu_count'] + $data['zhongyi_shoushu_count'];
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_shoushu_rate']=$data['zongmenzhen_shoushu']/ $data['zongmenzhen_chuzhen'] * 100;
        } else {
            $data['zongmenzhen_shoushu_rate'] = 0;
        }
        
//      人均
        if ($data['nanke_chuzhen_count'] != 0) {
            $data['nanke_renjun'] = $data['nanke_menzhenxiaofei'] / $data['nanke_chuzhen_count'];
        } else {
            $data['nanke_renjun'] = 0;
        }
        if ($data['waike_chuzhen_count'] != 0) {
            $data['waike_renjun'] = $data['waike_menzhenxiaofei'] / $data['waike_chuzhen_count'];
        } else {
            $data['waike_renjun'] = 0;
        }
        if ($data['chanke_chuzhen_count'] != 0) {
            $data['chanke_renjun'] = $data['chanke_menzhenxiaofei'] / $data['chanke_chuzhen_count'];
        } else {
            $data['chanke_renjun'] = 0;
        }
        if ($data['erbihou_chuzhen_count'] != 0) {
            $data['erbihou_renjun'] = $data['erbihou_menzhenxiaofei'] / $data['erbihou_chuzhen_count'];
        } else {
            $data['erbihou_renjun'] = 0;
        }
        if ($data['tengtong_chuzhen_count'] != 0) {
            $data['tengtong_renjun'] = $data['tengtong_menzhenxiaofei'] / $data['tengtong_chuzhen_count'];
        } else {
            $data['tengtong_renjun'] = 0;
        }
        if ($data['qita_chuzhen_count'] != 0) {
            $data['qita_renjun'] = $data['qita_menzhenxiaofei'] / $data['qita_chuzhen_count'];
        } else {
            $data['qita_renjun'] = 0;
        }
        if ($data['neike_chuzhen_count'] != 0) {
            $data['neike_renjun'] = $data['neike_menzhenxiaofei'] / $data['neike_chuzhen_count'];
        } else {
            $data['neike_renjun'] = 0;
        }
        if ($data['zhongyi_chuzhen_count'] != 0) {
            $data['zhongyi_renjun'] = $data['zhongyi_menzhenxiaofei'] / $data['zhongyi_chuzhen_count'];
        } else {
            $data['zhongyi_renjun'] = 0;
        }
        if ($data['zongmenzhen_chuzhen'] != 0) {
            $data['zongmenzhen_renjun'] = $data['zongmenzhen_menzhenxiaofei'] / $data['zongmenzhen_chuzhen'];
        } else {
            $data['zongmenzhen_renjun'] = 0;
        }
        
        
//      当月累计
//      当月累计初诊
        $data['nanke_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '男科', '初诊');
        $data['waike_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '外科', '初诊');
        $data['chanke_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '产科', '初诊');
        $data['erbihou_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '耳鼻喉', '初诊');
        $data['tengtong_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '疼痛科', '初诊');
        $data['qita_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '其他', '初诊');
        $data['neike_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '内科', '初诊');
        $data['zhongyi_chuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '中医', '初诊');
        $data['zongmenzhen_chuzhen_sum'] = $data['nanke_chuzhen_count_sum'] + $data['waike_chuzhen_count_sum'] + $data['chanke_chuzhen_count_sum'] + $data['erbihou_chuzhen_count_sum'] + $data['tengtong_chuzhen_count_sum'] + $data['qita_chuzhen_count_sum'] + $data['neike_chuzhen_count_sum'] + $data['zhongyi_chuzhen_count_sum'];
//      当月累计复诊
        $data['nanke_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '男科', '复诊');
        $data['waike_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '外科', '复诊');
        $data['chanke_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '产科', '复诊');
        $data['erbihou_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '耳鼻喉', '复诊');
        $data['tengtong_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '疼痛科', '复诊');
        $data['qita_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '其他', '复诊');
        $data['neike_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '内科', '复诊');
        $data['zhongyi_fuzhen_count_sum'] = $this->patients_m->patients_select_keshi_sum($date_every, '中医', '复诊');
        $data['zongmenzhen_fuzhen_sum'] = $data['nanke_fuzhen_count_sum'] + $data['waike_fuzhen_count_sum'] + $data['chanke_fuzhen_count_sum'] + $data['erbihou_fuzhen_count_sum'] + $data['tengtong_fuzhen_count_sum'] + $data['qita_fuzhen_count_sum'] + $data['neike_fuzhen_count_sum'] + $data['zhongyi_fuzhen_count_sum'];
//      当月累计流失
        $data['nanke_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '男科');
        $data['waike_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '外科');
        $data['chanke_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '产科');
        $data['erbihou_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '耳鼻喉');
        $data['tengtong_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '疼痛科');
        $data['qita_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '其他');
        $data['neike_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '内科');
        $data['zhongyi_liushi_count_sum']=$this->patients_m->patients_select_liushi_sum($date_every, '中医');
        $data['zongmenzhen_liushi_sum'] = $data['nanke_liushi_count_sum'] + $data['waike_liushi_count_sum'] + $data['chanke_liushi_count_sum'] + $data['erbihou_liushi_count_sum'] + $data['tengtong_liushi_count_sum'] + $data['qita_liushi_count_sum'] + $data['neike_liushi_count_sum'] + $data['zhongyi_liushi_count_sum'];
//      当月累计治疗费
        $nanke_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '男科');
        $data['nanke_zhiliaofei_sum']=0;
        if(!empty($nanke_zhiliaofei_sum)){
            foreach ($nanke_zhiliaofei_sum as $val){
            $data['nanke_zhiliaofei_sum']=$data['nanke_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $waike_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '外科');
        $data['waike_zhiliaofei_sum']=0;
        if(!empty($waike_zhiliaofei_sum)){
            foreach ($waike_zhiliaofei_sum as $val){
            $data['waike_zhiliaofei_sum']=$data['waike_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $chanke_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '产科');
        $data['chanke_zhiliaofei_sum']=0;
        if(!empty($chanke_zhiliaofei_sum)){
            foreach ($chanke_zhiliaofei_sum as $val){
            $data['chanke_zhiliaofei_sum']=$data['chanke_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $erbihou_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '耳鼻喉');
        $data['erbihou_zhiliaofei_sum']=0;
        if(!empty($erbihou_zhiliaofei_sum)){
            foreach ($erbihou_zhiliaofei_sum as $val){
            $data['erbihou_zhiliaofei_sum']=$data['erbihou_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $tengtong_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '疼痛科');
        $data['tengtong_zhiliaofei_sum']=0;
        if(!empty($tengtong_zhiliaofei_sum)){
            foreach ($tengtong_zhiliaofei_sum as $val){
            $data['tengtong_zhiliaofei_sum']=$data['tengtong_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $qita_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '其他');
        $data['qita_zhiliaofei_sum']=0;
        if(!empty($qita_zhiliaofei_sum)){
            foreach ($qita_zhiliaofei_sum as $val){
            $data['qita_zhiliaofei_sum']=$data['qita_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $neike_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '内科');
        $data['neike_zhiliaofei_sum']=0;
        if(!empty($neike_zhiliaofei_sum)){
            foreach ($neike_zhiliaofei_sum as $val){
            $data['neike_zhiliaofei_sum']=$data['neike_zhiliaofei_sum']+$val->zhiliaofei;
        }
        }
        $zhongyi_zhiliaofei_sum=$this->patients_m->patients_select_zhiliaofei_sum($date_every, '中医');
        $data['zhongyi_zhiliaofei_sum']=0;
        if(!empty($zhongyi_zhiliaofei_sum)){
            foreach ($zhongyi_zhiliaofei_sum as $val){
            $data['zhongyi_zhiliaofei_sum']=$data['zhongyi_zhiliaofei_sum']+$val->zhiliaofei;
            }
        }
        $data['zongmenzhen_zhiliaofei_sum'] = $data['nanke_zhiliaofei_sum'] + $data['waike_zhiliaofei_sum'] + $data['chanke_zhiliaofei_sum'] + $data['erbihou_zhiliaofei_sum'] + $data['tengtong_zhiliaofei_sum'] + $data['qita_zhiliaofei_sum'] + $data['neike_zhiliaofei_sum'] + $data['zhongyi_zhiliaofei_sum'];
        
//      当月累计手术费
        $nanke_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '男科');
        $data['nanke_shoushufei_sum']=0;
        if(!empty($nanke_shoushufei_sum)){
            foreach ($nanke_shoushufei_sum as $val){
            $data['nanke_shoushufei_sum']=$data['nanke_shoushufei_sum']+$val->shoushufei;
            }
        }
        $waike_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '外科');
        $data['waike_shoushufei_sum']=0;
        if(!empty($waike_shoushufei_sum)){
            foreach ($waike_shoushufei_sum as $val){
            $data['waike_shoushufei_sum']=$data['waike_shoushufei_sum']+$val->shoushufei;
            }
        }
        $chanke_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '产科');
        $data['chanke_shoushufei_sum']=0;
        if(!empty($chanke_shoushufei_sum)){
            foreach ($chanke_shoushufei_sum as $val){
            $data['chanke_shoushufei_sum']=$data['chanke_shoushufei_sum']+$val->shoushufei;
            }
        }
        $erbihou_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '耳鼻喉');
        $data['erbihou_shoushufei_sum']=0;
        if(!empty($erbihou_shoushufei_sum)){
            foreach ($erbihou_shoushufei_sum as $val){
            $data['erbihou_shoushufei_sum']=$data['erbihou_shoushufei_sum']+$val->shoushufei;
            }
        }
        $tengtong_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '疼痛科');
        $data['tengtong_shoushufei_sum']=0;
        if(!empty($tengtong_shoushufei_sum)){
            foreach ($tengtong_shoushufei_sum as $val){
            $data['tengtong_shoushufei_sum']=$data['tengtong_shoushufei_sum']+$val->shoushufei;
            }
        }
        $qita_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '其他');
        $data['qita_shoushufei_sum']=0;
        if(!empty($qita_shoushufei_sum)){
            foreach ($qita_shoushufei_sum as $val){
            $data['qita_shoushufei_sum']=$data['qita_shoushufei_sum']+$val->shoushufei;
            }
        }
        $neike_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '内科');
        $data['neike_shoushufei_sum']=0;
        if(!empty($neike_shoushufei_sum)){
            foreach ($neike_shoushufei_sum as $val){
            $data['neike_shoushufei_sum']=$data['neike_shoushufei_sum']+$val->shoushufei;
            }
        }
        $zhongyi_shoushufei_sum=$this->patients_m->patients_select_shoushufei_sum($date_every, '中医');
        $data['zhongyi_shoushufei_sum']=0;
        if(!empty($zhongyi_shoushufei_sum)){
            foreach ($zhongyi_shoushufei_sum as $val){
            $data['zhongyi_shoushufei_sum']=$data['zhongyi_shoushufei_sum']+$val->shoushufei;
            }
        }
        $data['zongmenzhen_shoushufei_sum'] = $data['nanke_shoushufei_sum'] + $data['waike_shoushufei_sum'] + $data['chanke_shoushufei_sum'] + $data['erbihou_shoushufei_sum'] + $data['tengtong_shoushufei_sum'] + $data['qita_shoushufei_sum'] + $data['neike_shoushufei_sum'] + $data['zhongyi_shoushufei_sum'];
        
//      当月累计门诊消费
        $nanke_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '男科');
        $data['nanke_menzhenxiaofei_sum']=0;
        if(!empty($nanke_menzhenxiaofei_sum)){
            foreach ($nanke_menzhenxiaofei_sum as $val){
            $data['nanke_menzhenxiaofei_sum']=$data['nanke_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $waike_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '外科');
        $data['waike_menzhenxiaofei_sum']=0;
        if(!empty($waike_menzhenxiaofei_sum)){
            foreach ($waike_menzhenxiaofei_sum as $val){
            $data['waike_menzhenxiaofei_sum']=$data['waike_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $chanke_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '产科');
        $data['chanke_menzhenxiaofei_sum']=0;
        if(!empty($chanke_menzhenxiaofei_sum)){
            foreach ($chanke_menzhenxiaofei_sum as $val){
            $data['chanke_menzhenxiaofei_sum']=$data['chanke_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $erbihou_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '耳鼻喉');
        $data['erbihou_menzhenxiaofei_sum']=0;
        if(!empty($erbihou_menzhenxiaofei_sum)){
            foreach ($erbihou_menzhenxiaofei_sum as $val){
            $data['erbihou_menzhenxiaofei_sum']=$data['erbihou_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $tengtong_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '疼痛科');
        $data['tengtong_menzhenxiaofei_sum']=0;
        if(!empty($tengtong_menzhenxiaofei_sum)){
            foreach ($tengtong_menzhenxiaofei_sum as $val){
            $data['tengtong_menzhenxiaofei_sum']=$data['tengtong_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $qita_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '其他');
        $data['qita_menzhenxiaofei_sum']=0;
        if(!empty($qita_menzhenxiaofei_sum)){
            foreach ($qita_menzhenxiaofei_sum as $val){
            $data['qita_menzhenxiaofei_sum']=$data['qita_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $neike_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '内科');
        $data['neike_menzhenxiaofei_sum']=0;
        if(!empty($neike_menzhenxiaofei_sum)){
            foreach ($neike_menzhenxiaofei_sum as $val){
            $data['neike_menzhenxiaofei_sum']=$data['neike_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $zhongyi_menzhenxiaofei_sum=$this->patients_m->patients_select_menzhenxiaofei_sum($date_every, '中医');
        $data['zhongyi_menzhenxiaofei_sum']=0;
        if(!empty($zhongyi_menzhenxiaofei_sum)){
            foreach ($zhongyi_menzhenxiaofei_sum as $val){
            $data['zhongyi_menzhenxiaofei_sum']=$data['zhongyi_menzhenxiaofei_sum']+$val->menzhenxiaofei;
        }
        }
        $data['zongmenzhen_menzhenxiaofei_sum'] = $data['nanke_menzhenxiaofei_sum'] + $data['waike_menzhenxiaofei_sum'] + $data['chanke_menzhenxiaofei_sum'] + $data['erbihou_menzhenxiaofei_sum'] + $data['tengtong_menzhenxiaofei_sum'] + $data['qita_menzhenxiaofei_sum'] + $data['neike_menzhenxiaofei_sum'] + $data['zhongyi_menzhenxiaofei_sum'];
        
//      当月累计复诊率
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_fuzhenlv_sum'] = $data['nanke_fuzhen_count_sum'] / $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_fuzhenlv_sum'] = 0;
        }
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_fuzhenlv_sum'] = $data['waike_fuzhen_count_sum'] / $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_fuzhenlv_sum'] = 0;
        }
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_fuzhenlv_sum'] = $data['chanke_fuzhen_count_sum'] / $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_fuzhenlv_sum'] = 0;
        }
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_fuzhenlv_sum'] = $data['erbihou_fuzhen_count_sum'] / $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_fuzhenlv_sum'] = 0;
        }
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_fuzhenlv_sum'] = $data['tengtong_fuzhen_count_sum'] / $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_fuzhenlv_sum'] = 0;
        }
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_fuzhenlv_sum'] = $data['qita_fuzhen_count_sum'] / $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_fuzhenlv_sum'] = 0;
        }
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_fuzhenlv_sum'] = $data['neike_fuzhen_count_sum'] / $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_fuzhenlv_sum'] = 0;
        }
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_fuzhenlv_sum'] = $data['zhongyi_fuzhen_count_sum'] / $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_fuzhenlv_sum'] = 0;
        }
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_fuzhenlv_sum'] = $data['zongmenzhen_fuzhen_sum'] / $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_fuzhenlv_sum'] = 0;
        }
        
//      当月累计治疗比
        $data['nanke_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '男科');
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_zhiliao_rate_sum']=$data['nanke_zhiliao_count_sum']/ $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_zhiliao_rate_sum'] = 0;
        }
        $data['waike_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '外科');
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_zhiliao_rate_sum']=$data['waike_zhiliao_count_sum']/ $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_zhiliao_rate_sum'] = 0;
        }
        $data['chanke_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '产科');
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_zhiliao_rate_sum']=$data['chanke_zhiliao_count_sum']/ $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_zhiliao_rate_sum'] = 0;
        }
        $data['erbihou_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_zhiliao_rate_sum']=$data['erbihou_zhiliao_count_sum']/ $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_zhiliao_rate_sum'] = 0;
        }
        $data['tengtong_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_zhiliao_rate_sum']=$data['tengtong_zhiliao_count_sum']/ $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_zhiliao_rate_sum'] = 0;
        }
        $data['qita_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '其他');
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_zhiliao_rate_sum']=$data['qita_zhiliao_count_sum']/ $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_zhiliao_rate_sum'] = 0;
        }
        $data['neike_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '内科');
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_zhiliao_rate_sum']=$data['neike_zhiliao_count_sum']/ $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_zhiliao_rate_sum'] = 0;
        }
        $data['zhongyi_zhiliao_count_sum']=$this->patients_m->patients_select_zhiliao_sum($date_every, '中医');
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_zhiliao_rate_sum']=$data['zhongyi_zhiliao_count_sum']/ $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_zhiliao_rate_sum'] = 0;
        }
        $data['zongmenzhen_zhiliao_sum'] = $data['nanke_zhiliao_count_sum'] + $data['waike_zhiliao_count_sum'] + $data['chanke_zhiliao_count_sum'] + $data['erbihou_zhiliao_count_sum'] + $data['tengtong_zhiliao_count_sum'] + $data['qita_zhiliao_count_sum'] + $data['neike_zhiliao_count_sum'] + $data['zhongyi_zhiliao_count_sum'];
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_zhiliao_rate_sum']=$data['zongmenzhen_zhiliao_sum']/ $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_zhiliao_rate_sum'] = 0;
        }

        
//      当月累计手术比
        $data['nanke_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '男科');
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_shoushu_rate_sum']=$data['nanke_shoushu_count_sum']/ $data['nanke_chuzhen_count_sum'] * 100;
        } else {
            $data['nanke_shoushu_rate_sum'] = 0;
        }
        $data['waike_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '外科');
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_shoushu_rate_sum']=$data['waike_shoushu_count_sum']/ $data['waike_chuzhen_count_sum'] * 100;
        } else {
            $data['waike_shoushu_rate_sum'] = 0;
        }
        $data['chanke_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '产科');
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_shoushu_rate_sum']=$data['chanke_shoushu_count_sum']/ $data['chanke_chuzhen_count_sum'] * 100;
        } else {
            $data['chanke_shoushu_rate_sum'] = 0;
        }
        $data['erbihou_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '耳鼻喉');
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_shoushu_rate_sum']=$data['erbihou_shoushu_count_sum']/ $data['erbihou_chuzhen_count_sum'] * 100;
        } else {
            $data['erbihou_shoushu_rate_sum'] = 0;
        }
        $data['tengtong_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '疼痛科');
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_shoushu_rate_sum']=$data['tengtong_shoushu_count_sum']/ $data['tengtong_chuzhen_count_sum'] * 100;
        } else {
            $data['tengtong_shoushu_rate_sum'] = 0;
        }
        $data['qita_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '其他');
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_shoushu_rate_sum']=$data['qita_shoushu_count_sum']/ $data['qita_chuzhen_count_sum'] * 100;
        } else {
            $data['qita_shoushu_rate_sum'] = 0;
        }
        $data['neike_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '内科');
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_shoushu_rate_sum']=$data['neike_shoushu_count_sum']/ $data['neike_chuzhen_count_sum'] * 100;
        } else {
            $data['neike_shoushu_rate_sum'] = 0;
        }
        $data['zhongyi_shoushu_count_sum']=$this->patients_m->patients_select_shoushu_sum($date_every, '中医');
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_shoushu_rate_sum']=$data['zhongyi_shoushu_count_sum']/ $data['zhongyi_chuzhen_count_sum'] * 100;
        } else {
            $data['zhongyi_shoushu_rate_sum'] = 0;
        }
        $data['zongmenzhen_shoushu_sum'] = $data['nanke_shoushu_count_sum'] + $data['waike_shoushu_count_sum'] + $data['chanke_shoushu_count_sum'] + $data['erbihou_shoushu_count_sum'] + $data['tengtong_shoushu_count_sum'] + $data['qita_shoushu_count_sum'] + $data['neike_shoushu_count_sum'] + $data['zhongyi_shoushu_count_sum'];
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_shoushu_rate_sum']=$data['zongmenzhen_shoushu_sum']/ $data['zongmenzhen_chuzhen_sum'] * 100;
        } else {
            $data['zongmenzhen_shoushu_rate_sum'] = 0;
        }
        
//      当月累计人均
        if ($data['nanke_chuzhen_count_sum'] != 0) {
            $data['nanke_renjun_sum'] = $data['nanke_menzhenxiaofei_sum'] / $data['nanke_chuzhen_count_sum'];
        } else {
            $data['nanke_renjun_sum'] = 0;
        }
        if ($data['waike_chuzhen_count_sum'] != 0) {
            $data['waike_renjun_sum'] = $data['waike_menzhenxiaofei_sum'] / $data['waike_chuzhen_count_sum'];
        } else {
            $data['waike_renjun_sum'] = 0;
        }
        if ($data['chanke_chuzhen_count_sum'] != 0) {
            $data['chanke_renjun_sum'] = $data['chanke_menzhenxiaofei_sum'] / $data['chanke_chuzhen_count_sum'];
        } else {
            $data['chanke_renjun_sum'] = 0;
        }
        if ($data['erbihou_chuzhen_count_sum'] != 0) {
            $data['erbihou_renjun_sum'] = $data['erbihou_menzhenxiaofei_sum'] / $data['erbihou_chuzhen_count_sum'];
        } else {
            $data['erbihou_renjun_sum'] = 0;
        }
        if ($data['tengtong_chuzhen_count_sum'] != 0) {
            $data['tengtong_renjun_sum'] = $data['tengtong_menzhenxiaofei_sum'] / $data['tengtong_chuzhen_count_sum'];
        } else {
            $data['tengtong_renjun_sum'] = 0;
        }
        if ($data['qita_chuzhen_count_sum'] != 0) {
            $data['qita_renjun_sum'] = $data['qita_menzhenxiaofei_sum'] / $data['qita_chuzhen_count_sum'];
        } else {
            $data['qita_renjun_sum'] = 0;
        }
        if ($data['neike_chuzhen_count_sum'] != 0) {
            $data['neike_renjun_sum'] = $data['neike_menzhenxiaofei_sum'] / $data['neike_chuzhen_count_sum'];
        } else {
            $data['neike_renjun_sum'] = 0;
        }
        if ($data['zhongyi_chuzhen_count_sum'] != 0) {
            $data['zhongyi_renjun_sum'] = $data['zhongyi_menzhenxiaofei_sum'] / $data['zhongyi_chuzhen_count_sum'];
        } else {
            $data['zhongyi_renjun_sum'] = 0;
        }
        if ($data['zongmenzhen_chuzhen_sum'] != 0) {
            $data['zongmenzhen_renjun_sum'] = $data['zongmenzhen_menzhenxiaofei_sum'] / $data['zongmenzhen_chuzhen_sum'];
        } else {
            $data['zongmenzhen_renjun_sum'] = 0;
        }
        
        
//      每日收支
        $data['xianjinshouru']=0;
        $data['yinlian']=0;
        $data['yibao']=0;
        $data['dangrizhichu']=0;
        $data['dabizhichu']=0;
        if(!empty($menzhen_shouru_every)){
            foreach($menzhen_shouru_every as $val){
                $data['xianjinshouru']=$val->xianjinshouru;
                $data['yinlian']=$val->yinlian;
                $data['yibao']=$val->yibao;
                $data['dangrizhichu']=$val->dangrizhichu;
                $data['dabizhichu']=$val->dabizhichu;
                
            }
            
        }
        $data['zongyeji']=$data['xianjinshouru']+$data['yinlian']+$data['yibao'];
        
//      每日收支累计
        $data['xianjinshouru_sum']=0;
        $data['yinlian_sum']=0;
        $data['yibao_sum']=0;
        $data['dangrizhichu_sum']=0;
        $data['dabizhichu_sum']=0;
        if(!empty($menzhen_shouru_every_sum)){
            foreach($menzhen_shouru_every_sum as $val){
                $data['xianjinshouru_sum']=$data['xianjinshouru_sum']+$val->xianjinshouru;
                $data['yinlian_sum']=$data['yinlian_sum']+$val->yinlian;
                $data['yibao_sum']=$data['yibao_sum']+$val->yibao;
                $data['dangrizhichu_sum']=$data['dangrizhichu_sum']+$val->dangrizhichu;
                $data['dabizhichu_sum']=$data['dabizhichu_sum']+$val->dabizhichu;
                
            }
            
        }
        $data['zongyeji_sum']=$data['xianjinshouru_sum']+$data['yinlian_sum']+$data['yibao_sum'];
        $data['zhichu_sum']=$data['dangrizhichu_sum']+$data['dabizhichu_sum'];
        

        
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
