<?php snippet('header') ?>

<?php snippet('tag-template/template-'.$page->pageTemplate()) ?>

<?php snippet('page-sections') ?>

<?php if ($page->grid()->bool() != false): ?>
<div id="articles" class="row contained mt4">
  <section class="page-section section section--articles four-columns">
      <?php foreach ($articles as $key => $article): ?>
          <div class="article-link">
            <a href="<?= $article->url() ?>">
              <?php snippet('responsive-image', array('field' => $article->featured(), 'ratio' => 1/1)) ?>
              <div class="lead bold mt1">
                <?= $article->title()->spaceSafe() ?>
              </div>
              <?php if ($article->secondaryTitle()->isNotEmpty()): ?>
              <div class="lead">
                <?= $article->secondaryTitle()->spaceSafe() ?>
              </div>
              <?php endif ?>
              <?php if ($article->subtitle()->isNotEmpty()): ?>
              <div class="lead">
                <?= $article->subtitle()->spaceSafe() ?>
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
  	<?php if($articles->pagination() && $articles->pagination()->hasPages() && $articles->pagination()->hasNextPage()): ?>
		<!-- pagination -->
		<nav id="pagination" class="row mt4 x xjb">

		<div>
			<?php if($articles->pagination()->hasPrevPage()): ?>
			<a class="prev caption-title" href="<?php echo $articles->pagination()->prevPageURL() ?>"><?= l::get('previous') ?></a>
			<?php endif ?>
		</div>

		<div>
			<?php if($articles->pagination()->hasNextPage()): ?>
			<a class="next caption-title" href="<?php echo $articles->pagination()->nextPageURL() ?>"><?= l::get('next') ?></a>
			<?php endif ?>
		</div>

		</nav>
		<!-- <div class="ajax-loading"><div class="button rounded infinite-scroll-request">Loading</div></div> -->
	<?php endif ?>
</div>
<?php endif ?>

<?php snippet('footer') ?>
