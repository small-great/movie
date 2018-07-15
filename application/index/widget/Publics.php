<?php
namespace app\index\widget;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
class Publics extends Controller{

	//加载公共头
	public function header(){
		$ads=Db::table('ads')->order('id desc')->limit(1)->find();
		$request=request();
		$uid=Session::get('uid');
		$rule = $request->routeInfo()['rule'][0];
		$data=Db::table('users_info')->where('uid',$uid)->find();
		if($data){
			$picurl=$data['picurl'];
		}else{
			$picurl='/static/homes/picture/7dd82a16316ab32c8359debdb04396ef2897.png';
		}
		return $this->fetch("Publics:header",['rule'=>$rule,'ads'=>$ads,'picurl'=>$picurl]);
	}

	//加载公共尾
	public function footer(){
		$links = Db::table("links")->where("display",0)->order("lsort asc")->select();
		return $this->fetch("Publics:footer",['links'=>$links]);
	}
}
 ?>