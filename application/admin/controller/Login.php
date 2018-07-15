<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller
{
    public function getlogin(){
        // 加载后台首页模板(解析模板)
        return $this->fetch("Login/login");
    }
    //执行登陆
    public function postdologin(){
    	//创建请求对象
    	$request = request();
    	$fcode = $request->param('fcode');
    	//校验验证码
    	if(captcha_check($fcode)){
    		//登陆前检测用户名和密码
    		$name = $request->param('name');
    		$password = md5($request->param('password'));
    		$row = Db::table("admin")->where("name='{$name}' and password='{$password}'")->select();
    		if($row){
    			//把用户登陆信息信息存储在session
    			Session::set('islogin',2);
    			Session::set('adminuserid',$row[0]['id']);
    			Session::set('adminuser',$row[0]['name']);
                //1.获取当前登陆用户所具有的全部权限信息
                $list = Db::query("select n.name,n.mname,n.aname from admin_role as ar,role_node as rn,node as n where ar.rid=rn.rid and rn.nid=n.id and aid={$row[0]['id']}");
                // 2.初始化权限信息   添加后台首页权限
                $nodelist['admin'][]='getindex';
                //遍历权限
                foreach($list as $key=>$v){
                    //赋值 $nodelist
                    $nodelist[$v['mname']][]=$v['aname'];
                    //如果权限列表具有add 方法 添加postinsert
                    if($v['aname']=="getadd"){
                        $nodelist[$v['mname']][]="postinsert";
                    }
                    //如果权限列表具有info 方法 添加postaddinfo和postupdateinfo
                    if($v['aname']=="getinfo"){
                        $nodelist[$v['mname']][]="postaddinfo";
                        $nodelist[$v['mname']][]="postupdateinfo";
                    }
                     //如果权限列表具有info 方法 添加postaddinfo和postupdateinfo
                    if($v['aname']=="getinfo"){
                        $nodelist[$v['mname']][]="postaddinfo";
                        $nodelist[$v['mname']][]="postupdateinfo";
                    }
                    //如果权限列表具有edit 方法  添加postupdate
                    if($v['aname']=="getedit"){
                        $nodelist[$v['mname']][]="postupdate";
                    }
                    //如果权限列表具有password 方法  添加dopassword
                    if($v['aname']=="getpassword"){
                        $nodelist[$v['mname']][]="postdopassword";
                    }
                }
                // 3.把当前登录用户所具有的权限信息 存储在session里
                Session::set('nodelist',$nodelist);
                // 跳转后台首页
    			$this->success("登陆成功","/admin/index");
    		}else{
    			$this->error("用户名或者密码输入有误,请重新输入","/adminlogin/login");
    		}
    	}else{
    		$this->error("验证码输入有误,请重新输入","/adminlogin/login");
    	}
    }
    //退出登陆
    public function getlogout(){
    	Session::delete('islogin');
    	Session::delete('adminuserid');
    	Session::delete('adminuser');
    	$this->success("用户退出登陆成功","/adminlogin/login");
    }
}
