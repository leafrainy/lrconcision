<?php 
/**
* 阅读文章页面
*/

if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">

	<h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
	<p class="date"><?php blog_author($author); ?> 写于：<?php echo gmdate('Y-n-j G:i', $date); ?> 
	<?php blog_sort($logid); ?> 	<a href="<?php echo $value['log_url']; ?>">阅读：<?php echo $views; ?>次 &nbsp; 评论：<a href="<?php echo $value['log_url']; ?>#comments"><?php echo $comnum; ?>条</a> &nbsp;<?php editflg($logid,$author); ?><div style="border-bottom:1px solid #dadada ;"><?php blog_tag($logid); ?></div>
	</p>
<div id="tp">
	<p><?php echo $log_content; ?></p>
	<p class="sm"> 除特别标注,本博客所有文章均为原创. 互联分享,尊重版权,转载请以链接形式标明本文地址；<br/>本文固定链接：<a title="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?></a>
	</p>
</div><!--tp end-->

	<?php doAction('log_related', $logData); ?>
	<?php neighbor_log($neighborLog); ?>
<div style="clear:both;"></div>
<div class="articles">
<div class="">
						<?php blog_comments($comments,$params); ?>
						<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
					</div>
</div>
<div style="clear:both;"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>