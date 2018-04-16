<?php foreach ($artpieces as $key => $artpiece): ?>
		<?php if ($page->intendedTemplate() != 'artpiece'): ?>
		<a href="<?= $artpiece->url() ?>" class="artpiece-link">
		<?php endif ?>
		<?php snippet('responsive-image', array('field' => $artpiece->featured())) ?>
		<div class="artpiece-infos mt4 tac">
			<div class="row serif bold caption-title">
				<a href="<?= $artpiece->parent()->url() ?>"><?= $artpiece->parent()->title()->html() ?></a>
			</div>
			<div class="row serif caption-title">
				<em><?= $artpiece->title()->html() ?></em><?php e($artpiece->year()->isNotEmpty(), ', '.$artpiece->year()->html()) ?>
			</div>
			<?php if ($artpiece->summary()->isNotEmpty()): ?>
				<div class="row pt1 c6 co3" md="c16 co0">
					<?= $artpiece->summary()->kt() ?>
				</div>
			<?php endif ?>
		</div>
		<?php if ($page->intendedTemplate() != 'artpiece'): ?>
		</a>
		<?php endif ?>
<?php endforeach ?>