<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;

use Think\Model;
class NewsModel extends Model {
   
   function _after_select(&$arr){
	    foreach ($arr888 as $key => $value) {
	    //判断数据库字段中的图片量是否大于1；   
	        if(substr_count($arr[$key]['ImgSrc'],";")>=1){ //计算子串在字符串中出现的次数
	        $arr[$key]['ImgSrc']=substr($arr[$key]['ImgSrc'],0,-1);//截取文件路径的最后一个分号；   
	        $arr[$key]['ImgSrc']=explode(';', $arr[$key]['ImgSrc']);//获取全图数组
	        $arr[$key]['ImgSrc']=current($arr[$key]['ImgSrc']);//返回数组第一个元素
	        }
	        elseif(substr_count($arr[$key]['ImgSrc'],";")==1){//echo 23;exit;
                    if(strrchr($arr[$key]['ImgSrc'],";")==";"){//若字符串的最后一个字符是分号，则截取
                    $arr[$key]['ImgSrc']=substr($arr[$key]['ImgSrc'],0,-1);//截取文件路径的最后一个分号；                      
                    }
                }
	        if(substr_count($arr[$key]['Thumb'],";")>=1){//房间功能显示
            $arr[$key]['Thumb']=substr($arr[$key]['Thumb'],0,-1);//截取文件路径的最后一个分号；   
	        $arr[$key]['Thumb']=explode(';', $arr[$key]['Thumb']);//获取全图数组
	        $arr[$key]['Thumb']=current($arr[$key]['Thumb']);//返回数组第一个元素
	        }
	    }
	}

    /*
     * 头像上传
     */
    Public function uploadFace (){
        echo 'fuck you!';exit;      
    }

}