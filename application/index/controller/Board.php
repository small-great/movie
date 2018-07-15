<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
//前台影院列表模块控制器
class Board extends Controller
{
	//加载列表页
	public function index(){
		$request=request();
		$type=$request->param('type');
		$data=Db::table('movies')->where('display',0)->select();	
		foreach($data as $k=>$v){
			$res=Db::table('grade')->where('mid',$v['id'])->select();
			//存储评分
			$arr=array();
			//存储想看
			$arr1=array();
			foreach($res as $vv){
				$arr[]+=$vv['grade'];
				$arr1[]+=$vv['want'];	
			}
			$grade=count($arr)!=0?array_sum($arr)/count($arr):null;
			//sprintf 保留小数位  %.1  保留1位小数
      		$data[$k]['grade'] = sprintf("%.1f",$grade);
      		$want=array_sum($arr1);
      		$data[$k]['want'] = $want;   		
		}
		//数组降序排序
		array_multisort(array_column($data,'grade'),SORT_DESC,$data);
		//取数组前十条
		if($type==1||$type==''){
			$data=array_slice($data, 0,10);
		}
		$data1=$data;
		//数组降序排序
		array_multisort(array_column($data1,'want'),SORT_DESC,$data1);
		//取数组前十条
		if($type==2){
			$data=array_slice($data1, 0,10);
		}
		return $this->fetch("Board/index",['data'=>$data,'type'=>$type]);
	}
}

?>