<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ContactController extends PublicController {
    /*
    联系我们
    */
    public function IndexAction(){
    	//echo MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;exit;
    	$cid = I('get.cid');    
        $this->view2('Contact',$cid);
        $this->assign('arr',$this->data);
	    $this->display('Contact:index');


    }
    /*
    在线留言
    */
    public function feedbackAction(){
    	$cid = I('get.cid');    
        if (IS_POST) {
            $fb = I('post.');
            $fb['addtime'] = time();
            $res = M('Feedback')->add($fb);
            //echo $this->model->_Sql();exit;
            if($res != false){
                 $this->success('提交成功',U('feedback'));
            }else{
                 $this->success('提交失败',U('feedback'));
            }

        }
        $this->view2('Contact',$cid);

        $this->assign('arr',$this->data);
	    $this->display('Contact:feedback');


    }
	
	
}