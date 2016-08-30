<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Captcha Form</title>
<script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
<script type="text/javascript">
function get_captcha() {
    $.get("<?php echo site_url('login/get_captcha');?>", function(data){
        $('#captcha-image').html(data);
    });
};
$(function(){
    get_captcha();
    $('#reload-captcha').click(get_captcha);
})
</script>
</head>
<body>
    <form method="post">
        <p id="captcha-image"></p>
        <p><a href="javascript:void(0);" id="reload-captcha" onclick="get_captcha();">Reload Captcha</a></p>
        <p><input type="text" name="captcha" /></p>
        <p><input type="submit" value="submit" /></p>
    </form>
</body>
</html>