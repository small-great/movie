<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Cinemas\list.html";i:1530370412;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>烽禾影城(科学城店) - 猫眼电影 - 一网打尽好电影</title>

  <link rel="dns-prefetch" href="//p0.meituan.net"  />
  <link rel="dns-prefetch" href="//p1.meituan.net"  />
  <link rel="dns-prefetch" href="//ms0.meituan.net" />
  <link rel="dns-prefetch" href="//ms1.meituan.net" />
  <link rel="dns-prefetch" href="//analytics.meituan.com" />
  <link rel="dns-prefetch" href="//report.meituan.com" />
  <link rel="dns-prefetch" href="//frep.meituan.com" />


  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="cleartype" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="renderer" content="webkit" />

  <meta name="HandheldFriendly" content="true" />
  <meta name="format-detection" content="email=no" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <script>
  cid = "c_93ziierd";
  ci = 20;
    window.system = {};

  window.openPlatform = '';
  </script>
  <link rel="stylesheet" href="/static/homes/css/cinemas-cinema.c339c8d8.css"/>
</head>
<body>
   <?php echo widget("Publics/header"); ?>
<div class="banner cinema-banner">
  <div class="wrapper clearfix">
    <div class="cinema-left">
      <div class="avatar-shadow">
        <img class="avatar" src="<?php echo $details['pic']; ?>">
      </div>
    </div>

    <div class="cinema-main clearfix">
      <div class="cinema-brief-container">
        <h3 class="name text-ellipsis"><?php echo $details['name']; ?></h3>
        <div class="address text-ellipsis"><?php echo $details['area']; ?><?php echo $details['address']; ?></div>
        <div class="telphone">电话：<?php echo $details['phone']; ?></div>
      </div>
    </div>

    <div class="cinema-map" data-lat="22.96935" data-lng="113.32306">
      <span class="show-map"></span>
    </div>
  </div>
</div>


<div class="container" id="app" class="page-cinemas/cinema" style="margin-top:120px">
  <div class="movie-list-container" data-cinemaid="2161">
    <div class="movie-list">
      <?php if(is_array($movies) || $movies instanceof \think\Collection || $movies instanceof \think\Paginator): if( count($movies)==0 ) : echo "" ;else: foreach($movies as $key=>$row): ?>
      <div class="movie <?php if($mid==$row['id']): ?>active<?php endif; ?>" key="<?php echo $key; ?>" name="<?php echo $row['id']; ?>" id="<?php echo $details['id']; ?>">
        <img src="<?php echo $row['picurl']; ?>" alt="">
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      <span class="pointer"></span>
    </div>

    <span class="scroll-prev scroll-btn"></span>
    <span class="scroll-next scroll-btn"></span>
  </div>
  <div class="show-list active" id="show-list-t" data-index="0">
    <div class="movie-info">
      <div>
        <h3 class="movie-name"><?php echo $m['ch_name']; ?></h3>
        <span class="score sc"><?php echo $grade; ?></span>
      </div>

      <div class="movie-desc">
        <div>
          <span class="key">时长 :</span>
          <span class="value"><?php echo $m['m_time']; ?>分钟</span>
        </div>
        <div>
          <span class="key">类型 :</span>
          <span class="value"> <?php echo $m['m_type']; ?> </span>
        </div>
        <div>
          <span class="key">主演 :</span>
          <span class="value"> <?php echo $m['m_director']; ?></span>
        </div>
      </div>
    </div>
    <div class="plist-container active">
      <table class="plist">
        <thead>
          <tr>
            <th>放映时间</th>
            <th>语言版本</th>
            <th>放映厅</th>
            <th>售价（元）</th>
            <th>选座购票</th>
          </tr>
        </thead>

        <tbody>
        <?php if(is_array($relss) || $relss instanceof \think\Collection || $relss instanceof \think\Paginator): if( count($relss)==0 ) : echo "" ;else: foreach($relss as $key=>$rows): ?>
          <tr class="">
            <td>
              <span style="color:red"><?php echo substr($rows['day'],"5"); ?></span>
              <span class="begin-time"><?php echo $rows['start_time']; ?></span>
              <br />
              <span class="end-time"><?php echo $rows['end_time']; ?>散场</span>
            </td>
            <td>
              <span class="lang"><?php echo $rows['laguage']; if($rows['m_version']==0): ?>2D<?php elseif($rows['m_version']==1): ?>3D<?php else: ?>2D/3D<?php endif; ?></span>
            </td>
            <td>
              <span class="hall"><?php echo $rows['hallname']; ?></span>
            </td>
            <td>
              <span class="sell-price"><span class="stonefont"><?php echo $rows['m_price']; ?></span></span>
            </td>
            <td>
              <a href="/seats/<?php echo $rows['id']; ?>-<?php echo $rows['hid']; ?>-<?php echo $rows['mid']; ?>-<?php echo $rows['cid']; ?>" class="buy-btn normal">选座购票</a>
            </td>
          </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
    <div class="plist-container "></div>
  </div>
  <div class="big-map-modal" style="display: none">
    <div class="close-map"></div>
    <div class="big-map"></div>
  </div>
</div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js"></script>
<script src="/static/homes/js/cinemas-cinema.e0024071.js"></script>
</body>
<script>
  var movie = $(".movie");
  for(var i=0;i<movie.length;i++){
    movie[i].onclick=function(){
      mid=$(this).attr('name');
      id=$(this).attr('id');
      $(this).addClass("active").siblings().removeClass("active");
      $.get("/cinemass",{id:id,mid:mid},function(data){
        $("#show-list-t").html(data);
      });
    }
  }
</script>
</html>
