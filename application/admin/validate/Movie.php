<?php
namespace app\admin\validate;
//导入Validate 类
use think\Validate;
//定义验证器类
class Movie extends Validate{
	//设置规则
	protected $rule=[
						//用户规则 require 验证某个字段必须  检验某个参数是否符合正则  unique 校验字段是否唯一 Movies 数据表
						['ch_name','require|max:50|unique:Movies','电影中文名称不能为空|电影中文名称最多不能超过25个字符'],
						['en_name','require','电影英文名称不能为空'],
						['country_area','require|max:50','国家不能为空|国家最多不能超过25个字符'],
						['m_time','require|number|max:50','电影总时长不能为空|请输入为数字(电影总时长)|电影总时长最多不能超过25个字符'],
						['m_director','require|max:50','导演不能为空|导演最多不能超过25个字符'],
						['m_actor','require|max:50','主演不能为空|主演最多不能超过25个字符'],
						['m_price','require|number|max:50','价格不能为空|请输入为数字(单价)|价格最多不能超过25个字符'],
						['surplus','require|number|max:50','剩余量不能为空|请输入为数字(剩余量)|剩余量最多不能超过25个字符'],
						['laguage','require|max:50','语言不能为空|语言最多不能超过25个字符'],
						['status','require','状态不能为空'],
						['content','require','电影介绍不能为空'],
					];

	protected $scene = [
		//add 执行添加验证
		'add' => ['ch_name','en_name','country_area','m_time','m_director','m_actor','m_price','surplus','laguage','content'],
		//edit 执行修改验证
		'edit' => ['en_name','country_area','m_time','m_director','m_actor','m_price','surplus','laguage','content'],
	];

}
 ?>