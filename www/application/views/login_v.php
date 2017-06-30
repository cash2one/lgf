
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>用户登录</title>

        <link href="<?php echo base_url().'css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js' ?>"></script>
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
    </head>
    <body id="">
        <div class="container">
            <div class="text-center" style="margin-top: 100px;margin-bottom: 50px">
                <h1>系统登录</h1>
            </div>
            <div class="">
                <form class="form-horizontal" action="/index.php/login/checklogin" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-md-offset-3 control-label">用户名</label>
                        <div class="col-sm-3">
                            <input class="form-control" id="userid" maxlength="20" name="userid" value="<?php echo set_value('userid') ?>">
                        </div>
                        <div class="col-sm-3">
                            <?php echo form_error('userid'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 col-md-offset-3 control-label">密码</label>
                        <div class="col-sm-3">
                            <input class="form-control" id="password" name="password" type="password">
                        </div>
                        <div class="col-sm-3">
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-md-offset-3 control-label">验证码</label>
                        <div class="col-sm-3">
                            <input class="form-control" id="captcha" name="captcha" type="text">
                        </div>
                        <div class="col-sm-1">
                            <span id="captcha-image" onclick="get_captcha();"></span>
                        </div>
                        <div class="col-sm-3">
                            <p><?php echo form_error('captcha'); ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> 记住密码
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-10">
                            <button type="submit" class="btn btn-primary">登录</button>
                            <button type="reset" class="btn btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>