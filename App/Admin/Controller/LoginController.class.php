<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
use Think\Controller;
class LoginController extends Controller {
	//后台管理员登陆；	
	public function _empty(){
     echo '无此操作';
    }
    /*
    后台登录
    */
    public function indexAction(){
    	if(IS_POST){
            //$username=I('username','',false);

            if(!I('username','',false)){
            	$this->error('登录帐号不能为空！',U('Login/index'));
            }elseif(!I('password','',false)){
            	$this->error('登录密码不能为空！',U('Login/index'));
            }

            $post["username"]=I('username','',false);
	        $post["password"]=I('password','',false); 
            $post["password"]=md5(md5($post["password"]));
	        $admin = D('User');//实例化Admin对象；
	        $arr=$admin->where($post)->find();
	        if(!empty($arr)){

	        	$code=I('post.verify');//校验验证码
		        $verify=check_verify(strtolower($code));
		        if($verify!=1) {
		              //$this->error('验证码错误！',U('login/login'));exit;
		        	  header("Content-Type:text/html; charset=utf-8");
		              echo '<script>alert("验证码错误!");history.go(-1);</script>';die;
		            }
			    $arr['login_time']=time();
			    $arr['login_ip'] = get_client_ip();
				$arr['times']=++$arr['times'];
				//print_r($arr);exit;
				$res2=$admin->where(array('uid'=>$arr['uid']))->save($arr);
				if($res2 == false){
		            $this->error('登陆失败2');
				}

		        session('uid',$arr['uid']); //设置session
		        session('admin',$arr['username']);  
			    $this->success('登陆成功',U('User/index'));
			  
			}else{
			    $this->error('不存在此用户',U('Login/index'));
			}
    	}else{
             $this->display('User/login');
    	}
    }
    /*
    验证码
    */
    public function verifyAction(){
        
        $Verify = new \Think\Verify();
        
        $Verify->fontSize = 50;
        $Verify->length   = 4;
        $Verify->expire   =60;//验证码的有效期(秒);
        $Verify->useCurve = false;//混淆线
        $Verify->entry();
        $Verify->useImgBg = true;
    }
}