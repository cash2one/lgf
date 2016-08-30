<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>采购申请审核</title>


        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'css/home_page.css' ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() . 'css/bootstrap.min.css' ?>" rel="stylesheet" media="screen">    
        <style type="text/css">
            .drug_purchase_table input{border:0; text-align: center}
            .search{font-size:14px;}
            .search .k{padding:2px 1px; width:320px;}
            #autoSuggestionsList{border:0px solid #817FB2; position:absolute;width: 241px;margin-left: 0px} 

        </style>
        <script type="text/javascript" src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/bootstrap.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/modal.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'js/bootstrap.js' ?>"></script>
        <script>
            function drug_purchase_price_comp() {
                var drug_name = document.getElementById('drug_name').value
                var supplier_name = document.getElementById('supplier_name').value
                var price_min = document.getElementById('price_min').value
                var price_max = document.getElementById('price_max').value
                alert(drug_name);
//                alert(supplier_name);
//                alert(price_min);
//                alert(price_max);
//                alert(purchase_batch);
                $.post("<?php echo base_url() . 'index.php/report_form/drug_purchase_price_comp' ?>", {drug_name: "" + drug_name + "", supplier_name: "" + supplier_name + "", price_min: "" + price_min + "", price_max: "" + price_max + ""}, function(data) {
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
        <form id="subform" action="<?php echo base_url() . 'index.php/report_form/drug_purchase_price_comp' ?>" method="post">
            <div align="center">
            <table>
                <tr>
                    <td>药品名:</td>
                    <td><font color="red">*</font></td>
                    <td><input type="text" name="drug_name" id="drug_name" size="20"/></td>
                    <td>供应商:</td>
                    <td><input type="text" name="supplier_name" id="supplier_name" size="20"/></td>
                    <td>价格范围:</td>
                    <td><input type="text" name="price_min" id="price_min" size="5"/></td>
                    <td>--</td>
                    <td><input type="text" name="price_max" id="price_max" size="5"/></td>
                </tr>
                <tr>
                    <?php echo form_error('drug_name'); ?>
                    <?php echo form_error('price_min'); ?>
                    <?php echo form_error('price_max'); ?>
                </tr>
                <tr>
                    <td><input type="submit" value="查询" /></td>
                    <td><input type="reset"/></td>
                </tr>
            </table>
            </div>
        </form>
    </body>
</html>