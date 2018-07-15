<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\User\trash.html";i:1530413887;s:77:"C:\wamp64\www\o2o25project\tp5\application\admin\view\AdminPublic\public.html";i:1530412825;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>回收站</title>
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
    <li class="submenu open"> <a href="#"><i class="icon icon-user"></i><span>用户管理</span> </a>
      <ul style="display:block">
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

 <div id="content-header">
  <div id="breadcrumb">
   <a href="/admin/index" class="tip-bottom" data-original-title="去首页"><i class="icon-home"></i>首页</a>
   <a href="/user/list" class="current">用户管理</a><a href="/user/trash" class="current">用户回收站</a><a href="javascript:history.go(-1)" class="current"><i class="icon-undo"></i>后退</a>
  </div>
 </div>
<div class="container-fluid">
  <div class="row-fluid">
   <div class="span12">
    <div class="widget-box">
     <div class="widget-title">
      <span class="icon"><i class="icon-trash"></i></span>
      <h5>用户回收站</h5>
     </div>
     <div class="widget-content nopadding">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
       <div class="">
        <div id="DataTables_Table_0_length" class="dataTables_length">
          <a href="JavaScript:;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">回收站列表</a>
        </div>
       </div>
       <table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
        <thead>
         <tr role="row">
          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 21px;">
           <div class="DataTables_sort_wrapper">
            选择
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span>
           </div></th>
          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 81px;">
           <div class="DataTables_sort_wrapper">
            ID
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span>
           </div></th>
          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 118px;">
           <div class="DataTables_sort_wrapper">
            用户名称
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
           </div></th>
          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 106px;">
           <div class="DataTables_sort_wrapper">
            会员状态
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
           </div></th>
          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 106px;">
           <div class="DataTables_sort_wrapper">
            加入时间
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
           </div></th>

          <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 66px;">
           <div class="DataTables_sort_wrapper">
            操作
            <span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
           </div></th>
         </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
         <tr class="gradeA odd text-center">
          <td class=""><input type="checkbox" value="<?php echo $row['id']; ?>"></input></td>
          <td class=""><?php echo $row['id']; ?></td>
          <td class=""><?php echo $row['username']; ?></td>
          <td class=""><?php if($row['status']==0): ?><span class="btn btn-mini btn-default">普通用户</span><?php else: ?><span class="btn btn-mini btn-warning">VIP用户</span><?php endif; ?></td>
          <td class=""><?php echo date("Y-m-d H:i:s",$row['addtime']); ?></td>

          <td class="td-manage">
            <a href="JavaScript:;" onclick="rec('<?php echo $row['id']; ?>')" recname="<?php echo $row['id']; ?>"  class="btn btn-mini btn-success" title="还原">还原</a>
            <a href="JavaScript:;" onclick="del('<?php echo $row['id']; ?>')" delname="<?php echo $row['id']; ?>"  class="btn btn-mini btn-danger" title="删除">删除</a>
          </td>
         </tr>
         <?php endforeach; endif; else: echo "" ;endif; ?>
         <tr>
            <td colspan="5" style="text-align:left;"><div class="">
            <div id="DataTables_Table_0_length" class="dataTables_length" style="width:88px;float:left;margin-left:0;margin-right:0">
              <a href="JavaScript:;" class="btn btn-danger mdel" >批量删除</a>
            </div>
            <div id="DataTables_Table_0_length" class="dataTables_length" style="width:88px;float:left;margin-left:0;margin-right:5px;">
              <a href="JavaScript:;" class="btn btn-primary mrecover" >批量还原</a>
            </div>
            <div id="DataTables_Table_0_length" class="dataTables_length" style="width:60px;float:left;position:relative;left:-5px;">
              <a href="JavaScript:;" class="btn btn-success allchoose">全选</a>
            </div>
            <div id="DataTables_Table_0_length" class="dataTables_length" style="float:left;width:60px;position:relative;left:-15px;">
              <a href="JavaScript:;" class="btn btn-warning fchoose">反选</a>
            </div>
            <div id="DataTables_Table_0_length" class="dataTables_length" style="float:left;width:80px;position:relative;left:-25px;">
              <a href="JavaScript:;" class="btn btn-info nochoose">全不选</a>
            </div>
      </div></td>
          <td colspan="4" style="text-align:right;border-left:0;">
              <div id="pages" style="position:absolute;right:10px;">
                  <?php echo $data->appends($request)->render(); ?>
              </div>
          </td>
         </tr>
        </tbody>
       </table>
          <div class="dataTables_filter" id="DataTables_Table_0_filter">
            <form action="/user/trash" method="get">
              <label>用户名称: <input type="text" name="keywords" aria-controls="DataTables_Table_0" value="<?php echo $k; ?>"><input type="submit" class="btn btn-info" value="搜索"></label>
            </form>
          </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
