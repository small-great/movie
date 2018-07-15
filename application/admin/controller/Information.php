<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
//资讯管理模块控制器
class Information extends Allow
{
	//资讯列表页
	public function getlist(){
		//创建请求对象
		$request=request();
		//接收搜索关键字
		$k=$request->param("keywords");
		$field ="i.id as id,mid,title,descr,m.ch_name as ch_name,i.display as display,pic,i.hotnum as hotnum,newstime";
		$data = Db::table("information")->alias('i')->join("movies m","i.mid=m.id")->field($field)->where("title","like","%".$k."%")->order("i.id desc")->paginate(8);
		return $this->fetch("Information/information_list",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
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

	//修改状态  上下架
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和display
        $id = $request->param('id');
        $display = $request->param('display');
        //执行修改
        $res = Db::table("information")->where('id', $id)->update(['display' => $display]);
        if($res){
            return true;
        }
    }

	//加载资讯添加摸板
	public function getadd() {
		return $this->fetch("Information/information_add");
	}

	//执行添加
	public function postinsert() {
		//创建请求对象
		$request = request();
		//获取请求参数
		$data = $request->only(["title","mid","descr","newstime"]);
		$data['title'] = htmlspecialchars($data['title']);
		$data['newstime'] = strtotime($data["newstime"]);
		$title = $this->validate(
			["title"=>$data['title']],["title"=>"require|unique:information"],
			["title.require"=>"标题不能为空","title.unique"=>"标题不能重复相同"]
		);
		if(true !== $title){
    		$this->error($title);die;
    	}
    	if(!$data['newstime']){
			$this->error("发布时间不能为空");die;
		}
		//图片文件上传
		$file = $request->file("pic");
		if($file){
			$result = $this->validate(["file1"=>$file],["file1"=>"require|image"],["file1.require"=>"上传文件不能为空","file1.image"=>"非法图像文件"]);
			if(true !== $result){
	    		$this->error($result);die;
	    	}
	    	//移动到指定目录
	    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
	    	$savename = $info->getSaveName();
	    	$ext = $info->getExtension();
	    	//图像处理
	        $img = \think\Image::open("./uploads/".$savename);
	        $name = time()+rand(1,1000);
	        $img->thumb(100,100)->save("./uploads/infor_img/".$name.".".$ext);
	        //存原图 以便删除
	        $data["opic"]= "./uploads/".$savename;
	        $data['pic'] = "/uploads/infor_img/".$name.".".$ext;
		}
        //插入数据
      	$res = Db::table("information")->insert($data);
        if($res){
            $this->success("资讯添加成功","/information/list");
        }else{
            $this->error("资讯添加失败");
        }
	}

	//获取需要修改数据
	public function getedit() {
		//创建请求对象
		$request = request();
		//获取修改数据的id
		$id = $request->param("id");
		//查询修改的数据 并加载模板
		$info = Db::table("information")->where("id",$id)->find();
		//查询关联的电影表数据
		$data = Db::table("movies")->where("id",$info['mid'])->find();
		return $this->fetch("Information/information_edit",['info'=>$info,"data"=>$data]);
	}

	//执行修改
	public function postupdate() {
		//创建请求对象
		$request = request();
		//获取修改的id
		$id = $request->param("id");
		//获取请求参数
		$data = $request->only(["title","mid","descr","newstime"]);
		$data['title'] = htmlspecialchars($data['title']);
		$data['newstime'] = strtotime($data["newstime"]);
		$title = $this->validate(
			["title"=>$data['title']],["title"=>"require"],
			["title.require"=>"标题不能为空"]
		);
		if(true !== $title){
    		$this->error($title);die;
    	}
    	if(!$data['newstime']){
			$this->error("发布时间不能为空");die;
		}
		//图片文件上传
		$file = $request->file("pic");
		if($file){
			$result = $this->validate(["file1"=>$file],["file1"=>"require|image"],["file1.require"=>"上传文件不能为空","file1.image"=>"非法图像文件"]);
			if(true !== $result){
	    		$this->error($result);die;
	    	}
	    	//移动到指定目录
	    	$info = $file->move(ROOT_PATH.'public'.DS.'uploads');
	    	$savename = $info->getSaveName();
	    	$ext = $info->getExtension();
	    	//图像处理
	        $img = \think\Image::open("./uploads/".$savename);
	        $name = time()+rand(1,1000);
	        $img->thumb(100,100)->save("./uploads/infor_img/".$name.".".$ext);
	        //存原图 以便删除
	        $data["opic"]= "./uploads/".$savename;
	        $data['pic'] = "/uploads/infor_img/".$name.".".$ext;
		}
		//获取要删除的资源
		$info = Db::table("information")->where("id",$id)->find();
		//获取pic
		$pic = ".".$info['pic'];
		//获取原图
		$opic = $info['opic'];
		//获取descr
		$descr = $info['descr'];
		//原百度编辑器的内容descr
		preg_match_all('/<img.*?src="(.*?)".*?>/is', $descr, $array);
		//新修改的百度编辑器的内容descr
		preg_match_all('/<img.*?src="(.*?)".*?>/is', $data['descr'], $array1);
		//计算正则匹配的数组 交集
		$arr = array_intersect($array[1],$array1[1]);
		//找到原百度编辑器的内容descr,差集去掉交集
		$arr1 = array_diff($array[1], $arr);
		//var_dump($arr1);die;
        //插入数据
      	$res = Db::table("information")->where("id",$id)->update($data);
        if($res){
        	if($file){
        		//删除缩略图
				unlink($pic);
				//删除原图
				unlink($opic);
        	}
			//如果原百度编辑器的内容descr,差集去掉交集的$arr1存在
			if(!empty($arr1)){
				//删除百度编辑器的上传图片
				foreach ($arr1 as $k => $v) {
					unlink(".".$v);
				}
			}
            $this->success("资讯修改成功","/information/list");
        }else{
            $this->error("资讯修改失败");
        }
	}

	//单条资讯删除
	public function getdelete() {
		//获取id
		$request = request();
		$id = $request->param("id");
		//获取要删除的数据
		$info = Db::table("information")->where("id",$id)->find();
		//获取pic
		$pic = ".".$info['pic'];
		//获取原图
		$opic = $info['opic'];
		//获取descr
		$descr = $info['descr'];
		preg_match_all('/<img.*?src="(.*?)".*?>/is', $descr, $array);
		if(Db::table("information")->where("id",$id)->delete()){
			//删除缩略图
			unlink($pic);
			//删除原图
			unlink($opic);
			//如果百度编辑器上传了图片
			if(isset($array[1])){
				//删除百度编辑器的上传图片
				foreach ($array[1] as $k => $v) {
					unlink(".".$v);
				}
			}
			return true;
		}
	}

	//批量删除
	public function getdels() {
		//获取批量的id 数组arr
		$arr=isset($_GET['arr'])?$_GET['arr']:'';
		if($arr == "") {
			return false;
		}
		//遍历删除
		foreach($arr as $v) {
			//获取要删除的数据
			$info = Db::table("information")->where("id",$v)->find();
			//获取pic
			$pic = ".".$info['pic'];
			//获取原图
			$opic = $info['opic'];
			//获取descr
			$descr = $info['descr'];
			preg_match_all('/<img.*?src="(.*?)".*?>/is', $descr, $array);
			if(Db::table("information")->where("id",$v)->delete()){
				//删除缩略图
				unlink($pic);
				//删除原图
				unlink($opic);
				//如果百度编辑器上传了图片
				if(isset($array[1])){
					//删除百度编辑器的上传图片
					foreach ($array[1] as $k => $v) {
						unlink(".".$v);
					}
				}
			}
		}
		return true;
	}
}
?>