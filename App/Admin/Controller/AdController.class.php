<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class AdController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
     
    $count=$this->model->table('tp_ad a')   
                       ->field('a.*,p.position_name,u.username')
                       ->Join('tp_position p on a.position_psid = p.psid')
                       ->Join('tp_user u on a.user_uid = u.uid')
                       ->count();

    $this->page_01($count,10);
    $arr=$this->model->table('tp_ad a')   
                     ->field('a.*,p.position_name,u.username')
                     ->Join('tp_position p on a.position_psid = p.psid')
                     ->Join('tp_user u on a.user_uid = u.uid')
                     ->order(array('a.addtime' => 'desc','a.sort' => 'desc'))
                     ->limit($this->firstRow2.','.$this->listRows2)
                     ->select();
                     //echo $this->model->_Sql();exit;
    foreach ($arr as $key => $value) {        
        $arr[$key]['addtime']=date('Y-m-d',$arr[$key]['addtime']); 
        //$arr[$key]['pic']=$arr[$key]['pic']?$arr[$key]['pic']:'暂无图片'; 
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
            $arr['addtime']=time();
            
            if(!empty($_FILES['image']['name'])){//图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $arr['pic']=$this->file;
                             
                }
            //print_r($arr);exit;
            $arr['user_uid']=$_SESSION['uid'];
            $res = $this->model->add($arr);
            if( $res != false){
                 $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }                  
        }
        $abb = M('Position')->select();
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
            $arr = $this->model->where(array('aid'=>$id))->find();
            $abb = M('Position')->select();
            //print_r($abb);exit;
            $this->assign('arr',$arr);
            $this->assign('abb',$abb);
            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.'); 
            $data['addtime']=time();
            $data['user_uid']=!$data['user_uid']?$_SESSION['uid']:'';
            
            if(!empty($_FILES['image']['name'])){//新图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $data['pic']=$this->file;
                   
                if (!empty($data['image2'])) {
                      @unlink($data['image2']);//删除修改前的图
                }                  
            } 
            $data=array_filter($data); //过滤数组中的空字符元素
            //print_r($data);exit;
            $res=$this->model->where(array('aid'=>$data['aid']))->save($data); // 根据条件更新记录
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
      $res=$this->model->where('aid='.$id)->delete(); // 删除用户数据
      if($res>0){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}