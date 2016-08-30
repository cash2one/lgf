<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>Ajax Auto Suggest</title> 
        <style type="text/css">
            #search{font-size:14px;}
            #search .k{padding:2px 1px; width:320px;}
            #autoSuggestionsList{border:1px solid #817FB2; position:absolute;width: 241px;} 
            #autoSuggestionsList li{background:#FFF; text-align:left;} /*设置提示框内的li标签效果*/
            #autoSuggestionsList li{background:#FFF; text-align:left; list-style-type:none;} 
            #autoSuggestionsList li.cls{text-align:right;} /*设置提示框内的关闭按钮效果*/
            #autoSuggestionsList li span{display:block; padding:5px 6px; cursor:pointer; color:#666;} /*设置提示框内li标签下的a标签效果*/
            #autoSuggestionsList li span:hover{background:#D8D8D8; text-decoration:none; color:#000;} /*当鼠标移入提示框内时的效果*/
        </style>
        <script src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script type="text/javascript"> 
            

            function lookup(inputString) { 
                if(inputString.length == 0) { 
                // Hide the suggestion box. 
                $('#search_auto').hide(); 
                } else { 
                $('#autoSuggestionsList').css({'width':$('#search input[name="k"]').width()+4});
                $.post("<?php echo base_url().'index.php/welcome/test6_check'?>", {queryString: ""+inputString+""}, function(data){ 
                if(data.length >0) { 
                $('#search_auto').show(); 
                $('#autoSuggestionsList').html(data); 
                alert(date);
                }else 
                $('#search_auto').hide();
                }); 
                }
            } // lookup 
            
            
            
            function fill(thisValue) { 
                if(thisValue){
                    $('#inputString').val(thisValue);  
                }
                setTimeout("$('#search_auto').hide();", 200);
                
            } 
            
            //以下函数为设置提示框的宽度
            //$(function(){
            //    $('#autoSuggestionsList').css({'width':$('#search input[name="k"]').width()+4});
            //});
        </script>
    </head> 
    <body> 
        <form> 
            <div id="search"> 
                Type your county:
                <br />
                <input type="text" size="30" name="k" class="k" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
                <!--
                onkeyup 事件会在键盘按键被松开时发生
                onblur 事件会在对象失去焦点时发生
                -->
            </div> 
            <div class="suggestionsBox" id="search_auto" style="display: none;"> 
                <div id="autoSuggestionsList"></div>
            </div> 
        </form> 
    </body>
</html>
