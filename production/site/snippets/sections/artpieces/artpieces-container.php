<?php if (isset($artpieces) && $artpieces->count() > 0): ?>
	<section class="section section--artpieces">
		<div class="row tac">
			<?php if (isset($title)): ?>
				<div class="caption-title"><?= html($title) ?></div>
			<?php else: ?>
				<h2><?php e($artpieces->count() > 1, translate('artpieces.plural'),  translate('artpieces.singular')) ?></h2>
			<?php endif ?>
		</div>
		<hr>
		<div class="artpieces-thumbs row x xjc xw <?php e($artpieces->count() > 1 || isset($list), 'four-columns', 'one-column') ?>">
			<?php if ($artpieces->count() > 1 || isset($list)): ?>
			<?php snippet('sections/artpieces/artpieces-items') ?>
			<?php else: ?>
			<?php snippet('sections/artpieces/artpieces-item') ?>
			<?php endif ?>
		</div>
	</section>
<?php endif ?>