<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
class Allow extends Controller
{
     /**
     * 类初始化操作
     * @access protected
     */
    protected function _initialize()
    {
    	//检测用户session信息
    	if(!Session::get('uid')){
    		//跳转到后台登陆界面
    		$this->redirect("/login/index");
    	}

    }
}
?>
