<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ProductController extends PublicController {
     /*
    商品页视图加载
    */
    public function IndexAction(){       
    $cid=I('get.cid');
    
    $this->lists('Product',$cid,$keywords);
    $this->assign('arr',$this->arr);
    $this->assign('Page',$this->show); 
    $this->display('Product:index');
       
    }
	 /*
    商品详细页
    */
    public function  infoAction(){
    
    if(IS_GET){
          $id = I('get.id');
          $this->view($id);
          $this->assign('arr',$this->data);
          //print_r($this->data);exit;

          $this->fn($id);//前后页
          $this->assign('front',$this->front);  
          $this->assign('after',$this->after);
          $this->assign('infoclass',$this->infoclass('Product',$this->data['cid']));
          $this->display('Product:info');
        }else{
          E('并无页面');
        }
    }
	
	
}