<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class AdminInfo extends Validate
{
	//设置规则   regex:\w{4,8}  验证用户名为4到8位数字字母下划线
	//unique:校验唯一
	protected $rule = [
		'email' =>'require|email|unique:admin_info',
		'phone'=> 'require|regex:\d{11}|unique:admin_info',
	];
	//规则提示信息
	protected $message = [
		'email.require' => '邮箱必须不能为空',
		'email.email' => '邮箱不符合格式',
		'email.unique' => '邮箱重复',
		'phone.require' => '手机号必须不能为空',
		'phone.regex' => '手机号不符合格式',
		'phone.unique' => '手机号重复',
	];
	protected $scene = [
		//add 执行添加验证'email',,'phone'
		'add' => ['email','phone'],
		//执行修改验证
		'edit' => ['email','phone'],
	];
}
?>