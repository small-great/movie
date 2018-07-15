<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Users\morder.html";i:1530428188;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>用户详情</title>
</head>
<link rel="stylesheet" type="text/css" href="/static/homes/css/file.css">
 <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
 <style>
  td{font-size:14px}
 </style>
<body>
  <?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-profile/profile" >
  <div class="content">
    <div class="main" style="margin:0px">
      <div class="info-content clearfix">
        <div class="user-profile-nav">
          <h1>个人中心</h1>
          <a href="/users/morder/order" class="profile active">我的订单</a>
          <a href="/users/index/<?php echo \think\Session::get('uid'); ?>.html" class="profile">基本信息</a>
          <a href="/users/mailer/req" class="profile ">我的消息(<span id="s1"><?php echo $count; ?></span>)</a>
        </div>
        <div class="profile-container">
          <div class="profile-title" style="margin-bottom:0px;">
          消息列表
          </div>

           <table class="table table-bordered table-hover text-center">
             <tr>
               <td><b>订单号</b></td>
               <td><b>影片名</b></td>
               <td><b>场次</b></td>
               <td><b>号厅座位</b></td>
               <td><b>数量</b></td>
               <td><b>总价(￥)</b></td>
               <td><b>状态</b></td>
               <td><b>操作</b></td>
             </tr>
             <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): if( count($orders)==0 ) : echo "" ;else: foreach($orders as $key=>$row): ?>
             <tr>
               <td><?php echo $row['orderid']; ?></td>
               <td><?php echo $row['mname']; ?></a></td>
               <td><?php echo $row['relss']; ?></td>
               <td><?php echo $row['seat']; ?></td>
               <td><?php echo $row['num']; ?></td>
               <td><?php echo $row['price']*$row['num']; ?></td>
               <td><?php if($row['status']==0): ?>已支付(未取票)<?php elseif($row['status']==1): ?>已支付(已取票)<?php elseif($row['status']==2): ?>未支付<?php elseif($row['status']==3): ?>已退票<?php endif; ?></td>
               <td class="now"><?php if($row['status']==0): ?><a href="JavaScript:;" dname="<?php echo $row['orderid']; ?>" onclick="dels(<?php echo $row['orderid']; ?>)" style="color:green">退票</a><?php else: ?><a href="JavaScript:;" delname="<?php echo $row['orderid']; ?>" onclick="del(<?php echo $row['orderid']; ?>)" style="color:red">删除</a><?php endif; ?></td>
             </tr>
             <?php endforeach; endif; else: echo "" ;endif; ?>
             <tr><td colspan="8">
                 <div id="pages">
                    <?php echo $orders->render(); ?>
                </div>
              </td></tr>
           </table>
      </div>
    </div>
  </div>
</div>
</div>
  <?php echo widget("Publics/footer"); ?>
</body>
<script type="text/javascript" src="/static/admins/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/homes/js/jquery.min.js"></script>
<script src="/static/admins/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
//删除
function del(id){
    obj = $("a[delname="+id+"]");
    layer.confirm('确认要删除吗？',function(index){
    $.get("/users/morder/orderdel",{orderid:id},function(data){
        if(data){
            obj.parents("tr").remove();
            layer.msg('删除成功!',{icon: 1,time:1000});
        }
    });
  });
}

//退票
function dels(id){
  obj = $("a[dname="+id+"]");
  id = id;
    layer.confirm('确认要退票吗？',function(index){
    $.get("/users/morder/orderdelete",{orderid:id},function(data){
        if(data){
          obj.parents(".now").prev().html("已退票");
          obj.parents(".now").html('<a href="JavaScript:;" delname="'+id+'" onclick="del('+id+')" style="color:red">删除</a>');
          layer.msg('退票成功',{icon: 1,time:3000});
        }
    });
  });
}
</script>
</html>