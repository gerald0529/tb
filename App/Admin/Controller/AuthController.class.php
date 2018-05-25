<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class AuthController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
     
    $role = M('Auth_rule');
    $count=$role->count();
    $this->page_01($count,20);
    //$arr=$role->limit($this->firstRow2.','.$this->listRows2)->select();
    $arr = authlist(0,$this->firstRow2.','.$this->listRows2,'Auth_rule');
    foreach ($arr as $key => $value) 
    {
        if($value['status'] == 1)
        {
            $arr[$key]['status'] = '启用' ;
        } else{
            $arr[$key]['status'] = '禁用' ;
        }  
        if($value['is_show'] == 1)
        {
            $arr[$key]['is_show'] = '显示' ;
        } else{
            $arr[$key]['is_show'] = '隐藏' ;
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
    $role = M('Auth_rule');
        if(IS_POST){ 

            $arr=I('post.');
            
            $res = $role->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
        
        $abb = authlist(0,100,'Auth_rule');
        $this->assign('abb',$abb);
        $this->assign('act',U( "add" ));
        $this->getView($view.'/edit');
    
     }
     
     /*
     商品修改
     */
     public function editAction(){
     $view = CONTROLLER_NAME;
     
     $role = M('Auth_rule');
        if(IS_GET){ 
            $id=I('get.id');
            $arr = $role->where(array('id'=>$id))->find();

            $abb = authlist(0,100,'Auth_rule');    
            $this->assign('abb',$abb);
            $this->assign('arr',$arr);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
           
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.'); 

            $res=$role->where(array('id'=>$data['id']))->save($data); // 根据条件更新记录
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
      $res=M('Auth_rule')->where('id='.$id)->delete(); // 删除用户数据
      if($res>0){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}