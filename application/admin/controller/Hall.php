<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db类
use think\Db;

class Hall extends Allow
{
    //放映厅列表
    public function getlist(){
        //创建请求对象
        $request = request();
        //获取搜索词
        $keywords = $request->param('keywords');
        //查询
        $halls = Db::table("halls")->order("id desc")->where("hallname","like",'%'.$keywords.'%')->paginate(8);
        return $this->fetch("Hall/list",['halls'=>$halls,'keywords'=>$keywords,'request'=>$request->param()]);
    }

    //加载放映厅添加页面
    public function getadd(){
        return $this->fetch("Hall/add");
    }

    //放映厅添加 数据插入操作
    public function postinsert(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data = $request->only(["hallname","hallnum","hallLayout"]);
        //加载 Halls 验证器类
        $result=$this->validate($request->param(),'Halls');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        //执行插入
        $res = Db::table("halls")->insert($data);
        if($res){
            $this->success("添加放映厅成功","/hall/list");
        }else{
            $this->error("添加放映厅失败");
        }
    }

    //修改放映厅页面
    public function getedit(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //获取当前放映厅信息
        $halls = Db::table("halls")->where("id",$id)->find();
        return $this->fetch("Hall/edit",['halls'=>$halls]);
    }

    //修改放映厅 数据更新
    public function postupdate(){
        //创建请求对象
        $request = request();
        //获取当前放映厅id
        $id = $request->param('id');
        //获取更新数据
        $data = $request->only(["hallname","hallnum","hallLayout"]);
        //加载 Halls 验证器类
        $result=$this->validate($request->param(),'Halls');
        //对比数据验证
        if(true !== $result){
            //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        $res = Db::table("halls")->where("id",$id)->update($data);
        if($res){
            $this->success("修改放映厅成功","/hall/list");
        }else{
            $this->success("修改放映厅失败");
        }

    }

    //单条数据 删除放映厅
    public function getdelete(){
        //创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        //执行删除
        $res = Db::table("halls")->where("id",$id)->delete();
        if($res){
            return true;
        }
    }

    //批量数据删除 删除放映厅
    public function getdels(){
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        foreach($arr as $v){
            Db::table("halls")->where("id",$v)->delete();
        }
        return true;
    }

    //放映厅修改状态 启用与禁用
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和status
        $id = $request->param('id');
        $status = $request->param('status');
        //执行修改
        $res = Db::table("halls")->where('id', $id)->update(['status' => $status]);
        if($res){
            return true;
        }
    }
}
