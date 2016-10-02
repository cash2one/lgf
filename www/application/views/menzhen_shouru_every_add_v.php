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
        <h1>&nbsp;</h1>
        <h1 align="center"><?php echo $pr; ?></h1>
        <!--<form name="subform_changjia" action="<?php echo base_url() . 'index.php/data_add/jiuzhen_add' ?>" method="post">-->
            <?php echo $html_shouru_every; ?>
<!--            <input type="submit" size="17" name="submit" value="提交"/>-->
        <!--</form>-->
    </body>
    
</html>


