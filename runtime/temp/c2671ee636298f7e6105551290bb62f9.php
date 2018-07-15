<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Movielist\content.html";i:1530519946;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>电影列表详情</title>
  <link rel="stylesheet" href="/static/homes/css/movie-detail.40d4116c.css"/>
  <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="/static/homes/cort/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php use think\Db;use think\Session; ?>
<?php echo widget("Publics/header"); ?>
  <div class="banner">
    <div class="wrapper clearfix">
      <div class="celeInfo-left">
        <div class="avatar-shadow">
          <img class="avatar" src="<?php echo $data['picurl']; ?>" alt="">
            <div class="movie-ver"></div>
        </div>
      </div>
      <div class="celeInfo-right clearfix">
            <div class="movie-brief-container" >
      <h3 class="name"><?php echo $data['ch_name']; ?></h3>
      <div class="ename ellipsis"><?php echo $data['en_name']; ?></div>
      <ul>
        <li class="ellipsis"><?php echo $data['m_type']; ?></li>
        <li class="ellipsis">
        <?php echo $data['country_area']; ?>
          / <?php echo $data['m_time']; ?>分钟
        </li>
        <li class="ellipsis"><?php echo $data['m_addtime']; ?>大陆上映</li>
      </ul>
    </div>
    <div class="action-buyBtn">
      <div class="action clearfix">
        <?php $uid=Session::get('uid'); $res=Db::table("grade")->where("mid",$mid)->where("uid",$uid)->find(); if(\think\Session::get('uid')==''): ?>
        <a class='wish' data-wish="false" href="/login/index" style="height:36px">
          <div>
            <i class="icon wish-icon"></i>
              <span class="wish-msg" data-act="wish-click">想看</span>
          </div>
        </a>
        <a class="score-btn" href="/login/index" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>
            <span class="score-btn-msg"  data-act="comment-open-click">
       		 评分
            </span>
          </div>
        </a>
        <?php else: ?>
		<a class="wish <?php if($res['want']==1): ?>active<?php endif; ?>" onclick="change(<?php echo $mid; ?>)" data-wish="false" href="javascript:void(0);" kg="true" style="height:36px">
          <div>
            <i class="icon wish-icon"></i>
              <span class="wish-msg" data-act="wish-click"><?php if($res["want"]==1): ?>已想看<?php else: ?>想看<?php endif; ?></span>
          </div>
        </a>
        <?php if($res['grade']==0): ?>
         <a class="score-btn" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">评分</span>
          </div>
        </a>
        <?php elseif($res['grade']==0.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">超烂啊</span>
          </div>
        </a>
        <?php elseif($res['grade']==1): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">超烂啊</span>
          </div>
        </a>
        <?php elseif($res['grade']==1.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">超烂啊</span>
          </div>
        </a>
        <?php elseif($res['grade']==2): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">比较差</span>
          </div>
        </a>
        <?php elseif($res['grade']==2.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">比较差</span>
          </div>
        </a>
        <?php elseif($res['grade']==3): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">比较差</span>
          </div>
        </a>
        <?php elseif($res['grade']==3.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">差</span>
          </div>
        </a>
        <?php elseif($res['grade']==4): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">一般般</span>
          </div>
        </a>
        <?php elseif($res['grade']==4.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">一般般</span>
          </div>
        </a>
        <?php elseif($res['grade']==5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">一般般</span>
          </div>
        </a>
        <?php elseif($res['grade']==5.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">一般般</span>
          </div>
        </a>
        <?php elseif($res['grade']==6): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">比较一般</span>
          </div>
        </a>
        <?php elseif($res['grade']==6.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">还可以</span>
          </div>
        </a>
        <?php elseif($res['grade']==7): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">好</span>
          </div>
        </a>
        <?php elseif($res['grade']==7.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">比较好</span>
          </div>
        </a>
        <?php elseif($res['grade']==8): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">很好</span>
          </div>
        </a>
        <?php elseif($res['grade']==8.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">优秀</span>
          </div>
        </a>
        <?php elseif($res['grade']==9): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">很优秀</span>
          </div>
        </a>
        <?php elseif($res['grade']==9.5): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">棒极了</span>
          </div>
        </a>
        <?php elseif($res['grade']==10): ?>
        <a class="score-btn active" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>

            <span class="score-btn-msg"  data-act="comment-open-click">完美</span>
          </div>
        </a>
        <?php else: ?>
			<a class="score-btn" id="comment-entry1" href="javascript:void(0);" data-bid="b_rxxpcgwd" style="height:36px">
          <div>
            <i class="icon score-btn-icon"></i>
            <span class="score-btn-msg"  data-act="comment-open-click">评分</span>
          </div>
        </a>
        <?php endif; endif; ?>
      </div>
        <a class="btn buy" href="/cinemasss/<?php echo $data['id']; ?>.html/" target="_blank">特惠购票</a>
    </div>

    <div class="movie-stats-container">

        <div class="movie-index">
          <p class="movie-index-title">用户评分</p>
          <div class="movie-index-content score normal-score">
              <span class="index-left info-num ">
                <span class="stonefont"><?php echo $data['grade']; ?></span>
              </span>
              <div class="index-right">
                <div class='star-wrapper'>
                  <div class="star-on" style="<?php if($data['grade']>=1&&$data['grade']<1.5): ?>width:12%;<?php endif; if($data['grade']>1.5&&$data['grade']<=2): ?>width:20%;<?php endif; if($data['grade']>2&&$data['grade']<=2.5): ?>width:27%;<?php endif; if($data['grade']>2.5&&$data['grade']<=3): ?>width:30%;<?php endif; if($data['grade']>3&&$data['grade']<=3.5): ?>width:33%;<?php endif; if($data['grade']>3.5&&$data['grade']<=4): ?>width:40%;<?php endif; if($data['grade']>4&&$data['grade']<=4.5): ?>width:45%;<?php endif; if($data['grade']>4.5&&$data['grade']<=5): ?>width:50%;<?php endif; if($data['grade']>5.5&&$data['grade']<=6): ?>width:60%;<?php endif; if($data['grade']>6&&$data['grade']<=6.5): ?>width:65%;<?php endif; if($data['grade']>6.5&&$data['grade']<=7): ?>width:70%;<?php endif; if($data['grade']>7&&$data['grade']<=7.5): ?>width:75%;<?php endif; if($data['grade']>7.5&&$data['grade']<=8): ?>width:80%;<?php endif; if($data['grade']>8&&$data['grade']<=8.5): ?>width:85%;<?php endif; if($data['grade']>8.5&&$data['grade']<=9): ?>width:90%;<?php endif; if($data['grade']>9&&$data['grade']<=9.5): ?>width:95%;<?php endif; if($data['grade']>9.5&&$data['grade']<=10): ?>width:100%;<?php endif; if($data['grade']>=0&&$data['grade']<=1): ?>width:0%;<?php endif; ?>"></div>
                </div>
                 <span class='score-num'><span class="stonefont"><?php echo $data['count']; ?></span>人评分</span>
              </div>

          </div>
        </div>

    </div>

      </div>
    </div>
</div>
    <div class="container" id="app" class="page-movie/detail" >
<div class="main-content-container clearfix">
  <div class="main-content">
    <div class="tab-container">
      <div class="tab-title-container clearfix">
        <div class="tab-title active" data-act="tab-desc-click">介绍</div>
      </div>
      <div class="tab-content-container">
        <div class="tab-desc tab-content active" data-val="{tabtype:'desc'}">

  <div class="module">
    <div class="mod-title">
      <h3>剧情简介</h3>
    </div>
    <div class="mod-content">
                    <span class="dra"><?php echo $data['content']; ?></span>
    </div>
  </div>
  <div class="module">
    <div class="mod-title">
      <h3>演职人员</h3>
    </div>
    <div class="mod-content">
                      <div class="celebrity-container clearfix" >

                    <div class="celebrity-group">
  <div class="celebrity-type">
    导演
  </div>
  <ul class="celebrity-list clearfix">
      <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:753123}">
  <a href="/films/celebrity/753123" target="_blank" class="portrait">
    <img class="default-img" data-src="<?php echo $director['picurl']; ?>" alt="">
  </a>
  <div class="info">
    <a href="/films/celebrity/753123" target="_blank" class="name">
      <?php echo $director['director']; ?>
    </a>
  </div>
</li>
  </ul>
</div>
  <div class="celebrity-group">
  <div class="celebrity-type">
    演员
  </div>
  <ul class="celebrity-list clearfix">
    <?php if(is_array($actor) || $actor instanceof \think\Collection || $actor instanceof \think\Paginator): if( count($actor)==0 ) : echo "" ;else: foreach($actor as $key=>$actor): ?>
      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:9184}">
  <a href="/films/celebrity/9184" target="_blank" class="portrait">
    <img class="default-img" data-src="<?php echo $actor['picurl']; ?>" alt="">
  </a>
  <div class="info">
    <a href="/films/celebrity/9184" target="_blank" class="name">
      <?php echo $actor['actor']; ?>
    </a>
  </div>
</li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
     </div>

    </div>
  </div>
  <div class="module">
    <div class="mod-title">
      <h3>最近短评</h3>
    </div>
    <div class="mod-content">
                  <div class="comment-list-container" data-hot=10>

<ul>
	<?php if(is_array($data2) || $data2 instanceof \think\Collection || $data2 instanceof \think\Paginator): if( count($data2)==0 ) : echo "" ;else: foreach($data2 as $key=>$row2): ?>

    <li class="comment-container " data-val="{commentid:1023980378}">
      <div class="portrait-container">
        <div class="portrait">
        <?php if($row2['picurl']==''): ?>
          <img src="/static/homes/picture/7dd82a16316ab32c8359debdb04396ef2897.png" alt="">
        <?php else: ?>
          <img src="<?php echo $row2['picurl']; ?>" alt="">
        <?php endif; ?>
        </div>
        <i class="level-1-icon"></i>
      </div>
      <div class="main">
        <div class="main-header clearfix">
          <div class="user">
            <span class="name"><?php echo $row2['username']; ?></span>

              <span class='tag'>购</span>
          </div>
          <div class="time" title="">
            <div class="approve" data-id="1024562418">
              <i data-act="comment-approve-click" class="approve-icon" id="<?php echo $row2['id']; ?>"></i><span class="num goodNum<?php echo $row2['id']; ?>"><?php echo $row2['good']; ?></span>
            </div>
            <span title=""><?php echo date('Y-m-d H:i:s',$row2['g_addtime']); ?></span>
            <ul class="score-star clearfix" data-score="8" grade="<?php echo $row2['grade']; ?>">
              <li>
                <i class="half-star left"></i><i class="half-star right"></i>    </li>
              <li>
                <i class="half-star left"></i><i class="half-star right"></i>    </li>
              <li>
                <i class="half-star left"></i><i class="half-star right"></i>    </li>
              <li>
                <i class="half-star left"></i><i class="half-star right"></i>    </li>
              <li>
                <i class="half-star left"></i><i class="half-star  right"></i>    </li>
            </ul>
          </div>
          <!--此处本是点赞的-->
        </div>
        <div class="comment-content"><?php if($row2['g_content']!=''): ?><?php echo $row2['g_content']; else: ?>无评论<?php endif; ?></div>
      </div>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
            </div>
            <?php if(\think\Session::get('uid')==''): ?>
              <a class="comment-entry" href="/login/index" data-act="comment-no-content-click">写短评</a>
            <?php else: ?>
              <a class="comment-entry comment-entry2" data-act="comment-no-content-click">写短评</a>
            <?php endif; ?>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>
  <div class="related">
  <div class="module">
    <div class="mod-title">
      <h3>相关资讯</h3>
    </div>
    <div class="mod-content">
        <dl class="news-list">
   <?php if(!empty($data3)): if(is_array($data3) || $data3 instanceof \think\Collection || $data3 instanceof \think\Paginator): if( count($data3)==0 ) : echo "" ;else: foreach($data3 as $key=>$row4): ?>
  <dd class="news-item" data-act="new-click" data-val="{newsid:40542}">
    <div class="news-img">
      <a href="/newsinfo/id/<?php echo $row4['id']; ?>">
        <img class="news-img-default" src="/static/homes/picture/loading_2.e3d934bf.png" />
        <img class="news-img-detail" data-src="<?php echo $row4['pic']; ?>" />
      </a>
    </div>
    <div class="news-main">
      <div class="news-title">
        <a href="/films/news/40542" target="_blank"><?php echo $row4['title']; ?></a>
      </div>
      <div class="news-info">
        <span class="news-source">猫眼电影</span><!--
        --><span><i class="news-icon news-icon-views"></i><?php echo $row4['hotnum']; ?></span><!--
        --><span><i class="news-icon news-icon-comments"></i>10</span>
      </div>
    </div>
  </dd>
<?php endforeach; endif; else: echo "" ;endif; else: ?>暂无相关资讯<?php endif; ?>
</div>
    </div>
  </div>
  </div>
</div>
<div id="comment-form-container" class="ccs jBox-wrapper jBox-Modal jBox-Default" style="position: fixed; display: none; opacity: 1; z-index: 10000; left: 50%; top: 50%; margin-left: -285px; margin-top: -235px;"><div class="jBox-container"><div class="jBox-content" style="width: 550px; height: 450px;">
  <form action="/movielist/grade" method="get" id="comment-form">

    <div class="score-msg-container" style="height:70px">
        <div class="score"><span class="num">7</span>分</div>
        <div class="score-message">比较好</div>
        <div class="no-score" style="padding-top:30px">
          请点击星星评分
        </div>
    </div>
    <div id="starRating" style="margin-left:90px">
      <p class="photo">
        <input required id="input-21c" name="grade"  value="" data-size="md" type="text" title="">
        <div class="clearfix"></div>
      </p>
    </div>
    <div class="content-container">
      <textarea placeholder="快来说说你的看法吧" name="g_content" id="" cols="30" rows="10"></textarea>
      <span class="word-count-info"></span>
    </div>
    <input type="hidden" id="hidden" name="mid"  value="<?php echo $data['id']; ?>">
    <input type="hidden" id="hidden" name="uid"  value="<?php echo \think\Session::get('uid'); ?>">
    <input type="hidden" name="g_addtime" id="g_addtime" value="">
    <input class="btn" type="submit" value="提交" data-act="comment-submit-click">
  </form>
  <div class="close">×</div>
</div></div></div>
<?php echo widget("Publics/footer"); ?>
<script src="/static/homes/js/common.dc33ab40.js" ></script>
<script src="/static/homes/js/movie-detail.b5d664ec.js"></script>
<script src="/static/homes/cort/js/star-rating.js" type="text/javascript"></script>
<script src="/static/admins/lib/layer/2.4/layer.js"></script>
</body>
<script>
  $(".comment-entry2").click(function(){$(".jBox-wrapper").css("display","block");});
  $("#comment-entry1").click(function(){$(".jBox-wrapper").css("display","block");});
  $(".close").click(function(){ $(".jBox-wrapper").css("display","none");});
  jQuery(document).ready(function () {
      $("#input-21c").rating({
          min: 0, max: 10, step: 0.5, size: "xl", stars: "5"
      });
  });
</script>
<script>
//想看与不想看
function change(mid){
	obj=$('.wish');
	$.get("/movielist/want",{mid:mid},function(data){
		if(data){
			obj.addClass("active").find(".wish-msg").html("已想看");
		}else{
      obj.removeClass("active").find(".wish-msg").html("想看");
    }
	},'json');
}
//用户评论区评分
$(".score-star").each(function(e){
  grade=$(this).attr('grade');
  grade=parseInt(grade);
  k=$(this).find(".half-star");
  k.each(function(e){
     if(e<grade){
      $(this).addClass("active");
     }
  });
});

//电影点赞功能
$(".approve-icon").click(function(){
  $(this).each(function(){
    id=$(this).attr('id');
    o=$(this);
    goodNum = $(".goodNum"+id).html();
    $.get("/movielist/good",{id:id},function(data){
      //console.log(data);
      if(data){
        if(data==2){
          location.href="/login/index";
          return false;
        }else if(data==3){
          layer.msg('不能给自己评论点赞!',{icon: 2,time:1000});
          return false;
        }
        $(".goodNum"+id).html(parseInt(goodNum)+1);
        o.parent("div").addClass("active");
      }else{
        $(".goodNum"+id).html(parseInt(goodNum)-1);
        o.parent("div").removeClass("active");
      }
    });
  });
});
</script>
</html>
