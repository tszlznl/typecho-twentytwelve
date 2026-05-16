	<div id="secondary" class="widget-area" role="complementary">
		<aside class="widget widget_recent_entries">
			<h3 class="widget-title">最新文章</h3>
			<ul>
			<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
			</ul>
		</aside>

		<aside class="widget widget_recent_comments">
			<h3 class="widget-title">最新评论</h3>
			<ul>
			<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
			<?php while ($comments->next()): ?>
				<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(15, '[...]'); ?></li>
			<?php endwhile; ?>
			</ul>
		</aside>

		<aside class="widget widget_categories">
			<h3 class="widget-title">分类</h3>
			<ul>
			<?php $this->widget('Widget_Metas_Category_List')->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
			</ul>
		</aside>

		<aside class="widget widget_archive">
			<h3 class="widget-title">归档</h3>
			<ul>
			<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
			</ul>
		</aside>
	</div>
