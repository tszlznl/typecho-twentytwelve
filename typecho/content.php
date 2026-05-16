	<article id="post-<?php $this->cid(); ?>" class="post">
		<header class="entry-header">
			<?php if ($this->is('post')): ?>
			<h1 class="entry-title"><?php $this->title(); ?></h1>
			<?php else: ?>
			<h1 class="entry-title">
				<a href="<?php $this->permalink(); ?>" rel="bookmark"><?php $this->title(); ?></a>
			</h1>
			<?php endif; ?>

			<?php if ($this->allow('comment')): ?>
				<div class="comments-link">
					<a href="<?php $this->permalink(); ?>#comments"><?php $this->commentsNum('发表评论', '1 条评论', '%d 条评论'); ?></a>
				</div>
			<?php endif; ?>
		</header>

		<?php if ($this->is('search')): ?>
		<div class="entry-summary">
			<?php $this->excerpt(); ?>
		</div>
		<?php else: ?>
		<div class="entry-content">
			<?php $this->content('阅读更多 &rarr;'); ?>
		</div>
		<?php endif; ?>

		<footer class="entry-meta">
			<?php $this->category(','); ?> 于
			<a href="<?php $this->permalink(); ?>" rel="bookmark"><time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></a>
			<span class="by-author"> by <span class="author vcard"><a class="url fn n" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span></span>
			<?php if ($this->user->hasLogin()): ?>
				<span class="edit-link"><a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>">编辑</a></span>
			<?php endif; ?>
		</footer>
	</article>
