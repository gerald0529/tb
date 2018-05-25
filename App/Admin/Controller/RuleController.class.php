<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class RuleController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    $role = M('auth_group');
    $count=$role->count();
    $this->page_01($count,5);
    $arr=$role->limit($this->firstRow2.','.$this->listRows2)->select();
    foreach($arr as $key => $value)
    {
        if($value['status'] == 1){
            $arr[$key]['status'] = '启用';
        }else{
            $arr[$key]['status'] = '禁用';
        }
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
        if(IS_POST){ 

            $arr=I('post.');     
            //print_r($arr);exit;
            $arr['user_uid']=$_SESSION['uid'];
            $arr['rules'] = implode(',',$arr['rules']);
            $res = M('auth_group')->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
        $abb = rulelist(0,100,'Auth_rule');
        $this->assign('abb',$abb);
        $this->assign('act',U( "add" ));
        $this->getView($view.'/edit');
    
     }
     
     /*
     商品修改
     */
     public function editAction(){
     $view = CONTROLLER_NAME;
        if(IS_GET){ 
            $id=I('get.id');
            $arr = M('auth_group')->where(array('id'=>$id))->find();
            //$arr['rules'] = explode(',',$arr['rules']);
            
            $abb = rulelist(0,100,'Auth_rule');
            
            $this->assign('arr',$arr);
            $this->assign('abb',$abb);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.');        
            $data['rules'] = implode(',',$data['rules']);
            $data=array_filter($data); //过滤数组中的空字符元素
            //print_r($data);exit;
            $res=M('auth_group')->where(array('id'=>$data['id']))->save($data); // 根据条件更新记录
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
     

     if(IS_GET){
      $id=I('get.id');
      $res=M('auth_group')->where('id='.$id)->delete(); // 删除用户数据
      if($res>0){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}