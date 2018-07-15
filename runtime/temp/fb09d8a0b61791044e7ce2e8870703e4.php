<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\Hall\add.html";i:1529653371;s:77:"C:\wamp64\www\o2o25project\tp5\application\admin\view\AdminPublic\public.html";i:1530412825;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>放映厅添加</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/static/admins/css/bootstrap.min.css" />
<link rel="stylesheet" href="/static/admins/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/static/admins/css/fullcalendar.css" />
<link rel="stylesheet" href="/static/admins/css/matrix-style.css" />
<link rel="stylesheet" href="/static/admins/css/matrix-media.css" />
<link rel="stylesheet" href="/static/admins/css/colorpicker.css" />
<link rel="stylesheet" href="/static/admins/css/datepicker.css" />
<link rel="stylesheet" href="/static/admins/css/uniform.css" />
<link rel="stylesheet" href="/static/admins/css/select2.css" />
<link rel="stylesheet" href="/static/admins/css/bootstrap-wysihtml5.css" />
<link href="/static/admins/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/static/admins/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
  .table td{text-align:center;}
  #pages li a{color:#fff;}
  #pages li {
      float: left;
      height: 30px;
      padding: 0 10px;
      display: block;
      font-size: 16px;
      line-height: 30px;
      text-align: center;
      cursor: pointer;
      outline: none;
      background-color: #2E363F;
      color: #fff;
      text-decoration: none;
      border-right: 1px solid rgba(0, 0, 0, 0.25);
      border-top: 1px solid rgba(0, 0, 0, 0.5);
      border-left: 1px solid rgba(0, 0, 0, 0.25);
      -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
      -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
      box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
    }
    #pages .pagination{
      margin:0 !important;
    }
    #pages .pagination .disabled {
      color: #666;
      cursor: default;
    }
    #pages .pagination .active {
      background:#fff;
      color: blue;
      border-right: 1px solid rgba(0, 0, 0, 0.5);
      background-image: none;
    }
    #pages .pagination{
      margin:5px 0px;
    }
</style>
</head>
<body>

<!--头部开始-->
<div id="header">
  <h1><a href="dashboard.html">MatAdmin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎<?php echo \think\Session::get('adminuser'); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="/admin/info/id/<?php echo \think\Session::get('adminuserid'); ?>/name/<?php echo \think\Session::get('adminuser'); ?>"><i class="icon-user"></i> 个人资料</a></li>
        <li class="divider"></li>
        <li><a href="/adminlogin/logout"><i class="icon-key"></i> 退出</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="/mailer/list" data-target="#menu-messages"><i class="icon icon-envelope"></i> <span class="text">站内信</span></a>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">设置</span></a></li>
    <li class=""><a title="" href="/adminlogin/logout"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
  </ul>
</div>
<!--头部结束-->
<!--主体开始-->
<!--start-top-serch-->
<div id="search">
 <!--  <a href="window.reload()" class="btn btn-info"><i class="icon-search icon-white"></i></a> -->
</div>
<!--close-top-serch-->
<!--左边菜单开始-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 控制台</a>
  <ul>
    <li class="active"><a href="/admin/index"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="submenu " > <a href="#"><i class="icon icon-th-list"></i><span>管理员管理</span> </a>
      <ul >
        <li><a href="/admin/list" >管理员列表</a></li>
        <li><a href="/role/index">角色列表</a></li>
        <li><a href="/adminlists/index">权限列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-user"></i><span>用户管理</span> </a>
      <ul >
        <li><a href="/user/list">用户列表</a></li>
        <li><a href="/user/trash">用户回收站</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-certificate"></i><span>影院管理</span> </a>
      <ul style="display:block">
         <li><a href="/cinema/index">影城/影院管理</a></li>
        <li><a href="/cinema/area">影院区域分布管理</a></li>
        <li><a href="/cinema/halltype">放映厅类型管理</a></li>
        <li><a href="/hall/list">放映厅列表</a></li>
        <li><a href="/relss/list">场次管理</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-facetime-video"></i><span>影片管理</span> </a>
      <ul >
        <li><a href="/movie/list">影片列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-reorder"></i><span>订单管理</span> </a>
      <ul >
        <li><a href="/order/list">订单列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-tasks"></i><span>资讯管理</span> </a>
      <ul >
        <li><a href="/information/list">资讯列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-star-empty"></i><span>评分管理</span> </a>
      <ul >
        <li><a href="/grade/list">评分列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-th-list"></i><span>图片管理</span> </a>
      <ul >
        <li><a href="/movieimage/list">图片列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon  icon-picture"></i><span>轮播图管理</span> </a>
      <ul >
        <li><a href="/carousel/list">轮播图列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-random"></i><span>广告管理</span> </a>
      <ul >
        <li><a href="/ads/list">广告列表</a></li>
      </ul>
    </li>
    <li class="submenu "> <a href="#"><i class="icon icon-share-alt"></i><span>友情链接管理</span> </a>
      <ul >
        <li><a href="/link/list">友情链接列表</a></li>
  </ul>
</div>
<!--左边菜单结束-->
<!--main-container-part-->
<div id="content">

  <script>
  cid = "c_2yzd0xp5";
  ci = 20;
  window.system = {"seatsPrice":{"1":{"expression":"","price":""}}};
  window.openPlatform = '';
  </script>
 <!--  <link rel="stylesheet" href="/static/homes/css/common.4b838ec3.css"/> -->
