<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;
class ArticleController extends PublicController{
    /*
    商品页视图加载
    */
    public function indexAction(){
    
      $this->lists();

    }
   
    /*
    商品添加
    */
    public function addAction(){
      
        $this->add2();
     }
     
     /*
     文章修改
     */
     public function editAction(){
       
        $this->edit2();     
       
     }

     
     /*
     表单多商品删除
     */
     public function delAction(){ 
        //if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){ //判断是否是ajax异步传输；
        $view = CONTROLLER_NAME;
        if(IS_AJAX){  
             $id=I('post.id'); 
             $id2=I('get.id2'); 
             
             if(!empty($id) ){
                $id3 = $id;
                
                $this->del3($view,$id3);
             }elseif(!empty($id2)){
                $id3 = $id2;

                $this->del3($view,$id3);
             }
        
        }else{
            echo '删除失败';exit;
        }
     }
     
     
     
}