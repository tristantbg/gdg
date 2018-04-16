<?php snippet('header') ?>

<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
	<?php if ($page->subtitle()->isNotEmpty()): ?>
		<div id="page-subtitle" class="caption-title tac">
			<div class="c8 co2" md="c12 co0"><?= $page->subtitle()->kt() ?></div>
		</div>
	<?php endif ?>
	<?php if ($featured = $page->featured()->toFile()): ?>
		<div class="row mt2">
			<?php snippet('responsive-image', array('field' => $page->featured())) ?>
		</div>
	<?php endif ?>
</div>

<?php if ($page->summary()->isNotEmpty()): ?>
	<div id="page-summary" class="row contained bold summary">
		<div class="c8 co2" md="c12 co0"><?= $page->summary()->kt() ?></div>
	</div>
<?php endif ?>

<div id="page-text" class="row contained text">
	<div class="c8 co2" md="c12 co0"><?= $page->text()->kt() ?></div>
</div>

<?php snippet('footer') ?>