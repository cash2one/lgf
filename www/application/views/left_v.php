<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo base_url().'css/admin1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js' ?>"></script>
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
    <body  data-spy="scroll">
        <div id="left" style="">
<!--            <table height="100%" cellspacing=0 cellpadding=0 width=155
                   background=./img/menu_bg.jpg border=0>
                <tr>
                    <td valign=top align=middle>
                        <table cellspacing=0 cellpadding=0 width="100%" border=0>

                            <tr>
                                <td height=10></td></tr></table>
                        <table cellspacing=0 cellpadding=0 width=150 border=0>
                            <tr height=22>
                                <td style="padding-left: 30px" background=<?php echo base_url() . '/img/menu_bt.jpg' ?>><a 
                                        class=menuparent onclick=expand(1) 
                                        href="javascript:void(0);">数据录入</a></td></tr>
                            <tr height=4>
                                <td></td>
                            </tr>
                        </table>
                        <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                               width=150 border=0>

                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/data_add/jiuzhen_index' ?>" 
                                        target=right>就诊录入</a></td></tr>

                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/data_add/ruyuan_index' ?>" 
                                        target=right>入院录入</a></td></tr>

                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/data_add/chuyuan_index_sel' ?>" 
                                        target=right>出院录入</a></td></tr>

                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/data_add/menzhen_shouru_every' ?>" 
                                        target=right>每日门诊录入</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/data_add/zhuyuan_shouru_every' ?>" 
                                        target=right>每日住院录入</a></td></tr>
                        </table>

                        <table cellspacing=0 cellpadding=0 width=150 border=0>
                            <tr height=22>
                                <td style="padding-left: 30px" background=<?php echo base_url() . '/img/menu_bt.jpg' ?>><a 
                                        class=menuparent onclick=expand(2) 
                                        href="javascript:void(0);">报表查询</a></td></tr>
                            <tr height=4>
                                <td></td></tr></table>
                        <table id=child2 style="display: none" cellspacing=0 cellpadding=0 
                               width=150 border=0>

                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/patients/patients_menzhen_every' ?>" 
                                        target=right>每日门诊</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td ><a class=menuchild 
                                        href="<?php echo base_url() . 'index.php/patients/patients_zhuyuan_every' ?>" 
                                        target=right>每日住院</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>外科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>内科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>男科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>妇科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>产科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>耳鼻喉科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>疼痛科</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/report_form/price_comp_v' ?>" 
                                       target=right>中医</a></td></tr>
                            <tr height=4>
                                <td colspan=2></td></tr></table>
                        <table cellspacing=0 cellpadding=0 width=150 border=0>
                            <tr height=22>
                                <td style="padding-left: 30px" background=<?php echo base_url() . '/img/menu_bt.jpg' ?>><a 
                                        class=menuparent onclick=expand(3) 
                                        href="javascript:void(0);">系统管理</a></td></tr>
                            <tr height=4>
                                <td></td></tr></table>
                        <table id=child3 style="display: none" cellspacing=0 cellpadding=0 
                               width=150 border=0>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/sys_manager' ?>" 
                                       target=right>用户</a></td></tr>
                            <tr height=20>
                                <td align=middle width=30><img height=9 
                                                               src="<?php echo base_url() . '/img/menu_icon.gif' ?>" width=9></td>
                                <td><a class=menuchild 
                                       href="<?php echo base_url() . 'index.php/info_add/drug_use_add' ?>" 
                                       target=right>角色</a></td></tr>

                            <tr height=4>
                                <td colspan=2></td></tr></table>
                    </td>
                    <td width=1 bgcolor=#d1e6f7></td>
                </tr>
            </table>-->
        </div>            
        <div class="nav nav-pills">            
            <ul class="list-group">
                <li class='list-group-item-heading'><h4>数据录入</h4></li>
                <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/data_add/jiuzhen_index' ?>" target=right>就诊录入</a></li>
                <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/data_add/ruyuan_index' ?>" target=right>入院录入</a></li>
                <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/data_add/chuyuan_index_sel' ?>" target=right>出院录入</a></li>
                <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/data_add/menzhen_shouru_every' ?>" target=right>每日门诊录入</a></li>
                <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/data_add/zhuyuan_shouru_every' ?>" target=right>每日住院录入</a></li>
            </ul>
<!--            </div>
            <div class="nav nav-pills">-->
                <ul class="list-group">
                    <li class='list-group-item-heading'><h4>报表查询</h4></li>
                    <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/patients/patients_menzhen_every' ?>" target=right>每日门诊</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/patients/patients_zhuyuan_every' ?>" target=right>每日住院</a></li>
                </ul>
<!--            </div>
            <div class="nav nav-pills">-->
                <ul class="list-group">
                    <li class='list-group-item-heading'><h4>系统管理</h4></li>
                    <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/sys_manager' ?>" target=right>用户</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url() . 'index.php/sys_manager' ?>" target=right>角色</a></li>
                </ul>
            </div>
        
    </body>
</html>