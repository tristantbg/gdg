<?php snippet('header') ?>

<div id="page-header" class="row contained">
  <h1 class="title"><?= $page->title()->html() ?></h1>
  <?php if ($page->summary()->isNotEmpty()): ?>
    <div id="artist-summary" class="row lead">
      <?= $page->summary()->kt() ?>
    </div>
  <?php endif ?>
</div>

<?php if ($page->text()->isNotEmpty()): ?>
	<div id="page-text" class="contained">
		<?= $page->text()->kt() ?>
	</div>
<?php endif ?>

<?php snippet('footer') ?>
