<?php
namespace app\admin\controller;
use think\Controller;
//导入Db
use think\Db;
class Order extends Allow
{
    //订单列表展示
	public function getlist(){
        //创建请求对象
        $request = request();
        //获取搜索词
        $k = $request->param('k');
 		$field = "o.id,o.relss,o.num,o.price,o.seat,o.status,o.uid,o.orderid,c.name as cname,m.ch_name as mname,u.username as uname";
 		$order = Db::table("order")->alias("o")->join("users u","u.id=o.uid")->join("cinema_details c","c.id=o.cid")->join("movies m","m.id=o.mid")->field($field)->where("orderid|u.username","like",'%'.$k.'%')->order("id desc")->paginate(8);
		return $this->fetch("Order/list",['order'=>$order,'k'=>$k]);
 		$field = "o.id,o.relss,o.num,o.price,o.seat,o.status,o.uid,c.name as cname,m.ch_name as mname,u.username as uname";
 		$order = Db::table("order")->alias("o")->join("users u","u.id=o.uid")->join("cinema_details c","c.id=o.cid")->join("movies m","m.id=o.mid")->field($field)->order("id desc")->paginate(8);
		return $this->fetch("Order/list",['order'=>$order]);
	}


	// 单个删除
	public function getdel(){
		//创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        //执行删除
        $res = Db::table("order")->where("id",$id)->delete();
        if($res){
            return true;
        }

    }

     // 订单修改
    public function getedit(){
		//创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        $field = "o.id,o.relss,o.num,o.price,o.seat,o.status,o.mid,o.cid,c.name as cname,m.ch_name as mname";
 		$order = Db::table("order")->alias("o")->join("cinema_details c","c.id=o.cid")->join("movies m","m.id=o.mid")->field($field)->where("o.id",$id)->find();
 		$mid = $order['mid'];
 		$cinema = Db::table("cinema_details")->field('name,id')->select();
 		$movie = Db::table('movies')->field('ch_name')->where('id',$mid)->find();
    	return $this->fetch("Order/edit",['order'=>$order,'cinema'=>$cinema,'movie'=>$movie]);
    }

    //执行订单修改
    public function postupdate(){
    	$request = request();
    	$data = $request->except('action');
    	$id = $request->param('id');
    	$res = Db::table('order')->where('id',$id)->update($data);
    	if ($res) {
    		$this->success("修改成功","/order/list");
    	} else {
    		$this->error("未做修改/修改失败","/order/edit/id/$id");
    	}

    }

    // 批量删除
    public function getdelete(){
    	$arr = isset($_GET['arr'])?$_GET['arr']:'';

    	if($arr==''){
            return false;
        }

        foreach($arr as $v){
            Db::table("order")->where("id",$v)->delete();
        }
	    return true;
    }
}


?>