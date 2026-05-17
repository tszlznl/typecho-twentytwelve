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
					$archives = array();
					while ($posts->next()):
					    $ts = $posts->created;
					    $y = date('Y', $ts);
					    $m = date('n', $ts);
					    $archives[$y][$m][] = array(
					        'title' => $posts->title,
					        'permalink' => $posts->permalink,
					        'day' => (int)date('j', $ts),
					    );
					endwhile;
					?>

					<?php if (empty($archives)): ?>
						<p class="archive-empty">暂无文章。</p>
					<?php else:
					    $yearKeys = array_keys($archives);
					    if (count($yearKeys) >= 3):
					?>
						<div class="archive-jump">
							<?php foreach ($yearKeys as $y): ?>
							<a href="#archive-<?php echo $y; ?>"><?php echo $y; ?></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
						<div class="archive-timeline">
						<?php foreach ($archives as $year => $months):
						    $yearTotal = 0;
						    foreach ($months as $items) $yearTotal += count($items);
						?>
							<div class="archive-year-group" id="archive-<?php echo $year; ?>">
								<h2 class="archive-year"><?php echo $year; ?>
									<span class="archive-count"><?php echo $yearTotal; ?> 篇</span>
								</h2>
								<?php foreach ($months as $month => $items): ?>
								<div class="archive-month-group">
									<h3 class="archive-month"><?php echo $month; ?> 月
										<span class="archive-count"><?php echo count($items); ?> 篇</span>
									</h3>
									<div class="archive-list">
										<?php foreach ($items as $item): ?>
										<p class="archive-item">
											<span class="archive-day-label"><?php echo $item['day']; ?></span>
											<a href="<?php echo htmlspecialchars($item['permalink'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></a>
										</p>
										<?php endforeach; ?>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</article>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>