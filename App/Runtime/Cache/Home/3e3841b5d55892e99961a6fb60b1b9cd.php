<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>tianba</title>
    <base href="/tb"/>
    <meta name="keywords" content="天霸" />
    <meta name="description" content="宅文化" />
    <link rel="stylesheet" href="Public/Home/css/style.css" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="Public/Home/js/jquery.js" type=text/javascript></script>
    <script src="Public/Home/js/style.js" type=text/javascript></script>
</head>


<body >
    <div class="bg" 
    <?php if(CONTROLLER_NAME == 'Index'): ?>style="background-image:url(Public/Home/images/home_bg.jpg)"<?php endif; ?>>
        <div class="wp">
            <div class="header c">
                <div class="logo l"><a href=""><img src="/tb<?php echo ($cfg["cfg_logo"]); ?>" alt=""></a></div>
                <div class="head_txt l text-right">
                    <?php echo ($cfg["cfg_top"]); ?>
                </div>
                <div class="head_bar r">
                    <div class="a">
                        <span><a href="">English</a><i>|</i>
                        <a href="/tb/index.php/Home/Index/Index">返回首頁</a></span>
                        <?php if($_SESSION['user']['username'] != null): ?><span>欢迎你，
                        <a href=""><font color="orange">[<?php echo ($_SESSION["user"]["username"]); ?>]</a></font>
                        <a href="<?php echo U('User/logout');?>"><font color="orange">[退出]</font></a></span> 
                        <?php else: ?>
                        <span><a href="/tb/index.php/Home/User/login">登錄</a><i>|</i>
                        <a href="/tb/index.php/Home/User/reg">註冊</a></span><?php endif; ?>
                    </div>
                    <div class="so">
                        <form action="<?php echo U('Product/index');?>" method="post">
                        <input type="text" name="search" id="" class="inp" placeholder="请输入名称、关键词、单价..">
                        <input type="submit" value="搜索" class="mit">
                        </form>
                    </div>
                </div>
            </div>
            <?php if(CONTROLLER_NAME != Index): ?><div class="nav">
                <ul>
                    <li><a href="/tb/index.php/Home/Index/Index">瑪致官网首页</a></li>

                    <?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li <?php if(CONTROLLER_NAME == $vo['remark']): ?>class="on"<?php endif; ?>>
                       <a href="/tb/index.php/Home/<?php echo ($vo["remark"]); ?>/Index"><?php echo ($vo["name"]); ?></a>
                        <ul id="pop">
                        <?php if(is_array($vo['children'])): foreach($vo['children'] as $key=>$v): ?><li>
                            <a href="/tb/index.php/Home/<?php echo ($vo["remark"]); ?>/Index/cid/<?php echo ($v["cid"]); ?>"><?php echo ($v["name"]); ?></a>
                            </li><?php endforeach; endif; ?> 
                        </ul><?php endforeach; endif; ?> 
                    
                </ul>
            </div><?php endif; ?>


            <div class="main">
                <div class="boxs">
                    <div class="ml l">
                        <div class="t1">關於我們 <small>/ About us</small></div>
                        <div class="pa">
                            <ul class="subnav">
                                <?php if(is_array($infoclass)): foreach($infoclass as $key=>$vo): ?><!--<li class="on"><a href="">CDR下载</a></li>-->
                                 <li <?php if($vo['index'] == 'on'): ?>class="on"<?php endif; ?>
                                 ><a href="/tb/index.php/Home/News/index/cid/<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                                <div class="ads">
        <div class="t">广告大片</div>
        <div class="rel">
            <a href="javascript:pop();"><img src="Public/Home/images/1.jpg" alt=""><span></span></a>
        </div>
    </div> 
 
                        </div>
                    </div>
                    <div class="mr r">
                        <div class="t2"><h3>公司文化</h3></div>
                        <div class="a_scroll">
                            <div class="title">
                            <label ><?php echo ($arr["title"]); ?></label> 
                            <ul>
                                <li>发布人：<?php echo ($arr["resource"]); ?></li>
                                <li>发布时间：<?php echo ($arr["add_time"]); ?></li>
                            </ul>
                            </div>
                            <div class="apic">
                                <img src="/tb<?php echo ($arr["image"]); ?>" alt="">
                            </div>
                            <div class="cont">
                               <?php echo ($arr["body"]); ?>  
                            </div>
                            <div class="title">
                            <ul>
                                <li><font color="red">上一页</font>：<a href="/tb/index.php/Home/News/info/id/<?php echo ($front["id"]); ?>"><?php echo ($front["title"]); ?></a></li>
                                <li><font color="red">下一页</font>：<a href="/tb/index.php/Home/News/info/id/<?php echo ($after["id"]); ?>"><?php echo ($after["title"]); ?></a></li>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
            $(function () {
                var winH = $(window).height();
                var aboxH = $(".bottom_x").height();
                var bboxH = $(".footer").outerHeight();
                var cboxH = $(".header").outerHeight();
                var dboxH = $(".nav").outerHeight();
                var eboxH = $(".t2").outerHeight();
                // $(".bg").css("height",winH - aboxH - bboxH + 'px');
                // $(".main").css("height",winH - aboxH - bboxH - cboxH - dboxH - 55 + 'px');
                // $(".a_scroll").css("height",winH - aboxH - bboxH - cboxH - dboxH - eboxH - 85 + 'px');
                //$(".bg").css("height",'250%');
                //$(".main").css("height",'1500px');
                //$(".a_scroll").css("height",'600px');
                $(".bg").css("height",'150%');
                $(".main").css("height",'800px');
                $(".a_scroll").css("height",'700px');
            })
    </script>
   <style>
       .title{width: 100%;height:70px;}
       .title label{font-size:18px; color:black;text-align: center; line-heightht: 40px;display:block;}
       .title ul li{float:left;width: 50%;text-align: center;}
   </style>

<div class="bottom_x"></div>
    <div class="footer">
        <div class="wp">
            <div class="box">
                <div class="blogo l">
                    <img src="/tb<?php echo ($cfg["cfg_logo_bottom"]); ?>" alt="">
                </div>
                <div class="a">

                <?php if(is_array($link)): foreach($link as $key=>$vo): ?><a href="#"><?php echo ($vo["name"]); ?></a><span></span><?php endforeach; endif; ?>
                
                </div> 
                <div class="p"><?php echo ($cfg["cfg_copyright"]); ?></div>               
            </div>
        </div>
    </div>

<div class="pop_bg"></div>
    <div id="pop2">
        <div class="table">
            <div class="cell">
                <dl class="rel">
                    <div class="t"><div class="close r" title="关闭">×</div><h4>活动报名</h4></div>
                    <div class="con">
                        <video controls="" name="media" width="100%" height="100%">
<source src="http://vodcdn.video.taobao.com/oss/taobao-ugc/adcc5ba76d2e45d49524ae62bf2297ab/1476268875/video.mp4" type="video/mp4">
</video>
                    </div>
                </dl>
            </div>
        </div>
    </div>


</body>
</html>