<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function welcome(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('form_validation');
        $this->load->model('sys_manager_m');
        $this->load->library('pagination');
        
    }
	public function index()
	{
            phpinfo();
		//$this->load->view('test');
	}
        
        public function pag(){
            $config['base_url'] =  site_url('welcome/pag');
            $config['total_rows'] = 100;
            $config['per_page'] = 10; 
            $page_size=10;
            $this->pagination->initialize($config); 
            $offset=intval($this->uri->segment(3));
            $sql="select * from blog_user limit $offset,$page_size";
            echo '<span>'.$sql.'</span>';

//          echo $data['links']=$this->pagination->create_links();
//          $this->load->view();
            echo $this->pagination->create_links();
        }


        public function test1()
	{
		$this->load->view('test1');
	}
        
        public function list_add()
	{
            //echo '<script>alert("list_success");</script>';
            echo '<table><tr><td width="50" align="center"><input size="6" type="text" id="lie1"/></td><td width="50" align="center"><input size="6" type="text" id="lie2"/></td><td width="50" align="center"><input size="6" type="text" id="lie3"/></td><td width="50" align="center"><input size="6" type="text" id="lie4"/></td><td width="50" align="center"><input size="6" type="text" id="lie5"/></td><td><input size="6" type="text" id="lie6"/></td><td width="50" align="center"><input size="6" type="text" id="lie7"/></td><td width="50" align="center"><input size="6" type="text" id="lie8"/></td></tr><table>';
            //$this->load->view('test1');
	}
        
        public function test2()
	{
		$this->load->view('test2');
	}
        
        public function test3()
	{
		$this->load->view('test3');
	}
        
        public function test4()
	{
		$this->load->view('test4');
	}
        
        public function test4_check()
	{
		//$this->load->view('test4');
                
                $v=$_POST['value'];
                if($v){
                    $userid=$this->sys_manager_m->auto_select($v);
                    //var_dump($userid);
                    //$re=mysql_query("select * from test where title like '%$v%' order by addtime desc limit 10");//根据客户端发送来的数据，到数据库中查询10条相关的结果
                    //if(mysql_num_rows($userid)<=0){
                    if(!$userid){
                        exit('0');//判断查询结果，如果没有相关的结果，那么直接返回0
                    }
                    echo '<ul>';
                    //echo mysql_fetch_array($userid);
                    foreach ($userid as $key => $va) {
                    //    echo $va->userid;
                        echo '<li value="111"><a href="" value="yonghuming" onclick="getvalue(\'';
                        echo $va->userid;
                        echo '\')" id="';
                        echo $va->userid;
                        echo '">'.$va->userid.'</a></li>';//将查询得到的相关结果的标题输出，这个地方需要注意，由于通过jQuery的ajax技术返回的文本是UTF-8编码，所以如果$ro[title] 中包含中文，一定要记得用PHP的iconv或其它函数将其转换成UTF-8编码，否则在页面中看到的会是一串乱码
                    }
                    //while($ro=mysql_fetch_array($userid)){
                    //    echo '<li><a href="">'.$ro['userid'].'</a></li>';//将查询得到的相关结果的标题输出，这个地方需要注意，由于通过jQuery的ajax技术返回的文本是UTF-8编码，所以如果$ro[title] 中包含中文，一定要记得用PHP的iconv或其它函数将其转换成UTF-8编码，否则在页面中看到的会是一串乱码
                    //}
                    echo '<li class="cls"><a href="javascript:;" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';//输入一个关闭按钮，让用户不想看到提示层时可以点击关闭，关闭按钮采用jQuery，解释一下，当前点击的按钮是$(this)，一直向上找到其第三个父元素，让它逐渐消失
                    echo '</ul>';
                    //echo $va->userid;
                    //echo '<script>function getvalue(id){alert($(\'#search input[name="k"]\').value=id);}</script>';
                    //echo '<script>function getvalue(id){';
                    //session_start();
                    //$_SESSION[id];
                    //echo 'alert($(\'#search input[name="k"]\').value=id);}</script>';
                    //echo $_SESSION[id];
                    //echo '<script>function add(id){alert(id);}add("cwf");</script>';
                }
                
	}
        
        public function test5()
	{
		$this->load->view('test5');
	}
        
        public function test6()
	{
		$this->load->view('test6_ajax_input_notice');
	}
        public function test6_check()
	{
            
                $queryString = $_POST['queryString']; 
                if(strlen($queryString) >0) { 
                $userid=$this->sys_manager_m->auto_select($queryString);
                if($userid){
                    //echo '<script>$(\'#search_auto\').show();</script>';
                    foreach ($userid as $key => $va) {
                        $value=$va->userid;
                        //$va->userid;
                        echo '<li ><span onClick="fill(\''.$value.'\');">'.$value.'</span></li>'; 
                    }
                    //echo '<li class="cls"><span href="javascript:;" onclick="$(this).fadeOut(100)">关闭</span& gt;</li>';
                }   //关闭功能中点击关闭后，原来输入的内容会丢失
                
                //while ($result = mysql_fetch_array($query,MYSQL_BOTH)){ 
                //$value=$result['value']; 
                //echo '<li onClick="fill(\''.$value.'\');">'.$value.'</li>'; 
                //} 
                }
            
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */