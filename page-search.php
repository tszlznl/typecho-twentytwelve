<?php
/**
 * 搜索
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

					<div class="search-page">
						<search>
						<form role="search" method="get" class="search-page-form" action="<?php $this->options->siteUrl(); ?>">
							<div class="search-page-field">
								<input type="search" name="s" class="search-page-input" placeholder="输入关键词搜索…" aria-label="搜索关键词" autofocus />
								<button type="submit" class="search-page-submit">搜索</button>
							</div>
							<p class="search-page-hint">按 <kbd>/</kbd> 快速聚焦</p>
						</form>
						</search>

						<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=10')->to($tags); ?>
						<?php if ($tags->have()): ?>
						<div class="search-page-tags">
							<h3 class="search-page-tags-title">热门标签</h3>
							<div class="tag-cloud">
								<?php while ($tags->next()): ?>
								<a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
								<?php endwhile; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</article>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>