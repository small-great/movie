<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;
//后台 登陆路由
Route::controller("/adminlogin","admin/Login");
//后台 首页路由 管理员路由
Route::controller("/admin","admin/Admin");
//后台 角色路由
Route::controller("/adminrolelist","admin/Permission");
//后台 角色模块路由
Route::controller("/role","admin/Role");
//后台 权限模块路由
Route::controller("/adminlists","admin/Lists");
//后台 用户模块路由
Route::controller("/user","admin/User");
//后台 用户模块路由
Route::controller("/trash","admin/Trash");
//后台 影片管理模块路由
Route::controller("/movieimage","admin/MovieImage");
//后台 影片图片管理模块路由
Route::controller("/movie","admin/Movie");
//后台 友情链接模块管理
Route::controller("/link","admin/Link");
//后台 广告链接模块管理
Route::controller("/ads","admin/Ads");
//后台 资讯管理模块管理
Route::controller("/information","admin/Information");
//后台 影院管理
Route::controller("/cinema","admin/Cinema");
//后台 场次管理
Route::controller("/relss","admin/Relss");
//后台 放映厅管理
Route::controller("/hall","admin/Hall");
//后台 订单管理
Route::controller("/order","admin/Order");
//后台 评分管理
Route::controller("/grade","admin/Grade");
//后台 轮播图管理
Route::controller("/carousel","admin/Carousel");
//后台站内信管理
Route::controller("/mailer","admin/Mailer");


//前台 首页路由
Route::get("/","index/Index/index");
Route::controller("/index","index/Index");
//前台 注册路由
Route::controller("/register","index/Register");
//前台 登陆路由
Route::controller("/login","index/Login");
//前台 忘记密码路由
Route::controller("/forget","index/Forget");
//前台 用户中心添加路由
Route::post("/users/insert","index/Users/insert");
//前台 用户中心修改路由
Route::post("/users/update","index/Users/update");
//前台 用户中心站内信修改路由
Route::controller("/users/mailer","index/Users");
//前台 用户中心站订单信息路由
Route::controller("/users/morder","index/Users");
//前台 资讯路由
Route::get("/news","index/News/index");
//前台 资讯列表路由
Route::get("/newslist","index/News/list");
//前台 资讯详情路由
Route::get("/newsinfo","index/News/info");
//前台 资讯点赞路由
Route::post("/newsgood","index/News/good");
//强制伪静态'ext'=>'html'
//用户id传值的路由
Route::rule("/users/index/:id","index/Users/index","get",['ext'=>'html'],['id'=>'\d+']);
//电影内容 id 传值路由
Route::rule("/content/:id","index/Movielist/content","get",['ext'=>'html'],['id'=>'\d+']);
Route::group([],function(){
	//前台 电影列表路由
	Route::get("/movielist","index/Movielist/index");
	//前台 搜索电影路由
	Route::get("/movielist/list","index/Movielist/list");
	//前台 评分电影路由
	Route::get("/movielist/grade","index/Movielist/grade");
	//前台 想看电影路由
	Route::get("/movielist/want","index/Movielist/want");
	//前台 想看电影路由
	Route::get("/movielist/good","index/Movielist/good");
});
Route::group([],function(){
	//前台 所有影院列表路由
	Route::get("/cinemas","index/Cinemas/index");
	//前台 影院地址路由
	Route::get("/cinemas/area","index/Cinemas/area");
	//影院电影场次内容 id 传值路由
	Route::get("/cinemass","index/Cinemas/relsslist");
	//电影下的影店列表 id 传值路由
	Route::rule("/cinemasss/:id","index/Cinemas/indexcinema","get",['ext'=>'html'],['id'=>'\d+']);
});
//前台 榜单路由
Route::get("/board","index/Board/index");
//前台 选座路由
Route::get("/seats/<rid>-<hid>-<mid>-<cid>","index/Seat/index");
//前台 选座的发送验证码路由
Route::controller("/seat","index/Seat");
//前台 选座的发送验证码路由
Route::controller("/morder","index/Morder");







