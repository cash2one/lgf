<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>药品属性录入</title>

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
            
            function shangpin_info_select(obj){
                shangpin_info=obj.value;
//                alert(shangpin_info);
                $.post("<?php echo base_url() . 'index.php/info_add/shangpin_info_set' ?>",{shangpin_info:""+shangpin_info+""},function(data) {
                    if (data.length > 0) {
                        $('#guige_td').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                });
//                alert(4);
            }
            
            function drug_id_gen() {
//                alert('test');
                $.post("<?php echo base_url() . 'index.php/info_add/drug_id_gen' ?>", {}, function(data) {
                    if (data.length > 0) {
                        $('#drug_id').show();
//                        alert(data);
                        $('#drug_id').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                })
            }
            
            function shangpin_id_gen() {
//                $(obj.parentNode).attr("id")
                sub_shangpin_id=document.getElementById('shangpin_id').value;
                alert(sub_shangpin_id);
                $.post("<?php echo base_url() . 'index.php/info_add/shangpin_id_gen' ?>", {sub_shangpin_id:""+sub_shangpin_id+""}, function(data) {
                    if (data.length > 0) {
//                        $('#shangpin_id').show();
//                        alert(data);
                        $('#shangpin_td').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
                        return false;
                })
            }
            
            function shangpin_info_set(obj){
//                alert(4);
                shangpin_info=obj.value;
//                alert(shangpin_info)
//                shangpin_info+='01';
//                arr =new array(shangpin_info,'01');
//                arr1=join(arr);
//                alert(shangpin_info);
//                alert(arr1);
                document.subform2.shangpin_id.value=shangpin_info;
//                document.subform2.shangpin_id.name=shangpin_info;
                
            }
            
            function goback(){
                window.history.go(-1);
            }
        </script>

    </head>
    <body id="userlogin_body" name="subbody">
        <form name="subform" action="<?php echo base_url() . 'index.php/info_add/add_drugs' ?>" method="post">
            <table align="center" name="subtable">
                <tr>
                    <td width="80" align="left">药品编号:</td>
                    <td width="50" align="left"><input type="text" size="17" name="drug_id" class="k" id="drug_id" maxlength="20" value="" placeholder="请点击自动生成……"/></td>
                    <td>
                        <input type="button" value="自动生成" onclick="drug_id_gen()"/>
                    </td>
                    <td width="80" align="left">药品分类:</td>
                    <td>
                        <select style="width:180px;" name="class_info" id="class_info" class="TxtPasswordCssClass" onchange="class_info_select(this)" onmouseout="class_info_select(this)" onblur="shangpin_info_select(this)">
                            <?php foreach ($class_info as $class_info_va) {
                                ?>
                                <option value="<?php echo $class_info_va->class_id ?>"><?php echo $class_info_va->class_id;echo '  ';echo $class_info_va->drug_class ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="button" value="新增" />
                    </td>
                </tr>
                <tr>
                    <td width="80" align="left">药品名:</td>
                    <td width="100" align="left"><input type="text" size="17" name="drug_name" class="k" id="drug_name" maxlength="20" /></td>
                    <td width="80" align="left">商品名:</td>
                    <td id="shangpin_info_td">
                        <select style="width:180px;" name="shangpin_info" id="shangpin_info" class="TxtPasswordCssClass" onchange="shangpin_info_select(this)">
                            <?php foreach ($shangpin_info as $shangpin_info_va) {
                                ?>
                                <option value="<?php echo $shangpin_info_va->shangpin_id ?>"><?php echo $shangpin_info_va->shangpin_id;echo '  ';echo $shangpin_info_va->shangpin_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td></td>
                    <td>
                        <a href="#callback" onclick="get_drug_purchase_list(this)" class="cb-trigger" data-toggle="modal" id="">新增</a>
                    </td>
                </tr>
                <tr>
                    <td width="80" align="left">剂型:</td>
                    <td>
                        <select style="width:180px;" name="jixing" id="jixing" class="TxtPasswordCssClass">
                            <?php foreach ($jixing as $jixing_va) {
                                ?>
                                <option value="<?php echo $jixing_va->jixing_id ?>"><?php echo $jixing_va->jixing_id;echo '  ';echo $jixing_va->jixing_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td width="80" align="left">规格编号:</td>
                    <td id="guige_td">
                        <select style="width:180px;" name="guige" id="guige" class="TxtPasswordCssClass">
                            <?php foreach ($guige as $guige_va) {
                                ?>
                                <option value="<?php echo $guige_va->guige_id ?>"><?php echo $guige_va->guige_id;echo '  ';echo $guige_va->guige_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="80" align="left">医保类型:</td>
                    <td>
                        <select style="width:180px;" name="med_in_type" id="med_in_type" class="TxtPasswordCssClass">
                            <?php foreach ($med_in_type as $med_in_type_va) {
                                ?>
                                <option value="<?php echo $med_in_type_va->med_in_type_id ?>"><?php echo $med_in_type_va->med_in_type_id;echo '  ';echo $med_in_type_va->med_in_type_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td width="80" align="left">厂家:</td>
                    <td>
                        <select style="width:180px;" name="changjia" id="changjia" class="TxtPasswordCssClass">
                            <?php foreach ($changjia as $changjia_va) {
                                ?>
                                <option value="<?php echo $changjia_va->changjia_id ?>"><?php echo $changjia_va->changjia_id;echo '  ';echo $changjia_va->changjia_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" size="17" name="submit" value="提交"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                </tr>

            </table>
        </form>
        
        
        <!-- callback shangpin_info -->
	<div class="modal" id="callback" style="top1: 8%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- header -->
				<div class="modal-header">
					<a class="close" data-dismiss="modal">x</a>
					<p class="form-title1" style="">商品信息</p>
				</div>
				<!-- /header -->
                                <form name="subform2" action="<?php echo base_url() . 'index.php/info_add/shangpin_id_add' ?>" method="post">
                                    <table align="center">
                                        <tr>
                                            <td>药品分类：</td>
                                            <td>
                                                <select style="width:180px;height: 25px;" name="class_info" id="class_info" class="TxtPasswordCssClass1" onclick="shangpin_info_set(this)">
                                                    <?php foreach ($class_info as $class_info_va) {
                                                        ?>
                                                        <option value="<?php echo $class_info_va->class_id ?>"><?php echo $class_info_va->class_id;
                                                    echo '  ';
                                                    echo $class_info_va->drug_class ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>商品id：</td>
                                            <input type="hidden" id="shangpin_td"/>
                                            <td><input type="text" size="17" name="shangpin_id" class="k" id="shangpin_id" maxlength="20" value="0001"  placeholder="请点击自动生成……"/></td>
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
				<!-- footer -->
				<div class="modal-footer">
                                    
				</div>
                                </form>	
				<!-- /footer -->
			</div>
		</div>
	</div>
	<!-- /callback shangpin_info -->
    </body>
</html>