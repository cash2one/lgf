<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_form extends CI_Controller {

    public function report_form(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('drug_purchase_m');
        $this->load->model('report_form_m');
        $this->load->library('pagination');
    }
    
    public function index()
    {
	$this->load->view('welcome_message');
    }
    
    public function price_comp_v()
    {
	$this->load->view('drug_purchase_price_comp_v');
    }
    
    public function drug_purchase_price_comp()
    {
	$drug_name=$_POST['drug_name'];
//        $supplier_name=$_POST['supplier_name'];
        $price_min=$_POST['price_min'];
        $price_max=$_POST['price_max'];
        if($price_min==null)
            $price_min=0;
        if($price_max==null)
            $price_max=999999999999;
//        echo $drug_name;
//        echo $price_min;
//        echo $price_max;
        $data['drug_name']=$drug_name;
        $data['price_min']=$price_min;
        $data['price_max']=$price_max;
        $this->form_validation->set_rules('drug_name','药品名','required');
        $this->form_validation->set_rules('price_min','最低价格','numeric');
        $this->form_validation->set_rules('price_max','最低价格','numeric');
        $bool=$this->form_validation->run();
        if($bool){
//        echo $durg_name='阿莫西林颗粒';
//        echo $price_min=0;
//        echo $price_max=10;
        echo '<br>';
        $arr=$this->report_form_m->drug_purchase_price_comp($drug_name,$price_min,$price_max);
//        $arr=$this->report_form_m->drug_purchase_price_comp($durg_name,$price_min,$price_max,$offset,$page_size);
        
        //分页begin
//        $config['base_url'] =  site_url('report_form/drug_purchase_price_comp');
//        $config['total_rows'] = 5;
//        $config['per_page'] = 2; 
//        $page_size=2;
//        $this->pagination->initialize($config); 
//        $offset=intval($this->uri->segment(3));
//        $arr=$this->report_form_m->drug_purchase_price_comp($durg_name,$price_min,$price_max,$offset,$page_size);
//        $data['arr']=$arr;
//        $data['page']= $this->pagination->create_links();
        //分页end
        $data['arr']=$arr;
        
        $this->load->view('drug_pruchase_price_comp_result_v',$data);
//        var_dump($page);
//        echo 'my page'.$page;
//        echo '<span>'.$page.'</span>';
////        var_dump($arr);
//        echo count($arr);
        
        
//        echo $data['links']=$this->pagination->create_links();
//        $this->load->view();

//        echo '<script>alert('.$links.')</script>';
//        $this->load->view('drug_purchase_add_v');
        }
        else{
            $this->load->view('drug_purchase_price_comp_v');
        }
    }
    
    public function export_excel(){
        include_once '/Classes/PHPExcel.php';
        include_once '/Classes/PHPExcel/IOFactory.php';
        include_once '/Classes/PHPExcel/Writer/Excel5.php';
        $resultPHPExcel = new PHPExcel(); 
        $resultPHPExcel->getActiveSheet()->setCellValue('A1', '季度'); 
        $resultPHPExcel->getActiveSheet()->setCellValue('B1', '名称'); 
        $resultPHPExcel->getActiveSheet()->setCellValue('C1', '数量'); 
        $i = 2; 
//        foreach($data as $item){ 
//        $resultPHPExcel->getActiveSheet()->setCellValue('A' . $i, $item['quarter']); 
//        $resultPHPExcel->getActiveSheet()->setCellValue('B' . $i, $item['name']); 
//        $resultPHPExcel->getActiveSheet()->setCellValue('C' . $i, $item['number']); 
//        $i ++; 
//        }
        
        $resultPHPExcel->getActiveSheet()->setCellValue('A2','四'); 
        $resultPHPExcel->getActiveSheet()->setCellValue('B2','火箭'); 
        $resultPHPExcel->getActiveSheet()->setCellValue('C2','102'); 
        $outputFileName = 'total.xls'; 
//        $xlsWriter = new PHPExcel_Writer_Excel5($resultPHPExcel); 
        $xlsWriter = PHPExcel_IOFactory::createWriter($resultPHPExcel, 'Excel5');
        //ob_start(); ob_flush(); 
        header("Content-Type: application/force-download"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Type: application/download"); 
//        header('Content-Disposition:inline;filename="'.$outputFileName.'"');
        header("Content-Disposition:attachment;filename=".$outputFileName);
        header("Content-Transfer-Encoding: binary"); 
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Pragma: no-cache"); 
        $xlsWriter->save( "php://output" );
    }


    public function add()
    {   
        //session_start();
        //$data['userid']=@$_SESSION['userid'];
        $this->load->view('drug_purchase_add_v');
    }
    
    public function check()
    {
	$this->load->view('drug_purchase_check_v');
    }
    
    public function select1()
    {
	$this->load->view('drug_purchase_select1_v');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */