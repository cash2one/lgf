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
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            function jixing_id_gen() {
                $.post("<?php echo base_url() . 'index.php/info_add/jixing_id_gen' ?>", {}, function(data) {
                    if (data.length > 0) {
//                        alert(data);
                        $('#jixing_id').html(data);
                    } else
                        return false;
                })
            }
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform_jixing" action="<?php echo base_url() . 'index.php/info_add/jixing_add' ?>" method="post">
            <table align="center">
                <tr>
                    <td> 剂型id：</td>
                    <td><input type="text" size="17" name="jixing_id" class="k" id="jixing_id" maxlength="20" value=""  placeholder="请点击自动生成……"/></td>
                    <td><input type="button" size="17" name="" value="自动生成" id="" maxlength="20" onclick="jixing_id_gen(this)"/></td>
                </tr>
                <tr>
                    <td>剂型名：</td>
                    <td><input type="text" size="17" name="jixing_name" class="k" id="jixing_name" maxlength="20"/></td>
                </tr>
                <tr>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>