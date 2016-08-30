
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>采购申请</title>
        <link href="<?php echo base_url() . 'css/admin.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url() . 'css/User_Login.css' ?>" type="text/css" rel="stylesheet" />

        <!--自动显示搜索结果begin-->
        <style type="text/css">
            .search{font-size:14px;}
            .search .k{padding:2px 1px; width:320px;}
            #autoSuggestionsList{border:1px solid #817FB2; position:absolute;width: 241px;margin-left: 40px} 
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

            function lookup(inputString) {
                if (inputString.length === 0) {
                    // Hide the suggestion box. 
                    $('#search_auto').hide();
                } else {
                    $('#autoSuggestionsList').css({'width': $('.search li input[name="drug_name"]').width() + 4});
                    $.post("<?php echo base_url() . 'index.php/auto_search/purchase_add_check' ?>", {queryString: "" + inputString + ""}, function(data) {
                        if (data.length > 0) {
                            $('#search_auto').show();
                            $('#autoSuggestionsList').html(data);
                            //alert(data);
                        } else
                            $('#search_auto').hide();
                    });
                }
            } // lookup 



            function fill(thisValue) {
                if (thisValue) {
                    $('#drug_name').val(thisValue);
                }
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


            //以下函数为设置提示框的宽度
            //$(function(){
            //    $('#autoSuggestionsList').css({'width':$('#search input[name="k"]').width()+4});
            //});
        </script>
        <!--自动显示搜索结果begin-->

    </head><body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <form name="subform" action="/index.php/sys_manager/user_add" method="post">
                <ul>
                    <li class="user_main_c1">
                        <div class="user_main_box1">
                            <div class="search">
                                <ul>
                                    <li class="user_main_text">采购药品id： </li>

                                    <li class="user_main_input">
                                        <input type="text" size="30" name="drug_id" class="k" id="drug_id" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" />
                                    </li>
                                </ul>
                                <ul>
                                    <li class="user_main_text">分类编号： </li>

                                    <li class="user_main_input">
                                        <input type="text" size="30" name="drug_class" class="k" id="drug_class" maxlength="20" />
                                        <input type="hidden" name="class_id" class="k" id="class_id" />
                                    </li>
                                </ul>

                                <ul>
                                    <li class="user_main_text">药品名： </li>

                                    <li class="user_main_input">
                                        <input type="text" size="30" name="drug_name" class="k" id="drug_name" maxlength="20" onkeyup="lookup(this.value);" onblur="fill();" />
                                    </li>
                                </ul>
                            </div>
                            <div class="suggestionsBox" id="search_auto" style="display: none;"> 
                                <div id="autoSuggestionsList"></div>
                            </div>

                            <ul>
                                <li class="user_main_text">商品编号： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="shangpin_name" class="k" id="shangpin_name" />
                                    <input type="hidden" name="shangpin_id" class="k" id="shangpin_id" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">规格编号： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="guige_id" class="k" id="guige_id" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">规格： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="guige_name" class="k" id="guige_name" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">剂型： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="jixing_name" class="k" id="jixing_name" />
                                    <input type="hidden" name="jixing_id" class="k" id="jixing_id" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">医保类型： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="med_in_type_name" class="k" id="med_in_type_name" />
                                    <input type="hidden" name="med_in_type_id" class="k" id="med_in_type_id" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">厂家： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="changjia_name" class="k" id="changjia_name" />
                                    <input type="hidden" name="changjia_id" class="k" id="changjia_id" />
                                </li>
                            </ul>
                            <ul>
                                <li class="user_main_text">供应商： </li>

                                <li class="user_main_input">
                                    <input type="text" size="30" name="supplier_name" class="k" id="supplier_name" />
                                    <input type="hidden" name="supplier_id" class="k" id="supplier_id" />
                                </li>
                            </ul>


                            <ul>
                                <li class=""><?php echo form_error('userid'); ?></li>
                            </ul>

                            <ul>
                                <li class="user_main_text">采购批次： </li>
                                <li class="user_main_input">
                                    <div id="purchase_batch_div"></div>
                                    <input class="TxtUserNameCssClass" id="purchase_batch" maxlength="20" name="purchase_batch" value="">
                                    <input value="自动生成" type="submit" onclick="purchase_batch_gen();
                                            return false;" />
                                </li>
                            </ul>

                            <ul>
                                <li class=""><?php echo form_error('username'); ?></li>
                            </ul>

                            <ul>
                                <li class="user_main_text">价格包装id： </li>
                                <li class="user_main_input">
                                    <select name="select" class="TxtPasswordCssClass">

                                        <?php foreach ($price_packing as $price_packing_v) {
                                            ?>
                                            <option value="<?php echo $price_packing_v->price_packing_id ?>"><?php echo $price_packing_v->price_packing_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('password'); ?></li>
                            </ul>
                            <ul>
                                <li class="user_main_text">单价： </li>
                                <li class="user_main_input">
                                    <input class="TxtPasswordCssClass" id="confirmpassword" name="confirmpassword" type="password">

                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('confirmpassword'); ?></li>
                            </ul>
                            <ul>
                                <li class="user_main_text">进价： </li>
                                <li class="user_main_input">
                                    <input class="TxtPasswordCssClass" id="company" name="company" type="text">

                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('company'); ?></li>
                            </ul>
                            <ul>
                                <li class="user_main_text">反还金额： </li>
                                <li class="user_main_input">
                                    <input class="TxtPasswordCssClass" id="mobilephone" name="mobilephone" type="text">

                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('mobilephone'); ?></li>
                            </ul>
                            <ul>
                                <li class="user_main_text">供应商id： </li>
                                <li class="user_main_input">
                                    <select name="select" class="TxtPasswordCssClass">

                                        <?php foreach ($supplier as $supplier_v) {
                                            ?>
                                            <option value="<?php echo $supplier_v->supplier_id ?>"><?php echo $supplier_v->supplier_name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('mobilephone'); ?></li>
                            </ul>
                            <ul>
                                <li class="user_main_text">采购员id： </li>
                                <li class="user_main_input">
                                    <input class="TxtPasswordCssClass" id="username" disabled name="username" type="text" value="<?php session_start();
                                        echo $_SESSION['username'];
                                        ?>">
                                    <input id="userid" disabled name="userid" type="hidden" value="<?php echo $_SESSION['userid']; ?>">
                                </li>
                            </ul>
                            <ul>
                                <li class=""><?php echo form_error('userid'); ?></li>
                            </ul>
                        </div>
                    </li>
                    <li style="margin-left: 40px;" class="user_main_r1">
                        <input value="添加" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input value="重置" type="reset">
                    </li>
                </ul>
            </form>
        </div>

    </body>
</html>