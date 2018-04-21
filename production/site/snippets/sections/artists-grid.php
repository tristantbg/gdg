<?php if (isset($artists) && $artists->count() > 0): ?>
	<section class="section section--artists-grid">
		<div class="row mb2 tac" sm="mb1">
			<h2><?php e($artists->count() > 1, translate('artists.plural'),  translate('artists.singular')) ?></h2>
		</div>
		<div class="artists-container row x xw four-columns">
      <?php foreach ($artists as $key => $artist): ?>
        <a href="<?= $artist->url() ?>" class="row artist-link">
          <?php if ($artist->featured()->toFile()): ?>
            <?php snippet('responsive-image', array('field' => $artist->featured(), 'maxWidth' => 1000, 'ratio' => 1/1)) ?>
          <?php else: ?>
            <?php snippet('image-placeholder', array('text' => $artist->initials())) ?>
          <?php endif ?>
          <h3 class="lead serif bold mt1" sm="mt0"><?= $artist->title()->html() ?></h3>
        </a>
      <?php endforeach ?>
    </div>
	</section>
<?php endif ?>
