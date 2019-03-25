<section class="header-template home-template desktop template-b">
	<div class="template-component images-1_2">
		<a href="<?= e($page->templateImageLink1()->isNotEmpty(), $page->templateImageLink1(), $featuredPage->url()) ?>">
		<div class="image-1">
			<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 1/1)) ?>
		</div>
    </a>
    <a href="<?= e($page->templateImageLink2()->isNotEmpty(), $page->templateImageLink2(), $featuredPage->url()) ?>">
		<div class="image-2">
			<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 1/1)) ?>
		</div>
		</a>
  </div>
  <div class="title sticky-title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
  	<span style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $featuredPage->title()->spaceSafe(true) ?></span>
  	<?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
		<div class="secondary"><?= $featuredPage->secondaryTitle()->spaceSafe(true) ?></div>
	<?php endif ?>
  </div>
  <div class="template-component video-player video-cover video-1">
    <?php snippet('template-videoplayer', array('field' => $page->templateVideo1())) ?>
  </div>
  <div class="template-component image-3">
    <a href="<?= e($page->templateImageLink3()->isNotEmpty(), $page->templateImageLink3(), $featuredPage->url()) ?>">
    <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 322/509)) ?>
    </a>
  </div>
	<div class="template-component text-1">
		<a href="<?= $featuredPage->url() ?>">
		<div class="tag mb1"><?= l::get('current-exhibition') ?></div>
		<div class="bold text"><?= $featuredPage->formattedDate() ?></div>
		<?php if ($featuredPage->summary()->isNotEmpty()): ?>
		<div class="text"><?= $featuredPage->summary()->kt() ?></div>
		<?php endif ?>
		</a>
	</div>
	<div class="template-component image-4">
		<a href="<?= e($page->templateImageLink4()->isNotEmpty(), $page->templateImageLink4(), $featuredPage->url()) ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage4'), 'ratio' => 1/1)) ?>
		</a>
	</div>
	<div class="template-component image-5">
		<a href="<?= e($page->templateImageLink5()->isNotEmpty(), $page->templateImageLink5(), $featuredPage->url()) ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage5'), 'ratio' => 358/269)) ?>
		</a>
	</div>
</section>

<section class="header-template home-template mobile template-b">

	<?php if ($medias->count() > 0): ?>
	<div class="template-component slider-images mb1">
		<?php snippet('slider') ?>
		<div class="slider-caption row caption"></div>
	</div>
	<?php endif ?>

	<a href="<?= $featuredPage->url() ?>">
		<div class="template-component title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
			<span style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $featuredPage->title()->spaceSafe(true) ?></span>
			<?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
				<div class="secondary"><?= $featuredPage->secondaryTitle()->spaceSafe(true) ?></div>
			<?php endif ?>
		</div>
		<div class="template-component text-1 mt2">
			<div class="tag mb1"><?= l::get('current-exhibition') ?></div>
			<div class="bold text"><?= $featuredPage->formattedDate() ?></div>
			<?php if ($featuredPage->subtitle()->isNotEmpty()): ?>
			<div class="bold text"><?= $featuredPage->subtitle()->spaceSafe(true) ?></div>
			<?php endif ?>
		</div>
	</a>

	<?php if ($page->content('fr')->get('templateVideo1')->isNotEmpty()): ?>
		<div class="template-component video-player video-cover video-1 mt2">
			<?php snippet('template-videoplayer', array('field' => $page->content('fr')->get('templateVideo1')) ) ?>
		</div>
	<?php endif ?>

</section>
