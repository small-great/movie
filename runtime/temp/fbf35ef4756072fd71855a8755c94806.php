<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\News\list.html";i:1530429096;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>资讯</title>
  <link rel="stylesheet" href="/static/homes/css/news-hotnews.a01df872.css"/>
  <script src="/static/homes/public/js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
</head>
<body>
<?php echo widget("Publics/header"); ?>
<div class="container" id="app">
  <div class="detail-container">
    <div class="news-container">
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
    <div class="news-box clearfix">
      <a class="news-img" href="/newsinfo/id/<?php echo $row['id']; ?>"  data-act="news-click" data-val="{ newsid:40563 }"> <img src="<?php echo $row['pic']; ?>" alt="" /> </a>
      <div class="news-content ">
        <h4 class="news-header one-line"> <a href="/newsinfo/id/<?php echo $row['id']; ?>" data-act="news-click" data-val="{ newsid:40563 }"><?php echo $row['title']; ?></a> </h4>
        <div class="latestNews-text">
        <?php echo mb_substr($row['descr'],0,60); ?>...
        </div>
        <div class="info-container">
          <span class="news-source">猫眼电影</span>
          <span class="news-date"><?php echo date("m-d",$row['newstime']); ?></span>
          <span class="images-view-count view-count"><?php echo $row['hotnum']; ?></span>
        </div>
      </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div id="pages" style="margin-left:300px">
       <?php echo $data->appends($request)->render(); ?>
    </div>
  </div>
</div>
<?php echo widget("Publics/footer"); ?>
</body>
<script src="/static/homes/js/news-hotnews.dcc7a8ef.js"></script>
</html>
