<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\News\index.html";i:1530444283;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>资讯</title>
  <link rel="stylesheet" href="/static/homes/css/news-hotnews.a01df872.css"/>
  <script src="/static/homes/public/js/jquery.js"></script>
</head>
<body>
  <?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-news/hotNews" >
      <div class="hotIndex-container">
    <div class="index-news-container clearfix">
        <div class="popular-container">
    <h4 class="red">热门资讯</h4>
      <ul>
          <?php if(is_array($data1) || $data1 instanceof \think\Collection || $data1 instanceof \think\Paginator): if( count($data1)==0 ) : echo "" ;else: foreach($data1 as $key=>$row1): ?>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking" id="<?php echo $key+1; ?>" name="<?php echo $row1['id']; ?>" pic="<?php echo $row1['pic']; ?>"><?php echo $key+1; ?></i>
                  <p class="top10-news-content">
                    <a href="/newsinfo/id/<?php echo $row1['id']; ?>" data-act="news-click" data-val="{newsid:40511}"><?php echo $row1['title']; ?></a>
                  </p>
                </div>
            </div>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
  </div>

        <div class="latest-container">
      <h4 class="latest-header red">
    最新资讯
    <a href="/newslist" class="all-latest" data-act="all-news-click">
      全部
      <span class="arrow red-arrow"></span>
    </a>
  </h4>

    <div class="latest-content clearfix">
          <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
          <div class="latest-news-box">
            <a href="/newsinfo/id/<?php echo $row['id']; ?>"  data-act="news-click" data-val="{newsid:40563}">
              <img src="<?php echo $row['pic']; ?>" alt="">
            </a>
            <p class="latest-news-title">
              <a href="/newsinfo" class="two-line" title="<?php echo $row['title']; ?>" data-act="news-click" data-val="{newsid:40563}">
                <?php echo $row['title']; ?>
              </a>
            </p>
            <div class="info-container">
              <span>猫眼电影</span>
              <span class="images-view-count view-count"><?php echo $row['hotnum']; ?></span>
            </div>
          </div>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php echo widget("Publics/footer"); ?>
</body>
<script type="text/javascript">
$(".ranking").each(function(){
  id=$(this).attr('id');
  pic=$(this).attr('pic');
  nid=$(this).attr('name');
  if(id=='1'){
    $(this).next('p').find('a').prepend(' <div class="top-info-thumb"><a href="/newsinfo/id/'+nid+'" target="_blank" data-act="news-click"> <img src="'+pic+'"/> <i class="ranking top-info-icon red-bg">1</i> </a> </div>');
    $("#1").css('display','none');
  }

  if(id=='2'){
    $("#2").css('color','red');
  }

  if(id=='3'){
    $("#3").css('color','red');
  }
});
  
</script>
<script src="/static/homes/js/news-hotnews.dcc7a8ef.js"></script>
</html>
