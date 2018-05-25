<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class NewsController extends PublicController {
     /*
    新闻页视图加载
    */
    public function IndexAction(){       
    
    $cid=I('get.cid');
    
    $this->lists('News',$cid);
    $this->assign('arr',$this->arr);
    $this->assign('Page',$this->show); 
    $this->display('News:index');
       
    }
	 /*
    新闻详细页
    */
    public function  InfoAction(){

      if(IS_GET){
          $id = I('get.id');
          $this->view($id);
          $this->assign('arr',$this->data);
          
          //print_r($this->data['cid']);exit;
          $this->fn($id);//前后页
          $this->assign('front',$this->front);  
          $this->assign('after',$this->after);
          $this->assign('infoclass',$this->infoclass('News',$this->data['cid']));
          $this->display('News:info');
        }else{
          E('并无页面');
        }
      }
    
    
	
	
}