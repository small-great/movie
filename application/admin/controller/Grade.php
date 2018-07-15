<?php
namespace app\admin\controller;
use think\Controller;
//导入Db
use think\Db;
class Grade extends Allow
{
	//加载评分列表模板
    public function getlist(){
   		//创建请求对象
        $request=request();
        //获取搜索的关键字
        $k=$request->param("keywords");
        $field = "g.id as id,u.username as uname,m.ch_name as mname,grade,good,want,g_status,g_content";
       
        $data=Db::table('grade')->alias("g")->join("movies m","g.mid=m.id")->join("users u","g.uid=u.id")->field($field)->where('u.username|grade|m.ch_name','like',"%{$k}%")->order("id asc")->paginate(8);
        return $this->fetch("Grade/list",['data'=>$data,'request'=>$request->param(),'k'=>$k]);
    }

    //评分修改状态 显示与隐藏
    public function getchange(){
        //创建请求对象
        $request = request();
        //获取修改状态数据  id和g_status
        $id = $request->param('id');
        $g_status = $request->param('g_status');
        //执行修改
        $res = Db::table('grade')->where('id',$id)->update(['g_status' => $g_status]);
        if($res){
            return true;
        }
    }

    //删除单条评分
    public function getdelete(){
        //创建请求对象
        $request = request();
        $id = $request->param('id');
        //执行删除
        $res = Db::table('grade')->where('id',$id)->delete();
        if($res){
            return true;
        }
    }

  	//评分批量删除
    public function getmdelete(){
        //创建请求对象
        $arr=isset($_GET['arr'])?$_GET['arr']:'';
        if($arr==''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            Db::table('grade')->where('id',$v)->delete();
        }
        return true;
    }
}