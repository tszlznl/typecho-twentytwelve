<?php
/**
 * 标签云
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

					<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=0')->to($tags); ?>
					<?php if ($tags->have()): ?>
					<ul class="tag-cloud wp-tag-cloud">
						<?php while ($tags->next()): ?>
						<li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php else: ?>
					<p>暂无标签。</p>
					<?php endif; ?>
				</div>
			</article>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
