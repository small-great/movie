<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\Login\login.html";i:1530412522;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/admins/lib/html5shiv.js"></script>
<script type="text/javascript" src="/static/admins/lib/respond.min.js"></script>
<![endif]-->
<link href="/static/admins/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/static/admins/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/static/admins/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/static/admins/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/static/admins/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 - 深蓝电影后台管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="/adminlogin/dologin" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" name="fcode" value="验证码:" style="width:150px;">
          <img id="yy" src="<?php echo captcha_src(); ?>" alt="" onclick='this.src="<?php echo captcha_src(); ?>?rand="+Math.random()' ><a id="kanbuq" onclick='a.src="<?php echo captcha_src(); ?>?rand="+Math.random()'>看不清，换一张</a> </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <!-- <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label> -->
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer"> 深蓝文化传媒有限公司 </div>
<script type="text/javascript" src="/static/admins/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admins/static/h-ui/js/H-ui.min.js"></script>
<script>
	var a=document.getElementById('yy');
</script>
</body>
</html>

