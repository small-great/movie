<?php
namespace app\admin\validate;
//导入Validate 类
use think\Validate;
//定义验证器类
class Link extends Validate{
	//设置规则
	protected $rule=[
						//用户规则 require 验证某个字段必须  检验某个参数是否符合正则  unique 校验字段是否唯一 Movies 数据表
						
						['title','require|unique:links','友情链接名称不能为空'],
						['url','require','友情链接地址不能为空'],
						['desc','require','友情链接描述不能为空'],
						['display','require','友情链接描述不能为空'],
						['k_addtime','require','友情链接添加时间不能为空'],
						
					];

	protected $scene = [
		//add 执行添加验证
		'add' => ['title','url','desc','display','k_addtime'],
		//edit 执行修改验证
		'edit' => ['title','url','desc','display','k_addtime'],
	];

}
 ?>