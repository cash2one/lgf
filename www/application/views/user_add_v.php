<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>用户注册</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
    </head>
    <body id="userlogin_body">
        
        <form action="/index.php/sys_manager/user_add" method="post">
            <table align="center">
                <tr>
                    <td>用户ID： </td>
                    <td><input class="TxtUserNameCssClass" id="userid" maxlength="20" name="userid" value="<?php echo set_value('userid') ?>"></td>
                    <td><?php echo form_error('userid'); ?></td>
                </tr>
                <tr>
                    <td>姓&nbsp;&nbsp;&nbsp;&nbsp;名： </td>
                    <td><input class="TxtUserNameCssClass" id="username" maxlength="20" name="username" value="<?php echo set_value('username') ?>"></td>
                    <td><?php echo form_error('username'); ?></td>
                </tr>
                <tr>
                    <td>密&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
                    <td><input class="TxtPasswordCssClass" id="password" name="password" type="password"></td>
                    <td><?php echo form_error('password'); ?></td>
                </tr>
                <tr>
                    <td>确认密码：</td>
                    <td><input class="TxtPasswordCssClass" id="confirmpassword" name="confirmpassword" type="password"></td>
                    <td><?php echo form_error('confirmpassword'); ?></td>
                </tr>
                <tr>
                    <td>单&nbsp;&nbsp;&nbsp;&nbsp;位：</td>
                    <td><input class="TxtPasswordCssClass" id="company" name="company" type="text" value="<?php echo set_value('company') ?>"></td>
                    <td>
                        
<!--                        <select style="width:180px;height: 25px;" name="company" id="company" class="TxtPasswordCssClass1">
                            <?php foreach ($company as $company_va) {
                                ?>
                                <option value="<?php echo $company_va->company_name ?>"><?php echo $company_va->company_id;echo '  ';echo $company_va->company_name ?></option>
                                <?php
                            }
                            ?>
                        </select>-->
                    </td>
                    <td><?php echo form_error('company'); ?></td>
                </tr>
                <tr>
                    <td>电&nbsp;&nbsp;&nbsp;&nbsp;话：</td>
                    <td><input class="TxtPasswordCssClass" id="mobilephone" name="mobilephone" type="text" value="<?php echo set_value('mobilephone') ?>"></td>
                    <td><?php echo form_error('mobilephone'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input style="border: medium none; background: url(<?php echo base_url() . '/img/user_register.png' ?>) repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit"></td>
                </tr>
            </table>
            </form>
    </body>
</html>