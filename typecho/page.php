<?php include 'header.php'; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php
			$isFullWidth = false;
			while ($this->next()):
			    if ($this->fields->template == 'full-width') {
			        $isFullWidth = true;
			    }
			?>
				<?php $this->need('content-page.php'); ?>
				<?php include 'comments.php'; ?>
			<?php endwhile; ?>

		</div>
	</div>

<?php if (!$isFullWidth): ?>
<?php include 'sidebar.php'; ?>
<?php endif; ?>
<?php include 'footer.php'; ?>
