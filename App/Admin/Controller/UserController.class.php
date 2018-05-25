<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
use Think\Controller;
class UserController extends PublicController {
  
	/*
    后台管理员退出
	*/
	public function logoutAction(){
    //session('user',null); // 删除session
    //$this->redirect('login/index');
    session('[destroy]');
    $this->success('退出成功',U('login/index'));    
    //print_r($_SESSION);exit;  
	}
    /*
    管理员列表
    */
	public function IndexAction(){   
   
    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
     
    $count=$this->model->table('tp_user u')   
                       ->field('u.*,r.id')
                       ->Join('tp_auth_group r on u.role_id = r.id')
                       ->count();
    $this->page_01($count,10);
    $arr=$this->model->table('tp_user u')   
                     ->field('u.*,r.id,r.title')
                     ->Join('tp_auth_group r on u.role_id = r.id')
                     ->limit($this->firstRow2.','.$this->listRows2)
                     ->select();
    foreach ($arr as $key => $value) {
        $arr[$key]['login_ip']=$arr[$key]['login_ip']?$arr[$key]['login_ip']:'暂无';
        $arr[$key]['add_time']=date('Y-m-d',$arr[$key]['add_time']);
        $arr[$key]['login_time']=$arr[$key]['login_time']?date('Y-m-d h:i:s',$arr[$key]['login_time']):'暂无';
    } 
    //print_r($arr);exit;	                              
    $this->assign('arr',$arr);
    $this->assign('Page',$this->show);
    $this->getView($view);
       
    }
	/*
    管理员添加
    */
	public function addAction(){   
    $view = CONTROLLER_NAME;
        if(IS_POST){ 

            $arr=I('post.');
            $arr['add_time']=time();
            if(isset($arr['password'])){
            	$arr['password']=md5(md5($arr['password']));
            }
            if(!empty($_FILES['image']['name'])){//图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $arr['image']=$this->file;
                   if(!empty($arr['thub'])) {
                    switch ($arr['thub']) {//生成缩略图
                            case 1:
                                $this->thumb($this->info,1000,500);//获取缩略图路径
                                $arr['thumb']=$this->thumb_path2;
                                $arr['thumb']=substr($arr['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                            case 2:
                                $this->thumb($this->info,400,200);//获取缩略图路径
                                $arr['thumb']=$this->thumb_path2;
                                $arr['thumb']=substr($arr['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                        }
                    }             
                }
            //print_r($arr);exit;
            $res = $this->model->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
        $abb = M('auth_rule')->select();
        $this->assign('abb',$abb);
        $this->assign('act',U( "add" ));
        $this->getView($view.'/edit');

	}
	/*
    管理员修改
    */
	public function editAction(){   
        $view = CONTROLLER_NAME;
        if(IS_GET){ 
            $id=I('get.uid');
            //$cc=M('Category');
            $arr = $this->model->where(array('uid'=>$id))->find();
            $abb = M('auth_rule')->select();
            //print_r($arr);exit;
            $this->assign('arr',$arr);
            $this->assign('abb',$abb);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.'); 
            if(!empty($data['password'])){
            	$data['password']=md5(md5($data['password']));
            }
            $data=array_filter($data); //过滤数组中的空字符元素
            if(!empty($_FILES['image']['name'])){//新图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $data['image']=$this->file;
                   if(!empty($data['thub'])) {
                    switch ($data['thub']) {//生成缩略图
                            case 1:
                                $this->thumb($this->info,500,500);//获取缩略图路径
                                $data['thumb']=$this->thumb_path2;
                                $data['thumb']=substr($data['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                            case 2:
                                $this->thumb($this->info,200,200);//获取缩略图路径
                                $data['thumb']=$this->thumb_path2;
                                $data['thumb']=substr($data['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                        }
                       if (!empty($data['thumb2'])) {
                        @unlink($data['thumb2']);//删除修改前的缩略图
                        }  
                   }
                if (!empty($data['image2'])) {
                      @unlink($data['image2']);//删除修改前的图
                }                  
            } 
            //print_r($data);exit;
            $res=$this->model->where(array('uid'=>$data['uid']))->save($data); // 根据条件更新记录
            if( $res != false){
                $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        }
	}
	/*
    管理员删除
    */
	public function deleteAction(){   
        if(IS_GET){
        $id=I('get.uid');
        $res = $this->model->where('uid='.$id)->delete(); // 删除用户数据
        if($res = true){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
	}
}