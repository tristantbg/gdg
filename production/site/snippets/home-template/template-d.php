<section class="header-template home-template template-d">
	<div class="template-component image-1">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 435/649, 'withCaption' => true)) ?>
		</a>
	</div>
	<div class="title sticky-title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
		<h1 style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $featuredPage->title()->spaceSafe(true) ?></h1>
		<?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
			<h2 class="title secondary"><?= $featuredPage->secondaryTitle()->spaceSafe(true) ?></h2>
		<?php endif ?>
		<!-- <?php if ($featuredPage->subtitle()->isNotEmpty()): ?>
		<div class="caption-title"><?= $featuredPage->subtitle()->spaceSafe(true) ?></div>
		<?php endif ?>
		<?php if ($featuredPage->intendedTemplate() == "exhibition"): ?>
		<div class="caption-title"><?= $featuredPage->formattedDate() ?></div>
		<?php endif ?> -->
  	</div>
	<div class="template-component image-2">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 628/471, 'withCaption' => true)) ?>
		</a>
	</div>
	<div class="template-component image-3">
		<a href="<?= $featuredPage->url() ?>">
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 781/505, 'withCaption' => true)) ?>
		</a>
	</div>
	<?php if ($page->content('fr')->get('templateImage4')->isNotEmpty()): ?>
		<div class="template-component image-4">
			<a href="<?= $featuredPage->url() ?>">
				<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage4'), 'ratio' => 359/282, 'withCaption' => true)) ?>
			</a>
		</div>
	<?php else: ?>
		<div class="template-component text-1">
		  <a href="<?= $featuredPage->url() ?>">
			<?php if ($page->content('fr')->get('templateText1')->isNotEmpty()): ?>
			<div class="summary"><?= $page->content('fr')->get('templateText1')->kt() ?></div>
			<?php elseif ($featuredPage->summary()->isNotEmpty()): ?>
			<div class="summary"><?= $featuredPage->summary()->kt() ?></div>
			<?php endif ?>
			</a>
		</div>
	<?php endif ?>
</section>
