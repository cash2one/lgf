<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>患者信息录入</title>

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
    <body>
        <div class="container">
        <form name="shouru_every" action="<?php echo base_url() . 'index.php/data_add/menzhen_shouru_every_add' ?>" method="post" >
            <div style="margin-top: 100px;margin-top: 100px">
            <table class="table">
                <tr>
                    <td>日期：</td>
                    <td><input type="text" name="date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/></td>
                    <td></td>
                    <td></td>
                </tr>
            

                <tr>
                    <!--预交款-->
                    <td>银  联：</td>
                    <td><input type="text" name="yinlian" value="0"/></td>
                    <!--退补款-->
                    <td>医  保：</td>
                    <td><input type="text" name="yibao" value="0"/></td>
                </tr>
                <tr>
                    <!--现金收入-->
                    <td>当日支出：</td>
                    <td><input type="text" name="dangrizhichu" value="0"/></td>
                    <!--医保收入-->
                    <td>大笔支出：</td>
                    <td><input type="text" name="dabizhichu" value="0"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                    <td></td>
                </tr>
            </table>
                </div>
        </form>
            </div>
    </body>
</html>