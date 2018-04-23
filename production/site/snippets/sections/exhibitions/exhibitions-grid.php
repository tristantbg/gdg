<?php if (isset($exhibitions)): ?>
	<section class="section section--exhibitions-grid row x xw four-columns">
		<?php foreach ($exhibitions as $key => $exhibition): ?>
			<a href="<?= $exhibition->url() ?>" class="row exhibition-link">
				<?php if ($exhibition->poster()->toFile()): ?>
					<?php snippet('responsive-image', array('field' => $exhibition->poster())) ?>
				<?php else: ?>
					<?php snippet('image-placeholder', array('text' => substr($exhibition->title(), 0, 1))) ?>
				<?php endif ?>
				<h3 class="lead serif bold mt1"><?= $exhibition->title()->html() ?></h3>
				<?php if ($exhibition->subtitle()->isNotEmpty()): ?>
				<div class="lead serif"><?= $exhibition->subtitle()->html() ?></div>
				<?php endif ?>
				<div class="lead serif"><?= $exhibition->formattedDate() ?></div>
				<div class="tag mt2"><?= l::get('exhibitions.singular') ?></div>
			</a>
		<?php endforeach ?>
	</section>
<?php endif ?>