<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Drug_purchase extends CI_Controller {

    public function drug_purchase() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('drug_purchase_m');
        $this->load->model('sys_manager_m');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function add() {
        //session_start();
        //$data['userid']=@$_SESSION['userid'];
        $data['price_packing'] = $this->drug_purchase_m->price_packing_select();
        $data['supplier'] = $this->drug_purchase_m->supplier_select();
        //var_dump($data);
        $this->load->view('drug_purchase_add_v', $data);
    }

    public function add_to_drug_purchase_list_comfirm() {

        session_start();

        for ($i = 1; $i <= 10; $i++) {
            if (!empty($_POST["drug_name$i"])) {

                $data[$i]['class_id'] = $_POST["class_id$i"];
                $data[$i]['drug_id'] = $_POST["drug_id$i"];
                $data[$i]['drug_name'] = $_POST["drug_name$i"];
                $data[$i]['shangpin_id'] = $_POST["shangpin_id$i"];
                $data[$i]['guige_id'] = $_POST["guige_id$i"];
                $data[$i]['guige_name'] = $_POST["guige_name$i"];
                $data[$i]['jixing_id'] = $_POST["jixing_id$i"];
                $data[$i]['med_in_type_id'] = $_POST["med_in_type_id$i"];
                $data[$i]['changjia_id'] = $_POST["changjia_id$i"];
                $data[$i]['supplier_id'] = $_POST["supplier_id$i"];


                $data[$i]['purchase_batch'] = $_POST['purchase_batch'];


                $data[$i]['price_packing_id'] = $_POST["select$i"];
                $data[$i]['danjia'] = $_POST["danjia$i"];
                $data[$i]['jinjia'] = $_POST["jinjia$i"];
                $data[$i]['fanhaijine'] = $_POST["fanhaijine$i"];


                $data[$i]['userid'] = $_POST['userid'];

                //            $data['username']=$_POST['username'];
                //            $data['drug_class1']=$_POST['drug_class1'];
                //            $data['shangpin_name1']=$_POST['shangpin_name1'];
                //            $data['jixing_name1']=$_POST['jixing_name1'];
                //            $data['med_in_type_name1']=$_POST['med_in_type_name1'];
                //            $data['changjia_name1']=$_POST['changjia_name1'];
                //              $data['supplier_name']=$_POST['supplier_name1'];

                $_SESSION['drug_purchase_list'] = $data;
//                var_dump($data);
            }
        }
        if(!empty($data)){
            $_SESSION['drug_purchase_list'] = $data;
            $drug_purchase['purchase_batch'] = $_POST['purchase_batch'];
            $drug_purchase['oper_time'] = DATE('Y-m-d H:i:s', time());
            $drug_purchase['invoice_money'] = $_POST['invoice_money'];
            $drug_purchase['userid'] = $_POST['userid'];
            $drug_purchase['check_state'] = false;
            $batch = $this->drug_purchase_m->purchase_batch($_POST['purchase_batch']);
            if (empty($batch)) {
                $this->drug_purchase_m->add_to_drug_purchase($drug_purchase);
            }

            $this->drug_purchase_m->add_to_drug_purchase_list($data);
            $this->load->view('add_to_drug_purchase_list_success');
        }
//        else{
//            $this->drug_purchase_m->add_to_drug_purchase_list($data);
//            echo '<script>alert("你的采购批次号已经存在，请重新生成");window.history.go(-1);</script>';
//        }
        else{
            echo '<script>alert("你的采购信息为空，请填写后再提交");window.history.go(-1);</script>';
        }
        
        
    }

    public function add_to_drug_purchase_list() {
        session_start();
        $arr = $_SESSION['drug_purchase_list'];
        var_dump($arr);
//        $this->drug_purchase_m->add_to_drug_purchase($arr);
    }
//    采购申请修改
    public function update() {
        session_start();
        $userid=$_SESSION['userid'];
        $drug_purchase_temp['drug_purchase'] = $this->drug_purchase_m->drug_pruchase_select_by_userid($userid);
        $this->load->view('drug_purchase_update_v', $drug_purchase_temp);
    }
    
    public function get_drug_purchase_list_for_update(){
        $purchase_batch = $_POST['purchase_batch'];
        session_start();
        $_SESSION['purchase_batch']=$purchase_batch;
        $drug_purchase_list = $this->drug_purchase_m->get_drug_purchase_list($purchase_batch);
//        var_dump($drug_purchase_list);
        echo '<table border = "1" width="960">';
            echo '<tr>';
            echo '<td width = "140" align = "center">序号</td>';
            echo '<td width = "50" align = "center">药品名称</td>';
            echo '<td width = "140" align = "center">药品分类</td>';
            echo '<td width = "140" align = "center">商品名</td>';
            echo '<td width = "50" align = "center">规格编号</td>';
            echo '<td width = "50" align = "center">规格</td>';
            echo '<td width = "140" align = "center">剂型</td>';
            echo '<td width = "50" align = "center">医保类型</td>';
            echo '<td width = "140" align = "center">生产厂家</td>';
            echo '<td width = "140" align = "center">供应商</td>';
            echo '<td width = "50" align = "center">采购批次</td>';
            echo '<td width = "50" align = "center">价格包装</td>';
            echo '<td width = "50" align = "center">单价</td>';
            echo '<td width = "50" align = "center">进价</td>';
            echo '<td width = "50" align = "center">返还金额</td>';
            echo '<td width = "140" align = "center">采购员</td>';
            echo '<td width = "140" align = "center">删除</td>';
            echo '</tr>';
        foreach ($drug_purchase_list as $key => $va) {
            $drug_class = $this->drug_purchase_m->class_name_select($va->class_id);
            foreach ($drug_class as $key1 => $value) {
                $drug_class_v[$key] = $value->drug_class;
            }
            $shangpin_name = $this->drug_purchase_m->shangpin_name_select($va->shangpin_id);
            foreach ($shangpin_name as $key2 => $shangpin_value) {
                $shangpin_name_v[$key] = $shangpin_value->shangpin_name;
            }
            $jixing_name = $this->drug_purchase_m->jixing_name_select($va->jixing_id);
            foreach ($jixing_name as $key3 => $jixing_value) {
                $jixing_name_v[$key] = $jixing_value->jixing_name;
            }
            $med_in_type_name = $this->drug_purchase_m->med_in_type_name_select($va->med_in_type_id);
            foreach ($med_in_type_name as $key4 => $med_in_type_value) {
                $med_in_type_name_v[$key] = $med_in_type_value->med_in_type_name;
            }
            $changjia_name = $this->drug_purchase_m->changjia_name_select($va->changjia_id);
            foreach ($changjia_name as $key5 => $changjia_value) {
                $changjia_name_v[$key] = $changjia_value->changjia_name;
            }
            $supplier = $this->drug_purchase_m->supplier_name_select($va->supplier_id);
            foreach ($supplier as $key6=>$supplier_value){
                $supplier_name_v[$key]=$supplier_value->supplier_name;
            }
            $user=  $this->sys_manager_m->user_select($va->userid);
            foreach($user as $key7=>$user_value){
                $username_v[$key]=$user_value->username;
            }
            
            echo '<tr>';
            $num=$key+1;
            $_SESSION['num']=$num;
            echo '<td width = "140" align = "center">' . $num . '</td>';
//            echo '<td width = "50" align = "center"><input type="text" name="drug_name'.$key.'" value="' . $va->drug_name . '"/></td>';
//            echo '<td width = "140" align = "center"><input type="text" name="drug_class'.$key.'"  value="' . $drug_class_v[$key] . '"/></td>';
//            echo '<td width = "140" align = "center"><input type="text" name="shangpin_name'.$key.'"  value="' . $shangpin_name_v[$key] . '"/></td>';
            echo '<td width = "50" align = "center">' . $va->drug_name . '</td>';
            echo '<td width = "140" align = "center">' . $drug_class_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $shangpin_name_v[$key] . '</td>';
            echo '<td width = "50" align = "center">' . $va->guige_id . '</td>';
            echo '<td width = "50" align = "center">' . $va->guige_name . '</td>';
//            echo '<td width = "50" align = "center"><input type="text" name="guige_id'.$key.'"  value="' . $va->guige_id . '"/></td>';
//            echo '<td width = "50" align = "center"><input type="text" name="guige_name'.$key.'"  value="' . $va->guige_name . '"/></td>';
//            echo '<td width = "140" align = "center"><input type="text" name="jixing_name'.$key.'"  value="' . $jixing_name_v[$key] . '"/></td>';
//            echo '<td width = "50" align = "center"><input type="text" name="med_in_type'.$key.'"  value="' . $med_in_type_name_v[$key] . '"/></td>';
//            echo '<td width = "140" align = "center"><input type="text" name="med_in_type_nam'.$key.'"  value="' . $changjia_name_v[$key] . '"/></td>';
//            echo '<td width = "140" align = "center"><input type="text" name="supplier_name'.$key.'"  value="' . $supplier_name_v[$key] . '"/></td>';
            echo '<td width = "140" align = "center">' . $jixing_name_v[$key] . '</td>';
            echo '<td width = "50" align = "center">' . $med_in_type_name_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $changjia_name_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $supplier_name_v[$key] . '</td>';
//            echo '<td width = "50" align = "center"><input type="text" name="purchase_batch'.$key.'"  value="' . $va->purchase_batch . '"/></td>';
//            echo '<td width = "50" align = "center"><input type="text" name="price_packing_id'.$key.'"  value="' . $va->price_packing_id . '"/></td>';
            echo '<td width = "50" align = "center">' . $va->purchase_batch . '</td>';
            echo '<td width = "50" align = "center">' . $va->price_packing_id . '</td>';
            echo '<td width = "50" align = "center"><input type="text" name="danjia'.$key.'"  value="' . $va->danjia . '"/></td>';
            echo '<td width = "50" align = "center"><input type="text" name="jinjia'.$key.'"  value="' . $va->jinjia . '"/></td>';
            echo '<td width = "50" align = "center"><input type="text" name="fanhaijine'.$key.'"  value="' . $va->fanhaijine . '"/></td>';
            echo '<td width = "140" align = "center">' . $username_v[$key] . '</td>';
            echo '<td width = "140" align = "center"><input type="submit" value="X" name="'.$va->id.'" onclick="drug_purchase_delete(this)" /></td>';
            echo '<td width = "140" align = "center"><input type="hidden" value="'.$va->id.'" name="id'.$key.'" onclick="drug_purchase_delete(this)" /></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public function drug_purchase_update(){
//        echo $id;
        session_start();
        for ($i = 0; $i < $_SESSION['num']; $i++) {
//            if (!empty($_POST["drug_name$i"])) {
                $id=$_POST["id$i"];
//                echo $id;
                $data[$i]['danjia'] = $_POST["danjia$i"];
                $data[$i]['jinjia'] = $_POST["jinjia$i"];
                $data[$i]['fanhaijine'] = $_POST["fanhaijine$i"];

                //            $data['username']=$_POST['username'];
                //            $data['drug_class1']=$_POST['drug_class1'];
                //            $data['shangpin_name1']=$_POST['shangpin_name1'];
                //            $data['jixing_name1']=$_POST['jixing_name1'];
                //            $data['med_in_type_name1']=$_POST['med_in_type_name1'];
                //            $data['changjia_name1']=$_POST['changjia_name1'];
                //              $data['supplier_name']=$_POST['supplier_name1'];

                $this->drug_purchase_m->drug_purchase_list_update_by_id($id,$data[$i]);
//                $_SESSION['drug_purchase_list'] = $data;
//                var_dump($data);
//            }
        }
//        $this->drug_purchase_m->drug_purchase_list_update_by_id($id);
        echo '<script>alert("采购信息更新成功！");</script>';
        $userid=$_SESSION['userid'];
        $drug_purchase_temp['drug_purchase'] = $this->drug_purchase_m->drug_pruchase_select_by_userid($userid);
        $this->load->view('drug_purchase_update_v', $drug_purchase_temp);
    }
    
    public function drug_purchase_delete(){
        $id=$_POST['id'];
//        echo $id;
        $this->drug_purchase_m->drug_purchase_list_delete_by_id($id);
        echo '<script>alert("采购信息'.$id.'删除成功！");</script>';
        $this->load->view('drug_purchase_update_v');
    }
    
    
    
//    采购审核
    public function check() {
        $drug_purchase_temp['drug_purchase'] = $this->drug_purchase_m->drug_purchase_select();
        $this->load->view('drug_purchase_check_v', $drug_purchase_temp);
    }

    public function get_drug_purchase_list() {
        $purchase_batch = $_POST['purchase_batch'];
        session_start();
        $_SESSION['purchase_batch']=$purchase_batch;
        $drug_purchase_list = $this->drug_purchase_m->get_drug_purchase_list($purchase_batch);
        echo '<table border = "1" width="960">';
            echo '<tr>';
            echo '<td width = "140" align = "center">序号</td>';
            echo '<td width = "50" align = "center">药品名称</td>';
            echo '<td width = "140" align = "center">药品分类</td>';
            echo '<td width = "140" align = "center">商品名</td>';
            echo '<td width = "50" align = "center">规格编号</td>';
            echo '<td width = "50" align = "center">规格</td>';
            echo '<td width = "140" align = "center">剂型</td>';
            echo '<td width = "50" align = "center">医保类型</td>';
            echo '<td width = "140" align = "center">生产厂家</td>';
            echo '<td width = "140" align = "center">供应商</td>';
            echo '<td width = "50" align = "center">采购批次</td>';
            echo '<td width = "50" align = "center">价格包装</td>';
            echo '<td width = "50" align = "center">单价</td>';
            echo '<td width = "50" align = "center">进价</td>';
            echo '<td width = "50" align = "center">返还金额</td>';
            echo '<td width = "140" align = "center">采购员</td>';
            echo '</tr>';
        foreach ($drug_purchase_list as $key => $va) {
            $drug_class = $this->drug_purchase_m->class_name_select($va->class_id);
            foreach ($drug_class as $key1 => $value) {
                $drug_class_v[$key] = $value->drug_class;
            }
            $shangpin_name = $this->drug_purchase_m->shangpin_name_select($va->shangpin_id);
            foreach ($shangpin_name as $key2 => $shangpin_value) {
                $shangpin_name_v[$key] = $shangpin_value->shangpin_name;
            }
            $jixing_name = $this->drug_purchase_m->jixing_name_select($va->jixing_id);
            foreach ($jixing_name as $key3 => $jixing_value) {
                $jixing_name_v[$key] = $jixing_value->jixing_name;
            }
            $med_in_type_name = $this->drug_purchase_m->med_in_type_name_select($va->med_in_type_id);
            foreach ($med_in_type_name as $key4 => $med_in_type_value) {
                $med_in_type_name_v[$key] = $med_in_type_value->med_in_type_name;
            }
            $changjia_name = $this->drug_purchase_m->changjia_name_select($va->changjia_id);
            foreach ($changjia_name as $key5 => $changjia_value) {
                $changjia_name_v[$key] = $changjia_value->changjia_name;
            }
            $supplier = $this->drug_purchase_m->supplier_name_select($va->supplier_id);
            foreach ($supplier as $key6=>$supplier_value){
                $supplier_name_v[$key]=$supplier_value->supplier_name;
            }
            $user=  $this->sys_manager_m->user_select($va->userid);
            foreach($user as $key7=>$user_value){
                $username_v[$key]=$user_value->username;
            }
            
            echo '<tr>';
            $num=$key+1;
            echo '<td width = "140" align = "center">' . $num . '</td>';
            echo '<td width = "50" align = "center">' . $va->drug_name . '</td>';
            echo '<td width = "140" align = "center">' . $drug_class_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $shangpin_name_v[$key] . '</td>';
            echo '<td width = "50" align = "center">' . $va->guige_id . '</td>';
            echo '<td width = "50" align = "center">' . $va->guige_name . '</td>';
            echo '<td width = "140" align = "center">' . $jixing_name_v[$key] . '</td>';
            echo '<td width = "50" align = "center">' . $med_in_type_name_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $changjia_name_v[$key] . '</td>';
            echo '<td width = "140" align = "center">' . $supplier_name_v[$key] . '</td>';
            echo '<td width = "50" align = "center">' . $va->purchase_batch . '</td>';
            echo '<td width = "50" align = "center">' . $va->price_packing_id . '</td>';
            echo '<td width = "50" align = "center">' . $va->danjia . '</td>';
            echo '<td width = "50" align = "center">' . $va->jinjia . '</td>';
            echo '<td width = "50" align = "center">' . $va->fanhaijine . '</td>';
            echo '<td width = "140" align = "center">' . $username_v[$key] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public function drug_purchase_check() {
        session_start();
        $purchase_batch=$_SESSION['purchase_batch'];
        $arr=array('check_state'=>1);
//        $drug_pruchase=$this->drug_purchase_m->drug_pruchase_check($purchase_batch);
        $this->drug_purchase_m->check_state_update($purchase_batch,$arr);
        $this->load->view('drug_purchase_check_success_v');
    }

    public function select1() {
        session_start();
        $userid=$_SESSION['userid'];
        $drug_purchase_temp['drug_purchase'] = $this->drug_purchase_m->drug_pruchase_select();
        $this->load->view('drug_purchase_select1_v', $drug_purchase_temp);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */