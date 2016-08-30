
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_add extends CI_Controller {

    public function info_add() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('info_add_m');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function drug_property_add() {
        $data['class_info'] = $this->info_add_m->class_info_select();
        $data['shangpin_info'] = $this->info_add_m->shangpin_info_select();
        $data['guige'] = $this->info_add_m->guige_select();
        $data['jixing'] = $this->info_add_m->jixing_select();
        $data['med_in_type'] = $this->info_add_m->med_in_type_select();
        $data['changjia'] = $this->info_add_m->changjia_select();
//        $data['supplier'] = $this->drug_purchase_m->supplier_select();
//        var_dump($data);
        $this->load->view('drug_property_add_v', $data);
    }
    
    public function add_drugs() {
        $arr['drug_id']=$_POST['drug_id'];
        $arr['class_id']=$_POST['class_info'];
        $arr['drug_name']=$_POST['drug_name'];
        $arr['shangpin_id']=$_POST['shangpin_info'];
        $arr['jixing_id']=$_POST['jixing'];
        $arr['guige_id']=$_POST['guige'];
        $arr['med_in_type_id']=$_POST['med_in_type'];
        $arr['changjia_id']=$_POST['changjia'];
        var_dump($arr);
        $this->info_add_m->add_to_drugs($arr);
    }

    public function class_info_set() {
        $class_id = $_POST['class_info'];
        $shangpin_info = $this->info_add_m->shangpin_info_select_by_id($class_id);
//        echo '<script>alert(\''.$class_id.'\');</script>';
        if(!empty($shangpin_info)){
            echo '<select style="width:180px;" name="shangpin_info" id="shangpin_info" class="TxtPasswordCssClass" onclick="guige_set(this)">';
            foreach ($shangpin_info as $shangpin_info_va) {
                echo '<option value="' . $shangpin_info_va->shangpin_id . '">' . $shangpin_info_va->shangpin_id . ' ' . $shangpin_info_va->shangpin_name . '</option>';
            }
            echo '</select>';
        }
        else{
            echo '<input type="text" name="shangpin_info" id="shangpin_info" class="TxtPasswordCssClass" />';
            echo '<script>alert("没有对应的商品信息，请先添加！");</script>';
        }
        
    }

    public function shangpin_info_set() {
        $shangpin_id = $_POST['shangpin_info'];
        $guige = $this->info_add_m->guige_select_by_id($shangpin_id);
//        echo '<script>alert(\''.$shangpin_id.'\');</script>';
        echo '<select style="width:180px;" name="guige" id="guige" class="TxtPasswordCssClass">';
        foreach ($guige as $guige_va) {
            echo '<option value="' . $guige_va->guige_id . '">' . $guige_va->guige_id . ' ' . $guige_va->guige_name . '</option>';
        }
        echo '</select>';
    }

    public function drug_id_gen() {//自动生成药品编号
//        echo '<script>alert("check");</script>';
        $drug_id_max = $this->info_add_m->drug_id_latest();
        foreach ($drug_id_max as $key => $drug_id_va) {
            $drug_id_max_v = $drug_id_va->drug_id;
//            echo '<script>alert(\''.$drug_id_va->drug_id.'\');</script>';
        }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
        if (!empty($drug_id_max_v)) {
//            echo '<script>alert(2);</script>';
//            echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            $sub_drug_id = substr($drug_id_max_v, -8);
//            echo '<script>alert(\''.$sub_drug_id.'\');</script>';

            $sub_drug_id = $sub_drug_id + 1;
//            echo '<script>alert(\''.$sub_drug_id.'\');</script>';
            $drug_id_max_v = "d" . $sub_drug_id;
//            echo '<script>alert(\''.$drug_id_max_v.'\');</script>';
        } else {
            $drug_id_max_v = 'd10000001';
        }
        echo '<script>$(function(){ document.subform.drug_id.value=\'' . $drug_id_max_v . '\'; })</script>';
    }

    public function drug_guige_add() {
        $data['class_info'] = $this->info_add_m->class_info_select();
        $data['shangpin_info'] = $this->info_add_m->shangpin_info_select();
//        $data['supplier'] = $this->drug_purchase_m->supplier_select();
//        var_dump($data);
        $this->load->view('drug_guige_add_v', $data);
    }

    public function guige_id_gen() {//自动生成规格编号
//        echo '<script>alert("check");</script>';
        $sub_guige_id = $_POST['sub_guige_id'];
        if (strlen($sub_guige_id) === 6) {
//        echo '<script>alert("'.$sub_guige_id.'");</script>';
            $guige_id_max = $this->info_add_m->guige_id_latest_as_shangpin_id($sub_guige_id);
            foreach ($guige_id_max as $key => $guige_id_va) {
                $guige_id_max_v = $guige_id_va->guige_id;
//            echo '<script>alert(\''.$guige_id_va->guige_id.'\');</script>';
            }
            //找出前6位与商品编号一致，且最大的编号
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($guige_id_max_v)) {//如果规格编号存在
                $guige_id_max_v = sprintf('%08s', $guige_id_max_v + 1); //“%05s ”表示输出成长度为5的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$guige_id_max_v.'\');</script>';
            } else {//如果规格编号不存在
//                echo '<script>alert("'.$sub_guige_id.'");</script>';
                $guige_id_max_v = $sub_guige_id . '01';//设置规格编号位商品编号+01
            }
            echo '<script>$(function(){ document.subform_guige.guige_id.value=\'' . $guige_id_max_v . '\'; })</script>';
        }
        else{//商品编号长度不上6位时
            $sub_guige_id=  substr($sub_guige_id, 0,6);
//            echo '<script>alert(\''.$sub_shangpin_id.'\');</script>';
            $guige_id_max = $this->info_add_m->guige_id_latest_as_shangpin_id($sub_shangpin_id);
            foreach ($guige_id_max as $key => $guige_id_va) {
                $guige_id_max_v = $guige_id_va->guige_id;
//            echo '<script>alert(\''.$shangpin_id_va->shangpin_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($guige_id_max_v)) {
                $guige_id_max_v = sprintf('%08s', $guige_id_max_v + 1); //“%05s ”表示输出成长度为5的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$shangpin_id_max_v.'\');</script>';
            } else {
                $guige_id_max_v = $sub_shangpin_id . '01';
            }
            echo '<script>$(function(){ document.subform_guige.guige_id.value=\'' . $guige_id_max_v . '\'; })</script>';
        }
    }
    
    public function guige_add() {//将商品信息插入数据库
        $arr['class_id']=$_POST['class_info'];
        $arr['shangpin_id']=$_POST['shangpin_info'];
        $arr['guige_id']=$_POST['guige_id'];
        $arr['guige_name']=$_POST['guige_name'];
        $this->info_add_m->add_to_guige($arr);
        $this->load->view('drug_guige_add_success_v');
        
    }

    public function drug_jixing_add() {
        $this->load->view('drug_jixing_add_v');
    }
    
    public function jixing_id_gen(){
//        echo '<script>alert("check");</script>';
            $jixing_id_max = $this->info_add_m->jixing_id_latest();
            foreach ($jixing_id_max as $key => $jixing_id_va) {
                $jixing_id_max_v = $jixing_id_va->jixing_id;
//            echo '<script>alert(\''.$jixing_id_va->jixing_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($jixing_id_max_v)) {
                $sub_jixing_id=  substr($jixing_id_max_v, -8);
                $jixing_id_max_v = 'j'.sprintf('%08s', $sub_jixing_id + 1); //“%08s ”表示输出成长度为8的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$jixing_id_max_v.'\');</script>';
            } else {
                $jixing_id_max_v = 'j00000001';
            }
            echo '<script>$(function(){ document.subform_jixing.jixing_id.value=\'' . $jixing_id_max_v . '\'; })</script>';
    }
    
    public function jixing_add() {//将剂型信息插入数据库
        $arr['jixing_id']=$_POST['jixing_id'];
        $arr['jixing_name']=$_POST['jixing_name'];
        $this->info_add_m->add_to_jixing($arr);
        $this->load->view('drug_jixing_add_success_v');
        
    }

    public function drug_shangpin_info_add() {
        $data['class_info'] = $this->info_add_m->class_info_select();
        $this->load->view('drug_shangpin_info_add_v', $data);
    }
    
    public function shangpin_id_gen() {//自动生成药品编号
//        echo '<script>alert("check");</script>';
        $sub_shangpin_id = $_POST['sub_shangpin_id'];
        if (strlen($sub_shangpin_id) === 4) {
//        echo '<script>alert("'.$sub_shangpin_id.'");</script>';
            $shangpin_id_max = $this->info_add_m->shangpin_id_latest_as_class_id($sub_shangpin_id);
            foreach ($shangpin_id_max as $key => $shangpin_id_va) {
                $shangpin_id_max_v = $shangpin_id_va->shangpin_id;
//            echo '<script>alert(\''.$shangpin_id_va->shangpin_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($shangpin_id_max_v)) {
                $shangpin_id_max_v = sprintf('%06s', $shangpin_id_max_v + 1); //“%05s ”表示输出成长度为5的字符串，如果长度不足，左边以零补全
            echo '<script>alert(\''.$shangpin_id_max_v.'\');</script>';
            } else {
                $shangpin_id_max_v = $sub_shangpin_id . '01';
            }
            echo '<script>$(function(){ document.subform2.shangpin_id.value=\'' . $shangpin_id_max_v . '\'; })</script>';
        }
        else{
            $sub_shangpin_id=  substr($sub_shangpin_id, 0,4);
//            echo '<script>alert(\''.$sub_shangpin_id.'\');</script>';
            $shangpin_id_max = $this->info_add_m->shangpin_id_latest_as_class_id($sub_shangpin_id);
            foreach ($shangpin_id_max as $key => $shangpin_id_va) {
                $shangpin_id_max_v = $shangpin_id_va->shangpin_id;
//            echo '<script>alert(\''.$shangpin_id_va->shangpin_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($shangpin_id_max_v)) {
                $shangpin_id_max_v = sprintf('%06s', $shangpin_id_max_v + 1); //“%05s ”表示输出成长度为5的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$shangpin_id_max_v.'\');</script>';
            } else {
                $shangpin_id_max_v = $sub_shangpin_id . '01';
            }
            echo '<script>$(function(){ document.subform.shangpin_id.value=\'' . $shangpin_id_max_v . '\'; })</script>';
        }
    }
    
    public function shangpin_id_add() {//将商品信息插入数据库
        $arr['class_id']=$_POST['class_info'];
        $arr['shangpin_id']=$_POST['shangpin_id'];
        $arr['shangpin_name']=$_POST['shangpin_name'];
        $this->info_add_m->add_to_shangpin_info($arr);
        $this->load->view('drug_shangpin_info_add_success_v');
        
    }

    public function drug_supplier_add() {
        $this->load->view('drug_supplier_add_v');
    }
    
    public function supplier_id_gen(){
//        echo '<script>alert("check");</script>';
            $supplier_id_max = $this->info_add_m->supplier_id_latest();
            foreach ($supplier_id_max as $key => $supplier_id_va) {
                $supplier_id_va_v = $supplier_id_va->supplier_id;
//            echo '<script>alert(\''.$jixing_id_va->jixing_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($supplier_id_va_v)) {
                $sub_supplier_id=  substr($supplier_id_va_v, -8);
                $supplier_id_va_v = 's'.sprintf('%08s', $sub_supplier_id + 1); //“%08s ”表示输出成长度为8的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$supplier_id_va_v.'\');</script>';
            } else {
                $supplier_id_va_v = 's00000001';
            }
            echo '<script>$(function(){ document.subform_supplier.supplier_id.value=\'' . $supplier_id_va_v . '\'; })</script>';
    }
    
    public function supplier_add() {//将剂型信息插入数据库
        $arr['supplier_id']=$_POST['supplier_id'];
        $arr['supplier_name']=$_POST['supplier_name'];
        $this->info_add_m->add_to_supplier($arr);
        $this->load->view('drug_supplier_add_success_v');
    }

    public function drug_changjia_add() {
        $this->load->view('drug_changjia_add_v');
    }
    
    public function changjia_id_gen(){
//        echo '<script>alert("check");</script>';
            $changjia_id_max = $this->info_add_m->changjia_id_latest();
            foreach ($changjia_id_max as $key => $changjia_id_va) {
                $changjia_id_va_v = $changjia_id_va->changjia_id;
//            echo '<script>alert(\''.$jixing_id_va->jixing_id.'\');</script>';
            }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            if (!empty($changjia_id_va_v)) {
                $sub_changjia_id=  substr($changjia_id_va_v, -8);
                $changjia_id_va_v = 'c'.sprintf('%08s', $sub_changjia_id + 1); //“%08s ”表示输出成长度为8的字符串，如果长度不足，左边以零补全
//            echo '<script>alert(\''.$supplier_id_va_v.'\');</script>';
            } else {
                $changjia_id_va_v = 'c00000001';
            }
            echo '<script>$(function(){ document.subform_changjia.changjia_id.value=\'' . $changjia_id_va_v . '\'; })</script>';
    }
    
    public function changjia_add() {//将剂型信息插入数据库
        $arr['changjia_id']=$_POST['changjia_id'];
        $arr['changjia_name']=$_POST['changjia_name'];
        $this->info_add_m->add_to_changjia($arr);
        $this->load->view('drug_changjia_add_success_v');
    }

    public function drug_use_add() {
        $this->load->view('drug_use_add_v');
        //echo 'drug_use_add success';
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */