<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Cinemas\index.html";i:1530666321;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>影院 - 深蓝电影 - 好电影尽在深蓝电影</title>
  <link rel="stylesheet" href="/static/homes/css/cinemas-list.81574a4d.css"/>
  <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
  <style>
    #found{position: absolute;top:300px;left:600px;}
  .btn1{background:#f34d41;color: #fff;border-radius:14px;border:none;cursor:pointer;}
  </style>
</head>
<body>
     <?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-cinemas/list" >
  <div class="tags-panel" style="height:290px">
    <ul class="tags-lines">
        <li class="tags-line" data-type="brand">
          <div class="tags-title">品牌:</div>
          <ul class="tags">
            <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): if( count($brand)==0 ) : echo "" ;else: foreach($brand as $key=>$row): ?>
            <li <?php if($row['id']==$brandId||($brandId==''&&$row['id']==1)): ?> class="active" <?php endif; ?> >
              <a data-act="tag-click" data-id="<?php echo $row['id']; ?>" href="?brandId=<?php echo $row['id']; if(!empty($hall_id)): ?>&hall_id=<?php echo $hall_id; endif; ?>" data-bid="b_x9tdpsnb"><?php echo $row['brand']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <li class="tags-line tags-line-border" data-type="district">
          <div class="tags-title">地址:</div>
          <form action="/cinemas/index" method="get">
          <ul id="demo2" class="tags citys">
              <p>
                  <select name="province"></select>
                  <select name="city"></select>
                  <select name="area"></select><button type="submit" class="btn1">搜索地址</button>
              </p>
              <p id="place"><?php if($area==''): ?>请选择地区<?php else: ?>当前选中地区：<?php echo $area; endif; ?></p>
          </ul>
          </form>
        </li>
        <li class="tags-line tags-line-border" data-type="hallType">
          <div class="tags-title">特殊厅:</div>
          <ul class="tags">
            <?php if(is_array($halltype) || $halltype instanceof \think\Collection || $halltype instanceof \think\Paginator): if( count($halltype)==0 ) : echo "" ;else: foreach($halltype as $key=>$rows): ?>
            <li <?php if($rows['id']==$hall_id||($hall_id==''&&$rows['id']==0)): ?> class="active" <?php endif; ?> >

              <a data-act="tag-click" data-id="<?php echo $rows['id']; ?>" href="?hall_id=<?php echo $rows['id']; if(!empty($brandId)): ?>&brandId=<?php echo $brandId; endif; ?>" data-bid="b_x9tdpsnb"><?php echo $rows['name']; ?></a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
    </ul>
  </div>

  <div class="cinemas-list">
    <h2 class="cinemas-list-header">影院列表</h2>

    <!-- 遍历 -->
    <?php if(is_array($details) || $details instanceof \think\Collection || $details instanceof \think\Paginator): if( count($details)==0 ) : echo "" ;else: foreach($details as $key=>$rowt): ?>
      <div class="cinema-cell">
        <div class="cinema-info">
          <a href="/cinemass?id=<?php echo $rowt['id']; ?>" class="cinema-name" data-act="cinema-name-click" data-bid="b_4tkpau4m"><?php echo $rowt['name']; ?></a>
          <p class="cinema-address">地址：<?php echo $rowt['area']; ?><?php echo $rowt['name']; ?></p>
        </div>
        <div class="buy-btn">
          <a href="/cinemass?id=<?php echo $rowt['id']; ?>" data-act="buy-btn-click" data-bid="b_4tkpau4m">选座购票</a>
        </div>

        <div class="price">
            <span class="rmb red">￥</span>
            <span class="price-num red"><span class="stonefont"><?php echo $rowt['price']; ?></span></span>
            <span>起</span>
        </div>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 遍历 -->
  </div>

  <div class="cinema-pager" id="pages">
    <ul style="height:40px;text-align:center">
       <?php echo $details->appends($request)->render(); ?>
    </ul>
  </div>
</div>
<?php echo widget("Publics/footer"); ?>

</body>
<script type="text/javascript" src="/static/homes/js/jquery.citys.js"></script>
<script type="text/javascript">
$('#demo2').citys({
    required:false,
    nodata:'disabled',
    onChange:function(data){
        var text = data['direct']?'(直辖市)':'';
        $('#place').text('当前选中地区：'+p+' '+c+' '+a);
    }
});
</script>
</html>
