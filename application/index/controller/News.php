<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class News extends Controller
{
    // 加载前台资讯模板
    public function index(){
        $data=Db::table('information')->limit(6)->select();
        $data1=Db::table('information')->order('hotnum desc')->limit(10)->select();
        return $this->fetch("News/index",['data'=>$data,'data1'=>$data1]);
    }

    // 加载全部资讯模板
    public function list(){
        //创建请求对象
        $request = request();
        $data=Db::table('information')->paginate(8);
        return $this->fetch("News/list",['data'=>$data,'request'=>$request->param()]);
    }

    // 加载资讯详情模板
    public function info(){
        $request=request();
        Session::set('infourl',$request->url(true));
        Session::set('infourltime',time());
        $id=$request->param('id');
        $rest=Db::table('information')->where('id',$id)->where("display",0)->find();
        //浏览量增加
        $redis=new \think\cache\driver\Redis();
        $num =  $rest["hotnum"];
        if(!$num){
            $redis->set('hotnum',1);
        }else{
            $num++;
            $redis->set('hotnum',$num);
            Db::table('information')->where('id',$id)->where("display",0)->update(['hotnum'=>$redis->get('hotnum')]);
        }
        $data=Db::table('information')->where('id',$id)->where("display",0)->find();
        $movies=Db::table('movies')->where('id',$data['mid'])->where("display",0)->find();
        $data['cname'] = $movies['ch_name'];
        $data['mpicurl'] = $movies['picurl'];
        $res=Db::table('grade')->where('mid',$data['mid'])->select();
        //存储评分
        $arr=array();
        foreach($res as $vv){
            $arr[]+=$vv['grade'];
        }
        $grade=count($arr)!=0?array_sum($arr)/count($arr):null;
        //sprintf 保留小数位  %.1  保留1位小数
        $data['grade'] = sprintf("%.1f",$grade);
        $result=Db::table('user_news')->where('nid',$id)->sum("status");
        $res=Db::table('user_news')->where('nid',$id)->where('uid',Session::get('uid'))->find();
      	return $this->fetch("News/info",['data'=>$data,'result'=>$result,'res'=>$res,'request'=>$request]);
    }

    //点赞
    public function good(){
        //创建请求对象
        $request=request();
        $id=$request->param('id');
        $uid=Session::get('uid');
        $res=Db::table('user_news')->where("uid",$uid)->where('nid',$id)->find();
        if($res){
            if($res['status']==0){
                Db::table('user_news')->where("uid",$uid)->where('nid',$id)->update(['status'=>1]);
                $count=count(Db::table('user_news')->where('status',1));
                return true;
            }else{
                Db::table('user_news')->where("uid",$uid)->where('nid',$id)->update(['status'=>0]);
                return false;
            }
        }else{
            Db::table('user_news')->insert(["nid"=>$id,"uid"=>$uid,"status"=>1]);
            return true;
        }
    }
}
?>
