<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"C:\wamp64\www\o2o25project\tp5\public/../application/index\view\Cinemas\lists.html";i:1530369917;}*/ ?>
﻿  <div class="movie-info">
    <div>
      <h3 class="movie-name"><?php echo $m['ch_name']; ?></h3>
      <span class="score sc"><?php echo $grade; ?></span>
    </div>
    <div class="movie-desc">
      <div>
        <span class="key">时长 :</span>
        <span class="value"><?php echo $m['m_time']; ?>分钟</span>
      </div>
      <div>
        <span class="key">类型 :</span>
        <span class="value"> <?php echo $m['m_type']; ?> </span>
      </div>
      <div>
        <span class="key">主演 :</span>
        <span class="value"> <?php echo $m['m_director']; ?></span>
      </div>
    </div>
  </div>
  <div class="plist-container active">
    <table class="plist">
      <thead>
        <tr>
          <th>放映时间</th>
          <th>语言版本</th>
          <th>放映厅</th>
          <th>售价（元）</th>
          <th>选座购票</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($relss) || $relss instanceof \think\Collection || $relss instanceof \think\Paginator): if( count($relss)==0 ) : echo "" ;else: foreach($relss as $key=>$rows): ?>
        <tr class="">
          <td>
             <span style="color:red"><?php echo substr($rows['day'],"5"); ?></span>
            <span class="begin-time"><?php echo $rows['start_time']; ?></span>
            <br />
            <span class="end-time"><?php echo $rows['end_time']; ?>散场</span>
          </td>
          <td>
            <span class="lang"><?php echo $rows['laguage']; if($rows['m_version']==0): ?>2D<?php elseif($rows['m_version']==1): ?>3D<?php else: ?>2D/3D<?php endif; ?></span>
          </td>
            <td>
              <span class="hall"><?php echo $rows['hallname']; ?></span>
            </td>
          <td>
            <span class="sell-price"><span class="stonefont"><?php echo $rows['m_price']; ?></span></span>
          </td>
          <td>
              <a href="/seats/<?php echo $rows['id']; ?>-<?php echo $rows['hid']; ?>-<?php echo $rows['mid']; ?>-<?php echo $rows['cid']; ?>" class="buy-btn normal">选座购票</a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>
  <div class="plist-container "></div>


