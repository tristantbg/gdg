<?php snippet('header') ?>

<?php
	$featuredPage = $page->children()->visible()->nth(0);
	$featuredPage2 = $page->children()->visible()->nth(1);
	$featuredPageFirst = $featuredPage->children()->visible()->sortBy('date', 'desc')->first();
	$featuredPage2First = $featuredPage2->children()->visible()->sortBy('date', 'desc')->first();
?>

<section class="header-template home-template template-c">
  <a href="<?= $featuredPage->url() ?>" class="template-component featuredpage-1">
    <?php snippet('responsive-image', array('field' => $featuredPageFirst->featured())) ?>
    <div class="page-infos" sm="my2">
      <div class="title mt2"><?= $featuredPage->title()->html() ?></div>
      <?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
        <div class="title secondary"><?= $featuredPage->secondaryTitle() ?></div>
      <?php endif ?>
      <?php if ($featuredPage->text()->isNotEmpty()): ?>
      <div class="text"><?= $featuredPage->text()->kt() ?></div>
      <?php endif ?>
    </div>
  </a>

  <?php if ($featuredPage2): ?>
    <a href="<?= $featuredPage2->url() ?>" class="template-component featuredpage-2" sm="mt2">
      <?php snippet('responsive-image', array('field' => $featuredPage2First->featured())) ?>
      <div class="page-infos">
        <div class="title mt2"><?= $featuredPage2->title()->html() ?></div>
        <?php if ($featuredPage2->secondaryTitle()->isNotEmpty()): ?>
          <div class="serif caption-title"><?= $featuredPage2->secondaryTitle() ?></div>
        <?php endif ?>
        <?php if ($featuredPage2->text()->isNotEmpty()): ?>
        <div class="text"><?= $featuredPage2->text()->kt() ?></div>
        <?php endif ?>
      </div>
    </a>
  <?php endif ?>
</section>

<?php snippet('footer') ?>
