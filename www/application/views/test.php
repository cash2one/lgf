<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" language="javascript">
            function crertdiv(_parent,_element,_id,_css){//创建层
                var newObj = document.createElement(_element);
                if(_id && _id!="")newObj.id=_id;
                if(_css && _css!=""){
                    newObj.setAttribute("style",_css);
                    newObj.style.cssText = _css;
                }
                if(_parent && _parent!=""){
                    var theObj=getobj(_parent);
                    var parent = theObj.parentNode;
                    if(parent.lastChild == theObj){
                    theObj.appendChild(newObj);
                    } 
                    else{
                        theObj.insertBefore(newObj, theObj.nextSibling);
                    }
                }else
                    document.body.appendChild(newObj);
            }
            function getobj(o){//获取对象
            return document.getElementById(o)
            }
            var swtemp=0,objtemp;
            function showdiv(inputid,inputlist){//显示层
                if (swtemp===1){
                    getobj(objtemp+"mydiv").style.display="none";
                }
                var text_list=inputlist.split(",");
                if (!getobj(inputid+"mydiv")){//若尚未创建就建之
                    var divcss="font-size:12px;color:#00f;position:absolute;left:"+(getobj(inputid).offsetLeft+0)+"px;top:"+(getobj(inputid).offsetTop+25)+"px;border:1px solid red";
                    crertdiv("","div",inputid+"mydiv",divcss);//创建层"mydiv"
                    //alert(document.getElementById("mydiv").outerHTML)
                    crertdiv(inputid+"mydiv","ul",inputid+"myul");//创建ul 
                    for (var i=0,j=text_list.length;i<j;i++){//创建"text_list"li
                        crertdiv(inputid+"myul","li",inputid+"li"+i,"background:#fff");
                        getobj(inputid+"li"+i).innerHTML=text_list[i];
                    }
                    crertdiv(inputid+"myul","li",inputid+"li"+j,"color:#f00;background:#fff");//创建"clear"li
                    getobj(inputid+"li"+j).innerHTML="clear";
                    getobj(inputid+"mydiv").innerHTML +="<style type='text/css'>#"+inputid+"mydiv ul {padding:0px;margin:0;}#"+inputid+"mydiv ul li{list-style-type:none;padding:5px;margin:0;float:left1;CURSOR: pointer;}</style>";
                    for (var i=0;i<=j;i++){
                        getobj(inputid+"li"+i).onmouseover=function(){
                            this.style.background="#eee";clearTimeout(timer);
                        };
                        getobj(inputid+"li"+i).onmouseout=function(){
                            this.style.background="#fff";
                        };
                    }
                }
                var newdiv=getobj(inputid+"mydiv");
                newdiv.onclick=function(){hiddiv(event,inputid);};
                newdiv.onmouseout=function(){Mout(this);};
                newdiv.onmouseover=function(){clearTimeout(timer);};
                getobj(inputid).onmouseout=function(){Mout(newdiv);};
                newdiv.style.display="block";
                swtemp=1;
                objtemp=inputid; 
            }
            var timer;
            function Mout(o){
                timer=setTimeout(function(){o.style.display="none";},300);
                swtemp=0;
            }
            function hiddiv(e,inputid){
                e=e||window.event;
                ev=e.target||e.srcElement;
                v=ev.innerText||ev.textContent;
                if (v!=="clear")
                    getobj(inputid).value=v;else getobj(inputid).value="";
                getobj(inputid+"mydiv").style.display="none";
            }
        </script>
    </head>
    <body>
<br>
<br>
<br>
<br>
....利用定义标签赋值....（onclick）....<input id="mytext" type="text"onclick="showdiv(this.id,this.list.value)" list="文本框,弹出层,值赋"/>
<br>
<br>
<script>
var $list="文本框2,弹出层2,值赋2,文本框2-1,弹出层2-1,值赋2-1";


</script>

<?php $arr=array('文本框2','弹出层2','值赋2',);
    echo $value="";
    echo '<br/>';
    foreach($arr as $key=>$val){
        echo $value.=$val.',';
    }
    echo '<br/>';
    echo $value;
?>
<br>
<br>
<?php 
$value="PHP本框2,弹出层2,值赋2,文本框2-1,弹出层2-1,值赋2-1";
echo $value;?>

....利用定义JS变量赋值...（onclick）....<input id="mytext2" type="text" onclick="showdiv(this.id,$list)"/>
<br>
<br>
<br>
PHP....利用定义JS变量赋值...（onclick）....<input id="mytext4" type="text" onclick="showdiv(this.id,getobj('<?php echo "$value";?>').value))"/>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table>
<form action="infof_add.asp?id=<%=strid%>" method="post" id="myForm" name="myform" onSubmit="return checkdata();">
<tr><td></td></tr>
<tr><td>
<input type="hidden" value="<?php echo "$value";?>" id="list">
....利用隐藏域值赋值....（onmouseover）.....<input id="mytext3" type="text" onmouseover="showdiv(this.id,getobj('list').value)"/>

</td></tr>
</form>
</table>
</body>
</html>