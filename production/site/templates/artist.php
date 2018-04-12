<?php snippet('header') ?>

<div id="page-header" class="row contained">
  <h1 class="title"><?= $page->title()->html() ?></h1>
  <?php if ($page->summary()->isNotEmpty()): ?>
    <div id="artist-summary" class="row lead">
      <?= $page->summary()->kt() ?>
    </div>
  <?php endif ?>
  <div id="artist-infos" class="row x xjb">
  	<?php if ($featured = $page->featured()->toFile()): ?>
  		<?php snippet('responsive-image', array('field' => $page->featured())) ?>
  	<?php endif ?>
  	<div id="page-description"><?= $page->text()->kt() ?></div>
  </div>
</div>

<?php if ($page->text()->isNotEmpty()): ?>
	<div id="page-text" class="contained">
		<div id="page-description"><?= $page->text()->kt() ?></div>
	</div>
<?php endif ?>

<?php snippet('footer') ?>
