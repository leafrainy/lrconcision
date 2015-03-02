<?php 
/**
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<?php
//widget：日历
function widget_calendar($title){ ?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="blogtags">
	<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="blogsort">
	<?php
	foreach($sort_cache as $value):
		if ($value['pid'] != 0) continue;
	?>
	<li>
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	<?php if (!empty($value['children'])): ?>
		<ul>
		<?php
		$children = $value['children'];
		foreach ($children as $key):
			$value = $sort_cache[$key];
		?>
		<li>
			<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
		</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="newcomment">
    <?php
	foreach($com_cache as $value):
	$url = Url::comment($value['gid'], $value['page'], $value['cid']);
	?>
		<li><img alt="" src="http://www.gravatar.com/avatar/<?php echo md5($value['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32"><?php echo $value['name']; ?>:<br> <a href="<?php echo $url; ?>" title="查看"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
  </ul>
</li>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="logserch">
    <form name="keyform" method="get" id="sidebar_s" action="<?php echo BLOG_URL; ?>index.php">
      <input name="keyword" id="s" type="text" value="" />
      <input type="submit" id="logserch_logserch" class="button" value="搜索" />
    </form>
  </ul>
</li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<li>
	<h3><span><?php echo $title; ?></span></h3>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
<li>
  <h3><span><?php echo $title; ?></span></h3>
  <ul id="link">
    <?php foreach($link_cache as $value): ?>
    <li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
    <?php endforeach; ?>
  </ul>
</li>
<?php }?>
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul class="bar">
	<?php
	foreach($navi_cache as $value):
		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li class="item <?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>
		</li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.png\" title=\"置顶文章\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
<div class="neighbor_log">
<?php if($prevLog):?>
<span class="left">上一篇：<a href="<?php echo Url::log($prevLog['gid']) ?>" title="上一篇《<?php echo $prevLog['title'];?>》"><?php echo $prevLog['title'];?></a></span><br/><br/>
 <?php else:?>
  <span class="left">上一篇：噢~这是最新的文章了</span><br/><br/>
<?php endif;?>
<?php if($nextLog && $prevLog):?>
<?php endif;?>
<?php if($nextLog):?>
<span class="right">下一篇：<a href="<?php echo Url::log($nextLog['gid']) ?>" title="下一篇《<?php echo $nextLog['title'];?>》"><?php echo $nextLog['title'];?></a></span>
<?php else:?>
  <span class="right">下一篇：没错，这就是小站第一篇文章</span>
<?php endif;?>
</div>
<?php }?>

<?php
//blog：评论列表
function blog_comments($comments,$params){
    extract($comments);?>
	<div id="comments" class="div"> 
		<a name="comments"></a>
		<?php if($commentStacks): ?>
			<div style="font-size:18px;color:#000;margin:0px 0px 0px 11px;padding:5px 0 5px 10px;background-color:#dadada;"> 评论列表 <span style="font-size:14px;" id="go-comment-place"><a href="javascript:void()">↓</a></span> </div>
		<?php endif; ?>
		<div id="comment_list">
		<?php
			$isGravatar = Option::get('isgravatar');
			$comnum = count($comments);
			foreach($comments as $value){
				if($value['pid'] != 0){
				$comnum--;
				}
			}
			$pageKey=array_search('comment-page',$params); 
			if ($pageKey===false){ 
				$page=1; 
			} 
			else{ 
				$pageKey++; 
				$page = isset($params[$pageKey])?intval($params[$pageKey]):1; 
			}
			$i= $comnum - ($page - 1)*Option::get('comment_pnum');
			foreach($commentStacks as $cid):
			$comment = $comments[$cid];
			$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" rel="external nofollow" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
			$color = dechex(rand(0,16777215));
		?>
		<div class="comment-box">
			<div class="comment" id="comment-<?php echo $comment['cid']; ?>">
				<a name="<?php echo $comment['cid']; ?>"></a>
				<?php if($isGravatar == 'y'): ?>
					<img src="<?php echo getGravatar($comment['mail']); ?>" width="36" height="36" class="avatar" />
				<?php endif; ?>
			<div class="comment-info" style="border-left: 3px solid #<?php echo $color;?>;"> 
			<?php if($i>10)
					echo '<span class="louceng">#'.$i.'</span>';  
				elseif($i==10)
					echo '<span class="louceng" style="color: #4169E1;font-weight: bold;font-size:15px">成不了楷模，当个凯子也是可以的。</span>';
				elseif($i==9)
					echo '<span class="louceng" style="color: #CD853F;font-weight: bold;font-size:15px">早起的鸟儿有虫吃。</span>';
				elseif($i==8)
					echo '<span class="louceng" style="color: #FF00FF;font-weight: bold;font-size:15px">手拿菜刀砍电线，一路火花带闪电。</span>';
				elseif($i==7)
					echo '<span class="louceng" style="color: #A0522D;font-weight: bold;font-size:15px">是鸟总会有飞的一天。</span>';
				elseif($i==6)
					echo '<span class="louceng" style="color: #483D8B;font-weight: bold;font-size:15px">你的出现，全场震动。</span>';
				elseif($i==5)
					echo '<span class="louceng" style="color: #8FBC8F;font-weight: bold;font-size:15px">一生复能几，倏如流电惊。</span>';
				elseif($i==4)
					echo '<span class="louceng" style="color: #FFD700;font-weight: bold;font-size:15px">四楼，你来晚了。</span>';
				elseif($i==3)
					echo '<span class="louceng" style="color: #000000;font-weight: bold;font-size:15px">越有内涵的人越低调出现。</span>';
				elseif($i==2)
					echo '<span class="louceng" style="color: #93BF20;font-weight: bold;font-size:15px">自古二楼出人才。</span>';
				else
					echo '<span class="louceng" style="color:#cc0000;font-weight: bold;font-size:15px">呦，果断人中龙凤!</span>';
			?> 
		<!--<span class="louceng">#<?php echo $i; ?></span> -->
		<span class="name"><?php echo $comment['poster']; ?></span><span style="padding-left:5px"><?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?></span>&nbsp;&nbsp; <?php if(function_exists('display_useragent')){display_useragent($comment['cid']);} ?>&nbsp;&nbsp;<span class="comment-time"> <?php echo $comment['date']; ?> </span> <a class='comment-reply-link' href='#comment-<?php echo $comment['cid']; ?>' onclick="commentReply(<?php echo $comment['cid']; ?>,this)">@回复</a><br />
          <span class="commnet-content"><?php echo $comment['content']; ?></span> </div>
        <?php blog_comments_children($comments, $comment['children']); ?>
      </div>
    </div>
    <div style="clear:both;"></div>
    <?php $i--;endforeach; ?>
  </div>
</div>
<div class="navigation"><div class="pagination"> <?php echo $commentPageUrl;?> </div></div>
<?php }?>
<?php
//blog：博客子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" rel="external nofollow" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<div class="comment comment-children" id="comment-<?php echo $comment['cid']; ?>"> <a name="<?php echo $comment['cid']; ?>"></a>
  <?php if($isGravatar == 'y'): ?>
  <img src="<?php echo getGravatar($comment['mail']); ?>" width="36" height="36" class="avatar" />
  <?php endif; ?>
  <div class="comment-info"> <span class="name"><?php echo $comment['poster']; ?></span><span style="padding-left:5px"><?php $mail_str="\"".strip_tags($comment['mail'])."\"";echo_levels($mail_str,"\"".$comment['url']."\""); ?></span>&nbsp;&nbsp; <?php if(function_exists('display_useragent')){display_useragent($comment['cid']);} ?>&nbsp;&nbsp;<span class="comment-time"> <?php echo $comment['date']; ?> </span> <a class='comment-reply-link' href='#comment-<?php echo $comment['cid']; ?>' onclick="commentReply(<?php echo $comment['cid']; ?>,this)">@回复</a>> <br />
    <span class="commnet-content"><?php echo $comment['content']; ?></span> </div>
  <?php if($comment['level'] < 4): ?>
  <?php endif; ?>
  <?php blog_comments_children($comments, $comment['children']);?>
</div>
<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
<div id="comment-place" class="div">
  <div class="comment-post" id="comment-post">
	<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
    <div class="comment-header"><a name="respond"></a><h3>发表评论</h3></div>
    <form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
      <input type="hidden" name="gid" value="<?php echo $logid; ?>" />
      <?php if(ROLE == 'visitor'): ?>
      <?php if($ckname != ''): ?>
      <div id="commentwelcome">
		<span>欢迎回来！亲爱的<?php echo $ckname; ?> !</span>&nbsp;&nbsp;
      <?php if($ckname != '') : ?>
      <span id="to_author_info"><a rel="nofollow" href="javascript:;">[ 修改 ]</a></span>
      <?php endif; ?>
	</div>
      <?php endif; ?>
      <div id="userinfo"<?php if($ckname != '') echo ' style="display:none;"'; ?>>
        <div id="comment-author-info">          
          <p>
			<div id="guest_avatar">
				<img src="<?php echo getGravatar($ckmail, 80); ?>" id="realtime_avatar" />
				<p style="font-size:12px;color:#999;">亲，头像对么？</p>
			</div>
			<label for="author"><small>姓名:</small> </label>
            <input type="text" name="comname" class="input" value="<?php echo $ckname; ?>" tabindex="1"/>
          </p>
          <p>
			<label for="email"><small>邮箱:</small> </label>
            <input type="text" name="commail" id="email" class="input" value="<?php echo $ckmail; ?>" tabindex="2"/>
          </p>
          <p>
			<label for="url"><small>主页:</small></label>
            <input type="text" name="comurl" class="input" value="<?php echo $ckurl; ?>" tabindex="3" />
          </p>
        </div>
      </div>
      <?php
	else:
	$CACHE = Cache::getInstance();
	$user_cache = $CACHE->readCache('user');
?>
      <span>您当前已登录为: <?php echo $user_cache[UID]['name']; ?></span>
      <?php endif; ?>
      <p>
        <textarea name="comment" class="textarea" cols="81" rows="7" tabindex="4" onkeydown="if(event.altKey && window.event.keyCode == 83) {document.getElementById('submit').click();return false;}; if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false;};" >
</textarea>
      </p>
      <input name="submit" type="submit" class="submit blue button" tabindex="5" value="填写好了！(Ctrl+Enter)" />
      <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
    </form>
    <div id="error" style="color:red"></div>
	<div class="clear"></div>
    <p style="font-size:25px;color:#999;padding: 5px 10px 10px 20px;">
      Welcome To My Blog . </p>
  </div>
</div>
<?php endif; ?>
<?php }?>
<?php
//comment：输出等级
function echo_levels($comment_author_email,$comment_author_url){
  $DB = MySql::getInstance();
  $vip_list = array('"825591305@qq.com"');
	if(in_array($comment_author_email,$vip_list)){
	   echo '<a class="vip" href="#" title="会员认证"></a>';
	  }

  $adminEmail = '"825591305@qq.com"';
  if($comment_author_email==$adminEmail)
  {
	echo '<a class="vip" href="mailto:'.$comment_author_email.'" title="作者认证"></a>';
    echo '<a class="vp" href="#" title="管理员认证"></a><a class="vip7" title="特别认证"></a>';
  }
  
  $sql = "SELECT cid as author_count FROM emlog_comment WHERE mail = ".$comment_author_email;
  $res = $DB->query($sql);
  $author_count = mysql_num_rows($res);
  if($author_count>=5 && $author_count<10 && $comment_author_email!=$adminEmail)
    echo '<a class="vip1" title="路过酱油 LV.1"></a>';
  else if($author_count>=10 && $author_count<20 && $comment_author_email!=$adminEmail)
    echo '<a class="vip2" title="偶尔光临 LV.2"></a>';
  else if($author_count>=20 && $author_count<40 && $comment_author_email!=$adminEmail)
    echo '<a class="vip3" title="常驻人口 LV.3"></a>';
  else if($author_count>=40 && $author_count<80 && $comment_author_email!=$adminEmail)
    echo '<a class="vip4" title="以博为家 LV.4"></a>';
  else if($author_count>=80 &&$author_count<160 && $comment_author_email!=$adminEmail)
    echo '<a class="vip5" title="情牵小博 LV.5"></a>';
  else if($author_count>=160 && $author_coun<320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip6" title="为博终老 LV.6"></a>';
  else if($author_count>=320 && $comment_author_email!=$adminEmail)
    echo '<a class="vip7" title="三世情牵 LV.7"></a>';
}
?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>