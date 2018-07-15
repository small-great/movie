<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Publics\header.html";i:1530370187;}*/ ?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>深蓝电影 - 一网打尽好电影</title>
  <meta charset=utf-8"utf-8">
  <meta name="keywords" content="电影,电视剧,票房,美剧,深蓝电影,电影排行榜,电影票,经典电影,在线观看">
  <meta name="description" content="国内观众优选的在线购票平台，用户流行的观影决策平台。">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/static/homes/css/common.4b838ec3.css" />
  <link rel="stylesheet" href="/static/homes/css/profile-profile.13d06bf4.css"/>
 <script src="/static/admins/js/jquery.min.js"></script>
   <script src="/static/homes/js/stat.791ffac0.js" ></script>
  <script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/homes/css/image-2x.8ba7074d.css"/>') }</script>
    <style>
    .city-container:hover .city-list{display:block;height:420px;width:600px;}
    /*.city-picker-span{width:360px !important;}
    .city-picker-dropdown{width:560px !important;}
    .content{margin-top:12px;}*/
  </style>
</head>
<body>
<div class="header">
<?php if($rule==''): ?>
  <div id="ads" style="position:absolute;z-index:999999999;width:100%;">
    <a href="<?php echo $ads['url']; ?>" title="<?php echo $ads['name']; ?>"><img src="<?php echo $ads['opic']; ?>" width="100%" height="100px"></a>
    <a href="javascript:;" class="am-close am-close-alt" style="position:relative;bottom:105px;left:1330px;" id="close" title="关闭">&times;</a>
  </div>
<?php endif; ?>
  <div class="header-inner">
        <a href="/" class="logo" data-act="icon-click"></a>
        <div class="nav">
            <ul class="navbar">
                <li><a href="/" <?php if($rule==''): ?>class="active"<?php endif; ?> >首页</a></li>
                <li><a href="/movielist" <?php if($rule=='movielist'): ?>class="active"<?php endif; ?> >电影</a></li>
                <li><a href="/cinemas" <?php if($rule=='cinemas'): ?>class="active"<?php endif; ?> >影院</a></li>
                <li><a href="/board" <?php if($rule=='board'): ?>class="active"<?php endif; ?> >榜单</a></li>
                <li><a href="/news" <?php if($rule=='news'): ?>class="active"<?php endif; ?> >资讯</a></li>
            </ul>
        </div>

        <div class="user-info" style="margin-right:0">
            <div class="user-avatar" style="">
              <img src="<?php echo $picurl; ?>" >
              <span class="caret"></span>
              <ul class="user-menu">
              <?php if(\think\Session::get('uid')==''): ?>
                <li class="text"><a href="/login/index">登录</a></li>
                <li class="text"><a href="/register/index">注册</a></li>
              <?php else: ?>
                <li class="text"><a href="/users/index/<?php echo \think\Session::get('uid'); ?>.html"><?php echo \think\Session::get('username'); ?></a></li>
                <li class="text"><a href="/login/loginout">退出登录</a></li>
              <?php endif; ?>
              </ul>
            </div>
        </div>



        <form action="/movielist/list" target="_blank" class="search-form" data-actform="search-click" style="margin-right:20px;">
            <input name="k" class="search" type="search" maxlength="32" placeholder="找影视剧" autocomplete="off">
            <input class="submit" type="submit" value="">
        </form>



        <div class="app-download" style="margin-left:0px">
          <a href="javascript:;" >
            <span class="iphone-icon"></span>
            <span class="apptext">APP下载</span>
            <span class="caret"></span>
            <div class="download-icon">
                <p class="down-title">扫码下载APP</p>
                <p class='down-content'>选座更优惠</p>
            </div>
          </a>
        </div>
  </div>
</div>
<div class="header-placeholder"></div>
<script>
$(".navbar li").click(function(){
  $(this).find("a").addClass('active').siblings().removeClass('active');
});

$("#close").click(function(){
  $("#ads").slideUp();
});
</script>