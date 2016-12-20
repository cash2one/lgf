<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>入院信息录入</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/lgf.js'?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            
            function changjia_id_gen() {
                $.post("<?php echo base_url() . 'index.php/info_add/changjia_id_gen' ?>", {}, function(data) {
                    if (data.length > 0) {
//                        alert(data);
                        $('#changjia_id').html(data);
                    } else
                        return false;
                });
            }
            
            function validation(form){
                var txt_nianling = $.trim($("#nianling0").attr("value"));
                alert(txt_nianling);
                if(txt_nianling==0)
                {
                        alert("年龄不能为空！");
                        return false;
                }else if(isNaN(parseInt(txt_nianling)))
                {
                        alert("年龄必须为数字！");
                        return false;
                }
                else{
                    document.jiuzhen.submit();
                }
            }
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="jiuzhen" action="<?php echo base_url() . 'index.php/data_add/jiuzhen_add' ?>" method="post" >
            <table>
                <tr>
                    <td>日期：</td>
                    <td><input type="text" name="date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/></td>
                </tr>
            </table>
            
            <input type="submit" size="17" name="submit" value="提交"/>
            <!--<td><input type="reset" size="17" name="reset" value="重置"/></td>-->
            
            <table class="table" id="tb">
                <thead>
                    <tr>
                        <th>住院号</th>
                        <th>医院</th>
                        <th>姓名</th>
                        <th>年龄</th>
                        <th>性别</th>
                        <th>科室</th>
                        <th>来源渠道</th>
                        <th>区域</th>
                        <th>初复诊入院</th>
                        <th>预交款</th>
                        <th>参保类型</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <!--住院号-->
                        <td><input type="text" name="hospitalization_id0" value=""/></td>
                        <!--医院-->
                        <td><input type="text" name="yiyuan0" readonly="readonly" value="<?php echo $yiyuan ?>"/></td>
                        <!--姓名-->
                        <td><input type="text" name="name0" value=""/></td>
                        <!--年龄-->
                        <td><input type="text" size="4" name="nianling0" id="nianling0" value="0"/></td>
                        <!--性别-->
                        <td>
                            <select name="xingbie0" id="xingbie0">
                                <option value="0">男</option>
                                <option value="1" selected>女</option>
                            </select>
                        </td>
                        <!--科室-->
                        <td>
                            <select name="keshi0" id="keshi_parent0" onchange="keshi_clickOpt1111(this.id)">
<!--                                <option value="">请选择</option>-->
                                <option value="1">内科</option>
                                <option value="2">外科</option>
                                <option value="3">男科</option>
                                <option value="4">妇科</option>
                                <option value="5">产科</option>
                                <option value="6">耳鼻喉</option>
                                <option value="7">疼痛科</option>
                                <option value="8">中医</option>
                                <option value="9">其他</option>
                            </select>
                        </td>
                        <!--来源渠道-->
                        <td>

                            <select name="laiyuanqudao0" id="laiyuanqudao0">
                                <option value="0">网络</option>
                                <option value="1">电话</option>
                                <option value="2">QQ</option>
                                <option value="3">杂志</option>
                                <option value="4">市场</option>
                                <option value="5">持卡</option>
                                <option value="6">路过</option>
                                <option value="7">附近</option>
                                <option value="8">介绍</option>
                                <option value="9">来过</option>
                                <option value="10">会员证</option>
                        </td>
                        <!--区域-->
                        <td>
                            <select name="quyu0" id="quyu0">
                                <option value="0">县城</option>
                                <option value="1">广顺</option>
                                <option value="2">杜家坝</option>
                            </select>
                        </td>
                        <!--初复诊入院-->
                        <td><select id="jiuzhen_parent0" name="chufuzhenruyuan0" onchange="jiuzhen_clickOpt111(this.id)">
                                <!--<option value="">请选择</option>-->
                                <option value="1">初诊入院</option>
                                <option value="2">复诊入院</option>
                            </select>
                        </td>
                        <!--预交款-->
                        <td><input type="text" size="8" name="yujiaokuan0" id="yujiaokuan0" value="0"/></td>
                        <!--参保类型-->
                        <td>
                            <select name="canbaoleixing0" id="canbaoleixing0">
                                <option value="0">农合</option>
                                <option value="1">职工</option>
                                <option value="2">其他</option>
                            </select>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            <input type="button" name="del" value=" - " onClick="delrow_ruyuan();">
            <input type="button" name="add" value=" + " onClick="addrow1('<?php echo $yiyuan?>');">
        </form>
    </body>
</html>