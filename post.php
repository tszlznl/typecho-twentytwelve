<?php include 'header.php'; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ($this->next()): ?>

				<?php $this->need('content.php'); ?>

				<nav class="nav-single">
					<h3 class="assistive-text">文章导航</h3>
					<span class="nav-previous"><?php $this->thePrev('%s'); ?></span>
					<span class="nav-next"><?php $this->theNext('%s'); ?></span>
				</nav>

				<?php include 'comments.php'; ?>

			<?php endwhile; ?>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
