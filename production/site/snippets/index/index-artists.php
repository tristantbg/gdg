<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
	<div id="index-menu" class="bold">
		<ul class="has-submenu hoverable clickable mt2">
			<li event-target="submenu">
				<span><?= l::get('index.artists') ?></span>
				<svg role="presentation">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
				</svg>
			</li>
			<ul class="submenu">
				<li><a href="<?= $page->url().'/by:artpiece' ?>" class="button"><?= l::get('index.artpieces') ?></a></li>
				<li><a href="<?= $page->url().'/by:exhibition' ?>" class="button"><?= l::get('index.exhibitions') ?></a></li>
			</ul>
		</ul>
	</div>
</div>

<div id="page-sections">
	<div id="index-artists">
		<?php foreach ($artists as $group => $plist): ?>

			<div class="row group">

				<div class="sticky-title title"><?= strtoupper($group) ?></div>

				<?php foreach ($plist as $key => $puri): ?>
					<?php $artist = page($puri) ?>
					<div class="row row-item title secondary c10 co2" sm="c12 co0">

						<a href="<?= $artist->url() ?>" class="row artist-link">
							<?= $artist->title()->html() ?>
						</a>

					</div>
				<?php endforeach ?>

			</div>

		<?php endforeach ?>
	</div>
</div>
