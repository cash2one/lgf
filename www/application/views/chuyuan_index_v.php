<!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=pragma content=no-cache />
        <meta http-equiv=cache-control content=no-cache />
        <meta http-equiv=expires content=-1000 />
        <link href="<?php echo base_url().'css/admin.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/lgf.js'?>"></script>
        <title>入院登记</title>
    </head>
    <body id="chuyuan_index_sel_body">
        <form name="ruyuan" action="<?php echo base_url() . 'index.php/data_add/chuyuan_add' ?>" method="post" >
            <div>
                <table style="width:46%"class="table table-striped table-hover table-bordered table-condensed" align="center">
                    <tr>
                        <td colspan="6" align="center"><h2>病人出院登记</h2></td>
                    </tr>
                    <tr>
                        <td>出院日期：</td>
                        <td><input type="text" name="chuyuan_date"  readOnly onClick="setDay(this);" value="<?php echo date('Y-m-d') ?>"/></td>
                        <td>住院号：</td>
                        <td><input type="text" name="hospitalization_id" value="<?php echo $hospitalization_id ; ?>"  readonly="readonly" /></td>
                        
                        <td>预交款：</td>
                        <td><input type="text" name="yujiaokuan" value="<?php echo $yujiaokuan ; ?>" readonly="readonly" /></td>
                    </tr>
                    <tr>
                        <td>医院：</td>
                        <td><input type="text" name="yiyuan" value="<?php echo $yiyuan; ?>" readonly="readonly" /></td>
                        <td>姓名：</td>
                        <td><input type="text" name="name" value="<?php echo $name ; ?>" readonly="readonly" /></td>
                        
                        <td>自费：</td>
                        <td><input type="text" name="zifei" value=""/></td>
                    </tr>
                    <tr>
                        <td>年龄：</td>
                        <td><input type="text" name="nianling" value="<?php echo $nianling ; ?>" readonly="readonly" /></td>
                        <td>性别：</td>
                        <td><input type="text" name="xingbie" value="<?php echo $xingbie ; ?>" readonly="readonly" /></td>
                        
                        <td>医保：</td>
                        <td><input type="text" name="yibao" value=""/></td>
                    </tr>
                    <tr>
                        <td>科室：</td>
                        <td><input type="text" name="keshi" value="<?php echo $keshi ; ?>" readonly="readonly" /></td>
                        <td>来源渠道：</td>
                        <td><input type="text" name="laiyuanqudao" value="<?php echo $laiyuanqudao ; ?>" readonly="readonly" /></td>
                        
                        <td>补款：</td>
                        <td><input type="text" name="bukuan" value=""/></td>
                    </tr>
                    <tr>
                        <td>区域：</td>
                        <td><input type="text" name="quyu" value="<?php echo $quyu ; ?>" readonly="readonly" /></td>
                        <td>初复诊入院：</td>
                        <td><input type="text" name="chufuzhenruyuan" value="<?php echo $chufuzhenruyuan ; ?>" readonly="readonly" /></td>
                        
                        <td>医院垫付：</td>
                        <td><input type="text" name="yiyuandianfu" value=""/></td>
                    </tr>
                    <tr>
                        <td>参保类型：</td>
                        <td><input type="text" name="canbaoleixing" value="<?php echo $canbaoleixing ; ?>" readonly="readonly" /></td>
                        <td>入院日期：</td>
                        <td><input type="text" name="riqi" value="<?php echo $riqi ; ?>" readonly="readonly" /></td>
                        
                        <td>收入：</td>
                        <td><input type="text" name="shouru" value=""/></td>
                    </tr>
                    <tr>
                        <td>是否手术：</td>
                        <td><select name="shifoushoushu" id="shifoushoushu">
                                <option value="0">否</option>
                                <option value="1" selected>是</option>
                            </select>
                        </td>
                        <td>住院天数：</td>
                        <td><input type="text" name="zhuyuantianshu" value="<?php echo $zhuyuantianshu ; ?>"/></td>
                        <td>总费用：</td>
                        <td><input type="text" name="zongfeiyong" value=""/></td>
                    </tr>
                    <tr>
                        <td align="center">诊断：</td>
                        <td colspan="5" align="center"><textarea cols=100 name="zhenduan" value="" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td align="center">
                            <input type="submit" size="17" name="submit" value="保存"/>
                            <input type="reset" size="17" name="reset" value="重置"/>
                        </td>
                    </tr>
                </table>
            </div> 
        </form>
    </body>
</html>


