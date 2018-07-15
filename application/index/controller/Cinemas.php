<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
//前台影院列表模块控制器
class Cinemas extends Controller
{
	//加载所有影店列表页
	public function index(){
		//创建请求对象
		$request = request();
		$data = file_get_contents("static/homes/js/list.json");
		$arr = json_decode($data);
		$array = array();
		foreach($arr as $k=>$v){
			$array[$k] = $v;
		}
		//获取接收的地址
		$param = $request->only(['province','city','area']);
		$area = '';
		//省
		if(array_key_exists('province',$param)&&$param['province']!=''){
			$area .= $array[$param['province']];
		}
		//市
		if(array_key_exists('city',$param)){
			if($param['city']!=''){
				$area .= $array[$param['city']];
			}
		}
		//区/镇
		if(array_key_exists('area',$param)){
			if($param['area']!=''){
				$area .= $array[$param['area']];
			}
		}

		$brandId = $request->param("brandId");
		$hall_id = $request->param("hall_id");
		$res = Db::table("cinema_brand")->where("id",$brandId)->find();
		$brand = Db::table("cinema_brand")->field("id,brand")->select();
		$halltype = Db::table("cinema_halltype")->field("id,name")->select();
		$details = Db::table("cinema_details")->where("name","like","%".$res['brand']."%")->where("hall_id",$hall_id)->where("area","like","%".$area."%")->paginate(8);
		$p = ($brandId==1||$brandId==null);
		$p1 = ($hall_id==0||$hall_id==null);
		if($p&&$area==''&&$hall_id) {
			$brandId = 1;
			$details = Db::table("cinema_details")->where("hall_id",$hall_id)->paginate(8);
		}elseif($p1&&$area==''&&$brandId>1){
			$hall_id = 0;
			$details = Db::table("cinema_details")->where("name","like","%".$res['brand']."%")->paginate(8);
		}elseif($p&&$p1) {
			$brandId = 1;
			$hall_id = 0;
			$details = Db::table("cinema_details")->where("area","like","%".$area."%")->paginate(8);
		}elseif(empty($request->param())){
			$hall_id = 0;
			$brandId = 1;
			$details = Db::table("cinema_details")->paginate(8);
		}
		return $this->fetch("Cinemas/index",['brand'=>$brand,'halltype'=>$halltype,'details'=>$details,'brandId'=>$brandId,'hall_id'=>$hall_id,'area'=>$area,'request'=>$request->param()]);
	}

	//加载所有某个电影下的影店列表页
	public function indexcinema(){
		//创建请求对象
		$request = request();
		$id = $request->param('id');
		//$data1=Db::table("grade")->select();
		//var_dump($data1);
		$movie = Db::table("movies")->where("id",$id)->find();

		//$data1=Db::filed('grade.grade,movies.*')->table(['movies=>movies','grade=>grade'])->where('movies.name=grede.id');
		//var_dump($data1);die;
		$relss = Db::table("relss")->where("mid",$id)->select();
		$details = array();
		foreach ($relss as $k => $v) {
			$details[$k] = Db::table("cinema_details")->where("id",$v['cid'])->find();
		}
		//开启并链接redis
    	$redis=new \think\cache\driver\Redis();
		$movie['grade'] = $redis->get($id);
		$movie['count'] = $redis->get('count'.$id);
		$uid=Session::get('uid');
		$res=Db::table("grade")->where("mid",$id)->where("uid",$uid)->find();
		$halltype = Db::table("cinema_halltype")->field("id,name")->select();
		return $this->fetch("Cinemas/indexcinema",["movie"=>$movie,'res'=>$res,'details'=>$details,'request'=>$request->param()]);//,'data1'=>$data1
	}

	//城市地址
	public function area(){
        $list = Db::table("district")->where("upid",$_GET['upid'])->select();
        echo json_encode($list);
    }

    //影店下的电影场次等信息
	public function relsslist(){
		//开启并链接redis
    	$redis=new \think\cache\driver\Redis();
		//创建请求对象
		$request = request();
		//接收影城(影店)id
		$id = $request->param("id");
		$mid = $request->param("mid");
		$details = Db::table("cinema_details")->where("id",$id)->find();
		$res = Db::table("relss")->where("cid",$id)->where("day",">=",date("Y-m-d",time()))->select();
		$movies = array();
		$relss = array();
		foreach ($res as $k => $v) {
			$result = Db::table("movies")->where("id",$v['mid'])->find();
			$hall = Db::table("halls")->where("id",$v['hid'])->find();
			$movies[] = $result;
			$relss[$k] = $v;
			$relss[$k]['m_version'] = $result['m_version'];
			$relss[$k]['laguage'] = $result['laguage'];
			$relss[$k]['m_price'] = $result['m_price'];
			$relss[$k]['hallname'] = $hall['hallname'];
		}
		$movies = $this->remove_duplicate($movies);
		if(empty($movies)){
			echo "<script>alert('暂无影场资源');history.back()</script>";die;
		}
		$time = array(
			0=>date("Y-m-d",time()),
			1=>date("Y-m-d",time()+24*3600),
			2=>date("Y-m-d",time()+24*2*3600),
			3=>date("Y-m-d",time()+24*3*3600),
			5=>date("Y-m-d",time()+24*4*3600),
			6=>date("Y-m-d",time()+24*5*3600),
			7=>date("Y-m-d",time()+24*6*3600),
		);
		$m = $movies[0];
		if($mid!=null){
			foreach ($relss as $key => $value) {
				if(!in_array($mid,$value)){
					unset($relss[$key]);
				}
			}
			//var_dump($relss);die;
			foreach ($movies as $k => $v) {
				if(in_array($mid, $v)){
					$m = $v;
				}
			}
			//var_dump($m);die;
			//判断当前请求为Ajax请求
    		if($request->isAjax()){
				$grade = $redis->get($m['id']);
				return $this->fetch("Cinemas/lists",["m"=>$m,'grade'=>$grade,"relss"=>$relss]);
			}
		}else{
			$mid = $m['id'];
		}
		foreach ($relss as $key => $value) {
			if(!in_array($m['id'],$value)){
				unset($relss[$key]);
			}
		}
		//var_dump($relss);die;
		$grade = $redis->get($m['id']);
		return $this->fetch("Cinemas/list",["details"=>$details,"movies"=>$movies,"m"=>$m,'grade'=>$grade,"mid"=>$mid,"relss"=>$relss]);
	}

	//二维数组去重复一维数组函数
	public function remove_duplicate($array){
		$result=array();
		for($i=0;$i<count($array);$i++){
			$source=$array[$i];
			if(array_search($source,$array)==$i && $source<>"" ){
				$result[]=$source;
			}
		}
		return $result;
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
		$p=count($g)!=0?array_sum($g)/count($g):null;
		$data['grade']=sprintf("%.1f",$p);
		$data['count']=count($g);
		$res1 = Db::table("grade")->insert($data);
		if($res1){
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
			//Db::execute('update grade set want=1 where uid="'.$uid.'" and mid="'.$mid.'"');
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
}

?>