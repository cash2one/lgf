<html>
    <head>
        <title>商品信息添加成功</title>
        <script>
            setTimeout("javascript:location.href='<?php echo base_url() . 'index.php/info_add/drug_property_add' ?>'", 1000);
            function goback(){
                window.history.go(-1);
            }
        </script>
    </head>
    <body>
        success
        <input type="button" name="返回" value="返回修改" onclick="goback()"/>

    </body>
</html>