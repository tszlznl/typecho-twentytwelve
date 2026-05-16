<?php
/**
 * 文章归档
 *
 * @package custom
 */
include 'header.php'; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article class="page type-page">
				<header class="entry-header">
					<h1 class="entry-title"><?php $this->title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php $this->content(); ?>

					<?php
					$posts = $this->widget('Widget_Contents_Post_Recent', 'pageSize=1000');
					$year = '';
					$month = '';
					while ($posts->next()):
					    $y = $posts->date('Y');
					    $m = $posts->date('n');
					?>
					    <?php if ($y !== $year): $year = $y; $month = ''; ?>
					        <h2 class="archive-year"><?php echo $year; ?></h2>
					    <?php endif; ?>
					    <?php if ($m !== $month): $month = $m; ?>
					        <h3 class="archive-month"><?php echo $posts->date('Y年n月'); ?></h3>
					    <?php endif; ?>
					    <p class="archive-item">
					        <a href="<?php $posts->permalink(); ?>"><?php $posts->title(); ?></a>
					        <span class="archive-day">（<?php echo $posts->date('j日'); ?>）</span>
					    </p>
					<?php endwhile; ?>
				</div>
			</article>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
