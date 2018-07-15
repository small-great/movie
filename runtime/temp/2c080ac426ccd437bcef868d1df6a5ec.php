<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Movielist\list.html";i:1530666408;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>电影列表</title>
  <link rel="stylesheet" href="/static/homes/css/movie-list.22f5a22a.css"/>
  <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
</head>
<body>
  <?php echo widget("Publics/header"); ?>
  <div class="container" id="app" class="page-movie/list" >
  <div class="movies-channel">
  <div class="movies-panel">
    <div class="movies-sorter">
      <div class="play-sorter">
        <span class="sort-control-group" data-act='isplay-click' data-val="{isplay:1}"
          data-href="?isPlay=1"
          onclick="location.href=this.getAttribute('data-href')">
          <span class="sort-control sort-checkbox"></span>
          <span class="sort-control-label">可播放</span>
        </span>
      </div>
    </div>
    <div class="movies-list">
    <dl class="movie-list">
<?php if($c != 0): if(is_array($data1) || $data1 instanceof \think\Collection || $data1 instanceof \think\Paginator): if( count($data1)==0 ) : echo "" ;else: foreach($data1 as $key=>$rows): ?>
  <dd>
    <div class="movie-item">
      <a href="/content/<?php echo $rows['id']; ?>.html" target="_blank">
      <div class="movie-poster">
        <img class="poster-default" src="/static/homes/picture/loading_2.e3d934bf.png" />
        <img data-src="<?php echo $rows['picurl']; ?>" />
      </div>
      </a>
        <div class="channel-action channel-action-sale">
  <a>购票</a>
</div>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="<?php echo $rows['ch_name']; ?>">
      <a href="/content/<?php echo $rows['id']; ?>.html" target="_blank"><?php echo $rows['ch_name']; ?></a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">8.</i><i class="fraction">6</i></div>
<?php endforeach; endif; else: echo "" ;endif; else: ?>
<div id="found" style="position:relative;left:40%;top:0"><h1><i>搜索不到</i></h1></div>
<?php endif; ?>
</dd>
</dl>
    </div>
    <div id="pages" style="text-align:center">
       <?php echo $data1->appends($request)->render(); ?>
    </div>
  </div>
</div>
    </div>
  <?php echo widget("Publics/footer"); ?>
</body>
<script src="/static/homes/js/common.dc33ab40.js" ></script>
<script src="/static/homes/js/profile-profile.be74a9c6.js"></script>
</html>