<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\Cinema\index.html";i:1530427893;s:77:"C:\wamp64\www\o2o25project\tp5\application\admin\view\AdminPublic\public.html";i:1530412825;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
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

<link rel="stylesheet" href="/static/admins/contextMenu/css/contextMenu.css" />
<script src="/static/admins/contextMenu/js/jquery-1.7.2.min.js"></script>
<style>.table td{text-align:center;}.iradio-blue{line-height:50px} #restyle{margin-left: 5px;margin-bottom: 5px;display: inline-block;} #but{margin-left: 230px}
</style>
<div id="content-header">
    <div id="breadcrumb">
     <a href="/admin/index" class="tip-bottom" data-original-title="去首页"><i class="icon-home"></i>首页</a>
     <a href="/cinema/index" class="current">影院管理</a><a href="/cinema/index" class="current">影院区域分布管理</a><a href="javascript:history.go(-1)" class="current"><i class="icon-undo"></i>后退</a>
    </div>
   </div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-info-sign"></i>
                    </span>
                    <h5>影城/影院管理</h5></div>
                <div class="widget-content nopadding">

                        <div class="findspan" style="width:1000px;margin-top:18px;margin-left:40px">
                         <ul class="thumbnails">
                            <li style="margin:0px" >
                              <ul style="margin:0">
                                  <li class="span2" >
                                     <a>
                                       <span class="label label-warning">
                                          <h4>品牌</h4>
                                       </span>
                                    </a>
                                  </li>
                               </ul>
                            </li>
                        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$brand): ?>
                           <li style="margin:0px">
                              <ul style="margin:0">
                                  <li class="span2" >
                                     <a>
                                       <span class="label label-info conmenu"  id="restyle" info="<?php echo $brand['id']; ?>">
                                          <h4><?php echo $brand['brand']; ?></h4>
                                       </span>
                                    </a>
                                          <div class="actions" style="margin-left:4px;width:35px;">
                                              <a data-toggle="modal" data-target="#myModal<?php echo $brand['id']; ?>" ><i class="icon-edit" ></i></a>
                                              <a href="/cinema/del/id/<?php echo $brand['id']; ?>" class="del"><i class="icon-remove"></i></a>
                                          </div>
                                  </li>
                               </ul>
                            </li>


                            <!-- 模态框（Modal） -->
                            <div class="modal fade" id="myModal<?php echo $brand['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <form action="/cinema/edit" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">请完成修改</h4>
                                        </div>
                                        <!-- <div class="modal-body">在这里添加一些文本</div> -->
                                        <div style="height:125px;">
                                             <span style="font-size:24px;position:relative;top:30px;left:10px">品牌名修改:</span>
                                             <center><input type="text" name="brand" value="<?php echo $brand['brand']; ?>"></center>
                                             <input type="hidden" name="id" value="<?php echo $brand['id']; ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                            <input type="submit" class="btn btn-primary"></input>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </form>
                                </div><!-- /.modal -->
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        </div>




                        <br>
                        <br>
                      <form class="form-horizontal" action="/cinema/brand_insert" method="post"  enctype="multipart/form-data" name="basic_validate" id="basic_validate" novalidate="novalidate" ; onsubmit="return check()">
                        <div class="control-group">
                            <label class="control-label" id="bcss">品牌/影院</label>
                            <div class="controls">

                                <select name="pid"  id="opbrand">
                                    <option value="-1">---请选择---</option>
                                    <option value="1">品牌</option>
                                  <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['brand']; ?></option>
                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                 <!--  <input type="hidden" name='name' value="" id="hid"> -->
                                </select>
                            </div>
                        </div>
                        <div class="control-group cbrand">
                            <label class="control-label" id="bcs">添加品牌/影院</label>
                            <div class="controls">
                                <input type="text" name="brand" id="inp1"><font size="3" id="ft1"></font>
                            </div>
                        </div>

                        <div class="control-group" id="pic" >
                          <label class="control-label">上传影店图片</label>
                          <div class="controls">
                            <input type="file" size="19" name="pic" value="">
                          </div>
                        </div>

                        <div class="control-group" id="address">
                            <label class="control-label" id="divadderss">添加影店具体地址</label>
                            <div class="controls">
                                <textarea name="address" id="inp2"></textarea><font size="3" id="ft2"></font>
                            </div>
                        </div>
                        <div class="control-group" id="price">
                            <label class="control-label" id="divadderss">最低电影单价</label>
                            <div class="controls">
                                <input type="text" name="price" id="inp3">
                            </div>
                        </div>
                        <div class="control-group" id="phone">
                            <label class="control-label" id="divadderss">联系电话</label>
                            <div class="controls">
                                <input type="text" name="phone" id="inp4">
                            </div>
                        </div>
                        <div class="form-actions" id="but">
                            <input type="submit" value="提交" class="btn btn-success" id="butt">
                            <input type="reset" value="重置" class="btn btn-info" id="reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

        $("#inp1").blur(function(){
          //alert(10);
            if ($("#inp1").val()=='') {
              $("#inp1").next().css({ color: "#ff0011"}).html('&nbsp;&nbsp;&nbsp;请完成输入!!');
          } else {
              $("#inp1").next().css({ color: 'blue'}).html('&nbsp;&nbsp;&nbsp;Good!');
          }
        });
        $("#inp2").blur(function(){
            if ($("#inp2").val()=='') {
              $("#inp2").next().css({ color: "#ff0011"}).html('&nbsp;&nbsp;&nbsp;请完成输入!!');
          } else {
              $("#inp2").next().css({ color: 'blue'}).html('&nbsp;&nbsp;&nbsp;Good!');
          }
        });

       $("#opbrand").change(function(){
          bb = $("#opbrand option:selected").val();
          //console.log(aa);
          if (bb == 1) {
              $("#address").hide();
              $("#price").hide();
              $("#phone").hide();
              $("#pic").hide();
               $("#bcs").html('添加品牌名称');
               $("#bcss").html('品牌');
              // $(".cbrand").show();
          } else {
            $("#address").show();
            $("#price").show();
            $("#phone").show();
             $("#pic").show();
             $("#bcss").html('影院');
            $("#bcs").html('添加影店名称');
            // $(".cbrand").hide();
          }
      });


    var check = function(){
            if($("#opbrand option:selected").val() == -1){
                return false;
            }else{
                return true;
            }
        }

  $("#reset").click(function(){
    $("#ft1").empty();
    $("#ft2").empty();
     $("#bcs").html('添加品牌/影店');
     $("#bcss").html('品牌/影院');
     $("#address").show();
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
