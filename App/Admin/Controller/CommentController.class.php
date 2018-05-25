<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class CommentController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){

    $view = CONTROLLER_NAME.'/'.ACTION_NAME;
    $ut=M('user_comment');
    $count=$ut->count();
    $this->page_01($count,10);
    $arr=$ut->table('tp_user_comment c')   
            ->field('c.*,u.username')
            ->Join('tp_user u on c.user_uid = u.uid')
            ->limit($this->firstRow2.','.$this->listRows2)
            ->select();
    foreach ($arr as $key => $value) {
        $arr[$key]['addtime']=date('Y-m-d',$arr[$key]['addtime']);
        $arr[$key]['verifystate']=$arr[$key]['verifystate']?'审核通过':'未审核';
        $arr[$key]['score']=$arr[$key]['score']?$arr[$key]['score']:'暂无评分';
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
        $user=M('user_comment');
        if(IS_POST){ 

            $arr=I('post.');
            
            //print_r($arr);exit;
            $res = $user->add($arr);
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
      $user=M('user_comment');
        if(IS_GET){ 
            $id=I('get.cmid');
            
            //$arr = $user->where(array('cmid'=>$id))->find();
            $arr=$user->table('tp_user_comment c')   
            ->field('c.*,u.username')
            ->Join('tp_user u on c.user_uid = u.uid')
            ->find();

            //print_r($abb);exit;
            $this->assign('arr',$arr);

            $this->assign('act',U( "edit" ));
            $this->getView($view.'/edit');
        }
        if(IS_POST){//获取更改后的数据；
        
            $data=I('post.');  
 
            //print_r($data);exit;
            $res=$user->where(array('cmid'=>$data['cmid']))->save($data); // 根据条件更新记录
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
     $id=I('get.cmid');

     if(!empty($id)){
      $res=M('user_comment')->where('cmid='.$id)->delete(); // 删除用户数据
      if($res != false){
                $this->success('删除成功',U('index'));exit;  
            }else{
                $this->error('删除失败',U('index')); exit;         
            }
        }
    
     }
     
     
}