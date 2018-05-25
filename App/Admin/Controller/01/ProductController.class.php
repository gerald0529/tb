<?php
// 本类由系统自动生成，仅供测试用途
//命名空间；
namespace Admin\Controller;
//访问TP框架controller;

class ProductController extends PublicController{
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
     商品删除
     */
     public function deleteAction(){ 

        $this->delite2();

     }
     
     
}