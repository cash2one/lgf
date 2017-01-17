<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=pragma content=no-cache />
        <meta http-equiv=cache-control content=no-cache />
        <meta http-equiv=expires content=-1000 />

        <title>出院信息录入</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/lgf.js'?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">            
            function validation(form){
                var txt_nianling = $.trim($("#nianling0").attr("value"));
                alert(txt_nianling);
                if(txt_nianling==0)
                {
                        alert("年龄不能为空！");
                        return false;
                }else if(isNaN(parseInt(txt_nianling)))
                {
                        alert("年龄必须为数字！");
                        return false;
                }
                else{
                    document.jiuzhen.submit();
                }
            }
        </script>
        
    </head>
    <body>
        
    </body>
    

</html>