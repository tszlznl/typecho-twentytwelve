<?php include 'header.php'; ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">页面未找到</h1>
				</header>

				<div class="entry-content">
					<p>抱歉，找不到您要的页面。试试搜索吧。</p>
					<form method="get" action="<?php $this->options->siteUrl(); ?>">
						<p><input type="text" name="s" class="text" size="32" /> <input type="submit" class="submit" value="搜索" /></p>
					</form>
				</div>
			</article>

		</div>
	</div>

<?php include 'footer.php'; ?>
