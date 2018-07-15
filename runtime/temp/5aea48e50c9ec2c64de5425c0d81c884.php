<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Users\info.html";i:1530345202;}*/ ?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>用户详情</title>
</head>
<link rel="stylesheet" type="text/css" href="/static/homes/css/file.css">
<body>
  <?php echo widget("Publics/header"); ?>
    <div class="container" id="app" class="page-profile/profile" >
  <div class="content">
    <div class="main" style="margin:0px">
      <div class="info-content clearfix">
        <div class="user-profile-nav">
          <h1>个人中心</h1>
          <a href="/users/morder/order" class="orders ">我的订单</a>
          <a href="/users/index/<?php echo \think\Session::get('uid'); ?>.html" class="profile active">基本信息</a>
          <a href="/users/mailer/req" class="profile" id="three">我的消息(<span style="color:red" id="s1"><?php echo $count; ?></span>)</a>
        </div>
        <div class="profile-container">
          <div class="profile-title">
          基本信息
          </div>
          <form  enctype="multipart/form-data" method="post" action="/users/update" enctype="multipart/form-data">
            <div class="avatar-container">
            <div class="avatar-content">
              <img class="J-setted-avatar" src="<?php echo $data['picurl']; ?>">
              <div class="J-upload-avatar-w upload-avatar-image">
                <a href="javascript:;" class="file">更换头像
                  <input type="file" name="file" id="">
                </a>
              </div>
              <div class="tips">支持JPG,JPEG,PNG格式,且文件需小于1M</div>
           </div>
          </div>
            <div class="userexinfo-form">
            <div class="userexinfo-form-section">
              <p>昵称：</p>
              <span>
                <input type="text" name="name" id="name" class="ui-checkbox" placeholder="2-15个字，支持中英文、数字" value="<?php echo $data['name']; ?>">&nbsp;&nbsp;<span></span>
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>性别：</p>
              <span>
                <input type="radio" name="sex" id="userexinfo-form-gender-1" value="1" <?php if($data['sex']==1): ?>checked<?php endif; ?> class="ui-radio radio-first">
                <label for="userexinfo-form-gender-1">男</label>
              </span>
              <span>
                <input type="radio" name="sex" id="userexinfo-form-gender-2" value="0" <?php if($data['sex']==0): ?>checked<?php endif; ?> class="ui-radio">
                <label for="userexinfo-form-gender-2">女</label>
              </span>
            </div>
            <div class="date-picker userexinfo-form-section">
              <p>生日：</p>
              <span>
                <input type="text" name="birthday" id="birth" onClick="WdatePicker({skin:'default',maxDate:'%y-%M-%d'})" class="Wdate" autocomplete="off" value="<?php echo $data['birthday']; ?>">&nbsp;&nbsp;<span></span>
              </span>
            </div>

            <div class="userexinfo-form-section">
              <p>电话：</p>
              <span>
                <input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>" maxlength="11">&nbsp;&nbsp;<span></span>
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>邮箱：</p>
              <span>
                <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>">&nbsp;&nbsp;<span></span>
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>从事行业：</p>
              <span>
                <input type="text" name="job" id="job" value="<?php echo $data['job']; ?>">&nbsp;&nbsp;<span></span>
              </span>
            </div>

            <div class="userexinfo-form-section expand-list">
              <p>兴趣：</p>
              <div class="interest-list">
                <span>
                  <span><?php echo $data['hobby']; ?></span><br>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-1" value="美食" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-1">美食</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-2" value="动漫" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-2">动漫</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-3" value="摄影" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-3">摄影</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-4" value="电影" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-4">电影</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-5" value="体育" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-5">体育</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-6" value="财经" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-6">财经</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-7" value="音乐" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-7">音乐</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-8" value="游戏" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-8">游戏</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-9" value="科技" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-9">科技</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-10" value="旅游" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-10">旅游</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-11" value="文学" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-11">文学</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-12" value="公益" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-12">公益</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-13" value="汽车" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-13">汽车</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-14" value="时尚" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-14">时尚</label>
                </span>
                <span>
                  <input type="checkbox" name="hobby[]" id="userexinfo-form-interest-15" value="宠物" class="ui-checkbox" >
                  <label for="userexinfo-form-interest-15">宠物</label>
                </span>
                <span class="bottom-tips">选择你的兴趣使你获得个性化的电影推荐哦</span>
              </div>
            </div><br>
            <div class="userexinfo-form-section">
              <p>个性签名：</p>
              <span>
               <textarea name="desc" id="desc" style="width:254px;" class="ui-checkbox" placeholder="20个字以内" value=""><?php echo $data['desc']; ?></textarea>&nbsp;&nbsp;<span></span>
              </span>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" >
            <div class="userexinfo-bottom-section clearfix">
              <input type="submit" class="form-save-btn" value="保存">
              <!-- <span id="cancell-btn" class="cancel_alert hand">注销账号1</span> -->
            </div>
            </div>
        </div>
         </form>
      </div>
    </div>
    <div class="body-mask"></div>
    <div id="img-cropper" class="img-cropper">
      <div class="img-cropper-container">
        <div class="img-cropper-header">
          上传头像
          <span class="close-icon"></span>
        </div>
        <div class="img-cropper-content">
          <div class="img-main">
            <div class="img-main-wrapper">
              <img src="<?php echo $data['picurl']; ?>">
            </div>
          </div>
          <div class="img-preview">
            <p>预览</p>
            <div class="img-preview-block"></div>
          </div>
        </div>
        <div class="img-cropper-footer">
          <div class="img-btn-confirm">
          确认
          </div>
          <div class="img-btn-cancel">
          取消
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="mask3">
    <div class="modal-container" style="display:none">
    <div class="modal">
      <span class="icon"></span>

      <p class="tip">您确定要删除该订单嘛？删除后，不可恢复～</p>

        <div class="short btn ok-btn">确定</div>
        <div class="short btn cancel-btn">取消</div>
    </div>
  </div>

