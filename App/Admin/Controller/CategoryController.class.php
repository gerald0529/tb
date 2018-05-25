<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;

class CategoryController extends PublicController {
     /*
    商品页视图加载
    */
    public function IndexAction(){   

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    //$ca=M('Category');
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
    public function  addAction(){
        $view = CONTROLLER_NAME;
        $cc=M('Category');
        if(IS_POST){ 

            $arr=I('post.');
            if(!empty($_FILES['image']['name'])){//新图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $data['image']=$this->file;
                if (!empty($data['image2'])) {
                      @unlink($data['image2']);//删除修改前的图
                }                  
            } 
            //print_r($arr);exit;
            $res=$cc->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }    
        }
        $abb = $cc->where(array('pid'=>0))->select();
        $this->assign('abb',$abb);
        $this->assign('act',U( "edit" ));
        $this->getView($view.'/edit');
    }
     /*
    商品修改
    */
    public function  editAction(){
    $view = CONTROLLER_NAME;
        if(IS_GET){ 
            $cid=I('get.cid');
            $cc=M('Category');
            $arr = $cc->where(array('cid'=>$cid))->find();
            $infoclass = $cc->where(array('cid'=>$arr['pid']))->find();
            $abb = $cc->where(array('pid'=>$infoclass['pid']))->select();
            //print_r($abb);exit;
            $this->assign('arr',$arr);
            $this->assign('abb',$abb);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.');

            if(!empty($_FILES['image']['name'])){//新图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $data['image']=$this->file;
                if (!empty($data['image2'])) {
                      @unlink($data['image2']);//删除修改前的图
                }                  
            } 
            //print_r($data);exit;
            $db=M('Category');
            $res=$db->where(array('cid'=>$data['cid']))->save($data); // 根据条件更新记录
            if( $res != false){
                $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        }
    

    }
    /*
    分类添加
    */
    public function  deleteAction(){
        if(IS_GET){
        $id=I('get.cid');
        $res = M('Category')->where('cid='.$id)->delete(); // 删除用户数据
        if($res = true){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    }
	
	
}