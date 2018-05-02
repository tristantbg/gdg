<?php foreach ($artpieces as $key => $artpiece): ?>
	<a href="<?= $artpiece->url() ?>" class="artpiece-link">
		<?php if ($artpiece->featured()->toFile()): ?>
			<?php snippet('responsive-image', array('field' => $artpiece->featured())) ?>
		<?php else: ?>
			<?php snippet('image-placeholder', array('text' => substr($artpiece->title(), 0, 1))) ?>
		<?php endif ?>
		<div class="artpiece-infos small mt1 c6 co3" md="c12 co0">
			<em><?= $artpiece->title()->html() ?></em><?php e($artpiece->year()->isNotEmpty(), ', '.$artpiece->year()->html()) ?>
			<?php if ($artpiece->summary()->isNotEmpty()): ?>
				<?php $artpiece->summary()->kt() ?>
			<?php endif ?>
		</div>
	</a>
<?php endforeach ?>