</div>

<div class='mask1'>
    <div class="modal-container" style="display:none">
    <div class="modal">
      <span class="icon"></span>

      <p class="tip">请注意，注销账号会清空所有订单信息、影评、积分、<br>账户余额等信息且无法找回，是否继续？</p>

        <div class="short btn ok-btn">确定</div>
        <div class="short btn cancel-btn">取消</div>
    </div>
  </div>

</div>
  <?php echo widget("Publics/footer"); ?>
</body>
<script type="text/javascript" src="/static/admins/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/homes/js/jquery.min.js"></script>
<script type="text/javascript">
  //设置开关
  NAME=true;
  BIRTH=true;
  PHONE=true;
  EMAIL=true;
  JOB=true;
  DESC=true;
  //验证昵称
  $("#name").blur(function(){
    if($("#name").val()==''){
      $(this).next("span").css('color','red').html("昵称不能为空!");
      NAME=false;
    }else{
      if($("#name").val().match(/^[\u4e00-\u9fa5_a-zA-Z0-9]{2,18}$/)){
        NAME=true;
        $(this).next("span").css('color','green').html("昵称合法");
      }else{
        $(this).next("span").css('color','red').html("昵称格式不正确!");
        NAME=false;
      }
    }
  });

  //验证生日
  $("#birth").blur(function(){
    if($("#birth").val()==''){
      BIRTH=false;
      $(this).next("span").css('color','red').html("生日不能为空!");
    }else{
      BIRTH=true;
      $(this).next("span").css('color','green').html("生日格式正确!");
    }
  });

  //验证手机
  $('#phone').blur(function(){
    if($("#phone").val()==''){
      PHONE=false;
      $(this).next("span").css('color','red').html("手机号不能为空!");
    }else{
      if($("#phone").val().match(/^[1][3,4,5,7,8][0-9]{9}$/)){
        PHONE=true;
        $(this).next("span").css('color','green').html("手机号合法");
      }else{
        PHONE=false;
        $(this).next("span").css('color','red').html("手机号格式不正确!");
      }
    }
  });

  //验证邮箱
  $('#email').blur(function(){
    if($("#email").val()==''){
      EMAIL=false;
      $(this).next("span").css('color','red').html("邮箱不能为空!");
    }else{
      if($("#email").val().match(/^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/)){
        EMAIL=true;
        $(this).next("span").css('color','green').html("邮箱合法");
      }else{
        EMAIL=false;
        $(this).next("span").css('color','red').html("邮箱格式不正确!");
      }
    }
  });

  //验证行业
  $("#job").blur(function(){
    if($("#job").val()==''){
      JOB=false;
      $(this).next("span").css('color','red').html("内容不能为空!");
    }else{
      if($("#job").val().match(/^[\u4e00-\u9fa5_a-zA-Z0-9]{2,18}$/)){
        JOB=true;
        $(this).next("span").css('color','green').html("内容填写符合");
      }else{
        JOB=false;
        $(this).next("span").css('color','red').html("内容格式不正确!");
      }
    }
  });

  //验证描述
  $("#desc").blur(function(){
    if($("#desc").val()==''){
      DESC=false;
      $(this).next("span").css('color','red').html("内容不能为空!");
    }else{
      DESC=true;
      $(this).next("span").css('color','green').html("内容格式正确!");
    }
  });

  //绑定表单提交事件
  $('form').submit(function(){
    if(NAME&&BIRTH&&PHONE&&EMAIL&&DESC&&JOB){
      return true;
    }else{
      $("input").trigger("blur");
      $("#desc").trigger("blur");
      return false;
    }
  });

  if($("#s1").html()!=0){
    m = true;
  setInterval(function(){
    if(m){
      $("#three").css('display','block');
      m = false;
    }else{
      $("#three").css('display','none');
      m = true;
    }
  },500);
  }
</script>
</html>