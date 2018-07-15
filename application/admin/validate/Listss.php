<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Listss extends Validate
{
	//设置规则
	//unique:校验唯一
	protected $rule = [
		'name' => 'require|unique:node',//
		'mname'=> 'require|regex:[a-zA-Z]{3,15}',
		'aname'=> 'require|regex:[a-zA-Z]{6,20}',
	];
	//规则提示信息
	protected $message = [
		'name.require' => '权限名必须不能为空',
		'name.unique' => '权限名已存在',
		'mname.require' => '控制器必须不能为空',
		'mname.regex' => '控制器必须是3-15位英文字母',
		'aname.require' => '方法必须不能为空',
		'aname.regex' => '方法必须是以get或者post开头6-20位英文字母',
	];
	protected $scene = [
		//add 执行添加验
		'add' => ['name','mname','aname'],
		'edit' => ['name','mname','aname'],
	];
}
?>