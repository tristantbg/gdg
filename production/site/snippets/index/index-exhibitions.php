<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
	<div id="index-menu" class="bold">
		<ul class="has-submenu hoverable clickable mt2">
			<li event-target="submenu">
				<span><?= l::get('index.exhibitions') ?></span>
				<svg role="presentation">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
				</svg>
			</li>
			<ul class="submenu">
				<li><a href="<?= $page->url().'/by:artpiece' ?>" class="button"><?= l::get('index.artpieces') ?></a></li>
				<li><a href="<?= $page->url().'/by:artist' ?>" class="button"><?= l::get('index.artists') ?></a></li>
			</ul>
		</ul>
	</div>
</div>

<div id="page-sections">
	<div id="index-exhibitions">
		<?php foreach ($exhibitions as $key => $exhibition): ?>
			<a href="<?= $exhibition->url() ?>" class="row exhibition-link">
				<div class="sub-heading serif bold"><?= $exhibition->title()->html() ?></div>
				<?php if ($exhibition->subtitle()->isNotEmpty()): ?>
					<div class="caption-title serif"><?= $exhibition->subtitle()->html() ?></div>
				<?php endif ?>
        		<div class="caption-title serif mt2"><?= $exhibition->formattedDate() ?></div>
			</a>
		<?php endforeach ?>
	</div>
</div>
