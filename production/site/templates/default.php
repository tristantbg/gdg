<?php snippet('header') ?>

<h1 class="title tac"><?= $page->title()->html() ?></h1>

<?php if ($page->text()->isNotEmpty()): ?>
	<div id="page-text">
		<?= $page->text()->kt() ?>
	</div>
<?php endif ?>

<?php snippet('footer') ?>