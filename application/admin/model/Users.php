<?php
namespace app\admin\model;
use think\Model;
/**
 *管理员表数据库操作模型
 * @param [type] $argument [description]
 * @return [type] 返回值的描述
 */
class Users extends Model
{
	// 设置当前模型对应的完整数据表名称
	protected $table = 'users';
}
