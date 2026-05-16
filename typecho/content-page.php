	<article id="post-<?php $this->cid(); ?>" class="post">
		<header class="entry-header">
			<h1 class="entry-title"><?php $this->title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php $this->content(); ?>
		</div>

		<footer class="entry-meta">
			<?php if ($this->user->hasLogin()): ?>
				<span class="edit-link"><a href="<?php $this->options->adminUrl('write-page.php?cid=' . $this->cid); ?>">编辑</a></span>
			<?php endif; ?>
		</footer>
	</article>
