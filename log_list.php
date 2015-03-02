<?php 
/**
* 首页文章列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
<div id="contentleft">
<?php doAction('index_loglist_top'); ?>

<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
	<h2><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
	<p class="date"><?php echo gmdate('Y-n-j G:i', $value['date']); ?>&nbsp;&nbsp;|&nbsp;&nbsp; <?php blog_author($value['author']); ?>&nbsp;&nbsp; |&nbsp;&nbsp;<?php blog_sort($value['logid']); ?>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="<?php echo $value['log_url']; ?>#comments">评论&nbsp;<?php echo $value['comnum']; ?>&nbsp;条&nbsp;&nbsp; |&nbsp;&nbsp; </a>
	<a href="<?php echo $value['log_url']; ?>">浏览&nbsp;<?php echo $value['views']; ?>&nbsp;次</a>
	<?php editflg($value['logid'],$value['author']); ?>
	</p>
<div class="thumbnail_box">
	<div class="thumbnail">
	<?php 
		preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $value['content'], $img);
		$rand_img = TEMPLATE_URL.'images/random/tb'.rand(1,20).'.jpg';
		$imgsrc = !empty($img[1]) ? $img[1][0] : $rand_img;
	?>
		<a href="<?php echo $value['log_url']; ?>" rel="bookmark" title="<?php echo $value['log_title']; ?>"><img width="140px" height="100px" src="<?php echo $imgsrc; ?>" alt="<?php echo $value['log_title']; ?>" title="<?php echo $value['log_title']; ?>" /></a>
</div></div>
	<?php echo subString(strip_tags($value['content']),0,250,"..."); ?>
	<p></p>
	
	<div style="clear:both;"></div>
<?php 
endforeach;
else:
?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
<?php endif;?>
<hr>
<div class="navigation"><div class="pagination"><?php echo $page_url;?></div></div>

</div><!-- end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>