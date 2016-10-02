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
        <form name="shouru_every" action="<?php echo base_url() . 'index.php/data_add/zhuyuan_shouru_every_add' ?>" method="post" >
            <table class="table">
                <tr>
                    <td>日期：</td>
                    <td><input type="text" name="date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/></td>
                </tr>
            

                <tr>
                    <!--预交款-->
                    <td>预交款：</td>
                    <td><input type="text" name="yujiaokuan" value="0"/></td>
                    <!--退补款-->
                    <td>退补款：</td>
                    <td><input type="text" name="tuibukuan" value="0"/></td>
                </tr>
                <tr>
                    <!--现金收入-->
                    <td>现金收入：</td>
                    <td><input type="text" name="xianjinshouru" value="0"/></td>
                    <!--医保收入-->
                    <td>医保收入：</td>
                    <td><input type="text" name="yibaoshouru" value="0"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>