<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller
{
    // 加载登陆页模板
    public function getindex(){
        return $this->fetch("Login/login");
    }

    //执行登录
    public function postdologin(){
        //创建请求对象
        $request=request();
        //获取登录名
        $username=$request->param('username');
        //获取密码
        $password=md5($request->param('password'));
        //查询数据库
        $res = Db::table("users")->where("username='{$username}' and password='{$password}' and token=1")->find();
        //检测用户是否存在 登陆
        if($res){
          Session::set("uid",$res['id']);
          Session::set("username",$res['username']);
          if(Session::get("url")){
            $this->redirect(Session::get("url"));
          }
          if(Session::get("infourl")){
            $this->redirect(Session::get("infourl"));
          }
          $this->redirect("/");
        }else{
          $this->error("用户名或者密码不正确,请重新登陆","/login/index");
        }
    }

    //退出登陆
    public function getloginout(){
        $id=Session::get('uid');
        Db::table('users')->where('id',$id)->update(['goodstatus'=>0]);
        Session::delete('uid');
        Session::delete('username');
        Session::delete("url");
        Session::delete("infourl");
        Session::delete("g_addtime");
        $this->redirect("/");
    }

}