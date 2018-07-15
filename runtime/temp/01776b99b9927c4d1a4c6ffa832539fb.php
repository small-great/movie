<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Morder\index.html";i:1530269339;}*/ ?>
﻿<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><!--><html><!--<![endif]-->
<head>
  <title>支付 - 猫眼电影 - 一网打尽好电影</title>


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
  cid = "c_wmvmtivj";
  ci = 20;
    window.system = {"user":{"id":267566234,"token":"IOWJTY38X8zJgjJyImIoS5DLhO8AAAAAFgYAACFPq4jtGMIdkVKZnKhelGfFo58Ml033ZN0TK2AqAjgJue16pDs9tJ_Jl806pgoZSQ"},"uid":267566234,"cinemaId":2161};

  window.openPlatform = '';

  </script>
  <link rel="stylesheet" href="/static/homes/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/homes/css/order-confirm.598bbaa8.css"/>

</head>
<body>
<?php echo widget("Publics/header"); ?>

    <div class="container" id="app" class="page-order/confirm" >
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
  <div class="step done">
    <span class="step-num">3</span>
    <div class="bar"></div>
    <span class="step-text">11分钟内付款</span>
  </div>
  <div class="step last ">
    <span class="step-num">4</span>
    <div class="bar"></div>
    <span class="step-text">影院取票观影</span>
  </div>
</div>


  <div class="count-down-wrapper">
    <div class="count-down" data-payleftseconds="671">
      <p class="time-left">
        请在
        <span class="minute">11</span>
        分钟
        <span class="second">11</span>秒内完成支付
      </p>
      <p class="tip">超时订单会自动取消，如遇支付问题，请致电猫眼客服：1010-5335</p>
    </div>
  </div>

  <p class="warning">请仔细核对场次信息，出票后将<span class="attention">无法退票和改签</span></p>

    <table class="order-table">
    <thead>
      <tr>
        <th>影片</th>
        <th>时间</th>
        <th>影院</th>
        <th>座位</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="movie-name">《<?php echo $order_info->ch_name; ?>》</td>
        <td class="showtime"><?php echo $order_info->time; ?></td>
        <td class="cinema-name"><?php echo $order_info->cname; ?></td>
        <td>
          <span class="hall"><?php echo $order_info->hallname; ?></span>
          <div class="seats">
            <div>
                <span class=""><?php echo $select; ?></span>
            </div>
            <div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="right">
    <div class="price-wrapper">
      <span>实际支付 :</span>
      <span class="price"><?php echo $order_info->price*$num; ?></span>
    </div>
    <div><a href="/morder/pay"><div class="pay-btn" data-order-id="3208360781" data-act="pay-click" data-bid="b_u30afks6">确认支付</div></a></div>
  </div>

    <form name="cashierForm" method="post" action="https://mpay.meituan.com/cashier/pc/index">
    <input type="hidden" name="token" value="">
    <input type="hidden" name="tradeno" value="">
    <input type="hidden" name="pay_token" value="">
    <input type="hidden" name="website" value="mtmaoyan">
    <input type="hidden" name="pay_success_url" value="http://www.maoyan.com/order/result/3208360781">
    <input type="hidden" name="nb_platform" value="www">
    <input type="hidden" name="nb_source" value="cashier-pcforcustomer">
  </form>


    <div class="modal-container" style="display:none">
    <div class="modal">
      <span class="icon"></span>

      <p class="tip">支付超时，该订单已失效，请重新购买</p>

        <div class="ok-btn btn">我知道了</div>
    </div>
  </div>

    </div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js"></script>
<script src="/static/homes/js/order-confirm.9722797a.js"></script>
</body>
</html>