<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\Movie\movie_add.html";i:1530413062;s:77:"C:\wamp64\www\o2o25project\tp5\application\admin\view\AdminPublic\public.html";i:1530412825;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>影片添加</title>
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
    <li class="submenu "> <a href="#"><i class="icon icon-certificate"></i><span>影院管理</span> </a>
      <ul >
         <li><a href="/cinema/index">影城/影院管理</a></li>
        <li><a href="/cinema/area">影院区域分布管理</a></li>
        <li><a href="/cinema/halltype">放映厅类型管理</a></li>
        <li><a href="/hall/list">放映厅列表</a></li>
        <li><a href="/relss/list">场次管理</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-facetime-video"></i><span>影片管理</span> </a>
      <ul style="display:block">
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

<style>.table td{text-align:center;}.iradio-blue{line-height:50px}#label label{display:inline-block;margin-right:8px;margin-top:5px;}#label label input{margin-top:0;}</style>
  <div id="content-header">
    <div id="breadcrumb">
     <a href="/admin/index" class="tip-bottom" data-original-title="去首页"><i class="icon-home"></i>首页</a>
     <a href="/movie/list" class="current">影片管理</a><a href="/movie/add" class="current">添加影片</a><a href="javascript:history.go(-1)" class="current"><i class="icon-undo"></i>后退</a>
    </div>
   </div>
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>添加影片</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" action="/Movie/insert" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                <div class="control-group">
                  <label class="control-label">影片中文名称</label>
                  <div class="controls">
                    <input type="text" name="ch_name" id="ch_name">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">影片英文名称</label>
                  <div class="controls">
                    <input type="text" name="en_name" id="en_name">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">类型</label>
                  <div class="controls" id="label">
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="爱情"><span>爱情</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="喜剧"><span>喜剧</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="动画"><span>动画</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="剧情"><span>剧情</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="恐怖"><span>恐怖</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="惊悚"><span>惊悚</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="科幻"><span>科幻</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="动作"><span>动作</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="悬疑"><span>悬疑</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="犯罪"><span>犯罪</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="冒险"><span>冒险</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="战争"><span>战争</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="奇幻"><span>奇幻</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="运动"><span>运动</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="家庭"><span>家庭</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="古装"><span>古装</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="武侠"><span>武侠</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="西部"><span>西部</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="历史"><span>历史</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="传记"><span>传记</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="黑色电影"><span>黑色电影</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="短片"><span>短片</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="纪录片"><span>纪录片</span></label>
                    <label><input type="checkbox" name="m_type[]" id="m_type" value="其他"><span>其他</span></label>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">国家</label>
                  <div class="controls">
                    <input type="text" name="country_area" id="country_area">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">电影总时长(分钟)</label>
                  <div class="controls">
                    <input type="text" name="m_time" id="m_time">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">版本</label>
                  <div class="controls">
                    <select name="m_version" id="m_version">
                      <option value="0">2D</option>
                      <option value="1">3D</option>
                      <option value="2">2D/3D</option>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">导演</label>
                  <div class="controls">
                    <input type="text" name="m_director" id="m_director">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">主演</label>
                  <div class="controls">
                    <input type="text" name="m_actor" id="m_actor">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">售价(元)</label>
                  <div class="controls">
                    <input type="text" name="m_price" id="m_price">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">剩余量(张)</label>
                  <div class="controls">
                    <input type="text" name="surplus" id="surplus">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">上映时间</label>
                  <div class="controls">
                    <input type="text" name="m_addtime" id="m_addtime" onClick="WdatePicker({skin:'default',Date:'%y-%M-%d',maxDate:'2099-12-30'})" class="Wdate" autocomplete="off">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">语言</label>
                  <div class="controls">
                    <input type="text" name="laguage" id="laguage">
                  </div>
                </div>
                <div class="control-group">
	              <label class="control-label">图片</label>
	              <div class="controls">
	                <input type="file" size="19" style="opacity: 1;" id="picurl" name="picurl">
	              </div>
	            </div>
               <div class="control-group">
                  <label class="control-label">状态/预告/上映</label>&nbsp;
                  <label class="radio" style="margin-left:35px;line-height:40px"><input type="radio" name="status" id="status" style="margin-top:14px" value="0" checked>预告</label>
                 <label class="radio" style="margin-left:35px;line-height:40px"><input type="radio" name="status" id="status" style="margin-top:14px" value="1">上映</label>
               </div>
				<div class="control-group">
	              <label class="control-label">剧情简介</label>
	              <div class="controls">
	                <textarea class="span6" name="content"></textarea>
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
<script src="/static/admins/js/jquery.dataTables.min.js"></script>
<script src="/static/admins/js/matrix.tables.js"></script>
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
