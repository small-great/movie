<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Index\index.html";i:1530436031;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>深蓝电影 - 好电影尽在深蓝电影</title>
  <link rel="stylesheet" href="/static/homes/css/home-index.10e05d67.css" />
</head>
<body>
  <?php echo widget("Publics/header"); ?>
  <div class="banner">
    <div class="slider single-item slider-banner">
      <?php if(is_array($carousel) || $carousel instanceof \think\Collection || $carousel instanceof \think\Paginator): if( count($carousel)==0 ) : echo "" ;else: foreach($carousel as $key=>$rowc): ?>
      <a target="_blank" data-act="bannerNews-click" href="<?php echo $rowc['img_link']; ?>" data-bgUrl="<?php echo $rowc['img_url']; ?>"></a>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
    <div class="container" id="app" class="page-home/index" >
<div class="content">
  <div class="aside">
    <div class="ranking-box-wrapper">
  <div class="panel">
    <div class="panel-header">
      <span class="panel-title">
        <span class="textcolor_red">今日票房</span>
      </span>
    </div>
    <div class="panel-content">
            <ul class="ranking-wrapper ranking-box">
          <?php if(is_array($movies) || $movies instanceof \think\Collection || $movies instanceof \think\Paginator): if( count($movies)==0 ) : echo "" ;else: foreach($movies as $key=>$row6): ?>
            <li class="ranking-item ranking-index-2">
      <a href="/content/<?php echo $row6['id']; ?>.html" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1208942}">
          <span class="normal-link">
            <i class="ranking-index"><?php echo $key+1; ?></i>
            <span class="ranking-movie-name"><?php echo $row6['ch_name']; ?></span>
            <span class="ranking-num-info">
                <span class="stonefont">1914.28</span>万
              </span>
          </span>
      </a>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
    </div>
  </div>
    </div>

    <div class="box-total-wrapper clearfix">
        <h3>今日大盘</h3>
        <div>
          <p>
            <span class="num"><span class="stonefont">1914.28</span></span>万
            <a class="more" target="_blank" data-act="moreDayTip-click" href="https://piaofang.maoyan.com/">查看更多 <span class="panel-arrow panel-arrow-red"></span></a>
          </p>
          <p class="meta-info">
            北京时间 24:00:00
            <span class="pull-right">深蓝专业版实时票房数据</span>
          </p>
        </div>
    </div>

    <div class="most-expect-wrapper">
  <div class="panel">
    <div class="panel-header">
      <span class="panel-more">
        <a href="/board/6" class="textcolor_orange" data-act="all-mostExpect-click">
          <span>查看完整榜单</span>
        </a>
        <span class="panel-arrow panel-arrow-orange"></span>
      </span>
      <span class="panel-title">
        <span class="textcolor_orange">最受期待</span>
      </span>
    </div>
    <div class="panel-content">
      <ul class="ranking-wrapper ranking-mostExpect">
      <?php if(is_array($movie2) || $movie2 instanceof \think\Collection || $movie2 instanceof \think\Paginator): if( count($movie2)==0 ) : echo "" ;else: foreach($movie2 as $key=>$rowr): ?>
        <li class="ranking-item ranking-index-10">
          <a href="/content/<?php echo $rowr['id']; ?>.html" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:1139994}">
              <span class="normal-link">
                <i class="ranking-index"><?php echo $key+1; ?></i>
                <span class="ranking-movie-name"><?php echo $rowr['ch_name']; ?></span>

                <span class="ranking-num-info">
                    <span class="stonefont"><?php echo $rowr['want']; ?></span>人想看
                  </span>
              </span>
          </a>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    </div>
  </div>
    </div>

  </div>
  <div class="main">
    <div class="movie-grid">
  <div class="panel">
    <div class="panel-header">
      <span class="panel-more">
        <a href="/movielist" class="textcolor_red" data-act="all-playingMovie-click">
          <span>全部</span>
        </a>
        <span class="panel-arrow panel-arrow-red"></span>
      </span>
      <span class="panel-title">
        <span class="textcolor_red">正在热映（<?php echo $count; ?>部）</span>
      </span>
    </div>
    <div class="panel-content">
      <dl class="movie-list">
    <!-- 遍历上映电影 -->
      <?php if(is_array($movies) || $movies instanceof \think\Collection || $movies instanceof \think\Paginator): if( count($movies)==0 ) : echo "" ;else: foreach($movies as $key=>$row): ?>
        <dd>
          <div class="movie-item">
            <a href="/content/<?php echo $row['id']; ?>.html" target="_blank" data-act="playingMovie-click">
            <div class="movie-poster">
              <img class="poster-default" src="/static/homes/picture/loading_2.e3d934bf.png" />
              <img data-src="<?php echo $row['picurl']; ?>" />
              <div class="movie-overlay movie-overlay-bg">
                <div class="movie-info">
                  <div class="movie-score"><i class="integer"><?php echo floor($row['grade']); ?>.</i><i class="fraction"><?php echo substr($row['grade'],"-1"); ?></i></div>
                  <div class="movie-title movie-title-padding"
                    title="<?php echo $row['ch_name']; ?>" ><?php echo $row['ch_name']; ?></div>
                </div>
              </div>
            </div>
            </a>
          </div>
        </dd>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- 遍历上映电影 -->
      </dl>
    </div>
  </div>

  <div class="panel">
    <div class="panel-header">
      <span class="panel-more">
        <a href="/movielist?showType=2" class="textcolor_blue" data-act="all-upcomingMovie-click">
          <span>全部</span>
        </a>
        <span class="panel-arrow panel-arrow-blue"></span>
      </span>
      <span class="panel-title">
        <span class="textcolor_blue">即将上映（<?php echo $count1; ?>部）</span>
      </span>
    </div>
    <div class="panel-content">
     <dl class="movie-list">
     <!-- 遍历即将上映电影 -->
     <?php if(is_array($movie1) || $movie1 instanceof \think\Collection || $movie1 instanceof \think\Paginator): if( count($movie1)==0 ) : echo "" ;else: foreach($movie1 as $key=>$rows): ?>
        <dd>
          <div class="movie-item">
            <a href="/content/<?php echo $rows['id']; ?>.html" target="_blank" data-act="upcomingMovie-click">
            <div class="movie-poster">
              <img class="poster-default" src="/static/homes/picture/loading_2.e3d934bf.png" />
              <img data-src="<?php echo $rows['picurl']; ?>" />
              <div class="movie-overlay movie-overlay-bg">
                <div class="movie-info">
                  <div class="movie-title" title="<?php echo $rows['ch_name']; ?>" ><?php echo $rows['ch_name']; ?></div>
                </div>
              </div>
            </div>
            </a>
            <div class="movie-detail movie-wish"><span class="stonefont"><?php echo $rows['want']; ?></span>人想看</div>
            <div class="movie-detail movie-detail-strong movie-presale">
              <a class="movie-presale-sep">预告片</a>
              <a href="/content/<?php echo $rows['id']; ?>.html" class="active" target="_blank">预 售</a>
            </div>
            <div class="movie-ver"><i><?php if($rows['m_version']==0): ?>2D<?php elseif($rows['m_version']==1): ?>3D<?php else: ?>2D/3D<?php endif; ?></i></div>
          </div>
          <div class="movie-detail movie-rt"><?php echo $rows['m_addtime']; ?>上映</div>
        </dd>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- 遍历即将上映电影 -->
      </dl>
    </div>
  </div>
    </div>
  </div>
</div>

</div>
  <?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js" ></script>
<script src="/static/homes/js/home-index.dba25347.js" ></script>
</body>
</html>