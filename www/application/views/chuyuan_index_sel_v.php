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
            
        </script>
        
    </head>
    <body id="chuyuan_index_sel_body">
        <form name="ruyuan" action="<?php echo base_url() . 'index.php/data_add/ruyuan_add' ?>" method="post" >
            <table class="table">
                <tr>
                    <td>入院日期：</td>
                    <td><input type="text" name="ruyuan_date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/></td>
                    <!--住院号-->
                    <td>住院号：</td>
                    <td><input type="text" name="hospitalization_id0" value=""/></td>
                    
                </tr>
                <tr>
                    <!--姓名-->
                    <td>姓名：</td>
                    <td><input type="text" name="name0" value=""/></td>
                    <!--年龄-->
                    <td>年龄：</td>
                    <td><input type="text" size="4" name="nianling0" id="nianling0" value="0"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" size="17" name="submit" value="查询"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                    <td></td>
                </tr>
            </table>
            
            
        </form>
    </body>
    

</html>