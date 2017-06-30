<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo base_url().'css/admin1.css' ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo base_url().'css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url().'js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js' ?>"></script>
    </head>
    <body>
<!--        <table cellspacing=0 cellpadding=0 width="100%" 
               background="<?php echo base_url().'/img/header_bg.jpg' ?>" border=0>
            <tr height=56>
                <td width=260><img height=56 src="<?php echo base_url().'/img/header_left.jpg' ?>" 
                                   width=260></td>
                <td style="font-weight: bold; color: #fff; padding-top: 20px" align=middle>当前用户：<?php session_start();echo $_SESSION['userid']; ?> &nbsp;&nbsp; 
                    <a style="color: #fff" href="" target=main>修改口令</a> &nbsp;&nbsp; 
                    <a style="color: #fff" onclick="if (confirm('确定要退出吗？')) return true; else return false;" href="<?php echo base_url().'index.php/login/logout' ?>" target=_top>退出系统</a> 
                </td>
                <td align=right width=268><img height=56 
                                                src="<?php echo base_url().'/img/header_right.jpg' ?>" width=268></td></tr></table>
        <table cellspacing=0 cellpadding=0 width="100%" border=0>
            <tr bgcolor=#1c5db6 height=4>
                <td></td>
            </tr>
        </table>-->
        
        <nav class='navbar navbar-default navbar-fixed-top'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <button class='navbar-toggle collapsed' data-target='#secondary-navigation' data-toggle='collapse' type='button'>
              <span class='sr-only'><span class="translation_missing" title="translation missing: zh-CN.admin.toggle_navigation">新途伟业</span></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand pjax' href='<?php echo base_url().'index.php/main' ?>'>
              <!--<img src='../img/gh1.png' width='120px'></img>-->
                <span>新途伟业</span>
              <small></small>
            </a>
          </div>
          <div class='collapse navbar-collapse' id='secondary-navigation'>
            <ul class='nav navbar-nav navbar-right root_links'>
              <li class='dashboard_root_link active'><a class="pjax" href="<?php echo base_url().'index.php/main' ?>"><span class="glyphicon glyphicon-home"></span> 管理首页</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> 当前用户：<?php echo $_SESSION['userid']; ?></a></li>
              <li><a href="./user_edit.html"><span class="glyphicon glyphicon-star"></span> 修改口令</a></li>
              <li><a onclick="if (confirm('确定要退出吗？')) return true; else return false;" href="<?php echo base_url().'index.php/login/logout' ?>" target=_top><span class="glyphicon glyphicon-off"></span>退出系统</a></li>
            </ul>
          </div>
        </div>
      </nav>
        
        </body>
</html>