<?php
namespace app\index\controller;
use think\Controller;
use think\Config;
use think\Db;
use think\Session;
//前台电影列表模块控制器
class Movielist extends Controller
{
	//加载列表页
	public function index(){
		$request = request();
		$typeid = $request->param("typeid");
		$countryid = $request->param("countryid");
		$addtimeid = $request->param("addtimeid");
		$showType = $request->param("showType");
		$type = array('全部','爱情','喜剧','动画','剧情','恐怖','惊悚','科幻','动作','悬疑','犯罪','冒险','战争','奇幻',' 运动','家庭','古装','武侠','西部',' 历史','传记','歌舞','黑色电影','短片','录片','其他');
		$country = array('全部','大陆','美国','韩国','日本','中国','香港','中国','台湾','泰国','印度','法国','英国','俄罗斯','意大利','西班牙','德国','波兰','澳大利亚','伊朗','其他');
		$year=date("Y");
		$addtime=array($year.'以后',$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,($year-19).'-'.($year-7),'更早');
		$type1 = $typeid==0?'':$type[$typeid];
		$country1 = $countryid==0?'':$country[$countryid];
		$addtime1 = '%%';
		$p = 'like';
		if ($addtimeid=='全部') {
			$addtime1 = '%%';
			$p = 'like';
		} elseif ($addtimeid==$year.'以后') {
			$p = '>';
			$addtime1=$year;
		} elseif ($addtimeid>=($year-7)&&$addtimeid<=$year) {
			$p = 'like';
			$addtime1='%'.$addtimeid.'%';
		} elseif ($addtimeid==($year-19).'-'.($year-7)) {
			$p = 'between';
			$min = $year-19;
			$max = $year-7;
			$addtime1="{$min},{$max}";
		} elseif ($addtimeid=='更早') {
			$p = '<';
			$addtime1=$year-18;
		}
		$redis=new \think\cache\driver\Redis();
		$data = Db::table("movies")->where('m_type','like',"%{$type1}%")->where('country_area','like',"%{$country1}%")->where('m_addtime',$p,$addtime1)->where("display",0)->where("status",1)->select();
		//分页
		//总条数
		$tot=Db::table("movies")->where("display",0)->where("status",1)->Count();
		if($showType&&$showType==2){
			//分页
			//总条数
			$tot=Db::table("movies")->where("display",0)->where("status",0)->Count();
			$data = Db::table("movies")->where('m_type','like',"%{$type1}%")->where('country_area','like',"%{$country1}%")->where('m_addtime',$p,$addtime1)->where("display",0)->where("status",0)->select();
		}

		//每页显示条数
		$rev=8;
		//最大页数
		$m=ceil($tot/$rev);
		//遍历页数
		$pp=array();
		for($i=1;$i<=$m;$i++){
    		$pp[$i]=$i;
    	}
    	//当前页
    	$page=$request->param("page");
    	//分页数据查询
	    if(!empty($page)){
	    	$offset=($page-1)*$rev;
	    	$data = Db::table("movies")->where("display",0)->where("status",1)->limit("{$offset}","{$rev}")->select();
		}else{
			$page=1;
		}
		//上一页
		$prev = $page-1;
	    if($prev==0){
	    	$prev=1;
	    }
	    //下一页
    	$next = $page+1;
    	if($next==$m){
    		$next=$m;
    	}
		foreach ($data as $k => $v) {
		    $grade = Db::table("grade")->where("mid",$v['id'])->select();
		    $g = array();
		    foreach ($grade as $key => $value) {
		        $g[] += $value['grade'];
		    }
		    //求当前电影平均评分
		    $p = count($g)!=0?array_sum($g)/count($g):null;
		    //sprintf 保留小数位  %.1  保留1位小数
		    $data[$k]['grade'] = sprintf("%.1f",$p);
	    }
	    $redis->set('data',$data);
		$data = $redis->get('data');
		return $this->fetch("Movielist/index",['data'=>$data,'type'=>$type,'typeid'=>$typeid,'country'=>$country,'countryid'=>$countryid,'addtime'=>$addtime,'addtimeid'=>$addtimeid,"showType"=>$showType,'request'=>$request->param("showType"),'pp'=>$pp,'prev'=>$prev,'next'=>$next,'page'=>$page,'m'=>$m]);
	}

