<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db类
use think\Db;

class Role extends Allow
{

    //角色列表
    public function getindex(){
        //创建请求对象
        $request = request();
        //获取搜索词
        $keywords = $request->param('keywords');
        //查询
        $role = Db::table("role")->where("name","like",'%'.$keywords.'%')->paginate(4);
        return $this->fetch("Role/list",['role'=>$role,'keywords'=>$keywords,'request'=>$request->param()]);
    }

    //角色添加 数据插入操作
    public function postinsert(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data=$request->only(['name','status']);
        //加载Role验证器类
        $result=$this->validate($request->param(),'Role');
         //对比数据验证
        if(true !== $result){
        //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        //执行插入
        $res = Db::table("role")->insert($data);
        if($res){
            $this->success("添加角色成功","/role/index");
        }
    }

    //删除角色
    public function getdelete(){
        //创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        if($id!=1){
            //执行删除
            $res = Db::table("role")->where('id',$id)->delete();
        }else{
            $this->error("超级管理员不能被删除","/role/index");die;
        }
        if($res){
            if(Db::table('admin_role')->where('rid',$id)->select()){
                Db::table("admin_role")->where('rid',$id)->delete();
            }
            if(Db::table('role_node')->where('rid',$id)->select()){
                Db::table("role_node")->where('rid',$id)->delete();
            }
            $this->success("删除角色成功","/role/index");
        }
    }

    //角色修改状态 启用与停用
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和status
        $id = $request->param('id');
        $status = $request->param('status');
        //执行修改
        $res = Db::table('role')->where('id', $id)->update(['status' => $status]);
        if($res){
            // $this->redirect($allurl);
            return true;
        }
    }

    //判断角色的详情,没有就加载详情添加页面,有就加载详情信息页面
    public function getedit(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //查询role角色表里面的角色名
        $name = Db::table('role')->where('id',$id)->column('name')[0];
        return $this->fetch("Role/edit",['id'=>$id,'name'=>$name]);
    }

    //修改角色名字
    public function postupdate(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取提交的名字
        $name = $request->param('name');
        //执行修改
        $res = Db::table('role')->where('id', $id)->update(['name' => $name]);
        if($res){
            $this->success("修改成功","/role/index");
        }
    }

    //检验添加角色是否符合规则
    public function postcheck(){
        //创建请求对象
        $request = request();
        $name = $request->param('name');
        //查询数据库
        $res = Db::table('role')->where('name',$name)->select();
        if($res){
            echo 1;
        }
    }

    //批量删除角色
     public function getmdel(){
        //创建请求对象
        $request = request();
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr == ''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            if($v!=1){
            //执行删除
                Db::table('role')->where('id',$v)->delete();
            }else{
                $this->error("超级管理员不能被删除","/role/index");die;
            } 
            if(Db::table('admin_role')->where('rid',$v)->select()){
                Db::table("admin_role")->where('rid',$v)->delete();
            }
            if(Db::table('role_node')->where('rid',$v)->select()){
                Db::table("role_node")->where('rid',$v)->delete();
            }
        }
        return true;
   }
}
