<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"C:\wamp64\www\o2o25project\tp5\public/../application/admin\view\Cinema\area.html";i:1530414122;s:77:"C:\wamp64\www\o2o25project\tp5\application\admin\view\AdminPublic\public.html";i:1530412825;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>影院区域分布管理</title>
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

<script src="/static/admins/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admins/lib/layer/2.4/layer.js"></script>
<style>.table td{text-align:center;}.iradio-blue{line-height:50px} #box{display: none;margin-left: 45px}</style>
  <div id="content-header">
    <div id="breadcrumb">
     <a href="/admin/index" class="tip-bottom" data-original-title="去首页"><i class="icon-home"></i>首页</a>
     <a href="/cinema/index" class="current">影院管理</a><a href="/cinema/area" class="current">影院区域分布管理</a><a href="javascript:history.go(-1)" class="current"><i class="icon-undo"></i>后退</a>
    </div>
   </div>
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>影院区域分布管理</h5>
            </div>
            <div class="widget-content nopadding">

              <!-- <form class="form-horizontal" action="area_details" method="post" > -->
              <div class="form-horizontal">
                  <div class="control-group">
                      <label class="control-label">品牌/影店</label>
                      <div class="controls">

                          <select name="pid"  id="opbrand">
                              <option value="-1" id="please">---请选择---</option>
                             <!--  <option value="1">全部</option> -->
                            <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): if( count($brand)==0 ) : echo "" ;else: foreach($brand as $key=>$row): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['brand']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <input type="hidden" name='name' value="" id="hid">
                          </select>
                      </div>
                  </div>

                  <div class="control-group ">
                      <label class="control-label">区域选择</label>
                      <div class="controls area">
                        <select name="pid" id="sid">
                          <option value="-1" class="ss">--请选择--</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-actions">
                    <input type="button" value="提交" class="btn btn-success" id="submit">
                    <input type="button" value="刷新区域选择" class="btn btn-info" id="again">
                  </div>

                  <div id="box" style="inline-block"><span>你选中的区域是:</span><span id="strbox"></span></div>

                  <div class="widget-box" id="cmv" style="display:none">
                    <div class="widget-title"> <span class="icon">
                      <div id="uniform-title-checkbox"><span>选择(用于修改所属区域)</div>
                      </span>

                    </div>

                    <div class="widget-content nopadding">
                      <table class="table table-bordered table-striped with-check">
                        <thead>
                          <tr>
                            <th><i class="icon-resize-vertical"></i></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                      </table>
                    </div>
                  </div>


              <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<script>

      //禁止请选择选中
     $('#please').attr('disabled',true);
     $('#opbrand').live('change',function(){

          obj = $(this);
          id = obj.val();
          $("#cmv").css("display","block");
          $.get('/cinema/brandsea',{pid:id},function(data){
            if(data){
              var op = '';
                for(var i=0;i<data.length;i++){
                      op += '<tr><td><input type="checkbox" value="'+data[i].id+'"></td><td>'+data[i].id+'</td><td>'+data[i].name+'</td><td>'+data[i].address+'</td><td class="center">'+data[i].area+'</td><td><a href="/cinema/details/id/'+data[i].id+'" class="btn btn-mini btn-info"title="修改"><i class="icon icon-pencil"></i></a>&nbsp;&nbsp;<a href="JavaScript:void(0);"class="btn btn-mini btn-danger"delname="'+data[i].id+'" onclick="del('+data[i].id+')" title="删除"><i class="icon icon-remove"></i></a></td></tr>';
                }
                //console.log(op);
                $("#tbody").html(op);

            }

      },'json');
     });

</script>
<script>

//jq和ajax删除
function del(id){

  //找到具体节点对象tr
  ss=$("a[delname="+id+"]").parents("tr");

  //layer插件
  layer.confirm('确认要删除吗？',function(index){
    //ajax交互数据 传入id
    $.get("/cinema/areadel",{id:id},function(data){
      //判断传回的数据
      if(data){
          ss.remove();
          layer.msg('删除数据成功!',{icon: 1,time:2000});
      } else {
           layer.msg('删除数据失败!',{icon:2,time:2000});
      }
      console.log(data);
    });
  });
}

