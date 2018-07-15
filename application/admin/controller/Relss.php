<?php
namespace app\admin\controller;
//导入Controller
use think\Controller;
//导入Db类
use think\Db;

class Relss extends Allow
{
    //场次列表
    public function getlist(){
        //创建请求对象
        $request = request();
        //获取搜索时间
        $time = $request->param('time');
        //查询字段
        // $field = "r.id,c.name as cname,m.ch_name as mname,h.hallname as hname,r.start_time as start_time,r.end_time as end_time,r.status as status";
        $field = "r.id,r.day,c.name as cname,m.ch_name as mname,h.hallname as hname,r.start_time as start_time,r.end_time as end_time,r.status as status";
        if($time){
            //查询
            $relss = Db::table("relss")->alias("r")->join("cinema_details c","c.id=r.cid")->join("movies m","m.id=r.mid")->join("halls h","h.id=r.hid")->field($field)->where("start_time","<=","{$time}")->where("end_time",">=","{$time}")->order("id desc")->paginate(8);
        }else{
            //查询
            $relss = Db::table("relss")->alias("r")->join("cinema_details c","c.id=r.cid")->join("movies m","m.id=r.mid")->join("halls h","h.id=r.hid")->field($field)->order("id desc")->paginate(8);
        }
        return $this->fetch("Relss/list",['relss'=>$relss,'time'=>$time,'request'=>$request->param()]);
    }

    //加载场次添加页面
    public function getadd(){
        $hall = Db::table("halls")->select();
        $cinema = Db::table("cinema_details")->field('name,id')->select();
       // var_dump($cinema);die;
        return $this->fetch("Relss/add",["hall"=>$hall,"cinema"=>$cinema]);
    }

    //场次添加 数据插入操作
    public function postinsert(){
        //创建请求对象
        $request = request();
        //获取添加数据
        $data = $request->only(["day","start_time","end_time","cid","mid","hid"]);
        //var_dump($data);die;

        //执行插入
        $res = Db::table("relss")->insert($data);
        if($res){
            $this->success("添加场次成功","/Relss/list");
        }else{
            $this->error("添加场次失败","/Relss/add");
        }
    }

    //修改场次页面
    public function getedit(){
        //创建请求对象
        $request = request();
        //获取id
        $id = $request->param('id');
        //var_dump($id);die;
        //获取当前场次信息
        $relss = Db::table("relss")->where("id",$id)->find();

        $mid = $relss['mid'];

        $movie = Db::table('movies')->field('ch_name')->where('id',$mid)->find();
        $hall = Db::table("halls")->select();
        $cinema = Db::table("cinema_details")->field('name,id')->select();
        return $this->fetch("Relss/edit",["relss"=>$relss,"movie"=>$movie,"hall"=>$hall,"cinema"=>$cinema]);
    }

    //修改场次 数据更新
    public function postupdate(){
        //创建请求对象
        $request = request();
        //获取当前场次id
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
            $this->success("修改场次成功","/hall/list");
        }else{
            $this->success("修改场次失败");
        }

    }

    //单条数据 删除场次
    public function getdelete(){
        //创建请求对象
        $request = request();
        //获取删除数据的id
        $id = $request->param("id");
        //执行删除
        $res = Db::table("relss")->where("id",$id)->delete();
        if($res){
            return true;
        }
    }

    //批量数据删除 删除场次
    public function getdels(){
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        foreach($arr as $v){
            Db::table("relss")->where("id",$v)->delete();
        }
        return true;
    }
}
