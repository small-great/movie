<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
//轮播图管理模块控制器
class Carousel extends Allow
{
	//轮播图列表
	public function getlist() {
		//创建请求对象
		$request=request();
		//获取搜索词
		$k=$request->param("keywords");
		//查询
		$data = Db::table("carousel")->where("title","like","%".$k."%")->order("id desc")->paginate(2);
		$num = Db::table("carousel")->where("title","like","%".$k."%")->count();
		return $this->fetch("Carousel/carousel_list",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
	}

	//轮播图添加
	public function getadd() {
		return $this->fetch("Carousel/carousel_add");

	}

	//执行添加
	public function postinsert() {
		$request = request();

		$data = $request->except(["action"]);

		$file = $request->file("img_url");
		$result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
		if(true !== $result){
    		$this->error($result,"/carousel/add");
    	}
    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
    	$savename = $info->getSavename();
    	$ext = $info->getExtension();
        $img = \think\Image::open("./uploads/".$savename);
        $name = time()+rand(1,1000);
        $img->thumb(1416,440)->save("./uploads/imgpublic/".$name.".".$ext);
        //封装缩略图
        $data['img_url'] = "/uploads/imgpublic/".$name.".".$ext;
        //封装原图
        $data['img_opic']="./uploads/".$savename;
        //验证
        $result=$this->validate($request->param(),'Carousel');
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result,"/carousel/add");
        }
        //插入数据
      	$res = Db::table("carousel")->insert($data);
        if($res){
            $this->success("数据添加成功","/carousel/list");
        }else{
            $this->error("数据添加失败","/carousel/list");
        }
	}

	//修改状态上下架
	public function getchange() {
		$request = request();
		$id = $request->param('id');
		$display = $request->param('status');
		$res = Db::table("carousel")->where("id",$id)->setField("status",$display);
		if ($res) {
			$this->redirect("/carousel/list");
		}else{
			$this->error("修改状态失败");
		}

	}

	//删除
	public function getdelete() {
		$request = request();
		$id = $request->param("id");
		$info = Db::table("carousel")->where("id","{$id}")->find();
		$img_url=".".$info['img_url'];
		$img_opic= $info['img_opic'];
		if(Db::table("carousel")->where("id","{$id}")->delete()){
			unlink($img_url);
			unlink($img_opic);
			echo 1;
		}
	}

	//获取需要修改数据
	public function getedit() {
		$request = request();
		$id = $request->param("id");
		$info = Db::table("carousel")->where("id","{$id}")->find();
		return $this->fetch("Carousel/carousel_edit",['info'=>$info]);

	}


	//执行修改
	public function postupdate() {
		//创建对象
		$request = request();
		//获取id
		$id = $request->param("id");
		//获取需要修改数据,通过过滤字段
		$data = $request->except(["action","id"]);
		//图片文件上传
		$res = Db::table("carousel")->where("id",$id)->field("img_url")->select();
		$url = $res[0]["img_url"];
		$file = $request->file("img_url");
		if($file){
			//上传图片规则
			$result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
			//判断上传图片是否符合规则
			if (true !== $result) {
	    		$this->error($result,"/carousel/add");
	    	}
	    	//把上传的图片移动到自定义的文件夹
	    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
	    	//
	    	$savename = $info->getSavename();
	    	$ext = $info->getExtension();
	        $img = \think\Image::open("./uploads/".$savename);
	        $name = time()+rand(1,1000);
	        $img->thumb(1416,440)->save("./uploads/imgpublic/".$name.".".$ext);
	        $data['img_url']="/uploads/imgpublic/".$name.".".$ext;
		}
		//validate验证
		$result1=$this->validate($request->param(),'Carousel');
		if(true !== $result1){
            //阻止验证 ,显示提示错误信息
            $this->error($result1,"/carousel/edit");
        }
		//更新数据
		$result=Db::table("carousel")->where("id","{$id}")->update($data);
		if($result){
			if($file){
				//以相对路劲找url
				$u = '.'.$url;
				//删除原来的图片
				unlink($u);
			}
			$this->success("数据修改成功","/carousel/list");
		}else{
			$this->error("数据无修改,数据修改失败","/carousel/list");

		}
	}

	//批量删除
	public function getdels() {
		$arr=isset($_GET['arr'])?$_GET['arr']:'';
		if($arr == "") {
			echo "请至少选择一条数据";
			exit;
		}

		foreach($arr as $v) {
			if(Db::table("carousel")->where("id","{$v}")->delete()){
			}
		}
		echo 1;
	}

	//排序修改
	public function getsort(){
		//创建对象
		$request = request();
		//获取id
		$id = $request->param("id");
		//获取修改的排序
		$sort = $request->param("sort");
		$res = Db::table("carousel")->where("id","{$id}")->update(['sort'=>$sort]);
		if($res){
			return true;
		}else{
			return false;
		}
	}

}
