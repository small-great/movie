<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Adminss extends Validate
{
	//设置规则   regex:\w{4,8}  验证用户名为4到8位数字字母下划线
	//unique:校验唯一   admin指的是数据表
	protected $rule = [
		'name' => 'require|regex:\w{4,16}|unique:admin',//用户规则
		'password'=> 'require|regex:\w{6,18}',
		'repassword'=> 'require|regex:\w{6,18}|confirm:password',
	];
	//规则提示信息
	protected $message = [
		'name.require' => '用户名必须不能为空',
		'name.regex' => '用户名必须为4到16位数字字母下划线的组合',
		'name.unique' => '用户名已存在',
		'password.require' => '密码必须不能为空',
		'password.regex' => '密码必须为6到18位数字字母下划线的组合',
		'repassword.require' => '重复密码必须不能为空',
		'repassword.regex' => '重复密码必须为6到18位数字字母下划线的组合',
		'repassword.confirm' => '两次密码不一致',
	];
	protected $scene = [
		//add 执行添加验证'email',,'phone'
		'add' => ['name','password','repassword'],
		//执行修改验证
		'edit' => ['name','password','repassword'],
	];
}
?>