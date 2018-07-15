<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Users;
//导入Db
use think\Db;
class User extends Allow
{
    // 加载用户列表模板
    public function getlist(){
        //创建请求对象
        $request=request();
        //获取搜索的关键字
        $k=$request->param("keywords");
        //模糊搜索 分页
        $data=Users::where('display',1)->where("username","like","%".$k."%")->order("id asc")->paginate(5);
        //加载模板 分配数据
        return $this->fetch("User/list",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
    }

    //修改用户状态
    public function getchange(){
        //创建请求对象
        $request=request();
        //获取参数id
        $id=$request->param('id');
        //获取参数token 默认0已启用
        $token=$request->param('token');
        //更新token状态
        if(Users::where('id',$id)->update(['token'=>$token])){
            return true;
        }
    }

    //加载添加页面
    public function getadd(){
        return $this->fetch("User/add");
    }

    //执行添加
    public function postinsert(){
        //创建请求对象
        $request=request();
        $data=$request->only(['username','password']);
        $data['status']=0;
        $data['addtime']=time();
        $data['token']=0;
        $data['display']=1;
        //执行插入
        $res=Db::table("users")->insert($data);
        if($res){
            $this->success("添加成功","/user/list");
        }else{
            $this->error("添加失败");
        }
   }

   //加载修改用户页面
   public function getedit(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $data=Users::where('id',$id)->find();
        return $this->fetch("User/edit",['data'=>$data]);
   }

   //检验修改用户名是否符合规则
    public function postcheck(){
        //创建请求对象
        $request=request();
        $name=$request->param('name');
        //查询数据库
        $res=Users::where('username',$name)->select();
        if($res){
            echo 1;
        }
    }

    //执行用户修改
    public function postupdate(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $name=$request->param('name');
        $status=$request->param('status');
        $res=Users::where('id',$id)->update(['username'=>$name,'status'=>$status]);
        if($res){
            $this->success("修改成功","/user/list");
        }else{
            $this->success("修改成功","/user/list");
        }
    }

    //判断加载的是用户详情还是详情添加
    public function getinfo(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $data=Db::table('users_info')->where('uid',$id)->find();
        if($data){
            return $this->fetch("User/info",['data'=>$data]);
        }else{
            return $this->fetch("User/addinfo",['id'=>$id]);
        }
    }

    //添加用户详情
    public function postaddinfo(){
        //创建请求对象
        $request=request();
        $data=$request->except(['action']);
        $id=$request->param('id');
        $data['uid'] = $id;
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
        $data['hobby'] = htmlspecialchars($data['hobby']);
        $data['desc'] = htmlspecialchars($data['desc']);
        $data['job'] = htmlspecialchars($data['job']);
        //加载 Userinfo 验证器类
        $result=$this->validate($request->param(),'Userinfo');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        if(Db::table('users_info')->insert($data)){
            $this->success("添加成功","/user/list");
        }else{
            $this->error("添加失败");
        }
    }

    //加载修改用户详情页面
    public function geteditinfo(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $data=Db::table('users_info')->where('id',$id)->find();
        return $this->fetch("User/editinfo",['id'=>$id,'data'=>$data]);
    }

    //修改用户详情
    public function postupdateinfo(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $pic=$request->param('pic');
        $data=$request->except(['id','action','pic']);
        //加载 Userinfo 验证器类
        $result=$this->validate($request->param(),'Userinfo');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
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
            $img->thumb(258,258)->save("./uploads/userpic/".$name.".".$ext);
            $data['picurl'] = "/uploads/userpic/".$name.".".$ext;
            $data['opic']="./uploads/".$savename;
        }
        $data['hobby'] = htmlspecialchars($data['hobby']);
        $data['desc'] = htmlspecialchars($data['desc']);
        $data['job'] = htmlspecialchars($data['job']);
        $info=Db::table('users_info')->where('id',$id)->find();
        $opic=$info['opic'];
        if(Db::table("users_info")->where('id',$id)->update($data)){
            if($file){
                unlink(".".$pic);
                unlink($opic);
            }
            $this->success("修改成功","/user/list");
        }else{
            $this->error("修改失败");
        }
    }

    //执行删除
    public function postdel(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $display=$request->param('display');
        //判断是否移入回收站成功
        if(Users::where('id',$id)->update(['display'=>$display])){
            return true;
       }
   }

   //加载回收站页面
   public function gettrash(){
         //创建请求对象
        $request=request();
        //获取搜索的关键字
        $k=$request->param("keywords");
        //模糊搜索 分页
        $data=Users::where('display',0)->where("username","like","%".$k."%")->paginate(5);
        //加载模板 分配数据
        return $this->fetch("User/trash",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
   }

   //回收站还原
   public function getrecover(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $display=$request->param('display');
        //判断是否还原成功
        if(Users::where('id',$id)->update(['display'=>$display])){
            return true;
       }
   }

   //回收站批量还原
   public function getmrecover(){
        //创建请求对象
        $request=request();
        $display=$request->param('display');
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            Users::where('id',$v)->update(['display'=>$display]);
        }
        return true;
   }

   //回收站批量彻底删除
   public function getmdel(){
        //创建请求对象
        $request=request();
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            $info=Db::table('users_info')->where('id',$v)->find();
            $opic=$info['opic'];
            $pic=$info['picurl'];
            Users::where('id',$v)->delete();
            unlink(".".$pic);
            unlink($opic);
        }
        return true;
   }

   //批量回收
    public function getdelete(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $info=Db::table('users_info')->where('id',$id)->find();
        $opic=$info['opic'];
        $pic=$info['picurl'];
        //判断是否删除成功
        if(Users::where('id',$id)->delete()){
            if(Db::table('users_info')->where('uid',$id)->find()){
                Db::table('users_info')->where('uid',$id)->delete();
                unlink(".".$pic);
                unlink($opic);
            }
            return true;
       }
   }

   //批量删除
   public function getmdelete(){
        //创建请求对象
        $request=request();
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            Users::where('id',$v)->delete();
            if(Db::table('users_info')->where('uid',$v)->find()){
                Db::table('users_info')->where('uid',$v)->delete();
            }
        }
        return true;
   }
}