	//电影详情
	public function content(){
		$request = request();
		$id = $request->param("id");
		Session::set("url",$request->url(true));
		$redis=new \think\cache\driver\Redis();
		$redis->set("contenturl",$request->url(true));
		$data = Db::table("movies")->where('id',$id)->where("display",0)->find();
		$data1=Db::table("grade")->where("mid",$id)->where("g_status",0)->select();
		$data3=Db::table("information")->where("mid",$id)->limit("0,8")->select();
		$director=Db::table("director")->where("mid",$id)->find();
		$actor=Db::table("actor")->where("mid",$id)->select();
		$g=array();
		$data2=array();
		foreach($data1 as $k=>$v) {
			$g[] += $v['grade'];
			$data2[$k] = array();
			$res=Db::table("users")->where("id",$v['uid'])->find();
			$result=Db::table("users_info")->where("uid",$v['uid'])->find();
			$data2[$k]['id']=$v['id'];
			$data2[$k]['uid']=$v['uid'];
			$data2[$k]['g_content']=$v['g_content'];
			$data2[$k]['good']=$v['good'];
			$data2[$k]['g_addtime']=$v['g_addtime'];
			$data2[$k]['grade']=$v['grade'];
			$data2[$k]['picurl']=$result['picurl'];
			$data2[$k]['goodstatus']=$res['goodstatus'];
			if($res){
				$data2[$k]['username']=$res['username'];
			}else{
				$data2[$k]['username']='';
			}
		}
		$redis->set("data2",$data2);
		$redis->set("data3",$data3);
		//查询评分平均值和总评分人数
		$p=count($g)!=0?array_sum($g)/count($g):null;
		$data['grade']=sprintf("%.1f",$p);
		$data['count']=count($g);
		$redis->set("data",$data);
		$data = $redis->get('data');
		$datas = $redis->get('data2');
		$data3 = $redis->get('data3');
		array_multisort(array_column($datas,'id'),SORT_DESC,$datas);
		$data2 = array();
		foreach ($datas as $k => $v) {
			if($k<5){
				$data2[$k] = $v;
			}
		}

		return $this->fetch("Movielist/content",['data'=>$data,'data2'=>$data2,'data3'=>$data3,'mid'=>$id,'director'=>$director,'actor'=>$actor]);
	}

	//电影搜索列表
	public function list(){
		$redis=new \think\cache\driver\Redis();
		$request = request();
		$k = $request->param("k");
		$data1 = Db::table("movies")->where('ch_name|en_name','like',"%{$k}%")->where("display",0)->paginate(12);
		$c = count($data1);
		//var_dump($c);die;
		$redis->set("data1",$data1);
		$data1 = $redis->get('data1');
		return $this->fetch("Movielist/list",['data1'=>$data1,'request'=>$request->param(),'c'=>$c]);
	}

	//评分
	public function grade(){
		$request=request();
		$id=$request->param("id");
		$redis=new \think\cache\driver\Redis();
		$url=$redis->get("contenturl");
		$data=$request->only(['uid','mid','g_content','grade','g_addtime']);
		$data['g_addtime']=time();
		$data['g_status']=0;
		$uid=Session::get('uid');
		$res = Db::table("grade")->insert($data);
		if($res){
			Session::set("g_addtime");
			$this->redirect($url);
		}else{
			$this->error("评分失败");

		}

	}

	//想看与不想看
	public function want(){
		$request=request();
		$mid=$request->param('mid');
		$uid=Session::get('uid');
		$res=Db::table("grade")->where("mid",$mid)->where("uid",$uid)->find();
		if($res){
			if($res['want']==0){
				Db::table("grade")->where("uid",$uid)->where("mid",$mid)->update(['want'=>1]);
				return 1;
			}else{
				Db::table("grade")->where("uid",$uid)->where("mid",$mid)->update(['want'=>0]);
				return 0;
			}
		}else{
			Db::table("grade")->insert(['want'=>1,'uid'=>$uid,'mid'=>$mid,'g_status'=>0]);
			return 1;
		}
	}

	//影评点赞
	public function good(){
		if(Session::get("uid")==''){
			return 2;
		}
		//创建请求对象
		$request=request();
		$id=$request->param('id');
		$result = Db::table('grade')->where('id',$id)->find();
		$res = Db::table('users')->where('id',Session::get("uid"))->find();
		if($result['uid']==Session::get("uid")){
			return 3;
		}
		if($res["goodstatus"]==0){
			$good = $result['good']+1;
			Db::table('users')->where('id',Session::get("uid"))->update(['goodstatus'=>1]);
			Db::table('grade')->where('id',$id)->update(['good'=>$good]);
			return true;
		}else{
			$good = $result['good']-1;
			Db::table('users')->where('id',Session::get("uid"))->update(['goodstatus'=>0]);
			Db::table('grade')->where('id',$id)->update(['good'=>$good]);
			return false;
		}
	}
}
?>