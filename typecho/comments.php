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
					<header class="comment-meta comment-author vcard">
						<?php $comments->gravatar('44'); ?>
						<cite class="fn"><?php $comments->author(); ?></cite>
						<a href="<?php $comments->permalink(); ?>"><time datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y-m-d H:i'); ?></time></a>
					</header>

					<?php if ($comments->isNeedCheck()): ?>
					<p class="comment-awaiting-moderation">您的评论正在等待审核。</p>
					<?php endif; ?>

					<section class="comment-content comment">
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
		<p>已登录为 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a>。 <a href="<?php $this->options->index('Logout.do'); ?>" title="退出">退出 &raquo;</a></p>
		<?php else: ?>
		<form method="post" action="<?php $this->commentUrl(); ?>" id="commentform">
			<p>
				<input type="text" name="author" class="text" size="35" value="<?php $this->remember('author'); ?>" />
				<label>姓名（必填）</label>
			</p>
			<p>
				<input type="email" name="mail" class="text" size="35" value="<?php $this->remember('mail'); ?>" />
				<label>邮箱（必填，不会公开）</label>
			</p>
			<p>
				<input type="url" name="url" class="text" size="35" value="<?php $this->remember('url'); ?>" />
				<label>网站</label>
			</p>
			<p>
				<textarea rows="8" cols="50" name="text"><?php $this->remember('text'); ?></textarea>
			</p>
			<p>
				<input type="submit" class="submit" value="提交评论" />
			</p>
		</form>
		<?php endif; ?>
	</div>

</div>

<?php endif; ?>
