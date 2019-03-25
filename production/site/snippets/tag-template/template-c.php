<section class="header-template tag-template template-c">
	<div class="template-component image-1">
  <?php if ($page->templateImageLink1()->isNotEmpty()): ?>
    <a href="<?= $page->templateImageLink1() ?>">
  <?php endif ?>
	<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 436/368, 'withCaption' => true)) ?>
  <?php if ($page->templateImageLink1()->isNotEmpty()): ?>
    </a>
  <?php endif ?>
	</div>
	<div class="title sticky-title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
		<h1 style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $page->title()->spaceSafe(true) ?></h1>
		<?php if ($page->secondaryTitle()->isNotEmpty()): ?>
			<h2 class="title secondary"><?= $page->secondaryTitle()->spaceSafe(true) ?></h2>
		<?php endif ?>
		<?php if ($page->subtitle()->isNotEmpty()): ?>
		<div class="caption-title"><?= $page->subtitle()->spaceSafe(true) ?></div>
		<?php endif ?>
		<?php if ($page->intendedTemplate() == "exhibition"): ?>
		<div class="caption-title"><?= $page->formattedDate() ?></div>
		<?php endif ?>
	</div>
	<div class="template-component image-2">
  <?php if ($page->templateImageLink2()->isNotEmpty()): ?>
    <a href="<?= $page->templateImageLink2() ?>">
  <?php endif ?>
	<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 628/471, 'withCaption' => true)) ?>
  <?php if ($page->templateImageLink2()->isNotEmpty()): ?>
    </a>
  <?php endif ?>
	</div>
	<div class="template-component image-3">
		<?php $sliderImages = $page->content('fr')->get('templateSlider1') ?>
		<?php if ($sliderImages->isNotEmpty()): ?>
		<?php snippet('slider', array('medias' => $sliderImages->toStructure())) ?>
		<div class="slider-caption row caption"></div>
		<?php else: ?>
    <?php if ($page->templateImageLink3()->isNotEmpty()): ?>
      <a href="<?= $page->templateImageLink3() ?>">
    <?php endif ?>
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 781/505, 'withCaption' => true)) ?>
    <?php if ($page->templateImageLink3()->isNotEmpty()): ?>
      </a>
    <?php endif ?>
		<?php endif ?>
	</div>
	<?php if ($page->intendedTemplate() != "exhibition" || $page->content('fr')->get('templateImage4')->isNotEmpty()): ?>
	<div class="template-component image-4">
    <?php if ($page->templateImageLink4()->isNotEmpty()): ?>
      <a href="<?= $page->templateImageLink4() ?>">
    <?php endif ?>
	  <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage4'), 'ratio' => 359/241, 'withCaption' => true)) ?>
    <?php if ($page->templateImageLink4()->isNotEmpty()): ?>
      </a>
    <?php endif ?>
	</div>
	<?php else: ?>
	<div class="template-component poster">
	  <?php snippet('responsive-image', array('field' => $page->poster(), 'ratio' => 433/615)) ?>
	</div>
	<?php endif ?>
</section>
