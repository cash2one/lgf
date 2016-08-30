
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>用户登录</title>

        <link href="<?php echo base_url().'css/User_Login.css' ?>" type="text/css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script type="text/javascript">
        function get_captcha() {
            $.get("<?php echo site_url('login/get_captcha');?>", function(data){
                $('#captcha-image').html(data);
            });
        };
        $(function(){
            get_captcha();
            //$('#reload-captcha').click(get_captcha);
        })
        </script>
    </head><body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <dl>
                <dd id="user_top">
                    <ul>
                        <li class="user_top_l"></li>
                        <li class="user_top_c"></li>
                        <li class="user_top_r"></li></ul>
                </dd><dd id="user_main">
                    <form action="/index.php/login/checklogin" method="post">
                        <ul>
                            <li class="user_main_l"></li>
                            <li class="user_main_c">
                                <div class="user_main_box">
                                    
                                    <ul>
                                        <li class="user_main_text">用户ID： </li>
                                        <li class="user_main_input">
                                            <input class="TxtUserNameCssClass" id="userid" maxlength="20" name="userid" value="<?php echo set_value('userid') ?>"> </li>
                                        
                                    </ul>
                                    <ul>
                                        <li class=""><?php echo form_error('userid'); ?></li>
                                    </ul>
                                    <?php // echo '<script>alert(\''.form_error('userid').'\')</script>'; ?>
                                    
                                    <ul>
                                        <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                                        <li class="user_main_input">
                                            <input class="TxtPasswordCssClass" id="password" name="password" type="password">
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class=""><?php echo form_error('password'); ?></li>
                                    </ul>
                                    <ul>
                                        <li class="user_main_text">验证码： </li>
                                        
                                        <li class="user_main_input">
                                            <input class="TxtValidateCodeCssClass" id="captcha" name="captcha" type="text">
                                                
                                                
                                                <li id="captcha-image" onclick="get_captcha();"></li>
                                                
                                                
                                                <!--
                                                <img src="<?php echo base_url().'/img/admin.png' ?>"  alt="" />
                                                -->
                                        </li>
                                        
                                        
                                    </ul>
                                    <ul>
                                        <li class=""><?php echo form_error('captcha'); ?></li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="user_main_r">

                                <input style="border: medium none; background: url(<?php echo base_url().'/img/user_botton.gif'?>) repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                                    <a href="/index.php/sys_manager/user_add">注册</a>
                            </li>
                        </ul>
                        
                    </form>
                </dd><dd id="user_bottom">
                    <ul>
                        <li class="user_bottom_l"></li>
                        <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
                        <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
        <div id="ValidationSummary1" style="display: none; color: red;"></div>
    </body>
</html>