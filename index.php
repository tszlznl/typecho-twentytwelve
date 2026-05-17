<?php include 'header.php'; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ($this->have()): ?>

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
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
