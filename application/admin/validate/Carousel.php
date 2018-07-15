<?php
namespace app\admin\validate;
//导入Validate 类
use think\Validate;
//定义验证器类
class Carousel extends Validate{
	//设置规则
	protected $rule=[
						//用户规则 require 验证某个字段必须  检验某个参数是否符合正则  unique 校验字段是否唯一 carousel 数据表
						['title','require|max:50|unique:carousel','轮播图名称不能为空|轮播图名称最多不能超过25个字符'],
						['sort','require','状态不能为空'],
						['status','require','状态不能为空'],
					];

	protected $scene = [
		//add 执行添加验证
		'add' => ['title','status','sort'],
		//edit 执行修改验证
		'edit' => ['title','status','sort'],
	];

}
 ?>