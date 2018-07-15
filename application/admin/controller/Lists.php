<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db类
use think\Db;

class Lists extends Allow
{
    //权限列表
    public function getindex(){
        //创建请求对象
        $request = request();
        //获取搜索词
        $keywords = $request->param('keywords');
        //查询
        $node = Db::table("node")->where("name|mname|aname","like",'%'.$keywords.'%')->order("id desc")->paginate(8);
        return $this->fetch("Lists/index",['node'=>$node,'keywords'=>$keywords,'request'=>$request->param()]);
    }

    //权限添加 数据插入操作
    public function postinsert(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data = $request->only(["name","mname","aname","status"]);
        //加载 Listss 验证器类
        $result=$this->validate($request->param(),'Listss');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $get = substr($data['aname'],0,3);
        $post = substr($data['aname'],0,4);
        $kg = ($get=='get')?false:true;
        $kg1 = ($post=='post')?false:true;
        if($kg&&$kg1){
            $this->error("请输入get或者post开头6-20位英文字母");
        }
        //执行插入
        $res = Db::table("node")->insert($data);
        if($res){
            $this->success("添加权限成功","/adminlists/index");
        }else{
            $this->error("添加权限失败");
        }
    }

    //加载修改权限页面
    public function getedit(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //查询id权限详情
        $node = Db::table("node")->where("id",$id)->find();
        return $this->fetch("Lists/edit",["node"=>$node]);
    }

    //执行修改权限数据
    public function postupdate(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取修改数据
        $data = $request->only(["name","mname","aname","status"]);
        //加载 Listss 验证器类
        $result=$this->validate($request->param(),'Listss');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $get = substr($data['aname'],0,3);
        $post = substr($data['aname'],0,4);
        $kg = ($get=='get')?false:true;
        $kg1 = ($post=='post')?false:true;
        if($kg&&$kg1){
            $this->error("请输入get或者post开头6-20位英文字母");
        }
        //执行修改
        $res = Db::table("node")->where("id",$id)->update($data);
        if($res){
            $this->success("修改权限成功","/adminlists/index");
        }else{
            $this->error("修改权限失败");
        }
    }

    //分配权限
    public function getauth(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取当前角色信息
        $role = Db::table("role")->where("id",$id)->find();
        //获取所有权限信息
        $node = Db::table("node")->select();
        //获取当前角色的所有权限
        $rolenode = Db::table("role_node")->where('rid',$id)->select();
        //遍历数据
        $rnids = array();
        foreach($rolenode as $v){
            $rnids[] = $v['nid'];
        }
        $res = array(); //想要的结果
        foreach ($node as $k => $v) {
          $res[$v['mname']][] = $v;
        }
        //var_dump($res);
        //die;
        return $this->fetch("Lists/auth",['role'=>$role,'res'=>$res,'rnids'=>$rnids]);
    }

    //保存权限
    public function postsavelist(){
        //创建请求对象
        $request = request();
        //获取当前角色id
        $rid = $request->param('rid');
        //获取新的要添加的权限
        $node = $_POST['nid'];
         //删除当前角色已有的权限信息
        Db::table("role_node")->where("rid",$rid)->delete();
        foreach($node as $k=>$v){
            $data['rid']=$rid;
            $data['nid']=$v;
            //执行插入
            $res = Db::table('role_node')->insert($data);
        }
        $this->success("权限分配成功","/role/index");
    }

    //单条数据 删除权限
    public function getdelete(){
        //创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        //执行删除
        $res = Db::table("node")->where("id",$id)->delete();
        if($res){
            //判断角色_权限节点表是否有数据 有就执行删除相应数据
            if(Db::table("role_node")->where("nid",$id)->select()){
                Db::table("role_node")->where("nid",$id)->delete();
            }
        }
        return true;
    }

    //批量数据删除 删除权限
    public function getmoredel(){
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        foreach($arr as $v){
            if(Db::table("node")->where("id",$v)->delete()){
                //判断角色_权限节点表是否有数据 有就执行删除相应数据
                if(Db::table("role_node")->where("nid",$v)->select()){
                    Db::table("role_node")->where("nid",$v)->delete();
                }
            }
        }
        return true;
    }

    //权限修改状态 启用与禁用
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和status
        $id = $request->param('id');
        $status = $request->param('status');
        //执行修改
        $res = Db::table("node")->where('id', $id)->update(['status' => $status]);
        if($res){
            return true;
        }
    }
}
