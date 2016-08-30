<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>保留10条采购信息录入</title>
        <link href="<?php echo base_url() . 'css/admin.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />

        <!--自动显示搜索结果begin-->
        <style type="text/css">
            .drug_purchase_table input{border:0; text-align: center}
            .search{font-size:14px;}
            .search .k{padding:2px 1px; width:320px;}
            #autoSuggestionsList{border:1px solid #817FB2; position:absolute;width: 241px;margin-left: 0px} 
            #autoSuggestionsList li{background:#FFF; text-align:left;} /*设置提示框内的li标签效果*/
            #autoSuggestionsList li{background:#FFF; text-align:left; list-style-type:none;} 
            #autoSuggestionsList li.cls{text-align:right;} /*设置提示框内的关闭按钮效果*/
            #autoSuggestionsList .li{display1:block; padding:5px 6px; cursor:pointer; color:#666;} /*设置提示框内li标签下的a标签效果*/
            #autoSuggestionsList .li:hover{background:#D8D8D8; text-decoration:none; color:#000;} /*当鼠标移入提示框内时的效果*/
            #autoSuggestionsList .span{padding:5px 6px;} /*设置提示框内li标签下的a标签效果*/
        </style>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            
            function purchase_batch_gen() {
                $.post("<?php echo base_url() . 'index.php/auto_search/purchase_batch_add' ?>", {}, function(data) {
                    if (data.length > 0) {
                        $('#purchase_batch').show();
                        $('#purchase_batch').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                })
            }

            function lookup(obj) {
//                var inputid=$(obj).attr("id");//获取所选对象的属性
                var drugtrid = $(obj.parentNode.parentNode).attr("id");//获取起父级的父级的tr标签的id
                var drugall = new Array();
//                alert(drugtrid);
                var inputlen = document.getElementById(drugtrid).getElementsByTagName("input").length;
//                alert(document.getElementById(drugtrid).getElementsByTagName("input").length);
//                alert($(document.getElementById("drugtrid")).attr("id"););
//                alert($(document.getElementById(drugtrid).getElementsByTagName("input")[i]).attr("id");)
                for (i = 0; i < inputlen; i++) {
                    var tabid = $(document.getElementById(drugtrid).getElementsByTagName("input")[i]).attr("id");
                    drugall[i] = tabid;
//                    alert(tabid);
                }
                //alert(inputid);
                var inputString = obj.value;
                //alert(inputString);
                if (inputString.length === 0) {
                    // Hide the suggestion box. 
                    $('#search_auto').hide();
                } else {
                    $('#autoSuggestionsList').css({'width': 850});
                    $.post("<?php echo base_url() . 'index.php/auto_search/purchase_add_check' ?>", {queryString: "" + inputString + "", drugall: drugall}, function(data) {
                        if (data.length > 0) {
                            $('#search_auto').show();
                            $('#autoSuggestionsList').html(data);
                            //alert(data);
                        } else
                            $('#search_auto').hide();
                    });
                }
            } // lookup 

            function supplier_lookup(obj) {
                var supplier_value = obj.value;
//                alert(supplier_value);
                var suppliertdid = $(obj.parentNode).attr("id");//获取起父级的td标签的id
                var supplierall = new Array();
//                alert(suppliertdid);
                var inputlen = document.getElementById(suppliertdid).getElementsByTagName("input").length;
//                alert(inputlen);
                for (i = 0; i < inputlen; i++) {
                    var tabid = $(document.getElementById(suppliertdid).getElementsByTagName("input")[i]).attr("id");
                    supplierall[i] = tabid;
//                    alert(tabid);
                }
                if (supplier_value.length === 0) {
                    // Hide the suggestion box. 
                    $('#search_auto').hide();
                } else {
                    $('#autoSuggestionsList').css({'width': 200});
                    $.post("<?php echo base_url() . 'index.php/auto_search/supplier_add_check' ?>", {supplier_value: "" + supplier_value + "", supplierall: supplierall}, function(data) {
                        if (data.length > 0) {
                            $('#search_auto').show();
                            $('#autoSuggestionsList').html(data);
                            //alert(data);
                        } else
                            $('#search_auto').hide();
                    });
                }
            } // supplier_lookup 


            function fill(thisValue) {

                setTimeout("$('#search_auto').hide();", 200);

            }

            function class_id_fill(thisValue) {
                if (thisValue != null || thisValue != "") {
                    $.post("<?php echo base_url() . 'index.php/auto_search/purchase_add_setvalue' ?>", {keynum: "" + thisValue + ""}, function(data) {
                        if (data.length > 0) {
                            $('#search_auto').show();
                            $('#autoSuggestionsList').html(data);
                            //alert(data);
                        } else
                            $('#search_auto').hide();
                    });
                }
                setTimeout("$('#search_auto').hide();", 200);
                //return false;

            }
            function supplier_fill(thisValue) {
                if (thisValue != null || thisValue != "") {
                    $.post("<?php echo base_url() . 'index.php/auto_search/supplier_add_setvalue' ?>", {supplier_keynum: "" + thisValue + ""}, function(data) {
                        if (data.length > 0) {
                            $('#search_auto').show();
                            $('#autoSuggestionsList').html(data);
                            //alert(data);
                        } else
                            $('#search_auto').hide();
                    });
                }
                setTimeout("$('#search_auto').hide();", 200);
                //return false;
            }



            //以下函数为设置提示框的宽度
            //$(function(){
            //    $('#autoSuggestionsList').css({'width':$('#search input[name="k"]').width()+4});
            //});
        </script>
        <!--自动显示搜索结果begin-->

    </head>
    <body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <form name="subform" action="<?php echo base_url() . 'index.php/drug_purchase/add_to_drug_purchase_list_comfirm' ?>" method="post">
                <div class="user_main_box1">
                    <table>
                        <tr>
                            <td><span>采购批次：</span></td>
                            <td><input class="TxtUserNameCssClass" id="purchase_batch" maxlength="20" name="purchase_batch" value=""></td>
                            <td><input value="自动生成" type="button" onclick="purchase_batch_gen();" /></td>
                            <td width="20"></td>
                            <td><span>发票金额：</span></td>
                            <td><input class="TxtUserNameCssClass" id="invoice_money" maxlength="20" name="invoice_money" value=""></td>
                            <td width="20"></td>
                            <td><span>采购员：</span></td>
                            <td class="drug_purchase_table">
                                <?php session_start();echo $_SESSION['username'];?>
                                <input size="4" id="username" name="username" type="hidden" value="<?php echo $_SESSION['username'];?>">
                                <input id="userid" name="userid" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
                            </td>
                            <td width="10"></td>
                            <td><input value="添加" type="submit" name="submit" onclick="return confirm('您确定要提交采购申请吗？');"/></td>
                            <td width="10"></td>
                            <td><input value="重置" type="reset"/></td>
                        </tr>
                    </table>
                </div>

                <br/>
                <table class="drug_purchase_table" id="table1" border="1">
                    <tr>
                        <td width="140" align="center">药品名</td>
                        <td width="50" align="center">药品编号</td>
                        <td width="140" align="center">药品分类</td>
                        <td width="140" align="center">商品名</td>
                        <td width="50" align="center">规格编号</td>
                        <td width="50" align="center">规格</td>
                        <td width="25" align="center">剂型</td>
                        <td width="60" align="center">医保类型</td>
                        <td width="140" align="center">厂家</td>
                        <td width="140" align="center">供应商</td>
                        <td width="140" align="center">价格包装</td>
                        <td width="140" align="center">单价</td>
                        <td width="140" align="center">进价</td>
                        <td width="140" align="center">反还金额</td>
                    </tr>
                    <tr id="drugtr1">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name1" class="k" id="drug_name1" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id1" class="k" id="drug_id1" maxlength="20" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class1" class="k" id="drug_class1" maxlength="20" />
                            <input type="hidden" name="class_id1" class="k" id="class_id1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name1" class="k" id="shangpin_name1" />
                            <input type="hidden" name="shangpin_id1" class="k" id="shangpin_id1" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id1" class="k" id="guige_id1" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name1" class="k" id="guige_name1" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name1" class="k" id="jixing_name1" />
                            <input type="hidden" name="jixing_id1" class="k" id="jixing_id1" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name1" class="k" id="med_in_type_name1" />
                            <input type="hidden" name="med_in_type_id1" class="k" id="med_in_type_id1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name1" class="k" id="changjia_name1" />
                            <input type="hidden" name="changjia_id1" class="k" id="changjia_id1" /></td>
                        <td width="140" align="center" id="suppliertd1"><input type="text" size="16" name="supplier_name1" class="k" id="supplier_name1" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id1" class="k" id="supplier_id1" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select1" id="price_packing_id1" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_name ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia1" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia1" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine1" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr2">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name2" class="k" id="drug_name2" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id2" maxlength="20" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class2" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id2" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name2" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id2" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id2" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name2" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name2" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id2" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name2" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id2" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name2" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id2" /></td>
                        <td width="140" align="center" id="suppliertd2"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name2" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id2" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr3">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name3" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id3" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class3" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id3" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name3" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id3" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id3" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name3" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name3" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id3" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name3" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id3" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name3" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id3" /></td>
                        <td width="140" align="center" id="suppliertd3"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name3" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id3" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr4">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name4" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id4" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class4" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id4" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name4" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id4" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id4" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name4" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name4" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id4" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name4" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id4" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name4" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id4" /></td>
                        <td width="140" align="center" id="suppliertd4"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name4" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id4" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr5">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name5" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id5" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class5" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id5" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name5" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id5" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id5" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name5" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name5" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id5" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name5" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id5" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name5" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id5" /></td>
                        <td width="140" align="center" id="suppliertd5"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name5" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id5" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr6">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name6" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id6" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class6" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id6" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name6" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id6" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id6" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name6" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name6" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id6" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name6" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id6" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name6" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id6" /></td>
                        <td width="140" align="center" id="suppliertd6"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name6" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id6" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr7">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name7" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id7" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class7" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id7" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name7" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id7" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id7" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name7" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name7" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id7" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name7" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id7" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name7" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id7" /></td>
                        <td width="140" align="center" id="suppliertd7"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name7" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id7" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr8">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name8" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id8" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class8" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id8" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name8" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id8" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id8" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name8" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name8" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id8" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name8" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id8" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name8" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id8" /></td>
                        <td width="140" align="center" id="suppliertd8"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name8" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id8" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr9">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name9" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id9" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class9" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id9" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name9" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id9" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id9" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name9" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name9" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id9" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name9" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id9" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name9" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id9" /></td>
                        <td width="140" align="center" id="suppliertd9"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name9" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id9" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                    <tr id="drugtr10">
                        <td width="140" align="center"><input type="text" size="17" name="drug_name" class="k" id="drug_name10" maxlength="20" onkeyup="lookup(this);" onblur="fill();" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="drug_id" class="k" id="drug_id10" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" /></td>
                        <td width="140" align="center"><input type="text" size="17" name="drug_class" class="k" id="drug_class10" maxlength="20" />
                            <input type="hidden" name="class_id" class="k" id="class_id10" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="shangpin_name" class="k" id="shangpin_name10" />
                            <input type="hidden" name="shangpin_id" class="k" id="shangpin_id10" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_id" class="k" id="guige_id10" /></td>
                        <td width="50" align="center"><input type="text" size="7" name="guige_name" class="k" id="guige_name10" /></td>
                        <td width="25" align="center"><input type="text" size="4" name="jixing_name" class="k" id="jixing_name10" />
                            <input type="hidden" name="jixing_id" class="k" id="jixing_id10" /></td>
                        <td width="60" align="center"><input type="text" size="5" name="med_in_type_name" class="k" id="med_in_type_name10" />
                            <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id10" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="changjia_name" class="k" id="changjia_name10" />
                            <input type="hidden" name="changjia_id" class="k" id="changjia_id10" /></td>
                        <td width="140" align="center" id="suppliertd10"><input type="text" size="16" name="supplier_name" class="k" id="supplier_name10" onkeyup="supplier_lookup(this);" onblur="fill();" />
                            <input type="hidden" name="supplier_id" class="k" id="supplier_id10" /></td>
                        <td width="140" align="center"><select style="width:60px;" name="select" id="price_packing_id" class="TxtPasswordCssClass">
                                <?php foreach ($price_packing as $price_packing_v) {
                                    ?>
                                    <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                    <?php
                                }
                                ?>
                            </select></td>
                        <td width="140" align="center"><input type="text" size="16" name="danjia" class="k" id="danjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="jinjia" class="k" id="jinjia1" /></td>
                        <td width="140" align="center"><input type="text" size="16" name="fanhaijine" class="k" id="fanhaijine1" /></td>
                    </tr>
                </table>
                <div class="suggestionsBox" id="search_auto" style="display: none;"> 
                    <div id="autoSuggestionsList"></div>
                </div>
            </form>

    </body>
</html>