</div>
<script src="/static/admins/js/jquery.min.js"></script>
<script src="/static/admins/js/jquery.flot.min.js"></script>
<script src="/static/admins/js/jquery.flot.resize.min.js"></script>
<script src="/static/admins/lib/layer/2.4/layer.js"></script>
<script>

//删除
function del(id){
    obj = $("a[delname="+id+"]");
    layer.confirm('确定要删除吗？',function(index){
    $.get("/user/delete",{id:id},function(data){
      if(data){
        if(data['code']==0){
           layer.msg(data['msg'],{icon:2,time:5000});
        }else{
            $(obj).parents("tr").remove();
            layer.msg('删除成功!',{icon: 1,time:1000});
        }
      }
    });
  });
}

//回收站还原
function rec(id){
    obj = $("a[recname="+id+"]");
    layer.confirm('确定要还原吗？',function(index){
    $.get("/user/recover",{id:id,display:1},function(data){
      if(data){
        if(data['code']==0){
           layer.msg(data['msg'],{icon:2,time:5000});
        }else{
            $(obj).parents("tr").remove();
            layer.msg('还原成功!',{icon: 1,time:1000});
        }
      }
    });
  });
}

//全选
$('.allchoose').click(function(){
    //遍历所有table里面的tr
    $('#DataTables_Table_0').find("tr").each(function(){
       //获取所有的复选框 选中
       $(this).find(':checkbox').attr('checked',true);
    });
});

//全不选
$('.nochoose').click(function(){
    //遍历所有table里面的tr
    $('#DataTables_Table_0').find("tr").each(function(){
       //获取所有的复选框 选中
       $(this).find(':checkbox').attr('checked',false);
    });
});

//反选
$('.fchoose').click(function(){
    //遍历tr
    $('#DataTables_Table_0').find("tr").each(function(){
        //判断
       if($(this).find(':checkbox').attr('checked')){
            $(this).find(':checkbox').attr('checked',false);
       }else{
            $(this).find(':checkbox').attr('checked',true);
       }
    });
});

//批量还原
$('.mrecover').click(function(){
    arr=[];
    //获取选中数据的id
    $(":checkbox").each(function(){
        //判断
        if($(this).attr("checked")){
            //获取选中复选 id
            id=$(this).val();
            //添加元素到数组
            arr.push(id);
        }
    });
    //Ajax还原
     layer.confirm('确定要还原吗？',function(index){
        $.get("/user/mrecover",{arr:arr,display:1},function(data){
        if(data){
            if(data['code']==0){
                layer.msg(data['msg'],{icon: 2,time:1000});
            }else{
                 //遍历
                 for(var i=0;i<arr.length;i++){
                    //把删除数据的tr从dom移除
                    $("input[value="+arr[i]+"]").parents("tr").remove();
                }
                layer.msg('还原成功!',{icon: 1,time:1000});
            }
        }else{
            layer.msg('至少选中一个!',{icon: 5,time:1000});
        }
        });
   });

});

//批量彻底删除
$('.mdel').click(function(){
    arr=[];
    //获取选中数据的id
    $(":checkbox").each(function(){
        //判断
        if($(this).attr("checked")){
            //获取选中复选 id
            id=$(this).val();
            //添加元素到数组
            arr.push(id);
        }
    });
    //Ajax删除
     layer.confirm('确定要彻底删除吗？',function(index){
        $.get("/user/mdel",{arr:arr},function(data){
        if(data){
            if(data['code']==0){
                layer.msg(data['msg'],{icon: 2,time:1000});
            }else{
                 //遍历
                 for(var i=0;i<arr.length;i++){
                    //把删除数据的tr从dom移除
                    $("input[value="+arr[i]+"]").parents("tr").remove();
                }
                layer.msg('彻底删除成功!',{icon: 1,time:1000});
            }
        }else{
            layer.msg('至少选中一个!',{icon: 5,time:1000});
        }
        });
   });

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
