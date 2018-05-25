<?php 
namespace Common\Controller;
//访问TP框架controller;
use Think\Controller;
use Think\Auth;
class AuthController extends Controller { 
	  public function _initialize(){

	  $auth = new Auth();
	  if(!$auth -> check()){
	   $this->error('没有权限',U('login/index'));
	  }

	  }

}



?>