<link rel="stylesheet" href="/static/homes/css/cinemas-seat.d66e64ba.css"/>
  <script src="/static/homes/js/stat.791ffac0.js"></script>
  <style>
    .col-id{margin:5px 15px;font-size:16px}
    .row-id{margin:7px 0;margin-right:20px !important;margin-bottom:0;}
    .seats-wrapper .row{margin-bottom:0;}
    .seat{cursor:pointer;}
    .seats-wrapper input{width:20px;height:30px;display:inline-block;position:relative;left:22px;bottom:15px;}
  </style>
 <div id="content-header">
  <div id="breadcrumb">
   <a href="/admin/index" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i>首页</a>
   <a href="/hall/list" class="current">放映厅管理</a><a href="/hall/add" class="current">放映厅添加</a><a href="javascript:history.go(-1)" class="current"><i class="icon-undo"></i>后退</a>
  </div>
 </div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
          <h5>添加放映厅</h5>
        </div>
        <div class="widget-content">
          <!--设置号厅 -->
          <div class="main">
            <div class="screen-container">
              <div class="screen">银幕中央</div>
              <div class="c-screen-line"></div>
            </div>
            <div class="hall" >
              <div style="margin-left:88px;margin-bottom:10px">
                <span class="col-id">1</span>
                <span class="col-id">2</span>
                <span class="col-id">3</span>
                <span class="col-id">4</span>
                <span class="col-id">5</span>
                <span class="col-id">6</span>
                <span class="col-id">7</span>
                <span class="col-id">8</span>
                <span class="col-id">9</span>
                <span class="col-id">10</span>
                <span class="col-id">全选/全不选</span>
              </div>
              <div class="seats-block">
                <div class="row-id-container" style="margin-top:0">
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
                <div class="seats-wrapper"  style="margin-top:5px">
                </div>
                <button id="btn" class="btn btn-primary" style="position:relative;left:-60px;bottom:15px">保存座位位置</button>
              </div>
            </div>
            <!-- 选择号厅 -->
          <form class="form-horizontal" method="post" action="/hall/insert" name="basic_validate" id="basic_validate" novalidate="novalidate">
            <div class="control-group">
              <label class="control-label">厅号名:</label>
              <div class="controls">
                 <input type="text" name="hallname">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" >座位数:</label>
              <div class="controls">
                 <input type="text" name="hallnum" readonly>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">座位形状:</label>
              <div class="controls">
                 <input type="text" name="hallLayout" class="span11" readonly>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" value="提交" class="btn btn-success">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/static/homes/js/common.dc33ab40.js"></script>
<script src="/static/homes/js/cinemas-seat.f35e64e9.js"></script>
<script>
//选择与取消
function check(){
  if($(this).attr("checked")==undefined||$(this).attr("checked")==false){
    $(".row").find("span").removeClass("selectable").addClass("selected");
    $(this).attr("checked",true);
  }else{
    $(".row").find("span").removeClass("selected").addClass("selectable");
    $(this).attr("checked",false);
  }
}
//初始化span
span = '';
//循环遍历
for(var i=1;i<10;i++){
  span += '<div class="row">';
  for (var j=1; j <=10; j++) {
    span += '<span class="seat selectable" data-column-id="0'+j+'"data-row-id="'+i+'"data-no="0000000000000001-'+i+'-0'+j+'"data-st="N"data-act="seat-click"data-bid="b_s7eiiijf"></span>';
  };
  if(i==1){
    span += '<input type="checkbox" onchange="check()" id="checks"></div>';
  }else{
    span += '<input style="visibility:hidden" ></div>';
  }
}
$('.seats-wrapper').html(span);
//保存状态
$("#btn").click(function(){
  var i=1;
  var j=1;
  var num = 0;
  var str = '';
  $('.row').find("span").each(function(){
    console.log($(this)[0].className);
    if($(this)[0].className=='seat selectable'){
      str +='_';
    }
    if($(this)[0].className=='seat selected'){
      str +='e';
      num++;
    }
    if(i/10 == j){
      str +=',';
      j++;
    }
    i++;
  });
  console.log(str);
  $("input[name='hallLayout']").val(str);
  $("input[name='hallLayout']").attr("title",str);
  $("input[name='hallnum']").val(num);
});
</script>

</div>
<!--主体结束-->
<!--尾部开始-->
<div class="row-fluid">
  <div id="footer" class="span12">Copyright &copy; 2018.Company name All rights reserved.<a target="_blank" href="http://www.shenlan.com">深蓝电影前台首页</a> </div>
</div>

<!--尾部结束-->

<script src="/static/admins/js/excanvas.min.js"></script>
<script src="/static/admins/js/jquery.min.js"></script>
<script src="/static/admins/js/jquery.ui.custom.js"></script>
<script src="/static/admins/js/bootstrap.min.js"></script>
<script src="/static/admins/js/jquery.flot.min.js"></script>
<script src="/static/admins/js/jquery.flot.resize.min.js"></script>
<script src="/static/admins/js/jquery.peity.min.js"></script>
<script src="/static/admins/js/fullcalendar.min.js"></script>
<script src="/static/admins/js/matrix.js"></script>
<script src="/static/admins/js/matrix.dashboard.js"></script>
<script src="/static/admins/js/jquery.gritter.min.js"></script>
<script src="/static/admins/js/matrix.interface.js"></script>
<script src="/static/admins/js/matrix.chat.js"></script>
<script src="/static/admins/js/jquery.validate.js"></script>
<script src="/static/admins/js/matrix.form_validation.js"></script>
<script src="/static/admins/js/jquery.wizard.js"></script>
<script src="/static/admins/js/jquery.uniform.js"></script>
<script src="/static/admins/js/select2.min.js"></script>
<script src="/static/admins/js/matrix.popover.js"></script>
<script src="/static/admins/js/matrix.tables.js"></script>
<script type="text/javascript" src="/static/admins/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
