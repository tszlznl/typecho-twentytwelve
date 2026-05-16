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

					<form role="search" method="get" action="<?php $this->options->siteUrl(); ?>">
						<p>
							<input type="text" name="s" class="text" size="32" placeholder="输入关键词..." />
							<input type="submit" class="submit" value="搜索" />
						</p>
					</form>
				</div>
			</article>

		</div>
	</div>

<?php include 'sidebar.php'; ?>
<?php include 'footer.php'; ?>
