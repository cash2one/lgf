<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <title>下拉框自动显示搜索结果</title>
        <style type="text/css">
            #search{font-size:14px;}
            #search .k{padding:2px 1px; width:320px;}
            #search_auto{border:1px solid #817FB2; position:absolute;} 
            #search_auto li{background:#FFF; text-align:left;} /*设置提示框内的li标签效果*/
            #search_auto li.cls{text-align:right;} /*设置提示框内的关闭按钮效果*/
            #search_auto li a{display:block; padding:5px 6px; cursor:pointer; color:#666;} /*设置提示框内li标签下的a标签效果*/
            #search_auto li a:hover{background:#D8D8D8; text-decoration:none; color:#000;} /*当鼠标移入提示框内时的效果*/
        </style>
    </head>
    
    <body>
        <div id="search">
        <input type="text" name="k" class="k" />&nbsp;<input type="button" name="s" value="搜索" />
        </div>
        <div id="search_auto"></div>
        
        
        <script>
        $(function(){

        $('#search_auto').css({'width':$('#search input[name="k"]').width()+4});
        $('#search input[name="k"]').keyup(function(){
        $.post('<?php echo base_url().'index.php/welcome/test4_check'?>',{'value':$(this).val()},function(data){
        if(data=='0') $('#search_auto').html('').css('display','none');
        else $('#search_auto').html(data).css('display','block');
        });
        });

        });
        </script>


           
        

    </body>
</html>