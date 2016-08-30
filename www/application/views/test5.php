 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Ajax Auto Suggest</title> 
<style type="text/css">
            #search{font-size:14px;}
            #search .k{padding:2px 1px; width:320px;}
            #suggestions{border:1px solid #817FB2; position:absolute;} 
            #suggestions li{background:#FFF; text-align:left;} /*设置提示框内的li标签效果*/
            #suggestions li.cls{text-align:right;} /*设置提示框内的关闭按钮效果*/
            #suggestions li a{display:block; padding:5px 6px; cursor:pointer; color:#666;} /*设置提示框内li标签下的a标签效果*/
            #suggestions li a:hover{background:#D8D8D8; text-decoration:none; color:#000;} /*当鼠标移入提示框内时的效果*/
</style>
<script src="<?php echo base_url().'js/jquery.js' ?>"></script>
<script type="text/javascript"> 
function lookup(inputString) { 
if(inputString.length == 0) { 
// Hide the suggestion box. 
$('#suggestion').hide(); 
} else { 
$.post("<?php echo base_url().'index.php/welcome/test6_check'?>", {queryString: ""+inputString+""}, function(data){ 
if(data.length >0) { 
$('#suggestion').show(); 
$('#autoSuggestionsList').html(data); 
} 
}); 
} 
} // lookup 
function fill(thisValue) { 
$('#inputString').val(thisValue); 
setTimeout("$('#suggestion').hide();", 200); 
} 
</script> 
<style type="text/css"> 
body { 
font-family: Helvetica; 
font-size: 11px; 
color: #000; 
} 
h3 { 
margin: 0px; 
padding: 0px; 
} 
.suggestionsBox { 
position: relative; 
left: 30px; 
margin: 10px 0px 0px 0px; 
width: 200px; 
background-color: #212427; 
-moz-border-radius: 7px; 
-webkit-border-radius: 7px; 
border: 2px solid #000; 
color: #fff; 
} 
.suggestionList { 
margin: 0px; 
padding: 0px; 
} 
.suggestionList li { 
margin: 0px 0px 3px 0px; 
padding: 3px; 
cursor: pointer; 
} 
.suggestionList li:hover { 
background-color: #659CD8; 
} 
</style> 
</head> 
<body> 
<div> 
<form> 
<div id="search"> 
Type your county: 
<br /> 
<input type="text" size="30" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" /> 
</div> 
<div class="suggestionsBox" id="suggestion" style="display: none;"> 
<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" /> 
<div class="suggestionList" id="autoSuggestionsList"> 
  
</div> 
</div> 
</form> 
</div> 
</body> 
</html> 
