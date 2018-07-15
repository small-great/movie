<?php
namespace app\admin\controller;
use think\Controller;
//导入Db
use think\Db;
class Ads extends Allow
{
	//加载广告列表模板
    public function getlist(){
   		//创建请求对象
        $request=request();
        //获取搜索的关键字
        $k=$request->param("keywords");
        $data=Db::table('ads')->where("name","like","%".$k."%")->order("id asc")->paginate(5);
        return $this->fetch("Ads/list",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
    }

  	//添加广告
  	public function postinsert(){
  		//创建请求对象
        $request=request();
        $data=$request->except(['action']);
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        if($file){
            $result = $this->validate(["file"=>$file],["file"=>"require|image"],["file.require"=>"上传文件不能为空","file.image"=>"非法图像文件"]);
            if(true !== $result){
                $this->error($result);
            }
            $url=$data['url'];
            $result = $this->validate(["url"=>$url],["url"=>"require|regex:/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(:\d+)?(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/"],["url.require"=>"网址不能为空","url.regex"=>"网址格式不正确"]);
            if(true !== $result){
              $this->error($result);
            }
            $info = $file->move(ROOT_PATH.'public'.DS.'uploads');
            $savename = $info->getSavename();
            $ext = $info->getExtension();
            $img = \think\Image::open("./uploads/".$savename);
            $name = time()+rand(1,1000);
            $img->thumb(258,258)->save("./uploads/adspic/".$name.".".$ext);
            $data['picurl'] = "/uploads/adspic/".$name.".".$ext;
        }
        //存放原图
        $data['opic']="/uploads/".$savename;
        if(Db::table('ads')->insert($data)){
        	$this->success("添加成功","/ads/list");
        }else{
        	$this->error("添加失败");
        }
  	}

  	//单条删除
  	public function postdelete(){
  		//创建请求对象
        $request=request();
        $id=$request->param('id');
        $info=Db::table('ads')->where('id',$id)->find();
        $opic=$info['opic'];
        $pic=$info['picurl'];
        if(Db::table('ads')->where('id',$id)->delete()){
        	unlink(".".$pic);
            unlink(".".$opic);
        	return true;
        }
  	}

  	//批量删除
  	public function getmdelete(){
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }  
        //遍历删除
        foreach($arr as $v){
            $info=Db::table('ads')->where('id',$v)->find();
            $opic=$info['opic'];
            $pic=$info['picurl'];
            Db::table('ads')->where('id',$v)->delete();
            unlink(".".$pic);
            unlink(".".$opic); 
        }
        return true;
    }

    //加载修改广告模板
    public function getedit(){
   		//创建请求对象
   		$request=request();
   		$id=$request->param('id');
   		$data=Db::table('ads')->where('id',$id)->find();
   		return $this->fetch("Ads/edit",['data'=>$data]);
    }

    //修改广告
    public function postupdate(){
   		//创建请求对象
   		$request=request();
   		$id=$request->param('id');
        $pic=$request->param('pic');
        $data=$request->except(['id','action','pic']);
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
            $name = time()+rand(1,1000);
            $img->thumb(258,258)->save("./uploads/adspic/".$name.".".$ext);
            $data['picurl'] = "/uploads/adspic/".$name.".".$ext;
            $data['opic']="/uploads/".$savename;
        }
        $data['desc'] = htmlspecialchars($data['desc']);
        $info=Db::table('ads')->where('id',$id)->find();
        $opic=$info['opic'];
        if(Db::table("ads")->where('id',$id)->update($data)){
            if($file){
                unlink(".".$pic);
                unlink(".".$opic);
            }
            $this->success("修改成功","/ads/list");
        }else{
            $this->error("未做任何修改");
        }
    }
}