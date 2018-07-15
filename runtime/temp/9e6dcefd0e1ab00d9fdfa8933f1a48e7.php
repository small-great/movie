<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Seat\index.html";i:1530338767;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>选座 - 猫眼电影 - 一网打尽好电影</title>

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
  <style>
  .icon{width:310px;height:20px;padding-left:18px;color:red;display:none;}
  </style>
  <script type="text/javascript" src="/static/homes/reg/scripts/jquery-1.7.2.js"></script>
  <script>
  cid = "c_2yzd0xp5";
  ci = 20;
    window.system = {"seatsPrice":{"1":{"expression":"23X1","price":"<?php echo $movie['m_price']; ?>"},"2":{"expression":"23X2","price":"<?php echo $movie['m_price']*2; ?>"},"3":{"expression":"23X3","price":"<?php echo $movie['m_price']*3; ?>"},"4":{"expression":"23X4","price":"<?php echo $movie['m_price']*4; ?>"},"5":{"expression":"23X5","price":"<?php echo $movie['m_price']*5; ?>"},"6":{"expression":"23X6","price":"<?php echo $movie['m_price']*6; ?>"}},"remind":"","uuid":"1A6E888B4A4B29B16FBA1299108DBE9C42FD9F784D99C2E2014E828B992B1CE4","cinemaId":2161};

  window.openPlatform = '';

  </script>
<link rel="stylesheet" href="/static/homes/css/cinemas-seat.d66e64ba.css"/>

</head>
<body>
<?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-cinemas/seat" >
  <div class="order-progress-bar">
  <div class="step first done">
    <span class="step-num">1</span>
    <div class="bar"></div>
    <span class="step-text">选择影片场次</span>
  </div>
  <div class="step done">
    <span class="step-num">2</span>
    <div class="bar"></div>
    <span class="step-text">选择座位</span>
  </div>
  <div class="step ">
    <span class="step-num">3</span>
    <div class="bar"></div>
    <span class="step-text">14分钟内付款</span>
  </div>
  <div class="step last ">
    <span class="step-num">4</span>
    <div class="bar"></div>
    <span class="step-text">影院取票观影</span>
  </div>
</div>


    <div class="main clearfix">
      <div class="hall">
        <div class="seat-example">
          <div class="selectable-example example">
            <span>可选座位</span>
          </div>
          <div class="sold-example example">
            <span>已售座位</span>
          </div>
          <div class="selected-example example">
            <span>已选座位</span>
          </div>
        </div>


<div class="seats-block" data-cols="11" data-section-id="0000000000000001" data-section-name="普通区" data-seq-no="201806100005162">
  <div class="row-id-container">
        <span class="row-id">1</span>
        <span class="row-id">2</span>
        <span class="row-id">3</span>
        <span class="row-id">4</span>
        <span class="row-id">5</span>
        <span class="row-id">6</span>
        <span class="row-id">7</span>
        <span class="row-id">8</span>
        <span class="row-id">9</span>
  </div>

  <div class="seats-container">
    <div class="screen-container">
      <div class="screen">银幕中央</div>
      <div class="c-screen-line"></div>
    </div>

    <div class="seats-wrapper">
    <?php if(is_array($hallLayout) || $hallLayout instanceof \think\Collection || $hallLayout instanceof \think\Paginator): $i = 0; $__LIST__ = $hallLayout;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rows): $mod = ($i % 2 );++$i;?>
      <div class="row">
      <?php if(is_array($rows) || $rows instanceof \think\Collection || $rows instanceof \think\Paginator): $j = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($j % 2 );++$j;$s = $i.'_'.$j; if($r=='_'): ?><span class='seat empty'></span><?php elseif(in_array($s,$selected)): ?><span class="seat sold" data-column-id="03" data-row-id="6" data-st="LK" data-act="seat-click"></span><?php else: ?><span class='seat selectable' data-column-id="<?php echo $j; ?>" data-row-id="<?php echo $i; ?>" data-index="<?php echo $i; ?>_<?php echo $j; ?>"></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

  </div>

