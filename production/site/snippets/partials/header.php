<header>
	<div id="burger">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<div id="site-title">
	<a href="<?= $site->url() ?>">
		<?php if ($page->isHomepage()): ?>
			<h1><?= $site->title()->html() ?></h1>
		<?php else: ?>
			<?= $site->title()->html() ?>
		<?php endif ?>
	</a>
	</div>
</header>