// $("a[name='mm']").each(function(e){
//   console.log(e);
//   console.log($(this));
// });

</script>

<script>
  // 拼接城市区域被选中的文本值,用于插入 details 表中
  var str = '';
  // 拼接 path
  var arr = new Array();
  //第一级别获取
  $.get('/cinema/areasea',{upid:0},function(result){
    if(result['code']==0){
       layer.msg(result['msg'],{icon:2,time:3000});
    }else{
      //禁止请选择选中
      $('.ss').attr('disabled',true);
      //  console.log(result);
      //得到数据数组内容 我们需要遍历得到里面的内容
      for(var i=0;i<result.length;i++){
        //console.log(result[i].name);
        //遍历到option标签中
        var info =$('<option value="'+result[i].id+'">'+result[i].name+'</option>');

        //将得到的option对象添加到select对象中
        $('#sid').append(info);
      }
      str += $(this).find("option:selected").text();
    }
  },'json');

  //其他级别
  $('.area select').live('change',function(){
    $(this).attr('disabled',true);
     // 拼接城市区域被选中的文本值,用于插入 details 表中
    str += $(this).find("option:selected").text();
    //alert(str);
     $('#box').css('display','block');
     $('#strbox').empty();
     $('#strbox').html(str);
    obj = $(this);
    // 拼接 path
    //通过id来查找下一个级别
    id = obj.val();
    arr.push(id);
   // console.log(arr);
    //清除所有其他select
    //alert($(this).val());


    //清除所有其他select
    //obj.nextAll('select').remove();
    $.getJSON('/cinema/areasea',{upid:id},function(result){
      //console.log(result);
      //创建一个select标签对象
    //console.log(result);
      if (result.length != 0) {
        var  select = $('<select class="appendsec"></select>');
        //防止当前城市没有办法选择所以添加请选择option标签
        var op = $('<option class="mm">--请选择--</option>');
        select.append(op);
        //循环将得到的数组表里到option标签中添加到select标签中
        for(var i = 0;i<result.length;i++){
          var  info = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
          //将option标签添加到select对象中
          select.append(info);
        }
        //将select对象添加到当前标签后面
        obj.after(select);
        //把其他级别的请选择禁用
        $('.mm').attr('disabled',true);
      }
    })
  })

  //获取选中的数据提交到操作页面
  $('button').click(function(){
    arr=[];
    console.log($('select'));
    //遍历select
    $('select').each(function(){
      //获取当前select选中的option标签的文本值
      sedata=$(this).find('option:selected').html();
      //获取到文本值添加到对应的数组中
      arr.push(sedata);
    })
    //删除最后一个数组请选择
    arr.pop();
    console.log(arr);
    //return false;

  })


</script>

<script>
//  重置
  $('#again').click(function(){
   // alert(1);
    //window.location.reload();
    $('#sid').attr('disabled',false);
    $("#sid option[value='"+'-1'+"']").attr("selected", "selected");
    $('.appendsec').remove();
    $('#strbox').html('');

  });
</script>

<script>



       $('#submit').click(function(){
           var len = arr.length;
           arr.splice(len-1,1);
            path = '0,' + arr.join(',');
            area = str;
            str = '';
           // 重置
           $('#sid').attr('disabled',false);
           $('.appendsec').remove();
           $("#sid option[value='"+'-1'+"']").attr("selected", "selected");
           arr.length = 0;
           console.log(arr);

           checkarr = [];
           $(':checkbox').each(function(){
              if ($(this).attr("checked")) {
                id=$(this).val();
                checkarr.push(id);
                console.log($(this).parents("tr").find("td:eq(4)").html(area));
                $(this).attr("checked",false);
              }
           });

           $.get("/cinema/area_details",{checkarr:checkarr,path:path,str:area},function(data){
                   if (data != '' || data != null) {
                    alert('修改成功');
                   } else {
                    alert('修改失败');
                   }
               });
       });




</script>

{block name="title"}影院区域分布管理{/block}

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
