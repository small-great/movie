<?php
namespace app\admin\controller;
use think\Controller;
//导入Db
use think\Db;
class Mailer extends Allow
{
    //加载站内信模板
    public function getlist(){
        //创建请求对象
        $request=request();
        //获取搜索词
        $keywords=$request->param('keywords');
        //查询展示站内信
        $data=Db::table('mailer')->where("username|title","like",'%'.$keywords.'%')->order('id desc')->paginate(4);
        $data1=Db::table('users')->select();
        return $this->fetch("Mailer/list",['data'=>$data,'data1'=>$data1,'keywords'=>$keywords,'request'=>$request->param()]);
    }

    //添加站内信
    public function postinsert(){
        //创建请求对象
        $request=request();
        $data=$request->except('action');
        $data['sendtime']=time();
        //加载Role验证器类
        $result=$this->validate($data,'Mailer');
        //对比数据验证
        if(true !== $result){
        //阻止验证 ,显示提示错误信息
            $this->error($result);
        }
        //执行插入
        if(Db::table('mailer')->insert($data)){
            $this->success("发送成功","/mailer/list");
        }else{
            $this->error("发送失败","/mailer/list");
        }
    }

    //删除单条站内信
    public function getdelete(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        //执行删除
        if(Db::table('mailer')->where('id',$id)->delete()){
            return true;
        }else{
            return false;
        }
    }

    //批量数据删除
    public function getmdel(){
        //创建请求对象
        $request = request();
        $arr = isset($_GET['arr'])?$_GET['arr']:'';
        if($arr == ''){
            return false;
        }
        //遍历删除
        foreach($arr as $v){
            Db::table('mailer')->where('id',$v)->delete();
        }
        return true;
    }
}
