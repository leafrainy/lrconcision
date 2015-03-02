<?php
/*
Template Name:LR_Concision
Description:简洁优雅,Update：20140418
Version:1.7
Author:叶雨梧桐
Author Url:http://blog.gt520.com
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/jquery/jquery-1.7.1.js" type="text/javascript"></script>
 <script src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/js/myjs.js" type="text/javascript"></script>

<!--[if IE 6]>
<script src="<?php echo TEMPLATE_URL; ?>iefix.js" type="text/javascript"></script>
<![endif]-->
<?php doAction('index_head'); ?>
</head>
<body>
<div id="wrap">
  <div id="header">
  <h1>
  <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a> 
	<div class="infobox">
		<div id="infoimg"><img src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/images/volume-up.png"></div>
		<div id="infofont"><?php echo $bloginfo; ?></div>
	</div>
  </h1>
<div id="navbox">
<div class="aboutmeweb">
		
		<a href="http://wpa.qq.com/msgrd?V=1&Uin=825591305" title="QQ交谈" target="_blank">
			<img src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/images/qq.png">
		</a>
		<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=hv--8fLk6unhxvDv9qj396jl6es" title="给我写信" target="_blank">
			<img src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/images/mail.png">
		</a>
		<a href="http://t.qq.com/zhl825591305" title="进入腾讯微博" target="_blank">
			<img src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/images/txweb.png">
		</a>
		<a href="http://list.qq.com/cgi-bin/qf_invite?id=dbe970c36c287fef1ed984c6ee2a6e38c2bcb2c30e8a7d8a" title="订阅叶雨梧桐BLOG" target="_blank">
			<img src="<?php echo BLOG_URL; ?>content/templates/LR_Concision/images/toprss.png">
		</a>
   </div> 
  <div id="nav"><?php blog_navi();?></div>

  
</div>
