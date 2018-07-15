<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Userinfo extends Validate
{
	//设置规则
	//unique:校验唯一
	protected $rule = [
		'name' => 'require|regex:/^\w{6,12}$/|unique:users_info',
		'email' => 'email|unique:users_info', 
		'phone' => 'require|max:11|/^1[3-8]{1}[0-9]{9}$/|unique:users_info',
	];
	//规则提示信息
	protected $message = [
		'name.require' => '用户名必须不能为空',
		'name.regex' => '用户名长度为6-12位数字字母下划线组成',
		'name.unique' => '用户名已存在',
		'email'        => '邮箱格式错误', 
		'email.email' => '邮箱不符合格式',
		'email.unique' => '邮箱重复',
		'phone.require' => '手机号必须不能为空',
		'phone.regex' => '手机号不符合格式',
		'phone.unique' => '手机号重复',
	];
	protected $scene = [
		//add 执行添加验证
		'add' => ['name','phone','email'],
		'edit' => ['name','phone','email'],
	];
}
?>