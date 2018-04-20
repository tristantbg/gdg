<?php snippet('header') ?>

<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
	<?php if ($page->summary()->isNotEmpty()): ?>
		<div id="artist-summary" class="row lead tac c6 co3" md="c12 co0">
			<?= $page->summary()->kt() ?>
		</div>
	<?php endif ?>

	<hr>

	<div id="artist-infos" class="row x xjc xw">
		<?php if ($featured = $page->featured()->toFile()): ?>
			<div class="c6 fl pr2" md="c12 p0">
				<?php snippet('responsive-image', array('field' => $page->featured())) ?>
			</div>
			<div id="page-description" class="c6 fl" md="c12"><?= $page->text()->kt() ?></div>
		<?php else: ?>
			<div id="page-description" class="c8 fl" md="c12"><?= $page->text()->kt() ?></div>
		<?php endif ?>
	</div>
</div>

<div id="page-sections">
	<?php snippet('sections/artpieces/artpieces-container') ?>

	<?php snippet('sections/exhibitions/exhibitions-container', array('center' => true)) ?>
</div>

<?php snippet('footer') ?>
