<section class="header-template home-template desktop template-a">
	<div class="template-component image-1">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 359/269)) ?>
		</a>
	</div>
	<div class="template-component images-2_3">
		<a href="<?= $featuredPage->url() ?>">
		<div class="image-2">
			<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 1/1)) ?>
		</div>
		<div class="image-3">
			<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 1/1)) ?>
		</div>
		</a>
	</div>
	<div class="title sticky-title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
		<span style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $featuredPage->title()->html() ?></span>
		<?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
			<div class="secondary"><?= $featuredPage->secondaryTitle()->html() ?></div>
		<?php endif ?>
	</div>
	<div class="template-component video-player video-cover video-1">
		<?php snippet('template-videoplayer', array('field' => $page->content('fr')->get('templateVideo1')) ) ?>
	</div>
	<div class="template-component text-1">
		<a href="<?= $featuredPage->url() ?>">
		<div class="tag mb1"><?= l::get('current-exhibition') ?></div>
		<div class="bold text"><?= $featuredPage->formattedDate() ?></div>
		<?php if ($featuredPage->summary()->isNotEmpty()): ?>
		<div class="bold text"><?= $featuredPage->summary()->kt() ?></div>
		<?php endif ?>
		</a>
	</div>
	<div class="template-component image-4">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage4'), 'ratio' => 206/312)) ?>
		</a>
	</div>
	<div class="template-component image-5">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage5'), 'ratio' => 1/1)) ?>
		</a>
	</div>
</section>

<section class="header-template home-template mobile template-a">
	
	<?php if ($medias->count() > 0): ?>
	<div class="template-component slider-images mb1">
		<?php snippet('slider') ?>
		<div class="slider-caption row caption"></div>
	</div>
	<?php endif ?>

	<a href="<?= $featuredPage->url() ?>">
		<div class="template-component title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
			<span style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $featuredPage->title()->html() ?></span>
			<?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
				<div class="secondary"><?= $featuredPage->secondaryTitle()->html() ?></div>
			<?php endif ?>
		</div>
		<div class="template-component text-1 mt2">
			<div class="tag mb1"><?= l::get('current-exhibition') ?></div>
			<div class="bold text"><?= $featuredPage->formattedDate() ?></div>
			<?php if ($featuredPage->subtitle()->isNotEmpty()): ?>
			<div class="bold text"><?= $featuredPage->subtitle()->html() ?></div>
			<?php endif ?>
		</div>
	</a>
	
	<?php if ($page->content('fr')->get('templateVideo1')->isNotEmpty()): ?>
		<div class="template-component video-player video-cover video-1 mt2">
			<?php snippet('template-videoplayer', array('field' => $page->content('fr')->get('templateVideo1')) ) ?>
		</div>
	<?php endif ?>
	
</section>