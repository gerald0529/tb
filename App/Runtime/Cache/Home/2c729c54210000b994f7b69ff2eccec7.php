<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>tianba</title>
    <base href="http://localhost:80/tb/"/>
    <meta name="keywords" content="天霸" />
    <meta name="description" content="宅文化" />
    <link rel="stylesheet" href="Public/Home/css/style.css" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="Public/Home/js/jquery.js" type=text/javascript></script>
    <script src="Public/Home/js/style.js" type=text/javascript></script>
</head>
<body>
    <div class="bg">
        <div class="wp">
            <div class="header c">
                <div class="logo l"><a href="index.html"><img src="Public/Home/images/logo.png" alt=""></a></div>
                <div class="head_txt l text-right">
“MaZal”- 古希伯來文中，一種最高敬意的祝福， <br>
在交易完成階段，只要說出「MAZAL」則代表拍板定語，不再有變。 <br>
一種不悔而更勝於『法律』或『書面契約』之精神層次的約定。
                </div>
                <div class="head_bar r">
                    <div class="a">
                        <span><a href="">English</a><i>|</i>
                        <a href="/tb/index.php/Home/Index/Index">返回首頁</a></span>
                        <span><a href="/tb/index.php/Home/User/login">登錄</a><i>|</i>
                        <a href="/tb/index.php/Home/User/reg">註冊</a></span>
                    </div>
                    <div class="so">
                        <form action="">
                            <input type="text" name="" id="" class="inp" placeholder="请输入关键词.."><input type="submit" value="搜索" class="mit">
                        </form>
                    </div>
                </div>
            </div>

            <div class="nav">
                <ul>
                    <li><a href="/tb/index.php/Home/Index/Index">瑪致官网首页</a></li>
                    <li><a href="/tb/index.php/Home/About/Index">關於我們</a>
                       <!--  <ul id="pop">
                            <li><a href="">品牌概述</a></li>
                            <li><a href="">公司文化</a></li>
                            <li><a href="">发展历程</a></li>
                            <li><a href="">活动剪影</a></li>
                        </ul> -->
                    </li>
                    <li><a href="/tb/index.php/Home/Vip/Index">會員專區</a></li>
                    <li><a href="/tb/index.php/Home/News/Index">裝飾案例</a></li>
                    <li class="on"><a href="/tb/index.php/Home/Product/Index">產品展示</a></li>
                    <li><a href="/tb/index.php/Home/Join/Index">招商加盟</a></li>
                    <li><a href="/tb/index.php/Home/Contact/Index">联系方式</a></li>
                </ul>
            </div>

            


   <?php echo ($content); ?>


  <div class="bottom_x"></div>
    <div class="footer">
        <div class="wp">
            <div class="box">
                <div class="blogo l">
                    <img src="Public/Home/images/logo2.png" alt="">
                </div>
                <div class="a"><a href="">联系我们</a><span></span><a href="">站点地图</a><span></span><a href="">法律声明</a></div> 
                <div class="p">Copyright ©  2016 瑪緻裝飾建材(深圳)有限公司 All Rights Reserved.</div>               
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


    <script type="text/javascript">
            $(function () {
                var winH = $(window).height();
                var aboxH = $(".bottom_x").height();
                var bboxH = $(".footer").outerHeight();
                var cboxH = $(".header").outerHeight();
                var dboxH = $(".nav").outerHeight();
                var eboxH = $(".t2").outerHeight();
                $(".bg").css("height",winH - aboxH - bboxH + 'px');
                $(".main").css("height",winH - aboxH - bboxH - cboxH - dboxH - 55 + 'px');
                $(".a_scroll").css("height",winH - aboxH - bboxH - cboxH - dboxH - eboxH - 85 + 'px');
            })
    </script>

</body>
</html>