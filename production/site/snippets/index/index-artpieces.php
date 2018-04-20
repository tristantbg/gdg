<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
	<div id="index-menu" class="bold">
		<ul class="has-submenu mt2">
			<li event-target="submenu">
				<span><?= l::get('index.artpieces') ?></span>
				<svg role="presentation">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
				</svg>
			</li>
			<ul class="submenu">
				<li><a href="<?= $page->url().'/by:exhibition' ?>" class="button"><?= l::get('index.exhibitions') ?></a></li>
				<li><a href="<?= $page->url().'/by:artist' ?>" class="button"><?= l::get('index.artists') ?></a></li>
			</ul>
		</ul>
	</div>
</div>

<div id="page-sections">
	<?php snippet('index/artpieces-grid') ?>
</div>