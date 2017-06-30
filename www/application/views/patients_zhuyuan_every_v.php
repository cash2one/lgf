<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>每日住院</title>

        <!--<link href="<?php echo base_url() . '/css/User_Login.css' ?>" type="text/css" rel="stylesheet" />-->
        <link href="<?php echo base_url() . '/css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/modal.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/dataone.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/lgf.js'?>"></script>
        <script src="<?php echo base_url() . 'js/jquery.js' ?>"></script>

    </head>
    <body id="userlogin_body">
        <form name="jiuzhen" action="<?php echo base_url() . 'index.php/patients/zhuyaun_patients_every_sel' ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">日期：</span>
                        <input  class="form-control" type="text" name="date_every"  readOnly onClick="setDay(this);" value="<?php echo $date_every ?>"/>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">查询</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td colspan="31" align="center">2016年荣昌仁爱医院门诊患者数据统计</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td colspan="2" span>日期</td>
                    <td rowspan="2" align="center">总业绩</td>
                    <td rowspan="2" align="center"><?php echo '0' ?></td>
                    <td span>门诊收入</td>
                    <td span><?php echo '0' ?></td>
                    <td span>预交款</td>
                    <td span><?php echo $yujiaokuan ?></input></td>
                    <td span>现金收入</td>
                    <td span><?php echo $xianjinshouru ?></td>
                    <td rowspan="2" align="center">累计业绩</td>
                    <td rowspan="2" align="center"><?php echo '0' ?></td>
                </tr>
                <tr align="center">
                    <td colspan="2" align="center"><?php echo $date_every ?></td>
                    <td span>住院收入</td>
                    <td span><?php echo '0' ?></td>
                    <td span>退补款</td>
                    <td span><?php echo '0' ?></td>
                    $tuibukuan
                    <td span>医保收入</td>
                    <td span><?php echo '0 '?></td>
                    $yibaoshouru
                </tr>
                <tr>
                    <td span>门诊</td>
                    <td span>初诊</td>
                    <td span>复诊</td>
                    <td span>流失</td>
                    <td span>初诊入院</td>
                    <td span>复诊入院</td>
                    <td span>治疗人次</td>
                    <td span>治疗费</td>
                    <td span>手术人次</td>
                    <td span>手术费</td>
                    <td span>收入</td>
                    <td span>人均</td>
                </tr>
                <tr>
                    <td>男科</td>
                    <td><?php echo $nanke_chuzhen_count ?></td>
                    <td><?php echo $nanke_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>外科</td>
                    <td><?php echo $waike_chuzhen_count ?></td>
                    <td><?php echo $waike_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>妇科2</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>妇科3</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>产科</td>
                    <td><?php echo $chanke_chuzhen_count ?></td>
                    <td><?php echo $chanke_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>耳鼻喉科</td>
                    <td><?php echo $erbihou_chuzhen_count ?></td>
                    <td><?php echo $erbihou_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>理疗科</td>
                    <td><?php echo $tengtong_chuzhen_count ?></td>
                    <td><?php echo $tengtong_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>其他</td>
                    <td><?php echo $qita_chuzhen_count ?></td>
                    <td><?php echo $qita_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>内科</td>
                    <td><?php echo $neike_chuzhen_count ?></td>
                    <td><?php echo $neike_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>中医科</td>
                    <td><?php echo $zhongyi_chuzhen_count ?></td>
                    <td><?php echo $zhongyi_fuzhen_count ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>总门诊</td>
                    <td><?php echo $zongmenzhen_chuzhen ?></td>
                    <td><?php echo $zongmenzhen_fuzhen ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>住院</td>
                    <td span>入院数</td>
                    <td span>预交款</td>
                    <td span>出院数</td>
                    <td span>自费</td>
                    <td span>医保</td>
                    <td span>补款</td>
                    <td span>医院垫付</td>
                    <td span>手术出院</td>
                    <td span>收入</td>
                    <td span>在院</td>
                    <td span>出院人均</td>
                </tr>
                <tr>
                    <td>内科</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>外科</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>妇产科</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>男科</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>中医理疗</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>耳鼻喉科</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>总住院</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                
            </tbody>

        </table>
    </body>
</html>