<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Movielist\index.html";i:1530666354;}*/ ?>
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
  <div class="subnav" id="pid">
    <ul class="navbar">
      <li>
        <a data-act="subnav-click" <?php if($showType=='1'||$showType==''): ?> class="active" <?php endif; ?> href="?showType=1">正在热映</a>
      </li>
      <li>
        <a data-act="subnav-click" <?php if($showType=='2'): ?> class="active" <?php endif; ?> href="?showType=2">即将上映</a>
      </li>
    </ul>
  </div>
  <div class="container" id="app" class="page-movie/list" >
  <div class="movies-channel">
    <div class="tags-panel">
    <ul class="tags-lines">
      <li class="tags-line" data-val="{tagTypeName:'cat'}">
        <div class="tags-title">类型 :</div>
        <ul class="tags">
        	<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$row): ?>
          <li <?php if($key==$typeid): ?> class="active"<?php endif; ?>>
            <a data-act="tag-click"   href="?typeid=<?php echo $key; if(!empty($countryid)): ?>&countryid=<?php echo $countryid; endif; if(!empty($addtimeid)): ?>&addtimeid=<?php echo $addtimeid; endif; if(!empty($showType)): ?>&showType=<?php echo $showType; endif; ?>" style="margin:0 1px"><?php echo $row; ?></a>

          </li>
 			<?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </li>

      <li class="tags-line tags-line-border" data-val="{tagTypeName:'source'}">
        <div class="tags-title">区域 :</div>
        <ul class="tags">
        	<?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): if( count($country)==0 ) : echo "" ;else: foreach($country as $key=>$row1): ?>
          <li <?php if($key==$countryid): ?> class="active"<?php endif; ?> >
            <a data-act="tag-click" href="?countryid=<?php echo $key; if(!empty($typeid)): ?>&typeid=<?php echo $typeid; endif; if(!empty($addtimeid)): ?>&addtimeid=<?php echo $addtimeid; endif; if(!empty($showType)): ?>&showType=<?php echo $showType; endif; ?>" ><?php echo $row1; ?></a>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </li>
      <li class="tags-line tags-line-border" data-val="{tagTypeName:'year'}">
        <div class="tags-title">年代 :</div>
        <ul class="tags">
          <li <?php if($addtimeid==null||$addtimeid=='全部'): ?>class="active"<?php endif; ?>>
            <a data-act="tag-click" href="?addtimeid=全部<?php if(!empty($typeid)): ?>&typeid=<?php echo $typeid; endif; if(!empty($countryid)): ?>&countryid=<?php echo $countryid; endif; if(!empty($showType)): ?>&showType=<?php echo $showType; endif; ?>">全部</a>
          </li>
        	<?php if(is_array($addtime) || $addtime instanceof \think\Collection || $addtime instanceof \think\Paginator): if( count($addtime)==0 ) : echo "" ;else: foreach($addtime as $key=>$row2): ?>
          <li <?php if($row2==$addtimeid): ?>class="active"<?php endif; ?> >
            <a data-act="tag-click" href="?addtimeid=<?php echo $row2; if(!empty($typeid)): ?>&typeid=<?php echo $typeid; endif; if(!empty($countryid)): ?>&countryid=<?php echo $countryid; endif; if(!empty($showType)): ?>&showType=<?php echo $showType; endif; ?>"><?php echo $row2; ?></a>
          </li>
           <?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
      </li>
    </ul>
  </div>
  <div class="movies-panel">
    <div class="movies-list">

    <dl class="movie-list">

<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$rows): ?>
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
    <?php if($rows['grade']!='0.0'): ?>
<div class="channel-detail channel-detail-orange"><i class="integer"><?php echo floor($rows['grade']); ?>.</i><i class="fraction"><?php echo substr($rows['grade'],"-1"); ?></i></div><?php else: ?><div class="channel-detail channel-detail-orange">暂无评分</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</dl>
    </div>

    <div  id="pages" style="text-align:center">
    <ul class="pagination" >
    <li ><a href="/movielist?<?php if(!empty($showType)): ?>showType=<?php echo $showType; ?>&<?php endif; ?>page=<?php echo $prev; ?>"><<</a></li>
      <?php if(is_array($pp) || $pp instanceof \think\Collection || $pp instanceof \think\Paginator): $i = 0; $__LIST__ = $pp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rowss): $mod = ($i % 2 );++$i;?>
      <li <?php if($rowss==$page): ?>class="active"<?php endif; ?>><a href="/movielist?<?php if(!empty($showType)): ?>showType=<?php echo $showType; ?>&<?php endif; ?>page=<?php echo $rowss; ?>" ><?php echo $rowss; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
     <li ><a href="/movielist?<?php if(!empty($showType)): ?>showType=<?php echo $showType; ?>&<?php endif; ?>page=<?php echo $next; ?>" onclick="page('next')">>></a></li>
    </ul>
    </div>
  </div>
</div>
    </div>
  <?php echo widget("Publics/footer"); ?>
</body>
<script src="/static/homes/js/common.dc33ab40.js" ></script>
<script src="/static/homes/js/profile-profile.be74a9c6.js"></script>
<script>
</script>
</html>