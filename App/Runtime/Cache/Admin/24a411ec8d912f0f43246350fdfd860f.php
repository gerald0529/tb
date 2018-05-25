<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost/tb/"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simpla Admin by www.865171.cn</title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="Public/Admin//resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="Public/Admin//resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="Public/Admin//resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="Public/Admin//resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="Public/Admin//resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="Public/Admin//resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="Public/Admin//resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="Public/Admin//resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="Public/Admin//resources/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="javascript:;">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href=""><img id="logo" src="Public/Admin//resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> Hello, <a href="#" title="Edit your profile"><?php echo ($_SESSION["user"]); ?></a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
        <br />
        <a href="#" title="View the Site">查看前台站</a> | <a href="<?php echo U('User/logout');?>" title="Sign Out">退出</a> </div>

      
      <ul id="main-nav">
        
        <li> <a href="javascript:;" class="nav-top-item no-submenu">管理员中心 </a> 
          <ul>
            <li><a  href="<?php echo U('User/Index');?>">管理员列表</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">权限等级管理</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">权限管理</a></li>        
          </ul>
        </li>
        <li> <a href="javascript:;" class="nav-top-item current"> 栏目列表</a> 
          <ul>
            <li><a  href="<?php echo U('About/Index');?>">关于我们</a></li>
            <li><a  href="<?php echo U('Video/Index');?>">视频专区</a></li>
            <li><a class="current" href="<?php echo U('News/Index');?>">新闻列表</a></li>
            <li><a  href="<?php echo U('Product/Index');?>">产品中心</a></li>
            <li><a  href="<?php echo U('Join/Index');?>">招商概述</a></li>
            <li><a  href="<?php echo U('Contact/Index');?>">联系我们</a></li>
          </ul>
        </li>
        <li> <a href="javascript:;" class="nav-top-item no-submenu">其他管理 </a> 
          <ul>
            <li><a  href="<?php echo U('Category/Index');?>">栏目管理</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">碎片管理</a></li>
            <li><a  href="<?php echo U('Feedback/Index');?>">留言管理</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">附件列表</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">操作日志记录</a></li>
          </ul>
        </li>
        
        
        <li> <a href="javascript:;" class="nav-top-item no-submenu">会员管理 </a> 
          <ul>
            <li><a  href="<?php echo U('Member/Index');?>">会员列表</a></li>
            <li><a  href="<?php echo U('Level/Index');?>">会员等级</a></li>
            <li><a  href="<?php echo U('Comment/Index');?>">会员评论列表</a></li>
          </ul>
        </li>
        <li> <a href="javascript:;" class="nav-top-item no-submenu">广告管理 </a> 
          <ul>
            <li><a  href="<?php echo U('Ad/Index');?>">广告列表</a></li>
            <li><a  href="<?php echo U('Position/Index');?>">广告位置</a></li>
          </ul>
        </li>
        <li> <a href="javascript:;" class="nav-top-item no-submenu">友情链接管理 </a> 
          <ul>  
            <li><a  href="<?php echo U('Links/Index');?>">友情链接列表</a></li>
          </ul>
        </li>
        <!--<li> <a href="javascript:;" class="nav-top-item no-submenu"> 产品中心 </a>       
          <ul>
            <li><a  href="<?php echo U('Product/Index');?>">商品列表</a></li>
            <li><a  href="/tb/index.php/Admin/Video/add">商品添加</a></li>
          </ul>
        </li>
         <li> <a href="javascript:;" class="nav-top-item no-submenu">关于我们 </a> 
          <ul> 
            <li><a  href="<?php echo U('About/Index');?>">品牌概述</a></li> 
            <li><a  href="/tb/index.php/Admin/Video/index">公司文化</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">发展历程</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">活动剪影</a></li>
          </ul>
        </li>
        <li> <a href="javascript:;" class="nav-top-item no-submenu">联系我们 </a> 
          <ul>  
            <li><a  href="<?php echo U('Contact/Index');?>">联系方式</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">在线留言</a></li>
          </ul>
        </li>
        <li> <a href="javascript:; " class="nav-top-item no-submenu">招商加盟 </a> 
          <ul>  
            <li><a  href="<?php echo U('Join/Index');?>">招商概述</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">招商有求</a></li>
            <li><a  href="/tb/index.php/Admin/Video/index">招商区域</a></li>
          </ul>
        </li> -->

      </ul>
      <!-- End #main-nav -->
      

      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
        <h3>3 Messages</h3>
        <p> <strong>17th May 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>25th April 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <form action="#" method="post">
          <h4>New Message</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">Send to...</option>
            <option value="option2">Everyone</option>
            <option value="option3">Admin</option>
            <option value="option4">Jane Doe</option>
          </select>
          <input class="button" type="submit" value="Send" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->

  <div id="main-content">
    <!-- Main Content Section with everything -->
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
        Download From <a href="http://www.exet.tk">exet.tk</a></div>
    </div>
    </noscript>
    <!-- Page Head -->
    <h2>Welcome www.865171.cn</h2>
    <p id="page-intro">What would you like to do?</p>
    <ul class="shortcut-buttons-set">
      <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/pencil_48.png" alt="icon" /><br />
        添加</span></a></li>
      <li><a class="shortcut-button" href="<?php echo U('add');?>"><span> <img src="Public/Admin//resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
        Create a New Page </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/image_add_48.png" alt="icon" /><br />
        Upload an Image </span></a></li>
      <li><a class="shortcut-button" href="#"><span> <img src="Public/Admin//resources/images/icons/clock_48.png" alt="icon" /><br />
        Add an Event </span></a></li>
      <li><a class="shortcut-button" href="#messages" rel="modal"><span> <img src="Public/Admin//resources/images/icons/comment_48.png" alt="icon" /><br />
        Open Modal </span></a></li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    <div class="clear"></div>
    <!-- End .clear -->
    <script type="text/javascript" >   
$(function(){
  //全选
   $("#all").click(function(){
      $(".tt").attr('checked',true);
     })
   
//反选
   $("#some").click(function(){
      var chebox=$(".tt");
     for(var i=0;i<chebox.length;i++){
        if(chebox.eq(i).is(':checked')){
           chebox.eq(i).attr('checked',false);
        }else{
            chebox.eq(i).attr('checked',true);
        }
      }
     })
   
//全不选
   $("#none").click(function(){     
      $(".tt").attr('checked',false);
     })

//多数据删除
   $(".button").click(function(){     
      var checked =[];
      $("input:checkbox:checked").each(function(){
        checked.push($(this).val());
      });
      var vall=$("input:checkbox:checked").parent().parent();           
      //把数组转化为字符串
      var id=checked.toString();     
      //alert(id);
      var url='/tb/index.php/Admin/Video/del';
      $.ajax({
           type:'post',
           url:url,
           data:{
                'id':id
           },
           //dataType:"json",
           success:function(json){
             //alert(json);
             if(json=='ok'){
              //循环输出删除；         
              vall.remove();            
             }else{
              alert(json);
             }
           }
       })
      //return false; 
     })
   })
    </script>