<?php snippet('header') ?>

<?php if ($page->text()->isNotEmpty()): ?>
	<div id="page-text" class="contained">
		<?= $page->text()->kt() ?>
	</div>
<?php endif ?>

<?php snippet('footer') ?>
