<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>患者信息录入</title>

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
                })
            }
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform_changjia" action="<?php echo base_url() . 'index.php/data_add/jiuzhen_add' ?>" method="post">
            <table>
                <tr>
                    <td>日期：</td>
                    <td><input type="text" name="date"  readOnly onClick="setDay(this);"/></td>
                </tr>
            </table>
            
            <input type="submit" size="17" name="submit" value="提交"/>
            <!--<td><input type="reset" size="17" name="reset" value="重置"/></td>-->
            
            <table class="table" id="tb">
                <thead>
                    <tr>
                        <th>单位</th>
                        <th>初复诊</th>
                        <th>流失</th>
                        <th>科室</th>
                        <th>诊室</th>
                        <th>病种</th>
                        <th>来源渠道</th>
                        <th>年龄</th>
                        <th>性别</th>
                        <th>区域</th>
                        <th>是否收住院</th>
                        <th>是否治疗</th>
                        <th>治疗费</th>
                        <th>是否手术</th>
                        <th>手术费</th>
                        <th>门诊消费</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!--医院-->
                        <td><input type="text" name="yiyuan0"/></td>
                        <!--初复诊-->
                        <td><select id="jiuzhen_parent0" name="jiuzhen_parent0" onchange="jiuzhen_clickOpt(this.id)">
                                <option value="">请选择</option>
                                <option value="1">初诊</option>
                                <option value="2">复诊</option>
                            </select>
                        </td>
                        <!--流失-->
                        <td>
                            <select id="jiuzhen_child0" name="jiuzhen_child0">
                                <option>请选择初复诊</option>
                            </select>
                        </td>
                        <!--科室-->
                        <td>
                            <select name="keshi_parent0" id="keshi_parent0" onchange="keshi_clickOpt(this.id)">
                                <option value="">请选择</option>
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
                        <!--诊室-->
                        <td>
                            <select id="zhenshi_child0" name="zhenshi_child0">
                                <option>请选择科室</option>
                            </select>
                        </td>
                        <!--病种-->
                        <td>
                            <select id="bingzhong_child0" name="bingzhong_child0">
                                <option>请选择科室</option>
                            </select>
                        </td>
                        <!--来源渠道-->
                        <td>
                            <select nane="laiyuanqudao0" id="laiyuanqudao0">
                                <option>网络</option>
                                <option>电话</option>
                                <option>QQ</option>
                                <option>杂志</option>
                                <option>市场</option>
                                <option>持卡</option>
                                <option>路过</option>
                                <option>附近</option>
                                <option>介绍</option>
                                <option>来过</option>
                                <option>会员证</option>
                            </select>
                        </td>
                        <!--年龄-->
                        <td><input type="text" size="4" name="nianling0" id="nianling0"/></td>
                        <!--性别-->
                        <td>
                            <select name="xingbie0" id="xingbie0">
                                <option>男</option>
                                <option>女</option>
                            </select>
                        </td>
                        <!--区域-->
                        <td>
                            <select name="quyu0" id="quyu0">
                                <option>县城</option>
                                <option>广顺</option>
                                <option>杜家坝</option>
                            </select>
                        </td>
                        <!--是否收住院-->
                        <td>
                            <select name="shouzhuyuan0" id="shouzhuyuan0">
                                <option>是</option>
                                <option selected="selected">否</option>
                            </select>
                        </td>
                        <!--是否治疗-->
                        <td>
                            <select name="zhiliao0" id="zhiliao0">
                                <option>是</option>
                                <option selected="selected">否</option>
                            </select>
                        </td>
                        <!--治疗费-->
                        <td><input type="text" size="8" name="zhilioafei0" id="zhilioafei0"/></td>
                        <!--是否手术-->
                        <td>
                            <select name="shoushu0" id="shoushu0">
                                <option>是</option>
                                <option selected="selected">否</option>
                            </select>
                        </td>
                        <!--手术费-->
                        <td><input type="text" size="8" name="shoushufei0" id="shoushufei0"/></td>
                        <!--门诊消费-->
                        <td><input type="text" size="8" name="menzhenxiaofei0" id="menzhenxiaofei0"/></td>
                        
                    </tr>
                    
                </tbody>
            </table>
            <input type="button" name="Submit" value=" - " onClick="delrow();">
            <input type="button" name="Submit" value=" + " onClick="addrow();">
        </form>
    </body>
</html>