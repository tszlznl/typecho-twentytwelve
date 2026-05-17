<?php if ($this->allow('comment')): ?>

<div id="comments" class="comments-area">

	<?php $this->comments()->to($comments); ?>

	<?php if ($comments->have()): ?>
		<h2 class="comments-title">
			<?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?>
		</h2>

		<ol class="commentlist">
			<?php while ($comments->next()): ?>
			<li id="li-comment-<?php $comments->theId(); ?>" class="comment">
				<article id="comment-<?php $comments->theId(); ?>" class="comment-body">
					<header class="comment-meta">
						<?php $comments->gravatar('40'); ?>
						<div class="comment-meta-text">
							<cite class="fn"><?php $comments->author(); ?></cite>
							<a href="<?php $comments->permalink(); ?>"><time datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y-m-d H:i'); ?></time></a>
						</div>
					</header>

					<?php if ($comments->isNeedCheck()): ?>
					<p class="comment-awaiting-moderation">您的评论正在等待审核。</p>
					<?php endif; ?>

					<section class="comment-content">
						<?php $comments->content(); ?>
					</section>

					<div class="reply">
						<?php $comments->reply('回复'); ?>
					</div>
				</article>
			</li>
			<?php endwhile; ?>
		</ol>

		<?php $comments->pageNav('&larr; 上一页', '下一页 &rarr;'); ?>

	<?php endif; ?>

	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">发表评论</h3>

		<?php if ($this->user->hasLogin()): ?>
		<p class="logged-in-as">已登录为 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>。</p>
		<?php endif; ?>
		<form method="post" action="<?php $this->commentUrl(); ?>" id="commentform">
			<p class="comment-form-author">
				<label for="author">姓名（必填）</label>
				<input type="text" name="author" id="author" value="<?php $this->remember('author'); ?>" />
			</p>
			<p class="comment-form-email">
				<label for="mail">邮箱（必填，不会公开）</label>
				<input type="email" name="mail" id="mail" value="<?php $this->remember('mail'); ?>" />
			</p>
			<p class="comment-form-url">
				<label for="url">网站</label>
				<input type="url" name="url" id="url" value="<?php $this->remember('url'); ?>" />
			</p>
			<p class="comment-form-text">
				<label for="text">评论内容</label>
				<textarea name="text" id="text" rows="6"><?php $this->remember('text'); ?></textarea>
			</p>
			<p class="form-submit">
				<input type="submit" value="提交评论" />
			</p>
		</form>
	</div>

</div>

<?php endif; ?>
