<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class AboutController extends PublicController {
    /*
    视图加载
    */
	public function IndexAction(){       
    
        $cid = I('get.cid'); 	
		$this->view2('About',$cid);
        $this->assign('arr',$this->data);
        $this->display('About:index');
			    
    }
	
	
}