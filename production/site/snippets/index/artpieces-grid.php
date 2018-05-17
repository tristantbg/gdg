<div id="index-artpieces" class="row four-columns">
	<?php foreach ($artpieces as $key => $artpiece): ?>
		<a href="<?= $artpiece->parent()->url() ?>" class="artpiece-item">
			<div class="overlay text bold"><?= $artpiece->parent()->title()->html() ?></div>
			<?php snippet('responsive-image', array('field' => $artpiece->featured(), 'maxWidth' => 1000)) ?>
		</a>
	<?php endforeach ?>
</div>