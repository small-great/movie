<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

//前台订单模块控制器
class Morder extends Allow
{
	//添加订单方法
	public function getindex(){
		// 启动事务
		Db::startTrans();
		try{
			//开启并链接redis
	    	$redis=new \think\cache\driver\Redis();
	    	$uid = Session::get("uid");
	    	$uorder = $redis->get($uid."phone");
	    	$arr_id = $redis->get($uorder.'arr_id');
	    	$array_select = $redis->get($uorder.'array_select');
	    	if(is_array($array_select)){
	    		$array_select = implode(' ', $array_select);
	    	}
	    	$order_info = $redis->get($uorder.'order_info');
	    	$order_num = $redis->get($uorder.'order_num');
	    	$order = array();
	    	$order['orderid'] = $order_info->order_id;
	    	$order['uid'] = $uid;
	    	$order['mid'] = $order_info->mid;
	    	$order['cid'] = $order_info->cid;
	    	$order['seat'] = $order_info->hallname.$array_select;
	    	$order['price'] = $order_info->price;
	    	$order['num'] = $order_num;
	    	$order['relss'] = $order_info->time;
	    	$order['status'] = 0;
	    	$movie = Db::table("movies")->where("id",$order_info->mid)->find();
		    $surplus = $movie['surplus']-$order_num;
		    //判断更改的数据大于0才能操作
		    if($surplus>0){
	    		//添加订单
	    		$res = Db::table("order")->insert($order);
		    	if($res){
		    		//修改电影表的售票剩余量
		    		Db::table("movies")->where("id",$order_info->mid)->update(["surplus"=>$surplus]);
		    		Db::commit();//成功提交事务
		    	}
		    }else{
		    	return "<script>alert('该电影没票了,请买其他的票');location.href('/')</script>";
		    }
		} catch (\Exception $e) {
			//失败回滚事务
			Db::rollback();
		}
		//var_dump($order_info);
		return $this->fetch("Morder/index",["order_info"=>$order_info,"select"=>$array_select,'num'=>$order_num]);
	}

	//调用支付接口
	public function getpay(){

		require_once("../extend/Org/Util/Pay/alipay.config.php");
		/**************************请求参数**************************/
		$uid = Session::get("uid");
		//开启并链接redis
	    $redis=new \think\cache\driver\Redis();
	    //存储用户手机号
	    $uorder = $redis->get($uid.'phone');
		//订单id
		$orders = $redis->get($uorder.'order_info');
		$order_id = $orders->order_id;
		//var_dump($orders);die;
		//商户订单号，商户网站订单系统中唯一订单号，必填
		$out_trade_no = $order_id;
		 //订单名称，必填
		$subject = '电影票';
		//付款金额，必填
		$total_fee = '0.01';
		//商品描述，可空
		$body = $orders->ch_name;
		/************************************************************/
		//构造要请求的参数数组，无需改动
		$parameter = array(
			"service"       => $alipay_config['service'],
			"partner"       => $alipay_config['partner'],
			"seller_id"  => $alipay_config['seller_id'],
			"payment_type"	=> $alipay_config['payment_type'],
			"notify_url"	=> $alipay_config['notify_url'],
			"return_url"	=> $alipay_config['return_url'],

			"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
			"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
			"out_trade_no"	=> $out_trade_no,
			"subject"	=> $subject,
			"total_fee"	=> $total_fee,
			"body"	=> $body,
			"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
			//其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
	        //如"参数名"=>"参数值"
		);
		//建立请求
		$alipaySubmit = new \Org\Util\Pay\lib\AlipaySubmit($alipay_config);
		//$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}

	//支付完成后跳转的页面
	public function getconfirm(){
		//开启并链接redis
	    $redis=new \think\cache\driver\Redis();
	    $uid = Session::get("uid");
		$uorder = $redis->get($uid.'phone');
		$orders = $redis->get($uorder.'order_info');
		$num = $redis->get($uorder.'order_num');
		$array_select = $redis->get($uorder.'array_select');
		if(is_array($array_select)){
    		$select = implode(' ', $array_select);
    	}
		$order_id = $orders->order_id;
    	return $this->fetch("Morder/confirm",["orders"=>$orders,"select"=>$select,"num"=>$num]);
	}

	//超时未支付删除订单缓存文件
	public function getdelete(){
		//开启并链接redis
	    $redis=new \think\cache\driver\Redis();
	    $uid = Session::get("uid");
	    $uorder = $redis->get($uid.'phone');
	    $order_info = $redis->get($uorder.'order_info');
	    //var_dump($order_info);die;
	    $order_id = $order_info->order_id;
	    $redis->rm($uorder.'order_info');
	    $redis->rm($uorder.'order_num');
	    $redis->rm($uorder.'array_select');
	    if(Db::table("order")->where("orderid",$order_id)->delete()){
	    	return $this->redirect("/");
	    }
	}

}

?>