<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Users\mailer.html";i:1530345207;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>用户详情</title>
</head>
<link rel="stylesheet" type="text/css" href="/static/homes/css/file.css">
 <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
<body>
  <?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-profile/profile" >
  <div class="content">
    <div class="main" style="margin:0px">
      <div class="info-content clearfix">
        <div class="user-profile-nav">
          <h1>个人中心</h1>
          <a href="/users/morder/order" class="orders ">我的订单</a>
          <a href="/users/index/<?php echo \think\Session::get('uid'); ?>.html" class="profile">基本信息</a>
          <a href="/users/mailer/req" class="profile active">我的消息(<span id="s1"><?php echo $count; ?></span>)</a>
        </div>
        <div class="profile-container">
          <div class="profile-title" style="margin-bottom:0px;">
          消息列表
          </div>

           <table class="table table-bordered table-hover text-center">
             <tr>
               <td><b>发件人</b></td>
               <td><b>标题</b></td>
               <td><b>时间</b></td>
               <td><b>消息状态</b></td>
               <td><b>操作</b></td>
             </tr>
             <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
             <tr>
               <td>后台管理员</td>
               <td><a href="javascript:;" onclick="member_show('消息中心','/users/mailer/show/id/<?php echo $row['id']; ?>','500px','400px','<?php echo $row['id']; ?>')"><?php echo $row['title']; ?></a></td>
               <td><?php echo date("Y-m-d H:i:s",$row['sendtime']); ?></td>
               <td upname="<?php echo $row['id']; ?>"><?php if($row['status']==0): ?>未读<?php else: ?>已读<?php endif; ?></td>
               <td><a href="JavaScript:;" onclick="del('<?php echo $row['id']; ?>')" delname="<?php echo $row['id']; ?>">删除</a></td>
             </tr>
             <?php endforeach; endif; else: echo "" ;endif; ?>
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
//站内信弹窗
function member_show(title,url,w,h,id){
    obj = $("td[upname="+id+"]");
    $.post("/users/mailer/mailupdate",{id:id},function(data){
        if(data){
          obj.html('已读');
          num=parseInt($("#s1").html())-1;
          $("#s1").html(num);
        }
    });
    layer.open({
      title:title,
      type: 2,
      area: [w, h],
      fixed: false, //不固定
      maxmin: true,
      content: url
    });
}

//删除
function del(id){
    obj = $("a[delname="+id+"]");
    layer.confirm('确认要删除吗？',function(index){
    $.post("/users/mailer/maildel",{id:id},function(data){
        if(data){
            $(obj).parents("tr").remove();
            layer.msg('删除成功!',{icon: 1,time:1000});
        }
    });
  });
}
</script>
</html>