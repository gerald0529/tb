<?php
/*
  公共函数类库
*/
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
  protected $model;
  /*
  分页类
  */
  protected $firstRow2;
  protected $listRows2;
  protected $show;
  
  /*
  图片上传
  */
  protected $file;
  protected $upload;
  protected $thumb_path2;
  protected $thumb;
  protected $img5;
  protected $img4;
  /*
  数据输出
  */
  protected $arr;
  protected $data;
  /*
  构造函数
  */
  public function __construct(){
    //先调用父类构造函数的方法和属性；
    parent::__construct();
    header("Content-Type:text/html; charset=utf-8");
    //截取类名PublicController中的类名头，减少冗余，实现复用(动态调用)
      $str= basename(get_class($this)); //获取当前访问路径
      $class_name=substr($str,0,-10);//获取类名；
    $this->model=D($class_name);
      //echo MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;exit;
    //验证权限登录
     $this->auth();  
     
  }
 
 /*
 视图加载
 parm @view 模板名称 
 */
  protected function getview($view="Article/index"){
   //echo MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;exit; 
  

  $this->display('Public:left');	
	$this->display($view);
	$this->display('Public:footer');
 
   }
   /*
 验证是否已登陆
 @防他人强制登陆
 */
    protected function isLogin(){
    	//print_r($_SESSION);exit;
     if(empty($_SESSION['admin'])){
     	$this->error('非法操作,正在跳转到登录页',U('Login/index'),3);
     }
    }
   /*
 权限验证
 */
    protected function auth($view){
      
     $this->isLogin();
     $auth = new \Think\Auth();
     //echo $_SESSION['uid'];exit;
     if(!$auth -> check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME,$_SESSION['uid']))
     {
       $this->error('非法访问,你没有权限',U('Login/index'));
     }
    //echo $view;exit;
    $list = queue();             //侧边栏
    foreach ($list as $key => $value) {
      foreach ($value['children'] as $k => $v) {
        if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == $v['name']){
           $list[$key]['index'] = 'on';
           $list[$key]['children'][$k]['index'] = 'on';
        }
      }    
    }
    
    $this->assign('list',$list);
    $inf=M('Category')->where(array('pid'=>0))->select();
    $this->assign('inf',$inf);   //内容类侧边栏

     //$auth -> getGroups($uid);      //获取用户组,返回值为数组

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
  
  /*
  编辑页所属栏目类
  */
  public function belong($pid){

    $news=M('Category') ->where(array('pid' => $pid))->select();//所属栏目类
    $this->assign('news',$news);
  }
     /*
   图片处理，上传后天的处理
   */
   public function thumb($info,$thumb_width=400,$thumb_height=200){//$ImgSrc：大图路径 //$this->info原图信息
      //print_r($info); exit;
      $img='Uploads/'.str_replace('./','', $info['savepath']).$info['savename'];
      $image = new \Think\Image();        
      $image->open($img);//获取原图像信息；
          $thumb_path='./Uploads/'.str_replace('./','', $info['savepath']).'thumb_'.$info['savename'];
          // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
          $image->thumb($thumb_width,$thumb_height)->save($thumb_path);
          $this->thumb_path2=str_replace('./','', $thumb_path).';';
   }
   
     /*
     单文件上传
     */
     public function uploadone($view="",$savePath="",$ftype = 'image'){
      //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。  
        if ($ftype == 'image') {  
            $ftype = 'jpg,gif,png,jpeg,bmp';  
        } else if ($ftype == 'file') {  
            $ftype = 'zip,rar,doc,xls,ppt';  
        }   
        //$time=date('Ymd',time());
           //echo $view;exit;
        $setting = array(  
            'mimes' => '', //允许上传的文件MiMe类型  
            'maxSize' => 6 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)  
            'exts' => $ftype, //允许上传的文件后缀  
            'autoSub' => true, //自动子目录保存文件  
            //'saveName'=> 'time',//上传文件的保存规则,打开则为数字时间类型保存
            'subName' => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组  
            //'rootPath' => './Uploads/', //保存根路径  
            'savePath' => $savePath, //保存路径（相对于根路径）  
        ); 

        $this->upload = new \Think\Upload($setting);// 实例化上传类
        $this->info= $this->upload->uploadOne($view);// 上传文件,获取原图路径

        if(!$this->info) {// 上传错误提示错误信息             
        $this->error($this->upload->getError());    
        }else{// 上传成功 获取上传文件信息        
                $this->file='Uploads/'.$this->info['savepath'].$this->info['savename'];
                //echo $this->file;exit;
                } 
     }
     /*
     多文件上传
     */
     public function uploads($view="",$tub="",$savePath="",$thumb_width=300,$thumb_height=200,$ftype = 'image'){
     
      //这里划分一下允许上传的文件类型，与3.1相比，文件类型不再是数组类型了，而是字符串，这是个区别。  
        if ($ftype == 'image') {  
            $ftype = 'jpg,gif,png,jpeg,bmp';  
        } else if ($ftype == 'file') {  
            $ftype = 'zip,rar,doc,xls,ppt';  
        }  
       $setting = array(  
            'mimes' => '', //允许上传的文件MiMe类型  
            'maxSize' => 6 * 1024 * 1024, //上传的文件大小限制 (0-不做限制)  
            'exts' => $ftype, //允许上传的文件后缀  
            'autoSub' => true, //自动子目录保存文件  
            'subName' => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组  
            //'rootPath' => './Uploads/', //保存根路径  
            'savePath' => 'images/'.$savePath, //保存路径  
        ); 
        $upload = new \Think\Upload($setting);// 实例化上传类
        $info=   $upload->upload($view);// 上传文件,获取原图路径

        if(!$info) {// 上传错误提示错误信息             
        $this->error($upload->getError());    
        }else{// 上传成功 获取上传文件信息        
                  foreach ($info as $key => $value) {
                    $this->file.='Uploads/'.$info[$key]['savepath'].$info[$key]['savename'].';';  
                  }
                  if($tub==1 || empty($tub)){//判断是否有缩略图
                            foreach ($info as $key => $value) {//一张或多张都要循环
                            $this->thumb3($value,$thumb_width,$thumb_height);
                            $this->thumb.=$this->thumb_path2;//获取生成的缩略图
                          }
                    }
                } 
     }
    /*
    图片上传的替换与叠加
    */
    protected function Replace($img,$pic,$_FILES2){ 
        $img2=substr($img,0,-1);//截取文件路径的最后一个分号；
        $img2=explode(';', $img2);//获取新图片数组
        $k2=array_keys($_FILES2);//获取新添加的图片数组的键名
        $k3=array_flip($k2);//交换数组中的键和值。
        $i=0;
        foreach ($k3 as $key => $value) {//获取新添加的图片的键名对应数组
          $img3[$key]=  $img2[$i] ; 
          $i++;         
        }
        $img4=$img3+$pic;//合并数组且替换具有相同键名的键值
        ksort($img4);//按照键名对数组由低到高重新排序
        $this->img5=implode(';', $img4).';';//获取替换且叠加后的数组字符串
    } 
    /*
    设定主图的路径调换
    */
    protected function exchange($img,$key){ 
        $img2=substr($img,0,-1);//截取文件路径的最后一个分号；   
        $img2=explode(';', $img2);//初始原图数组  
        $img3=str_replace($img2[$key].';','', $img);//先把原数组中的字符替换为空
        
        $img3=substr($img3,0,-1);//截取文件路径的最后一个分号；   
        $img3=explode(';', $img3);//截取主图现有位置后获取的数组
        array_unshift($img3,$img2[$key]);//在数组开头插入被选中的元素
        $this->img4=implode(';', $img3).';';//把新获取全图数组转为字符串
    }
    /*
  菜单列表页数据输出
    */
    public function lists(){

        if(IS_GET){
          /*if(!I('verifystate','2',false)){
              $this->error('栏目审核中',U('Index/index'));
            }elseif(!I('cid','',false)){
              $this->error('栏目未归类',U('Index/index'));
            }*/
        $cid = I('cid','',false);
        session('cid',$cid);
        $ic=M('Category');
        $infoclass=$ic->where(array('cid'=>$cid))->find();
        // $view = CONTROLLER_NAME;
        // $infoclass=$ic->where(array('remark'=>$view))->find();
        
        
        //print_r($infoclass2);exit;
        $info=$ic->where(array('pid'=>$infoclass['cid']))->select();//栏目子类
        foreach ($info as $key => $value) {
          $data[]=$value['cid'];
        }
         
         $min=min($data);
         $max=max($data);
        $cid = $data?' a.cid >= '.$min.' and a.cid <= '.$max:'';
        //print_r($cid);exit;
        $news=M('Article');   
        $count=$news->count();
        $this->page_01($count,C('PAGE_NUM'));
        $arr=$news->field('a.*,c.name')
                  ->table(array('tp_article'=>'a'))
                  ->join('tp_category as c ON a.cid = c.cid')
                  ->where($cid)
                  ->order(array('a.sort' => 'desc','a.edit_time' => 'desc'))
                  ->limit($this->firstRow2.','.$this->listRows2) 
                  ->select(); 
                  //echo $news->getLastSql();exit;
                  //echo $news->_Sql();exit;
        foreach ($arr as $key => $value) {   
            if(isset($value['verifystate'])) {
                switch ($value['verifystate']) {
                        /*case 0:
                            $arr[$key]['verifystate']='审核';
                            break;*/
                        case 1:
                             $arr[$key]['verifystate']='审核通过';
                             break;
                        case 2:
                             $arr[$key]['verifystate']='审核中';
                            break;
                    }
               }
               $arr[$key]['add_time'] = date('Y-m-d, H:i:s',$arr[$key]['add_time']);   
         } 
         //print_r($arr);exit; 
        $this->assign('Page',$this->show);  
        $this->assign('arr',$arr);
        $this->getView();
        }else{
          $this->error('非法操作',U('Login/index'));
        }
    } 
    /*
  数据添加
    */
    public function add2(){
      $view = CONTROLLER_NAME;
          if(!I('cid','',false)){
              //$this->error('栏目未归类',U('Index/index'));
              echo '<script>alert("栏目未归类!");history.go(-1);</script>';die;
            }
        $cid = I('cid','',false);
        session('cid',$cid);
        $ic=M('Category');
        $infoclass=$ic->where(array('cid'=>$cid))->find();

      if(IS_POST){
            $arr=I('post.');
            $arr['flag']=implode(',', $arr['flag']);//把数组变为字符串
            $arr['add_time']=time();
            $arr['edit_time']=time();
            
            if(!empty($_FILES['image']['name'])){//图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $arr['image']=$this->file;
                   if(!empty($arr['thub'])) {
                    switch ($arr['thub']) {//生成缩略图
                            case 1:
                                $this->thumb($this->info,1000,500);//获取缩略图路径
                                $arr['thumb']=$this->thumb_path2;
                                $arr['thumb']=substr($arr['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                            case 2:
                                $this->thumb($this->info,400,200);//获取缩略图路径
                                $arr['thumb']=$this->thumb_path2;
                                $arr['thumb']=substr($arr['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                        }
                   }             
                }  
            $res=M("Article")->add($arr);
            if( $res != false){
                if(isset($arr['body'])){
                  $abb['body'] = $arr['body'];
                  $abb['product_id'] = $res;
                    $res2=M("Article_description")->add($abb);
                    if( $res2 = false){  
                       $this->success('文章详情添加失败',U('add'));
                    }
                }
                
               $this->success('添加成功',U('index'));
            }else{
               $this->success('添加失败',U('add'));
            }
            
        }
        //echo $infoclass['cid'];exit;

        $this->belong($infoclass['cid']);//所属栏目类
        $this->assign('act',U( "add" ));
        $this->getView('Article/edit');
      
    }  
    /*
  数据修改
    */
    public function edit2(){
       $view = CONTROLLER_NAME;
      // $ic=M('Category');
      // $infoclass=$ic->where(array('remark'=>$view))->find();
      if(!I('cid','',false)){
              echo '<script>alert("栏目未归类!");history.go(-1);</script>';die;
            }

        $cid = I('cid','',false);
        session('cid',$cid);
        $ic=M('Category');
        $infoclass=$ic->where(array('cid'=>$cid))->find();

      if(IS_GET){ 
        $id=I('get.id');
          /*$arr =M('Article') ->table('tp_article a,tp_article_description d')   
                          ->field('a.*,d.body')
                          ->where('a.id=d.product_id and a.id='.$id)
                          ->find();*/
           $arr =M('Article')->where(array('id'=>$id))->find();
           $arr['add_time'] =date('Y-m-d, h:i:s',$arr['add_time']);
           //echo M('Article')->getlastSql();exit;
           $body=M('Article_description')->where(array('product_id'=>$id))->find();
           if(isset($body)){
            $arr['body'] = $body['body'];
           } 
            
           $this->belong($infoclass['pid']);//所属栏目类
           $this->assign('arr',$arr);
           $this->assign('act',U( "edit" ));
           $this->getView('Article/edit');
       
       }
       
     if(IS_POST){//获取更改后的数据；
        
        $data=I('post.');
        $data['flag']=implode(',', $data['flag']);//把数组变为字符串

        if(!empty($_FILES['image']['name'])){//新图片上传;
                   $this->uploadone($_FILES['image'],$view.'/');
                   $data['image']=$this->file;

                   if(!empty($data['thub'])) {
                    switch ($data['thub']) {//生成缩略图
                            case 1:
                                $this->thumb($this->info,1000,500);//获取缩略图路径
                                $data['thumb']=$this->thumb_path2;
                                $data['thumb']=substr($data['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                            case 2:
                                $this->thumb($this->info,400,200);//获取缩略图路径
                                $data['thumb']=$this->thumb_path2;
                                $data['thumb']=substr($data['thumb'],0,-1);//截取文件路径的最后一个分号；
                                break;
                        }
                       if (!empty($data['thumb2'])) {
                        @unlink($data['thumb2']);//删除修改前的缩略图
                        }  
                   }
                  if (!empty($data['image2'])) {
                      @unlink($data['image2']);//删除修改前的图
                  }                  
                }   
        $data['add_time']=strtotime($data['add_time']);
        $data['edit_time']=time();
  
        $data=array_filter($data); //过滤数组中的空字符元素
        //print_r($data);exit;
        $db=M('Article');
        $res=$db->where(array('id'=>$data['id']))->save($data); // 根据条件更新记录
        if( $res != false){
            if(isset($data['body'])){
            $res2=M('Article_description')->where(array('product_id'=>$data['id']))->save(array('body'=>$data['body']));
              if( $res2 = false){  
                       $this->success('文章详情修改失败',U('index'));
                    }  
            }
            
             $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        }
    }
    /*
  数据删除
    */
    public function delite2(){
      if(IS_GET){
        $id=I('get.id');
        $res = M('Article')->where('id='.$id)->delete(); // 删除用户数据
        if($res = true){
              $this->success('删除成功',U('index'));exit;  
            }else{
             $this->error('删除失败',U('index')); exit;         
            }
        }
    }
    
    /*
 ajax删除
 */
    protected function del3($view,$id,$aid='id'){

      
             if(strstr($id,',')){
               $id2=explode(',', $id);//字符串转数组                           
               foreach ($id2 as $key => $value) {                
                  $res=M($view)->where($aid.'='.$value)->delete(); // 删除用户数据             
               }
             }else{
              $res=M($view)->where($aid.'='.$id)->delete(); // 删除用户数据   
             }     

          if($res != false){
               echo 'ok';exit;             
            }else{
               echo 'error';exit;    
            }
        
     
    }       
}