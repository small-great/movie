<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
  // 加载前台首页模板
  public function index(){
    //开启并链接redis
    $redis=new \think\cache\driver\Redis();
  	//查询正在上映的电影
  	$movies = Db::table("movies")->where("display",0)->where("status",1)->select();
    foreach ($movies as $k => $v) {
      $grade = Db::table("grade")->where("mid",$v['id'])->select();
      $g = array();
      foreach ($grade as $key => $value) {
        $g[] += $value['grade'];
      }
      //求当前电影平均评分
      $p = count($g)!=0?array_sum($g)/count($g):null;
      //sprintf 保留小数位  %.1  保留1位小数
      $movies[$k]['grade'] = sprintf("%.1f",$p);
      $redis->set($movies[$k]['id'],$movies[$k]['grade']);
      $redis->set('count'.$movies[$k]['id'],count($g));
    }
    //截取前8条数据
    $movies = array_slice($movies,0,8);
  	$count = Db::table("movies")->where("display",0)->where("status",1)->count();

  	//查询即将上映的电影
  	$movie1 = Db::table("movies")->where("display",0)->where("status",0)->select();
    foreach ($movie1 as $k => $v) {
      $wants = Db::table("grade")->where("mid",$v['id'])->where("g_status",0)->select();
      $w = array();
      foreach ($wants as $key => $value) {
        $w[] += $value['want'];
      }
      //求当前电影总想看数
      $sum = array_sum($w);
      $movie1[$k]['want'] = $sum;
    }
     //截取前8条数据
    $movie1 = array_slice($movie1,0,8);
  	$count1 = Db::table("movies")->where("display",0)->where("status",0)->count();
    //查询想看电影人数从多到少 want 降序排序
    $movie2 = $movie1;
    array_multisort(array_column($movie2,'want'),SORT_DESC,$movie2);
    //截取前8条数据
    $movie2 = array_slice($movie2,0,10);
    //轮播图遍历
    $carousel = Db::table("carousel")->where("status",0)->limit("0,6")->select();
    return $this->fetch("Index/index",['movies'=>$movies,'count'=>$count,'movie1'=>$movie1,'count1'=>$count1,'carousel'=>$carousel,'movie2'=>$movie2]);
  }
}
?>
