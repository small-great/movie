<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\News\info.html";i:1530439977;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>资讯</title>
  <link rel="stylesheet" href="/static/homes/css/news-detail.8be10f92.css"/>
  <script src="/static/homes/public/js/jquery.js"></script>
</head>
<body>
  <?php echo widget("Publics/header"); ?>
  <div class="container" id="app" class="page-news/detail" >
<div class="news-page">
  <div class="news-related">
   <div class="module">
    <div class="mod-title">
     <h3>相关电影</h3>
    </div>
    <?php if($data['cname']!=null): ?>
    <div class="mod-content">
     <div class="related-movies">
      <dl class="movie-list">
       <dd>
        <div class="movie-item">
         <a href="/content/<?php echo $data['mid']; ?>.html" target="_blank" data-act="movie-click" data-val="{movieid:1163201}">
          <div class="movie-poster">
           <img class="poster-default" src="//ms0.meituan.net/mywww/image/loading_2.e3d934bf.png" />
           <img src="<?php echo $data['mpicurl']; ?>" />
          </div> </a>
         <div class="movie-ver">
          <i class="m3d"></i>
         </div>
        </div>
        <div class="channel-detail movie-item-title" title="<?php echo $data['cname']; ?>">
         <a href="/content/<?php echo $data['mid']; ?>.html" target="_blank" data-act="movies-click" data-val="{movieId:1163201}"><?php echo $data['cname']; ?></a>
        </div>
        <div class="channel-detail channel-detail-orange">
         <?php if($data['grade']=='0.0'): ?>暂无评分<?php else: ?><?php echo $data['grade']; ?>分<?php endif; ?>
        </div>
       </dd>
      </dl>
     </div>
    </div>
    <?php endif; ?>
   </div>
  </div>

  <div class="news-related">

  </div>
  <div class="news-main">
    <div class="news-title">
      <h1><?php echo $data['title']; ?></h1>
      <div class="news-subtitle">
        猫眼娱乐&nbsp;&nbsp;
        <?php echo date("m-d",$data['newstime']); ?> <?php echo date("H:i",$data['newstime']); ?>&nbsp;&nbsp;
        <span class="news-icon-views"></span>
        <?php echo $data['hotnum']; ?>
      </div>
    </div>
    <div class="news-content">
    <?php echo $data['descr']; ?>
    </div>

    <div class="news-action" data-val="{ newsid: 41725 }">
      <?php if(\think\Session::get('uid')=='' and !$result): ?>
      <a href="/login/index"><span class="news-action-block like-news">
        <span class="like-icon"></span>&nbsp;&nbsp;
        <span class="like-news-count" data-count="0" id="gooded">
          赞
        </span
      </span></a>
      <?php elseif(\think\Session::get('uid')=='' and $result): ?>
      <span class="news-action-block like-news" id="good" name="<?php echo $data['id']; ?>">
        <span class="like-icon"></span>&nbsp;&nbsp;
        <span class="like-news-count" data-count="0" id="gooded">
          <?php echo $result; ?>
        </span>
      </span>
      <?php else: ?>
      <span class="news-action-block like-news <?php if($res&&$res['status']==1): ?>liked<?php endif; ?>" id="good" name="<?php echo $data['id']; ?>">
        <span class="like-icon"></span>&nbsp;&nbsp;
        <span class="like-news-count" data-count="0" id="gooded">
        <?php echo $result; ?>
        </span>
      </span>
      <?php endif; ?>
      <div style="display: inline-block; position: relative;">
      <div class="news-action-block share-banner">
        <span class="share-banner-icon"></span>&nbsp;&nbsp;分 享
      </div>
      <div id="inff" style="position: absolute; top: 42px; left: 0px; z-index: 10; display: none;">
      </div>
      </div>
    </div>


    <div class="module">
      <div class="mod-title">
        <h3>最新评论</h3>
      </div>
      <div class="mod-content">
        <div class="no-comments">
          <div class="no-comments-img"></div>
          <div class="no-comments-text">暂无评论</div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<?php echo widget("Publics/footer"); ?>
<script id="share-info" type="text/html">
<div class="share-board">
  <div class="share-qrcode">
    <div class="share-qrcode-desc">QQ / 微信扫码</div>
    <div class="share-qrcode-img" title="http://m.maoyan.com/information/41725?_v_=yes"><canvas width="90" height="90" style="display: none;"></canvas><img alt="Scan me!" src="data:image/png;base64,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" style="display: block;"></div>
  </div>
  <div class="share-list">
  <a target="_blank" class="share-icon share-icon-douban" data-act="news-share-douban" href="https://www.douban.com/share/service/?href=<?php echo urlencode($request->url(true)); ?>&name=<?php echo urlencode($data['title']); ?>" title="分享到豆瓣">豆瓣</a>
  <a target="_blank" class="share-icon share-icon-qzone" data-act="news-share-qqzone" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo urlencode($request->url(true)); ?>&summary=<?php echo urlencode($data['title']); ?>&pics=<?php echo urlencode($request->url(true).$data['mpicurl']); ?>" title="分享到QQ空间">QQ空间</a>
  <a target="_blank" class="share-icon share-icon-renren" data-act="news-share-renren"  href="http://widget.renren.com/dialog/share?resourceUrl=<?php echo $request->url(true); ?>&srcUrl=<?php echo urlencode($request->url(true)); ?>&description=<?php echo urlencode($data['title']); ?>&pic=<?php echo urlencode($request->url(true).$data['mpicurl']); ?>" title="分享到人人网">人人网</a>
  <a target="_blank" class="share-icon share-icon-weibo" data-act="news-share-weibo"
  href="http://v.t.sina.com.cn/share/share.php?appkey=375875218&url=<?php echo urlencode($request->url(true)); ?>&title=<?php echo urlencode($data['title']); ?>&pic=<?php echo urlencode($request->url(true).$data['mpicurl']); ?>" title="分享到新浪微博">新浪微博</a>
  <a target="_blank" class="share-icon share-icon-tweibo" data-act="news-share-tweibo" data-val="{ newsid:41725}"
  href="http://v.t.qq.com/share/share.php?appkey=51d04b4824744e71bd1e55baceb42562&url=<?php echo urlencode($request->url(true)); ?>&title=<?php echo urlencode($data['title']); ?>&pic=<?php echo urlencode($request->url(true).$data['mpicurl']); ?>" title="分享到腾讯微博">腾讯微博</a>
  </div>
</div>
</script>
</body>
<script src="/static/homes/js/news-detail.749f72a5.js"></script>
<script type="text/javascript">
//微信扫码
info=$('#share-info').html();
$('#inff').append(info);
  $('.news-action-block').hover(function(){
    $(this).next("#inff").css("display","block");
  },function(){
    $(this).next("#inff").css("display","none");
  });
$('#inff').hover(function(){
    $(this).css("display","block");
  },function(){
    $(this).css("display","none");
  });
//点赞
$("#good").click(function(){
  id=$(this).attr('name');
  o=$(this);
  p=$("#gooded").html();
  $.post("/newsgood",{id:id},function(data){
    if(data){
      o.addClass("liked");
      p=parseInt(p)+1;
      $("#gooded").html(p);
    }else{
      p=parseInt(p)-1

      o.removeClass("liked");
      $("#gooded").html(p);
    }
  });
});

</script>
</html>
