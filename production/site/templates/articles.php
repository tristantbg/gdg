<?php snippet('header') ?>

<?php snippet('tag-template/template-'.$page->pageTemplate()) ?>

<?php snippet('page-sections') ?>

<?php if ($page->grid()->bool() != false): ?>
<div id="articles" class="row contained mt4">
  <section class="page-section section section--articles four-columns">
      <?php foreach ($articles as $key => $article): ?>
          <div class="article-link">
            <a href="<?= $article->url() ?>">
              <?php snippet('responsive-image', array('field' => $article->featured(), 'ratio' => 3/2)) ?>
              <div class="lead bold mt1">
                <?= $article->title()->html() ?>
              </div>
              <?php if (false && $article->subtitle()->isNotEmpty()): ?>
              <div class="lead">
                <?= $article->subtitle()->html() ?>
              </div>
              <?php endif ?>
              <?php if ($article->summary()->isNotEmpty()): ?>
              <div class="small mt1">
                <?= $article->summary()->kt() ?>
              </div>
              <?php endif ?>
              <?= $article->displayTags() ?>
            </a>
          </div>
      <?php endforeach ?>
  </section>
</div>
<?php endif ?>

<?php snippet('footer') ?>
