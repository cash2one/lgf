<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />

        <title>药品使用情况</title>

        <!--<link href="<?php echo base_url() . '/css/User_Login.css' ?>" type="text/css" rel="stylesheet" />-->
        <link href="<?php echo base_url() . '/css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" />

    </head>
    <body id="userlogin_body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td colspan="31" align="center">2016年荣昌仁爱医院门诊患者数据统计</td>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td rowspan="2" align="center">月份</td>
                    <th colspan="6"span>挂号标题</th>
                    <th colspan="12"span>渠道</th>
                    <th colspan="12"span>挂号科室</th>
                </tr>

                <tr>
                    <th>挂号</th>
                    <th>初诊</th>
                    <th>复诊</th>
                    <th>流失</th>
                    <th>流失率</th>
                    <th>复诊率</th>
                    <th>网络</th>
                    <th>电话</th>
                    <th>QQ</th>
                    <th>杂志</th>
                    <th>市场</th>
                    <th>持卡</th>
                    <th>路过</th>
                    <th>附近</th>
                    <th>介绍</th>
                    <th>来过</th>
                    <th>会员证</th>
                    <th>合计</th>
                    <th>妇科</th>
                    <th>男科</th>
                    <th>外科</th>
                    <th>五官科</th>
                    <th>产科</th>
                    <th>内科</th>
                    <th>内儿科</th>
                    <th>中医科</th>
                    <th>疼痛科</th>
                    <th>综合门诊</th>
                    <th>入院</th>
                    <th>合计</th>
                </tr>
                <?php for($i=1;$i<=12;$i++){ ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $guahao[$i]; ?></td>
                    <td><?php echo $chuzhen[$i]; ?></td>
                    <td><?php echo $fuzhen[$i]; ?></td>
                    <td><?php echo $liushi[$i]; ?></td>
                    <td><?php if($guahao[$i]==0){echo 0;} else{echo  round($liushi[$i]/$guahao[$i]*100);} ?>%</td>
                    <td><?php if($guahao[$i]==0){echo 0;} else{echo  round($fuzhen[$i]/$guahao[$i]*100);} ?>%</td>
                    <td><?php echo $wangluo[$i] ?></td>
                    <td><?php echo $dianhua[$i] ?></td>
                    <td><?php echo $qq[$i] ?></td>
                    <td><?php echo $zazhi[$i] ?></td>
                    <td><?php echo $shichang[$i] ?></td>
                    <td><?php echo $chika[$i] ?></td>
                    <td><?php echo $luguo[$i] ?></td>
                    <td><?php echo $fujin[$i] ?></td>
                    <td><?php echo $jieshao[$i] ?></td>
                    <td><?php echo $laiguo[$i] ?></td>
                    <td><?php echo $huiyuanzheng[$i] ?></td>
                    <td><?php echo $wangluo[$i]+$dianhua[$i]+$qq[$i]+$zazhi[$i]+$shichang[$i]+$chika[$i]+$luguo[$i]+$fujin[$i]+$jieshao[$i]+$laiguo[$i]+$huiyuanzheng[$i] ?></td>
                    <td><?php echo $fuke[$i] ?></td>
                    <td><?php echo $nanke[$i] ?></td>
                    <td><?php echo $waike[$i] ?></td>
                    <td><?php echo $wuguanke[$i] ?></td>
                    <td><?php echo $chanke[$i] ?></td>
                    <td><?php echo $neike[$i] ?></td>
                    <td><?php echo $neierke[$i] ?></td>
                    <td><?php echo $zhongyike[$i] ?></td>
                    <td><?php echo $tentongke[$i] ?></td>
                    <td><?php echo $zonghemenzhen[$i] ?></td>
                    <td><?php echo $ruyuan[$i] ?></td>
                    <td><?php echo $fuke[$i]+$nanke[$i]+$waike[$i]+$wuguanke[$i]+$chanke[$i]+$neierke[$i]+$neierke[$i]+$zhongyike[$i]+$tentongke[$i]+$zonghemenzhen[$i]+$ruyuan[$i] ?></td>   
                </tr>
                <?php } ?>

            </tbody>

        </table>
    </body>
</html>