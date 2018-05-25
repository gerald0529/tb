<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class ConfigController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
     
    $arr=$this->model->select();
    
                  
    //print_r($arr);exit;                                 
    $this->assign('arr',$arr);
    $this->getView($view);
	}
   
   /*
   商品添加
   */
    public function addAction(){
    $view = CONTROLLER_NAME;
        if(IS_POST){ 

            $arr=I('post.');
            
            if(!empty($_FILES['body']['name'])){//图片上传;
                   $this->uploadone($_FILES['body'],$view.'/');
                   $arr['body']=$this->file;
                             
                }
            //print_r($arr);exit;
            
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
            $arr = $this->model->where(array('id'=>$id))->find();
            
            //print_r($abb);exit;
            $this->assign('arr',$arr);
            
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.'); 

            if(!empty($_FILES['body']['name'])){//新图片上传;
                   $this->uploadone($_FILES['body'],$view.'/');
                   $data['body']=$this->file;                 
            } 

            if($data['config_type'] == 3){
                $data['body'] = htmlspecialchars_decode($data['body']);
            }
            
            $data=array_filter($data); //过滤数组中的空字符元素
            //print_r($data);exit;
            $res=$this->model->where(array('id'=>$data['id']))->save($data); // 根据条件更新记录
            if( $res != false){
                $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        }
     }
     
     /*
     删除
     */
     
     public function delAction(){

     if(IS_GET){
      $id=I('get.id');
      $res=$this->model->where('id='.$id)->delete(); // 删除用户数据
      if($res>0){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
    
     
     
}