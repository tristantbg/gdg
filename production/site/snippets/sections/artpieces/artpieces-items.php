<?php foreach ($artpieces as $key => $artpiece): ?>
	<a href="<?= $artpiece->url() ?>" class="artpiece-link">
		<?php snippet('responsive-image', array('field' => $artpiece->featured())) ?>
		<div class="artpiece-infos small mt1">
			<em><?= $artpiece->title()->html() ?></em><?php e($artpiece->year()->isNotEmpty(), ', '.$artpiece->year()->html()) ?>
			<?php if ($artpiece->summary()->isNotEmpty()): ?>
				<?php $artpiece->summary()->kt() ?>
			<?php endif ?>
		</div>
	</a>
<?php endforeach ?>