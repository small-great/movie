<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
//影片管理模块控制器
class MovieImage extends Allow
{

	//影片列表页
	public function getlist() {
		//创建请求对象
		$request=request();
		$k=$request->param("keywords");
		$data = Db::table("movies")->where("ch_name","like","%".$k."%")->where("display",0)->order("id desc")->paginate(8);
		return $this->fetch("MovieImage/list",['data'=>$data,'k'=>$k,'request'=>$request->param()]);
	}

	//查导演方法
	public function getdirector(){
		//创建请求对象
		$request=request();
		$e=$request->param('e');
		$arr=$_GET['arr'];
		$mid=$arr[$e];
		//查导演
		$director=Db::table('director')->where('mid',$mid)->field('director,picurl,id')->find();
		if($director){
			$str = '<div name="div'.$director['id'].'"><div style="height:200px"><img src="'.$director['picurl'].'" width="150px;" height="220px;"><a href="javascript:;" onclick="ddelete('.$director['id'].')" style="position:relative;bottom:95px;" title="删除"><i class="icon-remove"></i></a></div><h2>'.$director['director'].'</h2></div>';
			return $str;
		}else{
			return false;
		}

	}

	//查演员方法
	public function getactor(){
		//创建请求对象
		$request=request();
		$e=$request->param('e');
		$array=$_GET['array'];
		$mid=$array[$e];
		//查演员
		$actor=Db::table('actor')->where('mid',$mid)->field('actor,picurl,id')->select();
		if($actor){
			$str = array();
			foreach ($actor as $k => $v) {
			$str[$k] = '<div style="float:left;margin-left:25px;" name="div'.$v['id'].'"><div><img src="'.$v['picurl'].'" width="150px;" height="220px;"><a href="javascript:;" onclick="del('.$v['id'].')" style="position:relative;bottom:95px;" title="删除"><i class="icon-remove"></i></a></div><div><span style="font-size:16px;">'.$v['actor'].'</span></div></div>';

			}
			$str=implode('', $str);
			return $str;
		}else{
			return false;
		}

	}

	//删除演员图片
	public function getadelete(){
		$request=request();
		$id=$request->param('id');
		$res=Db::table('actor')->where('id',$id)->find();
		$picurl=$res['picurl'];
		$opic=$res['opic'];
		if($res){
			Db::table('actor')->where('id',$id)->delete();
			unlink(".".$picurl);
            unlink($opic);
			return true;
		}else{
			return false;
		}
	}

	//删除导演图片
	public function getddelete(){
		$request=request();
		$id=$request->param('id');
		$res=Db::table('director')->where('id',$id)->find();
		$picurl=$res['picurl'];
		$opic=$res['opic'];
		if($res){
			Db::table('director')->where('id',$id)->delete();
			unlink(".".$picurl);
            unlink($opic);
			return true;
		}else{
			return false;
		}
	}

	//加载影片添加摸板
	public function getadd() {
		return $this->fetch("MovieImage/add");
	}

	//通过ajax 传来的关键字 查询列出相关电影
	public function getselect(){
		//创建请求对象
		$request=request();
		//接收搜索关键字
		$m=$request->param("m");
		if($m==''){
			return false;
		}
		$data = Db::table("movies")->where("ch_name|en_name","like","%".$m."%")->select();
		if(!$data){
			//如果没有电影资源 返回2给ajax去判断
			return 2;
		}
		return $data;
	}

	//执行添加导演
	public function postinsert() {
		//创建请求对象
		$request = request();
		$data = $request->except(["action","movie"]);
		$files = request()->file('file');
		if($files){
			$arr=array();
			foreach($files as $file){
			$result = $this->validate(["files"=>$file],["files"=>"require|image"],["files.require"=>"上传文件不能为空","files.image"=>"非法图像文件"]);
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
		    $img->thumb(258,258)->save("./uploads/directorpic/".$name.".".$ext);
		    $data['picurl'] = "/uploads/directorpic/".$name.".".$ext;
		    $arr[]=$data;
		}
		}else{
			$this->error("图片不能为空");
		}
		$director['mid']=$arr[0]['mid'];
		$director['director']=$arr[0]['director'];
		$director['opic']=$arr[0]['opic'];
		$director['picurl']=$arr[0]['picurl'];

		$arrs=array_splice($arr,1);
		foreach($arrs as $key=>$v){
			$arrs[$key]['actor']=$v['actor'][$key];
			unset($arrs[$key]['director']);
		}
		foreach($arrs as $v){
			Db::table('actor')->insert($v);
		}
        //判断数据库是否已经存在图片 有 删除原图
       	$result=Db::table('director')->where('mid',$director['mid'])->find();
    	if($result){
    		$picurl=$result['picurl'];
			$opic=$result['opic'];
			Db::table('director')->where('1=1')->delete();
			unlink(".".$picurl);
        	unlink($opic);
		}
		//执行导演图片添加
        if(Db::table('director')->insert($director)){
        	$this->success("图片添加成功","/movieimage/list");
        }else{
        	$this->error("图片添加失败");
        }
	}
}
?>