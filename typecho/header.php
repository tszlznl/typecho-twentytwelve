<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="<?php $this->options->charset(); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php $this->archiveTitle(array(
    'category' => _t('分类 %s 下的文章'),
    'search'   => _t('包含关键字 %s 的文章'),
    'tag'      => _t('标签 %s 下的文章'),
    'author'   => _t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('fonts/font-open-sans.css'); ?>" />
<?php $this->header(); ?>
</head>

<body class="<?php echo twentytwelve_body_class($this); ?>">
<div id="page" class="hfeed site">
	<a class="screen-reader-text skip-link" href="#content">跳转到内容</a>
	<header id="masthead" class="site-header">
		<hgroup>
			<h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>" rel="home"><?php $this->options->title(); ?></a></h1>
			<h2 class="site-description"><?php $this->options->description(); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle">菜单</button>
			<ul class="nav-menu">
				<?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
			</ul>
		</nav>
	</header>

	<div id="main" class="wrapper">
