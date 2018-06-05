<div id="page-header" class="row contained">
	<h1 class="title tac"><?= ucfirst($tag) ?></h1>
</div>

<div id="articles" class="row contained mt4">
  <section class="page-section section section--articles four-columns">
      <?php foreach ($articles as $key => $article): ?>
          <div class="article-link">
          	<a href="<?= $article->url() ?>">
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
      	  </div>
      <?php endforeach ?>
  </section>
</div>
