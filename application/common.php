<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Config;
use think\Cookie;
// 应用公共文件
// 发送邮件函数
function sendemail($to,$title,$content){
	$mail = new \Org\Util\PHPMailer();
	// var_dump($mail);
	//设置字符集
	$mail->CharSet="utf-8";
	//设置采用SMTP方式发送邮件
	$mail->isSMTP();
	//设置邮件服务器地址
	$mail->Host=Config::get('mailarr.host');
	//C 获取配置文件信息
	//设置邮件服务器的端口 默认的是25  如果需要谷歌邮箱的话 443 端口号
	$mail->Port=25;
	//设置发件人的邮箱地址
	$mail->From=Config::get('mailarr.username');
	// $mail->FromName='我';//
	//设置SMTP是否需要密码验证
	$mail->SMTPAuth=true;
	//发送方
	$mail->Username=Config::get('mailarr.username');
	//C客户端的授权密码
    $mail->Password=Config::get('mailarr.password');
	//发送邮件的主题
	$mail->Subject=$title;
	//内容类型 文本型
	$mail->AltBody="text/html";
	//发送的内容
	$mail->Body=$content;
	//设置内容是否为html格式
	$mail->isHTML(true);
	//设置接收方
	$mail->addAddress(trim($to));
	$res = $mail->send();
	return $res;
}

//短信验证码获取实例
function ucpaas($p){
	Vendor("libs.Ucpaas");
	//初始化必填
	//accountsid token 请求云之讯平台
	//填写在开发者控制台首页上的Account Sid
	$options['accountsid']= Config::get('ucpaas.accountsid');
	//填写在开发者控制台首页上的Auth Token
	$options['token']=Config::get('ucpaas.token');
	//初始化 $options必填
	$ucpass = new Ucpaas($options);
	$appid = Config::get('ucpaas.appid');	//应用的ID，可在开发者控制台内的短信产品下查看
	$templateid = Config::get('ucpaas.templateid');  //模板id   //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
	$param = Config::get('ucpaas.param'); //验证码 //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
	$mobile = $p;//电话
	$uid = "";
	//把校验码存储在cookie里
	Cookie::set('vcode',$param,Config::get('ucpaas.second'));
	//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
}

