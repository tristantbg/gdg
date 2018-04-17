<?php snippet('header') ?>

<?php snippet('tag-template/template-'.$page->pageTemplate()) ?>

<div id="page-text" class="row contained text">
	<div class="c8 co2" md="c12 co0"><?= $page->text()->kt() ?></div>
</div>

<?php snippet('sections/artists-grid') ?>

<?php snippet('page-sections') ?>

<?php snippet('footer') ?>
