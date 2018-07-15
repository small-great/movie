<?php
namespace app\admin\validate;
//导入系统验证类 Validate
use think\Validate;
class Halls extends Validate
{
	//设置规则
	//unique:校验唯一
	protected $rule = [
		'hallname' => 'require|unique:halls',//
		'hallnum'=> 'require|regex:/^\+?[1-9]\d*$/',
	];
	//规则提示信息
	protected $message = [
		'hallname.require' => '放映厅名必须不能为空',
		'hallname.unique' => '放映厅名已存在',
		'hallnum.require' => '座位数必须不能为空',
		'hallnum.regex' => '必须先选择座位,并保存座位位置',
	];
	protected $scene = [
		//add 执行添加验证
		'add' => ['hallname','hallnum'],
		//执行修改验证
		'edit' => ['hallname','hallnum'],
	];
}
?>