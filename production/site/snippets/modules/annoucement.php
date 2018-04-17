<section class="page-section section section--annoucement">
  <a href="<?= $relatedPage->url() ?>" class="relatedpage">
    <?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 1/1)) ?>
    <div class="lead bold mt1">
      <?= $relatedPage->title()->html() ?>
    </div>
    <?php if (false && $relatedPage->subtitle()->isNotEmpty()): ?>
    <div class="lead">
      <?= $relatedPage->subtitle()->html() ?>
    </div>
    <?php endif ?>
    <?php if ($relatedPage->summary()->isNotEmpty()): ?>
    <div class="small mt1">
      <?= $relatedPage->summary()->kt() ?>
    </div>
    <?php endif ?>
    <?= $relatedPage->displayTags() ?>
  </a>
</section>
