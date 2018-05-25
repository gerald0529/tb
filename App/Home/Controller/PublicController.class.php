<?php
/*
  公共函数类库
*/
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
  protected $model; 
  protected $front;
  protected $after;
  //protected $info;
  protected $arr;
  protected $data;
  /*
  /*
  构造函数
  ]*/
  public function __construct(){
    //先调用父类构造函数的方法和属性；
    parent::__construct();
     header("Content-Type:text/html; charset=utf-8");
    //截取类名PublicController中的类名头，减少冗余，实现复用(动态调用)
      $str= basename(get_class($this)); //获取当前访问路径
      $class_name=substr($str,0,-10);//获取类名；
      $this->model=D($class_name);
      $this->menu();
      $this->config();
      $this->link();
      
      
   //验证是否已登陆
   //$this->isLogin();
  }
 
 /*
 视图加载
 parm @view 模板名称 
 */
   protected function getLayout($view=""){
    
    //获取对应模板html文件里的代码  
    $content=$this->fetch($view);
    //传参
    $this->assign('content',$content);  
    $this->display('Layout:layout');
   }

   /*
 验证是否已登陆
 @防他人强制登陆
 */
    protected function isLogin(){
    	//print_r($_SESSION);exit;
     if(empty($_SESSION['user'])){
     	$this->error('非法操作，请先登陆',U('Login/login'),3);
     }
     
    }
    /*
    校验验证码
    */
    protected function check_verify($code, $id = ''){    
        $verify = new \Think\Verify();    
        return $verify->check($code, $id);
    }
    /*
    设置数组获取
    */
    protected function config(){  
      $cfg=D('Config')->field('code,title,body')->select();
      $cfg=_config($cfg);
      //$cfg['cfg_top'] = htmlspecialchars_decode($cfg['cfg_top']);
      //print_r($cfg);exit;
      $this->assign('cfg',$cfg);
    }
    /*
    友情链接
    */
    protected function link(){  
      $link=D('Ad')->where(array('position_psid'=>4))->select();           
      $this->assign('link',$link);
    }
     /*
  分页类方法
  */
  protected function page_01($count,$num=4){ 
     // 实例化分页类 传入总记录数和每页显示的记录数(25)   
  $Page = new \Think\Page($count,$num);
  $Page->setConfig('first','首页');
  $Page->setConfig('prev','上一页');
  $Page->setConfig('next','下一页');
  $Page->setConfig('end','尾页');
  $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
  $this->firstRow2 =$Page->firstRow; 
  $this->listRows2 =$Page->listRows;
  $this->show = $Page->show();// 显示记录数
  //echo $this->listRows2;exit;
  }
  protected function infoclass($view,$cid){ //栏目子类
    $ic=M('Category');
    $infoclass=$ic->where(array('remark'=>$view))->find();
    $info=$ic->where(array('pid'=>$infoclass['cid']))->select();//栏目子类
    if(isset($cid)){
        foreach ($info as $key => $value) {
          if($value['cid'] == $cid){
            $info[$key]['index'] = 'on';
         }
       }
    }
    //print_r($this->info);exit;
    return $info;
  }
  //详细页的上一篇与下一篇
   public function fn($id){ 
    $Article=M('Article');
      //上一篇  
  $front=$Article->field('id,title')->where("id<".$id)->order('id desc')->limit('1')->find();
  $this->front = !$front?'没有了':$front;
      //下一篇  
  $after=$Article->field('id,title')->where("id>".$id)->order('id desc')->limit('1')->find(); 
  $this->after = !$after?'没有了':$after;

  }
  /*
  菜单列表页数据输出
  */
  public function lists($view,$cid){
    if (IS_POST) {//搜索功能
        $keywords = I('post.search');
        $ss['a.title'] = array('LIKE', $keywords);
        $ss['a.keywords'] = array('LIKE', $keywords);
        $ss['_logic']= 'OR';
      }

    $info=$this->infoclass($view,$cid);
    $this->assign('infoclass',$info);
    foreach ($info as $key => $value) {
      $data[]=$value['cid'];
    }
     
     $min=min($data);
     $max=max($data);
     //print_r($min);exit;
    $cid2.= $data?' and a.cid >= '.$min.' and a.cid <= '.$max:'';
    $cid2.= $cid?' and a.cid ='.$cid:' ';  

    // $cid2['a.verifystate'] = 1;
    // $cid3['a.cid&a.cid'] = array(array('EGT',$min),array('ELT',$max),'_multi'=>true);
    
    $news=M('Article'); 
    $count=$news->field('a.*,c.cid,c.name,c.pid,c.remark')
                ->table(array('tp_article'=>'a'))
                ->join('tp_category as c ON a.cid = c.cid')
                ->where($ss)
                ->where('a.verifystate = 1 '.$cid2)
                ->count();
    $this->page_01($count,C('PAGE_NUM'));
    $this->arr=$news->field('a.*,c.cid,c.name,c.pid,c.remark')
              ->table(array('tp_article'=>'a'))
              ->join('tp_category as c ON a.cid = c.cid')
              ->where($ss)
              ->where('a.verifystate = 1 '.$cid2)
              ->order(array('a.sort' => 'desc','a.edit_time' => 'desc'))
              ->limit($this->firstRow2.','.$this->listRows2) 
              ->select(); 
              //echo $news->getlastsql();exit;
    foreach ($this->arr as $key => $value) {
         $this->arr[$key]['add_time'] =date('Y-m-d, h:i:s',$this->arr[$key]['add_time']);

    }
    //print_r($this->arr);exit;
    
  }
  /*
  详细页数据输出
  */
  public function view($id){

    $news=M('Article');
    $id2 = $id?' and a.id ='.$id:'';           
    $this->data=$news->field('a.*,c.cid,c.name,c.remark,c.pid')
              ->table(array('tp_article'=>'a'))
              ->join('tp_category as c ON a.cid = c.cid')
              ->where('a.verifystate = 1'.$id2)
              ->find(); 
              //echo M('Category')->getlastsql();exit;
    $pid = $this->data['pid'];  
    $data2=M('Category')->where('cid ='.$pid) ->find(); 
    if(!empty($data2)){
      $this->data['pid_name'] = $data2['name'];
    }
              //print_r($this->data);exit;
    $this->data['add_time'] =date('Y-m-d, h:i:s',$this->data['add_time']);
    $data2=M('article_description')->where(array('product_id'=>$this->data['id']))->find();
    $this->data['body'] = $data2['body']?htmlspecialchars_decode($data2['body']):'暂无此文……';
  }
  /*
  详细页数据输出2
  */
  public function view2($view,$cid){
    $info=$this->infoclass($view,$cid);
    $this->assign('infoclass',$info);
    foreach ($info as $key => $value) {
      $data[]=$value['cid'];
    }
     $min=min($data);
    $cid2 = $cid?' and a.cid ='.$cid:' and a.cid ='.$min; 
    $news=M('Article');          
    $this->data=$news->field('a.*,c.cid,c.name,c.remark')
              ->table(array('tp_article'=>'a'))
              ->join('tp_category as c ON a.cid = c.cid')
              ->where('a.verifystate = 1'.$cid2)
              ->find(); 
              //echo $news->getlastsql();exit;
    $this->data['add_time'] =date('Y-m-d, h:i:s',$this->data['add_time']);
    $data2=M('article_description')->where(array('product_id'=>$this->data['id']))->find();
    $this->data['body'] = $data2['body']?htmlspecialchars_decode($data2['body']):'暂无此文……';
  }
  /*
  导航栏
  */
  protected function menu(){

    $menu=$this->getcategory(0); 
    $this->assign('menu',$menu); 
  }
  
  /*
  分类表单信息递归
  */
    protected function getcategory($FatherId='',$arr_next=array()){
    //找字段名符合'pid='.$pid的下一级分类；
    //$arr=getlist('category','asc','id',1,100,'pid='.$pid);
    $inf =M('Category'); 
    $arr=$inf->where('pid='.$FatherId)
             ->limit(100)
             ->select(); 
             
    //判断数组中是否有值
    if(!empty($arr)){
    foreach ($arr as $key => $value) {  
    $arr_next[]=$value; //让上面数组的子集（键值）依次赋予下一个数组的一个值（键名）；
    $FatherId=$value['cid'];//让上一个数组的子集id等于下一个数组的父级变量； 
    $arr_next[$key]['children']=$this->getcategory2($FatherId,$arr_next);//找寻一个数组的
      }
    }
    //echo 11;exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr_next;
  }
  /*
  递归2
  */
  protected function getcategory2($FatherId='',$arr_next=array()){
    //找字段名符合'pid='.$pid的下一级分类；
    //$arr=getlist('category','asc','id',1,100,'pid='.$pid);
    $inf =M('Category'); 
    $arr=$inf
            //->field('cid,name,pid')
            ->where('pid='.$FatherId)
            ->limit(100)
            ->select();  
                //print_r($arr);exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr;
  }
}