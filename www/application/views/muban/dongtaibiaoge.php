<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>动态表格</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js' ?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            function clickOpt(){
                //父选择项
                var j;
                var parent = document.getElementById("parent"+j);
                var p_value = parent.value;

                //子选择项的长度，长度大于0，即将所有选择项清空
                var child = document.getElementById("child"+j);
                var c_length = child.options.length;
                if(c_length > 0){
                        for(var i = 0;i < c_length;i++){
                                child.options.remove(0);
                        }
                }

                //重新重建子选择项
                if(p_value == "1"){//父
                        for($i=4;$i<=6;$i++){//子
                                addOption($i,$i*$i);
                        }
                }else if(p_value == "2"){
                        for($i=7;$i<=9;$i++){
                                addOption($i,$i*$i);
                        }
                }else if(p_value == "4"){
                        for($i=10;$i<=13;$i++){
                                addOption($i,$i*$i);
                        }
                }
            }

            //创建子选择项
            function addOption(val,txt){
                    var opt=document.createElement("option");//创建一个对象
                    opt.text=txt;
                    opt.value=val;
                    child.options.add(opt);
            }
            
            
            
            /*操作表格,为表格添加行,删除行操作*/
            function delrow() {
                var i = tb.rows.length;
                if(i>1)
                tb.deleteRow(i - 1);
                
            }
            function addrow() {
            var tr = document.createElement('tr');
            var i=tb.rows.length;



        td1 = document.createElement('td');
        td1.innerHTML = '<input type="text" value="1"/>'
        tr.appendChild(td1);

        td2 = document.createElement('td');
        td2.innerHTML = '<input type="text" value="2"id=""/>'
        tr.appendChild(td2);

        td3 = document.createElement('td');
        td3.innerHTML = '<select name="unitPropertiesOneLevel" id="parent'+i+'" onchange="clickOpt()"style="width:150px"><option value="" >请选择</option><option value="1" >A</option><option value="2" >B</option><option value="4" >C</option></select>'
        tr.appendChild(td3);

        td4 = document.createElement('td');
        td4.innerHTML = '<select name="unitPropertiesTwoLevel" id="child'+i+'" style="width:150px"><option value="" >&nbsp;&nbsp;</option></select>'
        tr.appendChild(td4);


tb.tBodies[0].appendChild(tr);
}
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform_changjia" action="<?php echo base_url() . 'index.php/info_add/changjia_add' ?>" method="post">
            <table width="100%" border="1" id="tb">
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <p>
            <input type="button" name="Submit" value=" - " onClick="delrow();">
            <input type="button" name="Submit" value=" ++ " onClick="addrow();">
        </form>
    </body>
</html>

