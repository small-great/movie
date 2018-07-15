<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cookie;
use think\Session;
use think\Cache;
//前台选座模块控制器
class Seat extends Controller
{
	//加载选座信息页
	public function index(){
		$request = request();
		$rid = $request->param("rid");
		$mid = $request->param("mid");
		$cid = $request->param("cid");
		$hid = $request->param("hid");
		//开启并链接redis
  		$redis=new \think\cache\driver\Redis();
		$movie = Db::table("movies")->where("id",$mid)->find();
		$relss = Db::table("relss")->where("id",$rid)->find();
		$seat = Db::table("halls")->where("id",$hid)->find();
		$cinema = Db::table("cinema_details")->where("id",$cid)->find();
		$hallLayout = explode(',',$seat['hallLayout']);
		//删除数组里最后的一个 ','
		unset($hallLayout[count($hallLayout)-1]);
		foreach ($hallLayout as $key => $value) {
			$hallLayout[$key] = array();
			for($i=0;$i<strlen($value);$i++){
				$hallLayout[$key][] = $value[$i];
			}
		}
		//初始化订单数组
		$order = array();
		$order["mid"] = $mid;
		$order["hid"] = $hid;
		$order["cid"] = $cid;
		$order["rid"] = $rid;
		$order["order_id"] = time().rand(1000,9999);
		$order["cname"] = $cinema['name'];
		$order["hallname"] = $seat['hallname'];
		$order["price"] = $movie['m_price'];
		$order["ch_name"] = $movie['ch_name'];
		$order["address"] = $cinema['area'].$cinema['address'];
		$order["time"] = $relss['day'].' '.$relss['start_time'].'-'.$relss['end_time'];
		$order = json_encode($order);
		$selected = $redis->handler()->smembers("selected:".$rid);
		return $this->fetch("Seat/index",['seat'=>$seat,'hallLayout'=>$hallLayout,"movie"=>$movie,'relss'=>$relss,'cinema'=>$cinema,'order'=>$order,'selected'=>$selected]);
	}

	//判断该手机号用户是否存在
	public function postuserphone(){
  	    //创建请求对象
  	    $request = request();
  	    //接收手机号
  	    $p = $request->param("p");
  	    //查询数据库
  	    $res = Db::table("users")->where("username",$p)->find();
  	    $result = Db::table("users_info")->where("phone",$p)->find();
  	    if($res||$result){
  	    	//开启并链接redis
	    	$redis=new \think\cache\driver\Redis();
  	    	if($res){
				Session::set("uid",$res['id']);
				$redis->set($res['id'].'phone',$p);
  	    	}else{
  	    		Session::set("uid",$result['uid']);
  	    		$redis->set($result['id'].'phone',$p);
  	    	}
            return true;//返回正确的结果
  	    }else{
  		    return false;//返回用户名不存在
  	    }
    }

	//发送手机号验证码
  	public function postphone(){
  		//创建请求对象
  		$request = request();
  		//接收手机号
  		$phone = $request->param("p");
  		$uid = Session::get("uid");
  		if(isset($uid)){
  			//开启并链接redis
	    	$redis=new \think\cache\driver\Redis();
	    	//存储用户手机号
	    	$redis->set($uid.'phone',$phone);
  		}else{
  			$redis->set('uidphone',$phone);
  		}
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
	  	//return $pcode;
	  	if(isset($vcode)&&!empty($pcode)){
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

  	//选座  把座位形式 1_2,2_1,3_1 和订单信息等等都存在 redis里面
  	public function getselect(){
  		$arr = $_GET['arr'];
  		$array = $_GET['array'];
  		$order = json_decode($_GET['order']);
  		//var_dump($order);
  		//开启并链接redis
    	$redis=new \think\cache\driver\Redis();
    	// //获取用户数据
    	$uid = Session::get("uid");
    	$uorder = $redis->get($uid.'phone');
    	// 存储订单信息
    	//遍历$arr
		foreach($arr as $key=>$v){
			$redis->handler()->sadd("selected:".$order->rid,$v);
		}
    	$redis->set($uorder.'array_select',$array);
    	$redis->set($uorder.'order_info',$order);
    	$redis->set($uorder.'order_num',count($arr));
    	$res = Db::table("users")->where("username",$uorder)->find();
    	$result = Db::table("users_info")->where("phone",$uorder)->find();
    	if($res){
    		Session::set("username",$res['username']);
    	}
    	if($result){
    		Session::set("username",$result['phone']);
    	}
  		return $uorder;
  	}
}

?>