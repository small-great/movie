<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
//影片管理模块控制器
class Movie extends Allow
{
	//影片列表页
	public function getlist() {
		$request=request();
		$k=$request->param("keywords");
		$data = Db::table("movies")->where("ch_name","like","%".$k."%")->order("id desc")->paginate(8);
		$num = Db::table("movies")->where("ch_name","like","%".$k."%")->count();
		return $this->fetch("Movie/movie_list",['num'=>$num,'data'=>$data,'request'=>$request->param(),'k'=>$k]);
	}

	//修改状态  上下架
	public function getchange() {
		$request = request();
		$id = $request->param('id');
		$display = $request->param('display');
		$res = Db::table("movies")->where("id",$id)->setField("display",$display);
		if ($res) {
			$this->redirect("/movie/list");
		}else{
			$this->error("修改状态失败");
		}
	}

	//加载影片添加摸板
	public function getadd() {
		return $this->fetch("Movie/movie_add");
	}

	//执行添加
	public function postinsert() {
		$request = request();
		$data = $request->except(["action"]);
		$data['display'] = 0;
		$data["content"] = htmlspecialchars($data["content"]);
		if(isset($data['m_type'])){
			$data['m_type']=implode("、", $data['m_type']);
		}else{
			$data['m_type']="其他";
		}
		//图片文件上传
		$file = $request->file("picurl");
		$result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
		if(true !== $result){
    		$this->error($result,"/movie/add");
    	}
    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
    	$savename = $info->getSavename();
    	$ext = $info->getExtension();
        $img = \think\Image::open("./uploads/".$savename);
        $name = time()+rand(1,1000);
        $img->thumb(160,220)->save("./uploads/imgpublic/".$name.".".$ext);
        //封装缩略图
        $data['picurl'] = "/uploads/imgpublic/".$name.".".$ext;
        //封装原图
        $data['opicurl']="./uploads/".$savename;
        //验证
        $result=$this->validate($request->param(),'Movie');
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result,"/movie/add");
        }
        //插入数据
      	$res = Db::table("movies")->insert($data);
        if($res){
            $this->success("数据添加成功","/movie/list");
        }else{
            $this->error("数据添加失败","/movie/list");
        }
	}

	//单条数据影片删除
	public function getdelete() {
		$request = request();
		$id = $request->param("id");
		$info = Db::table("movies")->where("id","{$id}")->find();
		$picurl=".".$info['picurl'];
		$opicurl= $info['opicurl'];
		if(Db::table("movies")->where("id","{$id}")->delete()){
			unlink($picurl);
			unlink($opicurl);
			echo 1;
		}
	}

	//获取需要修改数据
	public function getedit() {
		$request = request();
		$id = $request->param("id");
		$info = Db::table("movies")->where("id","{$id}")->find();
		return $this->fetch("Movie/movie_edit",['info'=>$info]);

	}

	//执行修改
	public function postupdate() {
		//创建对象
		$request = request();
		//获取id
		$id = $request->param("id");
		//获取需要修改数据,通过过滤字段
		$data = $request->except(["action","m_type1","id"]);
		$data["content"] = htmlspecialchars($data["content"]);
		$m_type=$request->param("m_type1");
		if(isset($data['m_type'])){
			$data['m_type']=implode("、",$data['m_type']);
		}else{
			$data['m_type']=$m_type;
		}
		//图片文件上传
		$res = Db::table("movies")->where("id",$id)->field("picurl")->select();
		$url = $res[0]["picurl"];
		$file = $request->file("picurl");
		if ($file) {
			//上传图片规则
			$result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
			//判断上传图片是否符合规则
			if (true !== $result) {
	    		$this->error($result,"/movie/add");
	    	}
	    	//把上传的图片移动到自定义的文件夹
	    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
	    	//
	    	$savename = $info->getSavename();
	    	$ext = $info->getExtension();
	        $img = \think\Image::open("./uploads/".$savename);
	        $name = time()+rand(1,1000);
	        $img->thumb(160,220)->save("./uploads/imgpublic/".$name.".".$ext);
	        $data['picurl']="/uploads/imgpublic/".$name.".".$ext;
		}
		//validate验证
		$result1=$this->validate($request->param(),'Movie');
		if(true !== $result1){
            //阻止验证 ,显示提示错误信息
            $this->error($result1,"/movie/edit");
        }
		//更新数据
		$result=Db::table("movies")->where("id","{$id}")->update($data);
		if ($result) {
			if($file){
				//以相对路经找url
				$u = '.'.$url;
				//删除原来的图片
				unlink($u);
			}
			$this->success("数据修改成功","/movie/list");
		}else{
			$this->error("数据无修改,数据修改失败","/movie/list");
		}
	}

	//查看详情
	public function getinfo(){
		$request = request();
		$id = $request->param("id");
		$info = Db::table("movies")->where("id","{$id}")->find();
		return $this->fetch("/movie/movie_info",['info'=>$info]);
	}

	//批量删除
	public function getdels() {
		$arr=isset($_GET['arr'])?$_GET['arr']:'';
		if($arr == "") {
			echo "请至少选择一条数据";exit;
		}

		foreach($arr as $v) {
			if(Db::table("movies")->where("id","{$v}")->delete()){
			}
		}
		echo 1;
	}
}
?>