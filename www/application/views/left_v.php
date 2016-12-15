<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo base_url().'css/admin.css' ?>" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <div id="left" style="">
        <table height="100%" cellspacing=0 cellpadding=0 width=155
               background=./img/menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>
<!--                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(1) 
                                    href="javascript:void(0);">药品采购</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/drug_purchase/add' ?>" 
                                   target=right>采购申请</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/drug_purchase/update' ?>" 
                                   target=right>采购申请修改</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/drug_purchase/check' ?>" 
                                   target=right>采购审核</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/drug_purchase/select1' ?>" 
                                   target=right>审核结果</a></td></tr>
                        
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(2) 
                                    href="javascript:void(0);">信息录入</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child2 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_property_add' ?>" 
                                   target=right>药品属性录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_guige_add' ?>" 
                                   target=right>药品规格录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_jixing_add' ?>" 
                                   target=right>药品剂型录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_shangpin_info_add' ?>" 
                                   target=right>商品信息录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_supplier_add' ?>" 
                                   target=right>供应商录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_changjia_add' ?>" 
                                   target=right>厂家录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品使用情况</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(3) 
                                    href="javascript:void(0);">报表查询</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品属性查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品规格查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品剂型查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>供应商查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>厂家查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>滞销药品信息查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品采购信息查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>药品销量统计信息查询导出及打印</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/report_form/price_comp_v' ?>" 
                                   target=right>药品采购比价查询</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>-->
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(1) 
                                    href="javascript:void(0);">数据录入</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/data_add/jiuzhen_index' ?>" 
                                   target=right>就诊录入</a></td></tr>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/data_add/ruyuan_index' ?>" 
                                   target=right>入院录入</a></td></tr>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/data_add/chuyuan_index' ?>" 
                                   target=right>出院录入</a></td></tr>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/data_add/menzhen_shouru_every' ?>" 
                                   target=right>每日门诊录入</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/data_add/zhuyuan_shouru_every' ?>" 
                                   target=right>每日住院录入</a></td></tr>
                    </table>
                    
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(2) 
                                    href="javascript:void(0);">报表查询</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child2 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/patients/patients_menzhen_every' ?>" 
                                   target=right>每日数据</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td ><a class=menuchild 
                                   href="<?php echo base_url().'index.php/patients/patients_year' ?>" 
                                   target=right>年度数据</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>外科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>内科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>男科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>妇科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>产科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>耳鼻喉科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>疼痛科</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/report_form/price_comp_v' ?>" 
                                   target=right>中医</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo base_url().'/img/menu_bt.jpg' ?>><a 
                                    class=menuparent onclick=expand(3) 
                                    href="javascript:void(0);">系统管理</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/sys_manager' ?>" 
                                   target=right>用户</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo base_url().'/img/menu_icon.gif' ?>" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo base_url().'index.php/info_add/drug_use_add' ?>" 
                                   target=right>角色</a></td></tr>
                        
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    </td>
                <td width=1 bgcolor=#d1e6f7></td>
            </tr>
        </table>
        </div>
</body>
</html>