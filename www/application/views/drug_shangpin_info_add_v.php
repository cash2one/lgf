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
            function shangpin_id_gen() {
//                $(obj.parentNode).attr("id")
                sub_shangpin_id=document.getElementById('class_info').value;
//                alert(sub_shangpin_id);
                $.post("<?php echo base_url() . 'index.php/info_add/shangpin_id_gen' ?>", {sub_shangpin_id:""+sub_shangpin_id+""}, function(data) {
                    if (data.length > 0) {
//                        $('#shangpin_id').show();
//                        alert(data);
                        $('#shangpin_id').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                })
            }
            
            function shangpin_info_set(obj){
                shangpin_info=obj.value;
//                alert(shangpin_info);
//                document.subform2.shangpin_id.value=shangpin_info;
//                alert(4);
                document.subform2.shangpin_id.value=null;

            }
        </script>
        
    </head>
    <body id="userlogin_body">
        <form name="subform2" action="<?php echo base_url() . 'index.php/info_add/shangpin_id_add' ?>" method="post">
            <table align="center">
                <tr>
                    <td>药品分类：</td>
                    <td>
                        <select style="width:180px;height: 25px;" name="class_info" id="class_info" class="TxtPasswordCssClass1" onclick="shangpin_info_set(this)">
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
                    <td>商品id：</td>
                    <td><input type="text" size="17" name="shangpin_id" class="k" id="shangpin_id" maxlength="20" value="" placeholder="请点击自动生成……" /></td>
                    <td><input type="button" size="17" name="" value="自动生成" id="" maxlength="20" onclick="shangpin_id_gen(this)"/></td>
                </tr>
                <tr>
                    <td>商品名：</td>
                    <td><input type="text" size="17" name="shangpin_name" class="k" id="shangpin_name" maxlength="20"/></td>
                </tr>
                <tr>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>