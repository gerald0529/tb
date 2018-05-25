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


<body index="CONTROLLER_NAME">
    <div class="bg" 
    <?php if(CONTROLLER_NAME == Index): ?>style="background-image:url(Public/Home/images/home_bg.jpg)"<?php endif; ?>>
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
                        <?php if($_SESSION['user']['username'] != null): ?><span>欢迎你，
                        <a href=""><font color="orange">[<?php echo ($_SESSION["user"]["username"]); ?>]</a></font>
                        <a href="<?php echo U('User/logout');?>"><font color="orange">[退出]</font></a></span> 
                        <?php else: ?>
                        <span><a href="/tb/index.php/Home/User/login">登錄</a><i>|</i>
                        <a href="/tb/index.php/Home/User/reg">註冊</a></span><?php endif; ?>
                    </div>
                    <div class="so">
                        <form action="">
                            <input type="text" name="" id="" class="inp" placeholder="请输入关键词.."><input type="submit" value="搜索" class="mit">
                        </form>
                    </div>
                </div>
            </div>
            <?php if(CONTROLLER_NAME != Index): ?><div class="nav">
                <ul>
                    <li><a href="/tb/index.php/Home/Index/Index">瑪致官网首页</a></li>
                    <li><a href="/tb/index.php/Home/About/Index">关于我們</a>
                       <!--  <ul id="pop">
                            <li><a href="">品牌概述</a></li>
                            <li><a href="">公司文化</a></li>
                            <li><a href="">发展历程</a></li>
                            <li><a href="">活动剪影</a></li>
                        </ul> -->
                    </li>
                    <li><a href="/tb/index.php/Home/Video/Index">视频专区</a></li>
                    <li><a href="/tb/index.php/Home/News/Index">宅新闻</a></li>
                    <li class="on"><a href="/tb/index.php/Home/Product/Index">產品展示</a></li>
                    <li><a href="/tb/index.php/Home/Join/Index">招商加盟</a></li>
                    <li><a href="/tb/index.php/Home/Contact/Index">联系方式</a></li>
                </ul>
            </div><?php endif; ?>



            <div class="main">
                <div class="login_box">
                    <div class="tit">
                        <h3>會員專區</h3>
                        <p>歡迎加入瑪緻網站會員，請填妥以下會員申請表單並送出資料。（*號表示必填欄位）</p>
                    </div>
                    <div class="reg_line text-center">
                        <img src="images/stop_line1.png" alt="">
                    </div>
                    <div class="reg_line2">
                        <form action="<?php echo U('User/reg');?>" method="post">
                        <ul class="nn">
                            <li><div class="name">賬號設定</div><div class="inp">
                            <input type="text" name="username" id="" class="inp"></div>
                            <div class="tips">賬號請使用英文或者數字組成</div></li>
                            <li><div class="name">密碼設定</div><div class="inp">
                            <input type="password" name="password" id="" class="inp"></div><div class="tips">*</div></li>
                            <li><div class="name">密碼確認</div><div class="inp">
                            <input type="password" name="password2" id="" class="inp"></div><div class="tips">*</div></li>
                        </ul>
                        <ul style="display:none" class="mm">
                            <li><div class="name">真实姓名</div><div class="inp">
                            <input type="text" name="realname" id="" class="inp"></div>
                            <div class="tips">賬號請使用英文或者數字組成</div></li>
                            <li><div class="name">手机号码</div><div class="inp">
                            <input type="text" name="phone" id="" class="inp"></div>
                            <div class="tips">*</div></li>
                            <li><div class="name">电子邮箱</div><div class="inp">
                            <input type="text" name="email" id="" class="inp"></div>
                            <div class="tips">*</div></li>
                            <li><div class="name">地　　址</div><div class="inp">
                            <input type="text" name="address" id="" class="inp"></div>
                            <div class="tips">*</div></li>
                        </ul>
                        <div class="go text-center">
                            <a href="javascript:;" class="preva" sid="Public/Home/images/stop_line1.png"><span>< 上一步</span></a>
                            <a href="javascript:;" class="nexta" sid="Public/Home/images/stop_line2.png"><span>下一步 ></span></a>
                            <input type="submit" value="提交" class="mit">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
            .main {background: none;margin: 0}
            .login_box .tit {padding-top: 100px;}
    </style>

    <script type="text/javascript">
            $(function () {
                $(".reg_line2 .go a.nexta").click(function() {
                    $(this).hide();
                    $(this).siblings().show();
                    var a = $(this).attr("sid");
                    $(".reg_line img").attr("src",a);
                    $(".nn").css("display",'none');
                    $(".mm").css("display",'');
                });
                $(".reg_line2 .go a.preva").click(function() {
                    $(this).hide();
                    $(this).siblings(".mit").hide();
                    $(this).siblings(".nexta").show();
                    var a = $(this).attr("sid");
                    $(".reg_line img").attr("src",a);
                    $(".mm").css("display",'none');
                    $(".nn").css("display",'');
                });
            })
    </script>

    <script type="text/javascript">
            $(function () {
                var winH = $(window).height();
                var aboxH = $(".bottom_x").height();
                var bboxH = $(".footer").outerHeight();
                var cboxH = $(".header").outerHeight();
                var dboxH = $(".nav").outerHeight();
                var eboxH = $(".t2").outerHeight();
                //$(".bg").css("height",winH - aboxH - bboxH + 'px');
                //$(".main").css("height",winH - aboxH - bboxH - cboxH - dboxH - 15 + 'px');
                $(".bg").css("height",'120%');
                $(".main").css("height",'600px');
            })
    </script>
    

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


</body>
</html>