<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>每日门诊</title>

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
        <form name="jiuzhen" action="<?php echo base_url() . 'index.php/patients/menzhen_patients_every_sel' ?>" method="post">
            <table>
                <tr>
                    <td>日期：</td>
                    <td><input type="text" name="date_every"  readOnly onClick="setDay(this);" value="<?php echo $date_every ?>"/></td>
                    <td><input type="submit" name="submit" value="查询" /></td>
                </tr>
            </table>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td colspan="31" align="center">2016年荣昌仁爱医院门诊患者数据统计</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td colspan="2" align="center"><?php echo $date_every ?></td>
                    <td>总业绩</td>
                    <td><?php echo $zongyeji ?></td>
                    <td span>现金收入</td>
                    <td span><?php echo $xianjinshouru ?></td>
                    <td span>银联</td>
                    <td span><?php echo $yinlian ?></input></td>
                    <td span>医保</td>
                    <td span><?php echo $yibao ?></td>
                    <td>累计业绩</td>
                    <td><?php echo $zongyeji_sum ?></td>
                </tr>
                <tr>
                    <td  rowspan="12" align="center" span="1" width="1%">当日门诊</td>
                    <td span>门诊</td>
                    <td span>初诊</td>
                    <td span>复诊</td>
                    <td span>流失</td>
                    <td span>治疗费</td>
                    <td span>手术费</td>
                    <td span>收入</td>
                    <td span>复诊率</td>
                    <td span>治疗比</td>
                    <td span>手术比</td>
                    <td span>人均</td>
                    
                </tr>
                <tr>
                    <td>男科</td>
                    <td><?php echo $nanke_chuzhen_count ?></td>
                    <td><?php echo $nanke_fuzhen_count ?></td>
                    <td><?php echo $nanke_liushi_count ?></td>
                    <td><?php echo $nanke_zhiliaofei ?></td>
                    <td><?php echo $nanke_shoushufei ?></td>
                    <td><?php echo $nanke_menzhenxiaofei ?></td>
                    <td><?php echo $nanke_fuzhenlv ?>%</td>
                    <td><?php echo $nanke_zhiliao_rate ?>%</td>
                    <td><?php echo $nanke_shoushu_rate ?>%</td>
                    <td><?php echo $nanke_renjun ?></td>
                </tr>
                <tr>
                    <td>外科</td>
                    <td><?php echo $waike_chuzhen_count ?></td>
                    <td><?php echo $waike_fuzhen_count ?></td>
                    <td><?php echo $waike_liushi_count ?></td>
                    <td><?php echo $waike_zhiliaofei ?></td>
                    <td><?php echo $waike_shoushufei ?></td>
                    <td><?php echo $waike_menzhenxiaofei ?></td>
                    <td><?php echo $waike_fuzhenlv ?>%</td>
                    <td><?php echo $waike_zhiliao_rate ?>%</td>
                    <td><?php echo $waike_shoushu_rate ?>%</td>
                    <td><?php echo $waike_renjun ?></td>
                </tr>
                <tr>
                    <td>妇科2</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?>%</td>
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
                    <td><?php echo 0 ?>%</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>产科</td>
                    <td><?php echo $chanke_chuzhen_count ?></td>
                    <td><?php echo $chanke_fuzhen_count ?></td>
                    <td><?php echo $chanke_liushi_count ?></td>
                    <td><?php echo $chanke_zhiliaofei ?></td>
                    <td><?php echo $chanke_shoushufei ?></td>
                    <td><?php echo $chanke_menzhenxiaofei ?></td>
                    <td><?php echo $chanke_fuzhenlv ?>%</td>
                    <td><?php echo $chanke_zhiliao_rate ?>%</td>
                    <td><?php echo $chanke_shoushu_rate ?>%</td>
                    <td><?php echo $chanke_renjun ?></td>
                </tr>
                <tr>
                    <td>耳鼻喉科</td>
                    <td><?php echo $erbihou_chuzhen_count ?></td>
                    <td><?php echo $erbihou_fuzhen_count ?></td>
                    <td><?php echo $erbihou_liushi_count ?></td>
                    <td><?php echo $erbihou_zhiliaofei ?></td>
                    <td><?php echo $erbihou_shoushufei ?></td>
                    <td><?php echo $erbihou_menzhenxiaofei ?></td>
                    <td><?php echo $erbihou_fuzhenlv ?>%</td>
                    <td><?php echo $erbihou_zhiliao_rate ?>%</td>
                    <td><?php echo $erbihou_shoushu_rate ?>%</td>
                    <td><?php echo $erbihou_renjun ?></td>
                </tr>
                <tr>
                    <td>理疗科</td>
                    <td><?php echo $tengtong_chuzhen_count ?></td>
                    <td><?php echo $tengtong_fuzhen_count ?></td>
                    <td><?php echo $tengtong_liushi_count ?></td>
                    <td><?php echo $tengtong_zhiliaofei ?></td>
                    <td><?php echo $tengtong_shoushufei ?></td>
                    <td><?php echo $tengtong_menzhenxiaofei ?></td>
                    <td><?php echo $tengtong_fuzhenlv ?>%</td>
                    <td><?php echo $tengtong_zhiliao_rate ?>%</td>
                    <td><?php echo $tengtong_shoushu_rate ?>%</td>
                    <td><?php echo $tengtong_renjun ?></td>
                </tr>
                <tr>
                    <td>其他</td>
                    <td><?php echo $qita_chuzhen_count ?></td>
                    <td><?php echo $qita_fuzhen_count ?></td>
                    <td><?php echo $qita_liushi_count ?></td>
                    <td><?php echo $qita_zhiliaofei ?></td>
                    <td><?php echo $qita_shoushufei ?></td>
                    <td><?php echo $qita_menzhenxiaofei ?></td>
                    <td><?php echo $qita_fuzhenlv ?>%</td>
                    <td><?php echo $qita_zhiliao_rate ?>%</td>
                    <td><?php echo $qita_shoushu_rate ?>%</td>
                    <td><?php echo $qita_renjun ?></td>
                </tr>
                <tr>
                    <td>内科</td>
                    <td><?php echo $neike_chuzhen_count ?></td>
                    <td><?php echo $neike_fuzhen_count ?></td>
                    <td><?php echo $neike_liushi_count ?></td>
                    <td><?php echo $neike_zhiliaofei ?></td>
                    <td><?php echo $neike_shoushufei ?></td>
                    <td><?php echo $neike_menzhenxiaofei ?></td>
                    <td><?php echo $neike_fuzhenlv ?>%</td>
                    <td><?php echo $neike_zhiliao_rate ?>%</td>
                    <td><?php echo $neike_shoushu_rate ?>%</td>
                    <td><?php echo $neike_renjun ?></td>
                </tr>
                <tr>
                    <td>中医科</td>
                    <td><?php echo $zhongyi_chuzhen_count ?></td>
                    <td><?php echo $zhongyi_fuzhen_count ?></td>
                    <td><?php echo $zhongyi_liushi_count ?></td>
                    <td><?php echo $zhongyi_zhiliaofei ?></td>
                    <td><?php echo $zhongyi_shoushufei ?></td>
                    <td><?php echo $zhongyi_menzhenxiaofei ?></td>
                    <td><?php echo $zhongyi_fuzhenlv ?>%</td>
                    <td><?php echo $zhongyi_zhiliao_rate ?>%</td>
                    <td><?php echo $zhongyi_shoushu_rate ?>%</td>
                    <td><?php echo $zhongyi_renjun ?></td>
                </tr>
                <tr>
                    <td>总门诊</td>
                    <td><?php echo $zongmenzhen_chuzhen ?></td>
                    <td><?php echo $zongmenzhen_fuzhen ?></td>
                    <td><?php echo $zongmenzhen_liushi ?></td>
                    <td><?php echo $zongmenzhen_zhiliaofei ?></td>
                    <td><?php echo $zongmenzhen_shoushufei ?></td>
                    <td><?php echo $zongmenzhen_menzhenxiaofei ?></td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_fuzhenlv) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_zhiliao_rate) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_shoushu_rate) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_renjun) ?></td>
                </tr>
                <tr>
                    <td  rowspan="11" align="center" span="1">当月累计门诊</td>
                    <td>男科</td>
                    <td><?php echo $nanke_chuzhen_count_sum ?></td>
                    <td><?php echo $nanke_fuzhen_count_sum ?></td>
                    <td><?php echo $nanke_liushi_count_sum ?></td>
                    <td><?php echo $nanke_zhiliaofei_sum ?></td>
                    <td><?php echo $nanke_shoushufei_sum ?></td>
                    <td><?php echo $nanke_menzhenxiaofei_sum ?></td>
                    <td><?php echo $nanke_fuzhenlv_sum ?>%</td>
                    <td><?php echo $nanke_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $nanke_shoushu_rate_sum ?>%</td>
                    <td><?php echo $nanke_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>外科</td>
                    <td><?php echo $waike_chuzhen_count_sum ?></td>
                    <td><?php echo $waike_fuzhen_count_sum ?></td>
                    <td><?php echo $waike_liushi_count_sum ?></td>
                    <td><?php echo $waike_zhiliaofei_sum ?></td>
                    <td><?php echo $waike_shoushufei_sum ?></td>
                    <td><?php echo $waike_menzhenxiaofei_sum ?></td>
                    <td><?php echo $waike_fuzhenlv_sum ?>%</td>
                    <td><?php echo $waike_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $waike_shoushu_rate_sum ?>%</td>
                    <td><?php echo $waike_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>妇科2</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?>%</td>
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
                    <td><?php echo 0 ?>%</td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                    <td><?php echo 0 ?></td>
                </tr>
                <tr>
                    <td>产科</td>
                    <td><?php echo $chanke_chuzhen_count_sum ?></td>
                    <td><?php echo $chanke_fuzhen_count_sum ?></td>
                    <td><?php echo $chanke_liushi_count_sum ?></td>
                    <td><?php echo $chanke_zhiliaofei_sum ?></td>
                    <td><?php echo $chanke_shoushufei_sum ?></td>
                    <td><?php echo $chanke_menzhenxiaofei_sum ?></td>
                    <td><?php echo $chanke_fuzhenlv_sum ?>%</td>
                    <td><?php echo $chanke_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $chanke_shoushu_rate_sum ?>%</td>
                    <td><?php echo $chanke_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>耳鼻喉科</td>
                    <td><?php echo $erbihou_chuzhen_count_sum ?></td>
                    <td><?php echo $erbihou_fuzhen_count_sum ?></td>
                    <td><?php echo $erbihou_liushi_count_sum ?></td>
                    <td><?php echo $erbihou_zhiliaofei_sum ?></td>
                    <td><?php echo $erbihou_shoushufei_sum ?></td>
                    <td><?php echo $erbihou_menzhenxiaofei_sum ?></td>
                    <td><?php echo $erbihou_fuzhenlv_sum ?>%</td>
                    <td><?php echo $erbihou_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $erbihou_shoushu_rate_sum ?>%</td>
                    <td><?php echo $erbihou_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>理疗科</td>
                    <td><?php echo $tengtong_chuzhen_count_sum ?></td>
                    <td><?php echo $tengtong_fuzhen_count_sum ?></td>
                    <td><?php echo $tengtong_liushi_count_sum ?></td>
                    <td><?php echo $tengtong_zhiliaofei_sum ?></td>
                    <td><?php echo $tengtong_shoushufei_sum ?></td>
                    <td><?php echo $tengtong_menzhenxiaofei_sum ?></td>
                    <td><?php echo $tengtong_fuzhenlv_sum ?>%</td>
                    <td><?php echo $tengtong_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $tengtong_shoushu_rate_sum?>%</td>
                    <td><?php echo $tengtong_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>其他</td>
                    <td><?php echo $qita_chuzhen_count_sum ?></td>
                    <td><?php echo $qita_fuzhen_count_sum ?></td>
                    <td><?php echo $qita_liushi_count_sum ?></td>
                    <td><?php echo $qita_zhiliaofei_sum ?></td>
                    <td><?php echo $qita_shoushufei_sum ?></td>
                    <td><?php echo $qita_menzhenxiaofei_sum ?></td>
                    <td><?php echo $qita_fuzhenlv_sum ?>%</td>
                    <td><?php echo $qita_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $qita_shoushu_rate_sum ?>%</td>
                    <td><?php echo $qita_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>内科</td>
                    <td><?php echo $neike_chuzhen_count_sum ?></td>
                    <td><?php echo $neike_fuzhen_count_sum ?></td>
                    <td><?php echo $neike_liushi_count_sum ?></td>
                    <td><?php echo $neike_zhiliaofei_sum ?></td>
                    <td><?php echo $neike_shoushufei_sum ?></td>
                    <td><?php echo $neike_menzhenxiaofei_sum ?></td>
                    <td><?php echo $neike_fuzhenlv_sum ?>%</td>
                    <td><?php echo $neike_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $neike_shoushu_rate_sum ?>%</td>
                    <td><?php echo $neike_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>中医科</td>
                    <td><?php echo $zhongyi_chuzhen_count_sum ?></td>
                    <td><?php echo $zhongyi_fuzhen_count_sum ?></td>
                    <td><?php echo $zhongyi_liushi_count_sum ?></td>
                    <td><?php echo $zhongyi_zhiliaofei_sum ?></td>
                    <td><?php echo $zhongyi_shoushufei_sum ?></td>
                    <td><?php echo $zhongyi_menzhenxiaofei_sum ?></td>
                    <td><?php echo $zhongyi_fuzhenlv_sum ?>%</td>
                    <td><?php echo $zhongyi_zhiliao_rate_sum ?>%</td>
                    <td><?php echo $zhongyi_shoushu_rate_sum ?>%</td>
                    <td><?php echo $zhongyi_renjun_sum ?></td>
                </tr>
                <tr>
                    <td>总门诊</td>
                    <td><?php echo $zongmenzhen_chuzhen_sum ?></td>
                    <td><?php echo $zongmenzhen_fuzhen_sum ?></td>
                    <td><?php echo $zongmenzhen_liushi_sum ?></td>
                    <td><?php echo $zongmenzhen_zhiliaofei_sum ?></td>
                    <td><?php echo $zongmenzhen_shoushufei_sum ?></td>
                    <td><?php echo $zongmenzhen_menzhenxiaofei_sum ?></td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_fuzhenlv_sum) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_zhiliao_rate_sum) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_shoushu_rate_sum) ?>%</td>
                    <td><?php echo sprintf("%.2f", $zongmenzhen_renjun_sum) ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">当日支出</td>
                    <td><?php echo $dangrizhichu ?></td>
                    <td colspan="2" align="center">大笔支出</td>
                    <td><?php echo $dabizhichu ?></td>
                    <td colspan="2" align="center">累计支出</td>
                    <td><?php echo $zhichu_sum ?></td>
                    <td colspan="2" align="center">累计余额</td>
                    <td><?php echo 0 ?></td>
                </tr>
                
            </tbody>

        </table>
    </body>
</html>