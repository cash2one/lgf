<html>
    <head>
        <title>用户添加成功</title>
        <script>
            setTimeout("javascript:location.href='<?php echo base_url() . 'index.php/login' ?>'", 3000);
            function goback(){
                window.history.go(-1);
            }
        </script>
    </head>
    <body>
        <h5 align="center">注册成功！3秒后跳转到登录界面</h5>
<!--        <input type="button" name="返回" value="返回修改" onclick="goback()"/>-->

    </body>
</html>