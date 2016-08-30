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
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        alert('else');
                        return false;
                })
            }
            
            function export_excel(){
                alert('begin');
                $.post("<?php echo base_url() . 'index.php/report_form/export_excel' ?>")
                alert('end');
            }
        </script>
    </head>
    <body>
        <form id="subform" action="<?php echo base_url() . 'index.php/report_form/drug_purchase_price_comp' ?>" method="post">
            <div align="center">
            <table>
                <tr>
                    <td>药品名:</td>
                    <td><font color="red">*</font></td>
                    <td><input type="text" name="drug_name" id="drug_name" value="<?php echo set_value('drug_name') ?>"/></td>
                    <td>供应商:</td>
                    <td><input type="text" name="supplier_name" id="supplier_name" /></td>
                    <td>价格范围:</td>
                    <td><input type="text" name="price_min" id="price_min" value="<?php echo set_value('price_min') ?>" /></td>
                    <td>--</td>
                    <td><input type="text" name="price_max" id="price_max" value="<?php echo set_value('price_max') ?>" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="查询" /></td>
                    <td><input type="reset"/></td>
                    
                </tr>
            </table>
            </div>
        </form>
        
        <form id="subform1" action="<?php echo base_url() . 'index.php/report_form/export_excel' ?>" method="post">
            <input type="submit" value="导出EXCEL" onclick="export_excel1()"/>
        </form>

        <table class="TableBlock" align="center" id="table" width="100%" cellspacing="0" cellpadding="0" border="1">
            <tr class="TableHeader">
                <td width="140" align="center">序号</td>
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
                <td width="140" align="center">采购人</td>
            </tr>
            <?php foreach ($arr as $va_arr){
                ?>
            <tr>
                <td><?php echo $va_arr->id; ?></td>
                <td><?php echo $va_arr->drug_name; ?></td>
                <td><?php echo $va_arr->drug_id; ?></td>
                <td><?php echo $va_arr->class_id; ?></td>
                <td><?php echo $va_arr->shangpin_id; ?></td>
                <td><?php echo $va_arr->guige_id; ?></td>
                <td><?php echo $va_arr->guige_name; ?></td>
                <td><?php echo $va_arr->jixing_id; ?></td>
                <td><?php echo $va_arr->med_in_type_id; ?></td>
                <td><?php echo $va_arr->changjia_id; ?></td>
                <td><?php echo $va_arr->supplier_id; ?></td>
                <td><?php echo $va_arr->price_packing_id; ?></td>
                <td><?php echo $va_arr->danjia; ?></td>
                <td><?php echo $va_arr->jinjia; ?></td>
                <td><?php echo $va_arr->fanhaijine; ?></td>
                <td><?php echo $va_arr->userid; ?></td>
            </tr>
                
            <?php } ?>
            <tr id="report_result">
                
            </tr>
        </table>
        <table class="TableBlock" align="center" id="pagetable" width="100%" cellspacing="0" cellpadding="0">
            <!--<p align="center"><?php echo $page; ?></p>-->
        </table>
<!--        <input type="button" name="返回" value="返回修改" onclick="goback()"/>-->

    </body>
</html>