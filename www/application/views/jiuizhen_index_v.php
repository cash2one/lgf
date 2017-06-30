<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>患者信息录入</title>

        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet" media="screen"/>
        <link href="<?php echo base_url() . 'css/lgf.css' ?>" rel="stylesheet" media="screen"/>
        <script type="text/javascript" src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/bootstrap.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/modal.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/dataone.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/lgf.js' ?>"></script>
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

            function validation(form) {
                var txt_nianling = $.trim($("#nianling0").attr("value"));
                alert(txt_nianling);
                if (txt_nianling == 0)
                {
                    alert("年龄不能为空！");
                    return false;
                } else if (isNaN(parseInt(txt_nianling)))
                {
                    alert("年龄必须为数字！");
                    return false;
                }
                else {
                    document.jiuzhen.submit();
                }
            }
        </script>

    </head>
    <body id="">
        <div class="container-fluid">
            <form name="jiuzhen" action="<?php echo base_url() . 'index.php/data_add/jiuzhen_add' ?>" method="post" >
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">日期：</span>
                            <input  class="form-control" type="text" name="date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">提交</button>
                                </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->     
                <div style="margin: 10px">
                <table class="table table-responsive" id="tb">
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
                            <td><input type="text" name="yiyuan0" readonly="readonly" value="<?php echo $yiyuan ?>"/></td>
                            <!--初复诊-->
                            <td><select id="jiuzhen_parent0" name="chufuzhen0" onchange="jiuzhen_clickOpt(this.id)">
                                    <!--<option value="">请选择</option>-->
                                    <option value="1">初诊</option>
                                    <option value="2">复诊</option>
                                </select>
                            </td>
                            <!--流失-->
                            <td>
                                <select id="jiuzhen_child0" name="liushi0">
                                    <option value="0"></option>
                                    <option value="1">初诊流失</option>
                                    <option value="2">复诊流失</option>
                                </select>
                            </td>
                            <!--科室-->
                            <td>
                                <select name="keshi0" id="keshi_parent0" onchange="keshi_clickOpt(this.id)">
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
                            <!--诊室-->
                            <td>
                                <select id="zhenshi_child0" name="zhenshi0">
                                    <option></option>
                                </select>
                            </td>
                            <!--病种-->
                            <td>
                                <select id="bingzhong_child0" name="bingzhong0">
                                    <!--<option>请选择科室</option>-->
                                    <option value="1">感冒</option>
                                    <option value="2">胃炎</option>
                                    <option value="3">支气管炎</option>
                                    <option value="4">冠/肺心病</option>
                                    <option value="5">三高</option>
                                    <option value="6">糖尿病</option>
                                    <option value="7">腹泻</option>
                                    <option value="8">脑A/硬化供血不足</option>
                                    <option value="9">其他</option>
                                    <option value="10">体检</option>
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

<!--                            <select id="laiyuan0" name="laiyuan0">
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
                            </select>-->
                            </td>
                            <!--年龄-->
                            <td><input type="text" size="4" name="nianling0" id="nianling0" value="0"/></td>
                            <!--性别-->
                            <td>
                                <select name="xingbie0" id="xingbie0">
                                    <option value="0">男</option>
                                    <option value="1" selected>女</option>
                                </select>
                            </td>
                            <!--区域-->
                            <td>
                                <select name="quyu0" id="quyu0">
                                    <option value="0">县城</option>
                                    <option value="1">广顺</option>
                                    <option value="2">杜家坝</option>
                                </select>
                            </td>
                            <!--是否收住院-->
                            <td>
                                <select name="shouzhuyuan0" id="shouzhuyuan0">
                                    <option value="0" selected="selected">否</option>
                                    <option value="1">是</option>
                                </select>
                            </td>
                            <!--是否治疗-->
                            <td>
                                <select name="zhiliao0" id="zhiliao0">
                                    <option value="0" selected="selected">否</option>
                                    <option value="1">是</option>
                                </select>
                            </td>
                            <!--治疗费-->
                            <td><input type="text" size="5" name="zhiliaofei0" id="zhiliaofei0" value="0"/></td>
                            <!--是否手术-->
                            <td>
                                <select name="shoushu0" id="shoushu0">
                                    <option value="0" selected="selected">否</option>
                                    <option value="1">是</option>
                                </select>
                            </td>
                            <!--手术费-->
                            <td><input type="text" size="5" name="shoushufei0" id="shoushufei0" value="0"/></td>
                            <!--门诊消费-->
                            <td><input type="text" size="5" name="menzhenxiaofei0" id="menzhenxiaofei0" value="0"/></td>

                        </tr>

                    </tbody>
                </table>
                
                <input type="button" name="del" value=" - " onClick="delrow();">
                    <input type="button" name="add" value=" + " onClick="addrow('<?php echo $yiyuan ?>');">
                </div>
                        </form>
            
                        </div>
                        </body>
                        </html>