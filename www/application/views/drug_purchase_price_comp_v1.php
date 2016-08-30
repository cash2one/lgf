<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>采购申请审核</title>
        

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/home_page.css'?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">    
            <style type="text/css">
            .drug_purchase_table input{border:0; text-align: center}
            .search{font-size:14px;}
            .search .k{padding:2px 1px; width:320px;}
            #autoSuggestionsList{border:0px solid #817FB2; position:absolute;width: 241px;margin-left: 0px} 

        </style>
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script>
            function drug_purchase_price_comp(){
                var drug_name=document.getElementById('drug_name').value
                var supplier_name=document.getElementById('supplier_name').value
                var price_min=document.getElementById('price_min').value
                var price_max=document.getElementById('price_max').value
                alert(drug_name);
//                alert(supplier_name);
//                alert(price_min);
//                alert(price_max);
//                alert(purchase_batch);
                $.post("<?php echo base_url() . 'index.php/report_form/drug_purchase_price_comp' ?>", {drug_name: "" + drug_name + "",supplier_name: "" + supplier_name + "",price_min: "" + price_min + "",price_max: "" + price_max + ""}, function(data) {
                    if (data.length > 0) {
                        alert(data);
//                        $('#search_auto').show();
                        $('#report_result').html(data);
                        //$('#purchase_batch_div').html(data);
//                        return true;
                    } else
                        //$('#search_auto').hide();
                        alert('else');
                        return false;
                })
            }
        </script>
    </head>
    <body id="report_result">
            <table>
                <tr>
                    <td>药品名:</td>
                    <td><input type="text" name="drug_name" id="drug_name"/></td>
                    <td>供应商:</td>
                    <td><input type="text" name="supplier_name" id="supplier_name" /></td>
                    <td>价格范围:</td>
                    <td><input type="text" name="price_min" id="price_min" /></td>
                    <td>--</td>
                    <td><input type="text" name="price_max" id="price_max" /></td>
                </tr>
                <tr>
                    <td><input type="button" value="查询" onclick="drug_purchase_price_comp()"/></td>
                    <td><input type="reset"/></td>
                </tr>
            </table>
            
            <table class="TableBlock" align="center" id="table" width="100%" cellspacing="0" cellpadding="0">
                    

                    <tr class="TableHeader">
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
                        <td width="140" align="center">单价/元</td>
                        <td width="140" align="center">进价/元</td>
                        <td width="140" align="center">反还金额/元</td>
                    </tr>

                    
<!--                    <tr class="highlight">
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
                    </tr>-->
                    
                    <tr>
                        <td class="TableData" nowrap="" colspan="16">总记录数:<font color="red">1 条</font> 数量合计:<font color="red">1 </font>入库数量合计:<font color="red">1 </font>金额合计:<font color="red">1000 </font>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="TableData" nowrap="" colspan="16"><a href="?cGFnZWlkPTEmtbHHsMvRy/e3vcq9PcO709DRodTxJmFjdGlvbj1pbml0X2RlZmF1bHQ="><b>1</b></a>&nbsp;&nbsp;(页面&nbsp;1/1&nbsp;&nbsp;总计&nbsp;1)&nbsp;&nbsp;
                            <input type="hidden" name="ADD_INPUT" value="action">
                            <input type="hidden" name="ADD_VAR_INPUT" value="init_default">
                            <input type="hidden" name="action_page" value="action_page">
                            <input type="hidden" name="action_page_value" value="">
                            <input type="hidden" name="PAGE_NUM" value="1" accesskey="m" class="SmallInput">
                            <select class="SmallSelect" title="选择页面" onchange="var jmpURL='?' + this.options[this.selectedIndex].value; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" name="PageSelect">
                                <option value="1">选择页面</option>
                                <option value="cGFnZWlkPTEmtbHHsMvRy/e3vcq9PcO709DRodTxJmFjdGlvbj1pbml0X2RlZmF1bHQ=" selected="">&nbsp;页面 1</option>
                            </select>
                            <font color="gray">[本页面排序方式:id,倒序]</font>
                        </td>
                    </tr>
            </table>
        <table >

        </table>
<!--        <input type="button" name="返回" value="返回修改" onclick="goback()"/>-->

    </body>
</html>