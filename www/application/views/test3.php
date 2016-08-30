<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
#search{font-size:14px;}
#search .k{padding:2px 1px; width:320px;}
#search_auto{border:1px solid #817FB2; position:absolute; display:none;}
#search_auto li{background:#FFF; text-align:left;list-style-type:none;margin-left: -40px;}
#search_auto li.cls{text-align:right;}
#search_auto li a{display:block; padding:5px 6px; cursor:pointer; color:#666;}
#search_auto li a:hover{background:#D8D8D8; text-decoration:none; color:#000;}
</style>
<title>jquery+php实现用户输入搜索内容时自动提示</title>
</head>

<body>
<div id="search">
<input type="text" name="k" class="k" />&nbsp;<input type="button" name="s" value="搜索" />
</div>
    <div id="search_auto"></div>
</body>
</html>
<script src="<?php echo base_url().'js/jquery.js' ?>"></script>
<script>
$(function(){
    $('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
    $('#search input[name="k"]').keyup(function(){
        $.post('<?php echo base_url().'index.php/welcome/test4_check'?>',{'value':$(this).val()},function(data){
            if(data==='0') $('#search_auto').html('').css('display','none');
            else {
                $('#search_auto').html(data).css('display','block');
            }
        });
    });
});

</script>
