<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>药品剂型录入</title>

        <link href="<?php echo base_url() . '/css/User_Login1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <script type="text/javascript">
            function class_info_select(obj){
                class_info=obj.value;
//                alert(class_info);
                $.post("<?php echo base_url() . 'index.php/info_add/class_info_set' ?>",{class_info:""+class_info+""},function(data) {
                    if (data.length > 0) {
//                        alert(data.toString());
                        $('#shangpin_info_td').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                });
//                alert(3);
            }
            
//            function shangpin_info_select(obj){
//                shangpin_info=obj.value;
////                alert(shangpin_info);
//                $.post("<?php echo base_url() . 'index.php/info_add/shangpin_info_set' ?>",{shangpin_info:""+shangpin_info+""},function(data) {
//                    if (data.length > 0) {
//                        $('#guige_td').html(data);
//                        //$('#purchase_batch_div').html(data);
//                        //return true;
//                    } else
//                        //$('#search_auto').hide();
//                        return false;
//                });
////                alert(4);
//            }
            
            function guige_id_gen() {
//                $(obj.parentNode).attr("id")
                sub_guige_id=document.getElementById('shangpin_info').value;
//                alert(sub_guige_id);
                $.post("<?php echo base_url() . 'index.php/info_add/guige_id_gen' ?>", {sub_guige_id:""+sub_guige_id+""}, function(data) {
                    if (data.length > 0) {
//                        $('#shangpin_id').show();
//                        alert(data);
                        $('#guige_id').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                })
            }
            
            function guige_set(obj){
                guige=obj.value;
//                alert(guige);
//                document.subform_guige.guige_id.value=guige;
                document.subform_guige.guige_id.value=null;
//                alert(4);
            }
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform_guige" action="<?php echo base_url() . 'index.php/info_add/guige_add' ?>" method="post">
            <table align="center">
                <tr>
                    <td>药品分类：</td>
                    <td>
                        <select style="width:180px;height: 25px;" name="class_info" id="class_info" class="TxtPasswordCssClass1"  onchange="class_info_select(this)">
                            <?php foreach ($class_info as $class_info_va) {
                                ?>
                                <option value="<?php echo $class_info_va->class_id ?>"><?php echo $class_info_va->class_id;echo '  ';echo $class_info_va->drug_class ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品信息：</td>
                    <td id="shangpin_info_td">
                        <select style="width:180px;height: 25px;" name="shangpin_info" id="shangpin_info" class="TxtPasswordCssClass1" onclick="guige_set(this)">
                            <?php foreach ($shangpin_info as $shangpin_info_va) {
                                ?>
                                <option value="<?php echo $shangpin_info_va->shangpin_id ?>"><?php echo $shangpin_info_va->shangpin_id;echo '  ';echo $shangpin_info_va->shangpin_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>规格id：</td>
                    <td><input type="text" size="17" name="guige_id" class="k" id="guige_id" maxlength="20" value=""  placeholder="请点击自动生成……"/></td>
                    <td><input type="button" size="17" name="" value="自动生成" id="" maxlength="20" onclick="guige_id_gen(this)"/></td>
                </tr>
                <tr>
                    <td>规格名：</td>
                    <td><input type="text" size="17" name="guige_name" class="k" id="guige_name" maxlength="20"/></td>
                </tr>
                <tr>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>