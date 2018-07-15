<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Morder\confirm.html";i:1530429557;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
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
  <div class="step last done ">
    <span class="step-num">4</span>
    <div class="bar"></div>
    <span class="step-text">影院取票观影</span>
  </div>
</div>


  <div class="count-down-wrapper text-center" style="height:600px;" text-center>
      <h1><b style="color:red">请于<?php echo substr($orders->time,'0',16); ?>前</b></h1>
      <h2>到<b style="color:red"><?php echo $orders->address; ?></b>取票</h2>
      <h2>影片信息</h2>
      <table class="table table-bordered table-hover text-center" style="margin:0 auto;width:80%">
        <tr>
          <td><b>订单号</b></td>
          <td><?php echo $orders->order_id; ?></td>
        </tr>
        <tr>
          <td><b>影片名</b></td>
          <td><?php echo $orders->ch_name; ?></td>
        </tr>
        <tr>
          <td><b>影店名</b></td>
          <td><?php echo $orders->cname; ?>11</td>
        </tr>
        <tr>
          <td><b>影厅</b></td>
          <td><?php echo $orders->hallname; ?></td>
        </tr>
        <tr>
          <td><b>座位</b></td>
          <td><?php echo $select; ?></td>
        </tr>
        <tr>
          <td><b>放映时间</b></td>
          <td><?php echo $orders->time; ?></td>
        </tr>
        <tr>
          <td><b>总价(￥)</b></td>
          <td><?php echo $orders->price*$num; ?></td>
        </tr>
      </table>
  </div>
</div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js"></script>
<script src="/static/homes/js/order-confirm.9722797a.js"></script>
</body>
</html>