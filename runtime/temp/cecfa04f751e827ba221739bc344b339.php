<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Publics\footer.html";i:1530178498;}*/ ?>
<div class="footer" style="visibility: visible;">
    <p class="friendly-links">
      违法和不良信息举报电话: 4006018900
      举报邮箱: jubao.shenlan@shenlan.com
    </p>
    <p class="friendly-links">
        友情链接 :
        <?php if(is_array($links) || $links instanceof \think\Collection || $links instanceof \think\Paginator): if( count($links)==0 ) : echo "" ;else: foreach($links as $key=>$row): if($row['k_type']==0): ?>
        <a href="<?php echo $row['url']; ?>" title="<?php echo $row['desc']; ?>"><?php echo $row['title']; ?></a>
        <?php else: ?>
        <a href="<?php echo $row['url']; ?>" title="<?php echo $row['desc']; ?>"><img src="<?php echo $row['k_pic']; ?>" width="50px" height="30px" alt=""></a>
		<?php endif; ?>
        <span></span>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </p>
    <p>
        &copy;2018
        深蓝电影 shenlan.com
        <a href="javascript:;" >粤ICP证160733号</a>
        <a href="javascript:;" >粤ICP备16022489号-1</a>
        粤公网安备 11010502030881号
        <a href="javascript:;" >网络文化经营许可证</a>
        <a href="javascript:;" >电子公告服务规则</a>
    </p>
    <p>广州深蓝文化传媒有限公司</p>
</div>

    <!--[if IE 8]><script src="/static/homes/js/es5-shim.bbad933f.js" ></script><![endif]-->
    <!--[if IE 8]><script src="/static/homes/js/es5-sham.d6ea26f4.js" ></script><![endif]-->
    <script src="/static/homes/public/js/jquery.js"></script>
    <script src="/static/homes/public/js/bootstrap.js"></script>
    <script src="/static/homes/public/js/city-picker.data.js"></script>
    <script src="/static/homes/public/js/city-picker.js"></script>
    <script src="/static/homes/public/js/main.js"></script>
</body>
</html>
