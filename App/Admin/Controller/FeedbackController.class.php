<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class FeedbackController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    
    $count=$this->model->count();
    $this->page_01($count,10);
    $arr=$this->model->limit($this->firstRow2.','.$this->listRows2)->select();
    foreach ($arr as $key => $value) {
        $arr[$key]['addtime']=date('Y-m-d',$arr[$key]['addtime']);
        
    }   
    //print_r($arr);exit;             
                    
    $this->assign('arr',$arr);
    $this->assign('Page',$this->show);
    $this->getView($view);
	}
   
   
     
     /*
     商品修改
     */
     public function editAction(){
      $view = CONTROLLER_NAME;
        if(IS_GET){ 
            $id=I('get.id');
            
            $arr = $this->model->where(array('fid'=>$id))->find();
            $arr['addtime'] = date('Y-m-d h:s:i',$arr['addtime']);

            //print_r($abb);exit;
            $this->assign('arr',$arr);

            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        
     }
     
     /*
     商品删除
     */
     public function deleteAction(){
     $id=I('get.id');

     if(!empty($id)){
      $res=$this->model->where('fid='.$id)->delete(); // 删除用户数据
      if($res != false){
                $this->success('删除成功',U('index'));exit;  
            }else{
                $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}