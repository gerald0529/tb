<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://192.168.1.102:80/tb/"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simpla Admin | Sign In by www.865171.cn</title>
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
</head>

<body id="login">
<div id="login-wrapper" class="png_bg">
  <div id="login-top">
    <h1>Simpla Admin</h1>
    <!-- Logo (221px width) -->
    <a href="http://www.865171.cn"><img id="logo" src="Public/Admin//resources/images/logo.png" alt="Simpla Admin logo" /></a> </div>
  <!-- End #logn-top -->
  <div id="login-content">
    <form action="/tb/index.php/admin/login/index" method="post">
      <!-- <div class="notification information png_bg">
        <div> Just click "Sign In". No password needed. </div>
      </div> -->
      <p>
        <label style="line-height: 30px;font-size:17px">用户名</label>
        <input class="text-input" type="text" name="username"/>
      </p>
      <div class="clear"></div>
      <p>
        <label style="line-height: 30px;font-size:17px">密码</label>
        <input class="text-input" type="password" name="password"/>
      </p>
      <div class="clear"></div>
      <p>
        <label style="line-height: 30px;font-size:17px">验证码</label>
        <input class="text-input" type="text" name="verify" />
      </p>
      <p>
        <label style="line-height: 30px;width:150px;">可点击图片换一张：</label>
        <img  src="/tb/index.php/Admin/Login/verify" width="149" height="29"
                                            onclick="this.src+='#'"/>
      </p>
      <div class="clear"></div>
      <p id="remember-password">
        <input type="checkbox" />
        Remember me </p>
      <div class="clear"></div>
      <p>
        <input class="button" type="submit" value="Sign In" />
      </p>
    </form>
  </div>
  <!-- End #login-content -->
</div>
<!-- End #login-wrapper -->
</body>
</html>