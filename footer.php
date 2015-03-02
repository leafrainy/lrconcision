<?php 
/**
* 页面底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->

<div style="clear:both;"></div>
<!--返回顶部-->
<div style="display: none" id="goTopBtn"></div> 
<script type=text/javascript>backtop();</script>
<div id="footer">
Copyright &copy;  2013-2014 <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>. Powered by <a href="http://www.emlog.net/" rel="external">emlog</a>.
 Theme by <a href="http://blog.gt520.com/" rel="external">叶雨梧桐</a>.
 <a href="http://www.miibeian.gov.cn" target="_blank"  rel="nofollow"><?php echo $icp; ?></a>  <?php doAction('index_footer'); ?>  <?php echo $footer_info; ?>
</div><!--end #footer-->
</div><!--end #wrap-->
<script>prettyPrint();</script>
</body>
</html>