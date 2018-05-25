<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class MemberController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    $user=M('User');
    $count=$user->table('tp_user u')   
                ->field('u.*,t.id')
                ->Join('tp_user_type t on u.type_id = t.id')
                ->count();
    $this->page_01($count,10);
    $arr=$this->model->table('tp_user u')   
                     ->field('u.*,t.id,t.level_name')
                     ->Join('tp_user_type t on u.type_id = t.id')
                     ->limit($this->firstRow2.','.$this->listRows2)
                     ->select(); 
    foreach ($arr as $key => $value) {
        $arr[$key]['add_time']=date('Y-m-d',$arr[$key]['add_time']);
        $arr[$key]['login_time']=$arr[$key]['login_time']?date('Y-m-d h:i:s',$arr[$key]['login_time']):'暂无';
    }          
   
    //print_r($arr);exit;
    $this->assign('arr',$arr);
    $this->assign('Page',$this->show);
	$this->getView($view);
	}
   
   /*
   商品添加
   */
    public function addAction(){
        $view = CONTROLLER_NAME;
        $user=M('User');
        if(IS_POST){ 

            $arr=I('post.');
            $arr['add_time']=time();
            if(isset($arr['password'])){
                $arr['password']=md5(md5($arr['password']));
            }
            
            //print_r($arr);exit;
            $res = $user->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
        $abb = M('user_type')->select();
        $this->assign('abb',$abb);
        $this->assign('act',U( "add" ));
        $this->getView($view.'/edit');
    
     }
     
     /*
     商品修改
     */
     public function editAction(){
      $view = CONTROLLER_NAME;
      $user=M('User');
        if(IS_GET){ 
            $id=I('get.uid');
            
            $arr = $user->where(array('uid'=>$id))->find();
            $abb = M('user_type')->select();
            //print_r($abb);exit;
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
            
            //print_r($data);exit;
            $res=$user->where(array('uid'=>$data['uid']))->save($data); // 根据条件更新记录
            if( $res != false){
                $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        }
     }
     
     /*
     商品删除
     */
     public function deleteAction(){
     $id=I('get.uid');

     if(!empty($id)){
      $res=M('User')->where('uid='.$id)->delete(); // 删除用户数据
      if($res != false){
                $this->success('删除成功',U('index'));exit;  
            }else{
                $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}