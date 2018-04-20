<?php snippet('header') ?>

<?php snippet('home-template/template-'.$page->pageTemplate()) ?>

<?php snippet('page-sections') ?>

<div id="home-index" class="row contained">
	<div class="row mb2">
		<h1 class="title tac"><?= $indexPage->title()->html() ?></h1>
		<div id="index-menu" class="bold mb2">
			<ul class="has-submenu mt2">
				<li event-target="submenu">
					<span><?= l::get('index.artpieces') ?></span>
					<svg role="presentation">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
					</svg>
				</li>
				<ul class="submenu">
					<li><a href="<?= $indexPage->url().'/by:exhibition' ?>" class="button"><?= l::get('index.exhibitions') ?></a></li>
					<li><a href="<?= $indexPage->url().'/by:artist' ?>" class="button"><?= l::get('index.artists') ?></a></li>
				</ul>
			</ul>
		</div>
	</div>
	<?php snippet('index/artpieces-grid') ?>
	<a href="<?= $indexPage->url() ?>" class="show-more mt4"><?= l::get('more') ?></a>
</div>

<?php snippet('footer') ?>
