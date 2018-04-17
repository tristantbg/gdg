<?php if (isset($artists)): ?>
	<section class="section section--artists-grid">
		<div class="artists-container row x xw four-columns">
      <?php foreach ($artists as $key => $artist): ?>
        <a href="<?= $artist->url() ?>" class="row artist-link">
          <?php if ($artist->featured()->toFile()): ?>
            <?php snippet('responsive-image', array('field' => $artist->featured())) ?>
          <?php else: ?>
            <?php snippet('image-placeholder', array('text' => substr($artist->title(), 0, 1))) ?>
          <?php endif ?>
          <h3 class="lead serif bold mt1"><?= $artist->title()->html() ?></h3>
        </a>
      <?php endforeach ?>
    </div>
	</section>
<?php endif ?>
