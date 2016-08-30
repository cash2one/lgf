<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
     * 导入商品基本信息
     */
	class Excelinput extends CI_Controller {
		public function Excelinput()
		{
		    parent::__construct();
		    $this->load->helper('url');
		}
		
		public function index(){
			$this->load->view('excelinput');
		}
		
		public function input(){
			include_once '/Classes/PHPExcel.php';
			include_once '/Classes/PHPExcel/IOFactory.php';
			include_once '/Classes/PHPExcel/Reader/Excel5.php';
			$config['upload_path']='./upload';
			$config['allowed_types']='jpg|xls|xlsx';
			$config['max_size']='2000';
			$config['overwrite']='true';
			$this->load->library('upload',$config);
//			echo '<br/>'.$_FILES['userfile']['name'];
			$path='./upload/'.$_FILES['userfile']['name'];
				if($f=$this->upload->do_upload()){
					$data=array('upload_data'=>$this->upload->data());
//					var_dump($data);
				}
				else{
					$error=array('error'=>$this->upload->display_errors());
					var_dump($error);
				}
//				var_dump($f);
				$objPHPExcel=PHPExcel_IOFactory::load($path);
				$sheetData=$objPHPExcel->getSheet(0)->toArray(null,true,true,true);
//				var_dump($sheetData);
				
/* users表数据导入 */
/* 				$this->load->model("users_model");
				for ($i=0;$i<count($sheetData);$i++){
					$k=$i+1;
					$arr=array('UserId'=>$sheetData[$k]['A'],
							'UserName'=>$sheetData[$k]['B'],
							'Password'=>$sheetData[$k]['C'],
							'UserCompany'=>$sheetData[$k]['D'],
							'MobilePhone'=>$sheetData[$k]['E']);
//					var_dump($arr);
					$this->users_model->user_insert($arr);
				} */
				
				
/* drugsuncheck表数据导入 */
				$this->load->model("drugsuncheck_model");
				for ($i=0;$i<count($sheetData);$i++){
					$k=$i+1;
					$arr=array('DrugName'=>$sheetData[$k]['A'],
							'DrugUnit'=>$sheetData[$k]['B'],
							'DrugPrice'=>$sheetData[$k]['C'],
							'InputDate'=>date('Y-m-d H:i:s',time()));
//					var_dump($arr);
					$this->drugsuncheck_model->drugsuncheck_insert($arr);
				} 
				
				$this->load->view('input_arr');


/* 			$this->load->model("users_model");
			$this->users_model->user_insert($sheetData); */
		}
		
		public function select(){
/* users表导入后显示 */
/* 			$this->load->model("users_model");
			$data=$this->users_model->user_select('aaa');
			var_dump($data);
			$query=array('query'=>$data);
			$this->load->view('input_view',$query); */
			
/* drugsuncheck表导入后显示 */
			
			//取得InputDate的最大值
			$this->load->model("drugsuncheck_model");
			$data_tmp=$this->drugsuncheck_model->drugsuncheck_select_max_InputDate();
//			var_dump($data_tmp);

			//取得InputDate与InputDate分钟数相同，且审核状态为未审核的数据
			$InputDate=substr($data_tmp[0]->InputDate,0,16);
			$data=$this->drugsuncheck_model->drugsuncheck_select($InputDate);
			
//			var_dump($data);
			$query=array('query'=>$data);
			$this->load->view('input_view',$query);
		}
		
	}
?>