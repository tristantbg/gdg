<section class="page-section section section--relatedpages">
  <?php if ($data->get("title")->isNotEmpty()): ?>
  <div class="sub-heading tac mb3">
    <?= $data->get("title")->html() ?>
  </div>
  <?php endif ?>
  <div class="relatedpages-slider inline-slider">
    <?php foreach ($data->get('content') as $key => $p): ?>
      <?php if ($relatedPage = $pagesIndex->findBy('autoid', $p->get('content')->value())): ?>
        <a href="<?= $relatedPage->url() ?>" class="relatedpage inline-item">
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
      <?php endif ?>
    <?php endforeach ?>
  </div>
</section>
