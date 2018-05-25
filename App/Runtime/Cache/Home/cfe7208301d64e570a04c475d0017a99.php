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


<body >
    <div class="bg" 
    <?php if(CONTROLLER_NAME == 'Index'): ?>style="background-image:url(Public/Home/images/home_bg.jpg)"<?php endif; ?>>
        <div class="wp">
            <div class="header c">
                <div class="logo l"><a href=""><img src="Public/Home/images/logo.png" alt=""></a></div>
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
                        <div class="t1">產品展示 <small>/ product</small></div>
                        <div class="pa">
                            <ul class="subnav">
                                <?php if(is_array($infoclass)): foreach($infoclass as $key=>$vo): ?><li <?php if($vo['index'] == 'on'): ?>class="on"<?php endif; ?>>
                             <a href="/tb/index.php/Home/Product/index/cid/<?php echo ($vo["cid"]); ?>"  ><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
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
                        <div class="t2"><h3><?php echo ($arr["title"]); ?></h3><p>您现在的位置：
                        <a href="/tb/index.php/Home/Product/index"><?php echo ($arr["pid_name"]); ?></a> > 
                        <a href="/tb/index.php/Home/Product/index/cid/<?php echo ($arr["cid"]); ?>"><?php echo ($arr["name"]); ?></a> > 
                        <span><?php echo ($arr["title"]); ?></span></p>
                        </div>
                        <div class="a_scroll">
                            <div class="pro_pic c rel">
                                <a href="javascript:;" class="abs prev"></a>
                                <a href="javascript:;" class="abs next"></a>
                                <div class="pic rel">
                                    <ul>
                                        <li>
                                        <div class="rel">
                                        <img src="http://localhost:80/tb/<?php echo ($arr["image"]); ?>" alt="<?php echo ($arr["title"]); ?>">
                                        </div>
                                        </li>
                                    </ul>
                                   <!--  <div class="m abs"><img src="Public/Home/images/m.jpg" alt=""></div> -->
                                </div>
                                <div class="bd">
                                    <ul>
                                        <li><div class="rel"><img src="Public/Home/images/1.jpg" alt="" sid="images/1.jpg"></div></li>
                                        <li><div class="rel"><img src="Public/Home/images/2.jpg" alt="" sid="images/2.jpg"></div></li>
                                        <li><div class="rel"><img src="Public/Home/images/3.jpg" alt="" sid="images/3.jpg"></div></li>
                                        <li><div class="rel"><img src="Public/Home/images/4.jpg" alt="" sid="images/4.jpg"></div></li>
                                        <li><div class="rel"><img src="Public/Home/images/5.jpg" alt="" sid="images/5.jpg"></div></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro_con">
                                    <?php echo ($arr["body"]); ?>
                            </div>
                            <div class="pro_go">
                                <a href="<?php echo U('Contact/feedback');?>" class="inlineb">在线留言/在线咨询</a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.SuperSlide.js" type=text/javascript></script>
    <script type="text/javascript">
            jQuery(".pro_pic").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"topLoop",vis:3});
    </script>
    <style type="text/css">
            .main {background-image: url(Public/Home/images/left_bg2.png)}
    </style>
   <style type="text/css">
            .main {overflow: hidden;}
    </style>
    <script type="text/javascript">
            $(function () {
                var winH = $(window).height();
                var aboxH = $(".bottom_x").height();
                var bboxH = $(".footer").outerHeight();
                var cboxH = $(".header").outerHeight();
                var dboxH = $(".nav").outerHeight();
                var eboxH = $(".t2").outerHeight();
                //$(".bg").css("height",winH - aboxH - bboxH + 'px');
                //$(".main").css("height",winH - aboxH - bboxH - cboxH - dboxH - 55 + 'px');
                //$(".a_scroll").css("height",winH - aboxH - bboxH - cboxH - dboxH - eboxH - 85 + 'px');
            })
            $(function () {
                $(".pro_pic .bd ul li").hover(function() {
                    var simg = $(this).find("img").attr("sid");
                    $(".pro_pic .pic ul li img").attr("src",simg);

                })                
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