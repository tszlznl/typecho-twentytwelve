	</div>
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<a href="<?php $this->options->siteUrl(); ?>" class="imprint">
				Powered by Typecho
			</a>
		</div>
	</footer>
</div>
<?php $this->footer(); ?>
<script>
(function(){var t=document.getElementById('theme-toggle');if(t)t.addEventListener('click',function(){var n=document.documentElement.getAttribute('data-theme')==='light'?'dark':'light';document.documentElement.setAttribute('data-theme',n);localStorage.setItem('theme',n)});var i=document.querySelector('.search-page-input');if(i)document.addEventListener('keydown',function(e){if(e.key==='/'&&!['INPUT','TEXTAREA','SELECT'].includes(e.target.tagName)){e.preventDefault();i.focus()}})})();
</script>
</body>
</html>
