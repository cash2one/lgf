<html>
    <head>
        <title>采购订单提交确定</title>
        <script>
            function goback(){
                window.history.go(-1);
            }
        </script>
    </head>
    <body>
        <span>添加成功</span>
        <input type="button" name="返回" value="返回添加" onclick="goback()"/>
<!--        <form action="<?php echo base_url() . 'index.php/drug_purchase/add_to_drug_purchase_list' ?>" method="post" >
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
                    <td width="140" align="center"><?php echo $drug_name ?> </td>
                    <td width="50" align="center"><?php echo $drug_id ?></td>
                    <td width="140" align="center"><?php echo $drug_class ?>
                        <input type="hidden" name="class_id1" class="k" id="class_id1" value="<?php echo $class_id ?>" /></td>
                    <td width="140" align="center"><?php echo $shangpin_name ?>
                        <input type="hidden" name="shangpin_id1" class="k" id="shangpin_id1" value="<?php echo $shangpin_id ?>" /></td>
                    <td width="50" align="center"><?php echo $guige_id ?></td>
                    <td width="50" align="center"><?php echo $guige_name ?></td>
                    <td width="25" align="center"><?php echo $jixing_name ?>
                        <input type="hidden" name="jixing_id1" class="k" id="jixing_id1" value="<?php echo $jixing_id ?>" /></td>
                    <td width="60" align="center"><?php echo $med_in_type_name ?>
                        <input type="hidden" name="med_in_type_id1" class="k" id="med_in_type_id1" value="<?php echo $med_in_type_id ?>" /></td>
                    <td width="140" align="center"><?php echo $changjia_name ?>
                        <input type="hidden" name="changjia_id1" class="k" id="changjia_id1" value="<?php echo $changjia_id; ?>" /></td>
                    <td width="140" align="center" id="suppliertd1"><?php echo $supplier_name ?>
                        <input type="hidden" name="supplier_id1" class="k" id="supplier_id1" value="<?php echo $supplier_id ?>" /></td>
                    <td width="140" align="center"><?php echo $select ?></td>
                    <td width="140" align="center"><?php echo $danjia ?></td>
                    <td width="140" align="center"><?php echo $jinjia ?></td>
                    <td width="140" align="center"><?php echo $fanhaijine ?></td>
                </tr>
            </table>
            
                <input type="submit" name="submit" value="保存"/>
                <input type="button" name="返回" value="返回修改" onclick="goback()"/>
            
        </form>-->
    </body>
</html>