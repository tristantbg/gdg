<?php snippet('header') ?>

<?php snippet('tag-template/template-'.$page->pageTemplate()) ?>

<div id="page-sections">
  <section class="page-section section section--articles four-columns">
      <?php foreach ($articles as $key => $article): ?>
          <a href="<?= $article->url() ?>" class="article-link">
            <?php snippet('responsive-image', array('field' => $article->featured(), 'ratio' => 1/1)) ?>
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
      <?php endforeach ?>
  </section>
</div>

<?php snippet('footer') ?>
