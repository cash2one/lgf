<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>采购申请修改</title>
        

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
	<script type="text/javascript">
            function get_drug_purchase_list_for_update(obj){
//                alert(1);
                var purchase_batch = $(obj).attr("id");
//                alert(purchase_batch);
                $.post("<?php echo base_url() . 'index.php/drug_purchase/get_drug_purchase_list_for_update' ?>", {purchase_batch: "" + purchase_batch + ""}, function(data) {
                    if (data.length > 0) {
//                        alert(2);
                        $('#search_auto').show();
                        $('#autoSuggestionsList').html(data);
                        //$('#purchase_batch_div').html(data);
                        //return true;
                    } else
                        //$('#search_auto').hide();
//                            alert(0);
                        return false;
                })
            }
            
            function drug_purchase_update(){
                $.post("<?php echo base_url() . 'index.php/drug_purchase/drug_purchase_check' ?>")
            }
            
            function drug_purchase_delete(obj){
                var id = obj.name;
                alert(id);
                $.post("<?php echo base_url() . 'index.php/drug_purchase/drug_purchase_delete' ?>", {id: "" + id + ""}, function(data) {
                    if (data.length > 0) {
                        $('#search_auto').show();
                        $('#table1').html(data);
                        //alert(data);
                    } else
                        $('#search_auto').hide();
                });
            }
	</script>
    </head>
    <body id="userlogin_body">
        <!--<form name="drug_pruchase_form">-->
            <table class="drug_purchase_table" id="table1" border="1" align="center">
                <tr>
                    <td width="140" align="center">序号</td>
                    <td width="50" align="center">采购批次</td>
                    <td width="140" align="center">发票金额</td>
                    <td width="140" align="center">采购员</td>
                    <td width="50" align="center">提交时间</td>
                    <td width="50" align="center">审核状态</td>
                </tr>
                <?php foreach ($drug_purchase as $key=>$val) {?>
                <tr>
                    <td width="140" align="center"><?php echo $key+1 ;?></td>
                    <td width="50" align="center"><a href="#callback" onclick="get_drug_purchase_list_for_update(this)" class="cb-trigger" data-toggle="modal" id="<?php echo $val->purchase_batch ;?>"><?php echo $val->purchase_batch ;?></a></td>
                    <td width="140" align="center"><?php echo $val->invoice_money ;?></td>
                    <td width="140" align="center"><?php echo $val->userid ;?></td>
                    <td width="50" align="center"><?php echo $val->oper_time ;?></td>
                    <td width="50" align="center"><?php if($val->check_state==0) echo '未审核' ;else echo '已审核';?></td>
                </tr>
                <?php }?>
                
<!--                <tr>
                    <td><input value="添加" type="submit" name="submit" onclick="return confirm('您确定要提交采购申请吗？');"/></td>
                    <td width="10"></td>
                    <td><input value="重置" type="reset"/></td>
                </tr>-->
            </table>
        <!--</form>-->
        <!-- callback -->
	<div class="modal" id="callback" style="top1: 8%;">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- header -->
				<div class="modal-header">
					<a class="close" data-dismiss="modal">x</a>
					<p class="form-title1" style="">采购明细</p>
				</div>
				<!-- /header -->
				<form action="<?php echo base_url() . 'index.php/drug_purchase/drug_purchase_update' ?>" accept-charset="UTF-8" method="post" id="">
					<!-- body -->
					<div class="modal-body our_contact">
                                            <div class="suggestionsBox1" id="search_auto" style="display: none;"> 
                                                <div id="autoSuggestionsList"></div>
                                            </div>
					</div>
					<!-- /body -->
				
				<!-- footer -->
				<div class="modal-footer">
                                    <input type="submit" name="op" id="" value="修改" class="btn btn-info" onclick1="drug_purchase_update()">
				</div>
                                </form>	
				<!-- /footer -->
			</div>
		</div>
	</div>
	
	<!-- /callback -->
    </body>
</html>