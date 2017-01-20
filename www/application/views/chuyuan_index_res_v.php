<!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=pragma content=no-cache />
        <meta http-equiv=cache-control content=no-cache />
        <meta http-equiv=expires content=-1000 />
        <link href="<?php echo base_url().'css/admin.css' ?>" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/lgf.js'?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>
        <title>导入成功</title>
    </head>
    <body>
        <form name="ruyuan" action="<?php echo base_url() . 'index.php/data_add/ruyuan_select' ?>" method="post" >
            <table class="table">
                <tr>
                    <td>入院日期：</td>
                    <td><input type="text" name="ruyuan_date_begin"  readOnly onClick="setDay(this);" value="<?php echo $ruyuan_date_begin ?>"/></td>
                    <td>至：</td>
                    <td><input type="text" name="ruyuan_date_end"  readOnly onClick="setDay(this);" value="<?php echo $ruyuan_date_end ?>"/></td>
                </tr>
                <tr>
                    <!--住院号-->
                    <td>住院号：</td>
                    <td><input type="text" name="hospitalization_id" value="<?php echo $hospitalization_id ?>"/></td>
                    <!--姓名-->
                    <td>姓名：</td>
                    <td><input type="text" name="name" value="<?php echo $name ?>"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" size="17" name="submit" value="查询"/></td>
                    <td><input type="reset" size="17" name="reset" value="重置"/></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <h1>&nbsp;</h1>
        <!--<form name="subform_changjia" action="<?php echo base_url() . 'index.php/data_add/jiuzhen_add' ?>" method="post">-->
            <?php echo $ruyuan_sel_html; ?>
<!--            <input type="submit" size="17" name="submit" value="提交"/>-->
        <!--</form>-->
    </body>
    
</html>





