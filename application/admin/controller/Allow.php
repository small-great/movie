<?php
namespace app\admin\controller;
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
    	if(!Session::get('islogin')){
    		//跳转到后台登陆界面
    		$this->error("请先登陆后台","/adminlogin/login");
    	}
        //获取请求对象
        $request = request();
        // 4.检测当前访问的模块操作是否在权限列表里 不在无法访问当前模块  在有权限访问
        //获取当前访问模块的控制器和方法
        //获取控制器
        $controller = strtolower($request->controller());
        //获取方法
        $action = $request->action();
        //获取权限列表信息
        $nodelist = Session::get("nodelist");
        //如果为空
        if(empty($nodelist[$controller]) || !in_array($action,$nodelist[$controller])){
            $this->error("抱歉,您没有权限访问该模块,请联系超级管理员","/admin/index");
            exit;
        }
    }

}