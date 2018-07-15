<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
//友情链接模块
class Link extends Allow
{
	//显示列表
	public function getlist() {
		$request=request();
		$k=$request->param("keywords");
		$k1=$request->param("keywords1");
		$res=Db::table("links")->select();
		if($res){
		$data = Db::table("links")->where("title","like","%".$k."%")->where("k_type","like","%".$k1."%")->order("id desc")->paginate(5);
		$num = Db::table("links")->where("title","like","%".$k."%")->where("k_type","like","%".$k."%")->count();
		}
		return $this->fetch("/Link/link_list",['num'=>$num,'data'=>$data,'request'=>$request->param(),'k'=>$k,'k1'=>$k1,'res'=>$res]);
	}

	//修改状态  上下架
	public function getchange() {
		var_dump("post");	
		$request = request();
		$id = $request->param('id');
		$display = $request->param('display');
		$res = Db::table("links")->where("id",$id)->setField("display",$display);
		if ($res) {	
			$this->redirect("/link/list");
		}else{	
			$this->error("修改状态失败");
		}

	}

	//添加
	public function getadd() {	
		return $this->fetch("/Link/link_add");

	}

	//执行添加
	public function postinsert() {
		$request = request();
		$data = $request->except(["action"]);
		$data["k_addtime"] = strtotime($data["k_addtime"]);
		$data["desc"] = htmlspecialchars($data["desc"]);
		$file = $request->file("k_pic");
		$result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
		if(true !== $result){
    		$this->error($result,"/link/add");
    	}
    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
    	$savename = $info->getSavename();
    	$ext = $info->getExtension();
        $img = \think\Image::open("./uploads/".$savename);
        $name = time()+rand(1,1000);
        $img->thumb(135,45)->save("./uploads/imgpublic/".$name.".".$ext);
        //封装缩略图
        $data['k_pic'] = "/uploads/imgpublic/".$name.".".$ext;
        //封装原图
        $data['k_opic']="./uploads/".$savename;
        //验证
        $result=$this->validate($request->param(),'Link');
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result,"/link/add");
        }
		
		$res = Db::table("links")->insert($data);
		if($res){	
			$this->success("添加成功,请继续添加顺序","/link/list");

		}else{	
			$this->error("数据添加失败","/link/list");

		}
	}

	//删除
	public function getdelete() {	
		$request = request();
		$id = $request->param("id");
		if(Db::table("links")->where("id",$id)->delete()){
			echo 1;
		}
	}

	//批量删除
	public function getdels() {	
		$arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        foreach($arr as $v){
            Db::table("links")->where("id",$v)->delete();
        }
        return true;
	}

	//获取需要修改数据
	public function getedit() {	
		$request = request();
		$id = $request->param("id");
		$info = Db::table("links")->where("id",$id)->find();
		return $this->fetch("Link/link_edit",['info'=>$info]);
	}

	//执行修改
	public function postupdate() {	
		$request=request();
		$id = $request->param("id");
		$data = $request->except(["action"]);
		$data['k_addtime']=strtotime($data["k_addtime"]);
		$data["desc"] = htmlspecialchars($data["desc"]);
		$result1=$this->validate($request->param(),'Link');
		if(true !== $result1){
            //阻止验证 ,显示提示错误信息
            $this->error($result1,"/link/edit");
        }
        $result = Db::table("links")->where("id",$id)->update($data);
        if($result) {	
        	$this->success("数据修改成功","/link/list");
        }else{	
        	$this->error("数据修改失败","/link/list");
        }

	}

	//排序修改
	public function getlsort(){
		//创建对象
		$request = request();
		//获取id
		$id = $request->param("id");
		//获取修改的排序
		$lsort = $request->param("lsort");
		$res = Db::table("links")->where("id","{$id}")->update(['lsort'=>$lsort]);
		if($res){
			return true;
		}else{
			return false;
		}
	}
}
?>