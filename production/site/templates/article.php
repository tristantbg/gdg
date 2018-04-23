<?php snippet('header') ?>

<?php snippet('tag-template/template-none') ?>

<?php if ($page->summary()->isNotEmpty()): ?>
	<div id="page-summary" class="row contained summary mb4">
		<div class="c8 co2" md="c12 co0"><?= $page->summary()->kt() ?></div>
	</div>
<?php endif ?>

<div id="page-text" class="row contained text">
  <div class="c8 co2" md="c12 co0"><?= $page->text()->kt() ?></div>
</div>

<?php snippet('page-sections') ?>

<?php snippet('footer') ?>
