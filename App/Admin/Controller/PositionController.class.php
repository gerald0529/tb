<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class PositionController extends PublicController{
    /*
    广告位置管理
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    $count=$this->model->count();
    $this->page_01($count,20);
    $arr=$this->model->limit($this->firstRow2.','.$this->listRows2)->select();
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
            
            $res = $this->model->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
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
            $arr = $this->model->where(array('psid'=>$id))->find();

            $this->assign('arr',$arr);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.'); 
            
            $data=array_filter($data); //过滤数组中的空字符元素
            //print_r($data);exit;
            $res=$this->model->where(array('psid'=>$data['psid']))->save($data); // 根据条件更新记录
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
     public function delAction(){
     

     if(IS_GET){
      $id=I('get.id');
      $res=$this->model->where('psid='.$id)->delete(); // 删除用户数据
      if($res>0){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}