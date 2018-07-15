<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Db;
class Register extends Controller
{
	// 加载前台注册模板
	public function getindex(){
	    return $this->fetch("Register/register");
	}

 	//ajax 获取手机号 查询数据库是否已经注册
    public function postphones(){
    	//创建请求对象
  		$request = request();
  		//接收手机号
  		$phone = $request->param("p");
  		//查询数据库
  		$res = Db::table("users")->where("username",$phone)->select();
  		$res1 = Db::table("users_info")->where("phone",$phone)->select();
  		if($res||$res1){
  			return true;
  		}else{
  			return false;
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

  	//手机验证码校验
  	public function postpcode(){
	  	//创建请求对象
	  	$request = request();
	  	//接收输入的验证码
	  	$pcode = $request->param("pcode");
	  	$vcode = Cookie::get("vcode");
	  	if(isset($vcode)&& !empty($pcode)){
			if($vcode == $pcode){
				return 1;
			}else{
				return 0;
			}
		}elseif(empty($pcode)){
			return 2;
		}else{
			return 3;
		}
  	}

  	//开始手机注册
  	public function postmobile(){
	  	//创建请求对象
	  	$request = request();
	  	//接收参数
	  	$data = array();
	  	$data['username'] = $request->param("mobile");
	  	$data['password'] = md5($request->param("passwd"));
	  	$data['addtime'] = time();
	  	$data['token'] = 1;
	  	if(Db::table("users")->insert($data)){
	  		$this->success("注册成功","/login/index");
	  	}
  	}

  	//检测邮箱号是否注册激活
  	public function postmails(){
  		//创建请求对象
  		$request = request();
  		//接收手机号
  		$email = $request->param("m");
  		//查询数据库
  		$res = Db::table("users")->where("username",$email)->select();
  		$res1 = Db::table("users_info")->where("email",$email)->select();
  		if($res||$res1){
  			return true;
  		}else{
  			return false;
  		}
  	}

  	//邮箱 验证码校验
  	public function postmcode(){
	  	//创建请求对象
	  	$request = request();
	  	//接收输入的验证码
	  	$mcode = $request->param("mcode");
	  	if($mcode==''){
	  		return 2;
	  	}
	  	//校验验证码
    	if(captcha_check($mcode)){
    		return 1;
    	}else{
    		return 0;
    	}
  	}

  	//开始发送邮件激活链接
  	public function postmail(){
  		//创建请求对象
	  	$request = request();
	  	//接收参数
	  	$data = array();
	  	$data['username'] = $request->param("email");
	  	$data['password'] = md5($request->param("passwd"));
	  	$data['addtime'] = time();
	  	$token_str=md5($data['username'].$data['password'].$data['addtime']);//生成token_str字符串
		$data['token_str'] = $token_str;
	  	$res = Db::table("users")->insert($data);
	  	$lastid = Db::table("users")->getLastInsID();
	  	//发送邮箱主题
	  	$title = "注册账号激活邮件";
	  	//拼接我们要跳转的连接地址
	  	$activeStr="/register/active/username/{$data['username']}/token_str/{$token_str}";
		$url="http://".$_SERVER['HTTP_HOST'].$activeStr;
		//将最终拼接好的链接地址转换为url编码
		$urlEncode=urlencode($url);
		//发送邮件的内容  激活链接
		$content=<<<EOF
	欢迎{$data['username']}用户使用账号激活功能
	请点击链接激活账号：
	<a href='{$url}' target='_blank'>{$urlEncode}</a> <br />
	(该链接在24小时内有效)
	如果上面不是链接形式，请将地址复制到您的浏览器(例如IE)的地址栏再访问。
EOF;
		try{
			$to = $data['username'];//向用户发送邮件
			$res1 = sendemail($to,$title,$content);
			if($res && $res1){
				$this->success('发送邮件成功，请邮箱激活使用', '/login/index');
			}else{
				Db::table("users")->where("id",$lastid)->delete();
				$this->error('发送邮件失败，请重新发送');
			}
		}catch(phpmailerException $e){
			die('邮件服务器错误:').$e->errorMessage();
		}
  	}

  	//邮箱激活 正式注册
  	public function getactive(){
  		//创建请求对象
	  	$request = request();
  		$token_str = $request->param('token_str');
		$username=$request->param('username');
		$res = Db::table("users")->where("username",$username)->find();
		if($res&&$res['token']==0){
			//需要检测是否超时http://www.project.com/login/index
			$now=time();
			$token_exptime = $res['addtime']+24*3600;//过期时间为一天
			if($now>$token_exptime){
				Db::table("users")->where("token_str",$token_str)->delete();
				$this->error('激活码过期，请重新注册','/register/index');
			}else{
				//实现激活操作
				$token_str=md5($res['username'].$res['password'].time());
				$result = Db::table("users")->where("username",$username)->update(["token"=>1,'token_str'=>$token_str]);
				if($result){
					$this->success('注册激活成功，立即登陆','/login/index');
				}else{
					Db::table("users")->where("id",$res['id'])->delete();
					$this->error('注册激活失败，请重新注册','/register/index');
				}
			}
		}elseif($res&&$res['token']==1){
			$this->success('您已经激活过了,去登陆吧', '/login/index');
		}else{
			Db::table("users")->where("token_str",$token_str)->delete();
			$this->error('激活失败，没有找到要激活的用户！！！', '/register/index');
		}
  	}

}
?>