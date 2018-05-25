<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>tianba</title>
    <base href="http://192.168.1.102:80/tb/"/>
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
                <div class="logo l"><a href=""><img src="http://192.168.1.102:80/tb/<?php echo ($cfg["cfg_logo"]); ?>" alt=""></a></div>
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
                        <div class="t1">热点新闻 <small>/ news</small></div>
                        <div class="pa">
                            <ul class="subnav">
                            <?php if(is_array($infoclass)): foreach($infoclass as $key=>$vo): ?><!--<li class="on"><a href="">CDR下载</a></li>-->
                                 <li <?php if($vo['index'] == 'on'): ?>class="on"<?php endif; ?>>
                                 <a href="/tb/index.php/Home/News/index/cid/<?php echo ($vo["cid"]); ?>"  ><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
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
                        <div class="t2"><h3>热点新闻</h3></div>
                        <div class="a_scroll">
                            <dl class="down_list">
                            <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><dt><div class="rel" style="margin-bottom: 30px;">
                                <a href="/tb/index.php/Home/News/info/id/<?php echo ($vo["id"]); ?>">
                                <img src="<?php echo ($vo["thumb"]); ?>" style="height:110px;" alt="暂无图片" onError="this.src='Public/Home//images/wutu_dzz.jpg'" >
                                </a>
                                </div></dt>
                                <dd>
                                    <div class="t"><a href="/tb/index.php/Home/News/info/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></div>
                                    <div class="data">发布时间：<?php echo ($vo["add_time"]); ?></div>
                                    <div class="p"><?php echo ($vo["description"]); ?></div>
                                    <div class="more"><a href="/tb/index.php/Home/News/info/id/<?php echo ($vo["id"]); ?>">查看内容详情……</a></div>
                                </dd><?php endforeach; endif; ?>
                                <!-- <dt><div class="rel"><img src="images/3.jpg" alt=""></div></dt>
                                <dd>
                                    <div class="t"><a href="">多种好看的装饰方案CDR格式下载</a></div>    
                                    <div class="data">发布时间：2013-12-28</div>
                                    <div class="p">近日，国内知名装饰品牌玛致建材发布全新品牌战略，定义新品牌精神“东方西式美”，同时，亮相2016春夏广告大片。多种好看的装饰方案上阵引起了社会各界的广泛关注...</div>
                                    <div class="more"><a href="">点击下载文件</a></div>
                                </dd> -->
                                
                            </dl>
                             <div class="page"><?php echo ($Page); ?></div>
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
                $(".bg").css("height",'100%');
                $(".main").css("height",'500px');
                $(".a_scroll").css("height",'400px');

                $(".page .current").attr("class", "num current"); //改成BBB
                $(".page .number").attr("class", "num"); 
            })
    </script>
    

<div class="bottom_x"></div>
    <div class="footer">
        <div class="wp">
            <div class="box">
                <div class="blogo l">
                    <img src="http://192.168.1.102:80/tb/<?php echo ($cfg["cfg_logo_bottom"]); ?>" alt="">
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