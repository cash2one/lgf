<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>级联下拉框</title>

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
                var parent = document.getElementById("parent");
                var p_value = parent.value;

                //子选择项的长度，长度大于0，即将所有选择项清空
                var child = document.getElementById("child");
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
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform_changjia" action="<?php echo base_url() . 'index.php/info_add/changjia_add' ?>" method="post">
            <table>
                <tr>
                    <td style="width:15%">
                    一级
                    </td>
                    <td  style="text-align:left ;width:35%">            
                        <select name="unitPropertiesOneLevel" id="parent" onchange="clickOpt()"style="width:150px">
                                <option value="" >请选择</option>
                                <option value="1" >A</option>
                                <option value="2" >B</option>
                                <option value="4" >C</option>
                        </select>   
                    </td>
                    <td style="width:15%">
                        二级
                    </td>
                    <td style="text-align:left ;width:35%">
                        <select name="unitPropertiesTwoLevel" id="child" style="width:150px">
                            <option value="" >&nbsp;&nbsp;</option>
                        </select>   
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

