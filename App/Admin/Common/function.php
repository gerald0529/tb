<?php
/*
权限认证
*/
function auth2(){

	  $auth = new \Think\Auth();
	  if(!$auth -> check()){
	   //$this->error('没有权限',U('login/index'));
	  	echo '没有权限';
	  }  
}
/*
栏目列表排列
*/
function queue(){

   $list =getcategory(1,1);
   
   return $list;
}
/*
 验证码比较 
*/
function check_verify($code, $id = ''){  
      $verify = new \Think\Verify();    
      return $verify->check($code, $id);
  }
/*
  分类表单信息递归
  */
 function getcategory($FatherId='',$is_show='',$arr_next=array()){
    //找字段名符合'pid='.$pid的下一级分类；
    //$arr=getlist('category','asc','id',1,100,'pid='.$pid);
    $inf =M('auth_rule'); 
    $arr=$inf
             //->field('id,name,title,pid')
             ->where(array('pid'=>$FatherId,'is_show'=>$is_show))
             ->order(array('sort'))
             ->limit(100)
             ->select(); 
             
    //判断数组中是否有值
    if(!empty($arr)){
    foreach ($arr as $key => $value) {  
    $arr_next[]=$value; //让上面数组的子集（键值）依次赋予下一个数组的一个值（键名）；
    $FatherId=$value['id'];//让上一个数组的子集id等于下一个数组的父级变量； 
    $arr_next[$key]['children']=getcategory2($FatherId,$is_show,$arr_next);//找寻一个数组的
      }
    }
    //echo 11;exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr_next;
  }
  /*
  递归2
  */
 function getcategory2($FatherId='',$is_show='',$arr_next=array()){
    //找字段名符合'pid='.$pid的下一级分类；
    //$arr=getlist('category','asc','id',1,100,'pid='.$pid);
    $inf =M('auth_rule'); 
    $arr=$inf
            //->field('cid,name,pid')
            ->where(array('pid'=>$FatherId,'is_show'=>$is_show))
            ->limit(100)
            ->select();  
                //print_r($arr);exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr;
  }
/*
规则页栏目列表
*/

  function authlist($FatherId='',$limit='',$name = ''){

   $list =getcategory3($FatherId,$limit,$name);

   foreach ($list as $key => $value) {

       switch ($value['level']) {
         case '1':
           $list[$key]['tt'] = '|—';
           break;
         case '2':
           $list[$key]['tt'] = '|&nbsp;&nbsp;|—';
           break;
         default:
           $list[$key]['tt'] = '';
           break;
       }

   }
   
   return $list;
}
   /*
  递归3
  */
 function getcategory3($FatherId='',$limit= 100,$name = '',$arr_next=array())
 {
   $inf =M($name); 
    $arr=$inf
             //->field('id,name,title,pid')
             ->where(array('pid'=>$FatherId))
             ->order(array('sort'))
             ->limit($limit)
             ->select(); 
             
    //判断数组中是否有值
    if(!empty($arr)){
    foreach ($arr as $key => $value) {  
    $arr_next[] = $value; //让上面数组的子集（键值）依次赋予下一个数组的一个值（键名）；
    $FatherId = $value['id'];//让上一个数组的子集id等于下一个数组的父级变量； 
    $arr_next = getcategory3($FatherId,$limit,$name,$arr_next);//找寻一个数组的
      }
    }
    //echo 11;exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr_next;

 }
/*
  递归4
  */
  function rulelist($FatherId,$limit,$name)
  {
    $list = getlist($FatherId,$limit,$name);

    return $list;
  }
 /*
  递归4
  */
 function getlist($FatherId='',$limit= 100,$name = '',$arr_next=array())
 {
   $inf =M($name); 
    $arr=$inf
             //->field('id,name,title,pid')
             ->where(array('pid'=>$FatherId))
             ->order(array('sort'))
             ->limit($limit)
             ->select(); 
             
    //判断数组中是否有值
    if(!empty($arr)){
    foreach ($arr as $key => $value) {  
    $arr_next[] = $value; //让上面数组的子集（键值）依次赋予下一个数组的一个值（键名）；
    $FatherId = $value['id'];//让上一个数组的子集id等于下一个数组的父级变量； 
    //print_r($arr_next);exit;
    $arr_next[$key]['child'] = getlist2($FatherId,$limit,$name,$arr_next);//找寻一个数组的
      }
    }
    //echo 11;exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr_next;

 }
  /*
  递归2
  */
 function getlist2($FatherId='',$limit= 100,$name = '',$arr_next=array()){
    $inf =M($name); 
    $arr=$inf->where(array('pid'=>$FatherId))
            ->limit(100)
            ->select();  
                //print_r($arr);exit;
            //print_r($arr_next);exit;
    //判断数组中是否有值
    if(!empty($arr)){
    foreach ($arr as $key => $value) {  
    $arr_next2[] = $value; //让上面数组的子集（键值）依次赋予下一个数组的一个值（键名）；
    $FatherId = $value['id'];//让上一个数组的子集id等于下一个数组的父级变量； 
    //print_r($arr_next);exit;
    $arr_next2[$key]['children'] = getlist3($FatherId,$limit,$name,$arr_next);//找寻一个数组的
      }
    }
    //若数组无值则跳出循环，返回最终值；
    return $arr_next2;
  }
  /*
  递归2
  */
 function getlist3($FatherId='',$limit= 100,$name = '',$arr_next=array()){

    $inf =M($name); 
    $arr=$inf->where(array('pid'=>$FatherId))
            ->limit(100)
            ->select();  
    //print_r($arr);exit;
    //若数组无值则跳出循环，返回最终值；
    return $arr;
  }
  /*
  基本设置页数组处理 
  */
  function _config($arr){
   foreach($arr as $key => $value){

        switch ($value['config_type']) {
            case '1':
                $arr[$key]['body2'] = '<input class="text-input small-input" type="file" id="small-input" name="body[]" value=""/> ';
                break;
            case '2':
                $arr[$key]['body2'] = '<input class="text-input medium-input" type="text" id="medium-input" name="body[]" value="'.$value['body'].'"/>';
                break;
            case '3':
                $arr[$key]['body2'] = '<textarea id="textarea" name="body[]" rows="5">'.$value['body'].'</textarea>';
                break;
            case '4':
                $arr[$key]['body2'] = '<input  type="checkbox" id="small-input" name="body[]" value="'.$value['body'].'"/>';
                break;
            case '5':
                $arr[$key]['body2'] = '<input  type="radio" id="small-input" name="body[]" value="'.$value['body'].'"/>';
                break;
            
        }
    }
    return $arr;
  }
?>