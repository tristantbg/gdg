<section class="header-template home-template template-c">
  <a href="<?= $featuredPage->url() ?>" class="template-component featuredpage-1">
    <?php snippet('responsive-image', array('field' => $featuredPage->featured())) ?>
    <div class="page-infos" sm="my2">
      <div class="title" style="color: <?= $page->titleColor() ?>"><?= $featuredPage->title()->html() ?></div>
      <?php if ($featuredPage->secondaryTitle()->isNotEmpty()): ?>
        <div class="title secondary"><?= $featuredPage->secondaryTitle() ?></div>
      <?php endif ?>
      <div class="bold text mt1"><?= $featuredPage->formattedDate() ?></div>
      <?php if ($featuredPage->subtitle()->isNotEmpty()): ?>
      <div class="bold text"><?= $featuredPage->subtitle()->html() ?></div>
      <?php endif ?>
      <?php if ($featuredPage->summary()->isNotEmpty()): ?>
      <div class="text"><?= $featuredPage->summary()->kt() ?></div>
      <?php endif ?>
      <?= $featuredPage->displayTags() ?>
    </div>
  </a>

  <?php if ($featuredPage2): ?>
    <a href="<?= $featuredPage2->url() ?>" class="template-component featuredpage-2" sm="mt2">
      <?php snippet('responsive-image', array('field' => $featuredPage2->featured())) ?>
      <div class="page-infos">
        <div class="serif caption-title bold mt2"><?= $featuredPage2->title()->html() ?></div>
        <?php if ($featuredPage2->secondaryTitle()->isNotEmpty()): ?>
          <div class="serif caption-title"><?= $featuredPage2->secondaryTitle() ?></div>
        <?php endif ?>
        <div class="bold text mt1"><?= $featuredPage2->formattedDate() ?></div>
        <?php if ($featuredPage2->subtitle()->isNotEmpty()): ?>
        <div class="bold text"><?= $featuredPage2->subtitle()->html() ?></div>
        <?php endif ?>
        <?php if ($featuredPage2->summary()->isNotEmpty()): ?>
        <div class="text"><?= $featuredPage2->summary()->kt() ?></div>
        <?php endif ?>
        <?= $featuredPage2->displayTags() ?>
      </div>
    </a>
  <?php endif ?>
</section>