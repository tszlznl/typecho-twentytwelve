<?php include 'header.php'; ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ($this->have()): ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php $this->archiveTitle(array(
				    'category' => '%s',
				    'search'   => '搜索：%s',
				    'tag'      => '标签：%s',
				    'author'   => '%s 发布的文章',
				    'date'     => '%s',
				), '', ''); ?></h1>
				<?php if ($this->is('category') && $this->description()): ?>
					<div class="archive-meta"><?php $this->description(); ?></div>
				<?php endif; ?>
			</header>

			<?php while ($this->next()): ?>
				<?php $this->need('content.php'); ?>
			<?php endwhile; ?>

			<nav id="nav-below" class="navigation">
				<h3 class="assistive-text">文章导航</h3>
				<div class="nav-previous"><?php $this->pageLink('&larr; 上一页'); ?></div>
				<div class="nav-next"><?php $this->pageLink('下一页 &rarr;', 'next'); ?></div>
			</nav>

		<?php else: ?>
			<?php $this->need('content-none.php'); ?>
		<?php endif; ?>

		</div>
	</section>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
