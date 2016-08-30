<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auto_search extends CI_Controller {

    public function auto_search() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('drug_purchase_m');
    }

    public function index() {
        //$this->load->view('test');
    }

    public function test() {

        $jixing_name = $this->drug_purchase_m->jixing_name_select($va->jixing_id);
        foreach ($jixing_name as $key => $jixing_value) {
            $jixing_value->jixing_name;
        }
        return $jixing_value->jixing_name;
    }

    public function purchase_add_setvalue() {
        session_start();
        //echo '<script>alert("check");</script>';
        $keynum = $_POST['keynum'];
        //echo '<script>alert(\''.$keynum.'\');</script>';
        //$keynum=1;
        if ($keynum != null) {

            //$class_id=$_SESSION['class_id'][$keynum];
            //$drug_id=$_SESSION['drug_id'][$keynum];
            //$drug_name=$_SESSION['drug_name'][$keynum];
            //$shangpin_id=$_SESSION['shangpin_id'][$keynum];
            $arr['class_id'] = $_SESSION['class_id'][$keynum];
            $arr['drug_class'] = $_SESSION['drug_class'][$keynum];
            $arr['drug_id'] = $_SESSION['drug_id'][$keynum];
            $arr['drug_name'] = $_SESSION['drug_name'][$keynum];
            $arr['shangpin_id'] = $_SESSION['shangpin_id'][$keynum];
            $arr['shangpin_name'] = $_SESSION['shangpin_name'][$keynum];
            $arr['guige_id'] = $_SESSION['guige_id'][$keynum];
            $arr['guige_name'] = $_SESSION['guige_name'][$keynum];
            $arr['jixing_id'] = $_SESSION['jixing_id'][$keynum];
            $arr['jixing_name'] = $_SESSION['jixing_name'][$keynum];
            $arr['med_in_type_id'] = $_SESSION['med_in_type_id'][$keynum];
            $arr['med_in_type_name'] = $_SESSION['med_in_type_name'][$keynum];
            $arr['changjia_id'] = $_SESSION['changjia_id'][$keynum];
            $arr['changjia_name'] = $_SESSION['changjia_name'][$keynum];
//            $arr['supplier_id'] = $_SESSION['supplier_id'][$keynum];
//            $arr['supplier_name'] = $_SESSION['supplier_name'][$keynum];
            //var_dump($arr);

            $drugall = $_SESSION['drugall'];
//            echo '<script>alert(\''.$drugall[2].'\');</script>';
            echo '<script>$(function(){ document.subform.' . $drugall[2] . '.value=\'';
            echo $arr['drug_class'];
            echo '\';';
            echo 'document.subform.' . $drugall[3] . '.value=\'';
            echo $arr['class_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[1] . '.value=\'';
            echo $arr['drug_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[0] . '.value=\'';
            echo $arr['drug_name'];
            echo '\';';
            echo 'document.subform.' . $drugall[5] . '.value=\'';
            echo $arr['shangpin_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[4] . '.value=\'';
            echo $arr['shangpin_name'];
            echo '\';';
            echo 'document.subform.' . $drugall[6] . '.value=\'';
            echo $arr['guige_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[7] . '.value=\'';
            echo $arr['guige_name'];
            echo '\';';
            echo 'document.subform.' . $drugall[9] . '.value=\'';
            echo $arr['jixing_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[8] . '.value=\'';
            echo $arr['jixing_name'];
            echo '\';';
            echo 'document.subform.' . $drugall[11] . '.value=\'';
            echo $arr['med_in_type_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[10] . '.value=\'';
            echo $arr['med_in_type_name'];
            echo '\';';
            echo 'document.subform.' . $drugall[13] . '.value=\'';
            echo $arr['changjia_id'];
            echo '\';';
            echo 'document.subform.' . $drugall[12] . '.value=\'';
            echo $arr['changjia_name'];
//            echo '\';';
//            echo 'document.subform.' . $drugall[15] . '.value=\'';
//            echo $arr['supplier_id'];
//            echo '\';';
//            echo 'document.subform.' . $drugall[14] . '.value=\'';
//            echo $arr['supplier_name'];
            echo '\'; })</script>';
        }
    }

    public function supplier_add_setvalue() {
        session_start();
        $supplier_keynum = $_POST['supplier_keynum'];

        if ($supplier_keynum != null) {
            //$class_id=$_SESSION['class_id'][$keynum];
            //$drug_id=$_SESSION['drug_id'][$keynum];
            //$drug_name=$_SESSION['drug_name'][$keynum];
            //$shangpin_id=$_SESSION['shangpin_id'][$keynum];
            $arr['supplier_name'] = $_SESSION['supplier_name'][$supplier_keynum];
            echo $arr['supplier_id'] = $_SESSION['supplier_id'][$supplier_keynum];
            $supplierall = $_SESSION['supplierall'];
//            echo '<script>alert(\''.$supplierall[1].'\');</script>';
//            echo '<script>alert(\'' . $arr['supplier_id'] . '111\');</script>';
            echo '<script>$(function(){ document.subform.' . $supplierall[1] . '.value=\'';
            echo $arr['supplier_id'];
            echo '\';';
            echo 'document.subform.' . $supplierall[0] . '.value=\'';
            echo $arr['supplier_name'];
            echo '\'; });</script>';
        }
    }

    public function purchase_add_check() {
        session_start();
//                var_dump($_POST['drugall']);
        $drugall = $_POST['drugall'];
        $queryString = $_POST['queryString'];
        $_SESSION['drugall'] = $drugall;
//                foreach ($drugall as $drugall_key => $drugall_val) {
//                    $_SESSION[$drugall_key]=$drugall_val->drug_name2;
//                }
        //$inputid=$_POST['inputid'];
        //$_SESSION['inputid']=$_POST['inputid'];
        //echo '<script>alert("'.$inputid.'");</script>';
        if (strlen($queryString) > 0) {
            $drugs = $this->drug_purchase_m->drug_auto_select($queryString);
            if ($drugs) {
                //echo '<script>$(\'#search_auto\').show();</script>';
                foreach ($drugs as $key => $va) {
                    //$class_id=$va->class_id;
                    //$drug_id=$va->drug_id;
                    //$drug_name=$va->drug_name;
                    //$shangpin_id=$va->shangpin_id;
                    $class_id[$key] = $va->class_id;
                    $drug_id[$key] = $va->drug_id;
                    $drug_name[$key] = $va->drug_name;
                    $shangpin_id[$key] = $va->shangpin_id;
                    $guige_id[$key] = $va->guige_id;
                    $guige_name[$key] = $va->guige_name;
                    $jixing_id[$key] = $va->jixing_id;
                    $med_in_type_id[$key] = $va->med_in_type_id;
                    $changjia_id[$key] = $va->changjia_id;
//                    $supplier_id[$key] = $va->supplier_id;
                    $_SESSION['class_id'] = $class_id;
                    $_SESSION['drug_id'] = $drug_id;
                    $_SESSION['drug_name'] = $drug_name;
                    $_SESSION['shangpin_id'] = $shangpin_id;
                    $_SESSION['guige_id'] = $guige_id;
                    $_SESSION['guige_name'] = $guige_name;
                    $_SESSION['jixing_id'] = $jixing_id;
                    $_SESSION['med_in_type_id'] = $med_in_type_id;
                    $_SESSION['changjia_id'] = $changjia_id;
//                    $_SESSION['supplier_id'] = $supplier_id;
                    //通过id取得name,包括class_info,shangpin_info,jixing,med_in_type,changjia,supplier共6个

                    $drug_class = $this->drug_purchase_m->class_name_select($va->class_id);
                    foreach ($drug_class as $key1 => $value) {
                        $drug_class_v[$key] = $value->drug_class;
                    }
                    $_SESSION['drug_class'] = $drug_class_v;

                    $shangpin_name = $this->drug_purchase_m->shangpin_name_select($va->shangpin_id);
                    foreach ($shangpin_name as $key2 => $shangpin_value) {
                        $shangpin_name_v[$key] = $shangpin_value->shangpin_name;
                    }
                    $_SESSION['shangpin_name'] = $shangpin_name_v;

                    $jixing_name = $this->drug_purchase_m->jixing_name_select($va->jixing_id);
                    foreach ($jixing_name as $key3 => $jixing_value) {
                        $jixing_name_v[$key] = $jixing_value->jixing_name;
                    }
                    $_SESSION['jixing_name'] = $jixing_name_v;

                    $med_in_type_name = $this->drug_purchase_m->med_in_type_name_select($va->med_in_type_id);
                    foreach ($med_in_type_name as $key4 => $med_in_type_value) {
                        $med_in_type_name_v[$key] = $med_in_type_value->med_in_type_name;
                    }
                    $_SESSION['med_in_type_name'] = $med_in_type_name_v;

                    $changjia_name = $this->drug_purchase_m->changjia_name_select($va->changjia_id);
                    foreach ($changjia_name as $key5 => $changjia_value) {
                        $changjia_name_v[$key] = $changjia_value->changjia_name;
                    }
                    $_SESSION['changjia_name'] = $changjia_name_v;

//                    $supplier_name = $this->drug_purchase_m->supplier_name_select($va->supplier_id);
//                    foreach ($supplier_name as $key6 => $supplier_value) {
//                        $supplier_name_v[$key] = $supplier_value->supplier_name;
//                    }
//                    $_SESSION['supplier_name'] = $supplier_name_v;
                    //$va->userid;     
                    //var_dump($drugs);
                    //echo '<li class="li"><span class="span" onClick="class_id_fill(\''.$class_id.'\');">'.$class_id.'</span>';
                    //echo '<li class="li"><span class="span" onClick="class_id_fill(\''.$class_id.'\');">'.$class_id.'</span>';
                    //echo '<li ><span onClick="drug_id_fill(\''.$drug_id.'\');">'.$drug_id.'</span></li>';
                    //echo '<span class="span" onClick="drug_id_fill(\''.$drug_id.'\');">'.$drug_id.'</span>';
                    //echo '<span class="span" onClick="drug_name_fill(\''.$drug_name.'\');">'.$drug_name.'</span>';
                    //echo '<span class="span" onClick="shangpin_id_fill(\''.$shangpin_id.'\');">'.$shangpin_id.'</span></li>';
                    //$test=$_SESSION['class_id'][0];
                    //echo '<li class="li"><span class="span" onClick="class_id_fill('.$key.');">'.$test.'</span>';
                    //echo '<li class="li" onClick="class_id_fill('.$key.');"><span class="span">'.$class_id[$key].'</span>';
                    echo '<li class="li" onClick="class_id_fill(' . $key . ');"><span class="span">' . $value->drug_class . '</span>'; //显示名称而非id
                    //echo '<li class="li"><span class="span" onClick="class_id_fill(\''.$class_id.'\');">'.$class_id.'</span>';
                    //echo '<li ><span onClick="drug_id_fill(\''.$drug_id.'\');">'.$drug_id.'</span></li>';
                    //echo '<span class="span" onClick="drug_id_fill(\''.$key.'\');">'.$drug_id[$key].'</span>';保留onclick事件
                    echo '<span class="span">' . $drug_id[$key] . '</span>';
                    echo'<span class="span">' . $drug_name[$key] . '</span>';
                    //echo'<span class="span">'.$shangpin_id[$key].'</span>';
                    echo'<span class="span">' . $shangpin_value->shangpin_name . '</span>';
                    echo'<span class="span">' . $guige_id[$key] . '</span>';
                    echo'<span class="span">' . $guige_name[$key] . '</span>';
                    echo'<span class="span">' . $jixing_value->jixing_name . '</span>';
                    echo'<span class="span">' . $med_in_type_value->med_in_type_name . '</span>';
                    echo'<span class="span">' . $changjia_value->changjia_name . '</span>';
//                    echo '<span class="span">' . $supplier_value->supplier_name . '</span></li>';
                    //echo '<li><span class="span" >1</span><span class="span" >2</span><span class="span" >3</span></li>';
                    //echo '<script>alert("check");</script>';
                    //document.getElementById(drgu_id).setAttribute('.$arr[\'drug_id\'].');
                }
                //echo '<li class="cls"><span href="javascript:;" onclick="$(this).fadeOut(100)">关闭</span& gt;</li>';
            }   //关闭功能中点击关闭后，原来输入的内容会丢失
            //while ($result = mysql_fetch_array($query,MYSQL_BOTH)){ 
            //$value=$result['value']; 
            //echo '<li onClick="fill(\''.$value.'\');">'.$value.'</li>'; 
            //} 
        }
    }

    public function supplier_add_check() {
        session_start();
        $supplierall = $_POST['supplierall'];
        $supplier_value = $_POST['supplier_value'];
        $_SESSION['supplierall'] = $supplierall;
        //echo '<script>alert("'.$inputid.'");</script>';
        if (strlen($supplier_value) > 0) {
            $supplier = $this->drug_purchase_m->supplier_auto_select($supplier_value);

//        if(!$supplier){
//            
//            $supplier = $this->drug_purchase_m->supplier_auto_select_ten();
//        }
//        else{
//            $supplier = $this->drug_purchase_m->supplier_auto_select($supplier_value);
//        }
////            else{
            if ($supplier) {
                //echo '<script>$(\'#search_auto\').show();</script>';
                foreach ($supplier as $supplier_key => $supplier_va) {
                    //$class_id=$va->class_id;
                    //$drug_id=$va->drug_id;
                    //$drug_name=$va->drug_name;
                    //$shangpin_id=$va->shangpin_id;
                    $supplier_name[$supplier_key] = $supplier_va->supplier_name;
                    $supplier_id[$supplier_key] = $supplier_va->supplier_id;
                    $_SESSION['supplier_name'] = $supplier_name;
                    $_SESSION['supplier_id'] = $supplier_id;

//                    echo '<script>alert(1);</script>';
                    //通过id取得name,包括class_info,shangpin_info,jixing,med_in_type,changjia,supplier共6个
                    //$va->userid;     
                    //var_dump($drugs);
                    //echo '<li class="li"><span class="span" onClick="class_id_fill(\''.$class_id.'\');">'.$class_id.'</span>';
                    //echo '<li class="li"><span class="span" onClick="class_id_fill(\''.$class_id.'\');">'.$class_id.'</span>';
                    //echo '<li ><span onClick="drug_id_fill(\''.$drug_id.'\');">'.$drug_id.'</span></li>';
                    //echo '<span class="span" onClick="drug_id_fill(\''.$drug_id.'\');">'.$drug_id.'</span>';
                    //echo '<span class="span" onClick="drug_name_fill(\''.$drug_name.'\');">'.$drug_name.'</span>';
                    //echo '<span class="span" onClick="shangpin_id_fill(\''.$shangpin_id.'\');">'.$shangpin_id.'</span></li>';
                    //$test=$_SESSION['class_id'][0];
                    //echo '<li class="li"><span class="span" onClick="class_id_fill('.$key.');">'.$test.'</span>';
                    //echo '<li class="li" onClick="class_id_fill('.$key.');"><span class="span">'.$class_id[$key].'</span>';
                    echo '<li class="li" onClick="supplier_fill(' . $supplier_key . ');"><span class="span">' . $supplier_name[$supplier_key] . '</span>'; //显示名称而非id
                    echo '</li>';
//                    echo '<script>alert(\'' . $supplier_name[$supplier_key] . '\');</script>';
                }
//                    var_dump($_SESSION['supplier_name']);                
                //echo '<li class="cls"><span href="javascript:;" onclick="$(this).fadeOut(100)">关闭</span& gt;</li>';
            }   //关闭功能中点击关闭后，原来输入的内容会丢失
        }
    }

    public function purchase_batch_add() {
//        echo '<script>alert("check");</script>';
        $purchase_batch_max = $this->drug_purchase_m->purchase_batch_latest();
        foreach ($purchase_batch_max as $key => $batch_va) {
            $purchase_batch_max_v = $batch_va->purchase_batch;
//            echo '<script>alert(\''.$batch_va->purchase_batch.'\');</script>';
        }
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
        if (!empty($purchase_batch_max_v)) {
//            echo '<script>alert(2);</script>';
//            echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
            $sub_purchase_batch=  substr($purchase_batch_max_v, -8);
//            echo '<script>alert(\''.$sub_purchase_batch.'\');</script>';
            
            $sub_purchase_batch=$sub_purchase_batch+1;
//            echo '<script>alert(\''.$sub_purchase_batch.'\');</script>';
            $purchase_batch_max_v ="p".$sub_purchase_batch;
//            echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
        } else {
            $purchase_batch_max_v = 'p10000001';
        }
        //echo $purchase_batch_max_v;
//        echo '<script>alert(\''.$purchase_batch_max_v.'\');</script>';
        echo '<script>$(function(){ document.subform.purchase_batch.value=\''.$purchase_batch_max_v.'\'; })</script>';
        //echo '<input class="TxtUserNameCssClass" id="purchase_batch" maxlength="20" name="purchase_batch" value="'.$purchase_batch_max_v.'">';
        //echo '<script>alert("end");</script>';
        //return $jixing_value->jixing_name;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */