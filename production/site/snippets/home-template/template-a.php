<section class="header-template home-template desktop template-a">
	<div class="template-component image-1">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->templateImage1(), 'ratio' => 359/269)) ?>
		</a>
	</div>
	<div class="template-component images-2_3">
		<a href="<?= $featuredPage->url() ?>">
		<div class="template-component image-2">
			<?php snippet('responsive-image', array('field' => $page->templateImage2(), 'ratio' => 1/1)) ?>
		</div>
		<div class="template-component image-3">
			<?php snippet('responsive-image', array('field' => $page->templateImage3(), 'ratio' => 1/1)) ?>
		</div>
		</a>
	</div>
	<div class="title sticky-title" style="color: <?= $page->titleColor() ?>"><?= $featuredPage->title()->html() ?></div>
	<div class="template-component video-player video-cover video-1">
		<?php snippet('template-videoplayer', array('field' => $page->templateVideo1())) ?>
	</div>
	<div class="template-component text-1">
		<a href="<?= $featuredPage->url() ?>">
		<div class="tag mb1"><?= l::get('current-exhibition') ?></div>
		<div class="bold text"><?= $featuredPage->formattedDate() ?></div>
		<?php if ($featuredPage->subtitle()->isNotEmpty()): ?>
		<div class="text"><?= $featuredPage->subtitle()->html() ?></div>
		<?php endif ?>
		</a>
	</div>
	<div class="template-component image-4">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->templateImage4(), 'ratio' => 206/312)) ?>
		</a>
	</div>
	<div class="template-component image-5">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->templateImage5(), 'ratio' => 1/1)) ?>
		</a>
	</div>
</section>