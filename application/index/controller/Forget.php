<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cookie;
class Forget extends Controller
{
    // 加载第一步模板
    public function getindex(){
        return $this->fetch("Forget/forget1");
    }

    //验证用户名
    public function postcheck(){
        $request=request();
        $name=$request->param('name');
        $code=$request->param('code');
        $captcha = new \think\captcha\Captcha();
        $result=$captcha->check($code);
        if($result){
            return true;
        }
        if(Db::table('users')->where('username',$name)->find()){
            echo 1;
        }
    }

    // 加载第二步模板
    public function getforget1(){
        $request=request();
        //获取用户输入的文本值
        $username=$request->param('username');
        $kg = 0;
        //查询数据库 把手机号显示在forget2模板
        $data=Db::table('users')->where('username',$username)->find();
        $res=Db::table('users_info')->where('uid',$data['id'])->find();
        if($res){
            $phone=substr_replace($res['phone'], '****', 3,4);
            $phone1=$res['phone'];
            $email=$res['email'];
            $id=$data['id'];
            $kg = 1;
            return $this->fetch("Forget/forget2",['phone'=>$phone,'kg'=>$kg,'email'=>$email,'phone1'=>$phone1,'id'=>$id]);
        }else{
            $user = preg_match("/^1[3-8]{1}[0-9]{9}$/", $username);
            if($user){
                $p=substr_replace($username,'****', 3,4);
                $kg = 2;
            }else{
                $p=$username;
                $kg = 3;
            }
            $phone1=$data['username'];
            $id=$data['id'];
            return $this->fetch("Forget/forget2",['phone'=>$p,'kg'=>$kg,'email'=>$p,'phone1'=>$phone1,'id'=>$id]);
        }
    }

    //发送手机号短信验证码
    public function postphone(){
        //创建请求对象
        $request = request();
        //接收手机号
        $phone = $request->param("p");
        //调用发送验证码公共函数ucpaas()
        return ucpaas($phone);
    }

    //校验验证码
    public function postcode(){
        //创建请求对象
        $request = request();
        //接收验证码
        $code=$request->param('code');
        $vcode = Cookie::get("vcode");
        if(isset($vcode)&& !empty($code)){
            if($vcode == $code){
                return 1;
            }else{
                return 0;
            }
        }elseif(empty($code)){
            return 2;
        }else{
            return 3;
        }
    }

    //验证邮箱
    public function postemail(){
        $request=request();
        $email=$request->param('e');
        $id=$request->param('id');
        $res=Db::table('users')->where('id',$id)->find();
        $token_str=$res['token_str'];
        $time=time();
        $activeStr="/forget/forget2/id/{$id}/token_str/{$token_str}/time/{$time}";
        $url="http://".$_SERVER['HTTP_HOST'].$activeStr;
        //将最终拼接好的链接地址转换为url编码
        $urlEncode=urlencode($url);
        $res=sendemail($email,"密码找回","<a href='$url'>{$urlEncode}</a>");
        if($res){
            echo 1;
        }
    }

    // 加载第三步模板
    public function getforget2(){
        //创建请求对象
        $request = request();
        $check=$request->param('check');
        $id=$request->param('id');
        if($check==0){
            return $this->fetch("Forget/forget3",['id'=>$id]);
        }else{
            $token_str=$request->param('token_str');
            $time=$request->param('time');
            return $this->fetch("Forget/forget3",['id'=>$id,'token_str'=>$token_str,'time'=>$time]);
        }
    }

    // 加载第四步模板
    public function postforget3(){
        $request=request();
        $password=md5($request->param('password'));
        $id=$request->param('id');
        $token_str=$request->param('token_str');
        $time=$request->param('time');
        if(isset($token_str)&&isset($time)){
            $now=time();
            $token_exptime = $time+1800;//过期时间为半小时
            if($now>$token_exptime){
                $this->error('链接过期，请重新修改密码','/login/index');
            }else{
                $res=Db::table('users')->where('id',$id)->find();
                if($token_str==$res['token_str']){
                    $token_str=md5($password.$id.$token_str.$time);
                    if(Db::table('users')->where('id',$id)->update(['password'=>$password,'token_str'=>$token_str])){
                        return $this->fetch("Forget/forget4");
                    }
                }
                return $this->error("链接已失效","/login/index");
            }
        }
        $res=Db::table('users')->where('id',$id)->find();
        if(Db::table('users')->where('id',$id)->update(['password'=>$password])){
            return $this->fetch("Forget/forget4");
        }
    }
}