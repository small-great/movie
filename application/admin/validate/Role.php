<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Role extends Validate
{
	//设置规则
	//unique:校验唯一
	protected $rule = [
		'name' => 'require|unique:node',
	];
	//规则提示信息
	protected $message = [
		'name.require' => '权限名必须不能为空',
		'name.unique' => '权限名已存在',
	];
	protected $scene = [
		//add 执行添加验证
		'add' => ['name'],
	];
}
?>