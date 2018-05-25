<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class UserController extends PublicController {
    /*
    用户注册
    */
    public function reg2Action(){
	$user=I('post.');
	//print_r($user);exit;

	if(!empty($user)){
     //校验验证码     
       $code=I('post.verify');
       $v=$this->check_verify($code);
       //echo $v;exit;
       if($v!=1){
        $this->error('验证码不正确',U('User/reg'),3);
       }
	
    // $user['password']=md5($user['password']);
    // $user['addtime']=date('Y-m-d',time());
    // $user['user_type_id']=1;
    if (!$this->model->create()){ 
    // 创建数据对象   // 如果创建失败 表示验证没有通过 输出错误提示信息       
    exit($this->model->getError());
}else{  // 验证通过 写入新增数据   
 	$id=$this->model->add();
     }
     //数据插入
    //$id=$this->model->add($user);
    //echo $this->model->getlastSql();die;
    //插入用户详细表的字段的数据；
    // $user2=D('user_detail');
    // $id2=$user2->add($user2);
    // //插入地址表的字段的数据；
    // $user3=D('adress');
    // $id3=$user3->add($user3);
    //判断插入是否成功；
   
    	if($id){
         //$this->redirect('User/res');
         $this->success('注册成功',U('index/index'),3);
         die;
    	}else{
    	 $this->error('注册失败',U('User/reg'),3);
    	 die;
    	}
	}
    $this->display('User:reg');
    //$this->getLayout();
    }
    /*
    用户登陆
    */
    public function login2Action(){
        $user=I('post.');
        if(!empty($user)){
        
        $user["password"]=md5($user["password"]); 

               //直接指定查询条件；
        $arr=$this->model->where($user)->find();
           //print_r($arr);exit;   
            //校验验证码     
        $code=I('post.verify');     
        $v=$this->check_verify($code);
        if($v!=1){
        $this->error('验证码不正确',U('User/login'),3);
        }
        //echo 11;exit;
          
            if($arr){
                session('user',$arr);  //设置session
        
            // echo 11;exit;
            $this->success('登陆成功',U('Index/index'));
            die;
            }else{
            $this->error('登陆失败',U('User/login'));
            die;
            } 
        }

        $this->assign('act',U('login'));
        $this->display('User:login');
    }
    /*
    用户退出
    */
    public function logoutAction(){
    session('user',null); // 删除session
    cookie(null);
 
    //$this->redirect('Index/index');
    $this->success('退出成功',U('Index/index'));
    }
	/*
    验证码
    */
    public function verifyAction(){
        
        $Verify = new \Think\Verify();
        
        $Verify->fontSize = 30;
        $Verify->length   = 4;
        //$Verify->useNoise = false;
        $Verify->entry();
    }
    /*
    登录
    */
    public function loginAction(){
        
        $username=I('post.username');
        $code=I('post.verify');//校验验证码
        $verify=$this->check_verify(strtolower($code));   
        if($username != ''){//外部判断，若为空则
          if(empty($username)) {
              $this->error('帐号错误！',U('User/login'));
            }
            elseif (empty($_POST['password'])){
              $this->error('密码必须！',U('User/login'));
            }elseif (empty($_POST['verify'])){
              $this->error('验证码必须！',U('User/login'));
            }elseif($verify!=1) {
              $this->error('验证码错误！',U('User/login'));
            }
            
            $user_data['username']= $username;
            // $user_data['email']= $username;
            // $user_data['tel']= $username;
            // $user_data['newid']= $username;
            $user_data['_logic']= 'OR';
            $username=D('User')->where($user_data)->select();
            //$user_check = $username[0]['newid'];
            $user_zt = $username[0]['zt'];

            if($user_zt != '0'){
              if(empty($username)){
                 $this->error('账号不存在或者被禁用!',U('User/login'));
                }else{
                if($username[0]['password']!=md5(md5($_POST['password']))){
                  //$this->error('账号密码错误!',U('User/login'));
                  echo '<script>alert("账号密码错误!");history.go(-1);</script>'; die; 
                }else{
                  //$user['newid']=$username[0]['newid'];
                  $user['username']=$username[0]['username'];
                  $user['uid']=$username[0]['uid'];
                  $user['password']=$username[0]['password'];
                  $user['login_time']=$username[0]['login_time']?$username[0]['login_time']:'';
                  Session('user',$user);
                  //添加新的登录信息
                  $data['times']=$username[0]['times']+1;//登录次数
                  $data['login_time']=time();//登录时间
                  D('User')->where($user_data)->save($data);
                  $this->redirect('Index/index');die;
                  //$this->success('登录成功！',U('Index/index'));die;
                }
              }
            }else{
            $this->error('用户信息不存在！',U('User/login'));
            }
        }else{
           
            $this->display('User:login');
        }    
    }
    /*
    注册
    */
	public function regAction(){

        $user=I('post.');

        if((!empty($user['username']))&&(!empty($user['password'])))
        {   
            if($user['password'] != $user['password2']){
                echo '<script>alert("两次密码输入不一致!");history.go(-1);</script>';  
                die;
            }        
            $user['password']=md5(md5($user['password']));
            $user['login_time']=time();
            $user['add_time']=time();
            $user['times']=1;
            $user['type_id']=1;    //账户级别
            $res=D('User')->add($user);//添加主表

            $user2['realname']=$user['realname'];
            $user2['phone']=$user['phone'];
            $user2['address']=$user['address'];
            $user2['user_id']=$user['uid'];

            $res2=D('user_info')->add($user2);//添加副表


            //判断插入是否成功；   
            if($res != false && $res2 != false){
             $data['uid'] = $user['uid'];
             $data['username'] = $user['username'];
             $data['login_time'] = $user['login_time'];
             session('user',$data);
             $this->success('注册成功',U('Index/index'));
             die;
            }else{
             echo '<script>alert("注册失败!");history.go(-1);</script>';  
             die;
            } 
        }
            
        $this->display('User:reg');
    }
	
}