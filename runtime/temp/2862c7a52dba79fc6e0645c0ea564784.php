<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Forget\forget3.html";i:1530611791;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<title>忘记密码</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link type="text/css" href="/static/homes/foget/css/css.css" rel="stylesheet" />
<script type="text/javascript" src="/static/homes/foget/js/jquery-1.8.3-min.js"></script>
</head>
<body style="background:url('/static/homes/images/bg.jpg');">
  <div class="content">
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写用户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext for-cur"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div><!--for-liucheng/-->
     <form action="/forget/forget3" method="post" class="forget-pwd">
       <dl>
        <dt>新密码：</dt>
        <dd><input type="password" name="password" id="p1" />&nbsp;&nbsp;<span></span></dd>
        <div class="clears"></div>
       </dl>
       <dl>
        <dt>确认密码：</dt>
        <dd><input type="password" name="repassword" id="p2"/>&nbsp;&nbsp;<span></span></dd>
        <div class="clears"></div>
       </dl>
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <?php if(isset($token_str)&&isset($time)): ?>
       <input type="hidden" name="token_str" value="<?php echo $token_str; ?>">
       <input type="hidden" name="time" value="<?php echo $time; ?>">
       <?php endif; ?>
       <div class="subtijiao"><input type="submit" value="提交" /></div>
      </form><!--forget-pwd/-->
   </div><!--web-width/-->
  </div><!--content/-->

</body>
<script type="text/javascript">
  //设置开关
  flag=true;
  p1=$("#p1").val();
  //检验密码
  $("#p1").blur(function(){
    p1=$("#p1").val();
    if(p1==''){
      flag=false;
      $("#p1").next("span").html("密码不能为空!").css("color","red");
    }else{
      ret=/^[a-zA-Z][a-zA-Z0-9_]{5,20}$/;
      if(ret.test(p1)){
        flag=true;
        $("#p1").next("span").html("密码合法").css("color","green");
      }else{
        flag=false;
        $("#p1").next("span").html("密码格式不正确!").css("color","red");
      }
    }
  });

  //检验重复密码
 $("#p2").blur(function(){
    p2=$("#p2").val();
    if(p2==''){
      flag=false;
      $("#p2").next("span").html("二次密码不能为空!").css("color","red");
    }else{
      if(p2==p1){
          ret=/^[a-zA-Z][a-zA-Z0-9_]{5,20}$/;
          if(ret.test(p2)){
            flag=true;
            $("#p2").next("span").html("二次密码正确").css("color","green");
          }else{
            flag=false;
            $("#p2").next("span").html("首位必须为字母的6位以上的密码").css("color","red");
          }
      }else{
        flag=false;
        $("#p2").next("span").html("两次密码不一致!").css("color","red");
      }
    }
  });

 $('form').submit(function(){
    $("#p1").trigger("blur");
    $("#p2").trigger("blur");
    if(flag){
      return true;
    }else{
      return false;
    }
 });
</script>
</html>
