<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Mailer extends Validate
{
	//设置规则
	//unique:校验唯一
	protected $rule = [
		'username' => 'require',
		'title' => 'require',
		'content' => 'require',
	];
	//规则提示信息
	protected $message = [
		'username.require' => '收件人不能为空',
		'title.require' => '标题不能为空',
		'content.require' => '内容不能为空',
	];
	protected $scene = [
		//add 执行添加验证
		'add' => ['username','title','cont'],
	];
}
?>