</div>

      </div>

      <div class="side">
        <div class="movie-info clearfix">
          <div class="poster">
            <img src="<?php echo $movie['picurl']; ?>">
          </div>
          <div class="content">
            <p class="name text-ellipsis"><?php echo $movie['ch_name']; ?></p>
            <div class="info-item">
              <span>类型 :</span>
              <span class="value"><?php echo $movie['m_type']; ?></span>
            </div>
            <div class="info-item">
              <span>时长 :</span>
              <span class="value"><?php echo $movie['m_time']; ?>分钟</span>
            </div>
          </div>
        </div>

        <div class="show-info">
          <div class="info-item">
            <span>影院 :</span>
            <span class="value text-ellipsis"><?php echo $cinema['name']; ?></span>
          </div>
          <div class="info-item">
            <span>影厅 :</span>
            <span class="value text-ellipsis"><?php echo $seat['hallname']; ?></span>
          </div>
          <div class="info-item">
            <span>版本 :</span>
            <span class="value text-ellipsis"><?php if($movie['m_version']==0): ?>2D<?php elseif($movie['m_version']==1): ?>3D<?php else: ?>2D/3D<?php endif; ?></span>
          </div>
          <div class="info-item">
            <span>场次 :</span>
            <span class="value text-ellipsis screen"><?php echo $relss['day']; ?> <?php echo $relss['start_time']; ?>-<?php echo $relss['end_time']; ?></span>
          </div>
          <div class="info-item">
            <span>票价 :</span>
            <span class="value text-ellipsis">￥<?php echo $movie['m_price']; ?>/张</span>
          </div>
        </div>

        <div class="ticket-info">
          <div class="no-ticket">
            <p class="buy-limit">座位：一次最多选6个座位</p>
            <p class="no-selected">请<span>点击左侧</span>座位图选择座位</p>
          </div>
          <div class="has-ticket" style="display:none">
            <span class="text">座位：</span>
            <div class="ticket-container" data-limit="6"></div>
          </div>

          <div class="total-price">
            <span>总价 :</span>
            <span class="price">0</span>
          </div>
        </div>

        <div class="confirm-order">
            <form class="login-form">
              <input type="text" class="input-phone" placeholder="输入手机号">
              <i class="icon"></i>
              <div class="code-inputer">
                <input type="text" class="input-code" placeholder="填写验证码">
                <span class="send-code disable">获取验证码</span>
              </div>
            </form>

          <div class="confirm-btn disable" data-bid="b_0a0ep6pp">确认选座</div>
        </div>
      </div>
    </div>
      <div class="modal-container" style="display:none">
    <div class="modal">
      <span class="icon"></span>

      <p class="tip"></p>

        <div class="ok-btn btn">我知道了</div>
    </div>
  </div>
    </div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js"></script>
<script src="/static/homes/js/cinemas-seat.f35e64e9.js"></script>
<script type="text/javascript" src="/static/admins/lib/layer/2.4/layer.js"></script>
</body>
<script>
//发送手机号验证
$(".send-code").click(function(){
  //获取输入的手机号
  p=$(".input-phone").val();
  o=$(this);
  $.post("/seat/phone",{p:p},function(data){
    console.log(data);
    if(data.code==000000){
      //倒计时
      m=180;
      mytime=setInterval(function(){
        m--;
        //赋值
        o.html(m+"秒重新获取");
        //禁用
        o.addClass("btn-disabled");

        //判断
        if(m==0){
          //清除定时器
          clearInterval(mytime);
          //button 赋值
          o.html("重新获取");
          //激活
          o.removeClass("btn-disabled");
        }
      },1000);
    }
  },'json');
});
pcode=$(".input-code").val();
sendcode = $(".send-code").html();
$(".input-code").blur(function(){
  pcode=$(this).val();
  price = $(".price").html();
  ob=$(this);
  $.post("/seat/pcode",{pcode:pcode},function(data){
    //alert(data);
    if(data==1){
      if(price==0){
        layer.msg("至少选座一个座位",{icon:2,time:3000});
      }else{
        layer.msg("验证码正确",{icon:1,time:1000});
        $(".confirm-btn").click(function(){
        arr = [];
        array = [];
        order = '<?php echo $order; ?>';
        var data_id;
        var data_select;
        $(".selected").each(function(){
            data_id =$(this).attr("data-index");
            arr.push(data_id);
        });
        $(".ticket-container .ticket").each(function(){
            data_select =$(this).html();
            array.push(data_select);
        });

        $.get("/seat/select",{arr:arr,array:array,order:order},function(data){
          //alert(data);
          if(data){
            location.href="/morder/index";
          }
        });
      });
      }
    }else if(data==0){
      layer.msg("验证码错误",{icon:2,time:3000});
    }else if(data==2){
      flag = false;
      layer.msg("验证码不能为空",{icon:2,time:3000});
    }else if(data==3){
      flag = false;
      layer.msg("验证码过期,重新发送",{icon:2,time:3000});
    }
  });
});

$(".input-phone").blur(function(){
  p=$(this).val();
  $.post("/seat/userphone",{p:p},function(data){
    if(!data){
      flag = false;
      $(".send-code").addClass("disable");
      //layer.msg("该号码用户不存在,请重新输入,或者注册",{icon:2,time:3000});
    }
  });
});
</script>
</html>
