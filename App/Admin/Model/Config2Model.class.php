<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Model;

use Think\Model;
class ConfigModel extends Model {
   
   function _after_select(&$arr2){
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
	}

    
    Public function _edit (){
        if(IS_POST){
        $data=I('post.');
        //print_r($data);exit;

        $res=$this->model->save($data); // 根据条件更新记录
        //echo $this->model->_Sql();exit;
            if( $res != false){
                $this->success('修改成功',U('index')); exit;
            }else{
             $this->error('修改失败,请重试……',U('index'));exit;        
            }
        } 
    }

}