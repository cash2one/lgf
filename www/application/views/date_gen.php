<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>药品剂型录入</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js' ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            
            
            
            function changjia_id_gen() {
                $.post("<?php echo base_url() . 'index.php/info_add/changjia_id_gen' ?>", {}, function(data) {
                    if (data.length > 0) {
//                        alert(data);
                        $('#changjia_id').html(data);
                    } else
                        return false;
                })
            }
        </script>
        
    </head>
    <body id="userlogin_body">
        (1)只选择日期  <input type="text" name="date"  readOnly onClick="setDay(this);"><br/>
 (2)选择日期和小时 <input type="text" name="dateh" readOnly onClick="setDayH(this);"><br/>
 (3)选择日期和小时及分钟 <input type="text" name="datehm" readOnly onClick="setDayHM(this);">
        <form name="subform_changjia" action="<?php echo base_url() . 'index.php/info_add/changjia_add' ?>" method="post">
            <table>
                <tr>
                    <td align=right>您的生日：</td>
                    <td><input type="text" name="date"  readOnly onClick="setDay(this);"/></td>
                    <td><input type=button name=Submit value=选择 onClick=setDay(this); /></td>
                </tr>
            </table>
        </form>
    </body>
</html>

