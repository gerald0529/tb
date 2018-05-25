<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class VipController extends PublicController {
     /*
    商品页视图加载
    */
    public function IndexAction(){       
        //print_r($_SESSION);exit;
        /*分页显示*/
    //$model = D('Product');//实例化Admin对象；

    $count = $this->model->count();// 查询满足要求的总记录数
    
    // 实例化分页类 传入总记录数和每页显示的记录数(25)   
    $Page = new \Think\Page($count,C('PAGE_NUM'));
    $Page->setConfig('first','首页');
    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('end','尾页');
    $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
    $show = $Page->show();// 分页显示输出
    /*查询输出*/
    $arr = $this->model->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('Page',$show);
    // print_r($show);exit;
    //print_r($arr);exit;
    $this->assign('arr',$arr);
    $this->display('Vip:index');
       
    }
	 /*
    商品详细页
    */
    public function  InfoAction(){
    
     $this->display('Vip:info');
    }
	
	
}