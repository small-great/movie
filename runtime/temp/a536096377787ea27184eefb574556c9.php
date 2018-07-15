<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Board\index.html";i:1530346538;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>国内票房榜 - 猫眼电影 - 一网打尽好电影</title>
  <meta charset="utf-8">
  <meta name="keywords" content="猫眼电影,电影排行榜,热映口碑榜,最受期待榜,国内票房榜,北美票房榜,猫眼TOP100">
  <meta name="description" content="猫眼电影热门榜单,包括热映口碑榜,最受期待榜,国内票房榜,北美票房榜,猫眼TOP100,多维度为用户进行选片决策">
  <meta http-equiv="cleartype" content="yes" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <script>
  cid = "c_wx6zb55";
  ci = 20;
val = {"subnavId":1};    window.system = {};

  window.openPlatform = '';

  </script>
<link rel="stylesheet" href="/static/homes/css/board-index.92a06072.css"/>
<script src="/static/homes/public/js/jquery.js"></script>
  <script src="Scripts/stat.791ffac0.js"></script>
  <script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="Css/image-2x.8ba7074d.css"/>') }</script>
  <style>
    @font-face {
      font-family: stonefont;
      src: url('//vfile.meituan.net/colorstone/436a367051bf4f91c831776e842801963168.eot');
      src: url('//vfile.meituan.net/colorstone/436a367051bf4f91c831776e842801963168.eot?#iefix') format('embedded-opentype'),
           url('//vfile.meituan.net/colorstone/5de5d1b8e21163490c2cab95034d82932072.woff') format('woff');
    }

    .stonefont {
      font-family: stonefont;
    }
  </style>
</head>
<body>
  <?php echo widget("Publics/header"); ?>
<div class="subnav">
  <ul class="navbar">
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:7}"
          href="?type=1"<?php if($type==1||$type==''): ?> class="active"<?php endif; ?>
      >热映口碑榜</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:6}"
          href="?type=2" <?php if($type==2): ?> class="active"<?php endif; ?>
      >最受期待榜</a>
    </li>
  </ul>
</div>

<div class="container" id="app" class="page-board/index" >
   <div class="content">
    <div class="wrapper">
     <div class="main">
      <dl class="board-wrapper">
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
       <dd>
        <i class="board-index board-index-4" id="num<?php echo $key+1; ?>"><?php echo $key+1; ?></i>
        <!-- <i class="board-index board-index-4">4</i>  -->
        <a href="/content/<?php echo $row['id']; ?>.html" title="<?php echo $row['ch_name']; ?>" class="image-link" data-act="boarditem-click" data-val="{movieId:338385}"> <img src="//ms0.meituan.net/mywww/image/loading_2.e3d934bf.png" alt="" class="poster-default" /> <img alt="<?php echo $row['ch_name']; ?>" class="board-img" src="<?php echo $row['picurl']; ?>" /> </a>
        <div class="board-item-main">
         <div class="board-item-content">
          <div class="movie-item-info">
           <p class="name"><a href="/content/<?php echo $row['id']; ?>.html" title="<?php echo $row['ch_name']; ?>" data-act="boarditem-click" data-val="{movieId:338385}"><?php echo $row['ch_name']; ?></a></p>
           <p class="star"> 主演：<?php echo $row['m_actor']; ?></p>
           <p class="releasetime">上映时间：<?php echo $row['m_addtime']; ?></p>
          </div>
          <?php if($type==1||$type==''): ?>
          <div class="movie-item-number score-num">
           <p class="score"><i class="integer"><?php echo floor($row['grade']); ?>.</i><i class="fraction"><?php echo substr($row['grade'],"-1"); ?></i></p>
          </div>
          <?php else: ?>
          <div class="movie-item-number wish">
              <p class="month-wish">总想看 : <span><span class="stonefont"><?php echo $row['want']; ?></span></span>人</p>
          </div>
          <?php endif; ?>
         </div>
        </div>
       </dd>
      <?php endforeach; endif; else: echo "" ;endif; ?>
      </dl>
     </div>
    </div>
   </div>
  </div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/board-index.4aa00764.js"></script>
</body>
<script type="text/javascript">
  $(".board-index").each(function(){
  id=$(this).attr('id');
  //判断 加载图标样式1
  if(id=='num1'){
    $(this).addClass('board-index-1');
    $(this).removeClass('board-index-4');

  }
  //判断 加载图标样式2
  if(id=='num2'){
    $(this).addClass('board-index-2');
    $(this).removeClass('board-index-4');
  }
  //判断 加载图标样式3
  if(id=='num3'){
    $(this).addClass('board-index-3');
    $(this).removeClass('board-index-4');
  }
});

</script>
</html>
