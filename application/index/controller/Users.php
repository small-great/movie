<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Users extends Allow
{
	// 加载个人中心模板
	public function index(){
		//创建请求对象
		$request=request();
		$id=$request->param('id');
		$data=Db::table('users_info')->where('uid',$id)->find();
		$username=Session::get('username');
		$count=Db::table('mailer')->where('username',$username)->where('status',0)->count();
		$redis=new \think\cache\driver\Redis();
		$redis->set('count',$count);
		$count=$redis->get('count');
		//如果查询到详情页加载详情页 没有就加载添加详情页
		if($data){
			return $this->fetch("Users/info",['data'=>$data,'count'=>$count]);
		}else{
			return $this->fetch("Users/index",['id'=>$id,'count'=>$count]);
		}
	}

	//添加用户详情
    public function insert(){
        //创建请求对象
        $request=request();
        $data=$request->except(['action','uid']);
        $data['hobby']=isset($data['hobby'])?implode('、',$data['hobby']):'';
        $data['uid'] = $request->param('uid');
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        $result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
        if(true !== $result){
            $this->error($result);
        }
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
        $savename = $info->getSavename();
        $ext = $info->getExtension();
        $img = \think\Image::open("./uploads/".$savename);
        //存放原图
        $data['opic']="./uploads/".$savename;
        $name = time()+rand(1,1000);
        $img->thumb(258,258)->save("./uploads/userpic/".$name.".".$ext);
        $data['picurl'] = "/uploads/userpic/".$name.".".$ext;
        //正则
        $data['desc'] = htmlspecialchars($data['desc']);
        $data['job'] = htmlspecialchars($data['job']);
        $url="/users/index/".$data['uid'].".html";
        if(Db::table('users_info')->insert($data)){
            $this->redirect($url);
        }else{
            $this->redirect("/users/index/{$data['uid']}.html");
        }
    }

	//修改用户详情
	public function update(){
		//创建请求对象
		$request=request();
		$data=$request->except(['action']);
		$data['hobby']=isset($data['hobby'])?implode('、',$data['hobby']):'';
		$info=Db::table('users_info')->where('id',$data['id'])->find();
		$pic=".".$info['picurl'];
        $opic=$info['opic'];
        $uid = $info['uid'];
        // 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('file');
		if($file){
	        $result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
	        if(true !== $result){
	            $this->error($result);
	        }
	        $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
	        $savename = $info->getSavename();
	        $ext = $info->getExtension();
	        $img = \think\Image::open("./uploads/".$savename);
	        //存放原图
	        $data['opic']="./uploads/".$savename;
	        $name = time()+rand(1,1000);
	        $img->thumb(258,258)->save("./uploads/userpic/".$name.".".$ext);
	        $data['picurl'] = "/uploads/userpic/".$name.".".$ext;
		}
		$url = "/users/index/".$uid.".html";
		if(Db::table("users_info")->where('id',$data['id'])->update($data)){
			//判断是否上传了图片 上传就执行删除
			if($file){
				unlink($pic);
				unlink($opic);
			}
            $this->redirect($url);
        }else{
            $this->redirect($url);
        }
	}

	//加载前台站内信
	public function getreq(){
		//创建请求对象
		$request=request();
		$username=Session::get('username');
		$data=Db::table('mailer')->where('username',$username)->select();
		$redis=new \think\cache\driver\Redis();
		$count=$redis->get('count');
		return $this->fetch("Users/mailer",['data'=>$data,'count'=>$count]);
	}

	//加载站内信内容模板
	public function getshow(){
		//创建请求对象
		$request=request();
		$id=$request->param('id');
		$username=Session::get('username');
		$data=Db::table('mailer')->where('id',$id)->find();
		Db::table('mailer')->where('id',$id)->update(['status'=>1]);
		$redis=new \think\cache\driver\Redis();
		$count=Db::table('mailer')->where('username',$username)->where('status',0)->count();
		$redis->set('count',$count);
		return $this->fetch("Users/show",['data'=>$data]);
	}

	//删除站内信
	public function postmaildel(){
		//创建请求对象
		$request=request();
		$id=$request->param('id');
		if(Db::table('mailer')->where('id',$id)->delete()){
			return true;
		}
	}

	//修改已读消息后页面状态
	public function postmailupdate(){
		//创建请求对象
		$request=request();
		$id=$request->param('id');
		if(Db::table('mailer')->where('id',$id)->where('status',0)->find()){
			return true;
		}
	}

	//个人中心订单展示
	public function getorder(){
		$uid=Session::get('uid');
		$field = "o.id,o.relss,o.orderid,o.num,o.price,o.seat,o.status as status,o.status,o.uid,c.name as cname,m.ch_name as mname";
 		$orders = Db::table("order")->alias("o")->join("users u","u.id=o.uid")->join("cinema_details c","c.id=o.cid")->join("movies m","m.id=o.mid")->field($field)->order("id desc")->where("uid",$uid)->paginate(8);
 		$redis=new \think\cache\driver\Redis();
		$count=$redis->get('count');
		// var_dump($orders);die;
		return $this->fetch("Users/morder",['orders'=>$orders,'count'=>$count]);
	}

	//个人中心订单删除
	public function getorderdel(){
		//创建请求对象
		$request=request();
		$orderid=$request->param('orderid');
 		$res = Db::table("order")->where("orderid",$orderid)->delete();
 		if($res){
 			return true;
 		}
	}

	//个人中心订单退票
	public function getorderdelete(){
		$request=request();
		$orderid=$request->param('orderid');
		$res = Db::table("order")->where("orderid",$orderid)->update(["status"=>3]);
		if($res){
			return $orderid;
		}
	}
}
?>
