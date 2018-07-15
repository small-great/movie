<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Login\login.html";i:1530349833;}*/ ?>
﻿<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="UTF-8" />
  <title>深蓝电影购票登陆页面</title>
  <link rel="stylesheet" href="/static/homes/login/css/reset.css" />
  <link rel="stylesheet" href="/static/homes/login/css/style.css" media="screen" type="text/css" />
  <style>
    .icon,.icon1{width:310px;height:20px;padding-left:18px;display:none;background-color:#fff;color:red;background:url(/static/homes/reg/images/icon_off.ico) no-repeat 2px 2px;background-size:5% 90%;padding-top:2px;}`
      .input-row{margin:0 !important;}
      .under-line a{text-decoration:none;font-size:12px;}
      .under-line a:hover{text-decoration:underline;}
  </style>
 </head>
 <body>
  <div id="window" >
    <span class="under-line">
    <a href="/" style="color:#fff;">首页</a>
    </span>
   <div class="page page-front" >
    <div class="page-content" >
    <form action="/login/dologin" method="post" id="form">
     <div class="input-row">
      <label class="label fadeIn">用户名</label>
      <input id="username" name="username" type="text" placeholder="用户名/手机号/邮箱号" class="input fadeIn delay1" maxlength="18" />
      <i class="icon"></i>
     </div>
     <div class="input-row" style="padding-bottom:18px;">
      <label class="label fadeIn delay2">密码</label>
      <input id="password" name="password" type="password" class="input fadeIn delay3" placeholder="请输入6-18位数字字母下划线" maxlength="18"/>
      <i class="icon1"></i>
     </div>
     <div class="input-row perspective">
      <input type="submit"  class="button load-btn fadeIn delay4" value="登录">
     </div>
     <div class="under-line">
      <a href="/register/index" style="float:left;color:#fff">注册</a>
      <a href="/forget/index" style="float:right;color:red;">忘记密码?</a>
      <div style="clear:both"></div>
     </div>
    </form>
    </div>
   </div>
  </div>
  <script type="text/javascript" src="/static/homes/login/js/jquery.js"></script>
  <script type="text/javascript" src="/static/homes/login/js/fyll.js"></script>
  <script type="text/javascript" src="/static/homes/login/js/index.js"></script>
 </body>
<script>
var u = '';
var p = '';
NAME = false;
PASS = false;
var icon_off = {"display":"block","color":"red","background-image":"url(/static/homes/reg/images/icon_off.ico"};
var icon_ok = {"display":"block","color":"green","background-image":"url(/static/homes/reg/images/icon_ok.ico"};
$("#username").focus(function(){
  $(".icon").css("display","none");
});
$("#password").focus(function(){
  $(".icon1").css("display","none");
});
$("input[name='password']").blur(function(){
  p = $(this).val();
  if(p.length==0){
    PASS = false;
    $(".icon1").css(icon_off).html("密码不能为空");
  }else if(p.length<6||p.length>18){
    PASS = false;
    $(".icon1").css(icon_off).html("请输入6-18位数字字母下划线的密码组合");
  }else{
    PASS = true;
    $(".icon1").css("display","none");
  }
});

// $("input[name='username']").blur(function(){
//   u = $("#username").val();
//   $.post("/login/login",{u:u,p:p},function(data){
//     if(data==1){
//       NAME = true;
//     }else if(data==2){
//       NAME = false;
//       $(".icon").css(icon_off).html("用户名不能为空");
//     }else if(data==3){
//       NAME = false;
//       $(".icon").css(icon_off).html("该用户还没激活,请先激活再登陆");
//     }else if(data==4){
//       NAME = false;
//       $(".icon").css(icon_off).html("用户名不存在");
//     }else if(data==5){
//       NAME = false;
//       $(".icon1").css(icon_off).html("密码不正确");
//     }
//   });
// });


$("input[name='username']").blur(function(){
  u = $("#username").val();
  if(u.length<0){
    $(".icon").css(icon_off).html("用户名不能为空");
  }
});


//表单提交事件
$("#form").submit(function(){
  //让某个元素触发某类事件
  $("input").trigger("blur");
  if(PASS){
    return true;
  }else{
    return false;
  }
});
 </script>
</html>