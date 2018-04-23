<?php snippet('header') ?>

<div id="page-header" class="row contained">
	<h1 class="title tac"><?= $page->title()->html() ?></h1>
</div>

<div class="row contained mt4">
	<?php snippet('sections/exhibitions/exhibitions-grid') ?>
</div>

<?php snippet('footer') ?>
