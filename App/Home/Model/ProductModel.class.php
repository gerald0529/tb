<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Model;

use Think\Model;
class ProductModel extends Model {
   
   function _after_select(&$arr){
    foreach ($arr as $k => $v) {
       	//$arr[$k]['info_url']=C('TMPL_PARSE_STRING.__ROOT__').'index.php/Home/product/info/id'.$v['id'];
       $arr[$k]['info_url']=__APP__.'/Home/product/info/id'.$v['id'];
       }   
   }
}